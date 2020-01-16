<?php
/*

@package speakerBureautheme

=========================
THEME CUSTOM POST TYPES
=========================

/*--------------------------------------------------------------------------------------------------------------------------*/

  /*
=========================
SPEAKERS CUSTOM POST TYPES
=========================
*/

function speaker_custom_post_type() {
  $labels = array(
    'name'                =>'Speakers',
    'singular_name'       =>'Speaker',
    'add_new'             =>'Add Speaker',
    'all_items'           =>'All Speakers',
    'add_new_item'        =>'Add Item',
    'edit_item'           =>'Edit Item',
    'new_item'            =>'New Speaker',
    'view_item'           =>'View Speaker',
    'search_item'         =>'Search Speaker',
    'not_found'           =>'No speaker found',
    'not_found_in_trash'  =>'No items found in trash',
    'parent_item_colon'   =>'Parent Item',
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'has_archive'        => true,
    'publicly_queryable' => true,
    'query_var'          => true,
    'rewrite'            => true,
    'capability_type'    => 'post',
    'hierarchical'       => false,
    'supports'           => array(
          'title',
          'editor',
          'excerpt',
          'thumbnail',
          'revisions'
    ),
    // 'taxonomies' => array('category', 'post_tag'),
    'menu_position'      => 6,
    'exclude_from_search' => false
  );

  register_post_type('speakers', $args);
}

/*
Speaker_tag_meta_box
=================================================
*/
function speaker_bureau_catch_phrase_add_metabox() {
  add_meta_box('speaker_phrase', 'Speaker Catch Phrase', 'speaker_bureau_phrase_callback', 'speakers', 'normal');
}

function speaker_bureau_phrase_callback( $post ) {
  wp_nonce_field('speaker_bureau_save_speaker_phrase_data', 'speaker_bureau_speaker_phrase_meta_box_nonce');

  $thecatchphrase = get_post_meta($post->ID, '_catch_phrase_value_key', true);

  echo '<label for="speaker_bureau_catch_phrase_field">Speaker Catch Phrase: </label>';
  echo '<input type="text" id="speaker_bureau_catch_phrase_field" name="speaker_bureau_catch_phrase_field" value="'.esc_attr($thecatchphrase).'"size="75" />';
}

/*
Save Data
============================================================
*/
function speaker_bureau_save_speaker_phrase_data($post_ID) {
  if (!isset($_POST['speaker_bureau_speaker_phrase_meta_box_nonce'])) {
    return;
  }
  if (!wp_verify_nonce($_POST['speaker_bureau_speaker_phrase_meta_box_nonce'], 'speaker_bureau_save_speaker_phrase_data')) {
    return;
  }
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
  }
  if (!current_user_can('edit_post', $post_ID)) {
    return;
  }
  if (!isset($_POST['speaker_bureau_catch_phrase_field']) ) {
    return;
  }

  $thecatchphrase = sanitize_text_field($_POST['speaker_bureau_catch_phrase_field']);

  update_post_meta($post_ID, '_catch_phrase_value_key', $thecatchphrase);

}

add_action('init', 'speaker_custom_post_type');
add_action('add_meta_boxes', 'speaker_bureau_catch_phrase_add_metabox');
add_action('save_post', 'speaker_bureau_save_speaker_phrase_data');


/*
==============================
MESSAGES CUSTOM POST TYPES
==============================
*/

function speaker_bureau_contact_message_cpt() {
  $labels = array(
    'name'            => 'Messages',
    'singular_name'   => 'Message',
    'menu_name'       => 'Messages',
    'name_admin_bar'  => 'Message',
  );

  $args = array(
    'labels'          => $labels,
    'has_archive' => true,
    'query_var' => true,
    'show_ui'         => true,
    'show_in_menu'    => true,
    'capability_type' => 'post',
    'hierarchical'    => false,
    'menu_position'   => null,
    'menu_icon'       => 'dashicons-email-alt',
    'supports'        => array('title', 'editor', 'author')
  );

  register_post_type('messages', $args);
}

