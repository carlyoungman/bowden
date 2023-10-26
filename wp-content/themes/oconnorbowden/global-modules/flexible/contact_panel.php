<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}
$company         = get_field( 'company_logo' );
$contact_display = get_field( 'display_contact_form' );
$base            = 'contact-panel';
?>
<section class="spacer <?php echo esc_html( $base ); ?>" id="contact-panel">
  <div class="container-fluid max-width-container">
    <div class="row">
      <div class="col"><h4 class="section-title">Get in contact</h4></div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="office-select">
          <h3>Select Office</h3>
          <ul class="row">
            <?php if ( $company && in_array( 'manchesterCityCenter', $company ) ): ?>
              <?php
              global $switched;
              switch_to_blog( 3 );
              $map = get_field( 'location', 'option' );
              ?>
              <li class="green col-lg active" data-lat="<?php echo $map['lat']; ?>"
                  data-lng="<?php echo $map['lng']; ?>">
                <p>Manchester City Center</p>
              </li>
              <?php restore_current_blog(); ?>

            <?php endif; ?>
            <?php if ( $company && in_array( 'greaterManchesterAndCheshire', $company ) ): ?>
              <li class="blue col-lg">
                <p>Greater Manchester &amp; Chesire</p>
              </li>
            <?php endif; ?>
            <?php if ( $company && in_array( 'englandAndWalse', $company ) ): ?>
              <li class="yellow col-lg">
                <p>England &amp; Walse</p>
              </li>
            <?php endif; ?>
            <?php if ( $company && in_array( 'manchester', $company ) ): ?>
              <li class="orange col-lg">
                <p>Manchester</p>
              </li>
            <?php endif; ?>
            <?php if ( $company && in_array( 'northWest', $company ) ): ?>
              <li class="purple col-lg">
                <p>North West</p>
              </li>
            <?php endif; ?>
          </ul>
        </div>
        <div class="magic-line-wrapper">
          <span id="magic-line"></span>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="contact-form">
          <?php echo do_shortcode( '[contact-form-7 id="81" title="Contact Form"]' ); ?>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="map">
          <svg data-lat="<?php echo $map['lat']; ?>" data-lng="<?php echo $map['lng']; ?>" class="icon marker">
            <use xlink:href="#icon-map-pin"></use>
          </svg>
        </div>
      </div>
    </div>
  </div>
</section>
