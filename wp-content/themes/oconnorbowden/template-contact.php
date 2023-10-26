<?php
/* Template Name: Contact */
get_header();
global $post, $property;
?>



<?php if ( have_posts() ) : ?>
  <?php while ( have_posts() ) : the_post(); ?>
    <div class="container-fluid max-width-container">
      <div class="row justify-content-between">
        <div class="col-lg-7 contact-main-panel">
          <?php get_flexible_contact_content();
          $args  = array(
            'post_type'   => 'offices',
            'post_status' => 'publish'
          );
          $query = new WP_Query( $args );
          ?>
          <?php if ( $query->have_posts() ) : ?>
            <div class="map">
              <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <?php $map = get_field( 'location' ); ?>
                <svg data-lat="<?php echo $map['lat']; ?>" data-lng="<?php echo $map['lng']; ?>"
                     data-title="<?php echo the_title() ?>" class="icon marker">
                  <use xlink:href="#icon-map-pin"></use>
                </svg>
              <?php endwhile; ?>
            </div>
          <?php endif; ?>
          <h5 class="section-title">Get In Contact</h5>
          <?php echo do_shortcode( '[contact-form-7 id="5" title="Contact Form"]' ); ?>
          <div class="spacer"></div>
        </div>
        <div class="col-lg-4 contact-side-panel">
          <?php
          $args  = array(
            'post_type'   => 'offices',
            'post_status' => 'publish'
          );
          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            while ( $query->have_posts() ) : $query->the_post();
              ?>
              <h6 class="section-title"><?php echo the_title(); ?></h6>
              <?php if ( have_rows( 'address' ) ): ?>
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
                        <svg class="icon icon-s"><use xlink:href="#icon-location"></use></svg>
                        <?php if ( $address_line_1 ): echo '<li> ' . $address_line_1 . ' </li>'; endif; ?>
                         <?php if ( $address_line_2 ): echo '<li> ' . $address_line_2 . ' </li>'; endif; ?>
                         <?php if ( $city ): echo '<li> ' . $city . ' </li>'; endif; ?>
                         <?php if ( $post_code ): echo '<li> ' . $post_code . ' </li>'; endif; ?>
                     </ul>
                     <?php endwhile;
                     ?>
                     <ul class="contact">
                        <?php if ( $telephone ): echo '<li><svg class="icon icon-s"><use xlink:href="#icon-phone"></use></svg> ' . $telephone . ' </li>'; endif; ?>
                        <?php if ( $email ): echo '<li><svg class="icon icon-s"><use xlink:href="#icon-email"></use></svg> ' . $email . ' </li>'; endif; ?>
                     </ul>
                   </span>
              <?php endif; ?>
              <?php if ( have_rows( 'opening_hours' ) ): ?>
                <span>
                  <h6>Opening Hours</h6>
                    <ul class="text-list">
                      <?php while ( have_rows( 'opening_hours' ) ): the_row(); ?>
                        <?php $item = get_sub_field( 'item' ) ?>
                        <?php if ( $item ): echo '<li> ' . $item . ' </li>'; endif; ?>
                      <?php endwhile; ?>
                    </ul>
                </span>
              <?php endif ?>
            <?php
            endwhile;
          endif;
          ?>
        </div>
      </div>
    </div>
  <?php
  endwhile;
endif;
get_footer(); ?>
