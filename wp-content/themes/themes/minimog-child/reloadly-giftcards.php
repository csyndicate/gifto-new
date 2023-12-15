<?php
/**
* Template Name: Add Reloadly Plugin  Products
*
* @package WordPress
* @subpackage Twenty_Twenty_One
* @since Twenty Twenty One  1.0
*/

get_header(); ?>
<div class="gif-products">

<form method="post" action="" class="add-product">
	<button name="addreloadprodcts1" type="submit">Add reloadly giftcards Products(1-5)</button>
</form>
<?php $curt = $_SERVER['SERVER_ADDR'];

//echo $curt; ?>
<?php
if(isset($_POST['addreloadprodcts1'])){

for($i=1;$i<=5;$i++)
{

$gacess_token = get_field('gaccess_token', 'option');
$curl = curl_init();

$gapi_url_temp = get_field('gapi_url', 'option');
$gapi_url = $gapi_url_temp."/products?page=$i";


curl_setopt_array($curl, array(
  CURLOPT_URL => $gapi_url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer '.$gacess_token.' '
  ),
));

$response = curl_exec($curl);
$response = json_decode($response, true);
$err = curl_error($curl);
curl_close($curl);

//echo $response;

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			$exists_relodly_products = array();
			$relodly_products_insertion_error = array();
			$inserted_relodly_products = array();
			// $total_aed_products = 0;
			$relodlycounter = 1;
			$relodly_prds = $response['content'];
 
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
		
				// echo "<pre>";

			//END create array of Product ids of all existing Products
			// unset($rwd_prds[0]);
			// unset($rwd_prds[1]);
			
			foreach ($relodly_prds as $reloadlykey => $reloadlyvalue) {
				
				//if (in_array("DigitalProduct", $relodly_prds[$rwdkey]['Benefits'])) {
				
				//if($relodlycounter==4)
					//break;
		
					$relodly_prd_add = addreloadlyProduct($relodly_prds[$reloadlykey]);
					if($relodly_prd_add['code']==2){
						array_push($exists_relodly_products,$relodly_prd_add);
						if (($key = array_search($relodly_prd_add['productId'], $products_IDs)) !== false) {
							unset($products_IDs[$key]);
						}
					}else if($relodly_prd_add['code']==3){
						array_push($relodly_products_insertion_error,$relodly_prd_add);
					}else if($relodly_prd_add['code']==1){
						array_push($inserted_relodly_products,$relodly_prd_add);
					}
					$relodlycounter++;
				///}
			}
		
			foreach ($products_IDs as $id_prd) {
				//wp_delete_post( $id_prd, false );
			}
			 /* echo "<pre>";
			 print_r($id_prd);
			 echo "</pre>"; */
			$root_path = ABSPATH;
			//echo $root_path;
			$inserted_relodly_products_logs = fopen($root_path."reloadly_gifts_data.txt", "a+");
               
			$file_content = "\n";
			$file_content .= "Total Products API retuns: ".count($relodly_prds);
			$file_content .= "\n";
			$file_content .= "Total Products Looped: ".($relodlycounter-1);
			// $file_content .= "\n";
			// $file_content .= "Total AED Products Looped: ".($total_aed_products);			
			$file_content .= "\n";
			$file_content .= "++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++";
			$file_content .= "\n";
			$file_content .= date("Y-m-d h:i:sa");
			$file_content .= "\n";
			$file_content .= "Exists Products: ". count($exists_relodly_products);
			$file_content .= "\n";
			$file_content .= print_r($exists_relodly_products, TRUE);
			$file_content .= "\n";
			$file_content .= "Products With insertion error: ". count($relodly_products_insertion_error);
			$file_content .= "\n";
			$file_content .= print_r($relodly_products_insertion_error, TRUE);
			$file_content .= "\n";
			$file_content .= "Inserted Products: ". count($inserted_relodly_products);
			$file_content .= "\n";
			$file_content .= print_r($inserted_relodly_products, TRUE);
			$file_content .= "\n";

			fwrite($inserted_relodly_products_logs, $file_content);
			fclose($inserted_relodly_products_logs);

			echo "Product Insertion log is added to a file in root with name 'reloadly_gifts_data.txt'";

		  
		}
	}
}
?>
<form method="post" action="" class="add-product">
	<button name="addreloadprodcts2" type="submit">Add reloadly giftcards Products(6-10)</button>
