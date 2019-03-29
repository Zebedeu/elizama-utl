<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package elizama
 * @since elizama 1.0.0
 */
get_header();
?>

<div id="" class="col-md-9 shadow-lg p-3 mb-4  rounded bg-dark">

    <main>
        <?php if (have_posts()) : 

            if (is_home() && !is_front_page()) : ?>
                <header>
                    <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                </header>
            <?php endif; 

                 /* Start the Loop */ 
             while (have_posts()) : the_post();
                
                 do_action('format_init');

             endwhile; 
              el_paging_nav();

        else : 

             do_action('none_init');

         endif; ?>

    </main><!-- #main -->
</div><!-- #primary -->
<div class="col-md-3 shadow-lg p-3 mb-4 bg-dark">
    <?php get_sidebar();?>
</div>
<?php  get_footer(); ?>
