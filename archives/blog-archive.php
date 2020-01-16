<?php
/*
  Template Name: Archive Blog
*/
 get_header(); ?>

 <div class="speaker-store-header">
   <?php $url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ); ?>
   <div class="store-header background-image" style="background-image: url('<?php echo $url; ?>')">
     <div class="container text-light">
       <h2><?php wp_title(' '); ?></h2>
     </div>
   </div>
   <div class="overlay-container">
     <div class="overlay"></div>
   </div>
 </div>

 <div class="container generic-container">

   <div class="row text-center">

       <?php
       $lastBlog = new WP_Query(array(
                  'post_type'=>'post',
                  'posts_per_page'=>9,
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
                <?php get_template_part('content', 'blog'); ?>
              </div>

            <?php endwhile; ?>

            <div class="col-md-12 col-xs-12 pagination generic-container text-right">
              <?php echo paginate_links(array(
                'prev_text' => __('«'),
                'next_text' => __('»'),
                'total' => $lastBlog->max_num_pages
              )); ?>
            </div>

          <?php endif;
          wp_reset_postdata();
        ?>

   </div>

 </div>

 <?php get_footer(); ?>