</form>
<?php $curt = $_SERVER['SERVER_ADDR'];

//echo $curt; ?>
<?php
if(isset($_POST['addreloadprodcts2'])){

for($i=6;$i<=10;$i++)
{
$gacess_token = get_field('gaccess_token', 'option');
$curl = curl_init();

$gapi_url_temp = get_field('gapi_url', 'option');
$gapi_url = $gapi_url_temp."/products?page=$i";

curl_setopt_array($curl, array(
  CURLOPT_URL => $gapi_url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer '.$gacess_token.' '
  ),
));

$response = curl_exec($curl);
$response = json_decode($response, true);
$err = curl_error($curl);
curl_close($curl);

//echo $response;

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			$exists_relodly_products = array();
			$relodly_products_insertion_error = array();
			$inserted_relodly_products = array();
			// $total_aed_products = 0;
			$relodlycounter = 1;
			$relodly_prds = $response['content'];
 
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
		
				// echo "<pre>";

			//END create array of Product ids of all existing Products
			// unset($rwd_prds[0]);
			// unset($rwd_prds[1]);
			
			foreach ($relodly_prds as $reloadlykey => $reloadlyvalue) {
				
				//if (in_array("DigitalProduct", $relodly_prds[$rwdkey]['Benefits'])) {
				
				//if($relodlycounter==4)
					//break;
		
					$relodly_prd_add = addreloadlyProduct($relodly_prds[$reloadlykey]);
					if($relodly_prd_add['code']==2){
						array_push($exists_relodly_products,$relodly_prd_add);
						if (($key = array_search($relodly_prd_add['productId'], $products_IDs)) !== false) {
							unset($products_IDs[$key]);
						}
					}else if($relodly_prd_add['code']==3){
						array_push($relodly_products_insertion_error,$relodly_prd_add);
					}else if($relodly_prd_add['code']==1){
						array_push($inserted_relodly_products,$relodly_prd_add);
					}
					$relodlycounter++;
				///}
			}
		
			foreach ($products_IDs as $id_prd) {
				//wp_delete_post( $id_prd, false );
			}
			 /* echo "<pre>";
			 print_r($id_prd);
			 echo "</pre>"; */
			$root_path = ABSPATH;
			$inserted_relodly_products_logs = fopen($root_path."reloadly_gifts_data.txt", "a+");

			$file_content = "\n";
			$file_content .= "Total Products API retuns: ".count($relodly_prds);
			$file_content .= "\n";
			$file_content .= "Total Products Looped: ".($relodlycounter-1);
			// $file_content .= "\n";
			// $file_content .= "Total AED Products Looped: ".($total_aed_products);			
			$file_content .= "\n";
			$file_content .= "++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++";
			$file_content .= "\n";
			$file_content .= date("Y-m-d h:i:sa");
			$file_content .= "\n";
			$file_content .= "Exists Products: ". count($exists_relodly_products);
			$file_content .= "\n";
			$file_content .= print_r($exists_relodly_products, TRUE);
			$file_content .= "\n";
			$file_content .= "Products With insertion error: ". count($relodly_products_insertion_error);
			$file_content .= "\n";
			$file_content .= print_r($relodly_products_insertion_error, TRUE);
			$file_content .= "\n";
			$file_content .= "Inserted Products: ". count($inserted_relodly_products);
			$file_content .= "\n";
			$file_content .= print_r($inserted_relodly_products, TRUE);
			$file_content .= "\n";

			fwrite($inserted_relodly_products_logs, $file_content);
			fclose($inserted_relodly_products_logs);

			echo "Product Insertion log is added to a file in root with name 'reloadly_gifts_data.txt'";

		  
		}
	}
}
 ?>
 <form method="post" action="" class="add-product">
	<button name="addreloadprodcts3" type="submit">Add reloadly giftcards Products(11-15)</button>
