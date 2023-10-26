<?php if ( ! defined( 'ABSPATH' ) ) {
  exit;
}
$site_description = get_bloginfo( 'description' );
?>
<section class="switch-search-type side-panel" id="rental-switch">
  <a href="<?php echo home_url(); ?>/search_results/?department=residential-lettings">
    <div class="body">
      <svg class="city-icon">
        <use xlink:href="#icon-city"></use>
      </svg>
    </div>
    <div class="footer">
      <p>View properties to rent</p>
    </div>
  </a>
</section>
<section class="switch-search-type side-panel" id="sale-switch">
  <a href="<?php echo home_url(); ?>/search_results/?department=residential-sales">
    <div class="body">
      <svg class="city-icon">
        <use xlink:href="#icon-city"></use>
      </svg>
    </div>
    <div class="footer">
      <p>View properties for sale</p>
    </div>
  </a>
</section>
