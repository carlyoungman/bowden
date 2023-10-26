<?php
/**
 * The Template for displaying property archives, also referred to as 'Search Results'
 *
 * Override this template by copying it to yourtheme/propertyhive/archive-property.php
 *
 * @author      PropertyHive
 * @package     PropertyHive/Templates
 * @version     1.0.0
 */
?>
<?php if ( ! defined( 'ABSPATH' ) ) {
  exit;
}
get_header( 'propertyhive' );
global $wpdb;
do_action( 'propertyhive_before_main_content' );
do_action( 'propertyhive_search' );
?>
<section id="property-filter">
  <div class="container-fluid max-width-container">
    <div class="row justify-content-end">
      <?php do_action( 'propertyhive_before_search_results_loop' ); ?>
    </div>
  </div>
</section>
<section class="property-banner">
  <div class="container-fluid max-width-container">
    <div class="row ">
      <div class="col-sm-12 col-lg-9">
        <?php include( locate_template( 'global-modules/property-banner.php' ) ); ?>
      </div>
    </div>
  </div>
</section>
<section id="property-results">
  <div class="container-fluid max-width-container">
    <div class="row">
      <div class="col-lg-9">
        <?php
        if ( apply_filters( 'propertyhive_show_results', true ) ) :
          ?>
          <?php if ( have_posts() ) : ?>
          <?php propertyhive_property_loop_start(); ?>
          <?php include( locate_template( 'global-modules/property-banner.php' ) ); ?>
          <?php while ( have_posts() ) : the_post(); ?>
            <?php ph_get_template_part( 'content', 'property' ); ?>
          <?php endwhile; ?>
          <?php propertyhive_property_loop_end(); ?>
        <?php else: ?>
          <?php ph_get_template( 'search/no-properties-found.php' ); ?>
        <?php endif; ?>
        <?php endif; ?>
        <?php
        do_action( 'propertyhive_after_search_results_loop' );
        ?>
      </div>
      <div class="col-lg-3">
        <?php include( get_template_directory() . '/global-modules/switch-search-type.php' ); ?>
      </div>
    </div>
  </div>
</section>
<?php

$brochure = get_field( 'rental_brochure', 'option' );
if ( $brochure ):
  echo '<a target="_blank" class="btn brochure" id="rental" href="' . $brochure['url'] . '">' . $brochure['caption'] . '</a>';
endif;
$brochure = get_field( 'sales_brochure', 'option' );
if ( $brochure ):
  echo '<a target="_blank" class="btn brochure" id="sales" href="' . $brochure['url'] . '">' . $brochure['caption'] . '</a>';
endif;
?>
<?php get_footer( 'propertyhive' ); ?>
