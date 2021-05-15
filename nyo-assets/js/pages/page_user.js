$(document).ready(function(){

  // Photo preview
  $('input[name="user_photo"]').on('change', function(event){
    var imgPath = URL.createObjectURL(event.target.files[0]);
    $('#user_preview').attr('src', imgPath);
  });
});