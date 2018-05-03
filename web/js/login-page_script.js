/*global $, console*/

$(function () {
   
    'use strict';
    
    ////// page side animation
    
    $('.login-section').on('click', function () {
        $(this).addClass('section-open');
        $('.login-section').removeClass('section-close');
        $('.signup-section').addClass('section-close');
        $('.signup-section').removeClass('section-open');
    });

    $('.signup-section').on('click', function () {
        $(this).addClass('section-open');
        $('.signup-section').removeClass('section-close');
        $('.login-section').addClass('section-close');
        $('.login-section').removeClass('section-open');
        $('.login-form').slideDown();
        $('.forget-form').slideUp();
    });

    ////// custom placeholder

    $('.login-page_input').on('change', function () {
        var input = $(this);
        if (input.val().length) {
            input.addClass('hide-placeholder');
        } else {
            input.removeClass('hide-placeholder');
        }
    });
    
    //// forget password

    $('.login-page_forget a').on('click', function (e) {
        e.preventDefault();
        $('.login-form').slideUp();
        $('.forget-form').slideDown();
    });
});