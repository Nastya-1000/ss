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
	
		<div class = "backDiv"></div>
		<?php 
				
			if (isset($_GET["logout"])) 
				if ($_GET["logout"]=="Выйти") 
				{ 
					unset($_GET["logout"]); //уничтожает переменную
					session_destroy();
					
					echo '<script type="text/javascript">window.location.href = "http://sitesitesite.ru/chat/";</script>';
					
					//header("Location: http://sitesitesite.ru/chat/");
				}
			
			if (isset($_POST["login"]) && isset($_POST["color"])) //проверяет, установлены ли log и pass 
					$_SESSION["login"]=$_POST["login"];
				 
			//print_r($_SESSION); 
			
			if (isset($_SESSION["login"]) && !isset($_GET["logout"])) {
				
				//header("Location: http://sitesitesite.ru/chat/");
				if (isset ($_POST["temp"])) {
					echo '<script type="text/javascript">window.location.href = "http://sitesitesite.ru/chat/";</script>';
					unset($_POST["temp"]);
				}
				 
			//echo 'Добро пожаловать, <div class = "userName">'.$_POST["login"].'</div> !<br/>';
			echo '<div class = "welcome">Добро пожаловать, '.$_SESSION["login"].' !</div>'; 
			
			$timeLogin = date_format(new DateTime, "Y-m-d H:i:s");
			if (!isset($_SESSION["chat_start"])) {
				$_SESSION["chat_start"] = $timeLogin;
			}
			//echo $_SESSION["chat_start"];
			?>
			
			
			
			
				
				<div class = "field_for_messages">
					<?php if(!empty($messages)) : ?>
						<?php foreach ($messages as $message) :	?>
								<div class = "message_each_one">
									<span class = "message_user"><?=$message->user;?></span>
									<span class = "message_date">(<?=$message->date;?>) :</span>
									</br>
									<span class = "message_text"><?=$message->message;?></span>
								</div>
								</br>
						<?php endforeach; ?>
					<?php endif; ?> 
				</div>
				
				
				<form action="" class="chat" method="POST">
				<textarea name="comment" class = "comment" align="center" placeholder = "Write something..."></textarea>
				<input type = "hidden" class="userName" name = "userName" value = "<?=$_SESSION["login"];?>">
				<input type = "hidden" class="startTime" name = "startTime" value = "<?=$_SESSION["chat_start"];?>">
				</form>


			<?php echo '<form action="" class="regOut" method="GET"> 
				<input type="submit" class="out" name="logout" value="Выйти">
				</form>';
			}
			//print_r($_GET);
		?> 
		
		
		<?php 
		
		$colors["green"] = "green";
		$colors["black"] = "black";
		$colors["red"] = "red";
		$colors["blue"] = "blue";
		$colors["yellow"] = "yellow";
		
		
		if (!isset($_SESSION["login"]) || (isset($_GET["logout"])) && ($_GET["logout"]=="Выйти") ) : ?> 
	
		<form action="" class="regIn" method="POST">
			<input type="text" name="login" class="login" align="center" placeholder="login">
			<select name="color"><?php foreach ($colors as $color):?> 
												<option value = "<?=$color;?>"><?=$color;?></option>
											<?php endforeach ?>
									</select>
			<input type="submit" class="in" value="Войти">
			<input type="hidden" class="temp" value="1">
		</form>
		
	<?php endif; ?>
	
	
	
	
	
	
	
	</body>
</html>