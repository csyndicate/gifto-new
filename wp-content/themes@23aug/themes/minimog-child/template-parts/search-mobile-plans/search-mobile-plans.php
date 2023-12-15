<?php
if(!empty($args)){
/* echo '<pre>';
print_r($args['response']);
echo '</pre>';  
 */
$response = $args['response'];
$immediate_providers = $args['immediate_providers'];
$all_Benefits_array = $args['all_Benefits_array'];

/* $immediate_providers = array();
	if($response->ResultCode == 1){
			$Items = $response->Items;
			$Items_array = json_decode(json_encode($Items), true);
			if(!empty($Items_array)){
				
			foreach($Items_array as $print){
				if($print['RedemptionMechanism']=='Immediate'){
				//echo $print['ProviderCode'];
					$immediate_providers[] = $print; 
					$Benefits_array = $print['Benefits']; 
					
					if (in_array("Minutes", $Benefits_array))
					  {
					 // echo "Match found";
					  }
  
				}
				
				}
			}
		}
		 */
		//echo '<pre>';
		//print_r($response);
		//die('here');
		
?>


<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css"/>

<div class="tab-outer">
	<div class="container" id="plan_pre_bx">
		<div class="tab-inner-sec">
		  <ul class="tabs">
		  <?php 
		  if(in_array("Minutes", $all_Benefits_array))
		  {
			?>
				<li class="active"><a href="#topup">Phone top-up</a></li>
			<?php			
		  }
		  ?>
		  <?php 
		  if(in_array("Data", $all_Benefits_array))
		  {
			  ?>
			  <li class="<?php if(!in_array("Minutes", $all_Benefits_array)){ echo 'active'; }  ?>" ><a href="#plans">Plans</a>
			  <?php
		  }
		  ?>
			
			
			</li>
		   <!-- <li><a href="#contact">Contact</a>
			</li>-->
		  </ul>
		  <div class="tabsContainer"> 
			<div class="tabWrapper">
			
			
			
			  <?php 
		  if(in_array("Minutes", $all_Benefits_array))
		  {
			?>
			
			  <div id="topup" class="topup-outer tabContent">
				<div class="commmon-heading">
					<h4>Please choose an amount to continue</h4>
					<p>Final payable amount may vary & include VAT and/or nominal processing or convenience fee.</p>
				</div>
				<div class="topup-content">
				<!--
					<div class="topup-box">
						<div class="great-val">
							<span>Great value</span>
						</div>
						<div class="top-up-price">
							<h4>INR 500 Full talktime</h4>
							<span>500.00 INR</span>
						</div>
						<div class="top-up-total-price">
							<p>Total including fees: 624.99 INR</p>
						</div>
					</div>--->
					
					
			
			
								<?php

			if(!empty($response)){
		
			foreach($response as $print){
				
					$Benefits_array = $print['Benefits']; 
					
					if (in_array("Minutes", $Benefits_array))
					  {
						  $total_amount = $print['Maximum']['ReceiveValue'] * 5 / 100;
						  $total_amount = $total_amount + $print['Maximum']['ReceiveValue'];
					 ?>
					 
					 
				<div class="topup-box plans-box mobile_plan" data-plan="<?php echo $print['DefaultDisplayText'] ?>" data-plan-skucodes="<?php echo $print['SkuCode'] ?>" >
					<h4><?php echo $print['DefaultDisplayText'] ?></h4>
					<span><?php echo $print['ValidityPeriodIso']; ?></span>
					<div class="inner-text"><p><?php echo $print['product_description']['DescriptionMarkdown']; ?></p></div>

					<h6>Total including fees: <?php echo $total_amount; ?> <?php echo $print['Maximum']['ReceiveCurrencyIso']; ?></h6>
				</div>
					
					
					
					 <?php
					  }
  
				}
				
			}
		
		?>
		
		
					
		
					
				</div>
			  </div>
		<?php
		}
		?>		  
			  
			  
			  <div id="plans" class="plans-outer tabContent">
				<div class="commmon-heading">
					<h4>Please choose an amount to continue</h4>
					<p>Final payable amount may vary & include VAT and/or nominal processing or convenience fee.</p>
				</div>
				<div class="topup-content plan-content">
				
				
				
						<?php

			if(!empty($response)){
			
			foreach($response as $print){
				
					$Benefits_array = $print['Benefits']; 
					
					if (in_array("Data", $Benefits_array))
					  {
						  $total_amount = $print['Maximum']['ReceiveValue'] * 5 / 100;
						  $total_amount = $total_amount + $print['Maximum']['ReceiveValue'];
					 ?>
					 
					 
					 <div class="topup-box plans-box mobile_plan" data-plan="<?php echo $print['DefaultDisplayText'] ?>" data-plan-skucodes="<?php echo $print['SkuCode'] ?>" >
						<h4><?php echo $print['DefaultDisplayText'] ?></h4>
						<span><?php echo $print['ValidityPeriodIso']; ?></span>
						<div class="inner-text"><p><?php echo $print['product_description']['DescriptionMarkdown']; ?></p></div>
					
						<h6>Total including fees: <?php echo $total_amount; ?> <?php echo $print['Maximum']['ReceiveCurrencyIso']; ?></h6>
					</div>
					
					
			
					
					 <?php
					  }
  
				}
				
			}
		
		?>
		

				</div>
			  </div>
			
			</div>
		  </div>
		 </div>
	</div>
</div>

<script>
/*==============================Tabs Functionality==========================*/
$(function(){
	'use strict';
	/*Activate default tab contents*/
	var leftPos, newWidth, $magicLine, defaultActive;  
	
	defaultActive = $('.tabs li.active a').attr('href');
	$(defaultActive).show();
				
	$('.tabs').append("<li id='magic-line'></li>");
	$magicLine = $('#magic-line');		    
	$magicLine.width($('.active').width())
		.css('left', $('.active a').position().left)
		.data('origLeft', $magicLine.position().left)
		.data('origWidth', $magicLine.width());				
		
	$('.tabs li a').click(function(){
		var $this,tabId,leftVal,$tabContent;
		$this = $(this);
		$tabContent = $('.tabContent');
		$this.parent().addClass('active').siblings().removeClass('active');
		tabId = $this.attr('href');		
		
		leftVal = $($tabContent).index($(tabId)) * $tabContent.width() * -1;
		$('.tabWrapper').stop().animate({left:leftVal});
		
		$magicLine
			.data('origLeft',$this.position().left)
			.data('origWidth',$this.width() + 40);				
		return false;
	});		
	
	/*Magicline hover animation*/
	$('.tabs li').find('a').click(function() {
		var $thisBar = $(this);
		leftPos = $thisBar.position().left;	
		newWidth = $thisBar.parent().width();
		$magicLine.stop().animate({left:leftPos,width:newWidth});
	}, function() {
		$magicLine.stop().animate({left:$magicLine.data('origLeft'),width: $magicLine.data('origWidth')});    
	});		
});
/*==============================End Tabs Functionality==========================*/
</script>


<?php
}
?>