<?php

session_start();
if(!isset($_SESSION["uid"])){
	header("location:index.php");
}
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
				<li><a href="#"><span class="glyphicon glyphicon-modal-window"></span> Tuotteet</a></li>
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
						<h1>Asiakkaan tilauksen tiedot</h1>
						<hr/>
						<div class="row">
							<div class="col-md-6">
								<img style="float:right;" src="tuotteiden_kuvat/iphone7.jpg" class="img-thumbnail"/>
							</div>
							<div class="col-md-6">
								<table>
									<tr><td>Tuoten nimi</td><td><b>iPhone 7</b> </td></tr>
									<tr><td>Tuoten hinta</td><td><b>500€</b></td></tr>
									<tr><td>Määrä</td><td><b>3</b></td></tr>
									<tr><td>Maksu</td><td><b>Hyväksytty</b></td></tr>
									<tr><td>Tilausnumero</td><td><b>RTSH5415SHSHYD87D25S</b></td></tr>
								</table>
							</div>
						</div>
					</div>
					<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
	
</body>

</html>