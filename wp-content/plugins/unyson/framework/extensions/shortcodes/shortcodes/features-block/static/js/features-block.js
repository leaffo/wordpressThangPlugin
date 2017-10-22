jQuery(function($) {
	"use strict";

	var SLZ = window.SLZ || {};

	SLZ.customScrollBar = function() {
		if($('.sc_features_block.la-india').length) {
			$('.la-india .slz-feature-block .description').mCustomScrollbar({
				axis: "y",
                theme: "dark-thin",
                autoHideScrollbar: "true"
			});
		}
	};

	$(document).ready(function() {
		SLZ.customScrollBar();
	});
});