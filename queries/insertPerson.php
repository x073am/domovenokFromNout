<?php
  include("connect.php"); 
  mysql_query("SET CHARACTER SET utf8 ");
  if($_GET['name'])
    {  
	    $name = $_GET['name'];
      $surname = $_GET['surname'];
      $idshop= $_GET['idshop'];
      $pw = $_GET['pw'];
      $fixpay= $_GET['fixpay'];
	    
      if(mysql_query("Insert into staff (idforshop,name,surname,password,fixpay) Values($idshop,'$name','$surname','$pw',$fixpay)"))
      echo succces;
    }
?>

