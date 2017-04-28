<?php
//asiakkaan rekisteröitymisen lomakkeen php koodi
include "db.php";

$e_nimi = $_POST["e_nimi"];
$s_nimi = $_POST["s_nimi"];
$email = $_POST['email'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];
$numero = $_POST['numero'];
$osoite = $_POST['osoite'];
$osoite2 = $_POST['osoite2'];
$name = "/^[A-Z][a-zA-Z ]+$/";
$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
$number = "/^[0-9]+$/";

if(empty($e_nimi) || empty($s_nimi) || empty($email) || empty($password) || empty($repassword) ||
	empty($numero) || empty($osoite) || empty($osoite2)){
		
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Täytä koko lomaketta..!</b>
			</div>
		";
		exit();
	} else {
		if(!preg_match($name,$e_nimi)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Tämä $e_nimi ei kelpaa..!</b>
			</div>
		";
		exit();
	}
	if(!preg_match($name,$s_nimi)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Tämä $s_nimi ei kelpaa..!</b>
			</div>
		";
		exit();
	}
	if(!preg_match($emailValidation,$email)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Tämä $email ei kelpaa..!</b>
			</div>
		";
		exit();
	}
	if(strlen($password) < 9 ){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Salasana on heikko</b>
			</div>
		";
		exit();
	}
	if(strlen($repassword) < 9 ){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Salasana on heikko</b>
			</div>
		";
		exit();
	}
	if($password != $repassword){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Salasanat ei täsmää!</b>
			</div>
		";
	}
	if(!preg_match($number,$numero)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Tämä puhelinnumero $numero ei ole käytössä!</b>
			</div>
		";
		exit();
	}
	if(!(strlen($numero) == 10)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Matkapuhelinnumero on 10-numeroinen</b>
			</div>
		";
		exit();
	}
	//Olemassa oleva sähköpostiosoite tietokannasta
	$sql = "SELECT user_id FROM user_info WHERE email = '$email' LIMIT 1" ;
	$check_query = mysqli_query($con,$sql);
	$count_email = mysqli_num_rows($check_query);
	if($count_email > 0){
		echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Sähköpostiosoite on jo käytössä! Kokeile toista sähköpostiosoitetta</b>
			</div>
		";
		exit();
	} else {
		$password = md5($password);
		$sql = "INSERT INTO `user_info` 
		(`user_id`, `etunimi`, `sukunimi`, `email`, 
		`password`, `puhelinnumero`, `osoite1`, `osoite2`) 
		VALUES (NULL, '$e_nimi', '$s_nimi', '$email', 
		'$password', '$numero', '$osoite', '$osoite2')";
		$run_query = mysqli_query($con,$sql);
		if($run_query){
			echo "
				<div class='alert alert-success'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Olet rekisteröitynyt onnistuneesti..!</b>
				</div>
			";
		}
	}
	}
?>