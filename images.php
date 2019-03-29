<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Elizama
 * @since elizama 0.4
 */
get_header();
?>
 <h5 class="archive-title"><?php el_get_breadcrumb();?></h5>
<div id="" class="col-md-9 content-area">
    <main id="main" class="site-main" role="main">

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
 
        <header class="entry-header">
            <?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
            <div class="entry-meta">
			    <?php
				$metadata = wp_get_attachment_metadata();
				printf( 
								/* translators: 1: Published, 2: post image */
					esc_html__( 'Published <span class="entry-date"><time class="entry-date" datetime="%1$s">%2$s</time></span> at <a href="%3$s" title="Link to full-size image">%4$s &times; %5$s</a> in <a href="%6$s" title="Return to %7$s" rel="gallery">%8$s</a>', 'elizama' ),
				    esc_attr( get_the_date( 'c' ) ),
				    esc_html( get_the_date() ),
				    esc_url( wp_get_attachment_url() ),
				    esc_url($metadata['width']),
				    esc_url($metadata['height']),
				    esc_url( get_permalink( $post->post_parent ) ),
				    esc_attr( strip_tags( get_the_title( $post->post_parent ) ) ),
				    esc_attr(get_the_title( $post->post_parent ))
				);

				edit_post_link( __( 'Edit', 'elizama' ), '<span class="edit-link">', '</span>' );
			    ?>
			</div><!-- .entry-meta -->
            
            <?php if ('post' === get_post_type()) : ?>
                <div class="entry-meta">
                    <?php el_posted_on(); ?>
                    <span class="comments_count clearfix entry-comments-link"><?php comments_popup_link('0','1','%')); ?></span>
                </div><!-- .entry-meta -->
            <?php endif; ?>
        </header><!-- .entry-header -->

        <div class="entry-content">
                 <div class="entry-attachment">
			    <div class="attachment">
				<?php el_the_attached_image(); ?>
			    </div><!-- .attachment -->

			    <?php if ( has_excerpt() ) : ?>
			    <div class="entry-caption">
				 <?php the_excerpt(); ?>
			    </div><!-- .entry-caption -->
			    <?php endif; ?>
			</div><!-- .entry-attachment -->

			<?php
			    the_content(); 
			    echo esc_html(el_paging_nav()); ?>
        </div><!-- .entry-content -->

</div><!-- casulo -->
</article><!-- #post-## -->

    </main><!-- #main -->
</div><!-- #primary -->
<div class="col-md-3">
    <?php get_sidebar(); ?>
</div>

<?php get_footer();?