function speaker_bureau_messages_columns($columns) {
  $newColumns = array();
  $newColumns['cb'] = "<input type=\"checkbox\"/>";
  $newColumns['title'] = 'Name';
  $newColumns['category'] = 'Category';
  $newColumns['message'] = 'Message';
  $newColumns['email'] = 'Email';
  $newColumns['telephone'] = 'Telephone';
  $newColumns['date'] = 'Date';
  return $newColumns;
}

function speaker_bureau_message_custom_column($column, $post_ID) {

  switch( $column ) {
    case 'title':
      echo get_the_title();
      break;

    case 'message':
      echo get_the_excerpt();
      break;

    case 'email':
      $email = get_post_meta($post_ID, '_contact_email_value_key', true);
      echo '<a href="mailto:'.$email.'">'.$email.'</a><br/>';
      break;

    case 'category':
      echo get_post_meta($post_ID, '_contact_category_value_key', true);
      break;

    case 'telephone':
      echo get_post_meta($post_ID, '_contact_telephone_value_key', true);
      break;
  }
}

/*
Contact_messages_meta_boxes
======================================================================
*/
function speaker_bureau_messages_add_metabox() {
  add_meta_box('contact_email', 'User Details', 'speaker_bureau_message_email_callback', 'messages', 'side');
}

function speaker_bureau_message_email_callback( $post ) {
  wp_nonce_field('speaker_bureau_save_email_data', 'speaker_bureau_message_email_meta_box_nonce');

  $email       = get_post_meta($post->ID, '_contact_email_value_key', true);
  $telephone   = get_post_meta($post->ID, '_contact_telephone_value_key', true);
  $companyname = get_post_meta($post->ID, '_contact_company_value_key', true);
  $category    = get_post_meta($post->ID, '_contact_category_value_key', true);
  $firstname   = get_post_meta($post->ID, '_contact_first_name_value_key', true);
  $lastname    = get_post_meta($post->ID, '_contact_last_name_value_key', true);
  $state       = get_post_meta($post->ID, '_contact_state_value_key', true);


  echo '<label for="speaker_bureau_message_email_field">User Email Address: </label>';
  echo '<input type="email" id="speaker_bureau_message_email_field" name="speaker_bureau_message_email_field" value="'.esc_attr($email).'"size="25" />';
  echo '<label for="speaker_bureau_message_telephone_field">Telephone: </label>';
  echo '<input type="text" id="speaker_bureau_message_telephone_field" name="speaker_bureau_message_telephone_field" value="'.esc_attr($telephone).'"size="25" />';
  echo '<label for="speaker_bureau_message_telephone_field">Company Name: </label>';
  echo '<input type="text" id="speaker_bureau_message_companyname_field" name="speaker_bureau_message_companyname_field" value="'.esc_attr($companyname).'"size="25" />';
  echo '<label for="speaker_bureau_message_telephone_field">Category: </label>';
  echo '<input type="text" id="speaker_bureau_message_category_field" name="speaker_bureau_message_category_field" value="'.esc_attr($category).'"size="25" />';
  echo '<label for="speaker_bureau_message_telephone_field">First Name: </label>';
  echo '<input type="text" id="speaker_bureau_message_first_name_field" name="speaker_bureau_message_first_name_field" value="'.esc_attr($firstname).'"size="25" />';
  echo '<label for="speaker_bureau_message_telephone_field">Last Name: </label>';
  echo '<input type="text" id="speaker_bureau_message_last_name_field" name="speaker_bureau_message_last_name_field" value="'.esc_attr($lastname).'"size="25" />';
  echo '<label for="speaker_bureau_message_telephone_field">State: </label>';
  echo '<input type="text" id="speaker_bureau_message_state_field" name="speaker_bureau_message_state_field" value="'.esc_attr($state).'"size="25" />';
}