</form>
<?php $curt = $_SERVER['SERVER_ADDR'];

//echo $curt; ?>
<?php
if(isset($_POST['addreloadprodcts3'])){

for($i=11;$i<=15;$i++)
{
$gacess_token = get_field('gaccess_token', 'option');
$curl = curl_init();

$gapi_url_temp = get_field('gapi_url', 'option');
$gapi_url = $gapi_url_temp."/products?page=$i";

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://giftcards.reloadly.com/products?page=$i",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer '.$gacess_token.' '
  ),
));

$response = curl_exec($curl);
$response = json_decode($response, true);
$err = curl_error($curl);
curl_close($curl);

//echo $response;

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			$exists_relodly_products = array();
			$relodly_products_insertion_error = array();
			$inserted_relodly_products = array();
			// $total_aed_products = 0;
			$relodlycounter = 1;
			$relodly_prds = $response['content'];
 
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
		
				// echo "<pre>";

			//END create array of Product ids of all existing Products
			// unset($rwd_prds[0]);
			// unset($rwd_prds[1]);
			
			foreach ($relodly_prds as $reloadlykey => $reloadlyvalue) {
				
				//if (in_array("DigitalProduct", $relodly_prds[$rwdkey]['Benefits'])) {
				
				//if($relodlycounter==4)
					//break;
		
					$relodly_prd_add = addreloadlyProduct($relodly_prds[$reloadlykey]);
					if($relodly_prd_add['code']==2){
						array_push($exists_relodly_products,$relodly_prd_add);
						if (($key = array_search($relodly_prd_add['productId'], $products_IDs)) !== false) {
							unset($products_IDs[$key]);
						}
					}else if($relodly_prd_add['code']==3){
						array_push($relodly_products_insertion_error,$relodly_prd_add);
					}else if($relodly_prd_add['code']==1){
						array_push($inserted_relodly_products,$relodly_prd_add);
					}
					$relodlycounter++;
				///}
			}
		
			foreach ($products_IDs as $id_prd) {
				//wp_delete_post( $id_prd, false );
			}
			 /* echo "<pre>";
			 print_r($id_prd);
			 echo "</pre>"; */
			$root_path = ABSPATH;
			$inserted_relodly_products_logs = fopen($root_path."reloadly_gifts_data.txt", "a+");

			$file_content = "\n";
			$file_content .= "Total Products API retuns: ".count($relodly_prds);
			$file_content .= "\n";
			$file_content .= "Total Products Looped: ".($relodlycounter-1);
			// $file_content .= "\n";
			// $file_content .= "Total AED Products Looped: ".($total_aed_products);			
			$file_content .= "\n";
			$file_content .= "++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++";
			$file_content .= "\n";
			$file_content .= date("Y-m-d h:i:sa");
			$file_content .= "\n";
			$file_content .= "Exists Products: ". count($exists_relodly_products);
			$file_content .= "\n";
			$file_content .= print_r($exists_relodly_products, TRUE);
			$file_content .= "\n";
			$file_content .= "Products With insertion error: ". count($relodly_products_insertion_error);
			$file_content .= "\n";
			$file_content .= print_r($relodly_products_insertion_error, TRUE);
			$file_content .= "\n";
			$file_content .= "Inserted Products: ". count($inserted_relodly_products);
			$file_content .= "\n";
			$file_content .= print_r($inserted_relodly_products, TRUE);
			$file_content .= "\n";

			fwrite($inserted_relodly_products_logs, $file_content);
			fclose($inserted_relodly_products_logs);

			echo "Product Insertion log is added to a file in root with name 'reloadly_gifts_data.txt'";

		  
		}
	}
}
 ?>

