<?php
/**
 * Template part for displaying posts.
 *
 * @see https://codex.wordpress.org/Template_Hierarchy
 * @since elizama 0.3
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="casulo ">
        <header class="entry-header">
            <?php the_title(sprintf('<h5 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h5>'); ?>
        </header><!-- .entry-header -->

        <div class="casulo2">

            <div class="row">
                <div class="col-md-12 el_the_excerpt">
                    <?php el_the_excerpt(0, 300); ?>
                </div>

                <?php $format = get_post_format($post->ID); ?>
                <?php if (has_post_thumbnail($post->ID)) : ?>
                <?php
                $image_id = get_post_thumbnail_id();
                $full_image_url = wp_get_attachment_url($image_id);
                ?>
                <?php if (get_the_post_thumbnail() != '') : ?>
                <a class="swipessbox" href="<?php echo esc_html($full_image_url); ?>" title="<?php echo esc_html(the_title()); ?>">

                    <a style="height:20%;" href="<?php esc_url(the_permalink()); ?>" class="rounded float-left"> <?php echo esc_html(the_post_thumbnail('default-page')); ?></a>

                    <?php else : ?>
                    <img class="rounded float-left" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/img_404.png" />
                    <?php endif; ?>
                    <?php else : ?>
                    <img class="rounded float-left" style="padding-left: 13%; height: 20%;" src="<?php echo esc_url(get_template_directory_uri()); ?>/images/img_404.png" />
                    <?php endif; ?>


                    <?php  /*  Active link pages before e after */ ?>
                    <?php 
                    wp_link_pages(array(
                        'before' => '<div class="page-links">'.esc_html__('Pages:', 'elizama'),
                        'after' => '</div>',
                    ));
                    ?>

            </div><!-- end casulo 2 -->
        </div><!-- .entry-content -->
    </div><!-- casulo 1 -->
</article><!-- #post-## --> 