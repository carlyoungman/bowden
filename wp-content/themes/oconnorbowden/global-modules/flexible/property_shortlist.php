<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}
global $property;
$base  = 'property-shortlist';
$args  = array(
  'post_type'   => 'property',
  'post_status' => 'publish',
);
$query = new WP_Query( $args );
if ( $query->have_posts() ) : ?>
  <section class="spacer <?php echo esc_attr( $base ) ?>">
    <div class="container-fluid max-width-container">
      <div class="row">
        <div class="col">
          <h4 class="section-title">Your Property shortlist</h4>
        </div>
      </div>
    </div>
    <div class="container-fluid max-width-container">
      <div class="row">
        <div class="col">
          <?php echo do_shortcode( '[shortlisted_properties]' ); ?>
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
