<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}
$base         = 'download-panel';
$theme_colour = get_field( 'theme_colour', 'option' );

?>
<section class="<?php echo esc_attr( $base ) ?> spacer">
  <div class="container-fluid max-width-container">
    <?php $panel_name = get_sub_field( 'panel_name' ); ?>
    <?php if ( $panel_name ): ?>
      <div class="row">
        <div class="col">
          <h4 class="section-title"><?php echo $panel_name ?></h4>
        </div>
      </div>
    <?php endif; ?>
    <?php if ( have_rows( 'download_item' ) ): ?>
      <div class="row">
        <div class="col">
          <ul class="<?php echo esc_attr( $base ) ?>__list">
            <?php while ( have_rows( 'download_item' ) ) : the_row(); ?>
              <?php $name = get_sub_field( 'name' ); ?>
              <?php $content = get_sub_field( 'contant' ); ?>
              <?php $button = get_sub_field( 'button' ); ?>
              <li class="<?php echo esc_attr( $base ) ?>__download">
                <div class="<?php echo esc_attr( $base ) ?>__header">
                  <svg class="<?php echo esc_attr( $base ) ?>__cloud" xmlns="http://www.w3.org/2000/svg"
                       viewBox="0 96 960 960">
                    <path
                      d="m412 777 230-230-40-40-189 189-100-100-41 41 140 140ZM251 896q-88 0-149.5-61.5T40 685q0-78 50-137t127-71q20-97 94-158.5T482 257q112 0 189 81.5T748 534v24q72-2 122 46.5T920 727q0 69-50 119t-119 50H251Zm0-60h500q45 0 77-32t32-77q0-45-32-77t-77-32h-63v-84q0-91-61-154t-149-63q-88 0-149.5 63T267 534h-19q-62 0-105 43.5T100 685q0 63 44 107t107 44Zm229-260Z" />
                  </svg>

                  <div class="<?php echo esc_attr( $base ) ?>__icon-wrap">
                    <svg class="<?php echo esc_attr( $base ) ?>__icon" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 96 960 960">
                      <path
                        d="m482 778 156-156-43-43-83 83V468h-60v194l-83-83-43 43 156 156ZM220 976q-24 0-42-18t-18-42V415l239-239h341q24 0 42 18t18 42v680q0 24-18 42t-42 18H220Zm0-60h520V236H426L220 442.125V916Zm0 0h520-520Z" />
                    </svg>
                  </div>
                </div>
                <h5 class="<?php echo esc_attr( $base ) ?>__headline"><?php echo $name ?></h5>
                <p class="<?php echo esc_attr( $base ) ?>__content"><?php echo $content ?></p>
                <a class="btn btn-<?php echo $theme_colour ?>" target="<?php echo $button['target'] ?>"
                   href="<?php echo $button['url'] ?>">Download</a>
              </li>
            <?php endwhile; ?>
          </ul>
        </div>
      </div>
    <?php endif; ?>
  </div>
</section>
