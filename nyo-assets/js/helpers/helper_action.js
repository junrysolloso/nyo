$(document).ready(function () {

  // Reset icon size
  // $('input').closest('.input-group').find('.mdi').addClass('mdi-18px');
  // $('select').closest('.input-group').find('.mdi').addClass('mdi-18px');

  // Input events
  $('input').on('keyup', function () {
    input_icon($(this));
  });

  // Select events
  $('select').on('change', function () {
    input_icon($(this));
  });

  // Inputmask
  $(":input").inputmask();

  //Initialize Select2 Elements
  $('.select2').select2({width: 'calc(100% - 65px)'});

  // Reset input icons
  input_icon_reset();

  // No access
  $('.no-access').on('click', function(){
    swal({
      title: 'Warning!',
      text: "No user privilege for this account.",
      icon: 'warning',
      dangerMode: true,
    })
  });

});