/*
Save Data
==================================================
*/
function speaker_bureau_save_email_data($post_ID) {
  if (!isset($_POST['speaker_bureau_message_email_meta_box_nonce'])) {
    return;
  }
  if (!wp_verify_nonce($_POST['speaker_bureau_message_email_meta_box_nonce'], 'speaker_bureau_save_email_data')) {
    return;
  }
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
  }
  if (!current_user_can('edit_post', $post_ID)) {
    return;
  }
  if (!isset($_POST['speaker_bureau_message_email_field']) || !isset($_POST['speaker_bureau_message_telephone_field'])) {
    return;
  }

  $theemail = sanitize_text_field($_POST['speaker_bureau_message_email_field']);
  $thetelephone = sanitize_text_field($_POST['speaker_bureau_message_telephone_field']);
  $thecompany = sanitize_text_field($_POST['speaker_bureau_message_companyname_field']);
  $thecategory = sanitize_text_field($_POST['speaker_bureau_message_category_field']);
  $firstname = sanitize_text_field($_POST['speaker_bureau_message_first_name_field']);
  $lastname = sanitize_text_field($_POST['speaker_bureau_message_last_name_field']);
  $state = sanitize_text_field($_POST['speaker_bureau_message_state_field']);

  update_post_meta($post_ID, '_contact_email_value_key', $theemail);
  update_post_meta($post_ID, '_contact_telephone_value_key', $thetelephone);
  update_post_meta($post_ID, '_contact_category_value_key', $thecategory);
  update_post_meta($post_ID, '_contact_company_value_key', $thecompany);
  update_post_meta($post_ID, '_contact_first_name_value_key', $firstname);
  update_post_meta($post_ID, '_contact_last_name_value_key', $lastname);
  update_post_meta($post_ID, '_contact_state_value_key', $state);

}

add_action('init', 'speaker_bureau_contact_message_cpt');
add_filter('manage_messages_posts_columns', 'speaker_bureau_messages_columns');
add_action('manage_messages_posts_custom_column', 'speaker_bureau_message_custom_column', 10, 2);
add_action('add_meta_boxes', 'speaker_bureau_messages_add_metabox');
add_action('save_post', 'speaker_bureau_save_email_data');

/*
-----------------------------------------------------------------------------------------------------------------------*/
/*
=========================
 EVENTS POST TYPE
=========================
*/
function speaker_bureau_event_cpt() {
  $labels = array(
    'name'              =>'Events',
    'singular_name'     =>'Event',
    'add_new'           =>'Add Event',
    'all_items'         =>'All Events',
    'add_new_item'      =>'Add New Event',
    'edit_item'         =>'Edit Event',
    'new_item'          =>'New Event',
    'view_item'         =>'View Event',
    'search_item'       =>'Search Events',
    'not_found'         =>'No Event found',
    'not_found_in_trash'=>'No items found in trash',
    'parent_item_colon' =>'Parent Item',
  );

  $args = array(
    'labels'              => $labels,
    'public'              => true,
    'has_archive'         => true,
    'publicly_queryable'  => true,
    'show_ui'             => true,
    'query_var'           => true,
    'rewrite'             => true,
    'capability_type'     => 'post',
    'hierarchical'        => false,
    'menu_position'       => null,
    'supports'            => array(
          'title',
          'editor',
          'excerpt',
          'thumbnail',
          'revisions'
    )
  );

  register_post_type('events', $args);
}

function events_edit_columns($columns) {
  $eventsColumns = array();
  $eventsColumns['cb'] = "<input type=\"checkbox\"/>";
  $eventsColumns['title'] = 'Event';
  $eventsColumns['event_date'] = 'Event Date';
  $eventsColumns['event_location'] = 'Location';
  $eventsColumns['event_city'] = 'City';
  $eventsColumns['date'] = 'Date';
  return $eventsColumns;
}

function events_custom_columns($column, $post_ID) {
  global $post;
  $custom = get_post_custom();

  switch($column) {
    case "event_date":
        $eventDate = get_post_meta($post_ID, '_event_date_value_key', true);
        $eventStart = get_post_meta($post_ID, '_event_start_time_value_key', true);
        $eventEnd = get_post_meta($post_ID, '_event_end_time_value_key', true);
        echo date("F j, Y", $eventDate).'<br/><em>'.$eventStart.' - '.$eventEnd.'</em>';
        break;

    case "event_location":
          $eventLocation = get_post_meta($post_ID, '_event_location_value_key', true);
          echo $eventLocation;
          break;

    case "event_city":
          echo get_post_meta($post_ID, '_event_city_value_key', true);
          break;
  }
}

