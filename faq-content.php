<?php
/*
Template Name: FAQ
*/
?>

<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Elizama
 * @since elizama 0.4
 */
get_header();
?>
 <h2 class="archive-title"><?php esc_html(el_get_breadcrumb());?></h2>

 <!--	FAQ -->
        <div class="container col-lg-9">
            <section>
                <div class="page-header" id="features">
                    <h2>FAQ.<small> <?php __('Common questions', 'elizama');?> </small></h2>
                </div><!-- End page header -->
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <a href="#collapse-1" data-toggle="collapse" data-parent="#accordion">
                                   <?php $d = esc_html(get_theme_mod('faq_title')); ?>
                                </a>
                            </div><!-- End panel Title -->
                            <div id="collapse-1" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <?php echo esc_html(get_theme_mod('faq_desc')); ?>
                                </div>
                            </div><!-- End panel collapse -->
                        </div>
                    </div>
                </div><!-- End Panel Goup -->
            </section>
        </div><!-- End Container -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
