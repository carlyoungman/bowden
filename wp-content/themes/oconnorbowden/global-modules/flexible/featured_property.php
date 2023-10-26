<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}
$base         = 'featured-property';
global $property;
$args  = array(
  'post_type'   => 'property',
  'post_status' => 'publish',
);
$query = new WP_Query( $args );
if ( $query->have_posts() ) : ?>
  <section class="<?php echo esc_attr( $base ) ?> spacer">
    <div class="container-fluid max-width-container">
      <div class="row">
        <div class="col">
          <h4 class="section-title">Featured Properties</h4>
        </div>
      </div>
    </div>
    <div class="container-fluid max-width-container">
      <div class="row">
        <div class="col-lg">
          <?php echo do_shortcode( '[featured_properties per_page=3]' ); ?>
        </div>
      </div>
    </div>
  </section>
<?php
else:
  wp_reset_postdata();
  wp_reset_query();
endif;
?>
