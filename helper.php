<?php
/**
 * @package     Joomla.Module
 * @subpackage  mod_r3d_pannellum
 * @creation    2025-09-04
 * @author      Richard Dvorak, r3d.de
 * @copyright   Copyright (C) 2025 Richard Dvorak, https://r3d.de
 * @license     GNU GPL v3 or later (https://www.gnu.org/licenses/gpl-3.0.html)
 * @version     5.0.1
 * @file        modules/mod_r3d_pannellum/helper.php
 */

defined('_JEXEC') or die;

use Joomla\CMS\Uri\Uri;

/**
 * Helper class for R3D Pannellum Module
 */
class ModR3dPannellumHelper
{
    /**
     * Build config JSON for Pannellum.
     *
     * Ensures the panorama path becomes an absolute URL so it won't be affected
     * by page base paths or subdirectory installs.
     *
     * @param   \Joomla\Registry\Registry  $params  Module parameters
     * @return  string  JSON configuration for viewer
     */
    public static function getConfig($params)
    {
        // Get panorama parameter; default to the demo image installed under /media/
        $panorama = (string) $params->get('panorama', 'media/mod_r3d_pannellum/demo.jpg');

        // If it's not already absolute, prefix with the site root
        if (
            $panorama !== '' &&
            strpos($panorama, 'http://') !== 0 &&
            strpos($panorama, 'https://') !== 0 &&
            strpos($panorama, '//') !== 0
        ) {
            $panorama = rtrim(Uri::root(), '/') . '/' . ltrim($panorama, '/');
        }

        $config = [
            'type' => 'equirectangular',
            'panorama' => $panorama,
            'autoLoad' => (bool) $params->get('autoload', 1),
        ];

        return json_encode($config, JSON_UNESCAPED_SLASHES);
    }
}
