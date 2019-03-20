<?php
/**
 * The template for displaying Search Form.
 *
 * @since 2.2.0
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label>
        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Search &hellip;', 'placeholder', 'elizama'); ?>" value="<?php echo esc_attr(get_search_query()); ?>" name="s" title="<?php esc_attr_x('Search for:', 'label', 'elizama'); ?>">
    </label>
    <input type="submit" class="search-submit" value="<?php echo esc_attr_x('Search', 'submit button', 'elizama'); ?>">
</form> 