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
	  </div>
		 
	  <a href="logout_admin.php">Выйти</a>
  </body>
</html>