/*
Events Metaboxes
====================================================================
*/
function events_admin_init() {
  add_meta_box('event_meta', 'Event Details', 'speaker_bureau_event_callback', 'events', 'normal');
}

function speaker_bureau_event_callback( $post ) {
  wp_nonce_field('speaker_bureau_save_event_data', 'speaker_bureau_event_meta_box_nonce');

  $eventDate = get_post_meta($post->ID, '_event_date_value_key', true);
  $eventStart = get_post_meta($post->ID, '_event_start_time_value_key', true);
  $eventEnd = get_post_meta($post->ID, '_event_end_time_value_key', true);
  $eventLocation = get_post_meta($post->ID, '_event_location_value_key', true);
  $eventCity = get_post_meta($post->ID, '_event_city_value_key', true);
  $eventRegister = get_post_meta($post->ID, '_event_register_url_value_key', true);

  echo '<label for="event_date">Event Date: </label><br/>';
  echo '<input type="text" id="event_date" name="event_date" value="'.esc_attr($eventDate).'" />';
  echo '<em>(mm-dd-yyyy)</em><br/>';
  echo '<label for="event_start_time">Start Time: </label><br/>';
  echo '<input type="text" id="event_start_time" name="event_start_time" value="'.esc_attr($eventStart).'"/>';
  echo '<em>(hh-mm-pm)</em><br/>';
  echo '<label for="event_end_time">End Time: </label><br/>';
  echo '<input type="text" id="event_end_time" name="event_end_time" value="'.esc_attr($eventEnd).'"/>';
  echo '<em>(hh:mm:pm)</em><br/>';
  echo '<label for="event_location">Location: </label><br/>';
  echo '<input type="text" id="event_location" size="70" name="event_location" value="'.esc_attr($eventLocation).'"/><br/>';
  echo '<label for="event_city">City: </label><br/>';
  echo '<input type="text" id="event_city" size="50" name="event_city" value="'.esc_attr($eventCity).'"/><br/>';
  echo '<label for="event_register_url">Register URL: </label><br/>';
  echo '<input type="text" id="event_register_url" size="70" name="event_register_url" value="'.esc_attr($eventRegister).'"/>';

}

/*
Save Data
=======================================================
*/
function speaker_bureau_save_event_data($post_ID) {
  if (!isset($_POST['speaker_bureau_event_meta_box_nonce'])) {
    return;
  }
  if (!wp_verify_nonce($_POST['speaker_bureau_event_meta_box_nonce'], 'speaker_bureau_save_event_data')) {
    return;
  }
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
  }
  if (!current_user_can('edit_post', $post_ID)) {
    return;
  }
  if (!isset($_POST['event_date']) && !isset($_POST['event_start_time']) && !isset($_POST['event_end_time'])
      && !isset($_POST['event_location']) && !isset($_POST['event_city'])) {
    return;
  }

  $theDate = sanitize_text_field($_POST['event_date']);
  $theStartTime = sanitize_text_field($_POST['event_start_time']);
  $theEndTime = sanitize_text_field($_POST['event_end_time']);
  $theLocation = sanitize_text_field($_POST['event_location']);
  $theCity = sanitize_text_field($_POST['event_city']);
  $theRegisterUrl = sanitize_text_field($_POST['event_register_url']);

  update_post_meta($post_ID, '_event_date_value_key', strtotime($theDate));
  update_post_meta($post_ID, '_event_start_time_value_key', $theStartTime);
  update_post_meta($post_ID, '_event_end_time_value_key', $theEndTime);
  update_post_meta($post_ID, '_event_location_value_key', $theLocation);
  update_post_meta($post_ID, '_event_city_value_key', $theCity);
  update_post_meta($post_ID, '_event_register_url_value_key', $theRegisterUrl);
}

add_action('init', 'speaker_bureau_event_cpt');
add_filter('manage_events_posts_columns', 'events_edit_columns');
add_action('manage_events_posts_custom_column', 'events_custom_columns', 10, 2);
add_action('add_meta_boxes', 'events_admin_init');
add_action('save_post', 'speaker_bureau_save_event_data');
add_filter('manage_edit_events_sortable_columns', 'event_date_column_register_sortable');
add_filter('request', 'event_date_column_orderby');


