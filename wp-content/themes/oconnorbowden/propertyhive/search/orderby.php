<?php
/**
 * Show options for ordering
 *
 * @author    PropertyHive
 * @package  PropertyHive/Templates
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit;
} // Exit if accessed directly

global $propertyhive, $wp_query;

if ( $wp_query->found_posts < 2 ) {
  return;
}
?>
<form class="propertyhive-ordering" method="get">
  <?php
  $results_orderby = apply_filters( 'propertyhive_results_orderby', array(
    'date'       => __( 'Date Added', 'propertyhive' ),
    'price-asc'  => __( 'Price: low to high', 'propertyhive' ),
    'price-desc' => __( 'Price: high to low', 'propertyhive' )
  ) );

  if ( ! empty( $results_orderby ) ) {
    ?>
    <select name="orderby" class="orderby wpcf7-form-control">
      <?php
      foreach ( $results_orderby as $id => $name ) {
        echo '<option value="' . esc_attr( $id ) . '" ' . selected( $orderby, $id, false ) . '>' . esc_attr( $name ) . '</option>';
      }
      ?>
    </select>
    <?php
  }

  // Keep query string vars intact
  foreach ( $_GET as $key => $val ) {
    if ( 'orderby' === $key || 'submit' === $key ) {
      continue;
    }

    if ( is_array( $val ) ) {
      foreach ( $val as $innerVal ) {
        echo '<p>Sort by:</p><input type="hidden" name="' . esc_attr( $key ) . '[]" value="' . esc_attr( $innerVal ) . '" />';
      }

    } else {
      echo '<input type="hidden" name="' . esc_attr( $key ) . '" value="' . esc_attr( $val ) . '" />';
    }
  }
  ?>
</form>
