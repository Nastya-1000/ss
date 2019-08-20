<?php 

	$host = "localhost";
	$username = "u0498082_default";
	$password = "_Mb07za3"; 
	$dbname = "u0498082_chat";
	
	$db = mysqli_connect($host, $username, $password, $dbname); //дескриптор (ссылка) базы данных
	
	if (!$db) {
		echo "Ошибка подключения к базе данных: ".mysqli_connect_error();
		exit;
	} 
	
	mysqli_set_charset($db, 'utf8');
	
	
	$query = "INSERT INTO `messages` (`user`, `message`, `date`) VALUES('".$_POST["user"]."','".$_POST["message"]."',NOW())";
	//echo $_POST["comment"];
	//echo $query;
	$result = mysqli_query($db, $query);
	
	mysqli_close($db);
	
	$commentDate = date_format(new DateTime(), "H:i:s"); //форматируем (j F Y - http://php.net/manual/ru/function.date.php)
	
	echo '<div class = "message_each_one">
			<span class = "message_user">'.$_POST["user"].'</span>
			<span class = "message_date">('.$commentDate.') :</span>
			</br>
			<span class = "message_text">'.$_POST["message"].'</span>
		</div>
		</br>';
?>