function event_date_column_register_sortable($columns) {
  $columns['event_date'] = 'event_date';
  return $columns;
}

function event_date_column_orderby($vars) {
  if (isset($vars['orderby']) && 'event_date' == $vars['orderby']) {
    $vars = array_merge($vars, array(
      'meta_key' => 'event_date',
      'orderby' => 'meta_value_num'
    ));
  }
  return $vars;
}

/*
-----------------------------------------------------------------------------------------------------------------------*/
/*
=========================
 STORE POST TYPE
=========================
*/
function speaker_bureau_store_cpt() {
  $labels = array(
    'name'              =>'Stores',
    'singular_name'     =>'Stores',
    'add_new'           =>'Add Store',
    'all_items'         =>'All Stores',
    'add_new_item'      =>'Add New Store',
    'edit_item'         =>'Edit Store',
    'new_item'          =>'New Store',
    'view_item'         =>'View Store',
    'search_item'       =>'Search Store',
    'not_found'         =>'No Item found',
    'not_found_in_trash'=>'No items found in trash',
    'parent_item_colon' =>'Parent Item',
  );

  $args = array(
    'labels'              => $labels,
    'public'              => true,
    'has_archive'         => true,
    'publicly_queryable'  => true,
    'show_ui'             => true,
    'query_var'           => true,
    'rewrite'             => true,
    'capability_type'     => 'post',
    'hierarchical'        => false,
    'menu_position'       => null,
    'supports'            => array(
          'title',
          'editor',
          'excerpt',
          'thumbnail',
          'revisions'
    )
  );

  register_post_type('stores', $args);
}

function stores_edit_columns($columns) {
  $storeColumns = array();
  $storeColumns['cb'] = "<input type=\"checkbox\"/>";
  $storeColumns['title'] = 'Title';
  $storeColumns['author'] = 'Author';
  $storeColumns['price'] = 'Price';
  $storeColumns['quantity'] = 'Quantity';
  $storeColumns['date'] = 'Date';
  return $storeColumns;
}

function stores_custom_columns($column, $post_ID) {

  switch($column) {
    case "author":
          echo get_post_meta($post_ID, '_store_author_value_key', true);
          break;

    case "price":
          $price = get_post_meta($post_ID, '_store_price_value_key', true);
          echo 'UGX-'.$price;
          break;

    case "quantity":
          echo get_post_meta($post_ID, '_store_quantity_value_key', true);
          break;
  }
}

/*
Store Metaboxes
======================================================
*/
function store_meta_boxes() {
  add_meta_box('store_meta', 'Store Details', 'speaker_bureau_store_callback', 'stores', 'side');
}

function speaker_bureau_store_callback( $post ) {
  wp_nonce_field('speaker_bureau_save_store_data', 'speaker_bureau_store_meta_box_nonce');

  $author = get_post_meta($post->ID, '_store_author_value_key', true);
  $price = get_post_meta($post->ID, '_store_price_value_key', true);
  $quantity = get_post_meta($post->ID, '_store_quantity_value_key', true);

  echo '<label for="event_date">Author: </label><br/>';
  echo '<input type="text" id="author" name="author" value="'.esc_attr($author).'" /><br/>';
  echo '<label for="price">Price: </label><br/>';
  echo '<input type="text" id="price" name="price" value="'.esc_attr($price).'"/><br/>';
  echo '<label for="event_end_time">Quantity: </label><br/>';
  echo '<input type="text" id="quantity" name="quantity" value="'.esc_attr($quantity).'"/><br/>';

}

/*
Save Data
===================================================
*/
function speaker_bureau_save_store_data($post_ID) {
  if (!isset($_POST['speaker_bureau_store_meta_box_nonce'])) {
    return;
  }
  if (!wp_verify_nonce($_POST['speaker_bureau_store_meta_box_nonce'], 'speaker_bureau_save_store_data')) {
    return;
  }
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
  }
  if (!current_user_can('edit_post', $post_ID)) {
    return;
  }
  if (!isset($_POST['author']) && !isset($_POST['price'])) {
    return;
  }

  $author = sanitize_text_field($_POST['author']);
  $price = sanitize_text_field($_POST['price']);
  $quantity = sanitize_text_field($_POST['quantity']);

  update_post_meta($post_ID, '_store_author_value_key', $author);
  update_post_meta($post_ID, '_store_price_value_key', $price);
  update_post_meta($post_ID, '_store_quantity_value_key', $quantity);

}

