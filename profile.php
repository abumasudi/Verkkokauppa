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
				<li style="width:300px;left:10px;top:10px;"><input type="text" class="form-control" id="etsi"></li>
				<li style="top:10px;left:20px;"><button  class="btn btn-primary" id="search_btn">Etsi</button></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#" id="ostos_kori" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span> Ostoskori <span class="badge">0</span></a>
					<div class="dropdown-menu" style="width:400px;">
						<div class="panel panel-success">
							<div class="panel-heading">
								<div class="row">
									<div class="col-md-3">SL. Nu</div>
									<div class="col-md-3">Tuotteen kuva</div>
									<div class="col-md-3">Tuotteen nimi</div>
									<div class="col-md-3">Hinta €</div>
								</div>
							</div>
							<div class="panel-body">
								<div id="korissa_tuote">
								<!--<div class="row">
									<div class="col-md-3">SL. Nu</div>
									<div class="col-md-3">Tuotteen kuva</div>
									<div class="col-md-3">Tuotteen nimi</div>
									<div class="col-md-3">Hinta €</div>
									</div>-->
								</div>
							</div>
							<div class="panel-footer"></div>
						</div>
					</div>
				</li>
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"> </span><?php echo "Hei, ".$_SESSION["name"]; ?></a>
					<ul class="dropdown-menu">
						<li><a href="ostoskori.php" style="text-decoration:nonee; color:blue;"><span class="glyphicon glyphicon-shopping-cart"> Ostoskori</a></li>
						<li class="divider"> </li>
						<li><a href="" style="text-decoration:nonee; color:blue;">Vaihda salasana</a></li>
						<li class="divider"> </li>
						<li><a href="logout.php" style="text-decoration:nonee; color:red;">Kirjaudu ulos</a></li>
						
					</ul>
				</li>
				
				
			</ul>
		</div>
	
	</div>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-2">
				<div id="get_kategorit"></div>
				<!--
				<div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"><h4>Kategoria</h4></a></li>
					<li><a href="#">Kategoria</a></li>
					<li><a href="#">Kategoria</a></li>
					<li><a href="#">Kategoria</a></li>
					<li><a href="#">Kategoria</a></li>
				</div>-->
				<div id="get_brand"></div>
			<!--	<div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"><h4>Merkit</h4></a></li>
					<li><a href="#">Kategoria</a></li>
					<li><a href="#">Kategoria</a></li>
					<li><a href="#">Kategoria</a></li>
					<li><a href="#">Kategoria</a></li>
				</div> -->
			</div>
			<div class="col-md-8">
			<div class="row">
				<div class="col-md-12" id="tuote_viesti"></div>
			</div>
				<div class="panel panel-info">
					<div class="panel-heading">Tuotteet</div>
					<div class="panel-body">
						<div id="get_tuotteet"></div>
						<!-- Tähän tulee tuotteet jquery ajax kutsulla  -->
						<!--<div class="col-md-4">
							<div class="panel panel-info">
								<div class="panel-heading"></div>
								<div class="panel-body"></div>
								<div class="panel-heading"></div>
							</div> -->
						</div>
					</div>
					<div class="panel-footer">&copy; 2017</div>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<center>
					<ul class="pagination" id="sivu_nu">
						<li><a href="#">1</a></li>
					</ul>
				</center>
			</div>
		</div>
	</div>
</body>

</html>