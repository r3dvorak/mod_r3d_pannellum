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
$ptype							= $params->get('ptype', 'equirectangular');
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
$panorama						= $params->get('panorama', 'https://pannellum.org/images/alma.jpg');
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

$multiple_hotspots = $params->get('multiple_hotspots');
$total = count((array)$multiple_hotspots);
$hloops = $total-1;
foreach ($multiple_hotspots as $hkey => $hvalue) {
    $hotspots_type[]    = $hvalue->hotspots_type;
    $hotspots_pitch[]   = $hvalue->hotspots_pitch;
    $hotspots_yaw[]     = $hvalue->hotspots_yaw;
    $hotspots_text[]    = $hvalue->hotspots_text;
    $hotspots_url[]     = $hvalue->hotspots_url;
}

// get TOURS: 
$tours_hotspotdebug             = $params->get('tours_hotspotdebug', 'false');
$tours_firstscene               = $params->get('tours_firstscene', '');


// get SCENE ONE - most params taken from default page 
$scene_one_sceneid               = $params->get('scene_one_sceneid', 'scene-one');

$scene_one_params = $params->get('scene_one');
$stotalone = count((array)$scene_one_params);
$tloopsone = $stotalone-1;
//if (is_array($multiple_tours) || is_object($multiple_tours)) {
foreach ($scene_one_params as $sonekey => $sonevalue) {
        $scene_one_connect2_sceneid[]   = $sonevalue->scene_one_connect2_sceneid;
        $scene_one_shfov[]               = $sonevalue->scene_one_shfov;
        $scene_one_syaw[]                = $sonevalue->scene_one_syaw;
        $scene_one_spitch[]              = $sonevalue->scene_one_spitch;
        $scene_one_targetpitch[]        = $sonevalue->scene_one_targetpitch;
        $scene_one_targetyaw[]          = $sonevalue->scene_one_targetyaw;
        $scene_one_targethfov[]         = $sonevalue->scene_one_targethfov;
        $scene_one_scenefadeduration[]  = $sonevalue->scene_one_scenefadeduration;
        $scene_one_hotspots_cssclass[]  = $sonevalue->scene_one_hotspots_cssclass;
    }
//}
$scene_one_hotspots = $params->get('scene_one_hotspots');
$htotalone = count((array)$scene_one_hotspots);
$hloopsone = $htotalone-1;
foreach ($scene_one_hotspots as $honekey => $honevalue) {
    $scene_one_hotspots_pitch[]   = $honevalue->scene_one_hotspots_pitch;
    $scene_one_hotspots_yaw[]     = $honevalue->scene_one_hotspots_yaw;
    $scene_one_hotspots_text[]    = $honevalue->scene_one_hotspots_text;
    $scene_one_hotspots_url[]     = $honevalue->scene_one_hotspots_url;
}




// get SCENE TWO  ####################################################
$scene_two_sceneid                  = $params->get('scene_two_sceneid', 'scene-two');
$scene_two_title                    = $params->get('scene_two_title', 'Scene Two');
$scene_two_author                   = $params->get('scene_two_author', '');
// equirectangular
$scene_two_panorama                 = $params->get('scene_two_panorama', '');
$scene_two_yaw                      = $params->get('scene_two_yaw', '');
$scene_two_pitch                    = $params->get('scene_two_pitch', '');
$scene_two_hfov                     = $params->get('scene_two_hfov', '');
// cubemap
$scene_two_mycubemap                = $params->get('scene_two_mycubemap', '');
$scene_two_cubemap_front            = $params->get('scene_two_cubemap_front', '');
$scene_two_cubemap_right            = $params->get('scene_two_cubemap_right', '');
$scene_two_cubemap_back             = $params->get('scene_two_cubemap_back', '');
$scene_two_cubemap_left             = $params->get('scene_two_cubemap_left', '');
$scene_two_cubemap_up               = $params->get('scene_two_cubemap_up', '');
$scene_two_cubemap_down             = $params->get('scene_two_cubemap_down', '');
// multires
$scene_two_multires_preview_image   = $params->get('scene_two_multires_preview_image', '');
$scene_two_multires_basepath        = $params->get('scene_two_multires_basepath', '');
$scene_two_multires_path            = $params->get('scene_two_multires_path', '');
$scene_two_multires_fallbackpath    = $params->get('scene_two_multires_fallbackpath', '');
$scene_two_multires_extension       = $params->get('scene_two_multires_extension', '');
$scene_two_multires_tileresolution  = $params->get('scene_two_multires_tileresolution', '');
$scene_two_multires_maxlevel        = $params->get('scene_two_multires_maxlevel', '');
$scene_two_multires_cuberesolution  = $params->get('scene_two_multires_cuberesolution', '');


