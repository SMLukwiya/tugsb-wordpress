<?php

/*

  @package speakerBureauTheme

=========================
 CUSTOM TAXONOMY SPEAKERS
=========================
*/

function speaker_custom_taxonomy() {
  // Adding taxonomy hierarchical
  $labels = array(
    'name' => 'Speaker_Types',
    'singular_name' => 'Speaker_Type',
    'search_items' => 'Search Speaker_Types',
    'all_items' => 'All Speaker_Types',
    'parent_item' => 'Parent Speaker_Type',
    'parent_item_colon' => 'Parent Speaker_Type:',
    'edit_item' => 'Edit Speaker_Type',
    'update_item' => 'Update Speaker_Type',
    'add_new_item' => 'Add New Speaker_Type',
    'new_item_name' => 'New Speaker_Type Name',
    'menu_name' => 'Speaker_Type'
  );

  $args = array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'speaker_type')
  );

  register_taxonomy('speaker_type', array('speakers'), $args);

  // Add Non hierarchical Taxonomy
  // register_taxonomy('speaker_tag', 'speakers', array(
  //   'label' => 'speaker_tag',
  //   'rewrite' => array('slug' => 'speaker_tag'),
  //   'hierarchical' => false
  // ));

}

add_action('init', 'speaker_custom_taxonomy');



/*
=========================
 CUSTOM TAXONOMY STORES
=========================
*/

function store_custom_taxonomy() {
  // Adding taxonomy hierarchical
  $labels = array(
    'name' => 'Store_Categories',
    'singular_name' => 'Store_Category',
    'search_items' => 'Search Store_Categories',
    'all_items' => 'All Store_Categories',
    'parent_item' => 'Parent Store_Category',
    'parent_item_colon' => 'Parent Store_Category:',
    'edit_item' => 'Edit Category',
    'update_item' => 'Update Category',
    'add_new_item' => 'Add New Category',
    'new_item_name' => 'New Category',
    'menu_name' => 'Category'
  );

  $args = array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'store_category')
  );

  register_taxonomy('store_category', array('stores'), $args);
}

add_action('init', 'store_custom_taxonomy');
