<?php
class wpec_merchant_paystation extends wpsc_merchant {
	
	public function submit() {

		$price =  number_format( nzshpcrt_overall_total_price( wpsc_get_customer_meta( 'billing_country' ) ), 2, '', ',' );
		$url = "https://www.paystation.co.nz/dart/darthttp.dll?paystation&pi=".get_option('paystation_id')."&ms=".	$this->cart_data['session_id'] ."&am=".$price."";
		header( "Location: $url" );
		exit();
	}
	
}
?>