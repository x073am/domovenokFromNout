<?php
  include("connect.php"); 
  mysql_query("SET CHARACTER SET utf8 ");
  if($_GET['address'])
    {  
	    $address = $_GET['address'];
      if(mysql_query("Insert into shops (address) Values('$address')"))
      echo succces;
    }
?>

