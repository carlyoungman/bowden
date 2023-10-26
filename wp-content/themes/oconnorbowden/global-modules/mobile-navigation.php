<?php if ( ! defined( 'ABSPATH' ) ) {
  exit;
}
$home_url      = home_url();
$brochureCheck = get_field( 'corporate_brochures_override' );
$brochure = '';
if ( isset( $brochureCheck ) || $brochureCheck !== 'Disable' ):
  switch ( $brochureCheck ) {
    case 'Corporate':
      $brochure = get_field( 'corporate_brochure', 'option' );
      $id       = 'corporate';
      break;
    case 'Rental':
      $brochure = get_field( 'rental_brochure', 'option' );
      $id       = 'rental';
      break;
    case 'Sales':
      $brochure = get_field( 'sales_brochure', 'option' );
      $id       = 'sales';
      break;
    case 'Custom':
      $brochure = get_field( 'custom_brochure' );
      $id       = 'Custom';
      break;
    default:
  }
endif;
?>
<div class="mobile-navigation mobile-show">
  <div class="mobile-navigation-inner">
    <div class="container-fluid no-padding">
      <div class="row">
        <div class="col-12">
          <a href="<?php echo home_url(); ?>">
            <svg class="logo">
              <use xlink:href="#icon-logo"></use>
            </svg>
          </a>
          <ul class="icon-wrapper pull-right no-style">
            <?php if ( $brochure ): ?>
              <li class="brochures">
                <a target="_blank" href="<?= $brochure['url'] ?>">
                  <svg class="icon icon-white icon-s">
                    <use xlink:href="#icon-document"></use>
                  </svg>
                </a>
              </li>
            <?php endif; ?>
            <li class="search-icon" data-class="show-search">
              <svg class="icon icon-white icon-s">
                <use xlink:href="#icon-search"></use>
              </svg>
            </li>
            <li class="site-icon" data-class="show-site">
              <svg class="icon icon-white icon-s">
                <use xlink:href="#icon-dots"></use>
              </svg>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
