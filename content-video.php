<?php
/*
@package speakerBureautheme
--Video Post Format
*/
 ?>

 <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
   <header class="speaker-video-header">
     <span class="speaker-video-title"><?php the_title() ?></span>
     <span class="speaker-video-meta">
       <?php echo speakerBureau_posted_meta(); ?>
     </span>
   </header>

   <div class="speaker-video-content">
     <?php
        echo speaker_bureau_media_embed(array('video', 'iframe'));
        ?>
   </div>

 </article>
