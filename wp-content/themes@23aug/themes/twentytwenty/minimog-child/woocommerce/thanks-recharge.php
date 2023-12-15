<?php     
/*
Template Name: Rechage Thanku Page
*/
get_header();
?> 

<style>

.page-template-thanks-recharge .page-title-bar-content {
	display: none;
}

.Thank_you {
	text-align: center;
	padding-top: 50px;
}
.Thank_you h2 {
	font-family: jost;
	font-weight: 900;
	font-size: 50px;
}

.process {
	display: flex;
	justify-content: space-between;
	width: 29%;
	margin: auto;
}


.Processing{
position: relative;
}

.Processing::after {
	content: '';
	top: 13px;
	left: -72px;
	background-color: black;
	width: 56px;
	height: 2px;
	position: absolute;
}



.Sent{
position: relative;
}

.Sent::after {
	content: '';
	top: 13px;
	left: -72px;
	background-color: black;
	width: 56px;
	height: 2px;
	position: absolute;
}

.process p{
	color: black;
}

.button_recharge{
    text-align:center;
}


.process {
	padding: 30px 0;
}


.button_recharge {
	margin-bottom: 60px;
}

.button_recharge a {
	background: #cc3535;
	border: none;
	padding: 12px 10px;
	border-radius: 9px;
	color: white;
}


</style>
<body class="recharge_page">


<div class="container">
    <div class="Thank_you">
        <img src="../images/thank_you.png" alt="thank you">
        <h2>Thank you for using our service</h2>
    </div>
    <!-- <div class="process">
        <p>Created</p>
        <p class="Processing">Processing</p>
        <p class="Sent">Sent</p>
    </div> -->
    <div class="button_recharge">
        <a href="https://43523f7b3b.nxcli.net/search-filter/">Need to do another recharge?</a>
    </div>
</div>
<body>

<?php get_footer(); ?> 