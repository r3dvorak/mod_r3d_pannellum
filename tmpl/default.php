<?php
/**
 * @package     Joomla.Module
 * @subpackage  mod_r3d_pannellum
 * @creation    2025-09-03
 * @author      Richard Dvorak, r3d.de
 * @copyright   Copyright (C) 2025 Richard Dvorak, https://r3d.de
 * @license     GNU GPL v3 or later (https://www.gnu.org/licenses/gpl-3.0.html)
 * @version     5.0.0
 * @file        modules/mod_r3d_pannellum/tmpl/default.php
 */

defined('_JEXEC') or die;

$containerId = 'pannellum_' . $module->id;
?>

<div id="<?php echo $containerId; ?>" style="width:100%;height:500px;"></div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum/build/pannellum.css">
<script src="https://cdn.jsdelivr.net/npm/pannellum/build/pannellum.js"></script>

<script>
// Initialize viewer with JSON config from helper
document.addEventListener("DOMContentLoaded", function() {
    pannellum.viewer("<?php echo $containerId; ?>", <?php echo $config; ?>);
});
</script>
