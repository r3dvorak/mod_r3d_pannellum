<?php
/**
 * @package     Joomla.Module
 * @subpackage  mod_r3d_pannellum
 * @creation    2025-09-03
 * @author      Richard Dvorak, r3d.de
 * @copyright   Copyright (C) 2025 Richard Dvorak, https://r3d.de
 * @license     GNU GPL v3 or later (https://www.gnu.org/licenses/gpl-3.0.html)
 * @version     5.0.0
 * @file        modules/mod_r3d_pannellum/helper.php
 */

defined('_JEXEC') or die;

/**
 * Helper class for R3D Pannellum Module
 */
class ModR3dPannellumHelper
{
    /**
     * Build config JSON for Pannellum
     *
     * @param   \Joomla\Registry\Registry  $params  Module parameters
     * @return  string  JSON configuration for viewer
     */
    public static function getConfig($params)
    {
        // Basic setup only (mock Intermediate/Advanced)
        $config = [
            'type'     => 'equirectangular',
            'panorama' => $params->get('panorama', 'media/mod_r3d_pannellum/demo.jpg'),
            'autoLoad' => (bool) $params->get('autoload', 1),
        ];

        return json_encode($config);
    }
}
