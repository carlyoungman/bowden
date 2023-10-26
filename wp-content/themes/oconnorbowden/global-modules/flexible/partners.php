<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}
$base = 'partners';
?>
<?php if ( have_rows( 'partner', 'option' ) ): ?>
  <section class="spacer <?php echo esc_attr( $base ) ?>">
    <div class="container-fluid max-width-container">
      <div class="row">
        <div class="col"><h4 class="section-title">Our Partners</h4></div>
      </div>
      <div class="row">
        <?php while ( have_rows( 'partner', 'option' ) ): the_row(); ?>
          <?php $image_link = get_sub_field( 'partner_website' ); ?>
          <?php $image = get_sub_field( 'partner_logo' ); ?>
          <div class="col-sm-6 col-md-4">
            <a href="<?php echo $image_link ?>" target="_blank">
              <span class="partner-logo">
                <img src="<?php echo $image['sizes']['medium'] ?>"></img>
              </span>
            </a>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  </section>
<?php endif; ?>
