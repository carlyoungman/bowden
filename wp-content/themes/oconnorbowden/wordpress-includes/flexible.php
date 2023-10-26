<?php

function get_flexible_content() {

  if ( have_rows( 'content_' ) ) :
    while ( have_rows( 'content_' ) ) : the_row();
      if ( get_row_layout() == 'hero' ) :
        include( locate_template( 'global-modules/flexible/hero.php' ) );
      elseif ( get_row_layout() == 'people' ):
        include( locate_template( 'global-modules/flexible/people.php' ) );
      elseif ( get_row_layout() == 'content_block' ):
        include( locate_template( 'global-modules/flexible/content_block.php' ) );
      elseif ( get_row_layout() == 'testimonials' ):
        include( locate_template( 'global-modules/flexible/testimonials.php' ) );
      elseif ( get_row_layout() == 'partner_logos' ):
        include( locate_template( 'global-modules/flexible/partners.php' ) );
      elseif ( get_row_layout() == 'contact_forms' ):
        include( locate_template( 'global-modules/flexible/contact_forms.php' ) );
      elseif ( get_row_layout() == 'featured_properties' ):
        include( locate_template( 'global-modules/flexible/featured_property.php' ) );
      elseif ( get_row_layout() == 'properties_shortlist' ):
        include( locate_template( 'global-modules/flexible/property_shortlist.php' ) );
      elseif ( get_row_layout() == 'grid_block' ):
        include( locate_template( 'global-modules/flexible/grid_block.php' ) );
      elseif ( get_row_layout() == 'property_search_block' ):
        include( locate_template( 'global-modules/flexible/property_search.php' ) );
      elseif ( get_row_layout() == 'list_content' ):
        include( locate_template( 'global-modules/flexible/list_content.php' ) );
      elseif ( get_row_layout() == 'download_panel' ):
        include( locate_template( 'global-modules/flexible/download_panel.php' ) );
      elseif ( get_row_layout() == 'forms' ):
        include( locate_template( 'global-modules/flexible/forms.php' ) );
      elseif ( get_row_layout() == 'spacer' ):
        include( locate_template( 'global-modules/flexible/spacer.php' ) );
      elseif ( get_row_layout() == 'image_gallery_with_content' ):
        include( locate_template( 'global-modules/flexible/image_gallery_with_content.php' ) );
      elseif ( get_row_layout() == 'furniture_package' ):
        include( locate_template( 'global-modules/flexible/furniture_package.php' ) );
      elseif ( get_row_layout() == '50_50_block' ):
        include( locate_template( 'global-modules/flexible/50_50_block.php' ) );
      endif;
      wp_reset_postdata();
      wp_reset_query();
    endwhile;
  endif;

}


function get_flexible_contact_content() {

  if ( have_rows( 'contact_content' ) ) :

    while ( have_rows( 'contact_content' ) ) : the_row();
      if ( get_row_layout() == 'content_block' ):
        include( locate_template( 'global-modules/flexible/content_block.php' ) );
      elseif ( get_row_layout() == 'spacer' ):
        include( locate_template( 'global-modules/flexible/spacer.php' ) );
      elseif ( get_row_layout() == '50_50_block' ):
        include( locate_template( 'global-modules/flexible/50_50_block.php' ) );
      elseif ( get_row_layout() == 'download_panel' ):
        include( locate_template( 'global-modules/flexible/download_panel.php' ) );
      endif;
      wp_reset_postdata();
      wp_reset_query();
    endwhile;

  endif;

}
