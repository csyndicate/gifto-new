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
	//$voucher_cards1 = $wpdb->prefix . "vouchercards";
	echo $voucher_cards1;
	$voucher = $wpdb->get_results("SELECT * FROM vouchercards  ORDER BY ID DESC ");
	//echo $voucher;
	 ?>

<table id="voucher" class="display">
    <thead>
        <tr>
		    <th>Sr. No</th>
            <th>Date</th>
            <th>Transaction Id</th>
            <th>Category</th>
            <th>Redeem Code</th>
            <th>Redeem Pin</th>
            <th>Order Status</th>
            
        </tr>
    </thead>
    <tbody>
	
	<?php
	//$t=time();
	if(!empty($voucher)){
		$i = 1;
		foreach ( $voucher as $voucher1 )   {	
		?>
		
		<tr>
		    <td><?php echo $i; ?></td>
			<td><?php echo  $voucher1->created_at; //date('Y-m-d H:i:s',$voucher1->created_at); //echo date('d-m-Y', strtotime($voucher1->created_at)); ?></td>
			
			<td><?php echo $voucher1->transaction_id; ?></td>
			<td><?php echo $voucher1->api_name; ?></td>
			<td><?php echo $voucher1->redeem_code; ?></td>
			<td><?php echo $voucher1->redeem_pin; ?></td>
			<td><?php echo $voucher1->order_status; ?></td>
			
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
    $('#voucher').DataTable();
} );
</script>