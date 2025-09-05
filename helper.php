<?php
/**
 * @package     Joomla.Module
 * @subpackage  mod_r3d_pannellum
 * @creation    2025-09-05
 * @author      Richard Dvorak, r3d.de
 * @copyright   Copyright (C) 2025 Richard Dvorak, https://r3d.de
 * @license     GNU GPL v3 or later (https://www.gnu.org/licenses/gpl-3.0.html)
 * @version     5.1.0
 * @file        modules/mod_r3d_pannellum/helper.php
 */

defined('_JEXEC') or die;

use Joomla\Registry\Registry;

final class ModR3dPannellumHelper
{
    /**
     * Build Pannellum config array from params
     */
    public static function buildConfig(Registry $params): array
    {
        $cfg = [
            'type' => 'equirectangular',
            'panorama' => (string) $params->get('panorama', ''),
        ];

        // Core options (basic)
        $cfg['autoLoad'] = (bool) $params->get('autoload', 1);

        self::maybeNumber($cfg, 'yaw', $params->get('yaw', null));
        self::maybeNumber($cfg, 'pitch', $params->get('pitch', null));
        self::maybeNumber($cfg, 'hfov', $params->get('hfov', null));
        self::maybeNumber($cfg, 'minHfov', $params->get('min_hfov', null));
        self::maybeNumber($cfg, 'maxHfov', $params->get('max_hfov', null));

        // Auto-rotate
        self::maybeNumber($cfg, 'autoRotate', $params->get('auto_rotate', 0), 'float');
        self::maybeInt($cfg, 'autoRotateInactivityDelay', $params->get('auto_rotate_inactivity', 0));
        self::maybeInt($cfg, 'autoRotateStopDelay', $params->get('auto_rotate_stop', 0));

        // Controls
        self::maybeBool($cfg, 'showZoomCtrl', $params->get('show_zoom_ctrl', ''));
        self::maybeBool($cfg, 'showFullscreenCtrl', $params->get('show_fullscreen_ctrl', ''));
        self::maybeBool($cfg, 'doubleClickZoom', $params->get('double_click_zoom', ''));
        self::maybeBool($cfg, 'mouseZoom', $params->get('mouse_zoom', ''));
        self::maybeBool($cfg, 'disableKeyboardCtrl', $params->get('disable_keyboard_ctrl', ''));
        self::maybeBool($cfg, 'draggable', $params->get('draggable', ''));

        // Compass
        self::maybeBool($cfg, 'compass', $params->get('compass', ''));
        self::maybeNumber($cfg, 'northOffset', $params->get('north_offset', null));

        // Hotspots (intermediate)
        $hotspots = $params->get('hotspots', []);
        $hotspots = is_array($hotspots) ? $hotspots : [];

        $hsOut = [];
        foreach ($hotspots as $row) {
            // Subform may wrap values under the form's <fields name="hotspot">
            if (isset($row['hotspot']) && is_array($row['hotspot'])) {
                $row = $row['hotspot'];
            }

            $type = isset($row['type']) ? (string) $row['type'] : 'info';

            $hs = [
                'yaw' => isset($row['yaw']) && $row['yaw'] !== '' ? (float) $row['yaw'] : null,
                'pitch' => isset($row['pitch']) && $row['pitch'] !== '' ? (float) $row['pitch'] : null,
                'type' => ($type === 'link') ? 'info' : $type, // 'link' is modeled as 'info' + URL
            ];

            // Common
            if (!empty($row['text'])) {
                $hs['text'] = (string) $row['text'];
            }
            if (!empty($row['cssClass'])) {
                $hs['cssClass'] = (string) $row['cssClass'];
            }

            // Info / Link
            if ($type === 'info' || $type === 'link') {
                if (!empty($row['url'])) {
                    // Pannellum expects capital 'URL'
                    $hs['URL'] = (string) $row['url'];
                }
            }

            // Scene
            if ($type === 'scene') {
                if (!empty($row['sceneId'])) {
                    $hs['sceneId'] = (string) $row['sceneId'];
                }
                if ($row['targetYaw'] !== '' && $row['targetYaw'] !== null)
                    $hs['targetYaw'] = (float) $row['targetYaw'];
                if ($row['targetPitch'] !== '' && $row['targetPitch'] !== null)
                    $hs['targetPitch'] = (float) $row['targetPitch'];
                if ($row['targetHfov'] !== '' && $row['targetHfov'] !== null)
                    $hs['targetHfov'] = (float) $row['targetHfov'];
            }

            // Drop nulls
            $hs = array_filter($hs, static function ($v) {
                return $v !== null && $v !== ''; });

            // Minimal required: type + yaw + pitch
            if (!isset($hs['yaw']) || !isset($hs['pitch'])) {
                continue;
            }
            $hsOut[] = $hs;
        }

        if ($hsOut) {
            $cfg['hotSpots'] = $hsOut;
        }

        return $cfg;
    }

    private static function maybeNumber(array &$cfg, string $key, $val, string $cast = 'float'): void
    {
        if ($val === '' || $val === null)
            return;
        $cfg[$key] = ($cast === 'int') ? (int) $val : (float) $val;
    }

    private static function maybeInt(array &$cfg, string $key, $val): void
    {
        self::maybeNumber($cfg, $key, $val, 'int');
    }

    private static function maybeBool(array &$cfg, string $key, $val): void
    {
        if ($val === '' || $val === null)
            return;
        $cfg[$key] = (bool) (int) $val;
    }
}
