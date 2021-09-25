<?php  

try{
	//$USR=htmlentities(addcslashes($_POST['usr']));
	$USR=$_POST['usr'];
	//$PASS=htmlentities(addcslashes($_POST['pass']));
	$PASS=$_POST['pass'];

	$enlace = new mysqli ("localhost", "cultivoiot", "235689ciotDESA","mundo_fungi");
	
	$sql="SELECT * FROM `usuarios` WHERE `USR`='$USR' AND `PASS`='$PASS'";

	$verifica=$enlace->query($sql);
	$num_reg=$verifica->num_rows;

	if ($num_reg!=0){
		session_start();
		$_SESSION["usr"]=$_POST['usr'];
		header("location: index.html");

	}else{
		header("location:login.php");
	}

}catch(Exception $e){
	die("Error: ".$e->getMessage());
}

?>