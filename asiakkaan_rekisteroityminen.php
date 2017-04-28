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
				<li><a href="index.php"><span class="glyphicon glyphicon-modal-window"></span> Tuotteet</a></li>
			</ul>
		</div>
	</div>
	<p> <br/></p>
	<p> <br/></p>
	<p> <br/></p>
	
	<div class="container-fluid">
	<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8" id="signup_msg">
						<!--Alert rekisteröitymislomakelle--->
						</div>
						<div class="col-md-2"></div>
	</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-primary">
					<div class="panel-heading">Asiakkaan rekisteröitymislomake</div>
					<div class="panel-body">
					
					<form method="post">
					<div class="row">
						<div class="col-md-6">
							<label for="e_nimi">Etunimi</label>
							<input type="text" id="e_nimi" name="e_nimi"  class="form-control">
						</div>
						<div class="col-md-6">
							<label for="s_nimi">Sukunimi</label>
							<input type="text" id="s_nimi" name="s_nimi" class="form-control">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<label for="email">Sähköposti</label>
							<input type="text" id="email" name="email" class="form-control">
						</div>
					</div>
						<div class="row">
						<div class="col-md-12">
							<label for="password">Salasana</label>
							<input type="password" id="password" name="password" class="form-control">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<label for="repassword">Salasana uudestan</label>
							<input type="password" id="repassword" name="repassword" class="form-control">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<label for="numero">Puhelinnumero</label>
							<input type="text" id="numero" name="numero" class="form-control">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<label for="osoite">Osoite ja postinumero</label>
							<input type="text" id="osoite" name="osoite" class="form-control">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<label for="osoite2">Osoite 2</label>
							<input type="text" id="osoite2" name="osoite2" class="form-control">
						</div>
					</div>
					<p> <br/></p>
					<div class="row">
						<div class="col-md-12">
							<input type="button" id="signup_button" value="Rekisteröidy" name="signup_button" class="btn btn-success btn-lg">
						</div>
					</div>
					</div>
					</form>
					<div class="panel-footer">&copy; 2017</div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</body>
</html>