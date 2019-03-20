<?php
/**
 * The template for displaying archive pages.
 *
 * @see https://codex.wordpress.org/Template_Hierarchy
 * @since elizama 0.1
 */
get_header();
?>

<div id="primary" class="content-area">
    <h5 class="archive-title"><?php echo esc_html(do_action('get_breadcrumb')); ?></h5>
    <main id="main" class="site-main" role="main">

        <?php if (have_posts()) : ?>

        <header class="page-header">
            <?php
            the_archive_title('<h1 class="page-title">', '</h1>');
            the_archive_description('<div class="taxonomy-description">', '</div>');
            ?>
        </header><!-- .page-header -->

        <?php  /* Start the Loop */ ?>
        <?php while (have_posts()) : the_post(); ?>

        <?php do_action('format_init'); ?>
        <?php endwhile; ?>

        <?php echo esc_html(el_paging_nav()); ?>

        <?php else : ?>

        <?php do_action('none_init'); ?>

        <?php endif; ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?> 