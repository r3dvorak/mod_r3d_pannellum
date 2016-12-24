<?php
defined('_JEXEC') or die;

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
if($type == 'video') {
$doc->addStyleSheet("https://vjs.zencdn.net/5.4.6/video-js.css");
$doc->addScript("https://vjs.zencdn.net/5.4.6/video.js");
$doc->addScript("modules/mod_r3d_pannellum/assets/js/videojs-pannellum-plugin.js");
}
?>

<div class="pnlm-container <?php echo $moduleclass_sfx; ?>">
<?php
if($type == 'equirectangular' || $type == 'cubemap' || $type == 'multires' ) {
?>
	<!-- style block
	<style type="text/css" scoped></style> -->
	<div id="<?php echo $panorama_id; ?>" style="width:100%;height:380px;"></div>
<?php 	} ?>


<?php
if($type == 'equirectangular') {
?>
<script>
	pannellum.viewer('<?php echo $panorama_id; ?>', {
	    "type": "equirectangular",
<?php if($title) {  ?>
	    "title": "<?php echo $title; ?>",
<?php 	} ?>
<?php if($author) {  ?>
    	"author": "<?php echo $author; ?>",
<?php 	} ?>
<?php if($basepath) {  ?>
    	"basePath": "<?php echo $basepath; ?>",
<?php 	} ?>
<?php if($params->get('autoload') == 1) {  ?>
	    "autoLoad": true,
<?php 	} ?>
<?php if($autorotate) {  ?>
	    "autoRotate": <?php echo $autorotate; ?>,
<?php 	} ?>
<?php if($autorotateinactivitydelay) {  ?>
	    "autoRotateInactivityDelay": <?php echo $autorotateinactivitydelay; ?>,
<?php 	} ?>
<?php if($autorotatestopdelay) {  ?>
	    "autoRotateStopDelay": <?php echo $autorotatestopdelay; ?>,
<?php 	} ?>
<?php if($preview_image) {  ?>
    	"preview": "<?php echo $preview_image; ?>",	
<?php 	} ?>
<?php if($fallback) {  ?>
    	"fallback": "<?php echo $fallback; ?>",	
<?php 	} ?>
<?php if($params->get('orientationonbydefault') == 1) {  ?>
    	"orientationOnByDefault": "true",
<?php 	} ?>
<?php if($params->get('showzoomctrl') == 0) {  ?>
    	"showZoomCtrl": "false",
<?php 	} ?>
<?php if($params->get('keyboardzoom') == 0) {  ?>
    	"keyboardZoom": "false",
<?php 	} ?>
<?php if($params->get('mousezoom') == 0) {  ?>
    	"mouseZoom": "false",
<?php 	} ?>
<?php if($params->get('showfullscreenctrl') == 0) {  ?>
    	"showFullscreenCtrl": "false",
<?php 	} ?>
<?php if($params->get('showcontrols') == 0) {  ?>
    	"showControls": "false",
<?php 	} ?>
<?php if($params->get('yaw') > 0) {  ?>
    	"YAW": "<?php echo $yaw; ?>",
<?php 	} ?>
<?php if($params->get('pitch') > 0) {  ?>
    	"PITCH": "<?php echo $pitch; ?>",
<?php 	} ?>
<?php if($params->get('hfov') != 100) {  ?>
    	"HFOV": "<?php echo $hfov; ?>",
<?php 	} ?>
<?php if($panorama) {  ?>
	    "panorama": "<?php echo $panorama; ?>",
<?php 	} ?>
<?php if($params->get('compass') == 1) {  ?>
	    "compass": true,
    <?php if($northoffset) {  ?>
	"northOffset": <?php echo $northoffset; ?>,
	<?php 	} ?>
<?php 	} ?>

	});
</script>
<!-- 
WORKING sample equirectangular
<script>
	pannellum.viewer('panorama', {
	    "type": "equirectangular",
	    "title": "ALMA Correlator Facility",
    	"author": "Matthew Petroff",
    	"autoLoad": false,
	    "autoRotate": -3,
	    "basePath": "modules/mod_r3d_pannellum/samples/",
	    "preview": "alma-preview.jpg",
	    "panorama": "alma.jpg",
	    "compass": true,
    	"northOffset": 247.5
	});
</script>
-->
<?php 	} ?>
<?php
if($type == 'multires') {
?>
<script>
pannellum.viewer('<?php echo $panorama_id; ?>', {
    "type": "multires",
<?php if($multires_title) {  ?>
	"title": "<?php echo $multires_title; ?>",
<?php 	} ?>
<?php if($multires_author) {  ?>
   	"author": "<?php echo $multires_author; ?>",
<?php 	} ?>
<?php if($multires_preview_image) {  ?>
   	"preview": "<?php echo $multires_preview_image; ?>",
<?php 	} ?>
<?php if($params->get('autoload') == 1) {  ?>
	"autoLoad": true,
<?php 	} ?>
<?php if($autorotate) {  ?>
	"autoRotate": <?php echo $autorotate; ?>,
<?php 	} ?>
<?php if($autorotateinactivitydelay) {  ?>
	"autoRotateInactivityDelay": <?php echo $autorotateinactivitydelay; ?>,
<?php 	} ?>
<?php if($autorotatestopdelay) {  ?>
	"autoRotateStopDelay": <?php echo $autorotatestopdelay; ?>,
<?php 	} ?>
<?php if($fallback) {  ?>
    "fallback": "<?php echo $fallback; ?>",	
<?php 	} ?>
<?php if($params->get('orientationonbydefault') == 1) {  ?>
    "orientationOnByDefault": "true",
<?php 	} ?>
<?php if($params->get('showzoomctrl') == 0) {  ?>
    "showZoomCtrl": "false",
<?php 	} ?>
<?php if($params->get('keyboardzoom') == 0) {  ?>
    "keyboardZoom": "false",
<?php 	} ?>
<?php if($params->get('mousezoom') == 0) {  ?>
    "mouseZoom": "false",
<?php 	} ?>
<?php if($params->get('showfullscreenctrl') == 0) {  ?>
    "showFullscreenCtrl": "false",
<?php 	} ?>
<?php if($params->get('showcontrols') == 0) {  ?>
    "showControls": "false",
<?php 	} ?>
<?php if($params->get('yaw') > 0) {  ?>
    "YAW": "<?php echo $yaw; ?>",
<?php 	} ?>
<?php if($params->get('pitch') > 0) {  ?>
    "PITCH": "<?php echo $pitch; ?>",
<?php 	} ?>
<?php if($params->get('hfov') != 100) {  ?>
    "HFOV": "<?php echo $hfov; ?>",
<?php 	} ?>
<?php if($params->get('compass') == 1) {  ?>
	"compass": true,
    <?php if($northoffset) {  ?>
"northOffset": <?php echo $northoffset; ?>,
	<?php 	} ?>
<?php 	} ?>
	"multiRes": {
<?php if($multires_basepath) {  ?>
		"basePath": "<?php echo $multires_basepath; ?>",
<?php 	} ?>
<?php if($multires_path) {  ?>
		"path": "<?php echo $multires_path; ?>",
<?php 	} ?>
<?php if($multires_fallbackpath) {  ?>
		"fallbackPath": "<?php echo $multires_fallbackpath; ?>",
<?php 	} ?>
<?php if($multires_extension) {  ?>
		"extension": "<?php echo $multires_extension; ?>",
<?php 	} ?>
<?php if($multires_tileresolution) {  ?>
		"tileResolution": <?php echo $multires_tileresolution; ?>,
<?php 	} ?>
<?php if($multires_maxlevel) {  ?>
		"maxLevel": <?php echo $multires_maxlevel; ?>,
<?php 	} ?>
<?php if($multires_cuberesolution) {  ?>
		"cubeResolution": <?php echo $multires_cuberesolution; ?>,
<?php 	} ?>
    }
});
</script>
<!-- 
WORKING sample multires
<script>
	"type": "multires",
    "title": "ALMA Correlator Facility",
	"author": "Matthew Petroff",
    "multiRes": {
        "basePath": "https:\/\/pannellum.org/images/multires/library",
        "path": "/%l/%s%y_%x",
        "fallbackPath": "/fallback/%s",
		"extension": "jpg",
		"tileResolution": 512, //512
		"maxLevel": 6, //6
		"cubeResolution": 8432  //8432
    	}
	});
