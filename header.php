<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @see https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <div id="base">
        <div id="page" class="hfeed site">
            <div style="width:20%; height:auto; float:right">
                <form class="form-inline" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                    <input class="form-control" type="search" value="<?php echo esc_attr(get_search_query()); ?>"
                        placeholder="<?php echo esc_attr_x('Search &hellip;', 'placeholder', 'elizama'); ?>" name="s"
                        title="<?php esc_attr_x('Search for:', 'label', 'elizama'); ?>">
                    <button class="btn btn-outline-success"
                        type="submit"><?php echo esc_attr_x('Search', 'submit button', 'elizama'); ?></button>
                </form>               
                <?php if (class_exists('WooCommerce')) :

                    global $woocommerce;                    
 // get cart quantity
                    $qty = $woocommerce->cart->get_cart_contents_count();
                    // get cart total
                    $total = $woocommerce->cart->get_cart_total();
                    // get cart url
                    $cart_url = wc_get_cart_url();
                    // http://genericons.com/
                    if ($qty > 0)
                        {
                            echo '<a href="' . esc_url($cart_url). '">';
                            echo '<span class="glyphicon glyphicon-shopping-cart"
                    aria-hidden="true" ></span>';
                            echo '</a>';
                        }
                    // if multiple products in cart
                    if ($qty > 1){
                        echo '<a href="' . esc_url($cart_url) . '">' . ' ' . esc_html($qty) .esc_attr_e( 'products', 'elizama' ).'  |  ' . wp_kses_data($total) .
                            '</a>';
                    }
                    // if single product in cart
                    if ($qty == 1){
                        echo '<a href="' . esc_url($cart_url) . '">'.esc_attr_e( '1 product', 'elizama' ). '  |  ' . wp_kses_data($total) . '</a>';
                    
                } ?> 
                
                <?php endif; ?>
            </div>
                
                <header id="masthead" class="site-header" role="banner">
            <div class="site-branding">
                <?php

               if (get_header_image()) {
                   ?>
                <div class="logo-img">

                    <img src="<?php header_image(); ?>" alt="">
                </div>

                <?php
               } else {
                   ?>

                <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                        rel="home"><?php bloginfo('name'); ?></a></h1>
                <?php
            $elizama_ecommerce_description = get_bloginfo('description', 'display');
                   if ($elizama_ecommerce_description || is_customize_preview()) :
                ?>
                <p class="site-description"><?php echo esc_html($elizama_ecommerce_description); /* WPCS: xss ok. */ ?>
                </p>
                <?php endif;
               } ?>
            </div><!-- .site-branding -->

            <nav id="site-navigation" class="main-navigation">
                <button class="menu-toggle" aria-controls="primary-menu"
                    aria-expanded="false"><?php esc_html_e('Menu', 'elizama'); ?></button>
                <?php
            wp_nav_menu(array(
                'theme_location' => 'menu-1',
                'menu_id' => 'primary-menu',
            ));
            ?>
            </nav><!-- #site-navigation -->
            </header><!-- #masthead -->
            <?php do_action('slide'); ?>

            <div id="content" class="site-content">