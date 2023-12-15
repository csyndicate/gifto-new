<?php
if(!empty($args)){

$get_providers_array = $args['get_providers_array'];


if($get_providers_array['ResultCode'] == 1){
		$provider_Items = $get_providers_array['Items'];
		/* $operator_name = $provider_Items[0]['Name'];
		$operator_logo = $provider_Items[0]['LogoUrl']; */
		?>
		
<div class="choose-network hide_operators <?php /* if(count($provider_Items) == 1){ echo 'hide_operators'; } */ ?>" id="operator_detail" >
	<div class="choose-network-inner">
		<div class="choose-heading">
			<h4>Choose the correct operator</h4>
		</div>
		<div class="choose-network-main">
		<?php
		foreach($provider_Items as $Item){
		?>

			<div class="choose-box mobile_operator" id="mobile_operator" data-provider-code="<?php echo $Item['ProviderCode']; ?>"  data-provider-name="<?php echo $Item['Name']; ?>"  data-provider-logo="<?php echo $Item['LogoUrl']; ?>" >
				<div class="choose-img">
					<img src="<?php echo $Item['LogoUrl']; ?>">
				</div>
				<div class="choose-txt">
					<a href="javascript:void(0)"><span><?php echo $Item['Name']; ?></span></a>
				</div>
			</div>
					
		<?php
		}
		?>
		</div>
	</div>
</div> 

		<?php
}


}
?>