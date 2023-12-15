if(jQuery('body').hasClass('woocommerce-shop')){
(function(win) {
    'use strict';
    
    var listeners = [], 
    doc = win.document, 
    MutationObserver = win.MutationObserver || win.WebKitMutationObserver,
    observer;
    
    function ready(selector, fn) {
        // Store the selector and callback to be monitored
        listeners.push({
            selector: selector,
            fn: fn
        });
        if (!observer) {
            // Watch for changes in the document
            observer = new MutationObserver(check);
            observer.observe(doc.documentElement, {
                childList: true,
                subtree: true
            });
        }
        // Check if the element is currently in the DOM
        check();
    }
        
    function check() {
        // Check the DOM for elements matching a stored selector
        for (var i = 0, len = listeners.length, listener, elements; i < len; i++) {
            listener = listeners[i];
            // Query for elements matching the specified selector
            elements = doc.querySelectorAll(listener.selector);
            for (var j = 0, jLen = elements.length, element; j < jLen; j++) {
                element = elements[j];
                // Make sure the callback isn't invoked with the 
                // same element more than once
                if (!element.ready) {
                    element.ready = true;
                    // Invoke the callback with the element
                    listener.fn.call(element, element);
                }
            }
        }
    }

    // Expose `ready`
    win.ready = ready;
            
})(this);

ready('.show-display-list', function(element) {
    //adding tooltip to shop page delayed and realtime tags
	 jQuery( '#minimog-wp-widget-product-tags-layered-nav-2 .show-display-list i' ).remove();
	jQuery( '#minimog-wp-widget-product-tags-layered-nav-2 .show-display-list' ).children('li').eq(0).append( '<i class="fas fa-info-circle tooltip-jquery" title="After purchase it may take up to 7 business days to receive <br> the voucher code. Some brands require manual approval & <br>issuance. This is good if you want to use later or need specific<br> brands."></i>' );
	
	jQuery( '#minimog-wp-widget-product-tags-layered-nav-2 .show-display-list' ).children('li').eq(1).append( '<i class="fas fa-info-circle tooltip-jquery" title="You can purchase & use instantly right now."></i>' );
	
	//END adding tooltip to shop page delayed and realtime tags
	//tooltip on cart VAT tax
	setTimeout(function() {
        jQuery('.tooltip-jquery').tooltipster({
			contentAsHTML: true
		}); 
     }, 100);
	 
    //alert("You're on the billing step!");
});   
}
jQuery(document).ready(function(){
//tooltip on cart VAT tax
	jQuery('.tooltip').tooltipster({
        contentAsHTML: true
    });
    jQuery( document ).on( 'updated_checkout', function() {
	    jQuery('.tooltip').tooltipster({
	        contentAsHTML: true
	    });
	} );
	
	//for shop page country filter
	jQuery(".post-type-archive-product form#filters-form select,.cntry_srch_mk,.filterc_country").select2();
	//for reward products proce and email field checks
	jQuery(".single-product form.cart .single_add_to_cart_button.custom_click").click(function( e ){
	           //get values into hidden fields
			   var countryName = iti.getSelectedCountryData().iso2;
                 var countryCode = iti.getSelectedCountryData().dialCode;

                 $('#code').val(countryCode);
                 $('#country').val(countryName);
				
			
		let everything_ok = true;

		if(!jQuery(".custom-price-buttons").hasClass("button-selected")){
			jQuery(".custom-price-buttons .rwd-common-error").text("please select a price for reward.");
			everything_ok = false;
		}else{
			jQuery(".custom-price-buttons .rwd-common-error").text("");
		}




		if(!jQuery(".tchknwdev-custom-fields.for-rwdprice").is(":hidden")){
			var selected_range = jQuery(".custom-price-buttons button.selected").text();
		  	selected_range = selected_range.split("-");

		  	var inRange_var = inRange(parseInt(jQuery(".tchknwdev-custom-fields input").val()), parseInt(selected_range[0]), parseInt(selected_range[1]));
			  
		  	if(!inRange_var){
			  	jQuery(".tchknwdev-custom-fields.for-rwdprice .rwd-range-error").text("Please enter a price within the selected range.");
			  	everything_ok = false;
		  	}else{
		  		jQuery(".tchknwdev-custom-fields.for-rwdprice .rwd-range-error").text("");
		  	}
			
			//$(#test).value(inRange_var);
			
			// alert(selected_range);
		}
    // if(jQuery('.tchknwdev-custom-fields').hasClass('for-rwdemail')){
		if(jQuery(".tchknwdev-custom-fields.for-rwdemail input").val()==""){
			jQuery(".tchknwdev-custom-fields.for-rwdemail .rwd-email-error").text("Please enter email ID");
			everything_ok = false;
			//console.log(1);
		}else if(!isValidEmailAddress( jQuery(".tchknwdev-custom-fields.for-rwdemail input").val() )){
			jQuery(".tchknwdev-custom-fields.for-rwdemail .rwd-email-error").text("Please enter valid email ID");
			everything_ok = false;
			//console.log(2);
		}else{
			jQuery(".tchknwdev-custom-fields.for-rwdemail .rwd-email-error").text("");
		//everything_ok = true;
		//console.log(3);
		}
	 //}
	//else if(jQuery('.tchknwdev-custom-fields').hasClass('for-rwdnumv')){
		 if(jQuery(".tchknwdev-custom-fields.for-rwdnumv input").val()==""){
			jQuery(".tchknwdev-custom-fields.for-rwdnumv .rwd-phone-error").text("Please enter mobile number");
			everything_ok = false;
			console.log(4);
		}else if(!phonenumber( jQuery(".tchknwdev-custom-fields.for-rwdnumv input").val() )){
			jQuery(".tchknwdev-custom-fields.for-rwdnumv .rwd-phone-error").text("Please enter valid number");
			everything_ok = false;
			console.log(5);
		}else{
			
			jQuery(".tchknwdev-custom-fields.for-rwdnumv .rwd-phone-error").text("");
	     //everything_ok = true;
		 //console.log(6);
		}
	     //} 

		if(everything_ok){
		
			jQuery(this).hide();
			jQuery(this).next().show().trigger('click');
		}
		

	});

	//on single product page, onlcick on range buttons on reward products
	jQuery(".custom-price-buttons button").click(function(e){
		e.preventDefault();
		jQuery(this).parent().addClass("button-selected");

		jQuery(".custom-price-buttons button").removeClass("selected");
		jQuery(this).addClass("selected");

		var button_type = jQuery(this).data('range');
		if(button_type==0){
			jQuery(".tchknwdev-custom-fields.for-rwdprice").hide();
			jQuery(".tchknwdev-custom-fields.for-rwdprice input").val(jQuery(this).text());
		}else{
			jQuery(".tchknwdev-custom-fields.for-rwdprice input").val("");
			jQuery(".tchknwdev-custom-fields.for-rwdprice").show();
		}
	});
	
	
	jQuery(window).scroll(function(){
  var sticky = jQuery('#page-header'),
      scroll = jQuery(window).scrollTop();

  if (scroll >= 100) { sticky.addClass('header-pinned'); }
  else { sticky.removeClass('header-pinned'); }
});


});

function inRange(n, nStart, nEnd)
{
    if(n>=nStart && n<=nEnd) return true;
    else return false;
}

function isValidEmailAddress(emailAddress) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(emailAddress);
};
function phonenumber(contact)
		{
		var phoneno = /^(\+|\d)[0-9]{6,15}$/;
		return phoneno.test(contact);
		return true;
		};
jQuery(document).ready(function(){
	if(!jQuery('body').hasClass('home')){
		jQuery('body').addClass('all_main_headers_mk');
	}
});

