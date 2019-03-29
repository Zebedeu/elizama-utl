<?php


// add_filter( 'woocommerce_enqueue_styles', 	'__return_empty_array', 10 );


remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
remove_action('woocommerce_after_shop_loop', 'woocommerce_pagination', 10);
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
add_action('el_content_top', 'woocommerce_breadcrumb', 10);

add_action('woocommerce_after_shop_loop', 'woocommerce_catalog_ordering', 10);
add_action('woocommerce_after_shop_loop', 'woocommerce_result_count', 20);
add_action('woocommerce_after_shop_loop', 'woocommerce_pagination', 30);
add_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 10);
add_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);


remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
