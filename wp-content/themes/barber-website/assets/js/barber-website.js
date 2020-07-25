jQuery(document).ready(function($){

	// Sticky Header
	$(window).scroll(function() {
		if ($(window).scrollTop() > 100) {
			$('.navigation').addClass('sticky');
		} else {
			$('.navigation').removeClass('sticky');
		}
	});


	// Mobile Navigation
	$('.nav-toggle').click(function() {
		if ($('.navigation').hasClass('open-nav')) {
			$('.navigation').removeClass('open-nav');
		} else {
			$('.navigation').addClass('open-nav');
		}
	});

	$('.navigation li a').click(function() {
		if ($('.navigation').hasClass('open-nav')) {
			$('.navigation').removeClass('open-nav');
			$('.navigation').removeClass('open-nav');
		}
	});


	//Nav Menu Active Click Item(button) with jQuery START
	//.activex class in navbar.scss
	$('#menu-header-nav-menu li a').on('click', function(e) {
		$('#menu-header-nav-menu li a').removeClass('activex');

		var $this = $(this);
		if (!$this.hasClass('activex')) {
			$this.addClass('activex');
		}
	});
	//Nav Menu Active Click Item(button) with jQuery END


	// Navigation Scroll
	$('.nav a').click(function(event) {
		var id = $(this).attr("href");
		var offset = 70;
		var target = $(id).offset().top - offset;
		$('html, body').animate({
			scrollTop: target
		}, 400);
		event.preventDefault();
	});

	/*Number count for stats, using jQuery animate START*/
	$('.counting').each(function() {
		var $this = $(this),
		countTo = $this.attr('data-count');
	  
		$({ countNum: $this.text()}).animate({
			countNum: countTo },
		{
			duration: 5000,
			easing:'linear',
			step: function() {
				$this.text(Math.floor(this.countNum));
			},
			complete: function() {
				$this.text(this.countNum);
				//alert('finished');
			}
		});
	});
	/*Number count for stats, using jQuery animate START*/


	/*Contact form START*/
	(function($) {
	// Detect when form-control inputs are not empty
		$(".contact-form .form-control").on("input", function() {
			if ($(this).val()) {
				$(this).addClass("hasValue");
			} else {
				$(this).removeClass("hasValue");
			}
		});
	});// End of use strict
	/*Contact form END*/


	/* Smooth scroll animation START 
	$('.smooth-scroll').click(function(e){
		e.preventDefault();
		var target = $($(this).attr('href'));
		if(target.length){
			var scrollTo = target.offset().top;
			$('body, html').animate({scrollTop: scrollTo+'px'}, 800);
		}
	});
	/* Smooth scroll animation END */


    /*Contact form submission START*/ //contact-form.php
    //FILES INCLUDE shortcodes.php, function.php(to add ajax.php), contact-form.php, ajax.php, theme-support.php, custom-post-type.php, contact.scss
    $('#ContactForm').on('submit', function(e){//e - means element. #ContactForm - took from contact-form.php forst id.
        e.preventDefault();//avoid the form when submitting to href to whatever location that is not wanted

       // console.log('Form submitted');//test to check if it works

        $('.has-error').removeClass('has-error');//remove has-error class when input is filled and submitted
        $('.js-form-submission').removeClass('js-form-submission');

        var form = $(this), //$(this) - stands for the parent element in jQuery function (in this case #modelingContactForm)
            name = form.find('#name').val(), //name - the id in the contact-form.php
            email = form.find('#email').val(),
            message = form.find('#message').val(),
            ajaxurl = form.data('url'); //data url must be defined in contact-form.php

            if( name === '' ){
                //console.log('Required inputs are empty');
                $('#name').parent('.form-group').addClass('has-error');//#name - id in contact-form.php

                return;//return stops the execution of the script at this point. 
                //It is not going to go on the second line and not going to continue if this if statement is true.
            }

            if( email === '' ){
                $('#email').parent('.form-group').addClass('has-error');//#email - id in contact-form.php
                
                return;
            }

            if( message === '' ){
                $('#message').parent('.form-group').addClass('has-error');//#message - id in contact-form.php

                return;
            }

            form.find('input, button, textarea').attr('disabled', 'disabled');//disables input, button, textarea. form - var form = $(this).
            $('.js-form-submission').addClass('js-show-feedback');//class from contact-form.php appears after submit button is pushed

        //console.log(form);
        //console.log(name);

        $.ajax({
            url : ajaxurl,
            type : 'post',// post - the same type that it is seen in a <form> and the post method in ajax is a default type.
            //$_POST (post method) - is a method that passes all the variables hidden inside the reload of the page. These methods are not getting printed anywhere.
            //$_GET (get method) - print the variables inside the url so you will see the variables inside the url. GET method is not safe
            data : { // data contains all the custom data like the array and we can write in the curly brackets and send to the ajax function

                name : name,
                email : email,
                message : message,
                action: 'barber_save_user_contact_form' //function barber_save_contact in ajax.php 

            },
            error : function( response ){
                $('.js-form-submission').removeClass('js-form-feedback');
                $('.js-form-error').addClass('js-show-feedback');
                form.find('input, button, textarea').removeAttr('disabled');
            },
            success : function( response ){
                if( response == 0 ){

                    setTimeout(function(){
                        //console.log('Unable to save your message, Please try again later');
                        $('.js-form-submission').removeClass('js-form-feedback');
                        $('.js-form-error').addClass('js-show-feedback');
                        form.find('input, button, textarea').removeAttr('disabled');
                    }, 1500);
                } else {

                    setTimeout(function(){
                        //console.log('Message saved!');
                        $('.js-form-submission').removeClass('js-form-feedback');
                        $('.js-form-success').addClass('js-show-feedback');
                        form.find('input, button, textarea').removeAttr('disabled').val(''); //val('') - empty all the values.
                    }, 1500);
                }
            }
        });
    });
    /*Contact form submission END*/


	/*Cookie bar START*/
	$(document).ready(function(){   
		setTimeout(function () {
			$("#cookie").fadeIn(200);
		}, 4000);
		$("#cookie-close, .cookie-agree").click(function() {
			$("#cookie").fadeOut(200);
		}); 
	});
	/*Cookie bar END*/
});