<?php
/**
 * @copyright	Copyright © 2016 R3D - All rights reserved.
 * @license		GNU General Public License v2.0
 * @generator	http://xdsoft/joomla-module-generator/
 */
defined('_JEXEC') or die;

/* Available fields:"panorama_id","type","title","author","basepath","autoload","autorotate",
"autorotateinactivitydelay","autorotatestopdelay","preview_image","dynamic","fallback",
"orientationonbydefault","showzoomctrl","keyboardzoom","mousezoom","showfullscreenctrl",
"showcontrols","yaw","pitch","hfov","compass","northoffset","northoffset","panorama","haov",
"vaov","voffset","ignoregpanoxmp","backgroundcolor","cubemap","multires_basepath","multires_path",
"multires_fallbackpath","multires_extension","multires_tileresolution","multires_maxlevel",
"multires_cuberesolution","hotspots_pitch","hotspots_yaw","hotspots_type","hotspots_text",
"hotspots_url","hotspots_sceneid","hotspots_sceneid","targetpitch","targetyaw","targethfov",
"hotspots_cssclass","hotspotdebug","scenefadeduration", */
// get BASIC params for pannellum
$panorama_id					= $params->get('panorama_id', 'panorama');
$type							= $params->get('type', 'equirectangular');
$title							= $params->get('title', 'ALMA Correlator Facility');
$author							= $params->get('author', 'Matthew Petroff');
$basepath						= $params->get('basepath', 'modules/mod_r3d_pannellum/samples/');
$autoload						= $params->get('autoLoad', '0');
$autorotate						= $params->get('autorotate', '');
$autorotateinactivitydelay		= $params->get('autorotateinactivitydelay', '');
$autorotatestopdelay			= $params->get('autorotatestopdelay', '');
$preview_image					= $params->get('preview_image', 'alma-preview.jpg');
$fallback						= $params->get('fallback', '');
$orientationonbydefault			= $params->get('orientationonbydefault', '');
$showzoomctrl					= $params->get('showzoomctrl', '1');
$keyboardzoom					= $params->get('keyboardzoom', '1');
$mousezoom						= $params->get('mousezoom', '1');
$showfullscreenctrl				= $params->get('showfullscreenctrl', '1');
$showcontrols					= $params->get('showcontrols', '1');
$yaw							= $params->get('yaw', '0');
$pitch							= $params->get('pitch', '0');
$hfov							= $params->get('hfov', '0');
$compass						= $params->get('compass', '0');
$northoffset					= $params->get('northoffset', '');

// get EQUIRECTANGULAR_OPTIONS: "panorama","haov","vaov","voffset","ignoregpanoxmp","backgroundcolor"
$panorama						= $params->get('panorama', 'alma.jpg');
$haov							= $params->get('haov', '');
$vaov							= $params->get('vaov', '');
$voffset						= $params->get('voffset', '');
$ignoregpanoxmp					= $params->get('ignoregpanoxmp', '0');
$backgroundcolor				= $params->get('backgroundcolor', '');

// get CUBEMAP: "cubemap",
$cubemap						= $params->get('cubemap', '');

//get MULTIRES: multires_basepath   multires_path    multires_fallbackpath 
// multires_extension multires_tileresolution multires_maxlevel multires_cuberesolution
$multires_title					= $params->get('multires_title', 'George Peabody Library');
$multires_author				= $params->get('multires_author', 'Matthew Petroff');
$multires_preview_image			= $params->get('multires_preview_image', 'modules/mod_r3d_pannellum/samples/Library_Preview.jpg');
$multires_basepath				= $params->get('multires_basepath', 'https:\/\/pannellum.org/images/multires/library');
$multires_path					= $params->get('multires_path', '/%l/%s%y_%x');
$multires_fallbackpath			= $params->get('multires_fallbackpath', '');
$multires_extension				= $params->get('multires_extension', 'jpg');
$multires_tileresolution		= $params->get('multires_tileresolution', '');
$multires_maxlevel				= $params->get('multires_maxlevel', '');
$multires_cuberesolution		= $params->get('multires_cuberesolution', '');

// get HOTSPOTS: "hotspots_pitch","hotspots_yaw","hotspots_type","hotspots_text","hotspots_url
// hotspots_sceneid","targetpitch","targetyaw","targethfov
// hotspots_cssclass","hotspotdebug","scenefadeduration
$hotspots_pitch					= $params->get('hotspots_pitch', '');
$hotspots_yaw					= $params->get('hotspots_yaw', '');
$hotspots_type					= $params->get('hotspots_type', '');
$hotspots_text					= $params->get('hotspots_text', '');
$hotspots_url					= $params->get('hotspots_url', '');
$hotspots_sceneid				= $params->get('hotspots_sceneid', '');
$targetpitch					= $params->get('targetpitch', '');
$targetyaw						= $params->get('targetyaw', '');
$targethfov						= $params->get('targethfov', '');
$hotspots_cssclass				= $params->get('hotspots_cssclass', '');
$hotspotdebug					= $params->get('hotspotdebug', '');
$scenefadeduration				= $params->get('scenefadeduration', '');



$doc = JFactory::getDocument();

// Include assets
//<link rel="stylesheet" href="css/bootstrap.min.css">
//<script type="text/javascript" src="js/bootstrap-native.min.js"></script>
//<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600%7CSource+Code+Pro:400,600' rel='stylesheet' type='text/css'>
//<link rel="stylesheet" href="css/pygments.css">
//<link rel="stylesheet" href="css/pannellum.css"/>
//<script type="text/javascript" src="js/pannellum.js"></script>
//<link rel="stylesheet" href="css/style.css">

$doc->addStyleSheet(JURI::root()."modules/mod_r3d_pannellum/assets/css/bootstrap.min.css");
$doc->addScript(JURI::root()."modules/mod_r3d_pannellum/assets/js/bootstrap-native.min.js");
$doc->addStyleSheet("https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600%7CSource+Code+Pro:400,600");
$doc->addStyleSheet(JURI::root()."modules/mod_r3d_pannellum/assets/css/pygments.css");
$doc->addStyleSheet(JURI::root()."modules/mod_r3d_pannellum/assets/css/pannellum.css");
$doc->addScript(JURI::root()."modules/mod_r3d_pannellum/assets/js/pannellum.js");
$doc->addStyleSheet(JURI::root()."modules/mod_r3d_pannellum/assets/css/style.css");


require JModuleHelper::getLayoutPath('mod_r3d_pannellum', $params->get('layout', 'default'));