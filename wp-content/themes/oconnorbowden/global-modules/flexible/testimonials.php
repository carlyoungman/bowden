<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}
$base                 = 'testimonials';
$testimonials_display = get_field( 'testimonials_display' );
$args                 = array(
  'post_type'      => 'testimonials',
  'post_status'    => 'publish',
  'orderby'        => 'rand',
  'posts_per_page' => '1'
);
$query                = new WP_Query( $args );
?>
<?php if ( $query->have_posts() ) : ?>
  <?php while ( $query->have_posts() ) : $query->the_post(); ?>
    <?php
    $persons_name     = get_field( 'testimonial_persons_name' );
    $testimonial      = get_field( 'testimonial_testimonial' );
    $supporting_image = get_field( 'testimonial_supporting_image' );
    ?>
    <section class="spacer spacer--has-background <?php echo esc_attr( $base ) ?>">
      <div class="container-fluid max-width-container">
        <div class="row">
          <div class="col-lg-6">
            <div class="image-holder" style="background-image:url(<?php echo $supporting_image['sizes']['large'] ?>)">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="vertical-align quote">
              <h2>Testimonials</h2>
              <p><q><?php echo $testimonial ?></q></p>
              <strong><?php echo $persons_name ?></strong>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php
  endwhile;
  wp_reset_postdata();
  wp_reset_query();
endif;
?>
