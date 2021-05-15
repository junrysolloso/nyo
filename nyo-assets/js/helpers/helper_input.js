/**
 * Empty values checker
 */
data_checker = function (data) {
  
  var flag = true, j, i;

  // Check for empty value
  for (i=0; i < data.length; i++) {
    if ( data[i] == '' ) {
      flag = false;
    } else {
      for (j = 0; j < data[i].length; j++) {
        if ( ! data[i][j].length ) {
          flag = false;
        }
      }
    }
  }

  // Check if flag is true or false
  if ( ! flag ) {
    $.toast({
      heading           : 'Error',
      text              : 'All fields is required.',
      showHideTransition: 'fade',
      icon              : 'error',
      loaderBg          : '#f2a654',
      position          : 'bottom-right'
    });
    
    // Reset Input Icons
    input_icon_reset();

    return false;
  } else {
    return true;
  }
}

/**
 * Reset input icon
 */
input_icon_reset = function () {

  // Input
  $('input').each(function(){
    input_icon($(this));
  });

  // Select
  $('select').each(function(){
    input_icon($(this));
  });
}

/**
 * Set icon color
 */
input_icon = function (obj) {

  // loop through all the input fields
  obj.each(function () {
    if ((obj.val()).length > 0) {
      obj.closest('.input-group').find('.mdi').removeClass('mdi-close-circle-outline');
      obj.closest('.input-group').find('.input-group-text').removeClass('text-danger');

      obj.closest('.input-group').find('.input-group-text').addClass('text-success');
      obj.closest('.input-group').find('.mdi').addClass('mdi-check-circle-outline');
    } else {
      obj.closest('.input-group').find('.input-group-text').removeClass('text-success');
      obj.closest('.input-group').find('.mdi').removeClass('mdi-check-circle-outline');

      obj.closest('.input-group').find('.mdi').addClass('mdi-close-circle-outline');
      obj.closest('.input-group').find('.input-group-text').addClass('text-danger');
    }
  });
}

/**
 * Capitalize first letter
 */
const capitalize = (str, lower = false) => (lower ? str.toLowerCase() : str).replace(/(?:^|\s|["'([{])+\S/g, match => match.toUpperCase()); 

/**
 * Remove space on words
 */
const trim_whitespace = (str) => str.replace(/\s/g,'');

/**
 * Base url
 */
const base_url = $('input#base_url').val();
