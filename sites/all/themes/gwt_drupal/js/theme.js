/**
 * @file
 * A JavaScript file for the theme.
 *
 * In order for this JavaScript to be loaded on pages, see the instructions in
 * the README.txt next to this file.
 */
 
// Cookie handler, non-$ style
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

// JavaScript should be made compatible with libraries other than jQuery by
// wrapping it with an "anonymous closure". See:
// - https://drupal.org/node/1446420
// - http://www.adequatelygood.com/2010/3/JavaScript-Module-Pattern-In-Depth
(function ($, Drupal, window, document, undefined) {

// To understand behaviors, see https://drupal.org/node/756722#behaviors
Drupal.behaviors.my_custom_behavior = {
  attach: function(context, settings) {
    /*
    $.fn.spectrum.load = false;
    $('.colorpicker-container input[type="text"]').spectrum({
        flat: true,
        showInput: true
    });
    */

	$(document).foundation();
    // add a place holder for the search text field
    $('#block-search-form input[name="search_block_form"]').attr('placeholder', 'Search...');

    $(".banner-rsslides").responsiveSlides({
        timeout: 10000,
    	nav: true,
    	pager: true
    });

    // js nav hover fix
    $('.dropdown').mouseout(function(e){
    	$(this).removeClass('hover');
    });
    $('.has-dropdown').mouseout(function(e){
    	$(this).removeClass('hover');
    });

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

    $('#accessibility-links ul li a').focus(function(){
        $(this).parent().addClass('access-focus');
    });
    $('#accessibility-links ul li a').blur(function(){
        $(this).parent().removeClass('access-focus');
    });

    // hide all menu item
    $('#nav-megamenu .mega-menu-item').hide();
    var hasActiveMegaMenu = false;
    var items = $('.has-megamenu');
    $('.has-megamenu a').click(function(e){
        e.preventDefault();
        menu = $(this).parent();
        menuId = menu.attr('data-menu-link');
        if(hasActiveMegaMenu && menuId != $('.has-megamenu.active').attr('data-menu-link')){
            $('[data-menu-item='+$('.has-megamenu.active').attr('data-menu-link')+']').slideUp();
            // $('#nav-megamenu').slideUp();
            $('.has-megamenu.active').removeClass('active');
            $('body').addClass('mega-menu-active');
        }
        else{
            $('body').removeClass('mega-menu-active');
        }

        menu.toggleClass('active');
        if(menu.hasClass('active')){
            // $('#nav-megamenu').slideDown();
            $('[data-menu-item='+menuId+']').slideDown(400, function(){
            });
            hasActiveMegaMenu = true;
        }
        else{
            $('[data-menu-item='+menuId+']').slideUp(400, function(){
            });
            // $('#nav-megamenu').slideUp();
        }
    });

    // hide all non-default active mega-sub-content
    $('.mega-sub-contents .mega-sub-content:not(".active")').hide();
    $('[data-tab-link]').click(function(e){
        e.preventDefault();
        var parentNav = $(this).parent().parent();
        var parentContainer = $(this).parent().parent().parent().parent();
        parentNav.children('li.active').removeClass('active');
        $(this).parent().addClass('active');
        menuId = $(this).attr('data-tab-link');

        parentContainer.find('[data-tab-item]').removeClass('active').hide();
        parentContainer.find('[data-tab-item="'+menuId+'"]').addClass('active').show();
    });
    // TODO: add a function that gets the height of the body, then fullscreens the data tab link

    var a11y_stylesheet_path = Drupal.settings.gwt_drupal.theme_path+'/accessibility/a11y-contrast.css';
    if (readCookie('a11y-high-contrast')) {
        $('body').addClass('contrast');
        $('head').append($("<link href='" + a11y_stylesheet_path + "' id='highContrastStylesheet' rel='stylesheet' type='text/css' />"));
        $('#accessibility-contrast').attr('aria-checked', true).addClass('active');
        $('.a11y-toolbar ul li a i').addClass('icon-white');
    }
    $('.toggle-contrast').on('click', function () {
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
        $('#accessibility-grayscale').attr('aria-checked', true).addClass('active');
    };
    
    $('.toggle-grayscale').on('click', function () {
        if(!$(this).hasClass('active')){
            $('head').append($("<link href='" + a11y_desaturate_path + "' id='desaturateStylesheet' rel='stylesheet' type='text/css' />"));
            $('body').addClass('desaturated');
            $(this).attr('aria-checked', true).addClass('active');
            createCookie('a11y-desaturated', '1');
            return false;
        } else {
            $('#desaturateStylesheet').remove();
            $('body').removeClass('desaturated');
            $(this).removeAttr('aria-checked').removeClass('active');
            eraseCookie('a11y-desaturated');
            return false;
        }
    });

    var statementActive = false;
    var oldFocus = document;
    var statementFunction = function(e){
        // e.preventDefault();
        $('.toggle-statement').toggleClass('statement-active');
        $('#accessibility-statement-content').toggleClass('statement-active');
        if($('.toggle-statement').hasClass('statement-active')){
            statementActive = true;
            $('#darklight').fadeIn();
            oldFocus = $(":focus");
            $('#accessibility-statement-content .statement-textarea').focus();
        }
        else{
            statementActive = false;
            $('#darklight').fadeOut();
            $(oldFocus).focus();
        }
    }
    $('.toggle-statement').click(statementFunction);
    $('#darklight').click(statementFunction);
    $(document).keydown(function(e) {
        if(statementActive && e.which == 27){
            statementFunction(e);
        }
    });

    // Accessibility
    $('#accessibility-mode').click(function(e){
        e.preventDefault();
        $(this).toggleClass('active');
        if($(this).hasClass('active')){
            $('#accessibility-widget').animate({right: '0px'});
            $(this).animate({right: '0px', opacity: 1, paddingLeft: '9px', paddingRight: '9px'});
        }
        else{
            $('#accessibility-widget').animate({right: '-42px'});
            $(this).animate({right: '-10px', opacity: 0.8, paddingLeft: '5px', paddingRight: '5px'});
        }
    });
  }
};
})($gwt, Drupal, this, this.document);
