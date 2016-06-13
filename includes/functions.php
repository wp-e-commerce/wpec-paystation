<?php
function wpec_save_paystation_settings() {
	if ( ! empty( $_POST['paystation_id'] ) )
		update_option( 'paystation_id', $_POST['paystation_id'] );
	return true;
}

function wpec_paystation_settings_form() {
	return "<tr>
			<td>
				".__( 'Paystation ID', 'wpsc_gold_cart' )."
			</td>
			<td>
				<input type='text' size='40' value='".get_option('paystation_id')."' name='paystation_id' />
			</td>
		</tr>
		<tr>
		  <td colspan='2'>
			<strong>".__( 'Return URL that needs to be provided to Paystation : ', 'wpsc_gold_cart' ). get_option('transact_url') ."</strong>
		  </td>
		</tr>		
		
	";
}

?>