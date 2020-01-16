<?php
/*
  Template Name: Front Page
*/
 get_header(); ?>

 <!-- Carousel -->
   <div id="demo" class="carousel slide" data-ride="carousel">

       <ul class="carousel-indicators">
         <li data-target="#demo" data-slide-to="0" class="active"></li>
         <li data-target="#demo" data-slide-to="1"></li>
       </ul>
       <div class="carousel-inner">
         <div class="carousel-item active background-image" data-interval="4000" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/mic1.jpg')">
           <div class="main-content">
             <div class="container banner-text-container">
               <div class="row">
                 <div class="col-12">
                   <!-- <h3 class="title-1">The UGSB</h3> -->
                 </div>
                 <div class="col-12">
                   <!-- <p class="title-2">The UGSB sub</p> -->
                 </div>
               </div>
             </div>
           </div>
         </div>
         <div class="carousel-item background-image" data-interval="4000" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/mic2.jpg')">
           <div class="main-content">
             <div class="container banner-text-container">
               <div class="row">
                 <div class="col-12">
                   <!-- <h3 class="title-1">The UGSB</h3> -->
                 </div>
                 <div class="col-12">
                   <!-- <p class="title-2">The UGSB sub</p> -->
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
       <!-- <a class="carousel-control-prev" href="#demo" data-slide="prev">
         <span class="carousel-control-prev-icon"></span>
       </a>
       <a class="carousel-control-next" href="#demo" data-slide="next">
         <span class="carousel-control-next-icon"></span>
       </a> -->

       <div class="overlay-container">
         <div class="overlay"></div>
       </div>

   </div><br>

<!-- Search box -->
 <div class="container search-form-container generic-container">
   <h3>Search for Speakers and Blogs</h3>
   <?php get_search_form(); ?>
 </div><br>

 <!-- Blogs -->
 <div class="container generic-container">
   <h2>Blogs</h2>
   <div class="row text-center">

       <?php
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
                <?php get_template_part('content', 'blog'); ?>
              </div>

            <?php endwhile;

          endif;
          wp_reset_postdata();
        ?>


        <div class="col-md-12 col-xs-12 pt-4">
          <button class="view-all-button" type="button" name="View All Blogs" onclick="window.location.href='<?php echo get_page_link( get_page_by_title( 'blog-archive' ) ); ?>'">All Blogs</button>
        </div>
   </div>
 </div>

 <div class="container generic-container">
   <?php echo do_shortcode('[contact_form]'); ?>
 </div>


<?php get_footer(); ?>
