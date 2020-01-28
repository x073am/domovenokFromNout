<?php
  include("connect.php");	
  mysql_query("SET CHARACTER SET utf8 ");
	$query = mysql_query("select COUNT(idshop) as cnt from shops");
   $fetch = mysql_fetch_array($query);
   echo $fetch['cnt'];  
?>
