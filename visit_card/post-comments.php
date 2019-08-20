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
	
	$query = "SELECT * FROM `Comment`"; //получаем все столбцы из таблицы Comment
	$result = mysqli_query($db, $query);
	
	$comments = Array();
	
	/*while ($row = mysqli_fetch_assoc($result)) { //получить данные (строки) ассоциативным массивом (array - простым массивом)
		$authors[] = $row;
	}*/
	//echo $authors[0]['fio'];
	
	while ($row = mysqli_fetch_object($result)) { //получить данные (строки) объектом
		$comments[] = $row;
	}
	
	foreach ($comments as $comment) {
		$comment->date = new DateTime($comment->date); //создаем объект системного класса DateTime для работы с датами
		$comment->date = date_format($comment->date, "j F Y"); //форматируем (j F Y - http://php.net/manual/ru/function.date.php)
	}
	
	mysqli_close($db);
?>