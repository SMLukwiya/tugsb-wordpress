<?php get_header(); ?>

<div class="speaker-store-header">
  <?php $event = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ); ?>
  <div class="store-header background-image" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/eventdup.jpg')">
    <div class="container banner-text-container speaker-title">
      <h1><?php wp_title(' '); ?></h1>
    </div>
  </div>
  <div class="overlay-container">
    <div class="overlay"></div>
  </div>
</div>

<div class="container generic-container">
  <div class="mb-4">
    <h3>Please register to attend upcoming events</h3>
  </div>

  <div class="row text-center">

        <?php
        $event = new WP_Query(array('post_type'=>'events', 'posts_per_page'=>6));

        if ($event->have_posts()): ?>

        <?php  while ($event->have_posts()): $event->the_post(); ?>
          <div class="col-lg-6 col-xs-12">

            <?php get_template_part('content', 'events'); ?>

          </div>

          <?php endwhile; ?>

      <?php  endif;
      ?>

  </div>

</div>

<?php get_footer(); ?>
