!function(e){"use strict";function t(e,t){var n;0<(e=e.find(".tm-typed-headline").find(".animate-text")).length&&(n=e.data("typed"),""!==e.text()&&n.unshift("placeholder"),new Typed(e[0],{strings:n,loop:!0,smartBackspace:!1,typeSpeed:50,backDelay:2e3}))}e(window).on("elementor/frontend/init",function(){elementorFrontend.hooks.addAction("frontend/element_ready/tm-typed-headline.default",t)})}(jQuery);