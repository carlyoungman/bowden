<?php if ( ! defined( 'ABSPATH' ) ) {
  exit;
} ?>
<footer>
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <div class="back-to-top-icon">
          <svg class="icon arrow-up icon-white">
            <use xlink:href="#icon-arrow-up"></use>
          </svg>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-6">
        <ul class="social-media-links">
          <?php $twitter = get_field( 'twitter', 'option' ) ?>
          <?php $facebook = get_field( 'facebook', 'option' ) ?>
          <?php $linkedin = get_field( 'linkedin', 'option' ) ?>
          <?php $instagram = get_field( 'instagram', 'option' ) ?>
          <?php if ( $linkedin ): ?>
            <li id="linkedin">
              <a target="_blank" href="<?php echo $linkedin ?>">
                <div class="icon-button">
                  <svg class="icon icon-s">
                    <use xlink:href="#icon-linkedin"></use>
                  </svg>
                </div>
              </a>
            </li>
          <?php endif; ?>
          <?php if ( $instagram ): ?>
            <li id="instagram">
              <a target="_blank" href="<?php echo $instagram ?>">
                <div class="icon-button">
                  <svg class="icon icon-s">
                    <use xlink:href="#icon-instagram"></use>
                  </svg>
                </div>
              </a>
            </li>
          <?php endif; ?>
          <?php if ( $twitter ): ?>
            <li id="twitter">
              <a target="_blank" href="<?php echo $twitter ?>">
                <div class="icon-button">
                  <svg class="icon icon-s">
                    <use xlink:href="#icon-twitter"></use>
                  </svg>
                </div>
              </a>
            </li>
          <?php endif; ?>
          <?php if ( $facebook ): ?>
            <li id="facebook">
              <a target="_blank" href="<?php echo $facebook ?>">
                <div class="icon-button">
                  <svg class="icon icon-s">
                    <use xlink:href="#icon-facebook"></use>
                  </svg>
                </div>
              </a>
            </li>
          <?php endif; ?>
        </ul>

      </div>
    </div>

    <div class="row justify-content-between">
      <div class="col-lg-5">
        <div class="contact-footer">
          <?php echo do_shortcode( '[contact-form-7 id="93" title="News Letter Signup"]' ); ?>
        </div>
      </div>
      <?php if ( have_rows( 'development', 'option' ) ): ?>
        <div class="col-lg-6">
          <h4>Our Developments</h4>
          <ul class="developments">
            <?php while ( have_rows( 'development', 'option' ) ): the_row(); ?>
              <?php
              $development_name     = get_sub_field( 'development_name' );
              $development_location = get_sub_field( 'development_location' );
              $development_website  = get_sub_field( 'development_website' );
              ?>
              <li>
                <p><a target="_blank" href="<?php echo $development_website ?>"><?php echo $development_name ?> -
                    <span><?php echo $development_location ?></span></a></p>
              </li>
            <?php endwhile; ?>
          </ul>
        </div>
      <?php endif; ?>
    </div>
    <div class="row d-flex justify-content-center logos">
      <?php $company = get_field( 'company_logo', 'option' ); ?>
      <?php if ( $company ): ?>
        <?php if ( $company && in_array( 'manchesterCityCenter', $company ) ): ?>
          <div class="col-sm-6 col-md">
            <svg class="logo icon-green icon">
              <use xlink:href="#icon-logo"></use>
            </svg>
            <p style="margin:0;">Lettings, Management &amp; Sales</p>
            <p>Manchester City Centre</p>
          </div>
        <?php endif; ?>
        <?php if ( $company && in_array( 'greaterManchesterAndCheshire', $company ) ): ?>
          <div class="col-sm-6 col-md">
            <svg class="logo icon-blue icon">
              <use xlink:href="#icon-logo"></use>
            </svg>
            <p style="margin:0;">Lettings, Management &amp; Sales </p>
            <p>Manchester &amp; Cheshire</p>
          </div>
        <?php endif; ?>
        <?php if ( $company && in_array( 'manchester', $company ) ): ?>
          <div class="col-sm-6 col-md">
            <svg class="logo icon-orange icon">
              <use xlink:href="#icon-logo"></use>
            </svg>
            <p>PRS &amp; BTR Portfolio Management</p>
          </div>
        <?php endif; ?>
        <?php if ( $company && in_array( 'northWest', $company ) ): ?>
          <div class="col-sm-6 col-md">
            <svg class="logo icon-purple icon">
              <use xlink:href="#icon-logo"></use>
            </svg>
            <p>Building Management</p>
          </div>
        <?php endif; ?>
      <?php endif; ?>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <nav>
          <?php wp_nav_menu( array(
            'theme_location' => 'footer_menu',
            'container'      => 'ul',
            'menu_class'     => 'navigation  row justify-content-md-center',
            'menu_id'        => 'footer-menu',
            'link_before'    => '<span>',
            'link_after'     => '</span>'
          ) );
          ?>
        </nav>
      </div>
    </div>
    <div class="row">
      <?php $disclaimer = get_field( 'website_disclaimer', 'option' ) ?>
      <?php if ( $disclaimer ): ?>
        <div class="col-lg-12">
              <span class="disclaimer text-center">
                <?php echo $disclaimer ?>
              </span>
        </div>
      <?php endif; ?>
      <div class="col-lg-12">
        <p class="text-center copyright">O'Connor Bowden &copy; COPYRIGHT 2003 - <?php echo date( "Y" ); ?></p>
      </div>
    </div>
  </div>
</footer>
