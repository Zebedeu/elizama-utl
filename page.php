<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @see https://codex.wordpress.org/Template_Hierarchy
 * @since elizama 0.4
 */
get_header();
?>
<div id="" class=" col-md-9">
    <h5 class="archive-title"><?php echo esc_html(do_action('get_breadcrumb')); ?></h5>

    <main id="main" class="site-main row" role="main">
        <!-- onde estas loo_init -->
        <?php do_action('loop_init'); ?>

    </main><!-- #main -->
</div><!-- #primary -->

<div class="col-md-3">
    <?php get_sidebar(); ?>
</div>

<?php get_footer();?>