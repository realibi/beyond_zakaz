<?php
	if($_POST['zakaz']){
		AddZakaz();
	}
if($_POST['update']){
	Update_status();
}


	function AddZakaz(){
		include("connect.php");
		$tovar = $_POST['tovar']; 
		$kolvo = $_POST['kolvo']; 
		$name = $_POST['name']; 
		$lastname = $_POST['lastname'];
		$mail = $_POST['mail'];
		$nomer = $_POST['tel'];
		$number = $_POST['number'];
		$region = $_POST['region'];
		$unique_nomer = rand(111111111, 999999999);
		$today = date("F j, Y, g:i a");
		$itog = $_POST['itog']; 
		
		$insert = "INSERT INTO `users`(`tovar`, `kol-vo`, `itog`, `nomer`, `name`, `lastname`, `mail`, `region`, `date`, `unique_nomer`, `stat_id`) 
		VALUES ('$tovar', '$kolvo', '$itog', '$nomer', '$name','$lastname','$mail','$region','$today','$unique_nomer', '0')";
		$result = mysqli_query($link, $insert) or die(mysqli_error($link));
		if($result){
			header("Location: index.php?mess=ok");
			//echo "Сработало!";
		}
		else{
			echo "НЕ сработало!";
		}
	}

	function Update_status(){
		include_once("connect.php");
		$admin_id = $_SESSION['login_admin']['admin_id'];
		$zakaz_id = $_POST['user_id'];
		$status = $_POST['status'];
		//echo $status;
		$update = "UPDATE `users` SET `stat_id`= '$status',`admin_id`= '$admin_id' WHERE `user_id` = '$zakaz_id'";
		$result = mysqli_query($link, $update) or die(mysqli_error($link));
		if($result){
			header("Location: admin.php?mess=update");
			//echo "Изменения произошли";
		}
	}

	function ShowSelect($id)
	{
		$arr = array("NO","Processed","Ready","Canceled");
		echo "123<select name='status'>";
		/*for($i=0; $i < count($arr); $i++)
		{
			if($id == $i)
				echo "<option selected='selected' value='$i'>$arr[$i]</option>";
			else
				echo "<option value='$i'>$arr[$i]</option>";
		}*/
		
		echo "</select>";
	}
?>
