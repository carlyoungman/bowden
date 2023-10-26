<?php

define( 'DISALLOW_FILE_EDIT', true );
remove_action( 'wp_head', 'wp_generator' );

// Removing the version number in WordPress Head
remove_action( 'wp_head', 'wp_generator' );

// Disable WordPress Login Hints

function no_wordpress_errors() {

  return 'We have disabled Login Hints, This helps us keep unwanted visitors out, like you.';

}

add_filter( 'login_errors', 'no_wordpress_errors' );

// Blocking Malicious Queries

function blockBadQueries() {

  global $user_ID;

  if ( $user_ID ) {

    if ( ! current_user_can( 'level_10' ) ) {

      if ( strlen( $_SERVER['REQUEST_URI'] ) > 255 ||

           strpos( $_SERVER['REQUEST_URI'], "eval(" ) ||

           strpos( $_SERVER['REQUEST_URI'], "CONCAT" ) ||

           strpos( $_SERVER['REQUEST_URI'], "UNION+SELECT" ) ||

           strpos( $_SERVER['REQUEST_URI'], "base64" ) ) {

        @header( "HTTP/1.1 414 Request-URI Too Long" );

        @header( "Status: 414 Request-URI Too Long" );

        @header( "Connection: Close" );

        @exit;

      }

    }

  }

}

blockBadQueries();
