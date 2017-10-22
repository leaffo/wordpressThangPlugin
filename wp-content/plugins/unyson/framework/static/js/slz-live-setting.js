// JavaScript Document
(function($) {
	"use strict";
	var slz_livesetting = function() {
		// THEME SETTING
		$("#theme-setting .theme-setting-content").mCustomScrollbar({
			theme:"minimal-dark"
		});

		$(".btn-theme-setting").on('click',function(e) {
			e.preventDefault();
			$("#theme-setting").toggleClass('open');
		});

		$('body').on('click', function (event) {
            if ($('#theme-setting').has(event.target).length == 0 && !$('#theme-setting').is(event.target)) {
                if ($('#theme-setting').hasClass('open') == true) {
                    $('#theme-setting').removeClass('open');
                }
            }
        });

		if ( $(window).width() > 1024 ) {

			/*----------  Layout Option  ----------*/
			$('#theme-setting .layout-wide').on('click',function(e) {
				e.preventDefault();
				$('body').removeClass('slz-boxed-layout');
				$('body').css('background','');
				$('#layout-boxed').removeClass('active');
				$('#layout-wide').addClass('active');
				$('.boxed-option').slideUp('slow');
				$('.boxed-background-images a').removeClass('active');
				$('.boxed-background-patterns a').removeClass('active');
			});

			$('#theme-setting .layout-boxed').on('click',function(e) {
				e.preventDefault();
				$('body').addClass('slz-boxed-layout');
				$('#layout-boxed').addClass('active');
				$('#layout-wide').removeClass('active');
				$('.boxed-option').slideDown('slow');
			});

			$('#theme-setting .boxed-background-patterns a').on('click',function(e) {
				e.preventDefault();
				$('.boxed-background-images a').removeClass('active');
				$('.boxed-background-patterns a').removeClass('active');
				$(this).addClass('active');
				var imageUrl = $(this).children().attr("src");
				$('body').css('background', 'url(' + imageUrl + ') no-repeat center center fixed');
				$('body').css('background-size', 'cover');
			});

			$('#theme-setting .boxed-background-images a').on('click',function(e) {
				e.preventDefault();
				$('.boxed-background-images a').removeClass('active');
				$('.boxed-background-patterns a').removeClass('active');
				$(this).addClass('active');
				var imageUrl = $(this).children().attr("src");
				$('.slz-boxed-layout').css('background', 'url(' + imageUrl + ') no-repeat 100% 100% fixed');
				$('.slz-boxed-layout').css('background-size', 'cover' );
			});

			/*----------  Skin color  ----------*/
			$('#theme-setting .skin-site a').on('click',function(e) {
				e.preventDefault();
				$('#theme-setting .skin-site a').removeClass('active');
				$(this).addClass('active');
				var color = $(this).attr('data-color');
				var url = window.location.href;
				var href = updateQueryStringParameter( url, "skin-color", color);
				window.location = href;
			});
			/*----------  Skin custom color  ----------*/

			// hide color picker
			$('.slz-live-color-picker').hide();

			// init color picker
			$('#theme-setting .slz-live-color-picker').each(function(){
				var $this = $(this);
				var id = $this.attr('data-item');
				$this.farbtastic('#' + id);
			});

			$('#theme-setting .slz-live-color-picker-field').each(function() {
				$(this).on('click', function(){
					var id = $(this).data('color-item');
					$('#' + id ).each(function(){
						$(this).fadeIn();
					});

				});
			});

			$('#theme-setting .skin-site .slz-live-color-picker').each( function() {
				var id = $(this).attr('data-item');
				/*$('.marker', $(this)).mouseup(function(event) {
					var color = $('#' + id ).val();
					color = color.replace('#', '');
					var url = window.location.href;
					var href = updateQueryStringParameter( url, "skin-color", color);
					window.location = href;
				});*/
			});


			/*----------  header animation  ----------*/
			if($('.slz-header-main').hasClass('slz-header-sticky')) {
				$('#theme-setting .header-animation a[data-item="2"]').addClass('active');
			} else {
				$('#theme-setting .header-animation a[data-item="1"]').addClass('active');
			};
			$('#theme-setting .header-animation a').on('click',function(e) {
				e.preventDefault();
				if(!$(this).hasClass('active')) {
					$('#theme-setting .header-animation a').removeClass('active');
					$(this).addClass('active');
					var item = $(this).attr('data-item');
					var url = window.location.href;
					var href = updateQueryStringParameter( url, "header-animation", item);
					window.location = href;
				}
			});

			/*----------  Header color  ----------*/
			if($('.slz-header-wrapper').hasClass('header-transparent')) {
				$('#theme-setting .header-color a[data-item="1"]').addClass('active');
			} else {
				$('#theme-setting .header-color a[data-item="2"]').addClass('active');
			};
			$('#theme-setting .header-color a').on('click',function(e) {
				e.preventDefault();
				if(!$(this).hasClass('active')) {
					$('#theme-setting .header-color a').removeClass('active');
					$(this).addClass('active');
					var item = $(this).attr('data-item');
					var url = window.location.href;
					var href = updateQueryStringParameter( url, "header-transparent", item);
					window.location = href;
				}
			});

			/*----------  header topbar  ----------*/
			if($('.slz-header-wrapper .slz-header-topbar').length) {
				$('#theme-setting .header-topbar a[data-item="1"]').addClass('active');
			} else {
				$('#theme-setting .header-topbar a[data-item="2"]').addClass('active');
			}
			$('#theme-setting .header-topbar a').on('click',function(e) {
				e.preventDefault();
				if(!$(this).hasClass('active')) {
					$('#theme-setting .header-topbar a').removeClass('active');
					$(this).addClass('active');
					var item = $(this).attr('data-item');
					var url = window.location.href;
					var href = updateQueryStringParameter( url, "header-top-bar", item);
					window.location = href;
				}
			});

			/*----------  header style  ----------*/
			var body_class_arr = ['slz-header-box-sidebar', 'slz-header-box-style'];
			var body_class_cnt = 2;
			var body_class_active = '';
			if($('.slz-header-wrapper').hasClass('slz-header-sidebar')) {
				$('#theme-setting .header-style a[data-item="7"]').addClass('active');
				body_class_active = 'slz-header-box-sidebar';
			}
			else if($('.slz-header-wrapper').hasClass('slz-header-box')) {
				$('#theme-setting .header-style a[data-item="6"]').addClass('active');
				body_class_active = 'slz-header-box-style';
			}
			else if($('.slz-header-wrapper').hasClass('slz-header-left-right')) {
				$('#theme-setting .header-style a[data-item="5"]').addClass('active');
			} 
			else if ($('.slz-header-wrapper').hasClass('slz-header-center')) {
				$('#theme-setting .header-style a[data-item="2"]').addClass('active');
			}
			else if ($('.slz-header-wrapper').hasClass('slz-header-with-banner')) {
				$('#theme-setting .header-style a[data-item="3"]').addClass('active');
			}
			else if ($('.slz-header-wrapper').hasClass('slz-header-table')) {
				$('#theme-setting .header-style a[data-item="4"]').addClass('active');
			}
			else {
				$('#theme-setting .header-style a[data-item="1"]').addClass('active');
			}
			for (var i = 0; i < body_class_cnt; i++) {
				var loop_item = body_class_arr[i];
				if(body_class_arr != '' && body_class_active != loop_item) {
					if( $('body').hasClass(loop_item)){
						$('body').removeClass(loop_item);
					}
				}
				if(body_class_arr != '' && body_class_active == loop_item) {
					if( !$('body').hasClass(loop_item)){
						$('body').addClass(loop_item);
					}
				}
			}

			$('#theme-setting .header-style a').on('click',function(e) {
				e.preventDefault();
				if(!$(this).hasClass('active')) {
					$('#theme-setting .header-style a').removeClass('active');
					$(this).addClass('active');
					var item = $(this).attr('data-item');
					var url = window.location.href;
					var href = updateQueryStringParameter( url, "header-style", item);
					window.location = href;
				}
			});

			/*----------  hover demo thumbnail  ----------*/
			var temp = 0;
			$("#theme-setting .demo-thumbnail").mouseenter(function() {
				temp = $(this).attr('data-item');
				console.log(temp);
				$(".demo-review-wrapper img").each(function(){
					if ($(this).attr('data-item') == temp) {
						$(this).addClass('show-demo');
					}
				});
			}).mouseleave(function() {
				temp = 0;
				$(".demo-review-wrapper img").removeClass('show-demo');
			});
		}
	}

	function updateQueryStringParameter(uri, key, value) {
		var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
		var separator = uri.indexOf('?') !== -1 ? "&" : "?";
		if (uri.match(re)) {
			return uri.replace(re, '$1' + key + "=" + value + '$2');
		}
		else {
			return uri + separator + key + "=" + value;
		}
	}
	/**
	 * Initial Script
	 */
	$(document).ready(function() {
		slz_livesetting();
	});
})(jQuery);