<? include_once("connect.php")?>
<html>
  <head>
    <title>Личный кабинет администратора</title>
	<meta charset="utf8">
  </head>
  <body>
	  <?
		if(isset( $_SESSION['login_admin'])){
	?>
	  <div class="header"></div>
	  
	  <div class="middle">
		  <h1><?php echo $_SESSION['login_admin']['fio']?></h1>
		  <a href="Obrabotka.php">Заказы в обработке</a>
		  <a href="execute.php">Выполненные заказы</a>
		<?
		  if($_GET['mess'] == ok){
			  echo "Статус изменен";
		  }
		  ?>
		
		  <table border="1" width="80%" align="center" cellspacing="0">
			  <center><?php if($_GET['mess'] == 'update') { echo "Статус изменен!";}?></center>
			  <caption><h1>Доска объявлений</h1></caption>
			  <tr>
				  <td align="center">id</td>
				  <td align="center">Товар</td>
				  <td align="center">Номер заказа</td>
				  <td align="center">Дата</td>
				  <td align="center">Статус</td>
				  <td align="center">Кол-во</td>
				  <td align="center">Цена</td>
				  <td align="center">Действие</td>
				  <td align="center">Информация</td>
			  </tr>
	  	<?
		  $select = "SELECT * FROM `users`, `products` WHERE `product_name` = `tovar` ";
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
					 <td align="center"><?php echo $rows['kol-vo']?></td>
					 <td align="center">
					 <? echo $rows['itog']?></td>
					 <td align="center"><input type="submit" value="Изменить статус" name="update"></td>
					 
				 </form>
				 
				 <td align="center">
					 <form action="info.php" method="post">
						<input type="hidden" name="user_id" value="<? echo $rows['user_id']?>">
					 	<!--<input type="submit" value="Информация" name="tovar">-->
						 <a href="info.php?mess=info">Информация</a>
					 </form>
				 </td>
				  </tr>
		  <?
				  
			}
		  ?>
			  
		  </table>


	  </div>
	  <?}
	  	else{
			header("Location: login_admin.php");
		}
	  ?>
	  <a href="logout_admin.php">Выйти</a>
  </body>
</html>
