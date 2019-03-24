<?php

/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Elizama
 * @since elizama 0.3
 */



if (!function_exists('el_posted_on')) :

    /**
     * Prints HTML with meta information for the current post-date/time and author.
     */
    function el_posted_on() {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if (get_the_time('U') !== get_the_modified_time('U')) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf($time_string, esc_attr(get_the_date('c')), esc_html(get_the_date()), esc_attr(get_the_modified_date('c')), esc_html(get_the_modified_date())
        );

        $posted_on = sprintf(
                             /* translators: 1: Posted on %s post date */
                esc_html_x('Posted on %s', 'post date', 'elizama'), '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
        );

        $byline = sprintf(
                         /* translators: 1: by , post author */ 
                esc_html_x('by %s', 'post author', 'elizama'), '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
        );

        echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
    }

endif;

if (!function_exists('el_entry_footer')) :

    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function el_entry_footer() {
        // Hide category and tag text for pages.
        if ('post' === get_post_type()) {
            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list(esc_html__(', ', 'elizama'));
            if ($categories_list && el_categorized_blog()) {
                    /* translators: 1: Posted in */
                printf('<span class="cat-links">' . esc_html__('Posted in %1$s', 'elizama') . '</span>', $categories_list); // WPCS: XSS OK.
            }

            /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list('', esc_html__(', ', 'elizama'));
            if ($tags_list) {
                    /* translators: 1: Tagged  */
                printf('<span class="tags-links">' . esc_html__('Tagged %1$s', 'elizama') . '</span>', $tags_list); // WPCS: XSS OK.
            }
        }

        if (!is_single() && !post_password_required() && ( comments_open() || get_comments_number() )) {
            echo '<span class="comments-link">';
            comments_popup_link(esc_html__('Leave a comment', 'elizama'), esc_html__('1 Comment', 'elizama'), esc_html__('% Comments', 'elizama'));
            echo '</span>';
        }

        edit_post_link(esc_html__('Edit', 'elizama'), '<span class="edit-link">', '</span>');
    }

endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function el_categorized_blog() {
    if (false === ( $all_the_cool_cats = get_transient('el_categories') )) {
        // Create an array of all the categories that are attached to posts.
        $all_the_cool_cats = get_categories(array(
            'fields' => 'ids',
            'hide_empty' => 1,
            // We only need to know if there is more than one category.
            'number' => 2,
        ));

        // Count the number of categories that are attached to the posts.
        $all_the_cool_cats = count($all_the_cool_cats);

        set_transient('el_categories', $all_the_cool_cats);
    }

    if ($all_the_cool_cats > 1) {
        // This blog has more than 1 category so el_categorized_blog should return true.
        return true;
    } else {
        // This blog has only 1 category so el_categorized_blog should return false.
        return false;
    }
}

function el_pagination( $mid = 2, $end = 1, $show = false, $query = null ) {

    // Prevent show pagination number if Infinite Scroll of JetPack is active.
    if ( ! isset( $_GET[ 'infinity' ] ) ) {

        global $wp_query, $wp_rewrite;

        $total_pages = $wp_query->max_num_pages;

        if ( is_object( $query ) && null != $query ) {
            $total_pages = $query->max_num_pages;
        }

        if ( $total_pages > 1 ) {
            $url_base = $wp_rewrite->pagination_base;
            $big = 999999999;

            // Sets the paginate_links arguments.
            $arguments = apply_filters( 'el_pagination_args', array(
                    'base'      => esc_url_raw( str_replace( $big, '%#%', get_pagenum_link( $big, false ) ) ),
                    'format'    => '',
                    'current'   => max( 1, get_query_var( 'paged' ) ),
                    'total'     => $total_pages,
                    'show_all'  => $show,
                    'end_size'  => $end,
                    'mid_size'  => $mid,
                    'type'      => 'list',
                    'prev_text' => __( '&laquo; Previous', 'elizama' ),
                    'next_text' => __( 'Next &raquo;', 'elizama' ),
                )
            );

            $pagination = '<div class="pagination-wrap ">' . paginate_links( $arguments ) . '</div>';

            // Prevents duplicate bars in the middle of the url.
            if ( $url_base ) {
                $pagination = str_replace( '//' . $url_base . '/', '/' . $url_base . '/', $pagination );
            }

            echo ($pagination);
        }
    }
}

if ( ! function_exists( 'el_paging_nav' ) ) {

    /**
     * Print HTML with meta information for the current post-date/time and author.
     *
     * @since 2.2.0
     */
    function el_paging_nav() {
        $mid  = 2;     // Total of items that will show along with the current page.
        $end  = 1;     // Total of items displayed for the last few pages.
        $show = false; // Show all items.

        return  el_pagination( $mid, $end, $show );
    }
}

if ( ! function_exists( 'k7themes_ecommerce_post_thumbnail' ) ) :
    /**
     * Displays an optional post thumbnail.
     *
     * Wraps the post thumbnail in an anchor element on index views, or a div
     * element when on single views.
     */
    function k7themes_ecommerce_post_thumbnail() {
        if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
            return;
        }

        if ( is_singular() ) :
            ?>

            <div class="post-thumbnail">
                <?php the_post_thumbnail(); ?>
            </div><!-- .post-thumbnail -->

        <?php else : ?>

        <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
            <?php
            the_post_thumbnail( 'post-thumbnail', array(
                'alt' => the_title_attribute( array(
                    'echo' => false,
                ) ),
            ) );
            ?>
        </a>

        <?php
        endif; // End is_singular().
    }
endif;
/**
 * Flush out the transients used in el_categorized_blog.
 */
function el_category_transient_flusher() {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    // Like, beat it. Dig?
    delete_transient('el_categories');
}

add_action('edit_category', 'el_category_transient_flusher');
add_action('save_post', 'el_category_transient_flusher');
