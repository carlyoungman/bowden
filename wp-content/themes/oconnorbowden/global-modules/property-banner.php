<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}
$banners        = array(
  'banner_for_rent',
  'banner_for_sale',
  'banner_for_new_homes',
  'banner_for_investment',
  'banner_for_recent_projects',
  'banner_for_land',
  'banner_for_coming_soon'
);

foreach ( $banners as $banner ):
  $content = get_field( $banner, 'option' )['content'] ?? '';
  $options      = get_field( $banner, 'option' )['options'] ?? [];

  $optionsArray = array(
    array( 'text', '', true ),
    array( 'background', '', true )
  );
  if (  !empty($options['enable']) ):?>
    <li class="grid-banner">
      <div
        class="property-banner <?php foreach ( $optionsArray as $option ): if ( $options[ $option[0] ] ): echo $option[1] . ' '; endif;
          if ( $option[2] === true ): echo $options[ $option[0] ]; endif; endforeach; ?>"
        id="<?= $banner = str_replace( '_', '-', $banner ) ?>">
        <div class="row">
          <div class="col-sm-3 col-lg-3">
            <div class="image-wrapper">
              <?php
              if ( $content['supporting_image'] ):
                echo wp_get_attachment_image( $content['supporting_image']['ID'], 'thumbnail', false, [ 'class' => 'banner-image' ] );
              endif;
              ?>
            </div>
          </div>
          <div class="col-sm-8 col-lg-8">
            <div class="content-wrapper">
              <?php
              if ( $content['content'] ):
                echo '<article>';
                if ( $content['content']['headline'] ): echo '<h4 class="headline">' . $content['content']['headline'] . '</h4>'; endif;
                if ( $content['content']['content'] ): echo '<p class="content">' . $content['content']['content'] . '</p>'; endif;
                echo '</article>';
              endif;
              ?>
            </div>
          </div>
        </div>
      </div>
    </li>

  <?php
  endif;
endforeach;
