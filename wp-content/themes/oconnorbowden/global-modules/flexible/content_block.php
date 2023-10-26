<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}
$content_block = get_sub_field( 'content_' );
$base          = 'content-block'
?>
<section class="<?php echo esc_attr( $base ) ?> spacer">
  <div class="container-fluid max-width-container">
    <div class="row">
      <div class="col">
        <article class="<?php echo esc_attr( $base ) ?>__article">
          <?php echo $content_block ?>
        </article>
      </div>
    </div>
  </div>
</section>
