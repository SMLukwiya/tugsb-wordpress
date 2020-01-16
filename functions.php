<?php

/*
=========================
Theme Support
=========================
*/
function bureau_theme_setup() {

  /* Custom Menu */
  register_nav_menu('primary', 'Primary Header Navigation');
  register_nav_menu('secondary', 'Footer Navigation');
}

add_action('init', 'bureau_theme_setup');

add_theme_support('menu');
add_theme_support('custom-logo');
add_theme_support('custom-background');
add_theme_support('custom-header');
add_theme_support('post-thumbnails');
add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));
add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));

/* Custom background */
$defaults = array(
	'default-color'          => '',
	'default-image'          => '',
	'default-repeat'         => 'no-repeat',
	'default-position-x'     => 'left',
  'default-position-y'     => 'top',
  'default-size'           => 'auto',
	'default-attachment'     => 'scroll',
	'wp-head-callback'       => '_custom_background_cb',
	'admin-head-callback'    => '',
	'admin-preview-callback' => ''
);

/*
=========================
 CUSTOM TERM FUNCTION
=========================
*/
function get_custom_terms($postID, $term) {
  $terms = wp_get_post_terms($postID, $term);
  $output = '';

  $i = 0;
  foreach ($terms as $term) { $i++;
    if($i > 1) { $output .= ', '; }
    // $output .= $term->name;
    $output .= sprintf('<a href="%s">%s</a>',get_term_link($term),$term->name);
  }
  return $output;
}

/*
=========================
 CONTACT RESPONSE
=========================
*/
function contact_form_response($type, $message) {
  global $response;
  if ($type == 'success')
    {$response = "<div class='alert alert-success'>".$message."</div>";}
  else
    {$response = "<div class='alert alert-danger'>".$message."</div>";}

}

/*
================================
 BLOG LOOP CUSTOM TERM FUNCTION
================================
*/
function speakerBureau_posted_meta() {
  $posted_on = human_time_diff(get_the_time('U'), current_time('timestamp')). ' ago';
  $categories = get_the_category();
  $output = '';

  if (!empty($categories)):
    foreach($categories as $category):
      $output .= ' '.esc_html($category->name);
    endforeach;
  endif;

  return '<span class="posted-on">Posted '.$posted_on.'<button class="tag-button" type="button">'.$output.'</button>';
  // return '<span class="posted-on">Posted '.$posted_on.'</span><span class="posted-in"> '.$output.' </span>';
}

function speakerBureau_posted_meta_footer() {
  return '<span>'.get_the_tag_list('<span>', ' ', '</span>').'</span>';
}

/* Get Image Attachment URL */
function speaker_bureau_image_attachment( $num = 1 ) {

  $output = '';
  if (has_post_thumbnail() && $num == 1):
      $output = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
  else:
      $attachments = get_posts(array(
        'post_type' => 'attachment',
        'posts_per_page' => $num,
        'post_parent' => get_the_ID()
      ));
      if ($attachments && $num == 1):
          foreach ($attachments as $attachment):
            $output = wp_get_attachment_url($attachment->ID);
          endforeach;
      elseif ($attachments && $num > 1):
          $output = $attachments;
      endif;

      wp_reset_postdata();

  endif;
  return $output;
}

/* Get Embedded Media */
function speaker_bureau_media_embed($type = array()) {
  $content = do_shortcode( apply_filters('the_content', get_the_content() ));
  $embed = get_media_embedded_in_content($content, $type);

  if( in_array('audio', $type) ):
    $output = str_replace('?visual=true', '?visual=false', $embed[0]);
  else:
    $output = $embed[0];
  endif;

  return $output;
}

require_once get_template_directory().'/inc/class-wp-bootstrap-navwalker.php';
require get_template_directory().'/inc/cleanup.php';
require get_template_directory().'/inc/custom-post-type.php';
require get_template_directory().'/inc/custom-taxonomy-types.php';
require get_template_directory().'/inc/shortcodes.php';
require get_template_directory().'/inc/function-admin.php';
require get_template_directory().'/inc/enqueue.php';
require get_template_directory().'/inc/theme-support.php';
require get_template_directory().'/inc/ajax.php';
