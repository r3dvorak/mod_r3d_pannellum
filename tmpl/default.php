<?php
/**
 * @package     Joomla.Module
 * @subpackage  mod_r3d_pannellum
 * @creation    2025-09-05
 * @author      Richard Dvorak, r3d.de
 * @copyright   Copyright (C) 2025 Richard Dvorak, https://r3d.de
 * @license     GNU GPL v3 or later (https://www.gnu.org/licenses/gpl-3.0.html)
 * @version     5.1.0
 * @file        modules/mod_r3d_pannellum/tmpl/default.php
 */

defined('_JEXEC') or die;

$containerId = 'pano-' . (int) $module->id;
$width  = htmlspecialchars((string) $params->get('container_width', '100%'), ENT_QUOTES, 'UTF-8');
$height = htmlspecialchars((string) $params->get('container_height', '400px'), ENT_QUOTES, 'UTF-8');

/** Minimal compat: prefer buildConfig(), fall back to build()['config'] */
if (method_exists('ModR3dPannellumHelper', 'buildConfig')) {
    $config = ModR3dPannellumHelper::buildConfig($params);
} else {
    $built  = ModR3dPannellumHelper::build($params);
    $config = is_array($built) && isset($built['config']) ? $built['config'] : (array) $built;
}

$json = json_encode($config, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
?>
<div id="<?php echo $containerId; ?>" style="width:<?php echo $width; ?>;height:<?php echo $height; ?>;"></div>
<script>
(function () {
  if (typeof pannellum === 'undefined' || typeof pannellum.viewer !== 'function') {
    console.error('Pannellum not loaded');
    return;
  }
  try {
    var cfg = <?php echo $json ?: '{}'; ?>;
    pannellum.viewer('<?php echo $containerId; ?>', cfg);
  } catch (e) {
    console.error('Pannellum init error:', e);
  }
})();
</script>