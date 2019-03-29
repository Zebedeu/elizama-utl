<?php
/**
 * The template for displaying all single posts.
 *
 * @see https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @since elizama 0.4
 */
get_header();
?>
<div id="" class="col-lg-9">
    <h5 class="archive-title"><?php echo esc_html(do_action('get_breadcrumb')); ?></h5>

    <main id="main" class="site-main" role="main">

        <?php do_action('loop_init'); ?>

    </main><!-- #main -->
</div><!-- #primary -->
<div class="col-md-3">
    <?php get_sidebar(); ?>
</div>

<?php get_footer();?>