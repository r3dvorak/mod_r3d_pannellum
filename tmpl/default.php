<?php
/**
 * @package     Joomla.Module
 * @subpackage  mod_r3d_pannellum
 * @creation    2025-09-04
 * @author      Richard Dvorak, r3d.de
 * @copyright   Copyright (C) 2025 Richard Dvorak, https://r3d.de
 * @license     GNU GPL v3 or later (https://www.gnu.org/licenses/gpl-3.0.html)
 * @version     5.0.3
 * @file        modules/mod_r3d_pannellum/tmpl/default.php
 */

defined('_JEXEC') or die;

$containerId = 'pannellum_' . $module->id;

// CSS size from params (allow any valid CSS unit)
$width = $params->get('container_width', '100%');
$height = $params->get('container_height', '500px');

// basic sanitization for style attribute
$style = 'width:' . htmlspecialchars($width, ENT_QUOTES, 'UTF-8')
    . ';height:' . htmlspecialchars($height, ENT_QUOTES, 'UTF-8') . ';';
?>
<div id="<?php echo $containerId; ?>" style="<?php echo $style; ?>"></div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum/build/pannellum.css">
<script src="https://cdn.jsdelivr.net/npm/pannellum/build/pannellum.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        pannellum.viewer("<?php echo $containerId; ?>", <?php echo $config; ?>);
    });
</script>