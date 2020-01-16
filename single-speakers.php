<?php get_header(); ?>

      <?php

        $thecatchphrase = get_post_meta($post->ID, '_catch_phrase_value_key', true);
        $post_slug = get_post_field( 'post_name' );

        if( have_posts()):
          while(have_posts()): the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

              <?php if( has_post_thumbnail()): ?>

                <div class="speaker-store-header">

                  <div class="store-header background-image" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/speaker-background.png')">

                    <div class="single-speaker-header">
                      <?php the_post_thumbnail(); ?>
                      <div class="single-speaker-header-words pt-5">
                        <h5 class="speaker-title"><?php the_title(); ?></h5>
                        <h4 class="speaker-type"><?php echo get_custom_terms(get_the_ID(), 'speaker_type'); ?></h4>
                        <h4 class="speaker-catch-phrase"> <?php echo $thecatchphrase; ?></h4>
                      </div>

                    </div>

                  </div>

                  <div class="overlay-container">
                    <div class="overlay"></div>
                  </div>
                </div>

                <div class="container speaker-content generic-container">
                  <div class="row">
                    <div class="col-md-12 col-xs-12">
                      <?php the_content(); ?>
                    </div>
                  </div>

                </div>

                <div class="container">

                  <div class="text-left col-md-12 col-xs-12">
                    <h5>Read Blogs</h5>
                  </div>

                  <div class="row">
                    <?php

                       $lastBlog = new WP_Query(array(
                                  'post_type'=>'post',
                                  'posts_per_page'=>3,
                                  'tag' => $post_slug,
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

                       <?php else: ?>
                          <div class="col-12">
                            No current blogs by this speaker
                          </div>

                       <?php endif;
                          wp_reset_postdata();

                     ?>
                  </div>


                </div>


              <?php endif; ?>

            </article>

          <?php endwhile;

        endif;
        ?>

    <div class="container generic-container">
      <?php echo do_shortcode('[contact_form]'); ?>
    </div>

<?php get_footer(); ?>
