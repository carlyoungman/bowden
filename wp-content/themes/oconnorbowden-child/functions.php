<?php

function register_my_menus() {
        register_nav_menus(
        array(
          'secondary_navigation' => __('Main Menu'),
          'footer_menu' => __('Footer Menu')
        )
      );
    }
add_action('init', 'register_my_menus');



function atg_menu_classes($classes, $item, $args)
{
    if ($args->theme_location == 'secondary_navigation') {
        $classes[] = 'col-12 col-lg';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'atg_menu_classes', 1, 3);

function localize_printed_scripts() {
  global $wp, $property;
    if($property):
    wp_localize_script( 'propertyhive_make_enquiry', 'propertyhive_make_property_enquiry_params', apply_filters( 'propertyhive_make_property_enquiry_params', array(
      'ajax_url'        => PH()->ajax_url()
    ) ) );
  endif;
}
localize_printed_scripts();
add_action('init', 'Offices', 0);



function remove_posts_menu() {
  remove_menu_page('edit.php');
}
add_action('admin_menu', 'remove_posts_menu');
