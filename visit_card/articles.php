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
		
		
		
		
		if (isset($_POST["change_head"])) {
		//UPDATE <TABLE NAME> SET <FIELD> = <VALUE> WHERE <FIELD> = <...> AND ...;
		$query = "UPDATE `Article` SET `head` = '".$_POST["change_head"]."' WHERE `ID` = ".$_POST["articleforchange"].";";
		$result = mysqli_query($db, $query);
		}
		if (isset($_POST["change_text"])) {
			$query = "UPDATE `Article` SET `text` = '".$_POST["change_text"]."' WHERE `ID` = ".$_POST["articleforchange"].";";
			$result = mysqli_query($db, $query);
		}
		if (isset($_POST["change_author"])) {
			$query = "UPDATE `Copyright` SET `ID_author` = ".$_POST["change_author"]." WHERE `ID_article` = ".$_POST["articleforchange"].";";
			//echo $query;
			$result = mysqli_query($db, $query);
		}
 
		
		
	
		/*$query = "SELECT * FROM `Article`"; //получаем все столбцы из таблицы Article
		$result = mysqli_query($db, $query);
		
		$articles = Array();
		
		while ($row = mysqli_fetch_object($result)) { //получить данные (строки) объектом
			$articles[] = $row; //добавляем в массив нов эл-т 
		}*/
		//echo $authors[0]->fio;
		
		//print_r ($authors);
		//print_r ($_FILES);
		
		
		$query = "SELECT * FROM `Author`"; //получаем все столбцы из таблицы Author
		$result = mysqli_query($db, $query);
		
		$authors = Array();
		
		while ($row = mysqli_fetch_object($result)) { //получить данные (строки) объектом
			$authors[] = $row; //добавляем в массив нов эл-т
		}
		
		
		
		$query = "SELECT * FROM `Copyright` INNER JOIN `Author` ON `ID_author` = `Author`.`ID` INNER JOIN `Article` ON `ID_article` = `Article`.`ID`";
		$result = mysqli_query($db, $query);
		$articles = Array();
		
		while ($row = mysqli_fetch_object($result)) { //получить данные (строки) объектом
			$articles[] = $row; //добавляем в массив нов эл-т 
		}
		
		mysqli_close($db);
		
	?>
	
	<?php if (isset($_GET["change"])): ?>
	<?php foreach ($articles as $article) {
		if ($article->ID == $_GET["change"])
			$article_for_change = $article;
	}
	
	?>
	<form action="" method="POST">
	<table align="center" class = "article-change">
			<tr>
				<td align="center" >Название</td>
				<td align="center" >Текст</td>
				<td align="center" >Автор</td>
			</tr>
			<tr>
				<td align="center" ><input type="text" name="change_head" value='<?=$article->head;?>'></td>
				<td align="center" ><textarea name="change_text" class = "change_text"><?=$article_for_change->text;?></textarea></td>
				<td align="center" ><select name="change_author"><?php foreach ($authors as $author):?> 
											<?php if ($author->ID == $article_for_change->ID_author):?>
												<option value = "<?=$author->ID;?>" selected><?=$author->fio;?></option>
											<?php endif ?>
												<option value = "<?=$author->ID;?>"><?=$author->fio;?></option>
											<?php endforeach ?>
									</select>
									<input type = "hidden" name = "articleforchange" value = "<?=$article_for_change->ID;?>">
				</td>
			</tr>
	</table>
	<input type="submit" class="add-article" value="ADD">
	</form>
	
	
	
	
	
	<?php else: ?>
	<table align="center" class = "articles">
			<?php foreach ($articles as $article) :?>
			<tr>
				<td align="center" ><?=$article->head;?></td>
				<td align="center" ><div class = "change"><a href = "http://sitesitesite.ru/visit_card/articles.php?change=<?=$article->ID?>">Редактировать</a></div></td>
				<td align="center" ><div class = "delete"><a href = "http://sitesitesite.ru/visit_card/articles.php?delete=<?=$article->ID?>">Удалить</a></div></td>
			</tr>
			<?php endforeach ?>
		</table>
		
	<?php endif; ?>
	
	
	
	</body>
</html>