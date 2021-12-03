<!DOCTYPE html>
<html>
<html lang="es" xml:lang="es" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Calculadora | Inicio</title>
	<style type="text/css">
		body {font-size:2em;width: 100%;background-color:#f1f1f1;color:#333;}
		form {width:50%;margin:150px auto ;border:solid 1px #333;padding:20px 40px;}
		form input {display:block;padding:15px 20px;margin:40px 0;font-size:1em}
		span {padding:40px;border-radius:100%;width:10px;height:10px;display:block;}
		p {margin:50px 50px 0 50px;}
	</style>
</head>
<body>
<?php
	$color = '';
	$tub = '';
	$tubo = '';
	$cable = 64;
	$tubos = 8;
	$fibra = '';

	$green = array(1,9,17,25,33,41,49,57);
	$red = array(2,10,18,26,34,42,50,58);
	$blue = array(3,11,19,27,35,43,51,59);
	$yellow = array(4,12,20,28,36,44,52,60);
	$gray = array(5,13,21,29,37,45,53,61);
	$violet = array(6,14,22,30,38,46,54,62);
	$brown = array(7,15,23,31,39,47,55,63);
	$orange = array(8,16,24,32,40,48,56,64);

if (isset($_POST['calcular'])){

	$fibra = $_POST['fibra'];
	if ($cable == 64) {
		if ($fibra <= 8 ) {
			$tub = 1 ; /* numero de tubo */
		}elseif ($fibra <= 16) {
			$tub = 2 ;
		}elseif ($fibra <= 24) {
			$tub = 3 ;
		}elseif ($fibra <= 32) {
			$tub = 4 ;
		}elseif ($fibra <= 40) {
			$tub = 5 ;
		}elseif ($fibra <= 48) {
			$tub = 6 ;
		}elseif ($fibra <= 56) {
			$tub = 7 ;
		}elseif ($fibra <= 64) {
			$tub = 8 ;
		}
	}
	if (in_array($fibra,$green)) {
		$color = 'green';
	}
	if (in_array($fibra,$red)) {
		$color = 'red';
	}
	if (in_array($fibra,$blue)) {
		$color = 'blue';
	}
	if (in_array($fibra,$yellow)) {
		$color = 'yellow';
	}
	if (in_array($fibra,$gray)) {
		$color = 'gray';
	}
	if (in_array($fibra,$violet)) {
		$color = 'violet';
	}
	if (in_array($fibra,$brown)) {
		$color = 'orange';
	}
	if (in_array($fibra,$orange)) {
		$color = 'brown';
	}

?>
<p style="font-size:1em">CABLE DE <?=$cable?></p>
<p style="font-size:2em">FIBRA <?=$fibra?></p>
<p style="font-size:2em">Viene del <?=$tub?>º tubo</p>
<p style="font-size:2em"><b style="color:<?=$color?>"><?=$color?></b> <span style="background-color:<?=$color?>"></span></p>
<?php 
}
?>

<form method="post" action="">
	<input type="number" name="fibra" value="<?=$fibra?>">
	<input type="number" name="tubos" value="<?=$tubos?>">
	<input type="submit" name="calcular" value="Calcular">
</form>
</body>
</html>
