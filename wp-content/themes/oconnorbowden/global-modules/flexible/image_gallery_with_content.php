<?php if ( ! defined( 'ABSPATH' ) ) {
  exit;
}
$base    = 'image-gallery-with-content';
$content = get_sub_field( 'content' );
$images  = get_sub_field( 'image_gallery' );
?>
<section class="<?php echo esc_attr( $base ) ?>">
  <div class="container-fluid">
    <div class="row no-gutters">
      <div class="col-lg-4">
        <article>
          <?php echo $content ?>
        </article>
      </div>
      <div class="col-lg-8">
        <?php if ( $images ): ?>
          <div class="row no-gutters">
            <?php foreach ( $images as $image ): ?>
              <div class="col-sm-3">
                <span style="background-image:url('<?php echo $image['sizes']['medium'] ?>')"
                      data-image="<?php echo $image['sizes']['large'] ?>"></span>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
        <div class="master" style="background-image:url('<?php echo $image['sizes']['medium'] ?>')">
          <span class="icon-button"> <svg class="icon icon-s"><use xlink:href="#icon-close"></use></svg></span>
          </li>
        </div>
      </div>
    </div>
  </div>
</section>
