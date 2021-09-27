<?php  

try{
        //$USR=htmlentities(addcslashes($_POST['usr']));
        $USR=$_POST['usr'];
        //$PASS=htmlentities(addcslashes($_POST['pass']));
        $PASS=$_POST['pss'];

        $enlace = new mysqli ("localhost", "cultivoiot", "235689ciotDESA","mundo_fungi");

        $sql="SELECT * FROM `usuarios` WHERE `USR_NAME`='$USR' AND `USR_PASS`='$PASS'";

//      echo $sql;
        $verifica=$enlace->query($sql);
//      echo $verifica;
        $num_reg=$verifica->num_rows;

        if ($num_reg!=0){
                session_start();
                $_SESSION["usr_fungi"]=$_POST['usr'];
                header("location: ../../index.php");

        }else{
                header("location:../../login.html");
                //echo $num_reg;
        }

}catch(Exception $e){
        die("Error: ".$e->getMessage());
}

?>
