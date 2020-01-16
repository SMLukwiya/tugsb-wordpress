<?php
/*
  Template Name: Speakers Landing Page
*/
get_header(); ?>

<div class="speaker-store-header">
  <?php $url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ); ?>
  <div class="store-header background-image" style="background-image: url('<?php echo $url; ?>')">
    <div class="container banner-text-container">
      <h1 class="speaker-title">
        Speakers
      </h1>
    </div>
  </div>
  <div class="overlay-container">
    <div class="overlay"></div>
  </div>
</div>

<!-- Search box -->
 <div class="container search-form-container generic-container">
   <h3>Search for Speakers</h3>
   <?php get_search_form(); ?>
 </div><br>

<!-- Speakers -->
<div class="container generic-container" id="accordion">

  <div class="button-container" id="content-collapse">
    <span class="content-collapse">
      <button type="button" class="button-item" data-toggle="collapse" data-target="#categoryone" aria-expanded="true" aria-controls="categoryone">Leadership</button>
    </span>
    <span class="content-collapse">
      <button type="button" class="button-item collapsed" data-toggle="collapse" data-target="#categorytwo" aria-expanded="false" aria-controls="categorytwo">Motivation</button>
    </span>
    <span class="content-collapse">
      <button type="button" class="button-item collapsed" data-toggle="collapse" data-target="#categorythree" aria-expanded="false" aria-controls="categorythree">Entertainment</button>
    </span>
    <span class="content-collapse">
      <button type="button" class="button-item collapsed" data-toggle="collapse" data-target="#categoryfour" arai-expanded="false" aria-controls="categoryfour">Political</button>
    </span>
  </div>


  <div class="collapse show" id="categoryone" data-parent="#accordion">
    <?php $terms = get_term(10, 'speaker_type'); ?>
    <h1><?php echo ucwords($terms->slug); ?></h1>

    <div class="row">
          <?php
          $args = array(
            'post_type'=>'speakers',
            'post_per_page' => 6,
            'tax_query' => array(
              array(
                  'taxonomy' => 'speaker_type',
                  'field' => 'slug',
                  'terms' => 'leadership'
              )
            )
          );
          $event = new WP_Query($args);
          if ( $event->have_posts() ): ?>

          <?php  while ($event->have_posts()): $event->the_post(); ?>
            <div class="col-md-4 col-12">

              <?php get_template_part('content', 'speakers'); ?>

            </div>

            <?php endwhile; ?>

        <?php  endif;
        ?>
    </div>
  </div>

  <div class="collapse" id="categorytwo" data-parent="#accordion">
    <?php $terms = get_term(12, 'speaker_type'); ?>
    <h1><?php echo ucwords($terms->slug); ?></h1>

    <div class="row">
          <?php
          $args = array(
            'post_type'=>'speakers',
            'post_per_page' => 6,
            'tax_query' => array(
              array(
                  'taxonomy' => 'speaker_type',
                  'field' => 'slug',
                  'terms' => 'motivational'
              )
            )
          );
          $event = new WP_Query($args);
          if ( $event->have_posts() ): ?>

          <?php  while ($event->have_posts()): $event->the_post(); ?>
            <div class="col-md-4 col-12">

              <?php get_template_part('content', 'speakers'); ?>

            </div>

            <?php endwhile; ?>

        <?php  endif;
        ?>
    </div>
  </div>

  <div class="collapse" id="categorythree" data-parent="#accordion">
    <?php $terms = get_term(15, 'speaker_type'); ?>
    <h1><?php echo ucwords($terms->slug); ?></h1>

    <div class="row">
          <?php
          $args = array(
            'post_type'=>'speakers',
            'post_per_page' => 6,
            'tax_query' => array(
              array(
                  'taxonomy' => 'speaker_type',
                  'field' => 'slug',
                  'terms' => 'entertainment'
              )
            )
          );
          $event = new WP_Query($args);
          if ( $event->have_posts() ): ?>

          <?php  while ($event->have_posts()): $event->the_post(); ?>
            <div class="col-md-4 col-12">

              <?php get_template_part('content', 'speakers'); ?>

            </div>

            <?php endwhile; ?>

        <?php  endif;
        ?>
    </div>
  </div>


  <div class="collapse" id="categoryfour" data-parent="#accordion">
    <?php $terms = get_term(13, 'speaker_type'); ?>
    <h1><?php echo ucwords($terms->slug); ?></h1>

    <div class="row">
          <?php
          $args = array(
            'post_type'=>'speakers',
            'post_per_page' => 6,
            'tax_query' => array(
              array(
                  'taxonomy' => 'speaker_type',
                  'field' => 'slug',
                  'terms' => 'political'
              )
            )
          );
          $event = new WP_Query($args);
          if ( $event->have_posts() ): ?>

          <?php  while ($event->have_posts()): $event->the_post(); ?>
            <div class="col-md-4 col-12">

              <?php get_template_part('content', 'speakers'); ?>

            </div>

            <?php endwhile; ?>

        <?php  endif;
        ?>
    </div>
  </div>

  <!-- <div class="col-md-12 col-xs-12 text-center pt-4">
    <button class="view-all-button" type="button" name="View All Blogs">All Speakers</button>
  </div> -->

</div>


 <?php get_footer(); ?>
