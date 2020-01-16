<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>

  <div class="row search-item">

    <div class="col-3">
      <?php if( has_post_thumbnail()): ?>
          <?php the_post_thumbnail(); ?>
      <?php endif; ?>
    </div>

    <div class="col-9">
      <h5><?php the_title(); ?></h5>
      <button class="tag-button" type="button" name="tags"><?php echo get_custom_terms(get_the_ID(), 'speaker_type'); ?></button>
      <?php the_excerpt(); ?>
    </div>
  </div>

  <hr>

</article>
