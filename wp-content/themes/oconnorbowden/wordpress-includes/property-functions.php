<?php

function propertyhive_template_single_letting_information() {
  ph_get_template( 'single-property/property-letting-information.php' );
}


function propertyhive_get_property_thumbnail( $size = 'large', $class = '', $placeholder_width = 0, $placeholder_height = 0 ) {
  global $post, $property;
  $gallery_attachments = $property->get_gallery_attachment_ids();

  if ( ! empty( $gallery_attachments ) ) {

    ?>

    <ul class="row">

      <?php

      $loop = 0;

      $columns = apply_filters( 'propertyhive_property_thumbnails_columns', 3 );

      foreach ( $gallery_attachments as $attachment_id ) {

        $image = wp_get_attachment_image_url( $attachment_id, 'thumbnail' );

        echo '<li class="col-md" style="background-image:url(' . $image . ')"></li>';

        ++ $loop;

        if ( $loop == 2 ) {

          break;

        }

      } ?>

    </ul>

    <?php

  }

}

function bedrooms_bathrooms() {

  global $post, $property; ?>

  <?php do_action( 'propertyhive_property_meta_start' ); ?>

  <ul class="rooms">

    <?php do_action( 'propertyhive_property_meta_list_start' ); ?>

    <?php if ( $property->bedrooms > 0 ) {

      ?>
      <li
        class="bedrooms"><?php _e( '<svg class="icon icon-black icon-s"><use xlink:href="#icon-bed"></use></svg>', 'propertyhive' );

      echo ' ' . $property->bedrooms; ?></li><?php

    } ?>

    <?php if ( $property->bathrooms > 0 ) {

      ?>
      <li
        class="bathrooms"><?php _e( '<svg class="icon icon-black icon-s"><use xlink:href="#icon-bath"></use></svg>', 'propertyhive' );

      echo ' ' . $property->bathrooms; ?></li><?php

    } ?>

    <?php if ( $property->reception_rooms > 0 ) {

      ?>
      <li
        class="reception-rooms"><?php _e( '<svg class="icon icon-black icon-s"><use xlink:href="#icon-sofa"></use></svg>', 'propertyhive' );

      echo ' ' . $property->bathrooms; ?></li><?php

    } ?>

    <?php do_action( 'propertyhive_property_meta_list_end' ); ?>

  </ul>

  <?php do_action( 'propertyhive_property_meta_end' );

}


function show_referance_number() {

  global $property;

  $reference_number = $property->reference_number;

  echo '<div class="small-details">';

  if ( $reference_number ):

    echo '<span class="reference-no"> Ref No: ' . $reference_number . '  </span>';

  endif;

  echo do_shortcode( '[shortlist_button]' );

//  if ( $property->department == 'residential-lettings' ):
//
//    echo '<span class="tenant_fee"><a href=" ' . get_site_url() . '/tenant-fees/"> - Tenant Fees - </a></span>';
//
//  endif;

  echo '</div>';

}

function show_rental_yield() {

  global $post, $property;

  $department = $property->department;

  if ( $department == 'commercial' ) {


  }

}


function marketing_flags() {

  global $post, $property;


  $flag = $property->availability;


  if ( $flag != '' ) {

    echo '<div class="marketing-flags">';
    echo '<span class="' . getClass( $flag ) . '">' . $flag . '</span>';

    // if ( $property->marketing_flag != '' ) {
    //   $flag = $property->marketing_flag;
    //   echo '<span class="' . getClass($flag) .'">' . $flag . '</span>';
    // }
    echo '</div>';

  }

}


function getClass( $flag ) {
  $class = preg_replace( '/\s*/', '', $flag );
  $class = strtolower( $class );

  return $class;
}

function get_per_week_price() {

  global $post, $property;

  $price = $property->_rent;

  if ( $property->_rent > 0 ) {

    $price = ( $price * 12 ) / 52;

    echo '<div class="price per-week"><span>( £' . intval( ( $price ) ) . ' pw )</span></div>';

  }

}

