<?php
/*
  Template Name: Stores Landing Page
*/
get_header(); ?>

<div class="speaker-store-header">
  <?php $image = speaker_bureau_image_attachment(); ?>
  <div class="store-header background-image" style="background-image: url('<?php echo $image; ?>');">
  </div>
  <div class="overlay-container">
    <div class="overlay"></div>
  </div>
</div>


<div class="container generic-container">
  <div class="row">
    <div class="col-md-8 col-xs-12">
      <h2>All Products</h2>
    </div>
    <div class="col-md-4 col-xs-12">
      <?php
      $show_default_orderby    = 'menu_order' === apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby', 'menu_order' ) );
      $catalog_orderby_options = apply_filters(
        'woocommerce_catalog_orderby',
        array(
          'menu_order' => __( 'Default sorting', 'woocommerce' ),
          'popularity' => __( 'Sort by popularity', 'woocommerce' ),
          'rating'     => __( 'Sort by average rating', 'woocommerce' ),
          'date'       => __( 'Sort by latest', 'woocommerce' ),
          'price'      => __( 'Sort by price: low to high', 'woocommerce' ),
          'price-desc' => __( 'Sort by price: high to low', 'woocommerce' ),
        )
      );

      $default_orderby = wc_get_loop_prop( 'is_search' ) ? 'relevance' : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby', '' ) );
      $orderby         = isset( $_GET['orderby'] ) ? wc_clean( wp_unslash( $_GET['orderby'] ) ) : $default_orderby; // WPCS: sanitization ok, input var ok, CSRF ok.

      if ( wc_get_loop_prop( 'is_search' ) ) {
        $catalog_orderby_options = array_merge( array( 'relevance' => __( 'Relevance', 'woocommerce' ) ), $catalog_orderby_options );

        unset( $catalog_orderby_options['menu_order'] );
      }

      if ( ! $show_default_orderby ) {
        unset( $catalog_orderby_options['menu_order'] );
      }

      if ( ! wc_review_ratings_enabled() ) {
        unset( $catalog_orderby_options['rating'] );
      }

      if ( ! array_key_exists( $orderby, $catalog_orderby_options ) ) {
        $orderby = current( array_keys( $catalog_orderby_options ) );
      }

      wc_get_template(
        'loop/orderby.php',
        array(
          'catalog_orderby_options' => $catalog_orderby_options,
          'orderby'                 => $orderby,
          'show_default_orderby'    => $show_default_orderby,
        )
      );
       ?>
    </div>

  </div>

    <div class="row">
        <?php
            $currentPage = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $result = new WP_Query(array(
              'post_type'=>'product',
              'posts_per_page'=>7,
              'paged'=>$currentPage,
              'orderby'=> array('date'=>'DESC')
            ));
            if ($result->have_posts()):

              while ($result->have_posts()): $result->the_post(); ?>

                <div class="col-md-4 col-xs-12">
                 <?php get_template_part('content', 'stores'); ?>
                </div>

              <?php endwhile; ?>

              <div class="col-md-12 col-xs-12 pagination generic-container text-right">
                <?php echo paginate_links(array(
                  'prev_text' => __('«'),
                  'next_text' => __('»'),
                  'total' => $result->max_num_pages
                )); ?>
              </div>

          <?php  endif;
            wp_reset_postdata();
        ?>

    </div>
</div>

 <?php get_footer(); ?>
