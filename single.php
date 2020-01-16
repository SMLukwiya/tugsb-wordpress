<?php get_header(); ?>

          <?php
            if( have_posts()):
              while(have_posts()): the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                  <?php if( has_post_thumbnail()): ?>

                    <div class="speaker-store-header">
                      <?php $url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ); ?>
                      <div class="store-header background-image" style="background-image: url('<?php echo $url; ?>')">
                        <div class="container">
                          <h1 class="text-dark" style="padding-top: 150px;">
                            <?php wp_title(' '); ?>
                          </h1>
                        </div>
                      </div>
                      <div class="overlay-container">
                        <div class="overlay"></div>
                      </div>
                    </div>

                    <div class="container generic-container">
                      <div class="row">
                        <div class="col-md-12 col-xs-12 pt-4">
                          <button class="tag-button" type="button" name="tags"><?php the_category(' '); ?></button>
                          <small>Posted <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')). ' ago'; ?></small>
                        </div>

                        <div class="col-md-12 col-xs-12">
                          <?php the_content(); ?>
                        </div>

                        <div class="col-md-12 col-xs-12 speaker-share-icons">
                          <?php
                            $title = get_the_title();
                            $permalink = get_permalink();

                            $twitterHandler = ( get_option('twitterusername') ? '&amp;via='.esc_attr( get_option('twitterusername')) : '' );

                            $twitter = 'https://twitter.com/intent/tweet?text='.$title.'&amp;url='.$permalink.$twitterHandler.'';
                            $facebook = 'https://www.facebook.com/sharer/sharer.php?u='.$permalink;
                            $google = 'https://plus.google.com/share?url='.$permalink;

                           ?>
                           <ul class="share-icons">
                             <li> <a href="<?php echo $twitter; ?>" target="_blank"> <span class="fa fa-twitter-square" rel="nofollow"></span> </a> </li>
                             <li> <a href="<?php echo $facebook; ?>" target="_blank"> <span class="fa fa-facebook-square" rel="nofollow"></span> </a> </li>
                           </ul>
                        </div>
                      </div>
                    </div>
                  <?php endif; ?>



                </article>

              <?php endwhile;

            endif;
            ?>


<?php get_footer(); ?>
