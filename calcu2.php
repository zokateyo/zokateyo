<!DOCTYPE html>
<html>
<html lang="es" xml:lang="es" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php include 'zhx/incz/z_meta.php';?>
	<?php include 'zhx/incz/sql_da.php';?>
	<title><?=$web_title?> | Inicio</title>

<?php
//Aqui ingresa cable
$cable='';
//Aqui ingresa numero de fibra
$fibra='';
$tubo=0;
$color=0;
$Cfibra=0;
$colorT=array("blanco","rojo","azul","verde");
$colorF=array("","green","red","blue","yellow","gray","violet","orange","brown");
?>
	<style type="text/css">
		 body {font-size:18px;width: 100%;background-color:#f1f1f1;color:#333;}
		form {width:20%;margin:10px auto ;border:solid 1px #333;padding:20px 40px;}
		form input, select {display:block;padding:15px 20px;margin:40px 0;font-size:16px;}
		span {padding:40px;border-radius:100%;width:10px;height:10px;display:block;margin:10px auto;}
		p {margin:20px 50px;font-size:20px;}
	</style>
</head>
<body>
<?php
if (isset($_POST['calcular'])){
	$cable = $_POST['cable'];
	$fibra = $_POST['fibra'];

	if($cable==16){
		if(($fibra%4)==0){ $tubo=intdiv($fibra,4)-1;
		   $Cfibra=(4+$fibra%4);
		 }else{ $tubo=intdiv($fibra,4);
	       $Cfibra=($fibra%4);
	     }
	}
	if(($cable==24)||($cable==32)){
		if(($fibra%4)==0){
		  $color=(intdiv($fibra,4)-1);
		  $color=intdiv($color,2);
		  $tubo=(intdiv($fibra,4)-1);
		  $Cfibra=(4+$fibra%4);
		}else{
	      $color=(intdiv($fibra,4));
	      $color=intdiv($color,2);
	      $tubo=(intdiv($fibra,4));
	      $Cfibra=($fibra%4);
		}
	}
	if(($cable==48)||($cable==64)){
		if(($fibra%8)==0){
		  $color=(intdiv($fibra,8)-1);
		  $color=intdiv($color,2);
		  $tubo=(intdiv($fibra,8)-1);
		  $Cfibra=(8+$fibra%8);
		}else{
	      $color=(intdiv($fibra,8));
	      $color=intdiv($color,2);
	      $tubo=(intdiv($fibra,8));
	      $Cfibra=($fibra%8);
		}
	}

	$Ctubo = $colorT[$tubo];
	$tubo = $tubo+1;
	$color = $colorF[$Cfibra];

?>


<p>CABLE DE <?=$cable?></p>
<p>FIBRA <?=$fibra?></p>
<p>Color del tubo <?=$Ctubo?></p>
<p>Viene del <?=$tubo?>º tubo</p>
<p style="text-align:center"><b style="color:<?=$color?>"><?=$color?></b><span style="background-color:<?=$color?>"></span></p>
<?php 
}
?>

<form method="post" action="">
	<input type="number" name="fibra" value="<?=$fibra?>">
	<select name="cable">
		<?php if ($cable != null){
			echo '<option value='.$cable.'>'.$cable.' KT</option>';
		}

		?>
		<option value="16">16 KT</option>
		<option value="24">24 KT</option>
		<option value="48">48 KT</option>
		<option value="64">64 KT</option>
	</select>
	<input type="submit" name="calcular" value="Calcular">
</form>
</body>
</html>