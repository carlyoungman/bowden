<?php
function register_my_menus() {
        register_nav_menus(
        array(
          'secondary_navigation' => __('Main Menu'),
          'footer_menu' => __('Footer Menu')
        )
      );
    }
add_action('init', 'register_my_menus');


function change_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Blog';
    $submenu['edit.php'][5][0] = 'Blog';
    $submenu['edit.php'][10][0] = 'Add Blog Post';
    echo '';
}

add_action('admin_menu', 'change_post_menu_label');

function change_post_object_label(){

    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Blog';
    $labels->singular_name = 'Blog';
    $labels->add_new = 'Add Blog Post';
    $labels->add_new_item = 'Add Blog Post';
    $labels->edit_item = 'Edit Blog Post';
    $labels->new_item = 'Blog';
    $labels->view_item = 'View Blog Post';
    $labels->search_items = 'Search Blog Posts';
    $labels->not_found = 'No Blog Posts found';
    $labels->not_found_in_trash = 'No Blog posts found in Trash';
}

add_action('init', 'change_post_object_label');
