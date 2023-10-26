<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}
$blog_id = get_current_blog_id();
?>

<header class="<?php if ( $blog_id !== 1 ): ?>translate<?php endif; ?>">
    <div class="singlesite-navigation">
      <div class="container-fluid no-padding">
        <div class="row justify-content-between">
          <div class="col-lg-3 mobile-hide">
            <a href="<?php echo home_url(); ?>">
              <svg class="icon main-logo logo icon-black">
                <use xlink:href="#icon-logo"></use>
              </svg>
            </a>
          </div>
          <div class="col-lg-9">
            <nav>
              <?php wp_nav_menu( array(
                'theme_location' => 'secondary_navigation',
                'container'      => 'ul',
                'menu_class'     => 'row no-style',
                'menu_id'        => 'menu-secondary-navigation',
                'link_before'    => '<span class="vertical-align">',
                'link_after'     => '</span>'
              ) );
              ?>
            </nav>
          </div>
        </div>
      </div>
    </div>
</header>
