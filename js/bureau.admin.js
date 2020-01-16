jQuery(document).ready(function($){

  // Date picker
  $('#event_date').datepicker({
      dateFormat: 'dd-mm-yy'
  });

  // Profile Pic Uploader
  let mediaUploader;

  $('#upload-button').on('click', function(e) {
    e.preventDefault();
    if( mediaUploader ) {
        mediaUploader.open();
        return;
    }
    mediaUploader = wp.media.frames.file_frame = wp.media({
        title: 'Choose a Profile Picture',
        button: {
          text: 'Choose picture'
        },
        multiple: false
    });
    mediaUploader.on('select', function(){
        let attachment = mediaUploader.state().get('selection').first().toJSON();
        $('#profile-pic').val(attachment.url);
        $('#profile-picture-preview').css('background-image', 'url('+attachment.url+')');
    });
    mediaUploader.open();
  });

  // Remove Picture
  $('#remove-picture').on('click', function(e) {
    e.preventDefault();
    let answer = confirm("Proceed to delete picture!");
    if (answer == true) {
        $('#profile-pic').val('');
        $('.speaker_bureau_general_form').submit();
    } else {
        console.log('No, donot delete');
    }
    return;
  });
});
