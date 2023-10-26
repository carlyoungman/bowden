<?php
/**
 * The template for displaying property content in the single-property.php template
 *
 * Override this template by copying it to yourtheme/propertyhive/content-single-property.php
 *
 * @author      PropertyHive
 * @package     PropertyHive/Templates
 * @version     1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
  exit;
} // Exit if accessed directly
global $property;
?>
<?php
if ( post_password_required() ) {
  echo get_the_password_form();

  return;
}
?>
<div class="container-fluid max-width-container" data-property="<?php echo the_ID(); ?>">
  <div class="row">
    <div class="col-lg-12 details-heading-top">
      <div class="row">
        <div class="col-md-8">
          <h1 class="h3 title"><?php the_title(); ?></h1>
          <span class="address"><?php echo $property->get_formatted_full_address(); ?></span>
          <?php echo bedrooms_bathrooms(); ?>
        </div>
        <div class="col-md-4">
          <div class="price-wrapper">
            <h4><?php do_action( 'propertyhive_price' );
              echo get_per_week_price(); ?> </h4>
            <?php echo show_referance_number(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-8">
      <div id="property-<?php the_ID(); ?>" <?php post_class(); ?>>
        <section class="property-information">
          <?php
          do_action( 'propertyhive_slider' );
          include( get_template_directory() . '/global-modules/request_details.php' );
          echo singe_actions_navigation();
          ?>
          <ul class="property-panel">
            <li class="active" data-panel="action-property-details">
              <?php
              do_action( 'propertyhive_before_single_property_summary' );
              if ( $property->department == 'residential-lettings' ):
                do_action( 'propertyhive_after_single_property_letting' );
              endif;
              do_action( 'propertyhive_after_single_property_summary' );
              ?>
            </li>
            <?php do_action( 'propertyhive_template_single_actions' ) ?>
          </ul>
        </section>
        <section id="make-enquiry" class="property-enquiry-form spacer">
          <h4 class="section-title">Make Enquiry</h4>
          <h5>Contact <span><?php echo get_bloginfo( 'name' ); ?></span></h5>
          <p><?php the_title(); ?></p>
          <?php propertyhive_enquiry_form_edit(); ?>
        </section>
        <?php if ( $property->department = 'residential-sales' ): ?>
          <section class="disclaimer spacer">
            <h4>Disclaimer</h4>
            <?php echo the_field( 'property_ sales_disclaimer', 'option' ) ?>
          </section>
        <?php endif; ?>
      </div>
    </div>
    <div class="col-lg-4">
      <?php include( get_template_directory() . '/global-modules/property-map.php' ); ?>
      <ul class="more-property-actions">
        <?php if ( $property->department == 'residential-lettings' ): ?>
          <li class="fees">
            <a href="<?php echo get_site_url(); ?>/tenant-fees/">
              <span>Tenant Fees</span>
              <svg class="icon">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-warning"></use>
              </svg>
            </a>
          </li>
        <?php endif; ?>
        <li class="shortlist">
          <?php echo do_shortcode( '[shortlist_button]' ); ?>
        </li>
        <li class="print">
          <?php $url = get_permalink();
          $url       .= ( ( strpos( $url, '?' ) === false ) ? '?' : '&' ) . 'print=1';
          ?>
          <a target="_blank" rel="nofollow" href="<?php echo $url ?>">
            <span>Print Brochure</span>
            <svg class="icon">
              <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-printer"></use>
            </svg>
          </a>
        </li>
        <?php
        if ( $property->department !== 'residential-lettings' ): ?>
          <li class="drop-down">
            <a href="">
              <span>Mortgage Calculator</span>
              <svg class="icon">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-calculator"></use>
              </svg>
            </a>
            <?php echo do_shortcode( '[mortgage_calculator]' ); ?>
          </li>
          <li class="drop-down">
            <a href="">
              <span>Rental Yield Calculator</span>
              <svg class="icon">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-yield"></use>
              </svg>
            </a>
            <?php echo do_shortcode( '[rental_yield_calculator]' ); ?>
          </li>
          <li class="drop-down">
            <a href="">
              <span>Stamp Duty Calculator</span>
              <svg class="icon">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-stamp"></use>
              </svg>
            </a>
            <?php echo do_shortcode( '[stamp_duty_calculator]' ); ?>
          </li>
        <?php endif ?>
      </ul>
      <!-- <?php echo do_shortcode( '[property_office_details]' ); ?> -->
    </div>
  </div>
