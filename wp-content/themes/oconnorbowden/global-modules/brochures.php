<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}
$brochureCheck = get_field( 'corporate_brochures_override' );

if ( $brochureCheck !== 'Disable' ):
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
      return null;
  }

endif;

if ( $brochure ):
  echo '<a target="_blank" class="btn brochure" id="' . $id . '" href="' . $brochure['url'] . '">' . $brochure['caption'] . '</a>';
endif;


?>
