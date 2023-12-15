<?php
/*
Template Name: counry cron job
*/

get_header(); 
global $wpdb;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$cntry_result = custom_ding_apis_urls( "GetCountries" );

if( $cntry_result[ 'success' ] ){

  foreach( $cntry_result[ 'countries' ] as $country ){

		$table_name = $wpdb->prefix."counrtry_table";

		$checkIfExists = $wpdb->get_var("SELECT countryiso FROM $table_name WHERE countryiso = '".$country[ 'CountryIso' ]."'" );

		if( $checkIfExists == "" ){
			$wpdb->insert( $table_name, array(
			    'countryiso' => $country[ 'CountryIso' ],
			    'countryname' => $country[ 'CountryName' ],
			    'prefix' => $country[ 'InternationalDialingInformation' ][0][ 'Prefix' ], 
			    'minimumlength' => $country[ 'InternationalDialingInformation' ][0][ 'MinimumLength' ], 
			    'maximumlength' => $country[ 'InternationalDialingInformation' ][0][ 'MaximumLength' ], 
			    'regioncodes' => implode(",", $country[ 'RegionCodes' ]), 
			));
		}else{
			$wpdb->update( $table_name, array(
			    'countryiso' => $country[ 'CountryIso' ],
			    'countryname' => $country[ 'CountryName' ],
			    'prefix' => $country[ 'InternationalDialingInformation' ][0][ 'Prefix' ], 
			    'minimumlength' => $country[ 'InternationalDialingInformation' ][0][ 'MinimumLength' ], 
			    'maximumlength' => $country[ 'InternationalDialingInformation' ][0][ 'MaximumLength' ], 
			    'regioncodes' => implode(",", $country[ 'RegionCodes' ])				    
			),
			array('countryiso' => $country[ 'CountryIso' ] )
			);
		}
  }
  
}


 $name =$_POST['number'];
$getproducts_result = custom_ding_apis_urls( "GetProducts/?accountNumber=".$name );
if($getproducts_result[ 'success' ]){
	
	
	
}
 
?>
 
 
 
 
 
 <?php get_footer(); ?>
