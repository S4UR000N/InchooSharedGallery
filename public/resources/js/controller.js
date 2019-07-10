/* Page Data */
// Header's width & height
var $nav_width = $(".nav").outerWidth();
var $nav_height = $(".nav").outerHeight();

// Windows width & height
var $window_width = $(window).width();
var $window_height = $(window).height();


/* Page Builders */
function HomeBuilder(obj = false) {
	// Windows width & height
	var $window_width = $(window).width();
	var $window_height = $(window).height();

	// Header's height
	var $header_height = $("#nav").outerHeight();

	// #coverimg height
	var $img_height = $window_height - $header_height;
	$("#coverimg").css({ "height": $img_height });

	// #coverbtn top position
	var $btn_topos = ($img_height/2);
	$("#coverbtn").css({ "top": $btn_topos });
}