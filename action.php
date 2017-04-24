
<?php
session_start();
include "db.php";

//Kategorien tuominen tietokannasta
if(isset($_POST["kategori"])){
	$kategori_query  = "SELECT * FROM kategoriat";
	$run_query = mysqli_query($con,$kategori_query);
	echo "
		<div class='nav nav-pills nav-stacked'>
			<li class='active'><a href='#'><h4>Kategoria</h4></a></li>
	";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$cid = $row["kat_id"];
			$cat_name = $row["kat_nimi"];
			echo "
					<li><a href='#' class='kategori' cid='$cid'>$cat_name</a></li>
			";
		}
		echo "</div>";
	}
}


//Brandien tuominen tietokannasta
if(isset($_POST["brand"])){
	$brand_query = "SELECT * FROM brandit";
	$run_query = mysqli_query($con,$brand_query);
	echo "
		<div class='nav nav-pills nav-stacked'>
			<li class='active'><a href='#'><h4>Merkit</h4></a></li>
	";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$bid = $row["brand_id"];
			$brand_name = $row["brandin_nimi"];
			echo "
					<li><a href='#' class='selectBrand' bid='$bid'>$brand_name</a></li>
			";
		}
		echo "</div>";
	}
}

if(isset($_POST["sivut"])){
	$sql = "SELECT * FROM tuotteet";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	$sivu_nu = ceil($count/9);
	for($i=1;$i<=$sivu_nu;$i++){
		echo "
			<li><a href='#' sivut='$i' id='sivut'>$i</a></li>
		";
	}
}


