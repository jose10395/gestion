<?php

include_once('../conexiones/Db.php'); 
$db = new MySQL();
if(!empty($_POST['data']))
   {
   $query=$_POST['data'];
        $consulta = $db->consulta($query);
            if($db->num_rows($consulta)>0)
             {
                 while($row = $db->fetch_array($consulta)){
                     session_start();
                     $_SESSION['iduser']=$row['id'];
                    $_SESSION['username']=$row['nombreusuario'];
                    $_SESSION['logged']=TRUE;
                    header("Location:../inicio.php");
                }
             }  
            else
            {
                echo "<body background='../images/background.jpg'><br><br><center><img src='../images/logo_USGP.jpg'/>"
                . "<br><br><br>Error de usuario. Intente nuevamente...</center></body>";
                echo '
                        <meta http-equiv="refresh" content="2; url=../index.php"> 
                ';
            }
   }
   else 
   {
     
     echo "<br><br><br><br><br><br>Error de usuario. Intente nuevamente...";

     echo '
             <meta http-equiv="refresh" content="2; url=index.php"> 
     ';
   }
