<?php
/*
  Template Name: Contact Page
*/

get_header(); ?>
<div class="speaker-store-header">
  <div class="store-header background-image" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/contact-usdup.jpg')">
  </div>
  <div class="overlay-container">
    <div class="overlay"></div>
  </div>
</div>

<div class="container generic-container">
  <h3>Get intouch with us.</h3>
  <div class="row">
    <div class="col-md-6 col-xs-12">
      <form id="speakerBureauSimpleContact" action="<?php get_the_permalink(); ?>" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label class="font-weight-bold" for="first_name">First Name</label><span>*</span>
            <input class="form-control" type="text" name="first_name" id="firstname" value="<?php echo esc_attr($_POST['first_name']); ?>" required>
          </div>
          <div class="col-md-6 mb-3">
            <label class="font-weight-bold" for="last_name">Last Name</label><span>*</span>
            <input class="form-control" type="text" name="last_name" id="lastname" value="<?php echo esc_attr($_POST['last_name']); ?>" required>
          </div>
        </div>

        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label class="font-weight-bold" for="company_name">Company Name</label><span>*</span>
            <input class="form-control" type="text" name="company_name" id="companyname" value="<?php echo esc_attr($_POST['company_name']); ?>" required>
          </div>
          <div class="col-md-6 mb-3">
            <label class="font-weight-bold" for="designation">Designation</label><span>*</span>
            <input class="form-control" type="text" name="designation" id="designation" value="<?php echo esc_attr($_POST['designation']); ?>" required>
          </div>
        </div>

        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label class="font-weight-bold" for="email">Email</label><span>*</span>
            <input class="form-control" type="email" name="email" id="email" value="<?php echo esc_attr($_POST['email']); ?>" required>
          </div>
          <div class="col-md-6 mb-3">
            <label class="font-weight-bold" for="phone">Phone</label><span>*</span>
            <input class="form-control" type="text" name="phone" id="phone" value="<?php echo esc_attr($_POST['phone']); ?>" required>
          </div>
          </div>

          <div class="form-group">
            <label class="font-weight-bold" for="message">Message</label><span>*</span>
            <textarea class="form-control" name="message" rows="4" col="50" id="message">
              <?php echo esc_attr($_POST['message']); ?>
            </textarea>
          </div>

        <button type="submit" name="submit" class="btn btn-primary mb-2">Send Message</button>
        <small class="text-info form-control-msg js-form-submission">Submission in progress, Please wait...</small>
        <small class="text-success form-control-msg js-form-success">Message successfully sent, thank you</small>
        <small class="text-danger form-control-msg js-form-error">Message NOT sent, please try again!</small>

      </form>
      <hr>
      <h5>Contact Information</h5>
      <div class="row">
        <div class="col-1">
          <i class="fa fa-map-marker"></i>
        </div>
        <div class="col-11">
          <p>Location</p>
        </div>
      </div>

      <div class="row">
        <div class="col-1">
          <i class="fa fa-phone"></i>
        </div>
        <div class="col-11">
          <p>Phone Number</p>
        </div>
      </div>

      <div class="row">
        <div class="col-1">
          <i class="fa fa-envelope"></i>
        </div>
        <div class="col-11">
          <p>Company Mail</p>
        </div>
      </div>

    </div>

    <div class="col-md-6 col-xs-12 contact-page-container">
      <h5 class="mb-4">GOT A QUESTION</h5>

      <p class="mb-4">Please select a topic below related to your inquiry. If you don’t find what you need, fill out our contact form.</p>

      <a href="<?php echo get_page_link( get_page_by_title( 'speakers-page' ) ); ?>">
        <div class="row contact-page-links">
          <div class="col-11">
            <h6>Book a Speaker</h6>
            <p>Request to book a speaker from our lists of elite speakers</p>
          </div>
          <div class="col-1">
            <i class="fa fa-angle-right"></i>
          </div>
        </div>
      </a>

      <hr>

      <a href="<?php echo get_page_link( get_page_by_title( 'store' ) ); ?>">
        <div class="row">
          <div class="col-11">
            <h6>Get Inspired</h6>
            <p>Read our inspirational blogs and purchase books</p>
          </div>
          <div class="col-1">
            <i class="fa fa-angle-right"></i>
          </div>
        </div>
      </a>

      <hr>

      <a href="javascript:void();">
        <div class="row">
          <div class="col-11">
            <h6>Become a Speaker</h6>
            <p>Join our team of elite speakers and inspire</p>
          </div>
          <div class="col-1">
            <i class="fa fa-angle-right"></i>
          </div>
        </div>
      </a>

      <hr>

    </div>
  </div>
</div>

<?php get_footer(); ?>
