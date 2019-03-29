<?php
/**
 * The Theme Options page.
 *
 * This page is implemented using the Settings API
 * http://codex.wordpress.org/Settings_API
 *
 * @since elizama 0.4
 *
*
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    
    /*
     * This is an example of how to add custom scripts to the options panel.
     * This one shows/hides the an option when a checkbox is clicked.
     *
     * You can delete it if you not using that option
     */

load_template(trailingslashit(get_template_directory()).'/inc/class/function.php');
load_template(trailingslashit(get_template_directory()).'/inc/class/class-function.php');
load_template(trailingslashit(get_template_directory()).'/inc/class/class-breadcrumb.php');
load_template(trailingslashit(get_template_directory()).'/inc/widget.php');

/*
 * Implement the Custom Header feature.
 */

/*
 * Custom template tags for this theme.
 */
load_template(trailingslashit(get_template_directory()).'/inc/structure/template-tags.php');

/*
 * Custom functions that act independently of the theme templates.
 */
load_template(trailingslashit(get_template_directory()).'/inc/structure/extras.php');
load_template(trailingslashit(get_template_directory()).'/inc/structure/hooks.php');

load_template(trailingslashit(get_template_directory()).'/inc/custom/custom-header.php');
load_template(trailingslashit(get_template_directory()).'/inc/custom/customizer.php');

function el_font_url()
{
    $font_url = '';

    /* Translators: If there are any character that are
        * not supported by Roboto, translate this to off, do not
        * translate into your own language.
        */
    $roboto = _x('on', 'Roboto font:on or off', 'elizama');

    /* Translators: If there are any character that are not
        * supported by Oswald, trsnalate this to off, do not
        * translate into your own language.
        */
    $oswald = _x('on', 'Oswald:on or off', 'elizama');

    /* Translators: If there has any character that are not supported
        *  by Scada, translate this to off, do not translate
        *  into your own language.
        */
    $scada = _x('on', 'Scada:on or off', 'elizama');

    if ('off' !== $roboto || 'off' !== $oswald) {
        $font_family = array();

        if ('off' !== $roboto) {
            $font_family[] = 'Roboto:300,400,600,700,800,900';
        }
        if ('off' !== $oswald) {
            $font_family[] = 'Oswald:300,400,600,700';
        }
        if ('off' !== $scada) {
            $font_family[] = 'Scada:300,400,600,700';
        }
        $query_args = array(
            'family' => urlencode(implode('|', $font_family)),
        );

        $font_url = add_query_arg($query_args, '//fonts.googleapis.com/css');
    }

    return $font_url;
}

function el_scripts_()
{
    wp_enqueue_style('elizama-font', el_font_url(), array());
    wp_enqueue_style('elizama-basic-style', get_stylesheet_uri());
    wp_enqueue_style('elizama-nivoslider-style', esc_url(get_template_directory_uri().'/css/nivo-slider.css'));
    wp_enqueue_style('font-awesome', get_template_directory_uri().'/assets/css/fonts/font-awesome.css');
    wp_enqueue_style('elizama-main-style', esc_url(get_template_directory_uri().'/css/main.css'));
    wp_enqueue_script('elizama-nivo-script', esc_url(get_template_directory_uri().'/js/jquery.nivo.slider.js'), array('jquery'));
    wp_enqueue_script('elizama-custom_js', esc_url(get_template_directory_uri().'/js/custom.js'));

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'el_scripts_');

define('EL_URL', 'https://github.com/Zebedeu/elizama');
define('EL_THEME_URL', 'https://github.com/Zebedeu/elizama');
define('EL_THEME_URL_DIRECT', 'https://github.com/Zebedeu/elizama');
define('EL_THEME_DOC', 'https://github.com/Zebedeu/elizama');
define('EL_PRO_THEME_URL', 'http://github.com/zebedeu/elizama/');

/*
 * Customizer additions.
 */

/*
 * Make theme available for translation.
 * Translations can be filed in the /languages/ directory.
 * If you're building a theme based on elizama', use a find and replace
 * to change 'elizama' to the name of your theme in all the template files.
 */
load_theme_textdomain('elizama', esc_url(get_template_directory().'/languages'));

/*
 * Load Jetpack compatibility file.
 */
load_template(get_template_directory().'/inc/jetpack/jetpack.php');
