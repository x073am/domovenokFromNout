<?php
    include("connect.php");
	  mysql_query("SET CHARACTER SET utf8 ");
	  $i=0;
    $res = '<table class= "table table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th colspan="1" rowspan="1" style="width: 300px;" tabindex="0">Статья</th>
        <th colspan="1" rowspan="1" style="width: 190px;" tabindex="0">Сумма</th>
      </tr>
    </thead>';
  
   $query = mysql_query("select SUM(fixpay) as Payment from staff");
   $fetch0 = mysql_fetch_array($query);
    
   $query = mysql_query("select SUM(sellerrevenue) as revenue from staff");
   $fetch1 = mysql_fetch_array($query);
    
   $query = mysql_query("select surname as best from staff where sellerrevenue = (select MAX(sellerrevenue) from staff)");
   $fetch2 = mysql_fetch_array($query);
  
   $query = mysql_query("select SUM(shopmargin) as margin from shops");
   $fetch3 = mysql_fetch_array($query);

   $query = mysql_query("select address as best from shops where shopmargin = (select MAX(shopmargin) from shops)");
   $fetch4 = mysql_fetch_array($query);
  
   $query = mysql_query("select SUM(revenue) as revenue from shops");
   $fetch5 = mysql_fetch_array($query);

  $res .= '<tr>
            <td>Расходов на ЗП в месяц</td>
            <td>'.$fetch0['Payment'].'</td>
           </tr>
           <tr>
            <td >Суммарная выручка от продавцов</td>
            <td>'.$fetch1['revenue'].'</td>
           </tr>
           <tr>
            <td >Лучший продавец</td>
            <td>'.$fetch2['best'].'</td>
           </tr>
           <tr>    
            <td>Суммарная прибыль от магазинов</td>
            <td>'.$fetch3['margin'].'</td>
           </tr>
           <tr>
            <td >Самый прибыльный магазин:</td>
            <td>'.$fetch4['best'].'</td>
           </tr>
           <tr>
            <td>Сумма выручки всех магазинов:</td>
            <td>'.$fetch5['revenue'].'</td>
           </tr>';							
		

  echo $res;
  ?>
