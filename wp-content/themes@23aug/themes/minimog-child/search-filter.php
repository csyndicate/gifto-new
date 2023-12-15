<?php     
/*
Template Name: Search Filter
*/
get_header();
?> 

<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"> </script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!--<script src="https://js.stripe.com/v3/"></script>-->

<style>
.hide_operators{
	display:none;
}


</style>

<div class="preloader_bx">
<img src="<?php echo site_url(); ?>/wp-content/uploads/2022/09/preloader.gif">
</div>


<div id="number-error" class="response_notices"></div>

<div class="country_outer"> 
<form class="country-form" id="country_form" action="" method="post">
<div id="country_search_filter" >
<div class="country_pre">
	<div class="country-added-heading">
		<h4>Which mobile number would you like to top-up?</h4>
	</div>
	<div class="country-deatils">
		<div class="multi-country-heading">
			<span>Country:</span>
		</div>
		<div class="country-flag">
			<img src="" id="country_img_pre">
			<div id="country_name_pre"></div>
		</div>
		<div class="edit-country">
			<div id="edit_country" class="edit_number">Edit </div>
			<img src="/wp-content/uploads/2022/09/play.png">
		</div>
	</div>

	<div class="country-deatils" id="mobile_number_detail">
	    <div class="country-detail-number">
		<div class="multi-country-heading">
			<span>Number:</span>
		</div>
		<div class="country-flag">
			<div id="mobile_no_pre"></div>
		</div>
		<div class="edit-country">
			<div id="edit_number" class="edit_number">Edit </div>
			<img src="/wp-content/uploads/2022/09/play.png">
		</div>
		</div>
		
	</div>
	
	<div class="country-deatils country_operator" >
		<div class="multi-country-heading">
			<span>Operator:</span>
		</div>
		<div class="country-flag country-brand">
			<img id="operator_logo_pre" src="/wp-content/uploads/2022/09/jio.png">
			<div id="operator_name_pre" data-provider-code="" >jio</div>
		</div>
		<div class="edit_country_show">
			<div class="edit-country edit_operator_outer">
				<div id="edit_operator" class="edit_operator">Edit </div>
				<img src="/wp-content/uploads/2022/09/play.png">
			</div>
		</div>
	</div>
	
	
	<div class="country-deatils" id="mobile_plan_detail">
	    <div class="country-detail-number">
		<div class="multi-country-heading">
			<span>Receiver gets:</span>
		</div>
		<div class="country-flag">
			<div id="mobile_plan_pre">Add On Data: 12GB</div>
		</div>
		<div class="edit-country">
			<div id="edit_plan" >Edit </div>
			<img src="/wp-content/uploads/2022/09/play.png">
		</div>
		</div>
		
	</div>
	
</div> 

<div class="country-no-details">
	<p>Top-up talk-time and/or  mobile data packs for over 6 billion mobile numbers, in 150 countries & 600+ mobile networks now, in seconds!</p>
	<label>Please enter your or the recipient's mobile number</label>
	<p>(Prepaid numbers- upto 9 digits only without country code, 00, or +)</p>
	<div class="enter_nobox">
	<div id="search_drop_down" class="search_dropimg">
	<img src="<?php echo site_url(); ?>/wp-content/uploads/2022/09/search-icon.png" id="country_img_pre_drop">
	<svg width="8" height="8" viewBox="0 0 6 8" orientation="90" transform="rotate(90)"><g fill="none" fill-rule="evenodd"><g fill="#708c8c"><g><g><path d="M133.633 9.64l-2.865 3.438c-.353.424-.984.482-1.408.128-.047-.039-.09-.081-.128-.128l-2.865-3.438c-.354-.424-.296-1.055.128-1.408.18-.15.406-.232.64-.232h5.73c.552 0 1 .448 1 1 0 .234-.082.46-.232.64z" transform="translate(-647 -15940) translate(150 15752) translate(370 181) rotate(-90 130 11)"></path></g></g></g></g></svg>
	</div>
	<input type="text" id="search_input" class="search_input"  name="search_input" placeholder="Enter number" required autocomplete="off">
	
	<ul id="country_list" class="country_list">
   
	  
				<?php 
				$cntry_flag_url = ''; 
				$table_name = $wpdb->prefix."counrtry_table";
				$cntry_result = $wpdb->get_results( "SELECT * FROM `$table_name`" );
				if( $cntry_result > 0 ) 	
				{		
					foreach( $cntry_result as $row )
					{  
						$countryname = $row->countryname;
						//echo $countryname;
						$countryiso = $row->countryiso;
						//$regincode; 
						$prefix =$row->prefix; 
						
							 $cntry_flag = get_stylesheet_directory().'/flagsandlogos/flags/'.$countryiso.".png";
			
							if (file_exists($cntry_flag)) {
								$cntry_flag_url = get_stylesheet_directory_uri().'/flagsandlogos/flags/'.$countryiso.".png";
							}
							else{
								$cntry_flag_url = get_stylesheet_directory_uri() . '/flagsandlogos/flags/US.png';
							} 
								
						?> 
								<li data-value="<?php echo $prefix; ?>" data-img="<?php echo $cntry_flag_url; ?>" data-name="<?php echo $countryname; ?>" data-seachname="<?php echo strtolower($countryname); ?>"><img src="<?php echo $cntry_flag_url; ?>"> <?php echo $countryname; ?> <span>+<?php //echo $prefix; ?></span></li>
						<?php	
					}
				}
				?>
				
