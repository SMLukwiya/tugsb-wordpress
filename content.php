<?php
/*
@package speakerBureautheme
Standard Post Format
*/
 ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

      <div class="imagebox">
        <a href="<?php echo get_post_permalink(); ?>">
          <?php the_post_thumbnail('medium'); ?>
          <span class="imagebox-desc text-left">
            <h5><?php the_title(); ?></h5>
            <small><?php echo speakerBureau_posted_meta(); ?></small>
            <p><?php the_excerpt(); ?></p>
            <small class="footer-meta"><?php echo speakerBureau_posted_meta_footer(); ?></small>
          </span>
        </a>
      </div>

</article>
