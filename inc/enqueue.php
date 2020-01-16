<?php

/*

@package speakerBureautheme
  ================
    ADMIN ENQUEUE
  ================
*/

function bureau_load_scripts($hook) {
  if ('toplevel_page_speaker_bureau' == $hook){
      wp_register_style('speaker_bureau_admin_style', get_template_directory_uri().'/css/bureau.admin.css', array(), '1.0.0', 'all');
      wp_enqueue_style('speaker_bureau_admin_style');

      wp_enqueue_media();

      wp_register_script('speaker_bureau_admin_script', get_template_directory_uri().'/js/bureau.admin.js', array('jquery', 'jquery-ui-datepicker'), '1.0.0', true);
      wp_enqueue_script('speaker_bureau_admin_script');
  }
  else {
      return;
  }

}

add_action('admin_enqueue_scripts', 'bureau_load_scripts');

/*
  ====================
    FRONT-END ENQUEUE
  ====================
*/

function bureau_load_frontend_scripts() {

  wp_enqueue_style('bootstrap4', get_template_directory_uri().'/css/bootstrap.min.css', array(), '4.3.1', 'all');
  wp_enqueue_style('font-awesome', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  // wp_enqueue_style('font-awesome', get_template_directory_uri().'/css/fontawesome.min.css', array(), '5.11.2', 'all');
  wp_enqueue_style('styles', get_template_directory_uri().'/css/styles.css', array(), '1.0.0', 'all');

  wp_deregister_script('jquery');
  wp_register_script('jquery', get_template_directory_uri().'/js/jquery-3.4.1.min.js', false, '3.4.1', true);
  wp_enqueue_script('jquery');
  wp_enqueue_script('speaker_script', get_template_directory_uri().'/js/script.js', array('jquery', 'jquery-ui-datepicker'), '1.0.0', true);
  wp_enqueue_script('bootstrap4', get_template_directory_uri().'/js/bootstrap.min.js', array('jquery'), '4.3.1', true);
}

add_action('wp_enqueue_scripts', 'bureau_load_frontend_scripts');
