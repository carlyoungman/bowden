<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}
if ( get_sub_field( 'search_block_type' ) ):
  ?>
  <section class="inline-search spacer">
    <div class="container-fluid max-width-container">
      <div class="row">
        <div class="col">
          <h4 class="section-title">Property Search</h4>
        </div>
      </div>
      <div class="property-search-panel">
        <div class="panel-heading">
          <span>Which kind of property would you like to search for?</span>
          <span class="group-icon icon-button">
              <svg class="icon"><use xlink:href="#icon-search"></use></svg>
            </span>
        </div>
        <div class="panel-body">
          <div class="free-text-search"><span>Properties for sale</span></div>
          <div class="body-inner">
            <div class="body-inner-inner">
              <ul class="search-switch">
                <li class="active">
                  <span>Buy</span>
                </li>
                <li><span>Rent</span></li>
                <span></span>
              </ul>
              <?php echo do_shortcode( ' [property_search_form]' ); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php else: ?>
  <script>
    document.body.classList.add("has-full-width-search");
  </script>
  <section class="full-width-search">
    <?php echo do_shortcode( ' [property_search_form]' ); ?>
    <ul class="search-switch">
      <li class="active">
        <span>Buy</span>
      </li>
      <li>
        <span>Rent</span>
      </li>
      <span></span>
    </ul>
  </section>
<?php endif; ?>
