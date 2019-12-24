<?php
	session_start();
	header("Content-Type: text/html; charset=utf-8");
	ob_start();
	//$host = "srv-db-plesk03.ps.kz:3306";
	//$user = "magzh_admin";
	//$password = "Armag9979";
	//$database = "magzhank_beyond";

	//$link = mysqli_connect("127.0.0.1", "root", "", "magzhank_beyond");



    $link = mysqli_connect('localhost:8888', 'root', '');
    if (!$link) {
        die('Ошибка соединения: ' . mysqli_error($link));
    }
    echo 'Успешно соединились';
    mysqli_close($link);


$charset = "utf8";
	if(!mysqli_set_charset($link, $charset)){
		echo "Ошибка кодировки!";
	}