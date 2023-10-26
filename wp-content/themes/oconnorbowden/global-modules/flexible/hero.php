<?php if ( ! defined( 'ABSPATH' ) ) {
  exit;
}
$select_hero_type = get_sub_field( 'hero_select' );

switch ( $select_hero_type ) {
  case 'Image':
    heroImage();
    break;
  case 'Slider':
    heroSlider();
    break;
  case 'Video':
    heroVideo();
  case 'Landing Page':
    heroLandingPage();
    break;
  default:
}

function arrowDown() {
  $scroll_arrow = get_sub_field( 'display_scoll_arrow' );
  if ( $scroll_arrow ):
    echo '<span class="icon-button arrow-down"><svg class="icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-down-arrow"></use></svg> </span>';
  endif;
}

function heroImage() {
  $image = get_sub_field( 'image' );
  echo '<section class="hero image" style="background-image: url( ' . $image['background_image']['sizes']['hero'] . ' );">';
  echo '<div class="container-fluid max-width-container">';
  echo '<div class="row">';
  echo '<div class="col">';
  echo '<div class="content">';
  if ( $image['content']['content'] ) {
    echo $image['content']['content'];
  }
  if ( $image['content']['button'] ) {
    echo '<a target="' . $image['content']['button']['target'] . '" class="btn btn-' . theme_colour( 'label' ) . '" href="' . $image['content']['button']['url'] . '">' . $image['content']['button']['title'] . '</a>';
  }
  arrowDown();
  echo '</div>';
  echo '</div>';
  echo '</div>';
  echo '</div>';
  echo '</section>';
}

function heroSlider() {
  $slider = get_sub_field( 'slider' );
  echo '<section class="hero slider">';
  if ( $slider ):
    foreach ( $slider as $slide ):
      echo '<div class="slider-item" style="background-image: url( ' . $slide['background']['sizes']['hero'] . ' );">';
      echo '<div class="container-fluid max-width-container">';
      echo '<div class="row">';
      echo '<div class="col">';
      echo '<div class="content">';
      if ( $slide['slide_content']['content'] ) {
        echo $slide['slide_content']['content'];
      }
      if ( $slide['slide_content']['button'] ) {
        echo '<a target="' . $slide['slide_content']['button']['target'] . '" class="btn btn-' . theme_colour( 'label' ) . '" href="' . $slide['slide_content']['button']['url'] . '">' . $slide['slide_content']['button']['title'] . '</a>';
      }
      arrowDown();
      echo '</div>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
    endforeach;
  endif;
  echo '</section>';
}

function heroLandingPage() {
  $landingPage         = get_sub_field( 'landing_page' );
  $sites               = $landingPage['sites'];
  $overview_content    = $landingPage['overview']['content'] ?? '';
  $overview_background = $landingPage['overview']['background_image'] ?? '';
  echo '<section class="hero landing-page">';
  echo '<div class="container-fluid no-padding">';
  if ( $sites ):
    echo '<div class="grid">';
    echo '<div class="content item">';
    if ( ! empty( $overview_background ) ):
      echo wp_get_attachment_image(
        $overview_background['id'],
        'medium',
        false,
        [
          'class' => 'content__background',
          'alt'   => esc_attr( $overview_background['alt'] ),
        ]
      );
    endif;
    echo '<span>';
    echo '<svg class="icon main-logo logo icon-black"><use xlink:href="#icon-logo"></use></svg>';
    echo $overview_content;
    arrowDown();
    echo '</span>';
    echo '</div>';
    foreach ( $sites as $site ):
      if ( 'Development & Investment' !== $site['content']['site_title'] ):
        $slider = $site['background_image'];
        echo '<div class="site item" style="border-color:' . $site['content']['theme_'] . ';">';
        if ( $slider ):
          echo '<div class="site-slider">';
          foreach ( $slider as $slide ):
            echo '<div class="slide" style="background-image:url(' . $slide['sizes']['large'] . ')"></div>';
          endforeach;
          echo '</div>';
        endif;
        echo '<div class="title"><h4>' . $site['content']['site_title'] . '</h4></div>';
        $links = $site['content']['hover_links'];
        if ( $links ):
          echo '<ul class="links">';
          foreach ( $links as $link ):
            echo '<li style="color:' . $site['content']['theme_'] . '"><a href="' . $link['link']['url'] . '">' . $link['link']['title'] . '</a></li>';
          endforeach;
          echo '</ul>';
        endif;
        echo '</div>';
      endif;
    endforeach;
    echo '</div>';
  endif;
  echo '</div>';
  echo '</section>';
}
