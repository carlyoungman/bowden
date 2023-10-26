<h1><?php the_title(); ?></h1>

<h2><?php echo $property->get_formatted_price(); ?></h2>

<?php
$gallery_attachment_ids = $property->get_gallery_attachment_ids();
?>
<div style="float:left; width:68%;">

  <?php
  if ( ! empty( $gallery_attachment_ids ) ) {
    ?>
    <img style="width:100%;" src="<?php if ( $pdf ) {
      echo get_attached_file( $gallery_attachment_ids[0] );
    } else {
      $image = wp_get_attachment_image_src( $gallery_attachment_ids[0], 'full' );
      echo $image[0];
    } ?>" alt="">
    <?php
  }
  ?>

  <?php
  $features = $property->get_features();

  if ( ! empty( $features ) ) {
    ?>
    <h3><?php echo __( 'Features', 'propertyhive' ); ?></h3>

    <ul style="padding-left:13px">
      <?php
      foreach ( $features as $feature ) {
        echo '<li>' . $feature . '</li>';
      }
      ?>
    </ul>
    <br>
    <?php
  }
  ?>

  <h3><?php echo __( 'Full Description', 'propertyhive' ); ?></h3>
  <?php
  $full_description = $property->get_formatted_description();
  if ( trim( $full_description ) != '' ) {
    echo $full_description;
  } else {
    the_excerpt();
  }
  ?>

  <?php
  $office_id = get_post_meta( $post->ID, '_office_id', true );
  if ( $office_id != '' ) {
    ?>
    <br>
    <h3><?php echo __( 'Contact Us', 'propertyhive' ); ?></h3>

    <strong><?php echo get_bloginfo( 'name' ); ?></strong><br>
    <?php
    $address   = '';
    $separator = ', ';

    $address_1 = get_post_meta( $office_id, '_office_address_1', true );
    if ( $address_1 != '' ) {
      $address .= $address_1;
    }
    $address_2 = get_post_meta( $office_id, '_office_address_2', true );
    if ( $address_2 != '' ) {
      if ( $address != '' ) {
        $address .= ', ';
      }
      $address .= $address_2;
    }
    $address_3 = get_post_meta( $office_id, '_office_address_3', true );
    if ( $address_3 != '' ) {
      if ( $address != '' ) {
        $address .= $separator;
      }
      $address .= $address_3;
    }
    $address_4 = get_post_meta( $office_id, '_office_address_4', true );
    if ( $address_4 != '' ) {
      if ( $address != '' ) {
        $address .= $separator;
      }
      $address .= $address_4;
    }
    $address_postcode = get_post_meta( $office_id, '_office_address_postcode', true );
    if ( $address_postcode != '' ) {
      if ( $address != '' ) {
        $address .= $separator;
      }
      $address .= $address_postcode;
    }
    echo $address;

    $department = $property->department;
    $telephone  = get_post_meta( $office_id, '_office_telephone_number_' . str_replace( "residential-", "", $department ), true );
    $email      = get_post_meta( $office_id, '_office_email_address_' . str_replace( "residential-", "", $department ), true );

    if ( $telephone != '' ) {
      if ( $address != '' ) {
        echo '<br>';
      }
      echo 'T: ' . $telephone;
    }
    if ( $email != '' ) {
      if ( $address != '' || $telephone != '' ) {
        echo '<br>';
      }
      echo 'E: ' . $email;
    }

  }
  ?>

  <h3 style="margin-top:60px">SERVICES:</h3>
  <p>O’Connor Bowden has not checked any mains or private utility services at this property, neither have we received
    confirmation or sought confirmation from the statuary bodies of the presence of these services and their function.
    O’Connor Bowden cannot confirm services are in working order. O’Connor Bowden has not checked any of the appliances,
    electrical, heating or plumbing systems at this property. All prospective purchasers should satisfy themselves on
    this point prior to entering into a contract and we recommend and advise any prospective purchaser to obtain advice
    and verification from their solicitor and / or surveyor on all</p>
  <h3>DISCLAIMER:</h3>
  <p>THE PROPERTY MISDESCRIPTIONS ACT 1991: The Agent has not tested any apparatus, equipment, fixtures and fittings or
    services and so cannot verify that they are in working order or fit for the purpose. A Buyer is advised to obtain
    verification from their Solicitor or Surveyor. References to the Tenure of a property are based on information
    supplied by the Seller. The Agent has not had sight of the title documents. A Buyer is advised to obtain
    verification from their Solicitor. Items shown in photographs are NOT included unless specifically mentioned within
    the sales particulars. They may however be available by separate negotiation. Buyers must check the availability of
    any property and make an appointment to view before embarking on any journey to see a property. Although these
    particulars are thought to be materially correct their accuracy cannot be guaranteed and they do not form part of
    any contract.</p>
  <P>All measurements are approximate.</p>
  <p>MISREPRESENTATION ACT 1967: The property details have been produced in good faith, are set out as a general guide
    and do not constitute the whole or part of any contract. All liability, in negligence or otherwise, arising from the
    use of the details is hereby excluded</p>

