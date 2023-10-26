<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}
global $property;
?>
<?php if ( $property->latitude && $property->longitude ): ?>
  <section class="property-map">
    <div class="map">
      <div class="marker" data-lat="<?php echo $property->latitude; ?>"
           data-lng="<?php echo $property->longitude; ?>"></div>
    </div>
  </section>
<?php endif; ?>
