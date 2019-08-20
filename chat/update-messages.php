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
	
	$query = "SELECT * FROM `messages` ORDER BY `date` ASC"; //получаем все столбцы из таблицы отсортированные по возрастанию (DESK - убыванию)
	$result = mysqli_query($db, $query);
	
	$messages = Array();
	
	while ($row = mysqli_fetch_object($result)) { //получить данные (строки) объектом
		$messages[] = $row;
	}
	
	/*foreach ($messages as $message) {
		
		$today = date_format(new DateTime, "j");
		
		$message->date = new DateTime($message->date); //создаем объект системного класса DateTime для работы с датами
		if ($today == date_format($message->date, "j")) {
			$message->date = date_format($message->date, "H:i:s"); //форматируем (j F Y - http://php.net/manual/ru/function.date.php)
		}
		else {
			$message->date = date_format($message->date, "d.m.y"); //форматируем (j F Y - http://php.net/manual/ru/function.date.php)
		}*/
	}
	
	
	foreach ($messages as $message) {
		
		if ($startTime <= $message->date) {
			
			$message->date = date_format($message->date, "H:i:s"); //форматируем (j F Y - http://php.net/manual/ru/function.date.php)

		
			echo '<div class = "message_each_one">
					<span class = "message_user">'.$message->user.'</span>
					<span class = "message_date">('.$message->date.') :</span>
					</br>
					<span class = "message_text">'.$message->message.'</span>
				</div>
				</br>';
		}
	}

	
	mysqli_close($db);