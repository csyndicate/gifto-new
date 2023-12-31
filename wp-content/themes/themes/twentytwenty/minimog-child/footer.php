<?php
/**
 * The template for displaying the footer.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Minimog
 * @since   1.0
 */

?>
</div><!-- /.content-wrapper -->
<?php Minimog_THA::instance()->footer_before(); ?>

<?php minimog_load_template( 'footer/entry' ); ?>

<?php Minimog_THA::instance()->footer_after(); ?>

</div><!-- /.site -->
<script>
jQuery(document).ready(function(){
	jQuery('.browsegift-custom').click(function (e) {
			 
		var sndgiftss=jQuery('.gift-options').val();
		var name= document.getElementById('name').value;
		var country = document.getElementById('filterc_country').value;
		var countri_mk = document.getElementById('mk_filter').value;
		var country2 =jQuery('.gift_mk .filterc_country').val();
		var name2 =document.getElementById('name2').value;
		   
				 
		/* if(name == ''){
			document.getElementById("error").innerHTML ="<span class='demo' style='color:red'>Name must not be empty</span>";
		}else{
			document.getElementById("error").innerHTML =""; 
				 
		}
			  */
	 
		if(countri_mk == ''){
			document.getElementById("countryerror").innerHTML = "<span class='demo' style='color:red'>Please select a country</span>";		 
		}
		else{
			document.getElementById("countryerror").innerHTML =""; 
		}
			 
		if(country2 == ''&& sndgiftss =='2'){
			document.getElementById("countryerror2").innerHTML = "<span class='demo' style='color:red'>Please select a country</span>";		 
		}
		else{
			document.getElementById("countryerror2").innerHTML =""; 
		}
			 
		/* if(name2 == '' &&  sndgiftss =='2'){
			document.getElementById("error2").innerHTML ="<span class='demo' style='color:red'> His/her name must not be empty</span>";
		}
		else{
			document.getElementById("error2").innerHTML =""; 
		} */
			 
			 
			
	});
});
</script>
<script>
	jQuery(document).ready(function(){
		
		
		jQuery('.sedgift-custom').hide();
		jQuery('.gift-options').change(function () {
		 var gift_txtmk = jQuery('.gift-options').val();
			 if(gift_txtmk == '2'){

				 jQuery('.sedgift-custom').show();
			 } else if(gift_txtmk == '1'){

				 jQuery('.sedgift-custom').hide();
			 }

		});

		jQuery('.browsegift-custom').click(function () {
			var name= document.getElementById('name').value;
			var countri_mk = document.getElementById('mk_filter').value;
			var country2 =jQuery('.gift_mk .filterc_country').val();
			var name2 =document.getElementById('name2').value;
			var cntry = jQuery('.filterc_country').val();
			var cntry_mk = jQuery('#mk_filter').val();
			var sndgift=jQuery('.gift-options').val();
			var gift_cntry = jQuery('.gift_mk .filterc_country').val();
				if(cntry_mk != '' && sndgift == 1){
					window.location= "https://43523f7b3b.nxcli.net/shop/?filterc_country="+cntry_mk;
					//alert(2);
				}
				else if(gift_cntry != '' && sndgift == '2'&& country2 != ''&& cntry_mk != ''){
					// alert(gift_cntry);
				window.location= "https://43523f7b3b.nxcli.net/shop/?filterc_country="+gift_cntry; 
				}
		});
		
		/* jQuery(function (){
		  var $buttonTop = jQuery('.button-top');

		  $buttonTop.on('click', function () {
			jQuery('html, body').animate({
			  scrollTop: 0,
			}, 800);
		  });
		});		 */
		
	});
	

</script>


 <!----for country code with flag---->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/intlTelInput.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/intlTelInput.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/utils.js"></script>
	<script>
	var telInput = $("#phone"),
  errorMsg = $("#error-msg"),
  validMsg = $("#valid-msg");

// initialise plugin
telInput.intlTelInput({

  allowExtensions: true,
  formatOnDisplay: true,
  autoFormat: true,
  autoHideDialCode: true,
  autoPlaceholder: true,
  defaultCountry: "AE",
  ipinfoToken: "yolo",

  nationalMode: false,
  numberType: "MOBILE",
  //onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
  //preferredCountries: ['sa', 'ae', 'qa','om','bh','kw','ma'],
  preventInvalidNumbers: true,
  separateDialCode: true,
  initialCountry: "AE",
  geoIpLookup: function(callback) {
  $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
    var countryCode = (resp && resp.country) ? resp.country : "";
    callback(countryCode);
  });
},
   utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/utils.js"
});

var reset = function() {
  telInput.removeClass("error");
  errorMsg.addClass("hide");
  validMsg.addClass("hide");
};

// on blur: validate
telInput.blur(function() {
  reset();
  if ($.trim(telInput.val())) {
    if (telInput.intlTelInput("isValidNumber")) {
      validMsg.removeClass("hide");
    } else {
      telInput.addClass("error");
      errorMsg.removeClass("hide");
    }
  }
});

// on keyup / change flag: reset
telInput.on("keyup change", reset);</script>

<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
// When page load
var input = $('#phone');
var iti = intlTelInput(input.get(0)); // Counrty dropdown-->


<?php wp_footer(); ?>
</body>
</html>