</div>

<div style="float:right; width:29%;">


  <?php
  if ( ! empty( $gallery_attachment_ids ) && count( $gallery_attachment_ids ) > 0 ) {
    $i = 0;
    $j = 0;
    foreach ( $gallery_attachment_ids as $attachment_id ) {
      if ( $i == 0 ) {
        // Skip the first image
        ++ $i;
        continue;
      }
      /*if ( $j == 4 )
      {
        echo '</div>';
        $j = 0;
      }
      if ( $j == 0 )
      {
        echo '<div style="float:right; width:29%;">';
      }*/
      ?><img style="width:100%; padding-bottom:2px;" src="<?php if ( $pdf ) {
        echo get_attached_file( $attachment_id );
      } else {
        $image = wp_get_attachment_image_src( $attachment_id, 'large' );
        echo $image[0];
      } ?>" alt=""><?php
      echo '<br>';
      ++ $i;
      ++ $j;
    }
  }

  $floorplan_attachment_ids = $property->get_floorplan_attachment_ids();

  if ( ! empty( $floorplan_attachment_ids ) ) {
    foreach ( $floorplan_attachment_ids as $attachment_id ) {
      // Only show images
      $attachment_filename = basename( get_attached_file( $attachment_id ) );
      if (
        strpos( strtolower( $attachment_filename ), 'jpg' ) ||
        strpos( strtolower( $attachment_filename ), 'jpeg' ) ||
        strpos( strtolower( $attachment_filename ), 'png' ) ||
        strpos( strtolower( $attachment_filename ), 'bmp' ) ||
        strpos( strtolower( $attachment_filename ), 'gif' )
      ) {

        /*if ( $j == 4 )
        {
          echo '</div>';
          $j = 0;
        }
        if ( $j == 0 )
        {
          echo '';
        }*/

        ?>
        <img style="width:100%; padding-bottom:2px;" src="<?php if ( $pdf ) {
          echo get_attached_file( $attachment_id );
        } else {
          $image = wp_get_attachment_image_src( $attachment_id, 'large' );
          echo $image[0];
        } ?>" alt="">
        <?php
        echo '<br>';
        ++ $j;
      }
    }
  }

  $epc_attachment_ids = $property->get_epc_attachment_ids();

  if ( ! empty( $epc_attachment_ids ) ) {
    foreach ( $epc_attachment_ids as $attachment_id ) {
      // Only show images
      $attachment_filename = basename( get_attached_file( $attachment_id ) );
      if (
        strpos( strtolower( $attachment_filename ), 'jpg' ) ||
        strpos( strtolower( $attachment_filename ), 'jpeg' ) ||
        strpos( strtolower( $attachment_filename ), 'png' ) ||
        strpos( strtolower( $attachment_filename ), 'bmp' ) ||
        strpos( strtolower( $attachment_filename ), 'gif' )
      ) {

        /*if ( $j == 4 )
        {
          echo '</div>';
          $j = 0;
        }
        if ( $j == 0 )
        {
          echo '';
        }*/

        ?>
        <img style="width:100%; padding-bottom:2px;" src="<?php if ( $pdf ) {
          echo get_attached_file( $attachment_id );
        } else {
          $image = wp_get_attachment_image_src( $attachment_id, 'large' );
          echo $image[0];
        } ?>" alt="">
        <?php
        echo '<br>';
        ++ $j;
      }
    }
  }

  if ( $property->latitude != '' && $property->longitude != '' && ini_get( 'allow_url_fopen' ) ) {
    /*if ( $j == 4 )
    {
      echo '</div>';
      $j = 0;
    }
    if ( $j == 0 )
    {
      echo '<div style="float:right; width:29%;">';
    }*/
    ?><img style="width:100%; padding-bottom:2px;"
           src="https://maps.googleapis.com/maps/api/staticmap?center=<?php echo $property->latitude; ?>,<?php echo $property->longitude; ?>&zoom=12&size=350x270&maptype=roadmap&markers=color:red%7Clabel:%7C<?php echo $property->latitude; ?>,<?php echo $property->longitude; ?>"
           alt=""><?php
  }
  ?>

</div>
