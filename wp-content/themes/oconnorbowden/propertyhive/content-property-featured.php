<?php
/**
 * The template for displaying a single property within search results loops.
 *
 * Override this template by copying it to yourtheme/propertyhive/content-property.php
 *
 * @author    PropertyHive
 * @package  PropertyHive/Templates
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit;
} // Exit if accessed directly

global $property, $propertyhive_loop;

// Store loop count we're currently on
if ( empty( $propertyhive_loop['loop'] ) ) {
  $propertyhive_loop['loop'] = 0;
}

// Store column count for displaying the grid
if ( empty( $propertyhive_loop['columns'] ) ) {
  $propertyhive_loop['columns'] = apply_filters( 'loop_search_results_columns', 1 );
}

// Ensure visibility
if ( ! $property ) {
  return;
}

// Increase loop count
++ $propertyhive_loop['loop'];

// Extra post classes
$classes = array( 'clear' );
if ( 0 == ( $propertyhive_loop['loop'] - 1 ) % $propertyhive_loop['columns'] || 1 == $propertyhive_loop['columns'] ) {
  $classes[] = 'first';
}
if ( 0 == $propertyhive_loop['loop'] % $propertyhive_loop['columns'] ) {
  $classes[] = 'last';
}
if ( $property->featured == 'yes' ) {
  $classes[] = 'featured';
}
?>
<li>
  <div <?php post_class( $classes ); ?>>
    <?php do_action( 'propertyhive_before_search_results_loop_item' ); ?>
    <div class="row">
      <a class="col-md-7 full-width" href="<?php the_permalink(); ?>">
        <div class="thumbnail">
          <?php echo count_images() ?>
          <?php
          do_action( 'propertyhive_before_search_results_loop_item_title' );
          ?>
        </div>
        <div class="details-wrapper">
          <div class="price-wrapper">
            <?php do_action( 'propertyhive_price' );
            get_per_week_price(); ?>
          </div>
          <?php marketing_flags(); ?>
        </div>
      </a>
      <div class="col-md-5 full-width">
        <div class="details">
          <a href="<?php the_permalink(); ?>">
            <h4><?php the_title(); ?></h4>
            <?php
            echo bedrooms_bathrooms();
            do_action( 'propertyhive_after_search_results_loop_item_title' );
            ?>
          </a>
          <?php echo show_referance_number(); ?>
        </div>
        <?php do_action( 'propertyhive_after_search_results_loop_item' ); ?>
      </div>
    </div>
  </div>
</li>
