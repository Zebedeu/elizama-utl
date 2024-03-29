<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Elizama
 * @since elizama 0.4
 */
?>

<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'elizama'); ?></a>

<header id="masthead" class="site-header" role="banner">
    <div class="site-branding">
        <?php if (is_front_page() && is_home()) : ?>
            <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
        <?php else : ?>
            <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
        <?php endif; ?>
        <p class="site-description"><?php bloginfo('description'); ?></p>
    </div><!-- .site-branding -->

    <nav id="site-navigation" class="main-navigation" role="navigation">
        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e('Primary Menu', 'elizama'); ?></button>
        <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_id' => 'primary-menu')); ?>
    </nav><!-- #site-navigation -->
</header><!-- #masthead -->

<hr>
