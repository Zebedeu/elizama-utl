<?php
add_action('header_init', 'title');

function title()
{
    ?>
<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
<?php
}

add_action('page_init', 'page');

function page()
{
    get_template_part('template-parts/content', 'page');
}

add_action('loop_init', 'loop');

function loop()
{
    while (have_posts()) : the_post();

    do_action('page_init');

    // the_post_navigation();

    do_action('comment_init');

    endwhile; // End of the loop.
}

add_action('format_init', 'format');

function format()
{
    get_template_part('template-parts/content', get_post_format());
}

add_action('none_init', 'content_none');

function content_none()
{
    get_template_part('template-parts/content', 'none');
}

add_action('content_init', 'content');

function content()
{
    the_content();
}

/**
 * @param $val_zero
 * @param $val_max
 */
function el_the_excerpt($val_zero, $val_max)
{
    $temp_arr_content = explode(' ', substr(strip_tags(get_the_content()), $val_zero, $val_max));
    $temp_arr_content[count($temp_arr_content) - 1] = '';
    $display_arr_content = implode(' ', $temp_arr_content);
    echo esc_html($display_arr_content);
}

add_action('comment_init', 'comments');

function comments()
{
    // If comments are open or we have at least one comment, load up the comment template.
    if (comments_open() || get_comments_number()) :
        comments_template();
    endif;
}

add_action('get_breadcrumb', 'el_get_breadcrumb');
function el_get_breadcrumb()
{
    global $post;
    $show_breadcrumb = '';
    if (isset($post->ID) && is_numeric($post->ID)) {
        $show_breadcrumb = get_post_meta($post->ID, 'el_show_breadcrumb', true);
    }
    if ($show_breadcrumb == 1 || $show_breadcrumb == '') {
        echo '<div class="box-nav breadcrumb"><div class=""><div class="crumb">';
        echo wp_kses_data(El_breadcrumb::el_breadcrumbs());
    } else {
        echo '</div><div class="input hidden elizama-searchform"><form action="'.esc_url(home_url('/')).'" id="cse-search-box"><input type="text" value=" Search" onFocus="if(this.value==\'Search\'){this.value=\'\'}" id="s" onBlur="if(this.value==\'\'){this.value=\'Search\'}" name="s" class="search_r_text"><input type="submit" name="sa" class="search-btn" value=""></form></div> <div class="clear"></div></div></div>';
    }
}

add_action('posted_on_end_comments', 'el_posted_on__');
function el_posted_on__()
{
    if ('post' === get_post_type()) : ?>
<div class="entry-meta">
    <?php el_posted_on(); ?>
    <span class="comments_count clearfix entry-comments-link"><?php comments_popup_link('0', '1', '%'); ?></span>
</div><!-- .entry-meta -->
<?php endif;
}

function el_romdom_sidebar()
{
    ?>
<h3 class="entry-header entry-title"><?php esc_html_e('Random post', 'elizama'); ?></a></h3>
<?php

$get_blog_id = get_category_id('blog');

    $args = array(
    'post_type' => 'post',
    'cat' => $get_blog_id,
    'posts_per_page' => 2,
    'orderby' => 'rand',
);
    query_posts($args);
    $x = 0;
    while (have_posts()) : the_post();

    if ($x == 2) {
        ?>
<p class="last">
    <?php
    } else {
        ?>
    <!--           <li>-->
    <?php
    } ?>

    <header class="entry-header">
        <?php the_title(sprintf('<h5 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h5>'); ?>
    </header><!-- .entry-header -->

    <a href="<?php esc_url(the_permalink()); ?>"><?php the_post_thumbnail('min-page'); ?></a>
    <p><?php
        $temp_arr_content = explode(' ', substr(strip_tags(get_the_content()), 0, 90));
    $temp_arr_content[count($temp_arr_content) - 1] = '';
    $display_arr_content = implode(' ', $temp_arr_content);
    echo esc_html($display_arr_content); ?><?php if (strlen(strip_tags(get_the_content())) > 180) {
        echo esc_html('...'); ?></p>
    </li>
    <?php
    } else {
        ?>
    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/img_404.png" />
    <?php
    } ?>

    <?php ++$x; ?>
    <?php endwhile; ?>
    <?php
    wp_reset_query();
}

add_action('slide', 'el_slide');

function el_slide()
{
    if (is_home() && is_front_page()) {
        ?>
    <section id="home_slider">

        <?php
        $sldimages = '';
        $sldimages = array(
            '1' => get_template_directory_uri().'/images/slides/slider1.jpg',
            '2' => get_template_directory_uri().'/images/slides/slider2.jpg',
            '3' => get_template_directory_uri().'/images/slides/slider3.jpg',
            '4' => get_template_directory_uri().'/images/slides/slider4.jpg',
            '5' => get_template_directory_uri().'/images/slides/slider3.jpg',
        ); ?>

        <?php
        $slAr = array();
        $m = 0;
        for ($i = 1; $i < 6; ++$i) {
            if (get_theme_mod('slide_image'.$i, $sldimages[$i]) != '') {
                $imgSrc = get_theme_mod('slide_image'.$i, $sldimages[$i]);
                $imgTitle = get_theme_mod('slide_title'.$i);
                $imgDesc = get_theme_mod('slide_desc'.$i);
                $imgLink = get_theme_mod('slide_link'.$i);
                if (strlen($imgSrc) > 3) {
                    $slAr[$m]['image_src'] = get_theme_mod('slide_image'.$i, $sldimages[$i]);
                    $slAr[$m]['image_title'] = get_theme_mod('slide_title'.$i);
                    $slAr[$m]['image_desc'] = get_theme_mod('slide_desc'.$i);
                    $slAr[$m]['image_link'] = get_theme_mod('slide_link'.$i);
                    ++$m;
                }
            }
        }
        $slideno = array();
        if ($slAr > 0) {
            $n = 0; ?>
        <div class="slider-wrapper theme-default">
            <div id="slider" class="nivoSlider">
                <?php 
                foreach ($slAr as $sv) {
                    ++$n; ?><img src="<?php echo esc_url($sv['image_src']); ?>" alt="<?php echo esc_attr($sv['image_title']); ?>" title="<?php echo esc_attr('#slidecaption'.$n); ?>" /><?php
                                                                                                                                                                                        $slideno[] = $n;
                } ?>
            </div><?php
                    foreach ($slideno as $sln) {
                        ?>
            <div id="slidecaption<?php echo esc_html($sln); ?>" class="nivo-html-caption">
                <div class="slide_info">
                    <h1><a href="<?php echo esc_url(get_theme_mod('slide_link'.$sln, '#link'.$sln)); ?>"><?php echo esc_html(get_theme_mod('slide_title'.$sln, 'Slide Title'.$sln)); ?></a></h1>
                    <p><?php echo esc_html(get_theme_mod('slide_desc'.$sln, 'Slide Description'.$sln)); ?></p>
                </div>
            </div><?php
                    } ?>
        </div>
        <div class="clear"></div><?php
        } ?>
    </section>
    <?php
    }
}
