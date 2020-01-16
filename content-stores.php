<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php if(has_post_thumbnail()): ?>

      <div class="store-card">
        <div class="store-card-header">
          <a href="<?php echo get_post_permalink(); ?>">
            <?php the_post_thumbnail(); ?>
          </a>
        </div>
        <div class="divider-line"></div>
        <div class="store-booking">
          <span class="store-name"><?php the_title(); ?></span>
          <!-- <?php $price = get_post_meta($post->ID, '_price', true); ?>
          <p><?php echo wc_price( $price ); ?></p> -->
          <div>
            <?php echo do_shortcode('[add_to_cart id="'.$post->ID.'"]');  ?>
          </div>
        </div>
      </div>

    <?php else:
        $default_img = '<img src="'.site_url().'/wp-content/uploads/woocommerce-placeholder.png'.'" />'
        ?>
      <div class="store-card">
        <div class="store-card-header">
          <?php echo $default_img; ?>
        </div>
        <div class="divider-line"></div>
        <div class="store-booking">
          <span class="store-name"><?php the_title(); ?></span>
          <!-- <?php $price = get_post_meta($post->ID, '_price', true); ?>
          <p><?php echo wc_price( $price ); ?></p> -->
          <div class="">
            <?php echo do_shortcode('[add_to_cart id="'.$post->ID.'"]');  ?>
          </div>
        </div>
      </div>

    <?php endif; ?>



</article>
