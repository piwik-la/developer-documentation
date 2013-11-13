<?php
/**
 * Piwik - Open source web analytics
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 */

namespace helpers;

class Home {

    private static function getUrl($key)
    {
        return '/' . $key;
    }

    public static function getMenuItemByUrl($url)
    {
        foreach (static::getMainMenu() as $menu) {
            if (0 === strpos($url, $menu['url'])) {
                return $menu;
            }
        }
    }

    public static function getMainMenu()
    {
        $menu = array();

        $menu[] = array(
            'title'        => 'Guides',
            'url'          => static::getUrl('guides'),
            'description'  => 'Extend Piwik by writing your own plugins or themes. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.',
            'callToAction' => 'Get started'
        );

        $menu[] = array(
            'title'        => 'API Reference',
            'url'          => static::getUrl('api-reference'),
            'description'  => 'Extend Piwik by writing your own plugins or themes. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.',
            'callToAction' => 'View Details'
        );

        $menu[] = array(
            'title'        => 'Support',
            'url'          => static::getUrl('support'),
            'description'  => 'Extend Piwik by writing your own plugins or themes. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.',
            'callToAction' => 'Get help'
        );

        return $menu;
    }

}