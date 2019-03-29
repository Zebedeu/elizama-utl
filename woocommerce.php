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
<div id="" class="col-md-8">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <main id="main" class="site-main" role="main">
            <div class="entry-content">
                <?php woocommerce_content(); ?>
            </div><!-- .entry-content -->
        </main><!-- #main -->
    </article><!-- #post-## -->

</div><!-- #primary -->
<div class="col-md-4">

    <div id="secundary" class="col-md-4">

        <?php dynamic_sidebar('woo-sidebar'); ?>
    </div><!-- #secondary -->

</div>
<?php get_footer(); ?>