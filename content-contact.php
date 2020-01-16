<?php
  $response = "";

  /* response messages */
  $missing_content = 'Please supply all information';
  $email_invalid = 'Email Address Invalid';
  $message_unsent = 'Message was not sent. Try Again.';
  $message_sent = 'Thanks! Your message has been sent.';

  /* user input variables */
  $firstname = $_POST['first_name'];
  $lastname = $_POST['last_name'];
  $companyname = $_POST['company_name'];
  $designation = $_POST['designation'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $state = $_POST['area'];
  $requirements = htmlspecialchars($_POST['speaker_requirements']);
  $send_notification = $_POST['yes'];
  $donot_send_notification = $_POST['no'];

  /* Mailer  Variables */
  $to = /*get_option('admin_email')*/'sundaymorgananying@gmail.com';
  $subject = "Someone sent a message from".get_bloginfo('name');
  $body = '<h2>Speaker Booking</h2>
      <h4>Name</h4><p>'.$firstname." ".$lastname.'</p>
      <h4>Email</h4><p>'.$email.'</p>
      <h4>Company Name</h4><p>'.$companyname.'</p>
      <h4>State</h4><p>'.$state.'</p>
      <h4>Phone</h4><p>'.$phone.'</p>
      <h4>Speaker Requirements</h4><p>'.$requirements.'</p>
  ';
  $headers = 'From: '.$email. "\r\n".'Reply-To: '.$email."\r\n";

  /* Validate Input */
  if (filter_has_var(INPUT_POST, 'submit')) {
    if (!empty($firstname) && !empty($lastname) && !empty($email) && !empty($companyname) && !empty($designation)
        && !empty($phone) && !empty($state) && !empty($requirements)) {
        echo 'Passed';
    } else {
    contact_form_response('error', $missing_content);
    }

  }

 ?>

<div>
  <?php echo $response; ?>

  <form action="<?php get_the_permalink(); ?>" method="post">
    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="first_name">First Name</label><span>*</span>
        <input class="form-control" type="text" name="first_name" value="<?php echo esc_attr($_POST['first_name']); ?>">
      </div>
      <div class="col-md-6 mb-3">
        <label for="last_name">Last Name</label><span>*</span>
        <input class="form-control" type="text" name="last_name" value="<?php echo esc_attr($_POST['last_name']); ?>">
      </div>
    </div>

    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="company_name">Company Name</label><span>*</span>
        <input class="form-control" type="text" name="company_name" value="<?php echo esc_attr($_POST['company_name']); ?>">
      </div>
      <div class="col-md-6 mb-3">
        <label for="designation">Designation</label><span>*</span>
        <input class="form-control" type="text" name="designation" value="<?php echo esc_attr($_POST['designation']); ?>">
      </div>
    </div>

    <div class="form-row">
      <div class="col-md-6 mb-3">
        <label for="email">Email</label><span>*</span>
        <input class="form-control" type="text" name="email" value="<?php echo esc_attr($_POST['email']); ?>">
      </div>
      <div class="col-md-6 mb-3">
        <label for="phone">Phone</label><span>*</span>
        <input class="form-control" type="text" name="phone" value="<?php echo esc_attr($_POST['phone']); ?>">
      </div>
      </div>

      <div class="form-group">
        <label for="area">State/Area</label><span>*</span>
        <select name="area" class="form-control">
          <option value="Kampala">Kampala</option>
          <option value="Entebbe">Entebbe</option>
          <option value="Jinja">Jinja</option>
          <option value="Mukono">Mukono</option>
          <option value="Mbarara">Mbarara</option>
        </select>
      </div>

      <div class="form-group">
        <label for="speaker_requirements">Speaker requirements? Please provide the broad topic information</label><span>*</span>
        <textarea class="form-control" name="speaker_requirements" rows="3">
          <?php echo esc_attr($_POST['speaker_requirements']); ?>
        </textarea>
      </div>

    <div class="form-check">
      <input class="form-check-input" type="radio" name="yes" value="<?php echo esc_attr($_POST['yes']); ?>" checked>
      <label class="form-check-label" for="yes">
        Yes
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="no" value="<?php echo esc_attr($_POST['no']); ?>">
      <label class="form-check-label" for="no">
        No
      </label>
    </div>

    <button type="submit" name="submit" class="btn btn-primary mb-2">Send Message</button>

  </form>
</div>
