<?php
	include_once("connect.php");

?>
<html>
  <head>
    <title>Главная страница</title>
	<meta charset="utf8">
	 <link rel="stylesheet" href="css/style.css">
	 <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	 <link rel="shortcut icon" href="image/logo2.png" type="image/x-icon">
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
	 
	  <div class="middle">
      	<video src="video/fon2.mp4" autoplay="autoplay" loop="loop" muted width="100%"></video>
	  </div>
	  <div class="products">
		  <table border="0" cellspacing="30" width="100%" align="center" class="prod_table">
			  <caption><h1>Продукция</h1></caption>
			  <tr>
				  
				  <?php
                    $link = mysqli_connect("127.0.0.1", "root", "", "magzhank_beyond");
				  	$product = "SELECT * FROM products WHERE product_id < 4";
				  	$result = mysqli_query($link, $product);
                    $rows = mysqli_fetch_assoc($result);
                    $rowsCount = count($rows);
                    $i = 0;
				  while($i < $rowsCount){
				  ?>
					  <form action="korzina.php" method="post">
				  <td align="center">
					  <img src="<? echo $rows['product_image']?>" width="100%" class="prod_img"><br>
					  <input type="hidden" name="name" value="<? echo $rows['product_name']?>">
					  <input type="hidden" name="vkus" value="<? echo $rows['vkus']?>" class="vkus">
				  	  <input type="submit" name="ok" value="<? echo $rows['product_name']?>" class="btn1">
				 </td>
					  </form>
				  <?php
                      $i++;

				  	}
				  ?>
				
			  </tr>
		  </table>
	  </div>
	  <div class="about">
		  <p class="head">ЧТО ТАКОЕ BEYOND?</p>
		  <p class="about_text">Компания BEYOND является первым казахстанским производителем специализированного спортивного питания торговой марки BEYOND с 2017 года. Спортивное питание BEYOND является группой пищевых продуктов, обогащенных белками, минералами и витаминами, приём которой направлен в первую очередь на улучшение спортивных результатов, укреплению здоровья, нормализации обмена веществ, достижению оптимальной массы тела и улучшению качества жизни потребителя.</p>
	  </div>
	  <span class="about_fon"></span>
	  
	  <div class="partner">
	  	
	  </div>
	  <div class="map">
	  	<img src="image/abc.png" width="90%" id="map">
	  </div>
	   <a href="login_admin.php">Войти как админ</a>
  </body>
</html>
