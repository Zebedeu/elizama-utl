<?php
/**
 * The Theme Options page.
 *
 * This page is implemented using the Settings API
 * http://codex.wordpress.org/Settings_API
 *
 * @since elizama 0.4
 */
if (!function_exists('el_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function el_setup()
    {
        /*         * *** loard elizama' theme Options */

        // Remove estilos da galeria,, A galeria de imagens vem com estilo padrao, o que pode tornar mais complicado fazer a estilizacao por CSS. Caso queira remover o estilo padrao, adicione o seguinte:

        add_filter('use_default_gallery_style', '__return_false');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
        ));

        add_theme_support('custom-header');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        /* Add Post Thumbnails Support and Related Image Sizes */

        add_image_size('blog-page', 732, 9999, false);                  // For Blog Page
        add_image_size('default-page', 9999, 9999, false);              // Default Page and Full Width Page
        add_image_size('blog-post-thumb', 732, 447, true);              // For Home Blog Section and Gallery Slider on Single and Blog Page
        add_image_size('mini-page', 300, 200, false);
        add_image_size('video-thumb', 700, 444, 1);

        // This theme uses wp_nav_menu() in one location.
        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => esc_html__('Primary Menu', 'elizama'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        /*
         * Enable support for Post Formats.
         * See https://developer.wordpress.org/themes/functionality/post-formats/
         */
        add_theme_support('post-formats', array(
            'aside',
            'image',
            'video',
            'quote',
            'link',
            'audio',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('el_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));
    }

endif; // el_setup
add_action('after_setup_theme', 'el_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function el_content_width()
{
    $GLOBALS['content_width'] = apply_filters('el_content_width', 640);
}

add_action('after_setup_theme', 'el_content_width', 0);

/**
 *   Rondom for sidebar.
 */
function get_category_id($cat_name)
{
    $term = get_term_by('blog', $cat_name, 'category');

    if ($term == false) {
        return false;
    }

    return $term->term_id;
}

/**
 * elizama' custom stylesheet URI.
 *
 * @since  1.0.2
 *
 * @param string $uri default URI
 * @param string $dir stylesheet directory URI
 *
 * @return string new URI
 */

/**
 * Enqueue scripts and styles.
 */
function el_scripts()
{
    wp_enqueue_style('elizama-bootstrap_min_css', esc_url(get_template_directory_uri().'/assets/bootstrap/css/bootstrap.min.css'));

    wp_enqueue_style('elizama-style', get_stylesheet_uri());

    wp_enqueue_style('elizama-styles', esc_url(get_template_directory_uri().'/assets/css/style.css'));
    wp_enqueue_style('elizama-woocommerce', esc_url(get_template_directory_uri().'/assets/css/woo.css'));

    wp_enqueue_style('elizama-efect', esc_url(get_template_directory_uri().'/assets/css/efect.css'));
    wp_enqueue_script('elizama-navigation', esc_url(get_template_directory_uri().'/js/navigation.js'), array(), '20120206', true);
    wp_enqueue_script('elizama-skip-link-focus-fix', esc_url(get_template_directory_uri().'/js/skip-link-focus-fix.js'), array(), '20130115', true);
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'el_scripts');