<form method="post" action="" class="add-product">
	<button name="addreloadprodcts4" type="submit">Add reloadly giftcards Products(16-19)</button>
</form>
<?php $curt = $_SERVER['SERVER_ADDR'];

//echo $curt; ?>
<?php
if(isset($_POST['addreloadprodcts4'])){

for($i=16;$i<=19;$i++)
{
$gacess_token = get_field('gaccess_token', 'option');
$curl = curl_init();

$gapi_url_temp = get_field('gapi_url', 'option');
$gapi_url = $gapi_url_temp."/products?page=$i";

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://giftcards.reloadly.com/products?page=$i",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer '.$gacess_token.' '
  ),
));

$response = curl_exec($curl);
$response = json_decode($response, true);
$err = curl_error($curl);
curl_close($curl);

//echo $response;

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			$exists_relodly_products = array();
			$relodly_products_insertion_error = array();
			$inserted_relodly_products = array();
			// $total_aed_products = 0;
			$relodlycounter = 1;
			$relodly_prds = $response['content'];
 
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
		
				// echo "<pre>";

			//END create array of Product ids of all existing Products
			// unset($rwd_prds[0]);
			// unset($rwd_prds[1]);
			
			foreach ($relodly_prds as $reloadlykey => $reloadlyvalue) {
				
				//if (in_array("DigitalProduct", $relodly_prds[$rwdkey]['Benefits'])) {
				
				//if($relodlycounter==4)
					//break;
		
					$relodly_prd_add = addreloadlyProduct($relodly_prds[$reloadlykey]);
					if($relodly_prd_add['code']==2){
						array_push($exists_relodly_products,$relodly_prd_add);
						if (($key = array_search($relodly_prd_add['productId'], $products_IDs)) !== false) {
							unset($products_IDs[$key]);
						}
					}else if($relodly_prd_add['code']==3){
						array_push($relodly_products_insertion_error,$relodly_prd_add);
					}else if($relodly_prd_add['code']==1){
						array_push($inserted_relodly_products,$relodly_prd_add);
					}
					$relodlycounter++;
				///}
			}
		
			foreach ($products_IDs as $id_prd) {
				//wp_delete_post( $id_prd, false );
			}
			 /* echo "<pre>";
			 print_r($id_prd);
			 echo "</pre>"; */
			$root_path = ABSPATH;
			$inserted_relodly_products_logs = fopen($root_path."reloadly_gifts_data.txt", "a+");

			$file_content = "\n";
			$file_content .= "Total Products API retuns: ".count($relodly_prds);
			$file_content .= "\n";
			$file_content .= "Total Products Looped: ".($relodlycounter-1);
			// $file_content .= "\n";
			// $file_content .= "Total AED Products Looped: ".($total_aed_products);			
			$file_content .= "\n";
			$file_content .= "++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++";
			$file_content .= "\n";
			$file_content .= date("Y-m-d h:i:sa");
			$file_content .= "\n";
			$file_content .= "Exists Products: ". count($exists_relodly_products);
			$file_content .= "\n";
			$file_content .= print_r($exists_relodly_products, TRUE);
			$file_content .= "\n";
			$file_content .= "Products With insertion error: ". count($relodly_products_insertion_error);
			$file_content .= "\n";
			$file_content .= print_r($relodly_products_insertion_error, TRUE);
			$file_content .= "\n";
			$file_content .= "Inserted Products: ". count($inserted_relodly_products);
			$file_content .= "\n";
			$file_content .= print_r($inserted_relodly_products, TRUE);
			$file_content .= "\n";

			fwrite($inserted_relodly_products_logs, $file_content);
			fclose($inserted_relodly_products_logs);

			echo "Product Insertion log is added to a file in root with name 'reloadly_gifts_data.txt'";

		  
		}
	}
}
 ?>
 <form method="post" action="" class="add-product">
	<button name="addreloadprodcts5" type="submit">Add reloadly giftcards Products(20-23)</button>