//Tuotteen tuominen tietokannasta + sivunumerot 
if(isset($_POST["getTuote"])){
	$limit = 9;
	if(isset($_POST["sarjaSivu"])){
		$sivu_nu = $_POST["sivuNumero"];
		$start = ($sivu_nu * $limit) - $limit;
	}else{
		$start = 0;
	}
	$tuote_query = "SELECT * FROM tuotteet LIMIT $start,$limit";
	$run_query = mysqli_query($con,$tuote_query);
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$tuot_id    = $row['tuotteen_id'];
			$tuot_cat   = $row['tuotteen_kat'];
			$tuot_brand = $row['tuotteen_brand'];
			$tuot_nimi = $row['tuotteen_nimi'];
			$tuot_hinta = $row['tuotteen_hinta'];
			$tuot_kuva = $row['tuotteen_kuva'];
			
			echo "
			<div class='col-md-4'>
							<div class='panel panel-info'>
								<div class='panel-heading'>$tuot_nimi</div>
								<div class='panel-body'>
									<img src='tuotteiden_kuvat/$tuot_kuva' style='width:250px; height:250px;'/>
								</div>
								<div class='panel-heading'>€ $tuot_hinta
									<button pid='$tuot_id' style='float:right;' id='tuote' class='btn btn-danger btn-sm'>LISÄÄ KORIIN</button>
								</div>
							</div>
							</div>
			";
			
		}
	}
}
// Kategorien ja Brandien valinta
if(isset($_POST["get_selected_Kategori"]) || isset($_POST["selectBrand"]) || isset($_POST["etsi"])) {
	if(isset($_POST["get_selected_Kategori"])) {
		$id = $_POST["kat_id"];
		$sql = "SELECT * from tuotteet WHERE tuotteen_kat = '$id'";
	}else if(isset($_POST["selectBrand"])){
		$id = $_POST["brand_id"];
		$sql = "SELECT * from tuotteet WHERE tuotteen_brand = '$id'";
	}else {
		$avainsana = $_POST["avainsana"];
		$sql = "SELECT * from tuotteet WHERE tuotteen_avainsanat LIKE '%$avainsana%'";
	}
	
	$run_query = mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($run_query)){
			$tuot_id    = $row['tuotteen_id'];
			$tuot_cat   = $row['tuotteen_kat'];
			$tuot_brand = $row['tuotteen_brand'];
			$tuot_nimi = $row['tuotteen_nimi'];
			$tuot_hinta = $row['tuotteen_hinta'];
			$tuot_kuva = $row['tuotteen_kuva'];
			
			echo "
			<div class='col-md-4'>
							<div class='panel panel-info'>
								<div class='panel-heading'>$tuot_nimi</div>
								<div class='panel-body'>
									<img src='tuotteiden_kuvat/$tuot_kuva' style='width:250px; height:250px;'/>
								</div>
								<div class='panel-heading'>€ $tuot_hinta.00
									<button pid='$tuot_id' style='float:right;' id='tuote' class='btn btn-danger btn-sm'>OSTA</button>
								</div>
							</div>
							</div>
			";
			
		}
	}
	
	
		
			if(isset($_POST["lisaakoriin"])){
		
		if(isset($_SESSION["uid"])){
			$p_id = $_POST["proId"];
			$user_id = $_SESSION["uid"];
			$sql = "SELECT * FROM cart WHERE tuotteen_id = '$p_id' AND user_id = '$user_id'";
			$run_query = mysqli_query($con,$sql);
			$count = mysqli_num_rows($run_query);
		if($count > 0){
			echo "
				<div class='alert alert-warning'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Tuote on jo lisätty ostoskoriin Jatka ostoksia ..!</b>
				</div>
			";
		} else {
			$sql = "SELECT * FROM tuotteet WHERE tuotteen_id = '$p_id'";
			$run_query = mysqli_query($con,$sql);
			$row = mysqli_fetch_array($run_query);
				$id = $row["tuotteen_id"];
				$tuot_name = $row["tuotteen_nimi"];
				$tuot_image = $row["tuotteen_kuva"];
				$tuot_price = $row["tuotteen_hinta"];
			$sql = "INSERT INTO `cart` 
			(`id`, `tuotteen_id`, `ip_add`, `user_id`, `tuotteen_nimi`,
			`tuotteen_kuva`, `qty`, `hinta`, `koko_summa`)
			VALUES (NULL, '$p_id', '0', '$user_id', '$tuot_name', 
			'$tuot_image', '1', '$tuot_price', '$tuot_price')";
			if(mysqli_query($con,$sql)){
				echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Tuote lisättiin ostoskoriin..!</b>
					</div>
				";
			}
		}
		}else{
			echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Pahoittelut..! Mene ja rekisteröidy asiakkaaksi, jotta voit lisätä tuotteita ostoskoriin!</b>
					</div>
				";
		}
		
		
		
		
	}
	// Tuotteen siirtäminen ostoskoriin ja ostos_checkin sivulle + muut toiminnot
	if(isset($_POST["tuote_ostoskorissa"]) || isset($_POST["ostos_tarkistus"])){
	$uid = $_SESSION["uid"];
	$sql = "SELECT * FROM cart WHERE user_id = '$uid'";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	if($count > 0){
		$no = 1;
		$koko_amt = 0;
		while($row=mysqli_fetch_array($run_query)){
			$id = $row["id"];
			$tuot_id = $row["tuotteen_id"];
			$tuot_name = $row["tuotteen_nimi"];
			$tuot_kuva = $row["tuotteen_kuva"];
			$qty = $row["qty"];
			$tuot_hinta = $row["hinta"];
			$koko_summa = $row["koko_summa"];
			$hinta_array = array($koko_summa);
			$koko_sum = array_sum($hinta_array);
			$koko_amt = $koko_amt + $koko_sum;
			setcookie("ta",$koko_amt,strtotime("+1 day"),"/","","",TRUE);
			if(isset($_POST["tuote_ostoskorissa"])){
				echo "
				<div class='row'>
					<div class='col-md-3 col-xs-3'>$no</div>
					<div class='col-md-3 col-xs-3'><img src='tuotteiden_kuvat/$tuot_kuva' width='60px' height='50px'></div>
					<div class='col-md-3 col-xs-3'>$tuot_name</div>
					<div class='col-md-3 col-xs-3'>$tuot_hinta €</div>
				</div>
			";
			$no = $no + 1;
	
			 }else{
				echo "
					<div class='row'>
							<div class='col-md-2 col-sm-2'>
								<div class='btn-group'>
									<a href='#' poista_id='$tuot_id' class='btn btn-danger btn-xs poista'><span class='glyphicon glyphicon-trash'></span></a>
									<a href='' paivita_id='$tuot_id' class='btn btn-primary btn-xs paivita'><span class='glyphicon glyphicon-ok-sign'></span></a>
								</div>
							</div>
							<div class='col-md-2 col-sm-2'><img src='tuotteiden_kuvat/$tuot_kuva' width='60px' height='60'></div>
							<div class='col-md-2 col-sm-2'>$tuot_name</div>
							<div class='col-md-2 col-sm-2'><input type='text' class='form-control qty' pid='$tuot_id' id='qty-$tuot_id' value='$qty' ></div>
							<div class='col-md-2 col-sm-2'><input type='text' class='form-control hinta' pid='$tuot_id' id='hinta-$tuot_id' value='$tuot_hinta' disabled></div>
							<div class='col-md-2 col-sm-2'><input type='text' class='form-control yhteensa' pid='$tuot_id' id='yhteensa-$tuot_id' value='$koko_summa' disabled></div>
						</div>
				";
			}
		}
		if (isset($_POST["ostos_tarkistus"])){
			
			echo	"<div class='row'>
					<div class='col-md-8'></div>
					<div class='col-md-4'>
						<b>Yhteensä: $koko_amt €</b>
					</div>
					</div>";
		}
		
	}
	}
	
	if(isset($_POST["ostoskori_numero"]) AND isset($_SESSION["uid"])){
	$uid = $_SESSION["uid"];
	$sql = "SELECT * FROM cart WHERE user_id = '$uid'";
	$run_query = mysqli_query($con,$sql);
	echo mysqli_num_rows($run_query);
}
	
	//Ostoskori sivun poisto napin toiminto
	if(isset($_POST["poistaOstosKorista"])){
	$pid = $_POST["poistaId"];
	$uid = $_SESSION["uid"];
	$sql = "DELETE FROM cart WHERE user_id = '$uid' AND tuotteen_id = '$pid'";
	$run_query = mysqli_query($con,$sql);
	if($run_query){
		echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Tuote poistettiin ostoskorista!</b>
			</div>
		";
	}
}

//Ostoskori sivun määrän napin päivitys toiminto
if(isset($_POST["paivitaTuote"])){
	$uid = $_SESSION["uid"];
	$pid = $_POST["paivitaId"];
	$qty = $_POST["qty"];
	$hinta = $_POST["hinta"];
	$koko_summa = $_POST["koko_summa"];
	
	$sql = "UPDATE cart SET qty = '$qty',hinta='$hinta',koko_summa='$koko_summa' 
	WHERE user_id = '$uid' AND tuotteen_id='$pid'";
	$run_query = mysqli_query($con,$sql);
	if($run_query){
		echo "
			<div class='alert alert-success'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Tuoten määrä ja hinta päivitettiin!</b>
			</div>
		";
	}
}

	

		
?>