add_action('init', 'speaker_bureau_store_cpt');
add_filter('manage_stores_posts_columns', 'stores_edit_columns');
add_action('manage_stores_posts_custom_column', 'stores_custom_columns', 10, 2);
add_action('add_meta_boxes', 'store_meta_boxes');
add_action('save_post', 'speaker_bureau_save_store_data');


/* shortcode to display events */
function get_events_shortcode($atts) {
  global $post;

  /* get shortcode parameter for daterange (past or current)*/
  extract(shortcode_atts(array(
    'daterange' => 'current',
  ), $atts));
  ob_start();

  /* prepare to get a list of events sorted by the event date */
  $args = array(
    'post_type' => 'events',
    'orderby' => 'event_date',
    'meta_key' => 'event_date',
    'order' => 'ASC'
  );

  query_posts($args);

  $events_found = false;

  /* build up the HTML from the retrieved list of events */
  if (have_posts()) {
    while (have_posts()) {
      the_post();
      $event_date = get_post_meta($post->ID, 'event_date', true);

      switch($daterange) {
        case "current":
          if ($event_date >= time()) {
            echo get_event_container();
            $events_found = true;
          }
          break;

        case "past":
          if ($event_date < time()) {
            echo get_past_event_summary();
            $events_found = true;
          }
          break;
      }
    }
  }
  wp_reset_query();

  if (!$events_found) {
    echo "<p>No events found.</p>";
  }

  $output_string = ob_get_contents();
  ob_end_clean();

  return $output_string;
}

function get_event_container() {
  global $post;
  $ret = '<section class="event_container">
            '.get_event_calender_icon().'
            <section class="event_desc">'.get_event_details(false, true).'</section>
          </section>';
  return $ret;
}

function get_past_event_summary() {
  global $post;
  $ret = '<section class="event_container">
            <h3>'.$post->post_title().'</h3>
            <p>
              <h4>'.get_post_meta($post->ID, 'event_city', true).'</h4>
              <em>'.format_date(get_post_meta($post->ID, 'event_date', true)).'</em>
            </p>
          </section>';
  return $ret;
}

function get_event_calender_icon() {
  global $post;
  $unixtime = get_post_meta($post->ID, 'event_date', true);
  $month = date("M", $unixtime);
  $day = date("d", $unixtime);
  $year = date("Y", $unixtime);
  return '<div class="calender">'.$day.'<em> '.$month.'</em> '.$year.'</div>';
}

function get_event_details($include_register_button, $include_title) {
  global $post;
  $unixtime = get_post_meta($post->ID, 'event_date', true);
  $location_url = get_post_meta($post->ID, 'event_location_url', true);
  $register_url = get_post_meta($post->ID, 'event_register_url', true);

  $ret = '';
  if ($include_title) {
    $ret = $ret.'<h3><a href="'.get_permalink().'">'.$post->post_title.'</a></h3>';
  }

  $ret = $ret. '<p>
                  <h5>'.get_post_meta($post->ID, 'event_location', true).'</h5>
                  '.format_possibly_missing_metadata('event_street')
                  .format_possibly_missing_metadata('event_city').
                '</p>'.date("F j, Y", $unixtime).'<br/>
                <em>
                  '.get_post_meta($post->ID, 'event_start_time', true).' - '.
                  get_post_meta($post->ID, 'event_end_time', true).'
                </em>';

  if (!empty($register_url) && $include_register_button && $unixtime > time()) {
    $ret = $ret.'<a class="event_register" href="'.$register_url.'">register</a>';
  }

  return $ret;
}

function format_possibly_missing_metadata($field_name) {
  global $post;
  $field_value = get_post_meta($post->ID, $field_name, true);

  if (!empty($field_name)) {
    return $field_value.'<br/>';
  }
}

add_shortcode('events', 'get_events_shortcode');
