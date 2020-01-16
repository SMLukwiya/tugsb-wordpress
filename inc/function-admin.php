<?php

/*

@package speakerBureautheme
  =============
    ADMIN PAGE
  =============
*/

function speaker_bureau_add_admin_page() {
  /* Generate Admin Page */
  add_menu_page('Speaker Bureau Theme Options', 'Profile', 'manage_options', 'speaker_bureau', 'speaker_bureau_theme_create_page', 'dashicons-admin-users', 100);

  /* Activate Custom Settings */
  add_action('admin_init', 'speaker_bureau_custom_settings');

}

function speaker_bureau_theme_create_page() {
  /* Generate Admin Page */
  require_once get_template_directory().'/inc/templates/speaker-bureau-admin.php';

}

function speaker_bureau_custom_settings() {
  /* Theme Support */
  register_setting('bureau-settings-group', 'post_formats');
  register_setting('bureau-settings-group', 'custom_header');
  register_setting('bureau-settings-group', 'custom_background');

  /* Custom CSS */
  register_setting('bureau-settings-group', 'customcss');

  /* Name */
  register_setting('bureau-settings-group', 'first_name');
  register_setting('bureau-settings-group', 'last_name');
  register_setting('bureau-settings-group', 'username');
  register_setting('bureau-settings-group', 'nickname');

  /* Contact */
  register_setting('bureau-settings-group', 'email');
  register_setting('bureau-settings-group', 'Website');
  register_setting('bureau-settings-group', 'facebookurl');
  register_setting('bureau-settings-group', 'instagramurl');
  register_setting('bureau-settings-group', 'linkedinurl');
  register_setting('bureau-settings-group', 'myspaceurl');
  register_setting('bureau-settings-group', 'pinteresturl');
  register_setting('bureau-settings-group', 'soundcloud');
  register_setting('bureau-settings-group', 'tumblrurl');
  register_setting('bureau-settings-group', 'twitterusername', 'sanitize_twitter_handler');
  register_setting('bureau-settings-group', 'youtubeurl');
  register_setting('bureau-settings-group', 'wikipedia');

  /* About Yourself */
  register_setting('bureau-settings-group', 'aboutyourself');
  register_setting('bureau-settings-group', 'profilepic');

  /* Sections */
  add_settings_section('bureau-theme-support', 'Theme Support', 'bureau_theme_options', 'speaker_bureau');
  add_settings_section('bureau-custom-css', 'Custom CSS', 'bureau_custom_css', 'speaker_bureau');
  add_settings_section('bureau-profile-options', 'Name', 'bureau_profile_option', 'speaker_bureau');
  add_settings_section('bureau-profile-contact-info', 'Contact Info', 'bureau_profile_contact_info', 'speaker_bureau');
  add_settings_section('bureau-profile-about', 'About Yourself', 'bureau_profile_about', 'speaker_bureau');

  /* Name Fields */
  add_settings_field('profile-first-name', 'First Name', 'bureau_profile_first_name', 'speaker_bureau', 'bureau-profile-options');
  add_settings_field('profile-last-name', 'Last Name', 'bureau_profile_last_name', 'speaker_bureau', 'bureau-profile-options');
  add_settings_field('profile-username', 'Username', 'bureau_profile_username', 'speaker_bureau', 'bureau-profile-options');
  add_settings_field('profile-nickname', 'Nickname', 'bureau_profile_nickname', 'speaker_bureau', 'bureau-profile-options');

  /* Contact Fields */
  add_settings_field('profile-email', 'Email', 'bureau_profile_email', 'speaker_bureau', 'bureau-profile-contact-info');
  add_settings_field('profile-website', 'Website', 'bureau_profile_website', 'speaker_bureau', 'bureau-profile-contact-info');
  add_settings_field('profile-facebook', 'Facebook Url', 'bureau_profile_facebookurl', 'speaker_bureau', 'bureau-profile-contact-info');
  add_settings_field('profile-twitter', 'Twitter Handler', 'bureau_profile_twitterurl', 'speaker_bureau', 'bureau-profile-contact-info');
  add_settings_field('profile-instagram', 'Instagram Url', 'bureau_profile_instagramurl', 'speaker_bureau', 'bureau-profile-contact-info');
  add_settings_field('profile-linkedin', 'LinkedIn Url', 'bureau_profile_linkedinurl', 'speaker_bureau', 'bureau-profile-contact-info');
  add_settings_field('profile-myspace', 'My Space Url', 'bureau_profile_myspaceurl', 'speaker_bureau', 'bureau-profile-contact-info');
  add_settings_field('profile-pinterest', 'Pinterest Url', 'bureau_profile_pinteresturl', 'speaker_bureau', 'bureau-profile-contact-info');
  add_settings_field('profile-soundcloud', 'Sound Cloud Url', 'bureau_profile_soundcloudurl', 'speaker_bureau', 'bureau-profile-contact-info');
  add_settings_field('profile-timblr', 'Tumblr Url', 'bureau_profile_tumblrurl', 'speaker_bureau', 'bureau-profile-contact-info');
  add_settings_field('profile-youtube', 'Youtube Url', 'bureau_profile_youtubeurl', 'speaker_bureau', 'bureau-profile-contact-info');
  add_settings_field('profile-wikipedia', 'Wikipedia', 'bureau_profile_wikipedia', 'speaker_bureau', 'bureau-profile-contact-info');

  /* About Fields */
  add_settings_field('profile-about', 'Biographical Info', 'bureau_profile_bioinfo', 'speaker_bureau', 'bureau-profile-about');
  add_settings_field('profile-pic', 'Profile Picture', 'bureau_profile_profilepic', 'speaker_bureau', 'bureau-profile-about');

  /* Theme Support */
  add_settings_field('post-formats', 'Post Formats', 'bureau_theme_post_formats', 'speaker_bureau', 'bureau-theme-support');
  add_settings_field('custom-header', 'Custom Header', 'bureau_theme_custom_header', 'speaker_bureau', 'bureau-theme-support');
  add_settings_field('custom-background', 'Custom Background', 'bureau_theme_custom_background', 'speaker_bureau', 'bureau-theme-support');

  /* Custom CSS */
  add_settings_field('custom-css', 'Custom CSS', 'bureau_theme_custom_css', 'speaker_bureau', 'bureau-theme-support');

}

