"use strict";

// *** General Variables *** //
var $window = $(window),
	$document = $(document),
	$this = $(this),
	$html = $("html"),
	$body = $("body");


// *** Section Parallax Image BG *** //
function sectionParallaxImageBG() {
	$(".section-parallax").each(function () {
		var parallaxSection = $(this),
			imgSrc = parallaxSection.children("img:first-child").attr("src");

		parallaxSection.prepend("<div class='bg-element'></div>");
		var bgElement = parallaxSection.find("> .bg-element");
		bgElement.css("background-image", "url('" + imgSrc + "')").attr("data-stellar-background-ratio", 0.2);
	});
}
sectionParallaxImageBG();
