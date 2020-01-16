<?php
/*

Footer Page Template
@package speakerBureauTheme

*/
 ?>

    <footer>
          <section id="footer">
    		    <div class="container">
    			    <div class="row text-center text-xs-center text-sm-left text-md-left">
    				    <div class="col-xs-12 col-sm-6 col-md-6 logo">
      					  <h1>TUGSB</h1>
                  <p>The Uganda Speaker Bureau</p>
                  <p>Get speakers to speaker at your event.</p>
    				    </div>
    				    <div class="col-xs-12 col-sm-6 col-md-6">
        					<h5>Tugsb</h5>
        					<ul class="list-unstyled quick-links">
        						<li><a href="<?php echo get_page_link( get_page_by_title( '/' ) ); ?>"><i class="fa fa-angle-double-right"></i>Home</a></li>
        						<li><a href="<?php echo get_page_link( get_page_by_title( 'speakers-page' ) ); ?>"><i class="fa fa-angle-double-right"></i>Speakers</a></li>
        						<li><a href="<?php echo get_page_link( get_page_by_title( 'media-room' ) ); ?>"><i class="fa fa-angle-double-right"></i>Media Room</a></li>
        						<li><a href="<?php echo get_page_link( get_page_by_title( 'contact-us' ) ); ?>"><i class="fa fa-angle-double-right"></i>Contact Us</a></li>
        					</ul>
    				    </div>
    			    </div>
        			<div class="row">
        				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
        					<ul class="list-unstyled list-inline social text-center">
        						<li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-facebook"></i></a></li>
        						<li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-twitter"></i></a></li>
        						<li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-instagram"></i></a></li>
        						<li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-google-plus"></i></a></li>
        						<li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-envelope"></i></a></li>
        					</ul>
        				</div>
        				</hr>
        			</div>
        			<div class="row">
        				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
        					<!-- <p><u><a href="https://www.nationaltransaction.com/">National Transaction Corporation</a></u> is a Registered MSP/ISO of Elavon, Inc. Georgia [a wholly owned subsidiary of U.S. Bancorp, Minneapolis, MN]</p> -->
                  <hr>
        					<p class="h6">Copyright &copy 2019.<a class="text-green ml-2" href="'<?php esc_url(home_url('/')); ?>'">THE UGANDA SPEAKER BUREAU</a></p>
        				</div>
        				</hr>
        			</div>
    		    </div>
    	    </section>
      <!-- <?php wp_nav_menu(array('theme_location'=>'secondary')); ?> -->
    </footer>
    <?php wp_footer(); ?>
  </body>
</html>
