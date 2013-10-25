<?php

require 'MyConstantVisitor.php';
require 'MyHookVisitor.php';

class Hooks {

    /**
     * @var PHPParser_Parser
     */
    private $parser;

    public function __construct()
    {
        $this->parser = new PHPParser_Parser(new PHPParser_Lexer);
    }

    public function searchForHooksInFile($filename, $phpFile)
    {
        $code  = file_get_contents($phpFile);

        if (false === strpos($code, 'postEvent')) {
            return array();
        }

        $stmts = $this->parser->parse($code);

        $traverser = new PHPParser_NodeTraverser();
        $traverser->addVisitor(new MyConstantVisitor());
        $traverser->addVisitor(new MyHookVisitor($filename));
        $hooks = $traverser->traverse($stmts);

        return $hooks;
    }

    public function sortHooksByName($hooks)
    {
        usort($hooks, function ($hook1, $hook2) {
            $hookName1 = strtolower($hook1['name']);
            $hookName2 = strtolower($hook2['name']);

            if ($hookName1 == $hookName2) {
                return $hook1['line'] > $hook2['line'] ? 1 : -1;
            }

            return $hookName1 > $hookName2 ? 1 : -1;
        });

        return $hooks;
    }

    public function addUsages($hooks)
    {
        $pluginNames = $this->getPluginNames();

        foreach ($hooks as $index => $hook) {
            $hooks[$index]['usages'] = $this->findUsages($hook['name'], $pluginNames);
        }

        return $hooks;
    }

    private function findUsages($hookName, $pluginNames)
    {
        $usages = array();

        foreach ($pluginNames as $pluginName) {
            $plugin = \Piwik\Plugin\Manager::getInstance()->loadPlugin($pluginName);
            $registeredHooks = $plugin->getListHooksRegistered();

            if (!array_key_exists($hookName, $registeredHooks)) {
                continue;
            }

            $methodName = $registeredHooks[$hookName];

            if (!is_string($methodName)) {
                continue;
            }

            $className        = get_class($plugin);
            $reflectionClass  = new ReflectionClass($className);
            $reflectionMethod = $reflectionClass->getMethod($methodName);

            $usages[] = array(
                'methodName' => $reflectionMethod->getName(),
                'startLine'  => $reflectionMethod->getStartLine(),
                'className'  => $reflectionClass->getShortName(),
                'namespace'  => $reflectionClass->getNamespaceName(),
                'file'       => str_replace(PIWIK_INCLUDE_PATH, '', $reflectionClass->getFileName())
            );
        }

        return $usages;
    }

    protected function getPluginNames()
    {
        $pluginDirs = glob(PIWIK_INCLUDE_PATH . '/plugins/*', GLOB_ONLYDIR);

        $pluginNames = array();
        foreach ($pluginDirs as $pluginDir) {
            $pluginNames[] = basename($pluginDir);
        }

        return $pluginNames;
    }

    public function generateDocumentation($viewVariables, $target)
    {
        $loader = new Twig_Loader_Filesystem(__DIR__ . '/../template');
        $twig   = new Twig_Environment($loader, array());
        $filter = new Twig_SimpleFilter('onlyalnum', function ($string) {
            return preg_replace("/[^a-zA-Z0-9]+/", "", $string);
        });
        $twig->addFilter($filter);

        $documentation = $twig->render('hooks.twig', $viewVariables);

        file_put_contents($target, $documentation);
    }

}