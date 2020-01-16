<?php
/*
@package speakerBureautheme
--Gallery Post Format
*/
 ?>

 <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
   <header class="speaker-gallery-header">
     <span class="speaker-gallery-title"><?php the_title() ?></span>
     <?php
        if(speaker_bureau_image_attachment()):
          $attachments = speaker_bureau_image_attachment(8);
      ?>

      <div id="post-gallery-<?php the_ID(); ?>" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
          <?php
              $i = 0;
              foreach($attachments as $attachment):
                $active = ($i == 0 ? ' active ' : '');
          ?>
              <div class="carousel-item <?php echo $active; ?>">
                <img class="d-block w-100 background-image" src="<?php echo wp_get_attachment_url($attachment->ID); ?>" alt="" style="height: 500px;">
                <div class="carousel-caption d-none d-md-block">
                  <h5><?php echo $attachment->post_excerpt; ?></h5>
                </div>
              </div>
          <?php $i++; endforeach; ?>
        </div>

        <a class="carousel-control-prev" href="#post-gallery-<?php the_ID(); ?>" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#post-gallery-<?php the_ID(); ?>" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>

    <?php endif; ?>

     <span class="speaker-gallery-meta">
       <?php echo speakerBureau_posted_meta(); ?>
     </span>
   </header>

 </article>
