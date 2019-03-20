<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @see https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @since elizama 0.1
 */
?>

</div><!-- #content -->

<footer id="colophon">
    <div class="site-footer" role="contentinfo">
        <div class="about-footer">
            <div class="cols">
                <h2><?php echo esc_html(get_theme_mod('contact_title', __('Contact elizama', 'elizama'))); ?></h2>
                <?php if (get_theme_mod('contact_desc')) {
    ?>
                <p><?php echo esc_html(get_theme_mod('contact_desc', __('If you have any questions don\'t hesitate to contact us', 'elizama'))); ?></p>
                <?php
} ?>
                <?php if (get_theme_mod('contact_add')) {
        ?>
                <div class="add-icon"></div><!-- add-icon -->
                <div class="add-content"><?php echo esc_html(get_theme_mod('contact_add', __('Rua Diolinda Rodrigues, Bairro Comercial, Huila, Lubango', 'elizama'))); ?></div><!-- add-content -->
                <div class="clear"></div>
                <?php
    } ?>
                <?php if (get_theme_mod('contact_no')) {
        ?>
                <div class="phone-icon"></div><!-- phone-icon -->
                <div class="phone-content"><?php echo esc_html(get_theme_mod('contact_no', __('+123 456 7890', 'elizama'))); ?></div><!-- phone-content -->
                <div class="clear"></div>
                <?php
    } ?>
                <?php if (get_theme_mod('contact_mail')) {
        ?>
                <div class="mail-icon"></div><!-- mail-icon -->
                <div class="mail-content"><a href="mailto:<?php echo esc_html(get_theme_mod('contact_mail', 'contacto@artphoweb.com')); ?>"><?php echo esc_html(get_theme_mod('contact_mail', 'contacto@artphoweb.com')); ?></a></div><!-- mail-content -->
                <div class="clear"></div>
                <?php
    } ?>
            </div><!-- cols -->

        </div> <!-- about-footer -->
        <div class="category-footer">
            <div class="cols">
                <?php if ('' !== get_theme_mod('recent_title')) {
        ?>
                <h2><?php echo esc_html(get_theme_mod('recent_title', __('Recent Posts', 'elizama'))); ?></h2> <?php
    } ?>
                <?php
                $args = array('posts_per_page' => 4, 'post__not_in' => get_option('category_name'), 'orderby' => 'date', 'order' => 'desc');
                $the_query = new WP_Query($args);
                ?>
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                <div class="recent-post">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </div>
                <?php endwhile; ?>
                <?php dynamic_sidebar('sidebar-3'); ?>

            </div><!-- cols -->
        </div> <!-- category-footer -->
        <div class="social-footer">
            <div class="cols">
                <h2><?php esc_html_e('Follow Us', 'elizama'); ?></h2>
                <div class="social">
                    <?php if (get_theme_mod('fb_link') != '') {
                    ?>
                    <a target="_blank" href="<?php echo esc_url(get_theme_mod('fb_link', '#facebook')); ?>" title="Facebook">
                    <span><?php esc_html_e('Facebook', 'elizama'); ?></span>
                    </a>
                    <?php
                } ?>
                    <?php if (get_theme_mod('twitt_link') != '') {
                    ?>
                    <a target="_blank" href="<?php echo esc_url(get_theme_mod('twitt_link', '#twitter')); ?>" title="Twitter">
                    <span><?php esc_html_e('Twitter', 'elizama'); ?></span>
                    </a>
                    <?php
                } ?>
                    <?php if (get_theme_mod('gplus_link') != '') {
                    ?>
                    <a target="_blank" href="<?php echo esc_url(get_theme_mod('gplus_link', '#gplus')); ?>" title="Google Plus">
                    <span><?php esc_html_e('Google +', 'elizama'); ?></span>
                    </a>
                    <?php
                } ?>
                    <?php if (get_theme_mod('linked_link') != '') {
                    ?>
                    <a target="_blank" href="<?php echo esc_url(get_theme_mod('linked_link', '#linkedin')); ?>" title="Linkedin">
                    <span><?php esc_html_e('Linkedin', 'elizama'); ?></span></a>

                    <?php
                } ?>

                    

                </div><!-- social -->
            </div><!-- cols -->
            <?php dynamic_sidebar('sidebar-4'); ?>
        </div> <!-- social-footer -->
    </div><!-- site-footer -->

    <div class="site-info">
        <p><a href="<?php echo esc_url(home_url()); ?>"><?php esc_html(bloginfo('name')); ?></a> &copy; <?php echo esc_html(date('Y')); ?> - <?php
                    /* translators: 1: All rights reserved  */

                                                                                                                                                    printf(esc_html__('All rights reserved', 'elizama'), 'elizama'); ?><br />
            <a href="<?php echo esc_url(__('https://github.com/Zebedeu/fw-elizama', 'elizama')); ?>"><?php 
                                                                                                        /* translators: 1: Proudly powered by  */

                                                                                                        printf(esc_html__('Proudly powered by %s', 'elizama'), 'ARTPHOTOGRAFIE'); ?></a>
            <?php 
            /* translators: 1: Proudly powered by */
            printf(esc_html__('Theme: %1$s by %2$s.', 'elizama'), 'elizama', '<a href="https://github.com/Zebedeu/elizama" rel="designer">Marcio Zebedeu</a>'); ?><br />

    </div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer();
?>
</div><!-- #base -->

</body>

</html> 