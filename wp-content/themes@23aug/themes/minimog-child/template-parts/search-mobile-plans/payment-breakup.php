<?php
if(!empty($args)){
/* echo '<pre>';
print_r($args['response']);
echo '</pre>';  
 */
$Items_array = $args['Items_array'];

if(!empty($Items_array)){
		//	echo '<pre>';
			//print_r($Items_array);
			$max_ReceiveValue = $Items_array[0]['Maximum']['ReceiveValue'];
			$ReceiveCurrencyIso = $Items_array[0]['Maximum']['ReceiveCurrencyIso'];
			$max_SendValue = $Items_array[0]['Maximum']['SendValue'];
			$SkuCode = $Items_array[0]['SkuCode'];
			$convenience_fee = $max_ReceiveValue * 5 / 100;
			$total_amount = $convenience_fee + $max_ReceiveValue;
			
			$new_amnt = convertCurrency($total_amount,$ReceiveCurrencyIso,'AED');
			 
			//$this->var = $total_amount ;
			
			
			?>
			
			<div class="subtotal-outer">
				<div class="subtotal-text">
					<p>Subtotal</p>
					<span><?php echo $max_ReceiveValue; ?> <?php echo $ReceiveCurrencyIso; ?></span>
				</div>
				
				<div class="subtotal-text">
					<p>Convenience Fee <i class="fas fa-info-circle custooltip"> <span class="cus_tooltiptext cus_arrow_box">This is for third-party payment processing, applicable taxes, customer support & service to maintain our platform</span></i></p>
					<span><?php echo $convenience_fee; ?> <?php echo $ReceiveCurrencyIso; ?></span>
				</div>
				<div class="subtotal-text you-pay">
					<p>You pay</p>
					<span><?php echo $total_amount; ?> <?php echo $ReceiveCurrencyIso; ?> only</span>
				</div>
				
			</div>
			
			<?php
			
}



}