</form>
<?php $curt = $_SERVER['SERVER_ADDR'];

//echo $curt; ?>
<?php
if(isset($_POST['addreloadprodcts5'])){

for($i=20;$i<=23;$i++)
{
$gacess_token = get_field('gaccess_token', 'option');
$curl = curl_init();

$gapi_url_temp = get_field('gapi_url', 'option');
$gapi_url = $gapi_url_temp."/products?page=$i";

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://giftcards.reloadly.com/products?page=$i",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer '.$gacess_token.' '
  ),
));

$response = curl_exec($curl);
$response = json_decode($response, true);
$err = curl_error($curl);
curl_close($curl);

//echo $response;

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			$exists_relodly_products = array();
			$relodly_products_insertion_error = array();
			$inserted_relodly_products = array();
			// $total_aed_products = 0;
			$relodlycounter = 1;
			$relodly_prds = $response['content'];
 
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
		
				// echo "<pre>";

			//END create array of Product ids of all existing Products
			// unset($rwd_prds[0]);
			// unset($rwd_prds[1]);
			
			foreach ($relodly_prds as $reloadlykey => $reloadlyvalue) {
				
				//if (in_array("DigitalProduct", $relodly_prds[$rwdkey]['Benefits'])) {
				
				//if($relodlycounter==4)
					//break;
		
					$relodly_prd_add = addreloadlyProduct($relodly_prds[$reloadlykey]);
					if($relodly_prd_add['code']==2){
						array_push($exists_relodly_products,$relodly_prd_add);
						if (($key = array_search($relodly_prd_add['productId'], $products_IDs)) !== false) {
							unset($products_IDs[$key]);
						}
					}else if($relodly_prd_add['code']==3){
						array_push($relodly_products_insertion_error,$relodly_prd_add);
					}else if($relodly_prd_add['code']==1){
						array_push($inserted_relodly_products,$relodly_prd_add);
					}
					$relodlycounter++;
				///}
			}
		
			foreach ($products_IDs as $id_prd) {
				//wp_delete_post( $id_prd, false );
			}
			 /* echo "<pre>";
			 print_r($id_prd);
			 echo "</pre>"; */
			$root_path = ABSPATH;
			$inserted_relodly_products_logs = fopen($root_path."reloadly_gifts_data.txt", "a+");

			$file_content = "\n";
			$file_content .= "Total Products API retuns: ".count($relodly_prds);
			$file_content .= "\n";
			$file_content .= "Total Products Looped: ".($relodlycounter-1);
			// $file_content .= "\n";
			// $file_content .= "Total AED Products Looped: ".($total_aed_products);			
			$file_content .= "\n";
			$file_content .= "++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++";
			$file_content .= "\n";
			$file_content .= date("Y-m-d h:i:sa");
			$file_content .= "\n";
			$file_content .= "Exists Products: ". count($exists_relodly_products);
			$file_content .= "\n";
			$file_content .= print_r($exists_relodly_products, TRUE);
			$file_content .= "\n";
			$file_content .= "Products With insertion error: ". count($relodly_products_insertion_error);
			$file_content .= "\n";
			$file_content .= print_r($relodly_products_insertion_error, TRUE);
			$file_content .= "\n";
			$file_content .= "Inserted Products: ". count($inserted_relodly_products);
			$file_content .= "\n";
			$file_content .= print_r($inserted_relodly_products, TRUE);
			$file_content .= "\n";

			fwrite($inserted_relodly_products_logs, $file_content);
			fclose($inserted_relodly_products_logs);

			echo "Product Insertion log is added to a file in root with name 'reloadly_gifts_data.txt'";

		  
		}
	}
}
 ?>
 
 
 <form method="post" action="" class="add-product">
	<button name="addreloadprodcts6" type="submit">Add reloadly giftcards Products(24-27)</button>