</ul>
</div>
<div class="start-topup-btn">
	<input type="submit" name="submit_topup" id="submit_topup" value="Start Top-up">
</div>
</div> 


<div id="operators_data_bx">
</div>

<div id="mobile_plans_bx">
</div>


<div class="payment_gateway_bx">


<div id="payment_breakup_bx">
</div>


    <div class="form-row">
		<label for="Name">Name</label>
		<input type="text" name="user_name" id="user_name" >
		<label for="email">Email* </label>
		<input type="email" name="user_email" id="user_email">
		<label for="email">Friend's Email</label>
		<input type="email" name="friend_email" id="friend_email">

        <!---<input type="text" name="amount" placeholder="Enter Amount">--->
        <!--<label for="card-element">
        Credit or debit card
        </label>
        <div id="card-element">-->
        <!-- A Stripe Element will be inserted here. -->
        <!--</div>-->
  
        <!-- Used to display form errors. -->
        <div id="card-errors" role="alert"></div>
    </div>
    <!--<button id="submit_payment" >Pay</button>-->
	<button id="submit_payment" name="submit_payment"  disabled = "true">Pay</button>
	<!--<input type="submit" name="btnDelete" value="Delete">-->
	
	
</div>

</form>
</div>
</div>

<?php

	

?>

<script>


/*=========================================================*/