$scene_two_params = $params->get('scene_two');
$stotaltwo = count((array)$scene_two_params);
$tloopstwo = $stotaltwo-1;

foreach ($scene_two_params as $stwokey => $stwovalue) {
        $scene_two_connect2_sceneid[]   = $stwovalue->scene_two_connect2_sceneid;
        $scene_two_shfov[]               = $stwovalue->scene_two_shfov;
        $scene_two_syaw[]                = $stwovalue->scene_two_syaw;
        $scene_two_spitch[]              = $stwovalue->scene_two_spitch;
        $scene_two_targetpitch[]        = $stwovalue->scene_two_targetpitch;
        $scene_two_targetyaw[]          = $stwovalue->scene_two_targetyaw;
        $scene_two_targethfov[]         = $stwovalue->scene_two_targethfov;
        $scene_two_scenefadeduration[]  = $stwovalue->scene_two_scenefadeduration;
        $scene_two_hotspots_cssclass[]  = $stwovalue->scene_two_hotspots_cssclass;
    }

$scene_two_hotspots = $params->get('scene_two_hotspots');
$htotaltwo = count((array)$scene_two_hotspots);
$hloopstwo = $htotaltwo-1;
foreach ($scene_two_hotspots as $htwokey => $htwovalue) {
    $scene_two_hotspots_pitch[]   = $htwovalue->scene_two_hotspots_pitch;
    $scene_two_hotspots_yaw[]     = $htwovalue->scene_two_hotspots_yaw;
    $scene_two_hotspots_text[]    = $htwovalue->scene_two_hotspots_text;
    $scene_two_hotspots_url[]     = $htwovalue->scene_two_hotspots_url;
}






// get SCENE THREE  ####################################################
$scene_three_sceneid                  = $params->get('scene_three_sceneid', 'scene-three');
$scene_three_title                    = $params->get('scene_three_title', 'Scene Three');
$scene_three_author                   = $params->get('scene_three_author', '');
// equirectangular
$scene_three_panorama                 = $params->get('scene_three_panorama', '');
$scene_three_yaw                      = $params->get('scene_three_yaw', '');
$scene_three_pitch                    = $params->get('scene_three_pitch', '');
$scene_three_hfov                     = $params->get('scene_three_hfov', '');
// cubemap
$scene_three_mycubemap                = $params->get('scene_three_mycubemap', '');
$scene_three_cubemap_front            = $params->get('scene_three_cubemap_front', '');
$scene_three_cubemap_right            = $params->get('scene_three_cubemap_right', '');
$scene_three_cubemap_back             = $params->get('scene_three_cubemap_back', '');
$scene_three_cubemap_left             = $params->get('scene_three_cubemap_left', '');
$scene_three_cubemap_up               = $params->get('scene_three_cubemap_up', '');
$scene_three_cubemap_down             = $params->get('scene_three_cubemap_down', '');
// multires
$scene_three_multires_preview_image   = $params->get('scene_three_multires_preview_image', '');
$scene_three_multires_basepath        = $params->get('scene_three_multires_basepath', '');
$scene_three_multires_path            = $params->get('scene_three_multires_path', '');
$scene_three_multires_fallbackpath    = $params->get('scene_three_multires_fallbackpath', '');
$scene_three_multires_extension       = $params->get('scene_three_multires_extension', '');
$scene_three_multires_tileresolution  = $params->get('scene_three_multires_tileresolution', '');
$scene_three_multires_maxlevel        = $params->get('scene_three_multires_maxlevel', '');
$scene_three_multires_cuberesolution  = $params->get('scene_three_multires_cuberesolution', '');


