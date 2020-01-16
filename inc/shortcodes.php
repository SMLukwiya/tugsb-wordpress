<?php

/*
======================
Contact Form Shortcode
======================
*/

function speakerbureau_form($atts, $content=null) {

  $atts = shortcode_atts(
    array(),
    $atts,
    'contact_form'
  );

  // return HTML
  ob_start();
  include 'templates/contact-form.php';

  return ob_get_clean();
}

add_shortcode('contact_form', 'speakerbureau_form');

function woocommerce_catalog_ordering() {
  if ( ! wc_get_loop_prop( 'is_paginated' ) || ! woocommerce_products_will_display() ) {
    return;
  }
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
}

add_shortcode('store_sorting', 'woocommerce_catalog_ordering');
