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
	
		//print_r($_GET);
		
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
		

		if (isset($_GET["delete"])) {
			$query = "DELETE FROM `Author` WHERE ID = ".$_GET["delete"].";";
			$result = mysqli_query($db, $query);
		}
		
		//print_r ($_POST);
		
		if (isset($_POST["fio"]) && isset($_FILES["ava"])) {
			
			$dir = "/var/www/u0498082/data/www/sitesitesite.ru/visit_card/images/";
			$file = $dir.basename($_FILES["ava"]["name"]);
			
			//echo $file;
			if (move_uploaded_file($_FILES["ava"]["tmp_name"],$file)) { //проверка, успешно ли файл (картинка) загружен
				
				$query = "INSERT INTO `Author` (`fio`, `avatar`) VALUES('".$_POST["fio"]."','images/".$_FILES["ava"]["name"]."')";
				//echo $query;
				$result = mysqli_query($db, $query);
			}
			else
				echo "Ошибка загрузки файла";
			
			
		}
		
		$query = "SELECT * FROM `Author`"; //получаем все столбцы из таблицы Author
		$result = mysqli_query($db, $query);
		
		$authors = Array();
		
		while ($row = mysqli_fetch_object($result)) { //получить данные (строки) объектом
			$authors[] = $row; //добавляем в массив нов эл-т
		}
		//echo $authors[0]->fio;
		
		//print_r ($authors);
		//print_r ($_FILES);
		?>

		
		<table align="center" class = "authors">
			<?php foreach ($authors as $author) :?>
			<tr>
				<td align="center" ><?=$author->fio;?></td>
				<td align="center" ><img class = "face" src = "<?=$author->avatar?>" /></td>
				<td align="center" ><div class = "delete"><a href = "http://sitesitesite.ru/visit_card/authors.php?delete=<?=$author->ID?>">Удалить</a></div></td>
			</tr>
			<?php endforeach ?>
		</table>
		
		
		
		
		<div class = "add-author">Добавить автора : <br>
		
		<form action="authors.php" enctype="multipart/form-data" method="POST"> 
			<input type="text" name="fio" class="fio" placeholder="fio">
			<input type="file" name="ava" class="avatar" placeholder="avatar">
			<input type="submit" class="add" name="add_author" value="Добавить">
		</form>
		
		</div> 
	
	</body>
</html>