function show_preloader(){
	$('.preloader_bx').show();
}
function hide_preloader(){
	$('.preloader_bx').hide();
}
jQuery(document).ready(function($){


hide_preloader();
   
/*========================vaidate emails============================*/

$.validator.addMethod('vaidate_emails', function (email) { 
		var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		return regex.test(email);
	}, 'Please add correct email address.');



$.validator.addMethod('vaidate_phone', function (search_input) { 
		var regex = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{2,10}$/;
		return regex.test(search_input);
	}, 'Please enter digits only.');


/*========================From Validation Methods============================*/
				
jQuery.validator.addMethod('customphone', function (value, element) {
	  
    return this.optional(element) || /^[+]?\d+$/.test(value);

}, "Please enter a valid number");


jQuery.validator.addMethod('country_code', function (value, element) {
	  
	  if($("#country_search_filter").hasClass("active_country")){
		  return true;
	  }
	  else{
		  return false;
	  }
  
}, "Please enter a valid number");

/*========================From Validations============================*/
$('body').on('click','#submit_topup, .mobile_operator',function(event){	
 var form = $("#country_form");
form.validate ({
	rules: {
		search_input: {
			required: true,			
			//USphone:false,
			//customphone: true,
			//country_code: true,
			minlength: 7,
			maxlength:14,
			vaidate_phone: true
		}
	},
	 messages: {
        search_input: {
            required: "This field is required",
            //number: "Please enter a valid digits",
            minlength: "Please enter minimum 7 number",
			 maxlength: "You reached the maximum number limit",
            //USphone: "Please enter a valid number",
        }
    }
});  

if (form.valid() === true) {
	event.preventDefault();
		 $('#number-error').html('');
		 show_preloader();
		 
		 
		 var ProviderCode = $(this).attr("data-provider-code");
		 var ProviderName = $(this).attr("data-provider-name");
		 var ProviderLogo = $(this).attr("data-provider-logo");
		 
		//alert(ProviderCode);
		$('#operator_name_pre').attr("data-provider-code", ProviderCode);
		$('#operator_name_pre').html(ProviderName);
		$('#operator_logo_pre').attr("src", ProviderLogo);
				
		
		
		
		
		var search_input = $('#search_input').val();
			new_search_input = $.trim(search_input);
			new_search_input = new_search_input.replace('+','');
		
		
 		var country_code = $('#country_name_pre').attr("country-code");
		var country_code_length = country_code.length;
		
		var new_country_code = new_search_input.slice(0, country_code_length);
		
		
		if(country_code == new_country_code){
			var number_without_code = new_search_input.slice(country_code_length);
		}
		else{
			var number_without_code = new_search_input;
		}
				 
		 
		 if(country_code != new_country_code){
			 $('#search_input').val('+' + country_code + new_search_input)
		 }
		 else{
			 var search_input_plus = search_input.slice(0, 1);
			 if(search_input_plus != '+'){
				 $('#search_input').val(+new_search_input)
			 }
		 }
		 
			var formdata = $('#country_form').serializeArray();
			var real_ProviderCode = $('#operator_name_pre').attr("data-provider-code");
			
		  formdata.push({
			name: 'ProviderCode',
			value: real_ProviderCode
		  });

      $.ajax({
        url: '/?wc-ajax=get_recharge_plans',
        type: 'post',
        cache: false,
        data: formdata,
        success: function success(resp) {
          //alert('hello world');
         // popup_loader.hide();
		   var json = $.parseJSON(resp);

			 if(json.success == 200){
				$('#mobile_plans_bx').html(json.search_result);
				$('#operators_data_bx').html(json.operators_data);
				change_input();
				var search_input = $('#search_input').val();
				/* $('#mobile_no_pre').html(search_input); */
				$('#mobile_no_pre').html('+' + country_code + ' '  + number_without_code);
				$('#mobile_number_detail').addClass('active_mobile_pre');
				$('#country_search_filter').addClass("active_number");
				
				
				if(real_ProviderCode == ''){
					$('#operator_name_pre').html(json.operator_name);
					$('#operator_logo_pre').attr("src", json.operator_logo);
					
					/* edit_operator */
				}
				/* console.log(json.total_operators); */
				
				if(json.total_operators>1){
					$('.edit_operator_outer').show();
				}
				else{
					$('.edit_operator_outer').hide();	
				}
				
				
				hide_preloader();
			 }

			 if(json.success == 400){
					$('#number-error').html(json.message);
					$('html, body').animate({
						scrollTop: $("#number-error").offset().top - 150
					}, 1000);
					hide_preloader();
			 }
        },
        error: function error() {//alert('not working');
        }
      }); 

}

});


 $(document).ready(function () {
	 
        $('#user_email').on('input change', function () {
            if ($(this).val() != '') {
                $('#submit_payment').prop('disabled', false);
            }
            else {
                $('#submit_payment').prop('disabled', true);
            }
        });
    });

$('body').on('click','#submit_payment',function(event){


 var form = $("#country_form");
form.validate ({
	rules: {
		user_name: {
			/* required: true */
		},
		user_email: {
			 required: true,
             email: true,
             vaidate_emails: true
		},
		friend_email: {
             email: true,
             vaidate_emails: true
		}
	}
	}); 
/*if (form.validate() === true) {

	event.preventDefault();
	$("#submit_payment").click(function (e) {
	
	 var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
	 var search_input = $('#search_input').val();
	 //console.log('search_input>>>',search_input)
	 var plan_skucodes = $('#mobile_plan_pre').attr("plan-skucodes");
	 //console.log('plan_skucodes>>>',plan_skucodes)
	 var total_amount = $('#search_input').val();
	 var  friend_email =$('#friend_email').val();  
	 var  user_name = $('#user_name').val();
	  var  user_email = $('#user_email').val();
		$.ajax({
            type : 'POST',
             url: ajaxurl, 
            data: {action: 'mamopay', search_input: search_input, skuCodes: plan_skucodes,friend_email: friend_email ,user_name: user_name , user_email: user_email},
			
			 success: function(data){
				    //console.log(data);
				window.location.href = data;     
			 },       
			      error:function (xhr, ajaxOptions, thrownError) 
			 {              
			   console.log('Filter ERROR STATUS: ' + xhr.status);          
			       console.log('Filter Error: ' + thrownError);            
			 }         
			 });
           
        });
	
   

}*/	
});	


function checkValue(value,arr){
  var status = false;
 
  for(var i=0; i<arr.length; i++){
    var country_code = arr[i];
    if(country_code == value){
      status = true;
      break;
    }
  }

  return status;
}

function add_search_globe(){
		$('#country_img_pre_drop').attr("src", globe_img);
		
	}
	
var country_img_pre = $('#country_img_pre');
var country_list = $('#country_list');
var search_input = $('#search_input');
var list_data = '';
var total_countries = $('#country_list li').length;
var search_img = "<?php echo site_url() . '/wp-content/uploads/2022/09/search-icon.png'; ?>";
var globe_img = "<?php echo site_url() . '/wp-content/uploads/2022/09/internet.png'; ?>";

var listItems = $("#country_list li");
var item_list_array = {};
var country_codes = [];
listItems.each(function(idx, li) {
    var country_code = $(li).data("value");
    var country_img = $(li).data("img");
    var country_name = $(li).data("name");
	 country_codes.push({
	 country_code: country_code,
	 country_img: country_img,
	 country_name: country_name
	 }) 
	 
	item_list_array[country_code] = {
		country_code: country_code,
	 country_img: country_img,
	 country_name: country_name,
	};

});

country_list.hide();

const arrayColumn = (country_codes, column) => {
    return country_codes.map(item => item[column]);
};
const country_code_array = arrayColumn(country_codes, 'country_code');
//console.log(country_code_array);




  
		
/*========================Search Contry============================*/		
//console.log(item_list_array[91]['country_img']);
$("#search_input").on("keyup", function() { 
	  var value = $(this).val().toLowerCase().trim();
	  
 var that = this;


  var searchTerm = $.trim(this.value);
	searchTerm = searchTerm.replace('+','');
  $('#country_list li').each(function(i, val) {
    if (searchTerm.length < 1) {
      $(this).show();
    } else {
      //$(this).toggle($(this).filter('[data-value*="' + searchTerm + '"]').length > 0);
      $(this).toggle($(this).filter(
	  
	  function (el) {
		  //console.log($(this).attr('data-value').indexOf(searchTerm) != -1);
  //return $(this).attr('data-value').indexOf(searchTerm) != -1
  
if ($(this).attr('data-value').match("^" + searchTerm + "")) {
	return true;
}
else if($(this).data('seachname').match("^" + searchTerm + "")){
	return true;
}
else{
	
}

  //return $(this).attr('data-value') == searchTerm
}

	  ).length > 0);
    }
  });


});

$("body").click(function() { 
	country_list.hide();
});  

$('body').on('click', '#search_drop_down, #search_input', function(event) {
	 event.stopPropagation();
	 $("#search_input").focus();
	if(!$("#country_search_filter").hasClass("active_country")){
		country_list.toggle();
		listItems.show();
	}
}); 




/*========================change input function============================*/
function change_input(){
	
		 $('#number-error').html('');
		 
	if(!$("#country_search_filter").hasClass("active_country")){
		country_list.show();
	}
	var search_input_val = $("#search_input").val();
	//console.log(search_input_val);
	//console.log(jQuery.inArray(search_input_val, country_code_array));
	
		mew_first_digites = search_input_val.replace('+','');
		first_digites = mew_first_digites.slice(0, 5)
		
		
	if(first_digites.length > 3){
	for(var k=2; k<5; k++){
		
		
		var first_digites_val = first_digites.slice(0, k);
		first_digites_result = item_list_array[first_digites_val];
		if(typeof first_digites_result != 'undefined'){
		
			
		
			//console.log(item_list_array[first_digites_result]['country_img']);
			//console.log(item_list_array[first_digites_result]);
		var country_code = first_digites_result['country_code'];
		var country_img = first_digites_result['country_img'];
		var country_name = first_digites_result['country_name'];
	
		
		if(country_code != '' && country_code == first_digites_val){
		//alert(country_img);
		//console.log(first_digites_val);
			country_list.hide();
			$('#country_img_pre').attr("src", country_img);
			$('#country_name_pre').html(country_name);
			$('#country_name_pre').attr("country-code", country_code);
			$('#country_search_filter').addClass("active_country");
			
		 
		  break;
		}
		
		}

		}
		
	  }  
	  
	  
	  
	if(first_digites.length > 1){
	if(checkValue(search_input_val,country_code_array)){
		//console.log(search_input_val);
		   
		   
		 new_first_digites = search_input_val.replace('+','');
		ffirst_digites = mew_first_digites.slice(0, 5);
		
	 for(var p=0; p<country_codes.length; p++){
		var country_code = country_codes[p]['country_code'];
		var country_img = country_codes[p]['country_img'];
		console.log(search_input_val.length);
		if(country_code != ''  && country_code == search_input_val){
		//alert(country_img);
			//country_list.hide();
			$('#search_input').val('+' + country_code);
			$('#country_img_pre_drop').attr("src", country_img);
		  status = true;
		  break;
		}
		else{
			add_search_globe();
		}
	  }  
   
	}
	}
	else{
		add_search_globe();
	}
	
	
	
}
$('body').on('keyup change', '#search_input', function(event) {
	change_input();
});

$('body').on('click', '#edit_country', function(event) {
	$('#search_input').val("");
	$('#country_search_filter').removeClass("active_country");
	$('#country_search_filter').removeClass("active_number");
	$('#mobile_number_detail').removeClass("active_mobile_pre");
	$('#country_img_pre_drop').attr("src", search_img);
	
});


$('body').on('click', '#country_list li', function(event) {
		list_data = $(this).data("value");
		search_input.val('+' + list_data);
		change_input();
}); 


$('body').on('click', '#submit_topup', function(event) {
		event.preventDefault();
		
    

  
   
  
		
});  

$('body').on('click', '#edit_number', function(event) {
	$('#mobile_number_detail').removeClass("active_mobile_pre");
	$('#country_search_filter').removeClass("active_number");
	$('#operator_detail').hide();
});


$('body').on('click', '#edit_operator', function(event) {
	$('#plan_pre_bx').hide();
	$('#country_search_filter').removeClass("active_plan");
	$('#operator_detail').removeClass("hide_operators");
	$('#operator_detail').show();
	
});


$('body').on('click', '#edit_country, #edit_number', function(event) {
$('#plan_pre_bx').hide();
$('#country_search_filter').removeClass("active_plan");
$('#operator_name_pre').attr("data-provider-code",'');
});



$('body').on('click', '.mobile_plan', function(event) {
	show_preloader();
	var mobile_plan = $(this).data("plan");
	var plan_skucodes = $(this).data("plan-skucodes");
	$('#mobile_plan_pre').html(mobile_plan);
	$('#mobile_plan_pre').attr('plan-skucodes',plan_skucodes)
	$('#plan_pre_bx').hide();
	
	var formdata = $('#country_form').serializeArray(); 
	var plan_skucodes = $('#mobile_plan_pre').attr("plan-skucodes");

      formdata.push({
        name: 'skuCodes',
        value: plan_skucodes
      });
 
      $.ajax({
        url: '/?wc-ajax=get_payment_breakup',
        type: 'post',
        cache: false,
        data: formdata,
        success: function success(resp) {
          //alert('hello world');
         // popup_loader.hide();
		   var json = $.parseJSON(resp);
			 if(json.success == 200){
				hide_preloader();
				$('#payment_breakup_bx').html(json.search_result);
				$('#country_search_filter').addClass("active_plan");
				$('#operator_detail').hide();
				
			 }

			 if(json.success == 400){
				  hide_preloader();
				 $('#card-errors').html(json.message);
		
			 }
        },
        error: function error() {//alert('not working');
        }
      }); 
	  

	
});

$('body').on('click', '#edit_plan', function(event) {
	$('#country_search_filter').removeClass("active_plan");
	$('#plan_pre_bx').show();
});


});
   
   
 /*=======================Mamopay generate  payment link=============================*/ 

$("#submit_payment").click(function (e) {
	//alert("fgf");
	e.preventDefault();
	 var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
	 //console.log('url>>>',ajaxurl);
	 var search_input = $('#search_input').val();
	 //console.log('search_input>>>',search_input)
	 var plan_skucodes = $('#mobile_plan_pre').attr("plan-skucodes");
	var total_amount = $('#search_input').val();
	 var  friend_email =$('#friend_email').val();  
	 var  user_name = $('#user_name').val();
	  var  user_email = $('#user_email').val();
	 //console.log('plan_skucodes>>>',plan_skucodes)
		$.ajax({
            type : 'POST',
             url: ajaxurl, 
            data: {action: 'mamopay', search_input: search_input, skuCodes: plan_skucodes,friend_email: friend_email ,user_name: user_name , user_email: user_email},
			
			 success: function(data){
				    console.log(data);
				window.location.href = data;     
			 },       
			      error:function (xhr, ajaxOptions, thrownError) 
			 {              
			   console.log('Filter ERROR STATUS: ' + xhr.status);          
			       console.log('Filter Error: ' + thrownError);            
			 }         
			 });
           
        });



</script>		
<?php get_footer(); ?> 

