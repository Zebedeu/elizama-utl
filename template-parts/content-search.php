<?php
/**
 * Template part for displaying results in search pages.
 *
 * @see https://codex.wordpress.org/Template_Hierarchy
 * @since elizama 0.4
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>

        <?php if ('post' === get_post_type()) : ?>
        <div class="entry-meta">
            <?php el_posted_on(); ?>
        </div><!-- .entry-meta -->
        <?php endif; ?>
    </header><!-- .entry-header -->

    <div class="entry-summary">
        <?php the_excerpt(); ?>
    </div><!-- .entry-summary -->

    <footer class="entry-footer">
        <?php el_entry_footer(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## --> 