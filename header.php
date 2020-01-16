<?php
/*

Header Page Template
@package speakerBureauTheme

*/
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if(is_singular() && pings_open(get_queried_object())): ?>
      <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php endif; ?>
    <title><?php bloginfo('name'); wp_title('-'); ?></title>
    <?php wp_head(); ?>
  </head>

  <?php
    if(is_front_page()):
      $bureau_classes = array('bureau-class', 'my-class');
    else:
      $bureau_classes = array('no-bureau-class');
    endif;
   ?>

  <body <?php body_class(); ?>>
    <header id="main-nav">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark logo">
        <a class="navbar-brand mx-auto" href="<?php echo get_page_link( get_page_by_title( '/' ) ); ?>">THE UGANDA SPEAKER BUREAU</a>
      </nav>

      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

            <?php wp_nav_menu(array(
                              'theme_location'=>'primary',
                              'menu'=>'primary',
                              'depth'=>2,
                              'container'=>'div',
                              'container_class'=>'collapse navbar-collapse',
                              'container_id'=>'navbarTogglerDemo03',
                              'menu_class'=>'navbar-nav mx-auto mt-2 mt-lg-0',
                              'menu_id'=>'mymenu',
                              'fallback_cb'=>'WP_Bootstrap_Navwalker::fallback',
                              'walker'=>new WP_Bootstrap_Navwalker())); ?>


      </nav>
    </header>