/* Sections Callback functions */
function bureau_theme_options() {
  echo 'Activate and Deactivate';
}

function bureau_profile_option() {
  return;
}
function bureau_profile_contact_info() {
  return;
}
function bureau_profile_about() {
  return;
}

function bureau_custom_css() {
  return;
}

/* Profile Section Functions */
function bureau_profile_first_name() {
  $firstname = esc_attr(get_option('first_name'));
  echo '<input type="text" name="first_name" size="50" value="'.$firstname.'" />';
}

function bureau_profile_last_name() {
  $lastname = esc_attr(get_option('last_name'));
  echo '<input type="text" name="last_name" size="50" value="'.$lastname.'" />';
}

function bureau_profile_username() {
  $username = esc_attr(get_option('username'));
  echo '<input type="text" name="username" size="50" value="'.$username.'" />';
}

function bureau_profile_nickname() {
  $nickname = esc_attr(get_option('nickname'));
  echo '<input type="text" name="nickname" size="50" value="'.$nickname.'" />';
}

function bureau_profile_email() {
  $email = esc_attr(get_option('email'));
  echo '<input type="email" name="nickname" size="50" value="'.$email.'" />';
}

function bureau_profile_website() {
  $website = esc_attr(get_option('website'));
  echo '<input type="text" name="website" size="50" value="'.$website.'" />';
}

function bureau_profile_facebookurl() {
  $facebook = esc_attr(get_option('facebookurl'));
  echo '<input type="text" name="website" size="50" value="'.$facebook.'" />';
}

function bureau_profile_twitterurl() {
  $twitter = esc_attr(get_option('twitterusername'));
  echo '<input type="text" name="website" size="50" value="'.$twitter.'" />';
}

