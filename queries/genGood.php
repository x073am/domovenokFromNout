 <?php
include("connect.php");

  $res = '<table>
          <tr>
            <th>Тип</th>
            <th>Размер</th>
            <th>Цвет</th>
            <th>Материал</th>
            <th>Бренд</th>
            <th>Магазин</th>
            <th>Закупочная цена</th>

            <th>Розничная цена</th>      
            <th>Дата закупки</th>
            <th>Количество</th>
          </tr>
          <tr><td>';

	mysql_query("SET CHARACTER SET utf8 ");

	$query0 = mysql_query("select * from types");
  $query1 = mysql_query("select * from sizes");
	$query2 = mysql_query("select * from color");
	$query3 = mysql_query("select * from material");
  $query4 = mysql_query("select * from shops");
  $query5 = mysql_query("select * from brands"); 

    $res .= '<select name = "idfortype"><option disable>Тип</option>';

	while($fetch = mysql_fetch_array($query0))
	{  
               $res .= '<option selected value = "'.$fetch["idtype"].'">'.$fetch["typename"].'</option>';
  }
  
   $res .= '</td><td><select name = "idforsize"><option disable>Размер</option>';

  while($fetch = mysql_fetch_array($query1))
	{  
               $res .= '<option selected value = "'.$fetch["idsize"].'">'.$fetch["sizename"].'</option>';
  }

   $res .= '</td><td><select name = "idforcol"><option disable>Цвет</option>';

  while($fetch = mysql_fetch_array($query2))
	{  
               $res .= '<option selected value = "'.$fetch["idcolor"].'">'.$fetch["colorname"].'</option>';
  }

   $res .= '</td><td><select name = "idformat"><option disable>Материал</option>';

  while($fetch = mysql_fetch_array($query3))
	{  
               $res .= '</td><td><option selected value = "'.$fetch["idmat"].'">'.$fetch["matname"].'</option>';
  }
  
   $res .= '</td><td><select name = "idforbrand"><option disable>Брэнд</option>';

  while($fetch = mysql_fetch_array($query5))
	{  
               $res .= '<option selected value = "'.$fetch["idbrand"].'">'.$fetch["brandname"].'</option>';
  }

    $res .= '</td><td><select name = "idforshop"><option disable>Магазин</option>';
  
  while($fetch = mysql_fetch_array($query4))
	{  
               $res .= '<option selected value = "'.$fetch["idshop"].'">'.$fetch["address"].'</option>';
  }
  

            
 $res .= '</td><td><input name = "frprice" type = number placeholder = "Закупочная цена"/></td>
          <td><input name = "price" type = number placeholder = "Розница цена"/></td>
          <td><input name = "datebuy" type = number placeholder = "Дата закупки"/></td>
          <td><input name = "goodqnt" type = number placeholder = "Количество"/></td>
      </tr>
    </table>';
echo $res;
?>
