<?php
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
add_image_size( 'hero', 1900 );

function custom_excerpt_length( $length ) {
  return 20;
}

add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


// Replaces the excerpt "Read More" text by a link


function new_excerpt_more( $more ) {
  global $post;

  return '...';
}

add_filter( 'excerpt_more', 'new_excerpt_more' );

function cc_mime_types( $mimes ) {
  $mimes['svg'] = 'image/svg+xml';

  return $mimes;
}

add_filter( 'upload_mimes', 'cc_mime_types' );


add_action( 'get_header', 'remove_admin_login_header' );
function remove_admin_login_header() {
  remove_action( 'wp_head', '_admin_bar_bump_cb' );
}

function remove_menus() {
  remove_menu_page( 'edit-comments.php' );
  if ( ! current_user_can( 'administrator' ) ) {
    remove_menu_page( 'themes.php' );
    remove_menu_page( 'plugins.php' );
    remove_menu_page( 'tools.php' );
    remove_menu_page( 'options-general.php' );
  }
}

add_action( 'admin_menu', 'remove_menus' );

if ( function_exists( 'acf_add_options_page' ) ) {
  acf_add_options_page( array(
    'page_title' => 'General Settings',
    'menu_title' => 'General Settings',
    'menu_slug'  => 'general',
    'capability' => 'edit_posts',
    'redirect'   => true
  ) );

  acf_add_options_sub_page( array(
    'page_title' => 'Theme',
    'menu_title' => 'Theme',
    'menu_slug'  => 'theme',
    'capability' => 'edit_posts',
    'redirect'   => false,
    'parent'     => 'general'
  ) );

  acf_add_options_sub_page( array(

    'page_title' => 'Website Disclaimer',
    'menu_title' => 'Website Disclaimer',
    'menu_slug'  => 'website_disclaimer',
    'capability' => 'edit_posts',
    'redirect'   => false,
    'parent'     => 'general'
  ) );


  acf_add_options_sub_page( array(

    'page_title' => 'Property Sale Disclaimer',
    'menu_title' => 'Property Sale Disclaimer',
    'menu_slug'  => 'property_sale_disclaimer',
    'capability' => 'edit_posts',
    'redirect'   => false,
    'parent'     => 'general'
  ) );


  acf_add_options_sub_page( array(

    'page_title' => 'Social Media',
    'menu_title' => 'Social Media',
    'menu_slug'  => 'social_media',
    'capability' => 'edit_posts',
    'redirect'   => false,
    'parent'     => 'general'

  ) );


  acf_add_options_sub_page( array(

    'page_title' => 'Corporate Brochures',
    'menu_title' => 'Corporate Brochures',
    'menu_slug'  => 'corporate_brochures',
    'capability' => 'edit_posts',
    'redirect'   => false,
    'parent'     => 'general'
  ) );

  acf_add_options_sub_page( array(

    'page_title' => 'Property Pages',
    'menu_title' => 'Property Pages',
    'menu_slug'  => 'Property Pages',
    'capability' => 'edit_posts',
    'redirect'   => false,
    'parent'     => 'general'
  ) );


  if ( get_current_blog_id() == 1 ) {

    acf_add_options_sub_page( array(
      'page_title' => 'Developments',
      'menu_title' => 'Developments',
      'menu_slug'  => 'developments',
      'capability' => 'edit_posts',
      'redirect'   => false,
      'parent'     => 'general'
    ) );

    acf_add_options_page( array(

      'page_title' => 'Partners',
      'menu_title' => 'Partners',
      'menu_slug'  => 'partners',
      'capability' => 'edit_posts',
      'icon_url'   => 'dashicons-images-alt2',
      'redirect'   => false,
      'parent'     => 'general'
    ) );


    acf_add_options_sub_page( array(

      'page_title' => 'Our People',
      'menu_title' => 'Our People',
      'menu_slug'  => 'people',
      'capability' => 'edit_posts',
      'redirect'   => false,
      'parent'     => 'general'
    ) );


  }

}


add_action( 'acf/register_fields', function () {
  include_once( 'acf-cf7/acf-cf7.php' );
} );
