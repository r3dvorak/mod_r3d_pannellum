<?php
/**
 * @package     Joomla.Module
 * @subpackage  mod_r3d_pannellum
 * @creation    2025-09-03
 * @author      Richard Dvorak, r3d.de
 * @copyright   Copyright (C) 2025 Richard Dvorak, https://r3d.de
 * @license     GNU GPL v3 or later (https://www.gnu.org/licenses/gpl-3.0.html)
 * @version     5.0.0
 * @file        modules/mod_r3d_pannellum/mod_r3d_pannellum.php
 */

defined('_JEXEC') or die;

use Joomla\CMS\Helper\ModuleHelper;

require_once __DIR__ . '/helper.php';

$config = ModR3dPannellumHelper::getConfig($params);

require ModuleHelper::getLayoutPath('mod_r3d_pannellum', $params->get('layout', 'default'));
