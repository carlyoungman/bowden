<?php
/**
 * Loop Summary
 *
 * @author    PropertyHive
 * @package  PropertyHive/Templates
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit;
} // Exit if accessed directly

global $property;
?>
<div class="summary">

  <?php
  echo substr( strip_tags( $property->post_excerpt ), 0, 200 );
  if ( strlen( strip_tags( $property->post_excerpt ) ) > 200 ) {
    echo '...';
  }
  ?>

</div>
