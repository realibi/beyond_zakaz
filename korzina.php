<?
	include_once("connect.php");
?>
<html>
  <head>
    <title>Оформление заказа</title>
	<meta charset="utf8">
	 <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
	  <div class="header"><!--Верхнее меню-->
		  <menu>
			  <li><a href="">Товары</a></li>
			  <li><a href="">О нас</a></li>
			  <li><a href="promo_login.php">Амбассадор</a></li>
			  <li><a href="">Контакты</a></li>
		  </menu>
		  <img src="image/Beyond_logo.png">
	  </div>
	  <div id="prost">
	  	
	  </div>
	 
	  <div class="middle2">
		  <h2>Оформление заказа</h2>
			
		  	
		  
		  <form action="final.php" method="post" class="korzina">
			  <? $tovar = $_POST['name']?>
			  <input type="hidden" name="tovar" value="<? echo $tovar?>">
			  
			  <p><b><? echo $tovar?></b></p><hr>
			  
			  <? 
			  	$select = "SELECT * FROM `products` WHERE `product_name` = '$tovar'";
			  	$result = mysqli_query($link, $select);
			  	while($rows = mysqli_fetch_assoc($result)){
			  ?>
			  <input type="hidden" name="price" value="<? echo $rows['price']?>">
			  <select name="vkus">
				  <option value="<? echo $rows['vkus']?>"><? echo $rows['vkus']?></option>
			  </select>
			  <img src="<? echo $rows['product_image']?>" id="prod_img">
			  <p id="price"><? echo $rows['price']?>KZT</p>
			  <p>Способ применения</p>
			  <p><? echo $rows['sposob']?></p>
			  <input type="number" placeholder="Кол-во" id="kolvo" name="number" required><br><br>
			  <?
				}
			  ?>
			  
			 <input type="text" placeholder="Промокод" id="kolvo" name="promo"><br><br>
			  <input type="submit" name="zakaz" value="В корзину" id="zakaz_btn">
		  </form>
				  
	  </div>
		  <a href="http://beyond.it-nomads.kz">На главную</a>
		  
	  <?
	  	//$today = date("F j, Y, g:i a");
				 //echo $today;
	  ?>
  </body>
</html>
