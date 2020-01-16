<?php get_header(); ?>

  <div class="container generic-container">
    <h4>Showing search results for '<?php echo get_search_query(); ?>'</h4>
        <?php
          if(have_posts()):
            while(have_posts()): the_post(); ?>

              <?php get_template_part('content', 'search'); ?>

            <?php endwhile;?>

            <div class="col-md-12 col-xs-12 pagination generic-container text-right">
              <?php echo paginate_links(array(
                'prev_text' => __('«'),
                'next_text' => __('»'),
                // 'total' => $lastBlog->max_num_pages
              )); ?>
            </div>
            
          <?php endif; ?>

  </div>

<?php get_footer(); ?>
