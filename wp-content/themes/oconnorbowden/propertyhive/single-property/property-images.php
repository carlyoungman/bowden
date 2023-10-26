<?php
/**
 * Single Property Images
 *
 * @author      PropertyHive
 * @package     PropertyHive/Templates
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit;
} // Exit if accessed directly

global $post, $propertyhive, $property;
$gallery_attachments = $property->get_gallery_attachment_ids();
$imageCount          = 0;

?>
<div class="images">
  <?php
  if ( ! empty( $gallery_attachments ) ) {
    echo '<div class="main-slider-wrapper"><ul class="main-slider slides">';
    foreach ( $gallery_attachments as $gallery_attachment ) {
      $image_title = esc_attr( get_the_title( $gallery_attachment ) );
      $image_link  = wp_get_attachment_url( $gallery_attachment );
      $image       = wp_get_attachment_image( $gallery_attachment, 'original' );
      $imageCount ++;

      echo '<li>' . apply_filters( 'propertyhive_single_property_image_html', sprintf( '<a href="%s" class="propertyhive-main-image" title="%s" data-rel="prettyPhoto[ph_photos]">%s</a>', $image_link, $image_title, $image ), $post->ID ) . '</li>';
    }

    echo '</ul><div class="images-overlay"><div class="row"><div class="col"><span class="image-count"><svg class="icon icon-s"><use xlink:href="#icon-camera"></use></svg><span>' . $imageCount . '</span></span></div><div class="col"><svg class="icon icon-s arrow-left"><use xlink:href="#icon-arrow-up"></use></svg><svg class="icon icon-s arrow-right"><use xlink:href="#icon-arrow-up"></use></svg></div><div class="col"></div></div></div></div>';

  } else {
    echo apply_filters( 'propertyhive_single_property_image_html', sprintf( '<img src="%s" alt="Placeholder" />', ph_placeholder_img_src() ), $post->ID );

  }
  ?>

  <?php do_action( 'propertyhive_product_thumbnails' ); ?>
</div>
