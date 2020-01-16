<?php get_header(); ?>

<div class="speaker-store-header">
  <?php $event = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ); ?>
  <div class="store-header background-image" style="background-image: url('<?php echo $event;')">
    <div class="container text-light">
      <h2><?php wp_title(' '); ?></h2>
    </div>
  </div>
  <div class="overlay-container">
    <div class="overlay"></div>
  </div>
</div>

<div class="container generic-container">

  <div class="row text-center">

        <?php
        $event = new WP_Query(array('post_type'=>'posts', 'posts_per_page'=>-1));

        if ($event->have_posts()): ?>

        <?php  while ($event->have_posts()): $event->the_post(); ?>
          <div class="col-md-4 col-xs-12">

            <?php get_template_part('content', 'events'); ?>

          </div>

          <?php endwhile; ?>

      <?php  endif;
      ?>

  </div>

</div>
