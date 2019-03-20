<?php
/**
 * The sidebar containing the main widget area.
 *
 * @see https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @since elizama 0.1
 */
if (!is_active_sidebar('right-sidebar')) {
    return;
}

?>

<div id="secundary" class="widget-area" role="complementary">

    <?php dynamic_sidebar('right-sidebar'); ?>
</div><!-- #secondary --> 