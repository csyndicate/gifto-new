jQuery(document).ready(function(){

	//for reward products proce and email field checks
	jQuery(".single-product form.cart").submit(function( e ){
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
		}

		if(jQuery(".tchknwdev-custom-fields.for-rwdemail input").val()==""){
			jQuery(".tchknwdev-custom-fields.for-rwdemail .rwd-email-error").text("Please enter an email, the reward has been sent to");
			everything_ok = false;
		}else if(!isValidEmailAddress( jQuery(".tchknwdev-custom-fields.for-rwdemail input").val() )){
			jQuery(".tchknwdev-custom-fields.for-rwdemail .rwd-email-error").text("Please enter an email, the reward has been sent to");
			everything_ok = false;
		}else{
			jQuery(".tchknwdev-custom-fields.for-rwdemail .rwd-email-error").text("");
		}

		if(!everything_ok){
			e.preventDefault();
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