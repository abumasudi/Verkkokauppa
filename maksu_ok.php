<?php

session_start();
if(!isset($_SESSION["uid"])){
	header("location:index.php");
}

$trx_id = $_GET["tx"];
$p_st = $_GET["st"];
$amt = $_GET["amt"];
$cc = $_GET["cc"];
$cm = $_GET["cm"];
$c_amt = $_COOKIE["ta"];


?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Verkkokauppa</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
		<script src="action.php"></script>
		<script src="action.php"></script>
		<style>
			table tr td {padding:10px;}
		</style>
	</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="index.php" class="navbar-brand">Verkkokauppa</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Etusivu</a></li>
				<li><a href="index.php"><span class="glyphicon glyphicon-modal-window"></span> Tuotteet</a></li>
			</ul>
		</div>
	</div>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading"></div>
					<div class="panel-body">
						<h1>Kiitos tilauksesta</h1>
						<hr/>
						<p>Hei <?php echo $_SESSION["name"]; ?>, Maksuprosessi on onnistuneesti tehty ja tilausnumerosi on <b><?php echo $trx_id;  ?></b><br/>
						Voit jatkaa shoppailua tästä <br/></p>
						<a href="index.php" class="btn btn-success btn-lg">Jatkaa shoppailua</a>
					</div>
					<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
	
</body>

</html>