</script>
-->
<?php 	} ?>
<?php
if($type == 'cubemap') {
?>

<script>
pannellum.viewer('<?php echo $panorama_id; ?>', {
    "type": "cubemap",
<?php if($title) {  ?>
	    "title": "<?php echo $title; ?>",
<?php 	} ?>
<?php if($author) {  ?>
    	"author": "<?php echo $author; ?>",
<?php 	} ?>
<?php if($basepath) {  ?>
    	"basePath": "<?php echo $basepath; ?>",
<?php 	} ?>
<?php if($params->get('autoload') == 1) {  ?>
	    "autoLoad": true,
<?php 	} ?>
<?php if($autorotate) {  ?>
	    "autoRotate": <?php echo $autorotate; ?>,
<?php 	} ?>
<?php if($autorotateinactivitydelay) {  ?>
	    "autoRotateInactivityDelay": <?php echo $autorotateinactivitydelay; ?>,
<?php 	} ?>
<?php if($autorotatestopdelay) {  ?>
	    "autoRotateStopDelay": <?php echo $autorotatestopdelay; ?>,
<?php 	} ?>
<?php if($preview_image) {  ?>
    	"preview": "<?php echo $preview_image; ?>",	
<?php 	} ?>
<?php if($fallback) {  ?>
    	"fallback": "<?php echo $fallback; ?>",	
<?php 	} ?>
<?php if($params->get('orientationonbydefault') == 1) {  ?>
    	"orientationOnByDefault": "true",
<?php 	} ?>
<?php if($params->get('showzoomctrl') == 0) {  ?>
    	"showZoomCtrl": "false",
<?php 	} ?>
<?php if($params->get('keyboardzoom') == 0) {  ?>
    	"keyboardZoom": "false",
<?php 	} ?>
<?php if($params->get('mousezoom') == 0) {  ?>
    	"mouseZoom": "false",
<?php 	} ?>
<?php if($params->get('showfullscreenctrl') == 0) {  ?>
    	"showFullscreenCtrl": "false",
<?php 	} ?>
<?php if($params->get('showcontrols') == 0) {  ?>
    	"showControls": "false",
<?php 	} ?>
<?php if($params->get('yaw') > 0) {  ?>
    	"YAW": "<?php echo $yaw; ?>",
<?php 	} ?>
<?php if($params->get('pitch') > 0) {  ?>
    	"PITCH": "<?php echo $pitch; ?>",
<?php 	} ?>
<?php if($params->get('hfov') != 100) {  ?>
    	"HFOV": "<?php echo $hfov; ?>",
<?php 	} ?>
<?php if($params->get('compass') == 1) {  ?>
	    "compass": true,
    <?php if($northoffset) {  ?>
	"northOffset": <?php echo $northoffset; ?>,
	<?php 	} ?>
<?php 	} ?>
    "cubeMap": [
        "<?php echo $cubemap_front; ?>",
        "<?php echo $cubemap_right; ?>",
        "<?php echo $cubemap_back; ?>",
        "<?php echo $cubemap_left; ?>",
        "<?php echo $cubemap_up; ?>",
        "<?php echo $cubemap_down; ?>"
    ]
});
</script>
<!-- 
WORKING sample cubemap
<script>
	pannellum.viewer('<?php echo $panorama_id; ?>', {
	    "type": "cubemap",
	    "title": "Jordan Pond",
	    "author": "Matthew Petroff",
	    "basePath": "modules/mod_r3d_pannellum/samples/",
	    "preview": "examplepano-preview.jpg",
	    "compass": true,
	    "northOffset": 90,
	    "cubeMap": [
	        "examplepanocube0.jpg",
	        "examplepanocube1.jpg",
	        "examplepanocube2.jpg",
	        "examplepanocube3.jpg",
	        "examplepanocube4.jpg",
	        "examplepanocube5.jpg"
	    ]
	});
</script>
-->
<?php 	} ?>





