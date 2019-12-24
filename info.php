<?php
	include_once("connect.php");
?>
<html>
  <head>
    <title>Информация о товаре</title>
	<meta charset="utf8">
	<link rel="stylesheet" href="css/style.css">
  </head>
  <body>
	  <div>
		  <table border="1" cellspacing="0">
			  <tr>
				  <td>Название</td>
				  <td>Цена</td>
				  <td>Имя</td>
				  <td>Фамилия</td>
				  <td>Номер</td>
				  <td>Почта</td>
			  </tr>
	  	<?php
		  $user_id = $_POST['user_id'];
		  	$select = "SELECT * FROM `users` WHERE `user_id` = '$user_id'";
		  	$result = mysqli_query($link, $select);
		  	while($rows = mysqli_fetch_assoc($result)){
				?>
			  <tr>
				  <td><? echo $rows['tovar'] ?></td>
				  <td><? echo $rows['itog'] ?></td>
				  <td><? echo $rows['name'] ?></td>
				  <td><? echo $rows['lastname'] ?></td>
				  <td><? echo $rows['nomer'] ?></td>
				  <td><? echo $rows['mail'] ?></td>
			  </tr>
		  <?
			}
		  ?>
		  </table>
	  </div>
	  <a href="admin.php">К товарам</a>
  </body>
</html>
