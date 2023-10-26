<?php
/**
 * Single Property Meta
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
<div class="Letting Information">
  <h4><?php _e( 'Letting Information' ); ?></h4>
  <?php do_action( 'propertyhive_property_meta_start' ); ?>
  <ul>
    <?php do_action( 'propertyhive_property_meta_list_start' ); ?>
    <?php if ( $property->department != 'commercial' ) {
      ?>
      <?php
      switch ( $property->department ) {
        case "residential-sales":
        {
          ?>

          <?php if ( $property->tenure != '' ) {
          ?>
          <li class="tenure"><?php _e( 'Tenure', 'propertyhive' );
          echo ': ' . $property->tenure; ?></li><?php
        } ?>

          <?php
          break;
        }
        case "residential-lettings":
        {
          ?>
          <?php if ( $property->available_date != '' ) {
          ?>
          <li class="available"><?php _e( 'Available', 'propertyhive' );
          echo ': ' . $property->get_available_date(); ?></li><?php
        } ?>

          <?php if ( $property->furnished != '' ) {
          ?>
          <li class="furnished"><?php _e( 'Furnished', 'propertyhive' );
          echo ': ' . $property->furnished; ?></li><?php
        } ?>

          <?php if ( $property->deposit > 0 ) {
          ?>
          <li class="deposit"><?php _e( 'Deposit', 'propertyhive' );
          echo ': ' . $property->get_formatted_deposit(); ?></li><?php
        } ?>


          <?php
          break;
        }
      } ?>

      <?php
    } // end if residential?>

    <?php do_action( 'propertyhive_property_meta_list_end' ); ?>

  </ul>

  <?php do_action( 'propertyhive_property_meta_end' ); ?>

</div>
