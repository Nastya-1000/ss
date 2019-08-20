<!DOCTYPE HTML>
<html>
	<head>
		<title>Найди меня</title>    <!-- надпись, которая появляется, при наведении курсора на вкладку с сайтом -->
		<meta charset = "utf-8"/>	<!-- UTF-8 и Windows-1251 -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">    <!-- подключаем стилевую обработку в css -->
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/script.js"></script>     <!-- подключаем js -->
		<link href="https://fonts.googleapis.com/css?family=Mukta" rel="stylesheet">    <!-- подключаем стиль текста Mukta -->
		<link href="https://fonts.googleapis.com/css?family=Manuale" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Nosifer" rel="stylesheet">
	</head>
	<body>   
	
	
	
	
	
	<?php include("config.php") ?>     <!-- подключаем config.php -->
	
	
	<?php 
		if (isset($_POST["comment"])) {
			
			include("add-comment.php"); //подключаем config.php 
			
		}
	?>
		
	<?php include("post-comments.php") ?>     <!-- подключаем config.php -->
	
	
		<div class = "visual_arts">VISUAL ARTS</div>
		<div class = "search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>SEARCH</div>
		
	
		<form action="" method="GET" class = "field_for_search">
			<input type="text" name="search" class="input_for_search" placeholder="Input words for search">  <!-- поле для поиска (появляющееся при нажатии на SEARCH) -->
			<input type="submit" class="search-button" value="SEARCH">
			<input type = "hidden" class="articleIDforSearch" name = "articleIDforSearch" value = "<?=$articles[0]->ID;?>">
		</form>
		
		<?php  //print_r($_GET); ?>
		 
		<div class = "clear"></div>
		
		<img class = "face" src = "<?=$authors[0]->avatar?>" />
		<h2><?=$authors[0]->fio?></h2>
		<h1><?=$articles[0]->head?></h1>    <!-- h1 - главный заголовок (может быть только ОДИН на сайте; тег <br/> - переход на другую строку; тег span - для выделения какой-то части в div -->
		<h3><?=$articles[0]->date?></h3>
		<hr/>    <!-- горизонтальная черта -->
		
		<div class = "articleText">
		<!--$result_str = str_replace('AAA','BBB',$str)-->
		<?php 
	
		echo $articles[0]->text;
		
		/*if (isset($_GET["search"])) {
			$articles[0]->text = str_replace($_GET["search"],'<span class = "yellow">'.$_GET["search"].'</span>',$articles[0]->text);
		}
			echo $articles[0]->text;
		*/	
			//INSERT INTO `ИМЯ ТАБЛИЦЫ` VALUES(1,'TEXT',1,Date());
		?>
			
		</div>
			
		<?php /*
			<?php echo $a; ?> или <?=$a?>
		*/ ?>
		
		
		<hr/>
		
		 <div class = "likes"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span><?=$articles[0]->likes?> <?= $articles[0]->likes==1?'Like':'Likes'?></div> <!-- с помощью span вставляем значок сердечко слева от "Likes" -->
		
		<div class = "comments">
		<?php if(!empty($comments)) : ?>
			<?php foreach ($comments as $comment) :	?>
				<?php if($comment->ID_article == $articles[0]->ID && $comment->is_publish == 1) : ?>
					<div class = "comment_each_one">
						<div class = "comment_text"><?=$comment->text;?></div>
						<div class = "comment_date"><?=$comment->date;?></div>
					</div>
				<?php endif; ?>
			<?php endforeach; ?>
		<?php endif; ?>
		</div>
		
		<form action="" method="POST">
			<textarea name="comment" class = "makeItGhotic" placeholder = "Write a comment..."></textarea>   <!-- тег textarea - вставка пустого поля для ввода текста; placeholder - чтоб текст "Write a comment..." исчезал, при написании чего-либо в поле -->
			<div class = "text_under_the_table">
			<span class = "bookmark_share_more">Bookmark Share More</span>
			<input type="submit" class="post_comment" value="POST COMMENT">
			<input type = "hidden" class="articleIDforComment" name = "articleIDforComment" value = "<?=$articles[0]->ID;?>">
			</div>
		</form>
		
		<?php  //print_r($_POST); ?>
		
		
		
		<div class = "clear"></div>
		
		<div class = "footer_wrapper">
			<div class = "pointers">
				<span class = "previous_article"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>PREVIOUS ARTICLE</span>
				<span class = "next_article">NEXT ARTICLE<span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></span>
			</div>
			
			<div class = "clear"></div>
			
			<div class = "text_at_the_bottom">
				<span class = "text_in_the_left_bottom_corner">How INSTRMNT Watches <br/>Are Made</span>
				<span class = "text_in_the_right_bottom_corner">The Corner House in <br/>Kitashirakawa</span>
			</div>
		</div>
	</body>
</html>