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
 * @since elizama 0.3
 */
get_header();
?>

<div id="primary" class="content-area">
    <h5 class="archive-title"><?php echo esc_html(do_action('get_breadcrumb')); ?></h5>
    <main id="main" class="site-main" role="main">
        <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
        <!-- onde estas loo_init -->
        <?php do_action('format_init'); ?>
        <?php endwhile; ?>
        <?php echo esc_html(el_paging_nav()); ?>

    </main><!-- #main -->
    <?php endif; ?>
</div><!-- #primary -->

<?php get_footer(); ?> 