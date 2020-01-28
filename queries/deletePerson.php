<?php
  include("connect.php"); 
  mysql_query("SET CHARACTER SET utf8 ");
  if($_GET['idperson'])
    {  
	    $id = $_GET['idperson'];
      if(mysql_query("delete from staff where idperson=$id"))
      echo succces;
    }
?>
