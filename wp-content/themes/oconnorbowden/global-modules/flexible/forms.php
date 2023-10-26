<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}
$base      = 'forms';
$shortcode = get_sub_field( 'forms' );
$title     = substr( $shortcode, strpos( $shortcode, "title=" ) + 7 );
$title     = preg_replace( "/[^ \w]+/", "", $title );
$pieces    = explode( " ", $shortcode );
?>
<section class="spacer <?php echo esc_attr( $base ) ?>" <?php echo $pieces[1]; ?>>
  <div class="container-fluid max-width-container">
    <div class="row">
      <div class="col"><h4 class="section-title"><?php echo $title ?></h4></div>
    </div>
    <div class="row">
      <div class="col">
        <div class="inline-form">
          <?php echo do_shortcode( " $shortcode  " ); ?>
        </div>
      </div>
    </div>
  </div>
</section>
