<?php
  include("connect.php"); 
  mysql_query("SET CHARACTER SET utf8 ");
  if($_GET['idshop'])
    {  
	    $id = $_GET['idshop'];
      if(mysql_query("delete from shops where idshop=$id"))
      echo succces;
    }
?>
