<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
	<head> 
		<meta charset = "UTF-8"/>
		<title>Найди меня</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet"> 
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/script.js"></script>
		
	</head>
	<body>
	
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
		
		$query = "SELECT * FROM `Users`"; //получаем все столбцы из таблицы Users
		$result = mysqli_query($db, $query);
		
		$users = Array();
		
		while ($row = mysqli_fetch_object($result)) { //получить данные (строки) объектом
			$users[$row->login] = $row->password; //добавляем в массив нов эл-т (ассоциативный массив: эл-т[логин]=пароль)
		}
		//echo $authors[0]->fio;
		
		//print_r ($users);

		?>
	
	
		<?php 
			
			if (isset($_GET["logout"])) 
				if ($_GET["logout"]=="Выйти") 
					session_destroy();
			
			//$log = "log1";
			//$id = "id1";
			//$pass = md5("pass1");
			//echo $pass;
			if (isset($_POST["log"]) && isset($_POST["pass"])) //проверяет, установлены ли log и pass 
				if(isset($users[$_POST['log']]) && $users[$_POST['log']] == md5($_POST['pass']))
				//if ($log == $_GET["log"] && $pass == md5($_GET["pass"]) && $id == $_GET["id"])
				{
					/*echo "Добро пожаловать.";
					echo '<form action="" method="GET"> 
						<input type="submit" class="out" value="Выйти">
						</form>';*/
					$_SESSION["log"]=$_POST["log"];
				}
			//print_r($_SESSION);
			
			if (isset($_SESSION["log"]) && !isset($_GET["logout"])) {
				echo "Добро пожаловать!<br/>";
				
						
						
						
				//action - на какой сайт/страницу переход будет выполнен после выполнения формы
				echo ' Добавить автора : 
				<form action="" method="POST"> 
				<input type="text" name="fio" class="fio" placeholder="fio">
				<input type="text" name="ava" class="avatar" placeholder="avatar">
				<input type="submit" class="add" name="add_author" value="Добавить">
				</form>';
				
				
				echo '<form action="" method="GET"> 
						<input type="submit" class="out" name="logout" value="Выйти">
						</form>';
			}
			//print_r($_GET);
		?>
			
		<br>	
		<a href = "http://sitesitesite.ru/visit_card/users.php" class = "users">Пользователи</a>
			
			
			
		
		
	<?php if (!isset($_SESSION["log"]) || (isset($_GET["logout"])) && ($_GET["logout"]=="Выйти") ) :/* && !isset($_GET["pass"])) || ($log != $_GET["log"] && $pass != md5($_GET["pass"])))*/ ?> 
	
		<form action="" method="POST">
			<input type="text" name="log" class="login" placeholder="login">
			<input type="password" name="pass" class="password" placeholder="password">
			<input type="submit" class="in" value="Войти">
		</form>
		
	<?php endif; ?>


	
		
	</body>
</html>