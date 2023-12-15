<?php
if(!empty($args)){
$mobile_recharges_data = $args['mobile_recharges_data'];
 
?>

<html>
<head>
<!-- CSS Code: Place this code in the document's head (between the 'head' tags) -->
<style>
table.GeneratedTable {
  width: 100%;
  background-color: #ffffff;
  border-collapse: collapse;
  border-top: 1px solid #d4d4d4;
  border-bottom: 1px solid #d4d4d4;
  color: #000000;
}

table.GeneratedTable td, table.GeneratedTable th {
	border-bottom: 1px solid #d4d4d4;
	padding: 10px;
	text-align: left;
}

table.GeneratedTable thead {
  background-color: #dedede;
}
.thk_text{
	text-align:center;
}
.main_img{
	margin: auto;
	display: block;
}
.main_img{
    width: 100%;
    height: 270px;
    background-position: center;
    background-repeat: no-repeat;
	background:url('<?php echo site_url(); ?>/wp-content/uploads/2022/09/mobile_rechange.jpg')
}
</style>

</head>
<body>

<!-- HTML Code: Place this code in the document's body (between the 'body' tags) where the table should appear -->
<h1 class="thk_text">Thanks for using our service!</h1>
<div class="main_img"></div>

<table class="GeneratedTable">
  <tbody>
    <tr>
      <th>Name</th><td><?php echo $mobile_recharges_data['user_name']; ?></td>
    </tr>
    <tr>
      <th>Email</th><td><?php echo $mobile_recharges_data['user_email']; ?></td>
    </tr>
    <tr>
      <th>Mobile no.</th><td><?php echo $mobile_recharges_data['mobile_number']; ?></td>
    </tr>
    <tr>
      <th>Plan</th><td><?php echo $mobile_recharges_data['plan_name']; ?></td>
    </tr>
    <tr>
      <th>SkuCode</th><td><?php echo $mobile_recharges_data['plan_sku_code']; ?></td>
    </tr>
    <tr>
      <th>Subtotal</th><td><?php echo $mobile_recharges_data['plan_amount'] . ' ' . $mobile_recharges_data['amount_currency']; ?></td>
    </tr>
    <tr>
      <th>VAT</th><td><?php echo $mobile_recharges_data['vat_amount'] . ' ' . $mobile_recharges_data['amount_currency']; ?></td>
    </tr>
    <tr>
     <th>Total Amount Paid</th><td><?php echo $mobile_recharges_data['total_amount'] . ' ' . $mobile_recharges_data['amount_currency']; ?></td>
    </tr>
  </tbody>
</table>
<!-- Codes by Quackit.com -->


</body>
</html>
<?php
}
?>