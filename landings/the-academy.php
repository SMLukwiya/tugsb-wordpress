<?php
/*
  Template Name: Academy Landing Page
*/
get_header(); ?>
<div class="speaker-store-header">
  <?php $url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ); ?>
  <div class="store-header background-image"  alt="" style="background-image: url('<?php echo $url; ?>')">
  </div>
  <div class="overlay-container">
    <div class="overlay"></div>
  </div>
</div>

<div class="container generic-container">
  <h3>The Academy</h13>
</div>


 <?php
get_footer();
  ?>
