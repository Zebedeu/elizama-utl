<?php
/**
 * SKT elizama' Theme Customizer.
 *
 *
 * @param WP_Customize_Manager $wp_customize theme Customizer object
 *
 *
 * SETTING ELEMENTS :::
 *
 * ::LOGO
 * ::COLOR SHEME
 * ::FOOTER
 * ::SLIDES
 * ::PAGE BOX
 * ::SOCIAL
 * ::FOOTER CONTACT
 * ::LEYOUT SETTING
 * ::FONT
 * ::DOCUMENTATION
 * ::FAQ FOR THEME
 */
function el_customize_register($wp_customize)
{
    //Add a class for titles
    class el_Info extends WP_Customize_Control
    {
        public $type = 'info';
        public $label = '';

        public function render_content()
        {
            ?>
<h3 style="text-decoration: underline; color: #ff0066; text-transform: uppercase;"><?php echo esc_html($this->label); ?></h3>
<?php
        }
    }

    class WP_Customize_Textarea_Control extends WP_Customize_Control
    {
        public $type = 'textarea';

        public function render_content()
        {
            ?>
<label>
    <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
    <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea($this->value()); ?></textarea>
</label>
<?php
        }
    }

    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    // $wp_customize->remove_control('header_textcolor');
    // $wp_customize->remove_control('display_header_text');

    // WP CUSTONIZE SETTING FOR LOGO

    $wp_customize->add_section(
    'logo_sec',
    array(
        'title' => __('Logo (PRO Version)', 'elizama'),
        'priority' => 1,
        /* translators: 1: Logo Settings available in  */
        'description' => sprintf(__('Logo Settings available in %s.', 'elizama'), sprintf('<a href="%1$s" target="_blank">%2$s</a>', esc_url('"'.SKT_PRO_THEME_URL.'"'), __('PRO Version', 'elizama'))),
    )
);
    $wp_customize->add_setting(
    'el_options[logo-info]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'type' => 'info_control',
        'capability' => 'edit_theme_options',
    )
);
    $wp_customize->add_control(
    new el_Info($wp_customize, 'logo_section', array(
        'section' => 'logo_sec',
        'settings' => 'el_options[logo-info]',
        'priority' => null,
    ))
);

    // WP CUSTONIZE SETTING FOR  COLOR SCHEME

    $wp_customize->add_setting('color_scheme', array(
    'default' => '#ce0060',
    'sanitize_callback' => 'sanitize_hex_color',
));

    $wp_customize->add_control(
    new WP_Customize_Color_Control($wp_customize, 'color_scheme', array(
        'label' => __('Color Scheme', 'elizama'),
        /* translators: 1: More color options in  */
        'description' => sprintf(__('More color options in %s.', 'elizama'), sprintf('<a href="%1$s" target="_blank">%2$s</a>', esc_url('"'.SKT_PRO_THEME_URL.'"'), __('PRO Version', 'elizama'))),
        'section' => 'colors',
        'settings' => 'color_scheme',
    ))
);

    $wp_customize->add_setting('color_scheme_header', array(
    'default' => '#000000',
    'sanitize_callback' => 'sanitize_hex_color',
));

    $wp_customize->add_control(
    new WP_Customize_Color_Control($wp_customize, 'color_scheme_header', array(
        'label' => __('Background for Header', 'elizama'),
        'section' => 'colors',
        'settings' => 'color_scheme_header',
    ))
);

    $wp_customize->add_setting('color_scheme_menu', array(
    'default' => '#b5b5b5',
    'sanitize_callback' => 'sanitize_hex_color',
));

    $wp_customize->add_control(
    new WP_Customize_Color_Control($wp_customize, 'color_scheme_menu', array(
        'label' => __('Background for Menu', 'elizama'),
        'section' => 'colors',
        'settings' => 'color_scheme_menu',
    ))
);

    // Content

    $wp_customize->add_setting('color_primary', array(
    'default' => '#ffffff',
    'sanitize_callback' => 'sanitize_hex_color',
));

    $wp_customize->add_control(
    new WP_Customize_Color_Control($wp_customize, 'color_primary', array(
        'label' => __('Background for Primary', 'elizama'),
        'section' => 'colors',
        'settings' => 'color_primary',
    ))
);

    $wp_customize->add_setting('color_scheme_content', array(
    'default' => '#000000',
    'sanitize_callback' => 'sanitize_hex_color',
));

    $wp_customize->add_control(
    new WP_Customize_Color_Control($wp_customize, 'color_scheme_content', array(
        'label' => __('color for text content', 'elizama'),
        'section' => 'colors',
        'settings' => 'color_scheme_content',
    ))
);

    // CASULO

    $wp_customize->add_setting('color_scheme_casulo', array(
    'default' => '#f4f4f4',
    'sanitize_callback' => 'sanitize_hex_color',
));

    $wp_customize->add_control(
    new WP_Customize_Color_Control($wp_customize, 'color_scheme_casulo', array(
        'label' => __('Background for Casulo', 'elizama'),
        'section' => 'colors',
        'settings' => 'color_scheme_casulo',
    ))
);

    $wp_customize->add_setting('color_scheme_footer_widght', array(
    'default' => '#b5b5b5',
    'sanitize_callback' => 'sanitize_hex_color',
));

    // WIDGET

    $wp_customize->add_control(
    new WP_Customize_Color_Control($wp_customize, 'color_scheme_footer_widght', array(
        'label' => __('Background for Footer ', 'elizama'),
        'section' => 'colors',
        'settings' => 'color_scheme_footer_widght',
    ))
);

    /*
         *
         *  FOOTER
         *
         */

    $wp_customize->add_section('footer_text', array(
    'title' => __('Footer Text', 'elizama'),
    'priority' => null,
    'description' => __('Add footer copyright text', 'elizama'),
));

    $wp_customize->add_setting(
    'el_options[credit-info]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'type' => 'info_control',
        'capability' => 'edit_theme_options',
    )
);
    $wp_customize->add_control(
    new el_Info($wp_customize, 'cred_section', array(
        'section' => 'footer_text',
        'label' => __('To remove credit &amp; copyright text upgrade to PRO version', 'elizama'),
        'settings' => 'el_options[credit-info]',
    ))
);

    $wp_customize->add_setting('footer_right', array(
    'default' => __('<a href="#">Home</a> | <a href="#">Contact Us</a> | <a href="#">Sitemap</a>', 'elizama'),
    'sanitize_callback' => 'format_for_editor',
));

    $wp_customize->add_control(
    new WP_Customize_Textarea_Control(
        $wp_customize,
        'footer_right',
        array(
            'label' => __('Footer right text', 'elizama'),
            'section' => 'footer_text',
            'setting' => 'footer_right',
        )
    )
);

    // FOOTER COPY

    $wp_customize->add_setting('color_scheme_footer_copy', array(
    'default' => '#ce0060',
    'sanitize_callback' => 'sanitize_hex_color',
));

    $wp_customize->add_control(
    new WP_Customize_Color_Control($wp_customize, 'color_scheme_footer_copy', array(
        'label' => __('Background for Copyright', 'elizama'),
        'section' => 'colors',
        'settings' => 'color_scheme_footer_copy',
    ))
);

    /*
         *
         *  SLIDES
         *
         */

    $wp_customize->add_section('slider_section', array(
    'title' => __('Slider Settings', 'elizama'),
    /* translators: 1:Featured Image Size Should be ( 1400x446 ) More slider settings available in  */
    'description' => sprintf(__('Featured Image Size Should be ( 1400x446 ) More slider settings available in %s.', 'elizama'), sprintf('<a href="%1$s" target="_blank">%2$s</a>', esc_url('"'.SKT_PRO_THEME_URL.'"'), __('PRO Version', 'elizama'))),
    'priority' => null,
));

    // Slide Image 1
    $wp_customize->add_setting('slide_image1', array(
    'default' => get_template_directory_uri().'/images/slides/slider1.jpg',
    'sanitize_callback' => 'esc_url_raw',
));

    $wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'slide_image1',
        array(
            'label' => __('Slide Image 1 (1400x446)', 'elizama'),
            'section' => 'slider_section',
            'settings' => 'slide_image1',
        )
    )
);

    $wp_customize->add_setting('slide_title1', array(
    'default' => __('The Next Level in WordPress Theme', 'elizama'),
    'sanitize_callback' => 'sanitize_text_field',
));

    $wp_customize->add_control('slide_title1', array(
    'label' => __('Slider title 1', 'elizama'),
    'setting' => 'slide_title1',
    'section' => 'slider_section',
));

    $wp_customize->add_setting('slide_desc1', array(
    'default' => __('Take your Website to the next level.', 'elizama'),
    'sanitize_callback' => 'format_for_editor',
));

    $wp_customize->add_control(
    new WP_Customize_Textarea_Control(
        $wp_customize,
        'slide_desc1',
        array(
            'label' => __('Slider description  1', 'elizama'),
            'setting' => 'slide_desc1',
            'section' => 'slider_section',
        )
    )
);

    $wp_customize->add_setting('slide_link1', array(
    'default' => '#link1',
    'sanitize_callback' => 'esc_url_raw',
));

    $wp_customize->add_control('slide_link1', array(
    'label' => __('Slide link 1', 'elizama'),
    'setting' => 'slide_link1',
    'section' => 'slider_section',
));

    $wp_customize->add_setting('slide_image2', array(
    'default' => get_template_directory_uri().'/images/slides/slider2.jpg',
    'sanitize_callback' => 'esc_url_raw',
));

    $wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'slide_image2',
        array(
            'label' => __('Slide image 2', 'elizama'),
            'setting' => 'slide_image2',
            'section' => 'slider_section',
        )
    )
);

    $wp_customize->add_setting('slide_title2', array(
    'default' => __('elizama WordPress Theme', 'elizama'),
    'sanitize_callback' => 'sanitize_text_field',
));

    $wp_customize->add_control('slide_title2', array(
    'label' => __('Slide title 2', 'elizama'),
    'setting' => 'slide_title2',
    'section' => 'slider_section',
));

    $wp_customize->add_setting('slide_desc2', array(
    'default' => __('Responsive & Retina Ready with Clean and Modern Design', 'elizama'),
    'sanitize_callback' => 'format_for_editor',
));

    $wp_customize->add_control(
    new WP_Customize_Textarea_Control(
        $wp_customize,
        'slide_desc2',
        array(
            'label' => __('Slide description 2', 'elizama'),
            'setting' => 'slide_desc2',
            'section' => 'slider_section',
        )
    )
);

    $wp_customize->add_setting('slide_link2', array(
    'default' => '#link2',
    'sanitize_callback' => 'esc_url_raw',
));

    $wp_customize->add_control('slide_link2', array(
    'label' => __('Slide link 2', 'elizama'),
    'setting' => 'slide_link2',
    'section' => 'slider_section',
));

    $wp_customize->add_setting('slide_image3', array(
    'default' => get_template_directory_uri().'/images/slides/slider3.jpg',
    'sanitize_callback' => 'esc_url_raw',
));

    $wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'slide_image3',
        array(
            'label' => __('Slide Image 3', 'elizama'),
            'setting' => 'slide_image3',
            'section' => 'slider_section',
        )
    )
);

    $wp_customize->add_setting('slide_title3', array(
    'default' => __('Incredible Ease of Customization', 'elizama'),
    'sanitize_callback' => 'sanitize_text_field',
));

    $wp_customize->add_control('slide_title3', array(
    'label' => __('Slide title 3', 'elizama'),
    'setting' => 'slide_image3',
    'section' => 'slider_section',
));

    $wp_customize->add_setting('slide_desc3', array(
    'default' => __('Re-Usable features with amazing user experience', 'elizama'),
    'sanitize_callback' => 'format_for_editor',
));

    $wp_customize->add_control(
    new WP_Customize_Textarea_Control(
        $wp_customize,
        'slide_desc3',
        array(
            'label' => __('Slide Description 3', 'elizama'),
            'setting' => 'slide_desc3',
            'section' => 'slider_section',
        )
    )
);

    $wp_customize->add_setting('slide_link3', array(
    'default' => '#link3',
    'sanitize_callback' => 'esc_url_raw',
));

    $wp_customize->add_control('slide_link3', array(
    'label' => __('Slide link 3', 'elizama'),
    'setting' => 'slide_link3',
    'section' => 'slider_section',
));

    $wp_customize->add_setting('slide_image4', array(
    'default' => '',
    'sanitize_callback' => 'format_for_editor',
));

    $wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'slide_image4',
        array(
            'label' => __('Slide Image 4', 'elizama'),
            'setting' => 'slide_image4',
            'section' => 'slider_section',
        )
    )
);

    $wp_customize->add_setting('slide_title4', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field',
));

    $wp_customize->add_control('slide_title4', array(
    'label' => __('Slide title 4', 'elizama'),
    'setting' => 'slide_title4',
    'section' => 'slider_section',
));

    $wp_customize->add_setting('slide_desc4', array(
    'default' => '',
    'sanitize_callback' => 'format_for_editor',
));

    $wp_customize->add_control(
    new WP_Customize_Textarea_Control(
        $wp_customize,
        'slide_desc5',
        array(
            'label' => __('Slide description 4', 'elizama'),
            'setting' => 'slide_desc4',
            'section' => 'slider_section',
        )
    )
);

    $wp_customize->add_setting('slide_link4', array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
));

    $wp_customize->add_control('slide_link5', array(
    'label' => __('Slide link 4', 'elizama'),
    'setting' => 'slide_link4',
    'section' => 'slider_section',
));

    /////////
    $wp_customize->add_setting('slide_image5', array(
    'default' => '',
    'sanitize_callback' => 'format_for_editor',
));

    $wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'slide_image5',
        array(
            'label' => __('Slide Image 5', 'elizama'),
            'setting' => 'slide_image5',
            'section' => 'slider_section',
        )
    )
);

    $wp_customize->add_setting('slide_title5', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field',
));

    $wp_customize->add_control('slide_title5', array(
    'label' => __('Slide title 5', 'elizama'),
    'setting' => 'slide_title5',
    'section' => 'slider_section',
));

    $wp_customize->add_setting('slide_desc5', array(
    'default' => '',
    'sanitize_callback' => 'format_for_editor',
));

    $wp_customize->add_control(
    new WP_Customize_Textarea_Control(
        $wp_customize,
        'slide_desc5',
        array(
            'label' => __('Slide description 5', 'elizama'),
            'setting' => 'slide_desc5',
            'section' => 'slider_section',
        )
    )
);

    $wp_customize->add_setting('slide_link5', array(
    'default' => '',
    'sanitize_callback' => 'esc_url_raw',
));

    $wp_customize->add_control('slide_link5', array(
    'label' => __('Slide link 5', 'elizama'),
    'setting' => 'slide_link5',
    'section' => 'slider_section',
));

    /*
         *
         *  PAGE BOX
         *
         */

    $wp_customize->add_section('page_boxes', array(
    'title' => __('Homepage Boxes', 'elizama'),
    /* translators: 1: Featured Image Dimensions : ( 58 X 58 )<br/> Select Featured Image for these pages <br /> How to set featured image  */
    'description' => sprintf(
        __('Featured Image Dimensions : ( 58 X 58 )<br/> Select Featured Image for these pages <br /> How to set featured image %s', 'elizama'),
        sprintf(
            '<a href="%1$s" target="_blank">%2$s</a>',
            esc_url('"'.SKT_THEME_FEATURED_SET_VIDEO_URL.'"'),
            __('Click Here ?', 'elizama')
        )
    ),
    'priority' => null,
));

    $wp_customize->add_setting(
    'page-setting1',
    array(
        'default' => '0',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'el_sanitize_integer',
    )
);

    $wp_customize->add_control(
    'page-setting1',
    array(
        'type' => 'dropdown-pages',
        'label' => __('Choose a page for box one:', 'elizama'),
        'section' => 'page_boxes',
    )
);

    $wp_customize->add_setting('page-setting2', array(
    'default' => '0',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'el_sanitize_integer',
));

    $wp_customize->add_control('page-setting2', array(
    'type' => 'dropdown-pages',
    'label' => __('Choose a page for box two:', 'elizama'),
    'section' => 'page_boxes',
    'setting' => 'marcio',
));

    $wp_customize->add_setting('page-setting3', array(
    'default' => '0',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'el_sanitize_integer',
));

    $wp_customize->add_control('page-setting3', array(
    'type' => 'dropdown-pages',
    'label' => __('Choose a page for box three:', 'elizama'),
    'section' => 'page_boxes',
));

    $wp_customize->add_setting('page-setting4', array(
    'default' => '0',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'el_sanitize_integer',
));

    $wp_customize->add_control('page-setting4', array(
    'type' => 'dropdown-pages',
    'label' => __('Choose a page for box four:', 'elizama'),
    'section' => 'page_boxes',
));

    /*
         *
         *  SOCIAL
         *
         */

    $wp_customize->add_section('social_sec', array(
    'title' => __('Social Settings', 'elizama'),
    /* translators: 1: More social icon available in  */
    'description' => sprintf(__('More social icon available in %s.', 'elizama'), sprintf('<a href="%1$s" target="_blank">%2$s</a>', esc_url('"'.SKT_PRO_THEME_URL.'"'), __('PRO Version', 'elizama'))),
    'priority' => null,
));

    $wp_customize->add_setting('fb_link', array(
    'default' => '#facebook',
    'sanitize_callback' => 'esc_url_raw',
));

    $wp_customize->add_control('fb_link', array(
    'label' => __('Add facebook link here', 'elizama'),
    'setting' => 'fb_link',
    'section' => 'social_sec',
));

    $wp_customize->add_setting('twitt_link', array(
    'default' => '#twitter',
    'sanitize_callback' => 'esc_url_raw',
));

    $wp_customize->add_control('twitt_link', array(
    'label' => __('Add twitter link here', 'elizama'),
    'setting' => 'twitt_link',
    'section' => 'social_sec',
));

    $wp_customize->add_setting('gplus_link', array(
    'default' => '#gplus',
    'sanitize_callback' => 'esc_url_raw',
));

    $wp_customize->add_control('gplus_link', array(
    'label' => __('Add google plus link here', 'elizama'),
    'setting' => 'gplus_link',
    'section' => 'social_sec',
));

    $wp_customize->add_setting('linked_link', array(
    'default' => '#linkedin',
    'sanitize_callback' => 'esc_url_raw',
));

    $wp_customize->add_control('linked_link', array(
    'label' => __('Add linkedin link here', 'elizama'),
    'setting' => 'linked_link',
    'section' => 'social_sec',
));

    /*
         *
         *  FOOTER CONTACT
         *
         */

    $wp_customize->add_section('contact_sec', array(
    'title' => __('Contact Details', 'elizama'),
    'description' => __('Add you contact details here', 'elizama'),
    'priority' => null,
));

    $wp_customize->add_setting('contact_title', array(
    'default' => __('Contact elizama', 'elizama'),
    'sanitize_callback' => 'sanitize_text_field',
));

    $wp_customize->add_control('contact_title', array(
    'label' => __('Add contact title here', 'elizama'),
    'setting' => 'contact_title',
    'section' => 'contact_sec',
));

    $wp_customize->add_setting('contact_desc', array(
    'default' => __('Sed suscipit mauris nec mauris vulputate, a posuere libero congue. Nam laoreet elit eu erat pulvinar, et efficitur nibh euismod.Nam metus lorem, hendrerit quis ante eget, lobortis elementum neque. Aliquam in ullamcorper quam. Integer euismod ligula in mauris vehic.', 'elizama'),
    'sanitize_callback' => 'format_for_editor',
));

    $wp_customize->add_control(
    new WP_Customize_Textarea_Control(
        $wp_customize,
        'contact_desc',
        array(
            'label' => __('Add contact description here', 'elizama'),
            'setting' => 'contact_desc',
            'section' => 'contact_sec',
        )
    )
);

    $wp_customize->add_setting('contact_add', array(
    'default' => __('Rua Diolinda Rodrigues, Bairro Comercial, Huila, Lubango', 'elizama'),
    'sanitize_callback' => 'format_for_editor',
));

    $wp_customize->add_control(
    new WP_Customize_Textarea_Control(
        $wp_customize,
        'contact_add',
        array(
            'label' => __('Add contact address here', 'elizama'),
            'setting' => 'contact_add',
            'section' => 'contact_sec',
        )
    )
);

    $wp_customize->add_setting('contact_no', array(
    'default' => __('+244 913 750 140', 'elizama'),
    'sanitize_callback' => 'sanitize_text_field',
));

    $wp_customize->add_control('contact_no', array(
    'label' => __('Add contact number here.', 'elizama'),
    'setting' => 'contact_no',
    'section' => 'contact_sec',
));

    $wp_customize->add_setting('contact_mail', array(
    'default' => 'contacto@artphoweb.com',
    'sanitize_callback' => 'sanitize_email',
));

    $wp_customize->add_control('contact_mail', array(
    'label' => __('Add you email here', 'elizama'),
    'setting' => 'contact_mail',
    'section' => 'contact_sec',
));

    /*
         *
         *  LEYOUT SETTING
         *
         */

    $wp_customize->add_section(
    'theme_layout_sec',
    array(
        'title' => __('Layout Settings (PRO Version)', 'elizama'),
        'priority' => null,
        /* translators: 1: Layout Settings available in  */
        'description' => sprintf(__('Layout Settings available in   %s.', 'elizama'), sprintf('<a href="%1$s" target="_blank">%2$s</a>', esc_url('"'.SKT_PRO_THEME_URL.'"'), __('PRO Version', 'elizama'))),
    )
);
    $wp_customize->add_setting(
    'el_options[layout-info]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'type' => 'info_control',
        'capability' => 'edit_theme_options',
    )
);
    $wp_customize->add_control(
    new el_Info($wp_customize, 'layout_section', array(
        'section' => 'theme_layout_sec',
        'settings' => 'el_options[layout-info]',
        'priority' => null,
    ))
);

    /*
         *
         *  FONT
         *
         */

    $wp_customize->add_section(
    'theme_font_sec',
    array(
        'title' => __('Fonts Settings (PRO Version)', 'elizama'),
        'priority' => null,
        /* translators: 1: Font Settings available in  */

        'description' => sprintf(__('Font Settings available in   %s.', 'elizama'), sprintf('<a href="%1$s" target="_blank">%2$s</a>', esc_url('"'.SKT_PRO_THEME_URL.'"'), __('PRO Version', 'elizama'))),
    )
);
    $wp_customize->add_setting(
    'el_options[font-info]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'type' => 'info_control',
        'capability' => 'edit_theme_options',
    )
);
    $wp_customize->add_control(
    new el_Info($wp_customize, 'font_section', array(
        'section' => 'theme_font_sec',
        'settings' => 'el_options[font-info]',
        'priority' => null,
    ))
);

    /*
         *
         *  DOCUMENTATION
         *
         */

    $wp_customize->add_section(
    'theme_doc_sec',
    array(
        'title' => __('Documentation &amp; Support', 'elizama'),
        'priority' => null,
        /* translators: 1: For documentation and support check this link  */

        'description' => sprintf(__('For documentation and support check this link %s.', 'elizama'), sprintf('<a href="%1$s" target="_blank">%2$s</a>', esc_url('"'.SKT_THEME_DOC.'"'), __('elizama Documentation', 'elizama'))),
    )
);
    $wp_customize->add_setting(
    'el_options[info]',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'type' => 'info_control',
        'capability' => 'edit_theme_options',
    )
);
    $wp_customize->add_control(
    new el_Info($wp_customize, 'doc_section', array(
        'section' => 'theme_doc_sec',
        'settings' => 'el_options[info]',
        'priority' => 10,
    ))
);
    get_template_part('class-customizer.php');
}
add_action('customize_register', 'el_customize_register');

