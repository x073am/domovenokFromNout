<?php
    include("connect.php");
	  mysql_query("SET CHARACTER SET utf8 ");
	  $query = mysql_query("select * from shops");
	  $i=0;
    $res = '<table class= "table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th colspan="1" rowspan="1" style="width: 180px;" tabindex="0">Адресс</th>
                  <th colspan="1" rowspan="1" style="width: 220px;" tabindex="0">Выручка</th>
                  <th colspan="1" rowspan="1" style="width: 288px;" tabindex="0">Прибыль</th>     
                  <th colspan="1" rowspan="1" style="width: 88px;" tabindex="0">Действие</th>   
                </tr>
              </thead>';
	  while($fetch = mysql_fetch_array($query))
		{
			if($i%2==0) $class = 'even'; else $class = 'odd';
				$res .= '<tr class="'.$class.'" idshop = "'.$fetch['idshop'].'">         
                  <td ><span class = "nameEdit">'.$fetch['address'].'</span></td>
                  <td><span class = "surnameEdit">'.$fetch['revenue'].'</span></td>
                  <td>'.$fetch['shopmargin'].'</span></td>
                  <td><span class = "deleteshop"><button class = "btn btn-danger">Расформировать</button></span></td>               
                 </tr>';							
		}
  echo $res;
  ?>
