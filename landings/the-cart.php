<?php
/*
  Template Name: The Cart Page
*/
get_header(); ?>

<div class="container">
  <?php echo do_shortcode('[woocommerce_cart]'); ?>
</div>

<?php get_footer(); ?>
