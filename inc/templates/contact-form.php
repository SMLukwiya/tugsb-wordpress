
<div>

    <form id="speakerBureauContact" action="<?php get_the_permalink(); ?>" method="post" data-url="<?php echo admin_url('admin-ajax.php'); ?>">
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
          <label class="font-weight-bold" for="area">State/Area</label><span>*</span>
          <select name="area" class="form-control" id="area">
            <option value="Kampala">Kampala</option>
            <option value="Entebbe">Entebbe</option>
            <option value="Jinja">Jinja</option>
            <option value="Mukono">Mukono</option>
            <option value="Mbarara">Mbarara</option>
          </select>
        </div>

        <div class="form-group">
          <label class="font-weight-bold" for="category">Category</label><span>*</span>
          <select name="category" class="form-control" id="category">
            <option value="booking">Booking</option>
            <option value="review">Review</option>
          </select>
        </div>

        <div class="form-group">
          <label class="font-weight-bold" for="speaker_requirements">Speaker requirements? Please provide speaker name and the broad topic information</label><span>*</span>
          <textarea class="form-control" name="speaker_requirements" rows="4" col="50" id="requirements">
            <?php echo esc_attr($_POST['speaker_requirements']); ?>
          </textarea>
        </div>

      <div class="form-check">
        <input class="form-check-input" type="radio" name="yes" id="yes" value="<?php echo esc_attr($_POST['yes']); ?>" checked>
        <label class="form-check-label" for="yes">
          Yes
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="no" id="no" value="<?php echo esc_attr($_POST['no']); ?>">
        <label class="form-check-label" for="no">
          No
        </label>
      </div>

      <button type="submit" name="submit" class="btn btn-primary mb-2">Send Message</button>
      <small class="text-info form-control-msg js-form-submission">Submission in progress, Please wait...</small>
      <small class="text-success form-control-msg js-form-success">Message successfully sent, thank you</small>
      <small class="text-danger form-control-msg js-form-error">Message NOT sent, please try again!</small>

    </form>

  </div>
