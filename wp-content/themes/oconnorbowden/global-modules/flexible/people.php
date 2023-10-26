<?php
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}
$base = 'people';
if ( have_rows( 'person', 'option' ) ): ?>
  <section class="spacer <?php echo esc_attr( $base ) ?>">
    <div class="container-fluid max-width-container">
      <div class="row">
        <?php while ( have_rows( 'person', 'option' ) ): the_row(); ?>
          <?php
          $user_image    = get_sub_field( 'perons_photo' );
          $persons_name  = get_sub_field( 'persons_name' );
          $persons_quote = get_sub_field( 'persons_quote' );
          ?>
          <div class="col-md">
            <div class="row">
              <div class="col-3">
                <img src="<?php echo $user_image['url'] ?>"></img>
                <p class="text-center"><?php echo $persons_name ?></p>
              </div>
              <div class="col-9">
                <div class="user-quote vertical-align text-center ">
                  <p><q><?php echo $persons_quote ?></q></p>
                  <svg class="icon quote-left">
                    <use xlink:href="#icon-quotes-left"></use>
                  </svg>
                  <svg class="icon quote-right">
                    <use xlink:href="#icon-quotes-right"></use>
                  </svg>
                </div>
              </div>
              <div class="col-3">
                <?php if ( have_rows( 'persons_social_media' ) ): ?>
                  <ul class="inline-list contact-icons">
                    <?php while ( have_rows( 'persons_social_media' ) ): the_row(); ?>
                      <?php
                      $perons_email_address = get_sub_field( 'perons_email_addresss' );
                      ?>
                      <?php if ( $perons_email_address ): ?>
                        <li>
                          <svg class="icon icon-m icon-email">
                            <use xlink:href="#icon-email"></use>
                          </svg>
                        </li>
                      <?php endif; ?>
                    <?php endwhile; ?>
                  </ul>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
        <div class="line"></div>
      </div>
    </div>
  </section>
<?php endif; ?>
