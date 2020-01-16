<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <div class="row">
    <?php if(has_post_thumbnail()): ?>

        <div class="col-xs-12 col text-left">
          <div class="content-header">
            <?php the_title(sprintf('<h1 class="entry-title"><a href="%s">', esc_url(get_permalink())),'</a></h1>'); ?>
            <small>Posted on: <?php the_time('F j,Y'); ?> at <?php the_time('g:i a'); ?>, in <?php the_category(); ?></small>
          </div>
          <div>
            <?php the_excerpt(); ?>
          </div>
        </div>

        <div class="col-xs-12 col">
          <div class="thumbnail">
            <?php the_post_thumbnail('medium'); ?>
          </div>
        </div>

      <?php else: ?>
        <div class="col-xs-12">
          <?php the_excerpt(); ?>
        </div>
      <?php endif; ?>

  </div>

</article>
