<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}
$base = 'list-content';
if ( have_rows( 'list_item' ) ):
  ?>
  <section class="spacer spacer--has-background <?php echo esc_attr( $base ) ?>">
    <div class="container-fluid max-width-container">
      <ul class="list-content-block featured_item">
        <?php while ( have_rows( 'list_item' ) ) : the_row(); ?>
          <?php $image = get_sub_field( 'list_item_image' ); ?>
          <?php $content = get_sub_field( 'list_item_content' ); ?>
          <?php if ( get_sub_field( 'featured_item' ) ): ?>
            <li>
              <div class="card">
                <div class="card-header" style="background-image:url(<?php echo $image['sizes']['medium'] ?>)"></div>
                <div class="card-body">
                  <?php echo $content ?>
                </div>
              </div>
            </li>
          <?php
          endif;
        endwhile;
        wp_reset_postdata();
        wp_reset_query();
        ?>
      </ul>
      <ul class="list-content-block">
        <?php while ( have_rows( 'list_item' ) ) : the_row(); ?>
          <?php $image = get_sub_field( 'list_item_image' ); ?>
          <?php $content = get_sub_field( 'list_item_content' ); ?>
          <?php if ( ! get_sub_field( 'featured_item' ) ): ?>
            <li>
              <div class="card">
                <div class="card-header" style="background-image:url(<?php echo $image['sizes']['medium'] ?>)"></div>
                <div class="card-body">
                  <?php echo $content ?>
                </div>
              </div>
            </li>
          <?php
          endif;
        endwhile;
        wp_reset_postdata();
        wp_reset_query();
        ?>
      </ul>
    </div>
  </section>
<?php
endif;
