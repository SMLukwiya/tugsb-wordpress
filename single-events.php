<?php get_header(); ?>

  <div class="container">

    <?php

      $unixtime = get_post_meta($post->ID, '_event_date_value_key', true);
      $location_url = get_post_meta($post->ID, '_event_location_url_key', true);
      $eventCity = get_post_meta($post->ID, '_event_city_value_key', true);
      $eventStart = get_post_meta($post->ID, '_event_start_time_value_key', true);
      $eventEnd = get_post_meta($post->ID, '_event_end_time_value_key', true);
      $register_url = get_post_meta($post->ID, '_event_register_url_value_key', true);
      $location = get_post_meta($post->ID, '_event_location_value_key', true);

      $month = date("M", $unixtime);
      $day = date("d", $unixtime);
      $year = date("Y", $unixtime);

      if(have_posts()):
        while(have_posts()):
          the_post();
    ?>
        <article id="event-<?php the_ID(); ?>" <?php post_class(); ?>>

          <?php if( has_post_thumbnail()): ?>

            <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="imageevent generic-container">
                  <?php the_post_thumbnail('medium'); ?>
                  <div class="imageevent-desc text-left">
                    <h5><?php the_title(); ?></h5>
                    <?php echo '<div class="calender">'.$day.'<em> '.$month.'</em> '.$year.'</div>'; ?>
                  </div>
                </div>

              </div>

            <?php endif; ?>

            <div class="col-sm-12">
              <div class="event_container">

                <section class="event_desc">
                  <?php the_content(); ?>
                  <h3><?php echo $location; ?></h3>
                  <h4><?php echo $eventCity; ?></h4>

                  <?php
                  if (!empty($register_url) && $unixtime > time()) {
                    echo $ret = $ret.'<a class="event_register" href="'.$register_url.'">Register here to attend this event</a>';
                  }
                   ?>
                </section>
              </div>
            </div>

          <?php endwhile; ?>

              <div class="col-lg-6 col-xs-6 text-left">
                <?php previous_posts_link('next'); ?>
              </div>
              <div class="col-lg-6 col-xs-6 text-right">
                <?php next_posts_link('previous'); ?>
              </div>

            </div>

        </article>

      <?php endif; ?>
  </div>



<?php get_footer(); ?>
