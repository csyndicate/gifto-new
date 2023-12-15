                                                                                          <?php
/**
* Template Name: Add Reward Products
*
* @package WordPress
* @subpackage Twenty_Twenty_One
* @since Twenty Twenty One  1.0
*/

get_header(); ?>

<form method="post" action="">
	<button name="addrwrdprds" type="submit">Add Reward Products</button>
</form>
<?php $curt = $_SERVER['SERVER_ADDR'];?>
<?php 
//uncomment to test
// echo convertCurrency(1, 'USD', 'INR');

	
	if(isset($_POST['addrwrdprds'])){

		$xoxo_access_token = get_field('access_token', 'option');

		//$curl = curl_init();

		//$api_url_temp = get_field('api_url', 'option');
		//$api_url = $api_url_temp."/v1/oauth/api";

		

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://accounts.xoxoday.com/chef/v1/oauth/api',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
			"query": "plumProAPI.mutation.getVouchers",
			"tag": "plumProAPI",
			"variables": {
				"data":{
				    "limit": 600,
		  	    "page": 12
		   }
			}
		}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization: Bearer '.$xoxo_access_token.' '
  ),
));

$response = curl_exec($curl);
$response = json_decode($response, true);
$err = curl_error($curl);

						//print_r ($response);
						//echo "</pre>"; */
		//curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			$exists_rwd_products = array();
			$rwd_products_insertion_error = array();
			$inserted_rwd_products = array();
			// $total_aed_products = 0;
			$rwdcounter = 1;
			$rwd_prds = $response['data']['getVouchers']['data'];

			//create array of Product ids of all existing Products
				$products_IDs = array();
				$all_ids = get_posts( array(
				        'post_type' => 'product',
				        'numberposts' => -1,
				        'post_status' => 'publish',
				        'fields' => 'ids',
				   ) );
				foreach ( $all_ids as $id ) {
				    array_push($products_IDs, $id);
				}			
			//END create array of Product ids of all existing Products
			// unset($rwd_prds[0]);
			// unset($rwd_prds[1]);
			foreach ($rwd_prds as $rwdkey => $rwdvalue) {
				//if($rwdcounter==5)
				//break; 

		        //if($rwd_prds[$rwdkey]['productId']=='90954')
					//continue;

				 //if($rwd_prds[$rwdkey]['id']!="O7VZ5WQOCUQM")
				 //	continue;

				// if (!in_array("AED", $rwd_prds[$rwdkey]['currency_codes'])) {
				 //	$rwdcounter++;
				   //  continue;
				// }else{
				 //	$total_aed_products = $total_aed_products+1;
				// }

				//function define in functions.php()
					
				$rwd_prd_add = addRewardProduct($rwd_prds[$rwdkey]);
				if($rwd_prd_add['code']==2){
					array_push($exists_rwd_products,$rwd_prd_add);
					if (($key = array_search($rwd_prd_add['productId'], $products_IDs)) !== false) {
					    unset($products_IDs[$key]);
					}
				}elseif($rwd_prd_add['code']==3){
					array_push($rwd_products_insertion_error,$rwd_prd_add);
				}elseif($rwd_prd_add['code']==1){
					array_push($inserted_rwd_products,$rwd_prd_add);
				}
				$rwdcounter++;
			}

			//echo "<pre>";
			//print_r($products_IDs);
			//echo "</pre>";
			foreach ($products_IDs as $id_prd) {
				//wp_delete_post( $id_prd, false );
			}

			$root_path = ABSPATH;
			$inserted_rwd_products_logs = fopen($root_path."add_xoxorwd_prods_logs.txt", "a+");
            //$counts = count($rwd_prds);
			$file_content = "\n";
			$file_content .= "Total Products API retuns: ".count($rwd_prds);;
			$file_content .= "\n";
			$file_content .= "Total Products Looped: ".($rwdcounter-1);
			// $file_content .= "\n";
			// $file_content .= "Total AED Products Looped: ".($total_aed_products);			
			$file_content .= "\n";
			$file_content .= "++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++";
			$file_content .= "\n";
			$file_content .= date("Y-m-d h:i:sa");
			$file_content .= "\n";
			$file_content .= "Exists Products: ". count($exists_rwd_products);
			$file_content .= "\n";
			$file_content .= print_r($exists_rwd_products, TRUE);
			$file_content .= "\n";
			$file_content .= "Products With insertion error: ". count($rwd_products_insertion_error);
			$file_content .= "\n";
			$file_content .= print_r($rwd_products_insertion_error, TRUE);
			$file_content .= "\n";
			$file_content .= "Inserted Products: ". count($inserted_rwd_products);
			$file_content .= "\n";
			$file_content .= print_r($inserted_rwd_products, TRUE);
			$file_content .= "\n";

			fwrite($inserted_rwd_products_logs, $file_content);
			fclose($inserted_rwd_products_logs);

			echo "Product Insertion log is added to a file in root with name 'add_xoxorwd_prods_logs.txt'";

		  	
		}
	}
?>
<!--<script type="text/javascript">
$(window).on("load", function () {
 $('#addrwdbtn').click(function(){
        alert('button clicked');
    });
  // set time out 5 sec
     setTimeout(function(){
        $('#addrwdbtn').trigger('click');
    }, 4000);
});
</script>-->
<?php get_footer();?>