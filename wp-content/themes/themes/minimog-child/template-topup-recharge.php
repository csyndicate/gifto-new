<?php     
/*
Template Name: Top-up Recharge page
*/
get_header();
?> 
<style>
p.sel_count_heading {
    float: left;
    width: 100%;
    text-align: center;
    font-size: 24px;
    font-weight: bold;
}
.sel_data {float:left; width: 24%;}

video{
	display:none;
}

.inner_sel_country {
    float: left;
    width: 100%;
}

/* div.active_country_data {
    display: none;
} */
.container{
	
width:50%;
margin: auto;	
	
}

.cntry_flags_dd{
	
	display:none;
}

input.nosubmit {
 
  background: transparent url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' class='bi bi-search' viewBox='0 0 16 16'%3E%3Cpath d='M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z'%3E%3C/path%3E%3C/svg%3E") no-repeat 13px center;
}
.mk_newdd{
	display:none;	
}
.new_data_entry_md{
	display:none;	
}
</style>
<?php 
global $wpdb;

?>
<div class="container">
	<div class="country_outer">	
		
		<div class="country_name">
			<h4>Who are you sending top-up to?</h4>
			<div class="flags_dataa" style="display:none;">
				<div class="inner_sel_country">
					<p class="sel_count_heading">Who would you like to top-up?</p>
					<div class="sel_count sel_data">Country: </div>
					<div class="sel_flag sel_data"><img src="" style="width:20px;"></div>
					<div class="sel_country sel_data"></div>
					<div class="edit_country sel_data"><a href="javascript:void(0)"> Edit</a></div>
			    </div>
			</div>
				<div class="select_country">
				<input type="text" name="cntry_flags_name"  id ="cntry_flags_name" class="cntry_flags_name"/>
				<input type="text" name="cntry_flags_dd"  id ="cntry_flags_dd" class="cntry_flags_dd" value="" />
				
				<div class="country_list" style="display:none">
				<?php 
				$table_name = $wpdb->prefix."counrtry_table";

				$cntry_result = $wpdb->get_results( "SELECT * FROM `$table_name`" );

				if( $cntry_result > 0 ) 	
				{		
					foreach( $cntry_result as $row )
					{  
						$countryname = $row->countryname;
						//echo $countryname;
						$regincode = $row->regioncodes;
						//$regincode; 
						$prefix =$row->prefix; 
						
						 $filename = get_site_url()."/wp-content/themes/minimog-child/flagsandlogos/flags/".$regincode.".png";
						 
							if (@getimagesize($filename)) {
							$cntry_flag = get_site_url().'/wp-content/themes/minimog-child/flagsandlogos/flags/'.$regincode.'.png';
							} else {
							 $cntry_flag = get_site_url().'/wp-content/themes/minimog-child/flagsandlogos/flags/US.png';
							}
								
								?> 
								
							<div class='cntry_data' >
							<div class='row' >
								<p data-target="#cntry_img" data-cname = "<?php echo $countryname;?>" data-ccode = "<?php echo $prefix; ?>" data-cflag = "<?php echo $cntry_flag;  ?>">
									<img id="cntry_img" class ="cntry_img " src="<?php echo $cntry_flag; ?>" width="30px;" height="20px;"> 
									<span class="cntry_name">
									<?php echo $countryname;?>
								</span>
								<span class="cntry_code">
									<?php $cuntrynum = ' +'. $prefix;
										echo $cuntrynum;?>	
								</span>
								</p>
								
							</div>
						</div>
						
						<?php	
					}
				}  ?>
		</div>
		<div class="mobile_err"></div>
		<button type ="submit" id="sub_btn" name="sumbit"> Start top-up</button>
		</div>
		</div>
		
	</div>	
</div>
<!--div class="container mk_newdd">

	<center><h4>Who would you like to top-up?</h4></center>
	<div class="row">
	<p>Country:</p>
	<p><span class="dd_cntry"></span>
	<span><a class="back_cntry_data" href ="https://43523f7b3b.nxcli.net/test/" style="color:#DB49CB;">edit</a></span>
	</div>
</div-->	
<div class="container new_data_entry_md">
<input type ="text" name="txt_phnmbr" id="txt_phnmbr" class="txt_phnmbr" value=""/>

<button type="submit" value="submit" id="subnewmit">Start topup</button> 
</div>	

<script>


	
	 jQuery( '.cntry_flags_name' ).click( function(){
		jQuery(this).hide();
		jQuery( '.cntry_flags_dd' ).show();
		jQuery( '.cntry_data' ).toggleClass( 'active_country_data' );
	}); 
	jQuery( '.flags_data' ).click( function(){
		jQuery( '.cntry_data' ).toggleClass( 'active_country_data' );
		jQuery( this ).show( 'cntry_data' );
		
		
	});
