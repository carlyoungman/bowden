<?php

function Testimonials() {
  $labels = array(
    'name'                  => _x( 'Testimonials', 'Post Type General Name', 'text_domain' ),
    'singular_name'         => _x( 'Testimonial', 'Post Type Singular Name', 'text_domain' ),
    'menu_name'             => __( 'Testimonials', 'text_domain' ),
    'name_admin_bar'        => __( 'Post Type', 'text_domain' ),
    'archives'              => __( 'Testimonial Archives', 'text_domain' ),
    'attributes'            => __( 'Item Attributes', 'text_domain' ),
    'parent_item_colon'     => __( 'Parent Testimonial:', 'text_domain' ),
    'all_items'             => __( 'All Testimonials', 'text_domain' ),
    'add_new_item'          => __( 'Add New Testimonial', 'text_domain' ),
    'add_new'               => __( 'Add New', 'text_domain' ),
    'new_item'              => __( 'New Testimonial', 'text_domain' ),
    'edit_item'             => __( 'Edit Testimonial', 'text_domain' ),
    'update_item'           => __( 'Update Testimonial', 'text_domain' ),
    'view_item'             => __( 'View Testimonial', 'text_domain' ),
    'view_items'            => __( 'View Testimonials', 'text_domain' ),
    'search_items'          => __( 'Search Testimonial', 'text_domain' ),
    'not_found'             => __( 'Not found', 'text_domain' ),
    'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
    'featured_image'        => __( 'Featured Image', 'text_domain' ),
    'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
    'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
    'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
    'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this Testimonial', 'text_domain' ),
    'items_list'            => __( 'Testimonials list', 'text_domain' ),
    'items_list_navigation' => __( 'Testimonials list navigation', 'text_domain' ),
    'filter_items_list'     => __( 'Filter Testimonials list', 'text_domain' ),
  );

  $args = array(
    'label'               => __( 'Testimonial', 'text_domain' ),
    'description'         => __( 'Testimonials from playtime', 'text_domain' ),
    'menu_icon'           => __( 'dashicons-format-chat' ),
    'labels'              => $labels,
    'supports'            => array(),
    'taxonomies'          => array( 'category', 'post_tag' ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'menu_position'       => 5,
    'show_in_admin_bar'   => true,
    'show_in_nav_menus'   => true,
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'page',
  );

  register_post_type( 'Testimonials', $args );

}

add_action( 'init', 'Testimonials', 0 );

function Offices() {

  $labels = array(
    'name'                  => _x( 'Offices', 'Post Type General Name', 'text_domain' ),
    'singular_name'         => _x( 'Office', 'Post Type Singular Name', 'text_domain' ),
    'menu_name'             => __( 'Offices', 'text_domain' ),
    'name_admin_bar'        => __( 'Post Type', 'text_domain' ),
    'archives'              => __( 'Office Archives', 'text_domain' ),
    'attributes'            => __( 'Item Attributes', 'text_domain' ),
    'parent_item_colon'     => __( 'Parent Office:', 'text_domain' ),
    'all_items'             => __( 'All Offices', 'text_domain' ),
    'add_new_item'          => __( 'Add New Office', 'text_domain' ),
    'add_new'               => __( 'Add New', 'text_domain' ),
    'new_item'              => __( 'New Office', 'text_domain' ),
    'edit_item'             => __( 'Edit Office', 'text_domain' ),
    'update_item'           => __( 'Update Office', 'text_domain' ),
    'view_item'             => __( 'View Office', 'text_domain' ),
    'view_items'            => __( 'View Offices', 'text_domain' ),
    'search_items'          => __( 'Search Office', 'text_domain' ),
    'not_found'             => __( 'Not found', 'text_domain' ),
    'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
    'featured_image'        => __( 'Featured Image', 'text_domain' ),
    'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
    'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
    'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
    'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this Office', 'text_domain' ),
    'items_list'            => __( 'Offices list', 'text_domain' ),
    'items_list_navigation' => __( 'Offices list navigation', 'text_domain' ),
    'filter_items_list'     => __( 'Filter Offices list', 'text_domain' ),
  );

  $args = array(
    'label'               => __( 'Office', 'text_domain' ),
    'description'         => __( 'Offices from playtime', 'text_domain' ),
    'menu_icon'           => __( 'dashicons-admin-home' ),
    'labels'              => $labels,
    'supports'            => array(),
    'taxonomies'          => array( 'category', 'post_tag' ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'menu_position'       => 5,
    'show_in_admin_bar'   => true,
    'show_in_nav_menus'   => true,
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'page',
  );
  register_post_type( 'Offices', $args );
}
