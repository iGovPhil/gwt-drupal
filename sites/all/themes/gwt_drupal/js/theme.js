/**
 * @file
 * A JavaScript file for the theme.
 */
 
// Cookie handler, native style
function createCookie(name, value, days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        var expires = "; expires=" + date.toGMTString();
    } else
        var expires = "";
    document.cookie = name + "=" + value + expires + "; path=/";
}

function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

function eraseCookie(name) {
    // createCookie(name, "", -1);
    createCookie(name, "");
}

(function ($, Drupal, window, document, undefined) {
Drupal.behaviors.my_custom_behavior = {
  attach: function(context, settings) {
    $(document).foundation();
    // add a place holder for the search text field
    $('#block-search-form input[name="search_block_form"]').attr('placeholder', 'Search...');

    var offset = 220;
    var duration = 500;
    $(window).scroll(function() {
        if ($(this).scrollTop() > offset) {
            $('#back-to-top').fadeIn(duration);
        } else {
            $('#back-to-top').fadeOut(duration);
        }
    });
    
    $('#back-to-top').click(function(event) {
        event.preventDefault();
        $('html, body').animate({scrollTop: 0}, duration);
        return false;
    });

    var mainPosition = $('#main').position();
    var menuHeight = $('#top-menu .sticky').height();
    var footerPosition = $('#footer').position();
    $(window).resize(function() {
        mainPosition = $('#main').position();
        footerPosition = $('#footer').position();
    });
    $('.a11y-skip-to-content').click(function(event) {
        event.preventDefault();
        $('#offCanvas').foundation('close');
        $('html, body').animate({scrollTop: mainPosition.top-menuHeight}, duration);
        return false;
    });
    $('.a11y-skip-to-footer').click(function(event) {
        event.preventDefault();
        $('#offCanvas').foundation('close');
        $('html, body').animate({scrollTop: footerPosition.top-menuHeight}, duration);
        return false;
    });

    $('#a11y-links ul li a').focus(function(){
        $(this).parent().addClass('access-focus');
    });
    $('#a11y-links ul li a').blur(function(){
        $(this).parent().removeClass('access-focus');
    });

    if(!Drupal.settings.hasOwnProperty('gwt_drupal')){
        return false;
    }
    if(!Drupal.settings.gwt_drupal.hasOwnProperty('theme_path')){
        return false; // a simple validation catch for undefined variable.
    }

    var a11y_stylesheet_path = Drupal.settings.gwt_drupal.theme_path+'/accessibility/a11y-contrast.css';
    if (readCookie('a11y-high-contrast')) {
        $('body').addClass('contrast');
        $('head').append($("<link href='" + a11y_stylesheet_path + "' id='highContrastStylesheet' rel='stylesheet' type='text/css' />"));
        $('.a11y-toggle-contrast').attr('aria-checked', true).addClass('active');
        $('.a11y-toolbar ul li a i').addClass('icon-white');
    }
    $('.a11y-toggle-contrast').on('click', function () {
    var a11y_stylesheet_path = Drupal.settings.gwt_drupal.theme_path+'/accessibility/a11y-contrast.css';
        if (!$(this).hasClass('active')) {
            $('head').append($("<link href='" + a11y_stylesheet_path + "' id='highContrastStylesheet' rel='stylesheet' type='text/css' />"));
            $('body').addClass('contrast');
            // $(this).parent().parent().find('i').addClass('icon-white');
            createCookie('a11y-high-contrast', '1');
            $(this).attr('aria-checked', true).addClass('active');
            return false;
        }
        else {
            $('#highContrastStylesheet').remove();
            $('body').removeClass('contrast');
            $(this).removeAttr('aria-checked').removeClass('active');
            // $(this).parent().parent().find('i').removeClass('icon-white');
            eraseCookie('a11y-high-contrast');
            return false;
        }
    });
    // Saturation handler
    var a11y_desaturate_path = Drupal.settings.gwt_drupal.theme_path+'/accessibility/a11y-desaturate.css';
    if(readCookie('a11y-desaturated')) {
        $('body').addClass('desaturated');
        $('head').append($("<link href='" + a11y_desaturate_path + "' id='desaturateStylesheet' rel='stylesheet' type='text/css' />"));
        $('.a11y-toggle-grayscale').attr('aria-checked', true).addClass('active');
    };
  }
};
})($gwt, Drupal, this, this.document);
