<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}
$base  = 'fifty-fifty-block';
$sides = [ 'left', 'right' ];
?>
<section class="<?php echo esc_html( $base ); ?> spacer">
  <div class="container-fluid max-width-container">
    <div class="row">
      <?php
      foreach ( $sides as $side ):
        if ( have_rows( $side ) ) :
          while ( have_rows( $side ) ) : the_row();

            if ( get_row_layout() == 'content' ) :
              $content              = get_sub_field( 'content' );
              $center_align_content = get_sub_field( 'center_align_content' );
              echo '<div class="col-lg-6 col-lg-6--content">';
              echo '<article class="' . $base . '__article ';
              if ( true === $center_align_content ):
                echo $base . '__article--center';
              endif;
              echo '">';
              echo $content;
              echo '</article>';
              echo '</div>';
            elseif ( get_row_layout() == 'image' ):
              $image                    = get_sub_field( 'image' );
              $standardize_image_height = get_sub_field( 'standardize_image_height' );
              $class                    = $base . '__image';
              if ( true === $standardize_image_height ):
                $class = $base . '__image ' . $base . '__image--standardize';
              endif;
              echo '<div class="col-lg-6 col-lg-6--image">';
              echo wp_get_attachment_image(
                $image,
                'large',
                false,
                [
                  'class' => $class,
                ] );
              echo '</div>';
            endif;
          endwhile;
        endif;
      endforeach;
      ?>
    </div>
  </div>
</section>
