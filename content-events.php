<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <div class="row">
    <?php
        $unixtime = get_post_meta($post->ID, '_event_date_value_key', true);
        $location_url = get_post_meta($post->ID, 'event_location_url', true);
        $register_url = get_post_meta($post->ID, 'event_register_url', true);
        $location = get_post_meta($post->ID, '_event_location_value_key', true);

        $events_found = false;
     ?>

    <div class="col-xs-12 col-sm-12">

      <div class="imagebox">
        <a href="<?php echo get_post_permalink(); ?>">
          <?php the_post_thumbnail('medium'); ?>
          <span class="imagebox-desc text-right">
            <h5><?php the_title(); ?></h5>
            <h5><?php echo $location; ?></h5>
            <em><?php echo date("F j, Y", $unixtime); ?></em>
          </span>
        </a>
      </div>


    </div>
  </div>

</article>