function count_images() {

  global $post, $property;

  $gallery_attachments = $property->get_gallery_attachment_ids();

  $imageCount = 0;

  foreach ( $gallery_attachments as $attachment_id ) {

    $imageCount ++;

  }

  echo '<span class="image-count"><svg class="icon icon-s"><use xlink:href="#icon-camera"></use></svg><span>' . $imageCount . '</span></span>';

}


function singe_actions_navigation() {


  global $post, $property;


  $actions = array();


  $floorplan_ids = $property->get_floorplan_attachment_ids();

  if ( ! empty( $floorplan_ids ) ) {

    $actions[] = array(

      'label' => __( 'Floorplans', 'propertyhive' ),

      'class' => 'action-floorplans'

    );

  }


  $brochure_ids = $property->get_brochure_attachment_ids();

  if ( ! empty( $brochure_ids ) ) {

    $actions[] = array(

      'label' => __( 'Brochures', 'propertyhive' ),

      'class' => 'action-brochure'

    );

  }


  $epc_ids = $property->get_epc_attachment_ids();

  if ( ! empty( $epc_ids ) ) {

    $actions[] = array(

      'label' => __( 'EPC', 'propertyhive' ),

      'class' => 'action-epc'

    );

  }


  $virtual_tour_urls = $property->get_virtual_tour_urls();

  if ( ! empty( $virtual_tour_urls ) ) {


    $actions[] = array(

      'label' => __( 'Virtual Tour', 'propertyhive' ),

      'class' => 'action-virtual-tour'

    );


  }


  $actions = apply_filters( 'propertyhive_single_property_actions', $actions );

  ph_get_template( 'single-property/actions-nav.php', array( 'actions' => $actions ) );

}


function propertyhive_template_single_actions() {

  global $post, $property;

  $actions = array();


  $brochure_ids = $property->get_brochure_attachment_ids();

  if ( ! empty( $brochure_ids ) ) {

    echo "<li data-panel='action-brochure'>";

    foreach ( $brochure_ids as $brochure_id ) {

      echo '<a target="_blank" href=" ' . wp_get_attachment_url( $brochure_id ) . '"class="btn download">Download ' . get_the_title( $brochure_id ) . '</a>';

    }

    echo "</li'>";

  }


  $home_report_ids = $property->_home_reports;

  if ( is_array( $home_report_ids ) ) {

    $home_report_ids = array_filter( $home_report_ids );

  } else {

    $home_report_ids = array();

  }

  if ( ! empty( $home_report_ids ) ) {

    echo "<li data-panel='action-home-report'>";

    foreach ( $home_report_ids as $home_report_id ) {

      echo '<a target="_blank" href=" ' . wp_get_attachment_url( $home_report_id ) . '"class="btn download">Download Home Report</a>';

    }

    echo "</li'>";

  }


  $floorplan_ids = $property->get_floorplan_attachment_ids();

  if ( ! empty( $floorplan_ids ) ) { ?>

    <li data-panel="action-floorplans">

      <ul class="panel-slides floor-plan">

        <?php

        foreach ( $floorplan_ids as $floorplan_id ) {

          $floorplans_urls = wp_get_attachment_url( $floorplan_id ); ?>

          <li><img src="<?php echo $floorplans_urls ?>"></img></li>

          <?php

        }

        ?>

      </ul>

    </li>

    <?php

  }


  $epc_ids = $property->get_epc_attachment_ids();

  if ( ! empty( $epc_ids ) ) {

    echo "<li data-panel='action-epc'>";

    echo "<ul class='panel-slides epc'>";

    foreach ( $epc_ids as $epc_id ) {

      $epc_urls = wp_get_attachment_url( $epc_id );

      $filetype = wp_check_filetype( $epc_urls );

      if ( $filetype['ext'] == 'pdf' ) :

        echo '<a target="_blank" href=" ' . $epc_urls . '"class="btn download">Download EPC Report</a>';

      else:

        echo "<li><img src='" . $epc_urls . "'></img></li>";

      endif;

    }

    echo "</ul>";

    echo "</li>";

  }


  $virtual_tour_urls = $property->get_virtual_tour_urls();

  if ( ! empty( $virtual_tour_urls ) ) { ?>

    <li data-panel="action-virtual-tour">

      <ul class="panel-slides virtual-tour">

        <?php

        foreach ( $virtual_tour_urls as $virtual_tour_url ) { ?>

          <li>

            <?php

            if ( strpos( $virtual_tour_url, 'youtube' ) !== false ) { ?>

              <iframe width="100%" height="550" src="<?= $virtual_tour_url ?>" frameborder="0"
                      allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                      allowfullscreen></iframe>

            <?php } else { ?>

              <video width="100%" height="auto" controls>

                <source src="<?= $virtual_tour_url ?>" type="video/mp4">

                Your browser does not support the video tag.

              </video>

            <?php } ?>

          </li>

          <?php

        }

        ?>

      </ul>

    </li>

    <?php

  }

}