$scene_three_params = $params->get('scene_three');
$stotalthree = count((array)$scene_three_params);
$tloopsthree = $stotalthree-1;

foreach ($scene_three_params as $sthreekey => $sthreevalue) {
        $scene_three_connect2_sceneid[]   = $sthreevalue->scene_three_connect2_sceneid;
        $scene_three_shfov[]               = $sthreevalue->scene_three_shfov;
        $scene_three_syaw[]                = $sthreevalue->scene_three_syaw;
        $scene_three_spitch[]              = $sthreevalue->scene_three_spitch;
        $scene_three_targetpitch[]        = $sthreevalue->scene_three_targetpitch;
        $scene_three_targetyaw[]          = $sthreevalue->scene_three_targetyaw;
        $scene_three_targethfov[]         = $sthreevalue->scene_three_targethfov;
        $scene_three_scenefadeduration[]  = $sthreevalue->scene_three_scenefadeduration;
        $scene_three_hotspots_cssclass[]  = $sthreevalue->scene_three_hotspots_cssclass;
    }

$scene_three_hotspots = $params->get('scene_three_hotspots');
$htotalthree = count((array)$scene_three_hotspots);
$hloopsthree = $htotalthree-1;
foreach ($scene_three_hotspots as $hthreekey => $hthreevalue) {
    $scene_three_hotspots_pitch[]   = $hthreevalue->scene_three_hotspots_pitch;
    $scene_three_hotspots_yaw[]     = $hthreevalue->scene_three_hotspots_yaw;
    $scene_three_hotspots_text[]    = $hthreevalue->scene_three_hotspots_text;
    $scene_three_hotspots_url[]     = $hthreevalue->scene_three_hotspots_url;
}





// get SCENE FOUR  ####################################################
$scene_four_sceneid                  = $params->get('scene_four_sceneid', 'scene-four');
$scene_four_title                    = $params->get('scene_four_title', 'Scene Four');
$scene_four_author                   = $params->get('scene_four_author', '');
// equirectangular
$scene_four_panorama                 = $params->get('scene_four_panorama', '');
$scene_four_yaw                      = $params->get('scene_four_yaw', '');
$scene_four_pitch                    = $params->get('scene_four_pitch', '');
$scene_four_hfov                     = $params->get('scene_four_hfov', '');
// cubemap
$scene_four_mycubemap                = $params->get('scene_four_mycubemap', '');
$scene_four_cubemap_front            = $params->get('scene_four_cubemap_front', '');
$scene_four_cubemap_right            = $params->get('scene_four_cubemap_right', '');
$scene_four_cubemap_back             = $params->get('scene_four_cubemap_back', '');
$scene_four_cubemap_left             = $params->get('scene_four_cubemap_left', '');
$scene_four_cubemap_up               = $params->get('scene_four_cubemap_up', '');
$scene_four_cubemap_down             = $params->get('scene_four_cubemap_down', '');
// multires
$scene_four_multires_preview_image   = $params->get('scene_four_multires_preview_image', '');
$scene_four_multires_basepath        = $params->get('scene_four_multires_basepath', '');
$scene_four_multires_path            = $params->get('scene_four_multires_path', '');
$scene_four_multires_fallbackpath    = $params->get('scene_four_multires_fallbackpath', '');
$scene_four_multires_extension       = $params->get('scene_four_multires_extension', '');
$scene_four_multires_tileresolution  = $params->get('scene_four_multires_tileresolution', '');
$scene_four_multires_maxlevel        = $params->get('scene_four_multires_maxlevel', '');
$scene_four_multires_cuberesolution  = $params->get('scene_four_multires_cuberesolution', '');


$scene_four_params = $params->get('scene_four');
$stotalfour = count((array)$scene_four_params);
$tloopsfour = $stotalfour-1;

