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
				<li><a href="index.php"> <span class="glyphicon glyphicon-home"> </span> Etusivu</a></li>
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
					<div class="col-md-8" id="nappien_viesti">
						<!-- Viesti poistamisesta--->
					</div>
					<div class="col-md-2"></div>
				</div>
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="panel panel-primary">
								<div class="panel-heading">Ostoskori</div>
								<div class="panel-body">
									<div class="row">
										<div class="col-md-2"><b>Toiminto</b></div>
										<div class="col-md-2"><b>Tuotteen kuva</b></div>
										<div class="col-md-2"><b>Tuotteen nimi</b></div>
										<div class="col-md-2"><b>Määrä</b></div>
										<div class="col-md-2"><b>Tuotteen hinta</b></div>
										<div class="col-md-2"><b>Yhteensä €</b></div>
									</div>
									<div id="ostos_tarkistus"></div>
									<!--<div class="row">
										<div class="col-md-2">
											<div class="btn-group">
												<a href="#" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
												<a href="#" class="btn btn-primary"><span class="glyphicon glyphicon-ok-sign"></span></a>
											</div>
										</div>
										<div class="col-md-2"><img src='tuotteiden_kuvat/image.jpg'></div>
										<div class="col-md-2">Tuotteen nimi</div>
										<div class="col-md-2"><input type='text' class='form-control' value='1'></div>
										<div class="col-md-2"><input type='text' class='form-control' value='5000' disabled></div>
										<div class="col-md-2"><input type='text' class='form-control' value='5000' disabled></div>
									</div>-->
									<!--<div class="row">
										<div class="col-md-8"></div>
										<div class="col-md-4">
											<b>Yhteensä 19000 €</b>
										</div>
									</div>-->
								</div>
								<div class="panel-footer"></div>
							</div>
						</div>
						<div class="col-md-2"></div>
					</div>
				
				</div>
</body>
</html>
				