function propertyhive_enquiry_form_edit() {

  $form_controls = ph_get_property_enquiry_form_fields_edit();

  $form_controls = apply_filters( 'propertyhive_property_enquiry_form_fields_edit', $form_controls );

  ph_get_template( 'global/make-enquiry-form.php', array( 'form_controls' => $form_controls ) );

}


function ph_get_property_enquiry_form_fields_edit() {

  global $post;


  $fields = array();


  $fields['property_id'] = array(

    'type' => 'hidden',

    'value' => $post->ID

  );


  $fields['name'] = array(

    'type' => 'text',

    'label' => __( 'Full Name', 'propertyhive' ),

    'required' => true

  );

  if ( is_user_logged_in() ) {

    $current_user = wp_get_current_user();


    $fields['name']['value'] = $current_user->display_name;

  }


  $fields['email_address'] = array(

    'type' => 'email',

    'label' => __( 'Email Address', 'propertyhive' ),

    'required' => true

  );

  if ( is_user_logged_in() ) {

    $current_user = wp_get_current_user();


    $fields['email_address']['value'] = $current_user->user_email;

  }


  $fields['telephone_number'] = array(

    'type' => 'number',

    'label' => __( 'Telephone', 'propertyhive' ),

    'required' => true

  );


  $fields['message'] = array(

    'type' => 'textarea',

    'label' => __( 'Message', 'propertyhive' ),

    'required' => true

  );


  return $fields;

}


// Note we're using 'default' as the identifier. Update this accordingly (see the first part of this guide)

// add_filter( 'propertyhive_search_form_fields_default', 'edit_default_property_search_form_fields' );


// function edit_default_property_search_form_fields($fields)

// {

//     // Add a location search field

//     $fields['address_keyword'] = array(

//         'type' => 'text',

//         'label' => 'Location'

//     );

//

//     // Add a radius dropdown field

//     $fields['radius'] = array(

//         'type' => 'select',

//         'label' => 'Radius',

//         'options' => array(

//           '0' => 'This Area Only',

//           '1' => 'Within 1 Mile',

//           '2' => 'Within 2 Miles',

//           '3' => 'Within 3 Miles',

//           '5' => 'Within 5 Miles',

//           '10' => 'Within 10 Miles'

//         )

//     );

//

//     return $fields; // return the fields

// }


function change_properties_per_page() {

  return 100;

}

add_filter( 'loop_search_results_per_page', 'change_properties_per_page', 20 );


add_filter( 'propertyhive_default_search_results_orderby', 'change_default_order' );

function change_default_order() {

  return 'price-desc';

}


function setup_get( $wp_query ) {

  foreach ( $wp_query->query_vars as $name => $value ) {

    if ( ! empty( $value ) && $name != 'name' ) {

      $_GET[ $name ] = $value;

      $_REQUEST[ $name ] = $value;

    }

  }

}

add_action( 'parse_request', 'setup_get' );

add_filter( 'body_class', function ( $classes ) {
  if ( isset( $_GET['marketing_flag'] ) ) {
    $flag  = $_GET['marketing_flag'];
    $class = '';
    switch ( $flag ) {
      case '195':
        $class = "marketing-flag-coming-soon";
        break;
      case '192':
        $class = "marketing-flag-investment";
        break;
      case '194':
        $class = "marketing-flag-land";
        break;
      case '193':
        $class = "marketing-flag-off-plan";
        break;
    }
    if ( ! empty( $class ) ) {
      $classes[] = $class;
    }
  }

  return $classes;
} );
