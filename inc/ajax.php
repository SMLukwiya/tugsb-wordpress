<?php

/*
@package speakerbureau

================
AJAX FUNCTIONS
================
*/

add_action('wp_ajax_nopriv_speaker_bureau_save_user_contact_form_data', 'speaker_bureau_save_contact_data');
add_action('wp_ajax_speaker_bureau_save_user_contact_form_data', 'speaker_bureau_save_contact_data');
add_action('wp_ajax_nopriv_speaker_bureau_save_user_simple_contact_form_data', 'speaker_bureau_save_simple_contact_data');
add_action('wp_ajax_speaker_bureau_save_user_simple_contact_form_data', 'speaker_bureau_save_simple_contact_data');

function speaker_bureau_save_contact_data() {
  $firstname = wp_strip_all_tags($_POST["firstname"]);
  $lastname = wp_strip_all_tags($_POST["lastname"]);
  $companyname = wp_strip_all_tags($_POST["companyname"]);//change to title
  $designation = wp_strip_all_tags($_POST["designation"]);
  $email = wp_strip_all_tags($_POST["email"]);
  $phone = wp_strip_all_tags($_POST["phone"]);
  $state = wp_strip_all_tags($_POST["state"]);
  $category = wp_strip_all_tags($_POST["category"]);
  $requirements = wp_strip_all_tags($_POST["requirements"]);
  $send = wp_strip_all_tags($_POST["send"]);
  $donotsend = wp_strip_all_tags($_POST["donotsend"]);

  $args = array(
    'post_title' => $companyname,
    'post_content' => $requirements,
    'post_author' => 1,
    'post_status' => 'publish',
    'post_type' => 'messages',
    'meta_input' => array(
        '_contact_email_value_key' => $email,
        '_contact_telephone_value_key' => $phone,
        '_contact_company_value_key' => $companyname,
        '_contact_category_value_key' => $category,
        '_contact_first_name_value_key' => $firstname,
        '_contact_last_name_value_key' => $lastname,
        '_contact_state_value_key' => $state,
    )
  );

    // wp_insert_post( $args );
    $postID = wp_insert_post($args);//remove this in production
    echo $postID;

    if($postID !== 0) {

      $to = get_bloginfo('admin_email');
      $subject = 'Message from '.$companyname;
      $message = $requirements;
      $headers[] = 'From: '.$companyname.'<'.$email.'>';
      $headers[] = 'Reply: '.$companyname.'<'.$email.'>';
      $headers[] = 'MIME-Version: 1.0';
      $headers[] = 'Content-Type: text/html; charset=UTF-8';

      wp_mail($to, $subject, $message, $headers);

    } else {
      echo 0;
    }

  die();
}


function speaker_bureau_save_simple_contact_data() {
  $firstname = wp_strip_all_tags($_POST["firstname"]);
  $lastname = wp_strip_all_tags($_POST["lastname"]);
  $companyname = wp_strip_all_tags($_POST["companyname"]);
  $designation = wp_strip_all_tags($_POST["designation"]);
  $messages = wp_strip_all_tags($_POST["message"]);
  $email = wp_strip_all_tags($_POST["email"]);
  $phone = wp_strip_all_tags($_POST["phone"]);

    $to = get_bloginfo('admin_email');
    $subject = 'Message from '.$companyname;
    $message = $messages;
    $headers[] = 'From: '.$companyname.'<'.$email.'>';
    $headers[] = 'Reply: '.$companyname.'<'.$email.'>';
    $headers[] = 'Content-Type: text/html: charset=UTF-8';

    wp_mail($to, $subject, $message, $headers);

    die();
}
