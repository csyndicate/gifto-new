<?php
/**
* Template Name: Add Ding Products
*
* @package WordPress
* @subpackage Twenty_Twenty_One
* @since Twenty Twenty One  1.0
*/

get_header(); ?>

<form method="post" action="">
	<button name="adddingprodcts" type="submit">Add Ding Products</button>
</form>
<?php $curt = $_SERVER['SERVER_ADDR'];

//echo $curt; ?>
<?php
if(isset($_POST['adddingprodcts'])){


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.dingconnect.com/api/V1/GetProducts',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'api_key: AZnjZ0PMheJ6VoPTSG8hxf',
  ),
));


		$response = curl_exec($curl);
		$response = json_decode($response, true);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			$exists_rwd_products = array();
			$rwd_products_insertion_error = array();
			$inserted_rwd_products = array();
			// $total_aed_products = 0;
			$rwdcounter = 1;
			$rwd_prds = $response['Items'];
 
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
				}			 echo "<pre>";

			//END create array of Product ids of all existing Products
			// unset($rwd_prds[0]);
			// unset($rwd_prds[1]);
			
			foreach ($rwd_prds as $rwdkey => $rwdvalue) {
				
				if (in_array("DigitalProduct", $rwd_prds[$rwdkey]['Benefits'])) {
				
				//if($rwdcounter==2)
				//	break;
		
					$rwd_prd_add = addDingProduct($rwd_prds[$rwdkey]);
					if($rwd_prd_add['code']==2){
						array_push($exists_rwd_products,$rwd_prd_add);
						if (($key = array_search($rwd_prd_add['productId'], $products_IDs)) !== false) {
							unset($products_IDs[$key]);
						}
					}else if($rwd_prd_add['code']==3){
						array_push($rwd_products_insertion_error,$rwd_prd_add);
					}else if($rwd_prd_add['code']==1){
						array_push($inserted_rwd_products,$rwd_prd_add);
					}
					$rwdcounter++;
				}
			}
			foreach ($products_IDs as $id_prd) {
				//wp_delete_post( $id_prd, false );
			}
			 /* echo "<pre>";
			 print_r($id_prd);
			 echo "</pre>"; */
			$root_path = ABSPATH;
			$inserted_rwd_products_logs = fopen($root_path."add_ding_prod.txt", "a+");

			$file_content = "\n";
			$file_content .= "Total Products API retuns: ".count($rwd_prds);
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

			echo "Product Insertion log is added to a file in root with name 'add_ding_prod.txt'";

		  
		}
}
 ?>


<?php get_footer(); ?>