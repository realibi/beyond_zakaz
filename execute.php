<?
	include_once("connect.php");
?>
<html>
  <head>
    <title>Заказы в обработке</title>
	<meta charset="utf-8">
  </head>
  <body>
	  <a href="admin.php">Все заказы</a>
	  <center>
		  <h1>Выполненные заказы</h1>
		  <table border="1" cellspacing="0">
			   <tr>
				  <td align="center">id</td>
				  <td align="center">Товар</td>
				  <td align="center">Номер заказа</td>
				  <td align="center">Дата</td>
				  <td align="center">Статус</td>
				  <td align="center">Кол-во</td>
				  <td align="center">Цена</td>
				  <td align="center">Действие</td>
			  </tr>
				  <?php
					$admin_id = $_SESSION['login_admin']['admin_id'];
					$select = "SELECT * FROM `users` WHERE `stat_id` = '2' AND `admin_id` = '$admin_id'";
					$result = mysqli_query($link, $select);
		  while($rows = mysqli_fetch_assoc($result)){
		  ?>
			  
		  	 <tr>
				 <form action="main.php" method="post">
			  <td><? echo $rows['user_id']?><input type="hidden" name="user_id" value="<? echo $rows['user_id']?>"></td>
			  <td align="center"><? echo $rows['tovar']?></td>
				 <td align="center">
						 <input type="hidden" name="unic_code" value="<? echo $rows['unique_nomer']?>">
					 <p><? echo $rows['unique_nomer']?></p>
				 </td>
					 <td align="center"><? echo $rows['date']?></td>
				 <td align="center">
					 <?
				  $id = $rows['stat_id'];
			  
			  $arr = array("Не выбрано","В обработке","Выполнено","Отменено");
		echo "<select name='status' id=''>";
		for($i=0; $i < count($arr); $i++)
		{
			$j=$i;
			if($id == $i)
				echo "<option selected='selected' value='$j'>$arr[$i]</option>";
			else
				echo "<option value='$i'>$arr[$i]</option>";
		}
		
		echo "</select>";
						 ?>
					 
				 </td>
				 <td align="center"><input type="submit" value="Изменить статус" name="update"></td>					 
				 </form>
				  </tr>
		  <?
				  
			}
		  ?>
				  
		  </table>
	  </center>
  </body>
</html>
