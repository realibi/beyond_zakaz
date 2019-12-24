<?php
	ob_start();
    include("connect.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<title>Вход для Амбассадора</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

    <center>
		<h2>Вход для Амбассадора</h2>
	<form method="POST">
	<input name="login" type="text" required class="login" placeholder="Логин"><br><br>
	<input name="password" type="password" required class="password" placeholder="Пароль"><br><br>
	<input name="submit" type="submit" value="Войти" class="btn">
	</form>
</center>

	<?php


        $login = $_POST['login'];
        $password = $_POST['password'];
        $admin_info = "SELECT * FROM `promo` WHERE `login`='$login' AND `password`='$password'";
        $result = mysqli_query($link, $admin_info) or die("Ошибка " . mysqli_error($link));
    if($result)
    {
            $rows = mysqli_fetch_assoc($result);
            $rows_login = $rows['login'];
            $rows_password = $rows['password'];
            if($login == $rows_login && $password == $rows_password){
                $_SESSION['login_promo'] = $rows;
                $admin_data = $_SESSION['login_promo'];
                if(isset($admin_data)){
                    echo $admin_data['fio'];
                    //header("Location: amba.php");
                }
            }

}

 ?>
		<a href="index.php">Назад</a><!--Выход из страницы-->
</body>
</html>
