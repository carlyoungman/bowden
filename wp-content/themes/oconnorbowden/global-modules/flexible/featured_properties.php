<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}
$base  = 'featured-properties';
$title = get_sub_field( 'section_title' )
?>
<?php if ( have_rows( 'grid_item' ) ): ?>
  <section class="spacer grid-layout <?php echo esc_attr( $base ) ?>">
    <div class="container-fluid">
      <div class="row">
        <?php if ( $title ): ?>
          <h2 class="col grid_title animate"><?php echo $title ?></h2>
        <?php endif ?>
        <?php while ( have_rows( 'grid_item' ) ): the_row(); ?>
          <?php $background_image = get_sub_field( 'background_image' ) ?>
          <div class="grid-item col-lg"
               style="background-image:url('<?php echo $background_image['sizes']['large'] ?>')">
            <?php
            $button_type = get_sub_field( 'button_type' );
            $link        = get_sub_field( 'button_link' );
            if ( $button_type !== 'none' | $link !== 'none' ):
              echo '<a href="' . $link['url'] . '" class="btn form-link">' . $link['title'] . '</a>';
            endif;
            ?>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  </section>
<?php endif; ?>
