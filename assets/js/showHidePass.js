// Name      : Show Hide Password
// Version   : 1.0.0
// Developer : Ekrem KAYA
// Website   : https://openix.io
// GitHub    : https://github.com/openix/show-hide-password

(function($) {
    'use strict';
    $.fn.showHidePassword = function(option) {
      $.extend(this, option);
  
      // Check bootstrap input group
      var inputGroupCheck = $(this).parent().hasClass('input-group');
  
      if (inputGroupCheck) {
        $(this).css({
          borderTopRightRadius: '4px',
          borderBottomRightRadius: '4px'
        });
      } else {
        $(this).wrap('<div class="password-container"></div>');
      }
  
      $(this).after('<span class="show-hide-password"><i class="fa fa-eye"></i></span>');
  
      // Add postion css password container
      $('.password-container').css({position: 'relative'});
  
      var showHideIcon = $(this).parent().find('.show-hide-password');
  
      // Add eye icon css
      $(showHideIcon).css({
        position: 'absolute',
        display: 'none',
        top: '0',
        right: '0',
        height: $(this).outerHeight(true) - 2,
        marginTop: '8px',
        padding: '6px 11px',
        //borderLeft: '1px solid #CCC',
        cursor: 'pointer',
        zIndex : '999',
        color : 'black'
      });
  
      // Show icon when you start entering password
      $(this).keyup(function(event) {
        var passwordVal = $(this).val();
  
        if (passwordVal.length > 0) {
          // Add padding password input
          $(this).css({paddingRight : '34px'});
  
          if (inputGroupCheck) {
            $(showHideIcon).css({padding: '8px 11px'});
          }
  
          // Show eye icon
          $(this).parent().find(showHideIcon).show();
        }
      });
  
      // Change eye icon class
      $(showHideIcon).on('click', function() {
        var iconElement = this;
  
        // Change eye icon
        $(iconElement).find('i').toggleClass('fa-eye fa-eye-slash');
  
        var findInputPassword = $(iconElement).parent().find('input');
        var passwordFieldType = findInputPassword.attr('type');
  
        // Show Hide Password
        if (passwordFieldType == 'password') {
          findInputPassword.attr('type', 'text');
        } else {
          findInputPassword.attr('type', 'password');
        }
      });
    }
  })(window.jQuery);