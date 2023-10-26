<?php
add_filter( 'acf/fields/google_map/api', function ( $api ) {
  $api['key'] = 'AIzaSyD9_5Oy0rHXa0rJVMkGqSg-e2hCn3iIt6g';

  return $api;
} );
