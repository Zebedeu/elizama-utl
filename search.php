<?php
/**
 * The template for displaying search results pages.
 *
 * @see https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 * @since elizama 0.3
 */
get_header();
?>

<section id="" class="col-md-9 content-area">
    <main id="main" class="site-main" role="main">

        <?php if (have_posts()) : ?>

        <header class="page-header">
            <?php  /* translators: 1: Search Results for */ ?>
            <h1 class="page-title"><?php printf(esc_html__('Search Results for: %s', 'elizama'), '<span>'.get_search_query().'</span>'); ?></h1>
        </header><!-- .page-header -->

        <?php  /* Start the Loop */ ?>
        <?php while (have_posts()) : the_post(); ?>

        <?php
        /**
         * Run the loop for the search to output the results.
         * If you want to overload this in a child theme then include a file
         * called content-search.php and that will be used instead.
         */
        get_template_part('template-parts/content', 'search');
        ?>

        <?php endwhile; ?>

        <?php el_paging_nav(); ?>

        <?php else : ?>

        <?php get_template_part('template-parts/content', 'none'); ?>

        <?php endif; ?>

    </main><!-- #main -->
</section><!-- #primary -->
<div class="col-md-3">
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?> 