foreach ($scene_four_params as $sfourkey => $sfourvalue) {
        $scene_four_connect2_sceneid[]   = $sfourvalue->scene_four_connect2_sceneid;
        $scene_four_shfov[]               = $sfourvalue->scene_four_shfov;
        $scene_four_syaw[]                = $sfourvalue->scene_four_syaw;
        $scene_four_spitch[]              = $sfourvalue->scene_four_spitch;
        $scene_four_targetpitch[]        = $sfourvalue->scene_four_targetpitch;
        $scene_four_targetyaw[]          = $sfourvalue->scene_four_targetyaw;
        $scene_four_targethfov[]         = $sfourvalue->scene_four_targethfov;
        $scene_four_scenefadeduration[]  = $sfourvalue->scene_four_scenefadeduration;
        $scene_four_hotspots_cssclass[]  = $sfourvalue->scene_four_hotspots_cssclass;
    }

$scene_four_hotspots = $params->get('scene_four_hotspots');
$htotalfour = count((array)$scene_four_hotspots);
$hloopsfour = $htotalfour-1;
foreach ($scene_four_hotspots as $hfourkey => $hfourvalue) {
    $scene_four_hotspots_pitch[]   = $hfourvalue->scene_four_hotspots_pitch;
    $scene_four_hotspots_yaw[]     = $hfourvalue->scene_four_hotspots_yaw;
    $scene_four_hotspots_text[]    = $hfourvalue->scene_four_hotspots_text;
    $scene_four_hotspots_url[]     = $hfourvalue->scene_four_hotspots_url;
}




// get SCENE FIVE  ####################################################
$scene_five_sceneid                  = $params->get('scene_five_sceneid', 'scene-five');
$scene_five_title                    = $params->get('scene_five_title', 'Scene Five');
$scene_five_author                   = $params->get('scene_five_author', '');
// equirectangular
$scene_five_panorama                 = $params->get('scene_five_panorama', '');
$scene_five_yaw                      = $params->get('scene_five_yaw', '');
$scene_five_pitch                    = $params->get('scene_five_pitch', '');
$scene_five_hfov                     = $params->get('scene_five_hfov', '');
// cubemap
$scene_five_mycubemap                = $params->get('scene_five_mycubemap', '');
$scene_five_cubemap_front            = $params->get('scene_five_cubemap_front', '');
$scene_five_cubemap_right            = $params->get('scene_five_cubemap_right', '');
$scene_five_cubemap_back             = $params->get('scene_five_cubemap_back', '');
$scene_five_cubemap_left             = $params->get('scene_five_cubemap_left', '');
$scene_five_cubemap_up               = $params->get('scene_five_cubemap_up', '');
$scene_five_cubemap_down             = $params->get('scene_five_cubemap_down', '');
// multires
$scene_five_multires_preview_image   = $params->get('scene_five_multires_preview_image', '');
$scene_five_multires_basepath        = $params->get('scene_five_multires_basepath', '');
$scene_five_multires_path            = $params->get('scene_five_multires_path', '');
$scene_five_multires_fallbackpath    = $params->get('scene_five_multires_fallbackpath', '');
$scene_five_multires_extension       = $params->get('scene_five_multires_extension', '');
$scene_five_multires_tileresolution  = $params->get('scene_five_multires_tileresolution', '');
$scene_five_multires_maxlevel        = $params->get('scene_five_multires_maxlevel', '');
$scene_five_multires_cuberesolution  = $params->get('scene_five_multires_cuberesolution', '');


$scene_five_params = $params->get('scene_five');
$stotalfive = count((array)$scene_five_params);
$tloopsfive = $stotalfive-1;

foreach ($scene_five_params as $sfivekey => $sfivevalue) {
        $scene_five_connect2_sceneid[]   = $sfivevalue->scene_five_connect2_sceneid;
        $scene_five_shfov[]               = $sfivevalue->scene_five_shfov;
        $scene_five_syaw[]                = $sfivevalue->scene_five_syaw;
        $scene_five_spitch[]              = $sfivevalue->scene_five_spitch;
        $scene_five_targetpitch[]        = $sfivevalue->scene_five_targetpitch;
        $scene_five_targetyaw[]          = $sfivevalue->scene_five_targetyaw;
        $scene_five_targethfov[]         = $sfivevalue->scene_five_targethfov;
        $scene_five_scenefadeduration[]  = $sfivevalue->scene_five_scenefadeduration;
        $scene_five_hotspots_cssclass[]  = $sfivevalue->scene_five_hotspots_cssclass;
    }

