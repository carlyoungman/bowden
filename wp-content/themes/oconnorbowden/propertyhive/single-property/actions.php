<?php
/**
 * Single Property Actions (Make Enquiry etc)
 * Editable through use of the filter propertyhive_single_property_actions
 *
 * @author    PropertyHive
 * @package  PropertyHive/Templates
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit;
} // Exit if accessed directly

global $post, $property;
?>
<div class="property_actions">
  <?php do_action( 'propertyhive_property_actions_start' ); ?>
  <?php
  do_action( 'propertyhive_property_actions_list_start' );
  ?>
  <?php
  foreach ( $actions as $action ) {
    $action['class'] = ( isset( $action['class'] ) ) ? $action['class'] : '';
    echo '<li data-link="' . $action['class'] . '"> <img src="' . $action['href'] . '"></img></li>';
  }
  ?>
  <?php do_action( 'propertyhive_property_actions_list_end' ); ?>
  <?php do_action( 'propertyhive_property_actions_end' ); ?>

</div>
