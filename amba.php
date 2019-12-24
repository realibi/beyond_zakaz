<? include_once("connect.php")?>
<html>
  <head>
    <title>Личный кабинет Амбассадора</title>
	<meta charset="utf8">
  </head>
  <body>
	  <div class="header"></div>
	  
	  <div class="middle">
		  <h1>Ф.И.О <?php echo $_SESSION['login_promo']['fio']?></h1>
		  <form method="post">
			  <input type="text" name="promo" placeholder="Введите промокод">
			  <input type="submit" value="Ввести промокод" name="ok">
		  </form>
	  </div>
		 <?
		$id = $_SESSION['login_promo']['id'];
		$promo = $_POST['promo'];
	  	$insert = "INSERT INTO `promocode`(`code`, `amba_id`) VALUES ('$promo', '$id')";
		$result = mysqli_query($link, $insert);
		if($result){
			echo "Промокод добавлен";
		}
		else{
			echo "Промокод не добавлен";
		}
	  ?>
	  <hr>
	  <?
	  	$select = "SELECT * FROM `promocode`";
	  	$result = mysqli_query($link, $select);
	  	while($rows = mysqli_fetch_assoc($result)){
			?>
	  <p><? echo $rows['code']?></p>
	  <?
		}
	  
	  $a = 10000 - (20 * 10000 / 100);
	  echo $a;
	  ?>
	  <a href="logout_admin.php">Выйти</a>
  </body>
</html>