/** To select country from dropdown **/	
	jQuery( '.cntry_data' ).click( function(){
		jQuery('.cntry_data').removeClass( 'active_country' );
		jQuery('.cntry_flags_dd').val('');
		
		//jQuery( '.cntry_data' ).addClass( 'active_country_data' );
		jQuery(this).addClass( 'active_country' );
		jQuery('.country_list').css('display','none');
			var c_name = jQuery('.cntry_data.active_country .cntry_name').text();
			var c_code = jQuery('.cntry_data.active_country .cntry_code').text();
			var flafd = jQuery( '.cntry_data.active_country .cntry_img' ).attr( 'src' );
			var data = c_name+' '+c_code;
			
			var data1 = c_code.replace( /[\s\n\r]+/g, ' ' ).trim(); 
			var data2 = data1.replace('+','');
			
			jQuery( '.country_name h4' ).css('display','none');
			// jQuery( '.flags_data' ).html(data2);
			  jQuery( '.flags_dataa .sel_country' ).text(c_name);
			  jQuery('.flags_dataa .sel_flag img').attr('src', flafd);
			  jQuery( '.flags_dataa').css('display','block');
			 
			//jQuery('.mk_newdd p span.dd_cntry').html(data2);
			var rs = jQuery('.cntry_flags_dd').val(data2);
		//console.log(data2);
		
		jQuery('.select_country').css('display','none');
		jQuery('.new_data_entry_md').css('display','block');
		jQuery('.txt_phnmbr').val(data1);
		
			
	
	});

/*** For edit selected country **/
jQuery("div.edit_country a").click( function(){
	//alert('hello');
	jQuery('.flags_dataa').css('display','none');
	jQuery('.cntry_flags_dd').val('');
	jQuery('.cntry_data').removeClass( 'active_country' );
	jQuery('.cntry_data').css('display','none');
	jQuery( '.country_name h4' ).css('display','block');
	jQuery('.select_country').css('display','block');
	jQuery('.new_data_entry_md').css('display','none');

});


//filter data
jQuery(document).ready(function(){
	 jQuery("#cntry_flags_dd").focus(function() {
  jQuery('.country_list').css( 'display','block' );
})
 /* jQuery("#cntry_flags_dd").focusout(function() {
  jQuery('.country_list').css( 'display','none' );
}) */
	 
/** Filter Countries on key up **/	 
jQuery("#cntry_flags_dd").on("keyup", function() {
	
	  var value = '+'+jQuery(this).val().toLowerCase();
    jQuery(".cntry_data").filter(function() {
		 jQuery(this).toggle(jQuery(this).text().indexOf(value) > -1);
    }); 
	
	
	var filter_length = jQuery(".cntry_data:visible").length;
	//console.log(filter_length);
	
	/*** Hit when country matched **/
	if(filter_length == 1){
	/*   console.log(jQuery(".cntry_data:visible .cntry_name").text());
	   console.log(jQuery(".cntry_data:visible .cntry_code").text());
	   console.log(jQuery(".cntry_data:visible .cntry_img").attr('src'));  */
	   
		// jQuery( '.flags_data' ).html(data2);
		var cc_ode = jQuery(".cntry_data:visible .cntry_code").text();
		var cc_ode1 = cc_ode.replace( /[\s\n\r]+/g, ' ' ).trim(); 
	   jQuery( '.flags_dataa .sel_country' ).text(jQuery(".cntry_data:visible .cntry_name").text());
	   jQuery('.flags_dataa .sel_flag img').attr('src', jQuery(".cntry_data:visible .cntry_img").attr('src'));
	   jQuery( '.flags_dataa').css('display','block');
	   jQuery('.country_list').css('display','none');
	   jQuery(".cntry_data:visible").addClass( 'active_country' );
	   jQuery( '.country_name h4' ).css('display','none');
	   jQuery(".cntry_data:visible").css('display','none');
	   
	   jQuery('.select_country').css('display','none');
	   jQuery('.new_data_entry_md').css('display','block');
	   console.log(cc_ode);
	   jQuery('.txt_phnmbr').val(cc_ode1);
	  
	}
	
	/** Show error message if country not found**/
    if (filter_length == 0){
			jQuery('.mobile_err').text('Country code not matched!');
		}
	else {
		jQuery('.mobile_err').text('');
	}
	
	jQuery('.country_list').css('display','block');
	
	  /* if((jQuery('#cntry_flags_dd').val().length == 4) ){
				//alert("ww");
				//jQuery('.mk_newdd').show();
				//jQuery('.country_outer').hide();
				//jQuery('.new_data_entry_md').show();
				var inputffild= jQuery('.cntry_flags_dd').val();
				var c_cd = jQuery('.cntry_code').text(); 
				alert(inputffild);
				//jQuery('.new_data_entry_md .txt_phnmbr').val(inputffild);
				
	 } */
	 
  
  });
}); 



</script>
	
			
<?php get_footer(); ?> 