<?php
remove_action( 'propertyhive_after_search_results_loop_item_title', 'propertyhive_template_loop_price', 10 );
add_action( 'propertyhive_price', 'propertyhive_template_loop_price', 10 );
remove_action( 'propertyhive_after_search_results_loop_item_title', 'propertyhive_template_loop_actions', 30 );
remove_action( 'propertyhive_before_search_results_loop', 'propertyhive_search_form', 10 );
add_action( 'propertyhive_search', 'propertyhive_search_form', 10 );
remove_action( 'propertyhive_before_single_property_summary', 'propertyhive_show_property_images', 10 );
add_action( 'propertyhive_slider', 'propertyhive_show_property_images', 10 );
add_action( 'propertyhive_after_single_property_summary', 'propertyhive_template_single_summary', 30 );
add_action( 'propertyhive_after_single_property_letting', 'propertyhive_template_single_letting_information', 0 );
remove_action( 'propertyhive_after_single_property_summary', 'propertyhive_template_single_actions', 10 );
add_action( 'propertyhive_template_single_actions', 'propertyhive_template_single_actions', 10 );