<?php
if($type == 'video') {
?>

<video id="<?php echo $panorama_id; ?>" 
<?php if($video_classes) {  ?>
	class="<?php echo $video_classes; ?>" 
<?php 	} ?>
<?php if($params->get('video_controls') == 1) {  ?>
	controls 
<?php 	} ?>
<?php if($params->get('video_autoplay') == 1) {  ?>
	autoplay  
<?php 	} ?>
<?php if($video_preload) {  ?>
	preload="<?php echo $video_preload; ?>" 
<?php 	} ?>
<?php if($video_style) {  ?>
	style="<?php echo $video_style; ?>" 
<?php 	} ?>
<?php if($video_poster) {  ?>
	poster="<?php echo $video_poster; ?>" 
<?php 	} ?>
<?php if($params->get('video_datasetup') == 0) {  ?>
	data-setup="{}"
<?php 	} ?>
<?php if($params->get('video_crossorigin') == 1) {  ?>
	crossorigin="anonymous"
<?php 	} ?>
>
<?php if($video_webmsource) {  ?>
	<source src="<?php echo $video_webmsource; ?>" type="video/webm"/> 
<?php 	} ?> 
<?php if($video_mp4source) {  ?>
	<source src="<?php echo $video_mp4source; ?>" type="video/mp4"/> 
<?php 	} ?>
    <p class="vjs-no-js">
        To view this video please enable JavaScript, and consider upgrading to
        a web browser that <a href="http://videojs.com/html5-video-support/"
        target="_blank">supports HTML5 video</a>
    </p>
</video>
<script>
videojs('<?php echo $panorama_id; ?>', {
    plugins: {
        pannellum: {}
    }
});
</script>
<!-- WORKING sample video START
<video id="video" 
	class="video-js vjs-default-skin vjs-big-play-centered"
  	controls 
  	preload="none" 
  	style="width:100%;height:390px;" 
  	poster="https://pannellum.org//images/video/jfk-poster.jpg" 
  	data-setup="{}" 
  	crossorigin="anonymous
  	">
    <source src="https://pannellum.org/images/video/jfk.webm" type="video/webm"/>
    <source src="https://pannellum.org//images/video/jfk.mp4" type="video/mp4"/>
    <p class="vjs-no-js">
        To view this video please enable JavaScript, and consider upgrading to
        a web browser that <a href="http://videojs.com/html5-video-support/"
        target="_blank">supports HTML5 video</a>
    </p>
</video>
<script>
videojs('video', {
    plugins: {
        pannellum: {}
    }
});
</script>
END WORKING sample video -->
<?php 	} ?>














<?php  // DEBUG check variables
//echo "<br>\n";
//$arr = get_defined_vars();
//print_r($arr);
?>
</div>
	