//Integer
function el_sanitize_integer($input)
{
    if (is_numeric($input)) {
        return intval($input);
    }
}

function el_custom_css()
{
    ?>
<style type="text/css">
    .site-title::first-letter,
    #secondary .entry-footer::first-letter,
    .entry-header .entry-title::first-letter,
    .entry-header .entry-title::first-letter,
    #content h1.entry-title::first-letter,
    .feature-box a,
    .latest-blog span a,
    .postmeta a:hover,
    #footer .widget-column a:hover,
    #copyright a:hover,
    .blog-post-repeat .entry-summary a,
    .entry-content a,
    .widget-title::first-letter,
    .site-footer::first-letter,
    .blog-post-repeat .blog-title a {
        color: <?php echo esc_html(get_theme_mod('color_scheme', '#f2265d')); ?>;
    }

    .casulo,
    .el_the_excerpt {
        background-color: <?php echo esc_html(get_theme_mod('color_scheme_casulo', '#ffffff')); ?>
    }

    #primary,
    #primary1 {
        background-color: <?php echo esc_html(get_theme_mod('color_primary', '#ffffff')); ?>
    }

    #masthead {
        background-color: <?php echo esc_html(get_theme_mod('color_scheme_header', '#ffffff')); ?>
    }

    #colophon {
        background-color: <?php echo esc_html(get_theme_mod('color_scheme_footer_widght', '#000000')); ?>
    }

    .site-info {
        background-color: <?php echo esc_html(get_theme_mod('color_scheme_footer_copy', '#ce0060')); ?>
    }

    .main-navigation {
        background-color: <?php echo esc_html(get_theme_mod('color_scheme_menu', '#ce0060')); ?>
    }

    .main-navigation ul li:hover>a,
    .main-navigation li.current-menu-item>a,
    .main-navigation li.current-menu-parent>a,
    .main-navigation li.current-page-ancestor>a,
    .main-navigation .current_page_item>a,
    .main-navigation .current_page_parent>a,
    .nivo-caption h1 a,
    .main-navigation ul ul li,
    p.form-submit input[type="submit"],
    #sidebar aside.widget_search input[type="submit"],
    .wpcf7 input[type="submit"],
    .add-icon,
    .phone-icon,
    .mail-icon,
    button,
    .pagination ul li .current,
    .pagination ul li a:hover {
        background-color: <?php echo esc_html(get_theme_mod('color_scheme', '#ce0060')); ?>
    }

    #primary {
        color: <?php echo esc_html(get_theme_mod('color_scheme_content', '#000000')); ?>
    }
</style>
<?php
}
add_action('wp_head', 'el_custom_css');

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function el_customize_preview_js()
{
    wp_enqueue_script('el_customizer', esc_url(get_template_directory_uri().'/js/customizer.js'), array('customize-preview'), '20130508', true);
}
add_action('customize_preview_init', 'el_customize_preview_js');

function el_custom_customize_enqueue()
{
    wp_enqueue_script('elizama-custom-customize', esc_url(get_template_directory_uri().'/js/custom.customize.js'), array('jquery', 'customize-controls'), false, true);
}
add_action('customize_controls_enqueue_scripts', 'el_custom_customize_enqueue');
