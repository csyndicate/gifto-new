!function(n){"use strict";function e(n,t){var i=n.find(".tm-google-map");elementorFrontend.waypoint(i,function(){var n=i.children(".map"),e=i.children(".map-options").html(),o=!1;try{o=JSON.parse(e)}catch(n){}o&&(t("body").hasClass("elementor-editor-active")&&(o.settings.scrollwheel=!1,o.settings.draggable=!1),e=o.overlay,o=o.settings,n.gmap3(o).overlay(e).on({mouseover:function(n){n.$.css({zIndex:2}),n.$.find(".gmap-info-wrapper").find(".minimog-map-overlay-content").show()},mouseout:function(n){n.$.css({zIndex:1}),n.$.find(".gmap-info-wrapper").find(".minimog-map-overlay-content").hide()}}))})}n(window).on("elementor/frontend/init",function(){elementorFrontend.hooks.addAction("frontend/element_ready/tm-google-map.default",e)})}(jQuery);