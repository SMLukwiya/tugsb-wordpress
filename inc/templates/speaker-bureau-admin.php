<h1>Profile</h1>
<h2>Personal Profile</h2>

<?php settings_errors(); ?>

<?php

  $picture = esc_attr(get_option('profilepic'));

 ?>


<form class="speaker_bureau_general_form" action="options.php" method="post">
  <?php settings_fields('bureau-settings-group'); ?>
  <?php do_settings_sections('speaker_bureau'); ?>
  <div class="profile-container">
      <div id="profile-picture-preview" class="profile-picture" style="background-image: url(<?php print $picture; ?>);"></div>
  </div>
  <?php submit_button('Save Changes', 'primary', 'btnSubmit'); ?>
</form>
