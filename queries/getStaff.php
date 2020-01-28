<?php
    include("connect.php");
	  mysql_query("SET CHARACTER SET utf8 ");
	  $query = mysql_query("select * from staff");
	  $i=0;
    $res = '<table class= "table table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="1" rowspan="1" style="width: 180px;" tabindex="0">Имя</th>
        <th colspan="1" rowspan="1" style="width: 220px;" tabindex="0">Фамилия</th>
        <th colspan="1" rowspan="1" style="width: 288px;" tabindex="0">Должность</th>
        <th colspan="1" rowspan="1" style="width: 288px;" tabindex="0">Зарплата</th>
        <th colspan="1" rowspan="1" style="width: 288px;" tabindex="0">Выручка</th>
        <th colspan="1" rowspan="1" style="width: 288px;" tabindex="0">Действие</th>
     
      </tr>

    </thead>';
	  while($fetch = mysql_fetch_array($query))
		{
			if($i%2==0) $class = 'even'; else $class = 'odd';
				$res .= '<tr class="'.$class.'" idperson = "'.$fetch['idperson'].'" idshop = "'.$fetch['idforshop'].'">         
                  <td ><span class = "nameEdit">'.$fetch['name'].'</span> 
                  </td>
                  <td ><span class = "surnameEdit">'.$fetch['surname'].'</span> 
                  </td>
                  <td ><span class = "dolzhEdit">'.$fetch['type'].'</span> 
                  </td>
                  <td ><span class = "payEdit">'.$fetch['fixpay'].'</span> 
                  </td>
                  <td >'.$fetch['sellerrevenue'].'</td>  
                   <td>
                
                    <span class = "deleteedit"><button class = "btn btn-danger">Уволить</button></span>
                   </td>               
                  </tr>';							
		}
  echo $res;
  ?>
