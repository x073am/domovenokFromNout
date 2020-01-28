<?php
    include("connect.php");
	  mysql_query("SET CHARACTER SET utf8 ");
	  $query = mysql_query("select * from goods where idforshop = 1");
	  $i=0;
    $res = '<table class= "table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th colspan="1" rowspan="1" style="width: 180px;" tabindex="0">Номер</th>
                  <th colspan="1" rowspan="1" style="width: 220px;" tabindex="0">Тип</th>
                  <th colspan="1" rowspan="1" style="width: 288px;" tabindex="0">Цвет</th>     
                  <th colspan="1" rowspan="1" style="width: 88px;" tabindex="0">Размер</th>       
                  <th colspan="1" rowspan="1" style="width: 88px;" tabindex="0">Закупочная цена</th>    
                  <th colspan="1" rowspan="1" style="width: 88px;" tabindex="0">Розничная цена</th>    
                  <th colspan="1" rowspan="1" style="width: 88px;" tabindex="0">Количество</th>    
                  <th colspan="1" rowspan="1" style="width: 88px;" tabindex="0">Бренд</th>
                  <th colspan="1" rowspan="1" style="width: 88px;" tabindex="0">Дата закупки</th>
                </tr>
              </thead>';
	  while($fetch = mysql_fetch_array($query))
		{
				$res .= '<tr idshop = "'.$fetch['idforshop'].'">         
                  <td>'.$fetch['idgood'].'</td>
                  <td>'.$fetch['idfortype'].'</td>
                  <td>'.$fetch['idforcol'].'</td>
                  <td>'.$fetch['idforsize'].'</td>
                  <td>'.$fetch['frprice'].'</td>
                  <td>'.$fetch['price'].'</td>
                  <td>'.$fetch['goodqnt'].'</td>
                  <td>'.$fetch['idforbrand'].'</td>
                  <td>'.$fetch['datebuy'].'</td>
                 </tr>';							
		}
  echo $res;
  ?>