$scene_five_hotspots = $params->get('scene_five_hotspots');
$htotalfive = count((array)$scene_five_hotspots);
$hloopsfive = $htotalfive-1;
foreach ($scene_five_hotspots as $hfivekey => $hfivevalue) {
    $scene_five_hotspots_pitch[]   = $hfivevalue->scene_five_hotspots_pitch;
    $scene_five_hotspots_yaw[]     = $hfivevalue->scene_five_hotspots_yaw;
    $scene_five_hotspots_text[]    = $hfivevalue->scene_five_hotspots_text;
    $scene_five_hotspots_url[]     = $hfivevalue->scene_five_hotspots_url;
}





// get SCENE SIX  ####################################################
$scene_six_sceneid                  = $params->get('scene_six_sceneid', 'scene-six');
$scene_six_title                    = $params->get('scene_six_title', 'Scene Six');
$scene_six_author                   = $params->get('scene_six_author', '');
// equirectangular
$scene_six_panorama                 = $params->get('scene_six_panorama', '');
$scene_six_yaw                      = $params->get('scene_six_yaw', '');
$scene_six_pitch                    = $params->get('scene_six_pitch', '');
$scene_six_hfov                     = $params->get('scene_six_hfov', '');
// cubemap
$scene_six_mycubemap                = $params->get('scene_six_mycubemap', '');
$scene_six_cubemap_front            = $params->get('scene_six_cubemap_front', '');
$scene_six_cubemap_right            = $params->get('scene_six_cubemap_right', '');
$scene_six_cubemap_back             = $params->get('scene_six_cubemap_back', '');
$scene_six_cubemap_left             = $params->get('scene_six_cubemap_left', '');
$scene_six_cubemap_up               = $params->get('scene_six_cubemap_up', '');
$scene_six_cubemap_down             = $params->get('scene_six_cubemap_down', '');
// multires
$scene_six_multires_preview_image   = $params->get('scene_six_multires_preview_image', '');
$scene_six_multires_basepath        = $params->get('scene_six_multires_basepath', '');
$scene_six_multires_path            = $params->get('scene_six_multires_path', '');
$scene_six_multires_fallbackpath    = $params->get('scene_six_multires_fallbackpath', '');
$scene_six_multires_extension       = $params->get('scene_six_multires_extension', '');
$scene_six_multires_tileresolution  = $params->get('scene_six_multires_tileresolution', '');
$scene_six_multires_maxlevel        = $params->get('scene_six_multires_maxlevel', '');
$scene_six_multires_cuberesolution  = $params->get('scene_six_multires_cuberesolution', '');


$scene_six_params = $params->get('scene_six');
$stotalsix = count((array)$scene_six_params);
$tloopssix = $stotalsix-1;

foreach ($scene_six_params as $ssixkey => $ssixvalue) {
        $scene_six_connect2_sceneid[]   = $ssixvalue->scene_six_connect2_sceneid;
        $scene_six_shfov[]               = $ssixvalue->scene_six_shfov;
        $scene_six_syaw[]                = $ssixvalue->scene_six_syaw;
        $scene_six_spitch[]              = $ssixvalue->scene_six_spitch;
        $scene_six_targetpitch[]        = $ssixvalue->scene_six_targetpitch;
        $scene_six_targetyaw[]          = $ssixvalue->scene_six_targetyaw;
        $scene_six_targethfov[]         = $ssixvalue->scene_six_targethfov;
        $scene_six_scenefadeduration[]  = $ssixvalue->scene_six_scenefadeduration;
        $scene_six_hotspots_cssclass[]  = $ssixvalue->scene_six_hotspots_cssclass;
    }

$scene_six_hotspots = $params->get('scene_six_hotspots');
$htotalsix = count((array)$scene_six_hotspots);
$hloopssix = $htotalsix-1;
foreach ($scene_six_hotspots as $hsixkey => $hsixvalue) {
    $scene_six_hotspots_pitch[]   = $hsixvalue->scene_six_hotspots_pitch;
    $scene_six_hotspots_yaw[]     = $hsixvalue->scene_six_hotspots_yaw;
    $scene_six_hotspots_text[]    = $hsixvalue->scene_six_hotspots_text;
    $scene_six_hotspots_url[]     = $hsixvalue->scene_six_hotspots_url;
}




