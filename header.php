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

            <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'elizama'); ?></a>
            <div style="width:20%; height:auto; float:right">
            <form class="form-inline" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                <input class="form-control mr-sm-2" type="search" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php echo esc_attr_x('Search &hellip;', 'placeholder', 'elizama'); ?>" name="s" title="<?php esc_attr_x('Search for:', 'label', 'elizama'); ?>">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><?php echo esc_attr_x('Search', 'submit button', 'elizama'); ?></button>
            </form>
           
                <?php global $woocommerce;
                if (isset($woocommerce)) {
                    if (is_customize_preview()) : ?>
                <span class="customize-partial-edit-shortcut customize-partial-edit-shortcut-custom_logo">
                    <button class="customizer-edit" data-control='{ "name":"el_header_cart_color" } ''>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13.89 3.39l2.71 2.72c.46.46.42 1.24.03 1.64l-8.01 8.02-5.56 1.16 1.16-5.58s7.6-7.63 7.99-8.03c.39-.39 1.22-.39 1.68.07zm-2.73 2.79l-5.59 5.61 1.11 1.11 5.54-5.65zm-2.97 8.23l5.58-5.6-1.07-1.08-5.59 5.6z"></path></svg>
                     </button>
                     </span>
                    <?php endif;
                    // get cart quantity
                    $qty = $woocommerce->cart->get_cart_contents_count();
                    // get cart total
                    $total = $woocommerce->cart->get_cart_total();
                    // get cart url
                    $cart_url = esc_url(wc_get_cart_url());
                    // http://genericons.com/
                    if ($qty > 0) {
                        echo '<a href="'.esc_url($cart_url).'">';
                        echo '<span class="genericon genericon-cart" id="el_shopicon" title="genericon-cart"></span>';
                        echo '</a>';
                    }
                    // if multiple products in cart
                    if ($qty > 1) {
                        echo '<a href="'.esc_url($cart_url).'">'.' '.$qty.esc_html__('products', 'elizama').'  |  '.$total.
                        '</a>';
                    }
                    // if single product in cart
                    if ($qty == 1) {
                        echo '<a href="'.esc_url($cart_url).'">'.esc_html__('1 product', 'elizama').'  |  '.$total.'</a>';
                    }
                } ?> 
            </div> <!-- #el_shopping_cart --> 
            </div>

    <header id="masthead" class="site-header" role="banner">
        <div class="site-branding">
            <?php
            the_custom_logo();
            if (is_front_page() && is_home()) :
                ?>
                <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                <?php
            else :
                ?>
                <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                <?php
            endif;
            $elizama_ecommerce_description = get_bloginfo('description', 'display');
            if ($elizama_ecommerce_description || is_customize_preview()) :
                ?>
                <p class="site-description"><?php echo esc_html($elizama_ecommerce_description); /* WPCS: xss ok. */ ?></p>
            <?php endif; ?>
        </div><!-- .site-branding -->

        <nav id="site-navigation" class="main-navigation">
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e('Menu', 'elizama'); ?></button>
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