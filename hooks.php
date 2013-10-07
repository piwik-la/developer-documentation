<?php
/**
 * Piwik - Open source web analytics
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 * @package Piwik
 */

require 'vendor/autoload.php';
require 'vendor/nikic/php-parser/lib/bootstrap.php';
require 'hooks/hooks.php';
ini_set('xdebug.max_nesting_level', 2000);

$target   = __DIR__ . '/docs/Hooks.md';
$piwikDir = __DIR__ . '/piwik/core';

$files    = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($piwikDir));
$phpFiles = new RegexIterator($files, '/\.php$/');

try {

    $hooks = new Hooks();
    $view  = array('hooks' => array());

    foreach ($phpFiles as $phpFile) {

        $foundHooks = $hooks->searchForHooksInFile($piwikDir, $phpFile);

        if (!empty($foundHooks)) {
            foreach ($foundHooks as $hook) {
                $view['hooks'][] = $hook;
            }
        }
    }

    $view['hooks'] = $hooks->sortHooksByName($view['hooks']);

    $hooks->generateDocumentation($view, $target);

} catch (Exception $e) {
    echo 'Parse Error: ', $e->getMessage();
}