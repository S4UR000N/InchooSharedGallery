/* Page Data */
// Header's width & height
var $nav_width = $(".nav").outerWidth();
var $nav_height = $(".nav").outerHeight();

// Windows width & height
var $window_width = $(window).width();
var $window_height = $(window).height();


/* Page Builders */
function HomeBuilder(obj = false) {
	console.log("shit");
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
function TestBuilder(obj = false) {
	// Windows width & height
	var $window_width = $(window).width();
	var $window_height = $(window).height();

	// Header's height
	var $header_height = $("#nav").outerHeight();

	// .box
	var $box = $('.box');
	var $boxWidth = $box.width();
	var $boxHeight = $box.height();

	var toXAddition = (($window_width - ($boxWidth * $box.length)) / $box.length);
	var yProportion = (obj.height/obj.width);

	var $newBoxWidth = $boxWidth + toXAddition;
	var $newBoxHeight = $newBoxWidth * yProportion;

	$box.css({ "width" : $newBoxWidth, "height" : $newBoxHeight });
	$('.box div').html((Math.round($newBoxWidth * 100) / 100)+ " X "+ (Math.round($newBoxHeight * 100) / 100));

	console.log("");
	console.log(obj.width+ " X "+ obj.height);
	console.log("X proportion:"); console.log(toXAddition);
	console.log("Y proportion:"); console.log(yProportion);
	console.log($newBoxWidth+ " X "+ $newBoxHeight);
}
function GaleryBuilder(obj = false) {
	var output = document.createElement("div");
	output.className = "container-fluid";
	for(var i = obj.img; i > 0; i -= obj.rowLength) {
		var d = document.createElement("div");
		d.className = "row d-flex justify-content-around";
		for(var j = 0;  j < obj.rowLength; j++) {
			var a = document.createElement("a");
			var img = document.createElement("img");
			a.href = "resources/assets/images/"+ obj.imgName+ (i-j)+ obj.imgExtension;
			img.src = "resources/assets/images/"+ obj.imgName+ (i-j)+ obj.imgExtension;
			img.style = "padding-top: 25px;"
			a.setAttribute("target", "_blank");
			a.setAttribute("rel", "noopener noreferrer");
			a.appendChild(img);
			d.appendChild(a);
		}
		output.appendChild(d);
	}
	$("#page").html(output);
}
function MultimediaBuilder(obj = false) {
	var i = 0;
	var output = "";
	for(key in obj.data) {
		if(i == 0 || (i/obj.rowLength) >= 1) { output += "<tr>"; }
		output += "<td><a href='"+ key+ "' target='_blank' rel='noopener noreferrer'><i class='"+ obj.data[key]+ "'</i></a></td>";
		i++;
		if(i == obj.rowLength) { output += "</tr>"; i = 0; }
	}
	$("#page tbody").html(output);
}
