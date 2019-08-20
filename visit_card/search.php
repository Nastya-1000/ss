<?php 

	$host = "localhost";
	$username = "u0498082_default";
	$password = "_Mb07za3"; 
	$dbname = "u0498082_default";
	
	$db = mysqli_connect($host, $username, $password, $dbname); //дескриптор (ссылка) базы данных
	
	if (!$db) {
		echo "Ошибка подключения к базе данных: ".mysqli_connect_error();
		exit;
	}
	
	mysqli_set_charset($db, 'utf8');
	
	$query = "SELECT `text` FROM `Article` WHERE `ID` = ".$_GET["ID_article"].";"; //получаем все столбцы из таблицы Comment
	$result = mysqli_query($db, $query);
	
	$result = mysqli_fetch_object($result);

	$result = str_replace($_GET["textForSearch"],'<span class = "yellow">'.$_GET["textForSearch"].'</span>',$result->text);
	
	echo $result;
?>