<?php
/**
 * @package     Joomla.Module
 * @subpackage  mod_r3d_pannellum
 * @creation    2025-09-04
 * @author      Richard Dvorak, r3d.de
 * @copyright   Copyright (C) 2025 Richard Dvorak, https://r3d.de
 * @license     GNU GPL v3 or later (https://www.gnu.org/licenses/gpl-3.0.html)
 * @version     5.0.2
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
     * Build config JSON for Pannellum (Basic + extras).
     *
     * @param   \Joomla\Registry\Registry  $params  Module parameters
     * @return  string  JSON configuration for viewer
     */
    public static function getConfig($params)
    {
        // Resolve panorama to absolute URL (avoids base path issues)
        $panorama = (string) $params->get('panorama', 'media/mod_r3d_pannellum/demo.jpg');
        if (
            $panorama !== '' &&
            strpos($panorama, 'http://') !== 0 &&
            strpos($panorama, 'https://') !== 0 &&
            strpos($panorama, '//') !== 0
        ) {
            $panorama = rtrim(Uri::root(), '/') . '/' . ltrim($panorama, '/');
        }

        $cfg = [
            'type' => 'equirectangular',
            'panorama' => $panorama,
            'autoLoad' => (bool) $params->get('autoload', 1),
        ];

        // --- Initial view ---
        $yaw = $params->get('yaw', '');
        $pitch = $params->get('pitch', '');
        $hfov = $params->get('hfov', '');
        if ($yaw !== '') {
            $cfg['yaw'] = (float) $yaw;
        }
        if ($pitch !== '') {
            $cfg['pitch'] = (float) $pitch;
        }
        if ($hfov !== '') {
            $cfg['hfov'] = (float) $hfov;
        }

        $minH = $params->get('min_hfov', '');
        $maxH = $params->get('max_hfov', '');
        if ($minH !== '') {
            $cfg['minHfov'] = (float) $minH;
        }
        if ($maxH !== '') {
            $cfg['maxHfov'] = (float) $maxH;
        }

        // --- Auto-rotate ---
        $ar = $params->get('auto_rotate', '');
        if ($ar !== '' && (float) $ar !== 0.0) {
            $cfg['autoRotate'] = (float) $ar; // deg/sec; +ccw, -cw
            $arIdle = (int) $params->get('auto_rotate_inactivity', 0);
            $arStop = (int) $params->get('auto_rotate_stop', 0);
            if ($arIdle > 0) {
                $cfg['autoRotateInactivityDelay'] = $arIdle;
            }
            if ($arStop > 0) {
                $cfg['autoRotateStopDelay'] = $arStop;
            }
        }

        // --- Controls & Interaction ---
        $cfg['showZoomCtrl'] = (bool) $params->get('show_zoom_ctrl', 1);
        $cfg['showFullscreenCtrl'] = (bool) $params->get('show_fullscreen_ctrl', 1);

        $dcZoom = $params->get('double_click_zoom', '');
        if ($dcZoom !== '') {
            $cfg['doubleClickZoom'] = (bool) $dcZoom;
        }

        $mouseZoom = $params->get('mouse_zoom', '');
        if ($mouseZoom !== '') {
            $cfg['mouseZoom'] = (bool) $mouseZoom;
        }

        $disableKb = $params->get('disable_keyboard_ctrl', '');
        if ($disableKb !== '') {
            $cfg['disableKeyboardCtrl'] = (bool) $disableKb;
        }

        $draggable = $params->get('draggable', '');
        if ($draggable !== '') {
            $cfg['draggable'] = (bool) $draggable;
        }

        // --- Compass ---
        $compass = $params->get('compass', '');
        if ($compass !== '') {
            $cfg['compass'] = (bool) $compass;
        }
        $north = $params->get('north_offset', '');
        if ($north !== '') {
            $cfg['northOffset'] = (float) $north;
        }

        return json_encode($cfg, JSON_UNESCAPED_SLASHES);
    }
}
