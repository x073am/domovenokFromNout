<?php
 include("connect.php"); 
  mysql_query("SET CHARACTER SET utf8");
  if($_GET['name'] and $_GET['pw'])
    {  
	    $name = $_GET['name'];
      $surname = $_GET['surname'];
	    $pw = $_GET['pw'];
      
      if($query = mysql_query("Select type,idperson from staff where (name = '$name') and (surname = '$surname') and (password = '$pw')")){
        $fetch = mysql_fetch_array($query);
        $id = $fetch['idperson'];
        $type =  $fetch['type'];
        $str = "?username=$name&surname=$surname&id=$id";
        if ($type == "owner")header("Location: http://localhost:8080/indexOwn.html$str");
        if ($type == "seller")header("Location: http://localhost:8080/indexSel.html$str");
        if ($type == "storage")header("Location: http://localhost:8080/indexStor.html$str");
        
		
		//if ($type == "owner")header("Location: http://domovenok.com/indexOwn.html$str");
        //if ($type == "seller")header("Location: http://domovenok.com/indexSel.html$str");
        //if ($type == "storage")header("Location: http://domovenok.com/indexStor.html$str");
        ////$ar = array("user" => $name, "perm" => $type, "content" => "My asynchrone content");
        ////echo json_encode($ar);
      }
    }
?>