function bureau_profile_instagramurl() {
  $instagram = esc_attr(get_option('instagramurl'));
  echo '<input type="text" name="website" size="50" value="'.$instagram.'" />';
}

function bureau_profile_linkedinurl() {
  $linkedin = esc_attr(get_option('linkedinurl'));
  echo '<input type="text" name="website" size="50" value="'.$linkedin.'" />';
}

function bureau_profile_myspaceurl() {
  $myspace = esc_attr(get_option('myspaceurl'));
  echo '<input type="text" name="website" size="50" value="'.$myspace.'" />';
}

function bureau_profile_pinteresturl() {
  $pinterest = esc_attr(get_option('pinteresturl'));
  echo '<input type="text" name="website" size="50" value="'.$pinterest.'" />';
}

function bureau_profile_soundcloudurl() {
  $soundcloud = esc_attr(get_option('soundcloud'));
  echo '<input type="text" name="website" size="50" value="'.$soundcloud.'" />';
}

function bureau_profile_tumblrurl() {
  $tumblr = esc_attr(get_option('tumblrurl'));
  echo '<input type="text" name="website" size="50" value="'.$tumblr.'" />';
}

function bureau_profile_youtubeurl() {
  $youtube = esc_attr(get_option('youtubeurl'));
  echo '<input type="text" name="website" size="50" value="'.$youtube.'" />';
}

function bureau_profile_wikipedia() {
  $wikipedia = esc_attr(get_option('wikipedia'));
  echo '<input type="text" name="website" size="50" value="'.$wikipedia.'" />';
}

function bureau_profile_bioinfo() {
  $bioinfo = esc_attr(get_option('aboutyourself'));
  echo '<textarea row="4" name="aboutyourself" cols="70">'.$bioinfo.'</textarea>';
}

function bureau_profile_profilepic() {
  $profile = esc_attr(get_option('profilepic'));
  if( empty($profile)) {
      echo '<input type="button" class="button button-secondary" value="Upload Profile Picture" id="upload-button" /> <input type="hidden" id="profile-pic" name="profilepic" value=""/>';
  } else {
    echo '<input type="button" class="button button-secondary" value="Replace Profile Picture" id="upload-button" /> <input type="hidden" id="profile-pic" name="profilepic" value="'.$profile.'"/> <input type="button" class="button button-secondary" value="Remove" id="remove-picture"/>';
  }
}

/* Sanitize Fields */
function sanitize_twitter_handler($input) {
  $output = sanitize_text_field($input);
  $output = str_replace('@', '', $output);
  return $output;
}

/* Theme Support Section Functions */
function bureau_theme_post_formats() {
  $options = get_option('post_formats');
  $formats = array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat');
  $output = '';
  foreach( $formats as $format ) {
    $checked = (@$options[$format] == 1 ? 'checked' : '');
    $output .= '<label><input type="checkbox" id="'.$format.'" name="post_formats['.$format.']" value="1" '.$checked.' /> '.$format.'</label><br/>';
  }
  echo $output;
}

function bureau_theme_custom_header() {
  $options = get_option('custom_header');
  $output = '';
  $checked = (@$options == 1 ? 'checked' : '');
  $output .= '<label><input type="checkbox" id="custom_header" name="custom_header" value="1" '.$checked.' />Activate the Custom Header</label>';
  echo $output;
}

function bureau_theme_custom_background() {
  $options = get_option('custom_background');
  $output = '';
  $checked = (@$options == 1 ? 'checked' : '');
  $output .= '<label><input type="checkbox" id="custom_background" name="custom_background" value="1" '.$checked.' />Activate the Custom Background</label>';
  echo $output;
}

/* Custom CSS Functions */
function bureau_theme_custom_css() {
  $css = get_option('customcss');
  $css = (empty($css) ? '/* Speaker Bureau Theme Custom CSS */' : $css);
  echo '<div id="customCss" >'.$css.'</div>';
}

add_action('admin_menu', 'speaker_bureau_add_admin_page');
