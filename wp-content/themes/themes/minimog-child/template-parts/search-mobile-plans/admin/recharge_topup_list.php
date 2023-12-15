<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>


<style>
	.dataTables_wrapper {
	padding: 18px 0 8px 0;
}

.wp-core-ui select {
	width: 33%;
}

.dataTables_wrapper .dataTables_length {
	float: left;
	width: 13%;
	padding-left: 12px;
}

#wpcontent {
	height: 100%;
	padding-left: 0 !important;
}

#topup_list {
	padding: 0 0px;
	width: 98%;
}

.dataTables_wrapper .dataTables_filter {
	padding-right: 10px;
}

#topup_list_info {
	padding-left: 10px;
}
</style>



	<?php
	global $wpdb;
	$mobile_recharges_table = $wpdb->prefix . "topup_recharge";
	$results = $wpdb->get_results ("SELECT * FROM $mobile_recharges_table ORDER BY ID DESC");
	 ?>

<table id="topup_list" class="display">
    <thead>
        <tr>
            <th>Sr. No</th>
            <th>Date</th>
            <th>Name</th>
            <th>Email</th>
            <th>Friend Email</th>
            <th>Mobile Number</th>
            <th>Plan Name</th>
            <th>Sku Code</th>
            <th>Sub total</th>
            <th>Convenience Fee</th>
            <th>Total total</th>
            <th>Currency</th>
			<th>Status</th>
			
        </tr>
    </thead>
    <tbody>
	
	<?php
	if(!empty($results)){
		$i = 1;
		foreach ( $results as $print )   {	
		?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo date('d-m-Y', strtotime($print->created_at)); ?></td>
			<td><?php echo $print->user_name; ?></td>
			<td><?php echo $print->user_email; ?></td>
			<td><?php echo $print->friend_email; ?></td>
			<td><?php echo $print->mobile_number; ?></td>
			<td><?php echo $print->plan_name; ?></td>
			<td><?php echo $print->plan_sku_code; ?></td>
			<td><?php echo $print->plan_amount; ?></td>
			<td><?php echo $print->convenience_fee; ?></td>
			<td><?php echo $print->total_amount; ?></td>
			<td><?php echo $print->amount_currency; ?></td>
			<td><?php echo $print->status; ?></td>
			
		</tr>
		<?php
		$i++;
		}
	}
	?>
    </tbody>
</table>



<script>
$(document).ready( function () {
    $('#topup_list').DataTable();
} );
</script>