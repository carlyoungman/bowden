<?php
$theme_url = get_template_directory();
//    require_once($theme_url . '/wordpress-includes/acf.php');
require_once( $theme_url . '/wordpress-includes/post-types.php' );
require_once( $theme_url . '/wordpress-includes/security.php' );
require_once( $theme_url . '/wordpress-includes/theme-options.php' );
require_once( $theme_url . '/wordpress-includes/property-functions.php' );
require_once( $theme_url . '/wordpress-includes/property-actions.php' );
require_once( $theme_url . '/wordpress-includes/flexible.php' );
require_once( $theme_url . '/wordpress-includes/google-maps.php' );
require_once( $theme_url . '/wordpress-includes/twitter-api.php' );
add_action( 'wp_enqueue_scripts', function () {
  wp_enqueue_style( 'styles', get_template_directory_uri() . '/dist/assets/css/main.min.css', array(), '1.3', 'all' );
  wp_register_script( 'maps', '//maps.googleapis.com/maps/api/js?key=AIzaSyD9_5Oy0rHXa0rJVMkGqSg-e2hCn3iIt6g', array(), '3.0.0', true );
  wp_register_script( 'scripts', get_template_directory_uri() . '/dist/assets/javascript/app.bundle.js', array(
    'jquery',
    'maps'
  ), '1.0' );
  wp_enqueue_script( 'scripts' );
  wp_deregister_style( 'propertyhive-general' );
  wp_deregister_style( 'ph-mortgage-calculator' );
  wp_deregister_style( 'ph-rental-yield-calculator' );
  wp_deregister_style( 'ph-stamp-duty-calculator' );
  wp_deregister_script( 'flexslider' );
  wp_deregister_script( 'flexslider-init' );
  wp_deregister_style( 'flexslider_css' );
} );

add_action( "propertyhive_property_imported_blm", "correct_property_availability", 10, 2 );

function correct_property_availability( $post_id, $property ) {

  if ( $property['TRANS_TYPE_ID'] == '2' || $property['TRANS_TYPE_ID'] == '1' ) {

    // It's a lettings property

    wp_suspend_cache_invalidation( false );

    wp_defer_term_counting( false );

    wp_defer_comment_counting( false );


    if ( $property['STATUS_ID'] == '0' ) // AVAILABLE

    {

      wp_delete_object_term_relationships( $post_id, 'availability' );

      wp_set_object_terms( $post_id, 6, 'availability' ); // CHANGE 6 TO BE YOUR 'TO LET' TERM ID

    }


    wp_suspend_cache_invalidation( true );

    wp_defer_term_counting( true );

    wp_defer_comment_counting( true );

  }

}


function theme_colour( $element ) {

  global $theme_colour;

  $theme_colour = 'blue';

  return strtolower( $theme_colour );

}

add_action( 'acf/init', 'theme_colour' );

add_filter( 'propertyhive_property_enquiry_form_fields', function ( $fields ) {
  // Google reCaptcha v3
  $fields['recaptcha'] = array(
    'type'     => 'recaptcha-v3',
    'site_key' => '6Ld_YosgAAAAALq2suwFRGgGvPW75Vl3Yp3F-Uh',
    'secret'   => '6Ld_YosgAAAAAKlJ5RnGHdzEq5PtCkmdVTsSx_UW',
  );

  return $fields;
}, 10, 1 );

