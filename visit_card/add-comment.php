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
	
	$query = "INSERT INTO `Comment` (`ID_article`, `text`, `is_publish`, `date`) VALUES(".$_POST["ID_article"].",'".$_POST["comment"]."',1,NOW())";
	//echo $_POST["comment"];
	$result = mysqli_query($db, $query);
	
	mysqli_close($db);
	
	$commentDate = date_format(new DateTime(), "j F Y"); //форматируем (j F Y - http://php.net/manual/ru/function.date.php)
	
	echo '<div class = "comment_each_one">
						<div class = "comment_text">'.$_POST["comment"].'</div>
						<div class = "comment_date">'.$commentDate.'</div>
					</div>';
?>