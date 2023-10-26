<?php if ( ! defined( 'ABSPATH' ) ) {
  exit;
}
$base = 'content-form';
global $post, $property;
$args  = array(
  'post_type'   => 'offices',
  'post_status' => 'publish'
);
$query = new WP_Query( $args );
?>
<?php if ( $query->have_posts() ) : ?>
  <section class="<?php echo esc_html( $base ); ?> spacer">
    <div class="container max-width-container">
      <div class="row">
        <div class="col"><h4 class="section-title">Get In Contact</h4></div>
      </div>
      <div class="row">
        <div class="col-lg-4">
          <?php echo do_shortcode( '[contact-form-7 id="5" title="Contact Form"]' ); ?>
        </div>
        <div class="col-lg-8">
          <div class="map">
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
              <?php $map = get_field( 'location' ); ?>
              <svg data-lat="<?php echo $map['lat']; ?>" data-lng="<?php echo $map['lng']; ?>"
                   data-title="<?php echo the_title() ?>" class="icon marker">
                <use xlink:href="#icon-map-pin"></use>
              </svg>
            <?php endwhile; ?>
          </div>
        </div>
      </div>
      <div class="row office-card justify-content-center">
        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
          <div class="col-md-4">
            <div id="office-card__row">
              <?php
              $telephone = get_field( 'telephone' );
              $email     = get_field( 'email' )
              ?>
              <span>
                        <?php while ( have_rows( 'address' ) ): the_row();
                          $address_line_1 = get_sub_field( 'address_line_1', 'option' );
                          $address_line_2 = get_sub_field( 'address_line_2', 'option' );
                          $city           = get_sub_field( 'city', 'option' );
                          $post_code      = get_sub_field( 'post_code', 'option' );
                          ?>
                          <ul class="address">
                           <?php if ( $address_line_1 ): echo '<li><h4>' . $address_line_1 . '</h4></li>'; endif; ?>
                           <?php if ( $address_line_2 ): echo '<li> ' . $address_line_2 . ' </li>'; endif; ?>
                           <?php if ( $city ): echo '<li> ' . $city . ' </li>'; endif; ?>
                           <?php if ( $post_code ): echo '<li> ' . $post_code . ' </li>'; endif; ?>
                        </ul>
                        <?php endwhile;
                        wp_reset_postdata();
                        wp_reset_query();
                        ?>
                <?php if ( $telephone || $email ) { ?>
                  <ul class="contact">
                           <?php if ( $telephone ): echo '<li>' . $telephone . ' </li>'; endif; ?>
                           <?php if ( $email ): echo '<li>' . $email . ' </li>'; endif; ?>
                        </ul>
                <?php } ?>
                  </span>
            </div>
          </div>
        <?php
        endwhile;
        wp_reset_postdata();
        wp_reset_query();
        ?>
      </div>
    </div>
  </section>
<?php
endif;
?>