// get SCENE SEVEN  ####################################################
$scene_seven_sceneid                  = $params->get('scene_seven_sceneid', 'scene-seven');
$scene_seven_title                    = $params->get('scene_seven_title', 'Scene Seven');
$scene_seven_author                   = $params->get('scene_seven_author', '');
// equirectangular
$scene_seven_panorama                 = $params->get('scene_seven_panorama', '');
$scene_seven_yaw                      = $params->get('scene_seven_yaw', '');
$scene_seven_pitch                    = $params->get('scene_seven_pitch', '');
$scene_seven_hfov                     = $params->get('scene_seven_hfov', '');
// cubemap
$scene_seven_mycubemap                = $params->get('scene_seven_mycubemap', '');
$scene_seven_cubemap_front            = $params->get('scene_seven_cubemap_front', '');
$scene_seven_cubemap_right            = $params->get('scene_seven_cubemap_right', '');
$scene_seven_cubemap_back             = $params->get('scene_seven_cubemap_back', '');
$scene_seven_cubemap_left             = $params->get('scene_seven_cubemap_left', '');
$scene_seven_cubemap_up               = $params->get('scene_seven_cubemap_up', '');
$scene_seven_cubemap_down             = $params->get('scene_seven_cubemap_down', '');
// multires
$scene_seven_multires_preview_image   = $params->get('scene_seven_multires_preview_image', '');
$scene_seven_multires_basepath        = $params->get('scene_seven_multires_basepath', '');
$scene_seven_multires_path            = $params->get('scene_seven_multires_path', '');
$scene_seven_multires_fallbackpath    = $params->get('scene_seven_multires_fallbackpath', '');
$scene_seven_multires_extension       = $params->get('scene_seven_multires_extension', '');
$scene_seven_multires_tileresolution  = $params->get('scene_seven_multires_tileresolution', '');
$scene_seven_multires_maxlevel        = $params->get('scene_seven_multires_maxlevel', '');
$scene_seven_multires_cuberesolution  = $params->get('scene_seven_multires_cuberesolution', '');


$scene_seven_params = $params->get('scene_seven');
$stotalseven = count((array)$scene_seven_params);
$tloopsseven = $stotalseven-1;

foreach ($scene_seven_params as $ssevenkey => $ssevenvalue) {
        $scene_seven_connect2_sceneid[]   = $ssevenvalue->scene_seven_connect2_sceneid;
        $scene_seven_shfov[]               = $ssevenvalue->scene_seven_shfov;
        $scene_seven_syaw[]                = $ssevenvalue->scene_seven_syaw;
        $scene_seven_spitch[]              = $ssevenvalue->scene_seven_spitch;
        $scene_seven_targetpitch[]        = $ssevenvalue->scene_seven_targetpitch;
        $scene_seven_targetyaw[]          = $ssevenvalue->scene_seven_targetyaw;
        $scene_seven_targethfov[]         = $ssevenvalue->scene_seven_targethfov;
        $scene_seven_scenefadeduration[]  = $ssevenvalue->scene_seven_scenefadeduration;
        $scene_seven_hotspots_cssclass[]  = $ssevenvalue->scene_seven_hotspots_cssclass;
    }

$scene_seven_hotspots = $params->get('scene_seven_hotspots');
$htotalseven = count((array)$scene_seven_hotspots);
$hloopsseven = $htotalseven-1;
foreach ($scene_seven_hotspots as $hsevenkey => $hsevenvalue) {
    $scene_seven_hotspots_pitch[]   = $hsevenvalue->scene_seven_hotspots_pitch;
    $scene_seven_hotspots_yaw[]     = $hsevenvalue->scene_seven_hotspots_yaw;
    $scene_seven_hotspots_text[]    = $hsevenvalue->scene_seven_hotspots_text;
    $scene_seven_hotspots_url[]     = $hsevenvalue->scene_seven_hotspots_url;
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
