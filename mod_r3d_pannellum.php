<?php
/**
 * @copyright	Copyright © 2016 R3D - All rights reserved.
 * @license		GNU General Public License v2.0
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

// OPTIONAL FIELDS
$optionalfields                 = $params->get('optionalfields', '0');
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
$cubemap_front					= $params->get('cubemap_front', 'examplepanocube0.jpg');
$cubemap_right					= $params->get('cubemap_right', 'examplepanocube1.jpg');
$cubemap_back					= $params->get('cubemap_back', 'examplepanocube2.jpg');
$cubemap_left					= $params->get('cubemap_left', 'examplepanocube3.jpg');
$cubemap_up						= $params->get('cubemap_up', 'examplepanocube4.jpg');
$cubemap_down					= $params->get('cubemap_down', 'examplepanocube5.jpg');

//get MULTIRES: multires_basepath   multires_path    multires_fallbackpath 
// multires_extension multires_tileresolution multires_maxlevel multires_cuberesolution
$multires_title					= $params->get('multires_title', 'George Peabody Library');
$multires_author				= $params->get('multires_author', 'Matthew Petroff');
$multires_preview_image			= $params->get('multires_preview_image', '/modules/mod_r3d_pannellum/samples/Library_Preview.jpg');
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

$hotspotdebug					= $params->get('hotspotdebug', 'false');
$tour_firstscene                = $params->get('tour_firstscene', '');

$multiple_hotspots = $params->get('multiple_hotspots');
$total = count((array)$multiple_hotspots);
$hloops = $total-1;
foreach ($multiple_hotspots as $key => $value) {

    $hotspots_type[] 	= $value->hotspots_type;
    $hotspots_pitch[] 	= $value->hotspots_pitch;
    $hotspots_yaw[] 	= $value->hotspots_yaw;
    $hotspots_text[] 	= $value->hotspots_text;
    $hotspots_url[] 	= $value->hotspots_url;
// tour only
    $hotspots_sceneid[] 	= $value->hotspots_sceneid;
    $targetpitch[] 			= $value->targetpitch;
    $targetyaw[] 			= $value->targetyaw;
    $targethfov[] 			= $value->targethfov;
    $hotspots_cssclass[] 	= $value->hotspots_cssclass;
    $scenefadeduration[] 	= $value->scenefadeduration;
}



// get VIDEO:
$dynamic						= $params->get('dynamic', '1');
$video_classes					= $params->get('video_classes', 'video-js vjs-default-skin vjs-big-play-centered');
$video_controls					= $params->get('video_controls', '1');
$video_autoplay					= $params->get('video_autoplay', '0');
$video_preload					= $params->get('video_preload', 'none');
$video_style					= $params->get('video_style', 'width:100%;height:390px;');
$video_poster					= $params->get('video_poster', 'https://pannellum.org/images/video/jfk-poster.jpg');
$video_loop						= $params->get('video_loop', '0');
$video_datasetup				= $params->get('video_datasetup', '0');
$video_crossorigin				= $params->get('video_crossorigin', '1');
$video_webmsource				= $params->get('video_webmsource', 'https://pannellum.org/images/video/jfk.webm');
$video_mp4source				= $params->get('video_mp4source', 'ttps://pannellum.org//images/video/jfk.mp4');


$doc = JFactory::getDocument();

// Include assets
$doc->addStyleSheet(JURI::root()."modules/mod_r3d_pannellum/assets/css/bootstrap.min.css");
$doc->addScript(JURI::root()."modules/mod_r3d_pannellum/assets/js/bootstrap-native.min.js");
$doc->addStyleSheet("https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600%7CSource+Code+Pro:400,600");
$doc->addStyleSheet(JURI::root()."modules/mod_r3d_pannellum/assets/css/pygments.css");
$doc->addStyleSheet(JURI::root()."modules/mod_r3d_pannellum/assets/css/pannellum.css");
$doc->addScript(JURI::root()."modules/mod_r3d_pannellum/assets/js/pannellum.js");
$doc->addStyleSheet(JURI::root()."modules/mod_r3d_pannellum/assets/css/style.css");


require JModuleHelper::getLayoutPath('mod_r3d_pannellum', $params->get('layout', 'default'));