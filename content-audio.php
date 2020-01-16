<?php
/*
@package speakerBureautheme
--Audio Post Format
*/
 ?>

 <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
   <header class="speaker-audio-header">
     <span class="speaker-audio-title"><?php the_title() ?></span>
     <span class="speaker-audio-meta">
       <?php echo speakerBureau_posted_meta(); ?>
     </span>
   </header>

   <div class="speaker-audio-content">
     <?php
        echo speaker_bureau_media_embed(array('audio', 'iframe'));
        ?>
   </div>

 </article>
