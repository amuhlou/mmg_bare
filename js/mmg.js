/**
 * JS for the handling of the navigation.
 */

'use strict';

(function ($, Drupal, window, document, undefined) {

// To understand behaviors, see https://drupal.org/node/756722#behaviors

Drupal.behaviors.mmgMenu = {
  attach: function(context, settings) { // jshint ignore:line
    // menu related functionality
    $('.nav-toggle').click(function(){
      $('#nav-menus').toggleClass('closed opened');
      $(this).toggleClass('is-active');
    });
  }
};

Drupal.behaviors.vsoSearch = {
  attach: function(context, settings) { // jshint ignore:line
    // search toggle
    $('.search-toggle').click(function(){
      $('.search-wrap').toggleClass('closed opened');
      $(this).toggleClass('closed opened');
    });

    $('#block-search-form .form-type-textfield input').keypress(function(event){
      if (event.which === 13) {
        $('#search-block-form').submit();
      }
    });
  }
};

})(jQuery, Drupal, this, this.document); // jshint ignore:line
