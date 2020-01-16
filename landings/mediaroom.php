<?php
/*
  Template Name: Media Room Page Landing
*/
 get_header(); ?>

 <div class="speaker-store-header">
   <?php $url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ); ?>
   <div class="store-header background-image" style="background-image: url('<?php echo $url; ?>')">
   </div>
   <div class="overlay-container">
     <div class="overlay"></div>
   </div>
 </div>

<div class="container generic-container">

<!-- Blog Post Format -->

  <div class="row text-center generic-container speaker-blog-container">
    <div class="text-left col-md-12 col-xs-12">
      <h3>Blogs</h3>
    </div>
    <?php
       $currentPage = (get_query_var('paged')) ? get_query_var('paged') : 1;
       $lastBlog = new WP_Query(array(
                  'post_type'=>'post',
                  'posts_per_page'=>6,
                  'paged'=>$currentPage,
                  'tax_query' => array(
                    array(
                      'taxonomy' => 'post_format',
                      'field' => 'slug',
                      'terms' => array('post-format-audio', 'post-format-video', 'post-format-gallery', 'post-format-aside', 'post-format-image', 'post-format-link', 'post-format-quote', 'post-format-chat'),
                      'operator' => 'NOT IN'
                    )
                  )));

       if ($lastBlog->have_posts()):

         while ($lastBlog->have_posts()): $lastBlog->the_post(); ?>

           <div class="col-lg-4 col-xs-12">
             <?php get_template_part('content',   get_post_format()); ?>
           </div>

         <?php endwhile; ?>

       <?php endif;
       wp_reset_postdata();
     ?>

     <div class="col-md-12 col-xs-12 pt-4">
       <button class="view-all-button" type="button" name="View All Blogs" onclick="window.location.href='<?php echo get_page_link( get_page_by_title( 'blog-archive' ) ); ?>'">All Blogs</button>
     </div>
  </div>

<!-- Audio Post Format -->
  <div class="row generic-container speaker-audio-container">
    <div class="col-md-12 col-xs-12">
      <h3>Listen to your favorite speakers</h3>
    </div>

        <?php
        $args1 = array(
          'post_type'=>'post',
          'post_per_page' => 2,
          'tax_query' => array(
            array(
                'taxonomy' => 'post_format',
                'field' => 'slug',
                'terms' => 'post-format-audio',
            )
          )
        );
        $audio = new WP_Query($args1);
        if ($audio->have_posts()): ?>

        <?php  while ($audio->have_posts()): $audio->the_post(); ?>
          <div class="col-xs-12 col-md-12">

            <?php get_template_part('content', get_post_format()); ?>

          </div>

          <?php endwhile; ?>

      <?php  endif;
      ?>
  </div>

<!-- Video Post Format -->
  <div class="row text-center generic-container speaker-video-container">
    <div class="text-left col-md-12 col-xs-12">
      <h3>Watch Speakers</h3>
    </div>
    <?php
       $currentPage = (get_query_var('paged')) ? get_query_var('paged') : 1;
       $video = new WP_Query(array(
                  'post_type'=>'post',
                  'posts_per_page'=>2,
                  'paged'=>$currentPage,
                  'tax_query' => array(
                    array(
                      'taxonomy' => 'post_format',
                      'field' => 'slug',
                      'terms' => 'post-format-video'
                    )
                  )));

       if ($video->have_posts()):

         while ($video->have_posts()): $video->the_post(); ?>

           <div class="col-md-6 col-xs-12">
             <div class="embed-responsive-item embed-responsive embed-responsive-16by9">
               <?php get_template_part('content',   get_post_format()); ?>
             </div>

           </div>

         <?php endwhile; ?>

         <!-- <div class="col-md-12 col-xs-12">
           <?php echo paginate_links(array(
             'total' => $lastBlog->max_num_pages
           )); ?>
         </div> -->

       <?php endif;
       wp_reset_postdata();
     ?>
  </div>

  <!-- Gallery Post Format -->
    <div class="row generic-container speaker-gallery-container">
      <div class="col-md-12 col-xs-12">
        <h3>Gallery</h3>
      </div>

      <?php
         $currentPage = (get_query_var('paged')) ? get_query_var('paged') : 1;
         $gallery = new WP_Query(array(
                    'post_type'=>'post',
                    'posts_per_page'=>1,
                    'paged'=>$currentPage,
                    'tax_query' => array(
                      array(
                        'taxonomy' => 'post_format',
                        'field' => 'slug',
                        'terms' => 'post-format-gallery'
                      )
                    )));

         if ($gallery->have_posts()):

           while ($gallery->have_posts()): $gallery->the_post(); ?>

             <div class="col-md-12 col-xs-12">
               <div class="gallery-container">
                 <?php get_template_part('content',   get_post_format()); ?>
               </div>

             </div>

           <?php endwhile; ?>

         <?php endif;
         wp_reset_postdata();
       ?>
    </div>

</div>

<?php get_footer(); ?>