</form>
<?php $curt = $_SERVER['SERVER_ADDR'];

//echo $curt; ?>
<?php
if(isset($_POST['addreloadprodcts6'])){

for($i=24;$i<=27;$i++)
{
$gacess_token = get_field('gaccess_token', 'option');
$curl = curl_init();

$gapi_url_temp = get_field('gapi_url', 'option');
$gapi_url = $gapi_url_temp."/products?page=$i";

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://giftcards.reloadly.com/products?page=$i",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer '.$gacess_token.' '
  ),
));

$response = curl_exec($curl);
$response = json_decode($response, true);
$err = curl_error($curl);
curl_close($curl);

//echo $response;

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			$exists_relodly_products = array();
			$relodly_products_insertion_error = array();
			$inserted_relodly_products = array();
			// $total_aed_products = 0;
			$relodlycounter = 1;
			$relodly_prds = $response['content'];
 
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
		
				// echo "<pre>";

			//END create array of Product ids of all existing Products
			// unset($rwd_prds[0]);
			// unset($rwd_prds[1]);
			
			foreach ($relodly_prds as $reloadlykey => $reloadlyvalue) {
				
				//if (in_array("DigitalProduct", $relodly_prds[$rwdkey]['Benefits'])) {
				
				//if($relodlycounter==4)
					//break;
		
					$relodly_prd_add = addreloadlyProduct($relodly_prds[$reloadlykey]);
					if($relodly_prd_add['code']==2){
						array_push($exists_relodly_products,$relodly_prd_add);
						if (($key = array_search($relodly_prd_add['productId'], $products_IDs)) !== false) {
							unset($products_IDs[$key]);
						}
					}else if($relodly_prd_add['code']==3){
						array_push($relodly_products_insertion_error,$relodly_prd_add);
					}else if($relodly_prd_add['code']==1){
						array_push($inserted_relodly_products,$relodly_prd_add);
					}
					$relodlycounter++;
				///}
			}
		
			foreach ($products_IDs as $id_prd) {
				//wp_delete_post( $id_prd, false );
			}
			 /* echo "<pre>";
			 print_r($id_prd);
			 echo "</pre>"; */
			$root_path = ABSPATH;
			$inserted_relodly_products_logs = fopen($root_path."reloadly_gifts_data.txt", "a+");

			$file_content = "\n";
			$file_content .= "Total Products API retuns: ".count($relodly_prds);
			$file_content .= "\n";
			$file_content .= "Total Products Looped: ".($relodlycounter-1);
			// $file_content .= "\n";
			// $file_content .= "Total AED Products Looped: ".($total_aed_products);			
			$file_content .= "\n";
			$file_content .= "++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++";
			$file_content .= "\n";
			$file_content .= date("Y-m-d h:i:sa");
			$file_content .= "\n";
			$file_content .= "Exists Products: ". count($exists_relodly_products);
			$file_content .= "\n";
			$file_content .= print_r($exists_relodly_products, TRUE);
			$file_content .= "\n";
			$file_content .= "Products With insertion error: ". count($relodly_products_insertion_error);
			$file_content .= "\n";
			$file_content .= print_r($relodly_products_insertion_error, TRUE);
			$file_content .= "\n";
			$file_content .= "Inserted Products: ". count($inserted_relodly_products);
			$file_content .= "\n";
			$file_content .= print_r($inserted_relodly_products, TRUE);
			$file_content .= "\n";

			fwrite($inserted_relodly_products_logs, $file_content);
			fclose($inserted_relodly_products_logs);

			echo "Product Insertion log is added to a file in root with name 'reloadly_gifts_data.txt'";

		  
		}
	}
}
 ?>
 
 
 
 
 
</div>

<?php get_footer(); ?>