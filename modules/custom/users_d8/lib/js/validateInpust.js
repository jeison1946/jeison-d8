(function ($, Drupal, drupalSettings) {
  "use strict";
  "use strict";
  var element1 = '.input-any-text';

  $(element1).on("keydown keyup keypress change blur", function () {
    if (/^[a-zA-Z, ]*$/.test($(this).val())){
      $(this).removeClass('error');
    }else {
      $(this).addClass('error');
    }
  }).trigger("keypress");
}(jQuery, Drupal, drupalSettings));
