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
	
	
	if (isset($_GET["a"])) {
		$aID = $_GET["a"];
	}
	else
		$aID = 1;
	
	$authorID = "SELECT `ID_author` FROM `Copyright` WHERE `ID_article` = ".$aID.";"; //a - ID статьи
	$result = mysqli_query($db, $authorID);
	
	while ($row = mysqli_fetch_assoc($result)) { //получить данные (строки) ассоциативным массивом (array - простым массивом)
		$authors[] = $row;
	}
	
	
	$query = "SELECT * FROM `Author` WHERE `ID` = ".$authors[0]['ID_author'].";"; //получаем все столбцы из таблицы Author
	$result = mysqli_query($db, $query);
	
	$authors = Array();
	
	while ($row = mysqli_fetch_object($result)) { //получить данные (строки) ассоциативным массивом (array - простым массивом)
		$authors[] = $row;
	}
	
	
	//
	
	
	//echo $authors[0]['fio'];
	print_r($authors);
	//die();
	
	//echo $authors[0]->fio;
	
	//print_r ($authors);
	
	
	
	
	
	$query = "SELECT * FROM `Article` WHERE `ID` = ".$aID.";"; //получаем все столбцы из таблицы Article
	$result = mysqli_query($db, $query);
	 
	$articles = Array();
	
	/*while ($row = mysqli_fetch_assoc($result)) { //получить данные (строки) ассоциативным массивом (array - простым массивом)
		$authors[] = $row;
	}*/
	//echo $authors[0]['fio'];
	
	while ($row = mysqli_fetch_object($result)) { //получить данные (строки) объектом
		$articles[] = $row;
	}
	
	
	$articles[0]->date = new DateTime($articles[0]->date); //создаем объект системного класса DateTime для работы с датами
	$articles[0]->date = date_format($articles[0]->date, "j F Y"); //форматируем (j F Y - http://php.net/manual/ru/function.date.php)
	

	
	
	mysqli_close($db);
	
?>