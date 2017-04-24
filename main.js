


$(document).ready(function(){
	cat();
	brand();
	tuote();
	function cat(){
		$.ajax({
			url	:	"action.php",
			method:	"POST",
			data	:	{kategori:1},
			success	:	function(data){
				$("#get_kategorit").html(data);
				
			}
		})
	}
	
	function brand(){
		$.ajax({
			url	:	"action.php",
			method:	"POST",
			data	:	{brand:1},
			success	:	function(data){
				$("#get_brand").html(data);
			}
		})
	}
	
		function tuote(){
		$.ajax({
			url	:	"action.php",
			method:	"POST",
			data	:	{getTuote:1},
			success	:	function(data){
				$("#get_tuotteet").html(data);
			}
		})
	}
	

	
// kategorien toiminto	
		$("body").delegate(".kategori","click",function(event){
		$("#get_tuotteet").html("<h3>Loading...</h3>");
		event.preventDefault();
		var cid = $(this).attr('cid');
		
			$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{get_selected_Kategori:1,kat_id:cid},
			success	:	function(data){
				$("#get_tuotteet").html(data);
				if($("body").width() < 480){
					$("body").scrollTop(683);
				}
			}
		})
	
	})
// merkkien toiminto 	
	$("body").delegate(".selectBrand","click",function(event){
		$("#get_tuotteet").html("<h3>Loading...</h3>");
		event.preventDefault();
		var bid = $(this).attr('bid');
		
			$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{selectBrand:1,brand_id:bid},
			success	:	function(data){
				$("#get_tuotteet").html(data);
				if($("body").width() < 480){
					$("body").scrollTop(683);
				}
			}
		})
	
	})
// etsi toiminto functio	
	$("#search_btn").click(function(){
		var avainsana = $("#etsi").val();
		if (avainsana != ""){
			$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{etsi:1,avainsana:avainsana},
			success	:	function(data){
				$("#get_tuotteet").html(data);
			}
			})
		}
	})
	
	//rekisteröidy nappi
	$("#signup_button").click(function(event){
		event.preventDefault();
			$.ajax({
				url		:	"register.php",
				method	:	"POST",
				data	:	$("form").serialize(),
				success	:	function(data){
					$("#signup_msg").html(data);
			}
			})
	})
	//kirjautuminen omilla tunniksilla
	$("#login").click(function(event){
		event.preventDefault();
		var email = $("#email").val();
		var pass = $ ("#password").val();
			$.ajax({
				url		:	"login.php",
				method	:	"POST",
				data	:	{userLogin:1, userEmail:email,userPassword:pass},
				success	:	function(data){
					if(data == "truefsvkjbskvvsbd"){
					window.location.href = "profile.php";
				}
				}
			})
	})
	
	
	ostoskori_numero();
	$("body").delegate("#tuote","click",function(event){
		event.preventDefault();
		var p_id = $(this).attr('pid');
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{lisaakoriin:1,proId:p_id},
			success	:	function(data){
				$("#tuote_viesti").html(data);
				ostoskori_numero();
			}
		})
	})
	//tuotteeen lisääminen ostoskoriin etusivulla
	ostos_kori();
	function ostos_kori(){
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{tuote_ostoskorissa:1},
			success	:	function(data){
				$("#korissa_tuote").html(data);
			}
		})
		ostoskori_numero();
	};
	
	function ostoskori_numero(){
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{ostoskori_numero:1},
			success	:	function(data){
				$(".badge").html(data);
			}
		})
	}

	//ostoskori sivun tarkistus
	ostos_tarkistus();
	function ostos_tarkistus(){
		 $.ajax ({
			 url : "action.php",
			 method : "POST",
			 data : {ostos_tarkistus:1},
			 success : function(data){
				 $("#ostos_tarkistus").html(data);
			 }
		 })
	}
	//Kokosumma tuotteiden määrästä
	$("body").delegate(".qty","keyup", function() {
		var pid = $(this).attr("pid");
		var qty = $("#qty-"+pid).val();
		var hinta = $("#hinta-"+pid).val();
		var yhteensa  = qty * hinta;
		$("#yhteensa-"+pid).val(yhteensa);	
	})
	//ostoskori sivulla poisto nappi
	$("body").delegate(".poista","click",function(event){
		event.preventDefault();
		var pid = $(this).attr("poista_id");
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{poistaOstosKorista:1,poistaId:pid},
			success	:	function(data){
				$("#nappien_viesti").html(data);
				ostos_tarkistus();
			}
		})
		
	})
	//ostoskori sivulla päivitä nappi
	$("body").delegate(".paivita","click",function(event){
		event.preventDefault();
		var pid = $(this).attr("paivita_id");
		var qty = $("#qty-"+pid).val();
		var hinta = $("#hinta-"+pid).val();
		var koko_summa = $("#yhteensa-"+pid).val();
		$.ajax({
			url	:"action.php",
			method	:	"POST",
			data	:	{paivitaTuote:1,paivitaId:pid,qty:qty,hinta:hinta,koko_summa:koko_summa},
			success	:	function(data){
				$("#nappien_viesti").html(data);
				ostos_tarkistus();
			}
		})
		
	})
	
	//tuotteiden näyttäminen eri sivuilla - 9 tuote yhdessä sivussa
	sivut();
	function sivut(){
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{sivut:1},
			success	:	function(data){
				$("#sivu_nu").html(data);
			}
		})
	}
	
	//klikki toiminto seuraavalle sivulle
	$("body").delegate("#sivut","click",function(){
		var sn = $(this).attr("sivut");
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{getTuote:1,sarjaSivu:1,sivuNumero:sn},
			success	:	function(data){
				$("#get_tuotteet").html(data);
			}
		})
	})
	
	
})