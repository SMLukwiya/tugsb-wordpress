<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php if(has_post_thumbnail()): ?>

      <div class="speaker-card">
        <div class="speaker-card-header">
          <?php the_post_thumbnail(); ?>
          <span class="speaker-name"><?php the_title(); ?></span>
          <span class="speaker-category"><?php echo get_custom_terms(get_the_ID(), 'speaker_type'); ?></span>
        </div>
          <div class="divider-line"></div>
        <div class="speaker-booking">
          <button type="button" class="speaker-button" onclick="window.location.href='<?php echo get_post_permalink(); ?>'">Book Speaker</i></button>
        </div>
      </div>

    <?php else: ?>
        <div class="">
          <h1>No image</h1>
        </div>

    <?php endif; ?>



</article>
