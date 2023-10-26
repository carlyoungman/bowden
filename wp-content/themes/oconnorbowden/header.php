<?php ?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <title><?php wp_title(); ?></title>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
  <link rel="apple-touch-icon" sizes="180x180"
        href="<?php echo get_template_directory_uri(); ?>/dist/assets/favicons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32"
        href="<?php echo get_template_directory_uri(); ?>/dist/assets/favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16"
        href="<?php echo get_template_directory_uri(); ?>/dist/assets/favicons/favicon-16x16.png">
  <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/dist/assets/favicons/manifest.json">
  <link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/dist/assets/favicons/safari-pinned-tab.svg"
        color="<?php theme_colour( 'value' ) ?>">
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/dist/assets/favicons/favicon.ico">
  <meta name="msapplication-config"
        content="<?php echo get_template_directory_uri(); ?>/dist/assets/favicons/browserconfig.xml">
  <meta name="theme-color" content="<?php theme_colour( 'value' ) ?>">
  <?php
  $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
  if ( strpos( $url, 'foreverdevelopment' ) !== false ):
    echo '<meta name="robots" content="noindex, nofollow">';
  endif
  ?>
  <?php wp_head(); ?>
</head>
<body <?php body_class( theme_colour( 'label' ), 'grid-layout' ); ?> >
<?php
  include( get_template_directory() . '/global-modules/navigation.php' );
  include( get_template_directory() . '/global-modules/mobile-navigation.php' );
  include( get_template_directory() . '/global-modules/mobile-search.php' );
  echo '<main id="main" class="site-main loadin" role="main">';
