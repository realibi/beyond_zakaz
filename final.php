<?php
	include_once("connect.php");
?>
<html>
  <head>
    <title>Оформление заказов</title>
	<meta charset="utf8">
	<link rel="stylesheet" href="css/style.css">
  </head>
  <body>
	  <p id="det">ДЕТАЛИ ЗАКАЗА</p><p id="zak">ВАШ ЗАКАЗ</p><br><br>
	<form action="main.php" id="form" method="post">
		<input type="text" name="name" placeholder="Имя" id="name" required>
		<input type="hidden" value="<? echo $_POST['tovar']?>" name="tovar" id="tovar">
		<input type="hidden" value="<? echo $_POST['number']?>" name="kolvo" id="kolvo">
			  <input type="text" name="lastname" placeholder="Фамилия" id="lastname" required><br><br>
			  <input type="mail" name="mail" placeholder="Почта" id="mail" required><br><br>
			  <input type="number" name="tel" placeholder="Номер телефона" id="nomer" required><br><br>
			  <select name="region" id="region">
				  <option value="Акмолинская область">Акмолинская область</option>
				  <option value="Актюбинская область">Актюбинская область</option>
				  <option value="Алматинская область">Алматинская область</option>
				  <option value="Атырауская область">Атырауская область</option>
				  <option value="Восточно-Казахстанская область">Восточно-Казахстанская область</option>
				  <option value="Жамбылская область">Жамбылская область</option>
				  <option value="Западно-Казахстанская область">Западно-Казахстанская область</option>
				  <option value="Карагандинская область">Карагандинская область</option>
				  <option value="Костанайская область">Костанайская область</option>
				  <option value="Кызылординская область">Кызылординская область</option>
				  <option value="Мангистауская область">Мангистауская область</option>
				  <option value="Павлодарская область">Павлодарская область</option>
				  <option value="Северо-Казахстанская область">Северо-Казахстанская область</option>
				  <option value="Туркестанская область">Туркестанская область</option>
			  </select><br><br>
		<input type="text" name="adres" placeholder="Адрес доставки" id="adres" id="adres" required><br><br>
		<input type="submit" value="Оформить заказ" id="knopka" name="zakaz">
	 
	  
	  <div class="zak">
		  <table bordr="1" cellspacing="20">
			  <? $tovar = $_POST['tovar'];
			  	 $vkus = $_POST['vkus'];?>
			  <tr>
				  <td>ТОВАР</td>
				  <td>ПОДЫТОГ</td>
			  </tr>
			  
			  <tr>
				  <td><? echo $tovar ?></td>
			  </tr>
			  <tr>
			  	<td>Цена</td>
				  <td><? echo $_POST['price']." KZT"?></td>
			  </tr>
			  <tr>
			  	<td>Кол-во</td>
				  <td><? echo $_POST['number']."шт"?></td>
			  </tr>
			  <tr>
			  	<td>Вкус:</td>
				<td><? echo $vkus ?></td>
			  </tr>
			  <tr>
			  	<td>Промокод</td>
				  <td>
					  <?
					  	$select = "SELECT * FROM `promocode` WHERE 1";
					  	$result = mysqli_query($link, $select);
					  	while($rows = mysqli_fetch_assoc($result)){
							if($_POST['promo'] == $rows['code']){
							echo $rows['procent']."%";
							
							}
							elseif($rows['promo'] == "")
							{
								echo $rows['procent'] * 0;
								
							}
					  ?>
				  </td>
			  </tr>
			  <tr>
			  	<td>Итого: </td>
				  <td>
				  	<?
						$select = "SELECT * FROM `promocode` WHERE 1";
					  	$result = mysqli_query($link, $select);
					  	while($rows = mysqli_fetch_assoc($result)){
							if($_POST['promo'] == $rows['code']){
					  		$itog = $_POST['price'] - ($_POST['price'] * $rows['procent']) / 100;
							echo $fin = $itog * $_POST['number']." KZT";
								echo "<input type='hidden' name='itog' value='$fin'>";
							}
							else{
								$itog = $_POST['price'] - 0;
								echo $fin = $itog * $_POST['number']." KZT";
								echo "<input type='hidden' name='itog' value='$fin'>";
							}
						}
					  ?>
				  </td>
			  </tr>
			  <?}?>
		  </table>
	  </div>
		 </form>
  </body>
</html>
