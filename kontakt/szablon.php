<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<html lang="pl-PL">
<title>Studio 2in1 - Zaproszenia</title>
<meta name="description" content="Internetowe zaproszenia ślubne połączone z tradycjnymi zaproszeniami">
<link rel="stylesheet" href="../styles/menu.css" type="text/css">
<link rel="stylesheet" href="../styles/socials.css" type="text/css">
<link rel="stylesheet" href="../styles/kontakt.css" type="text/css">

</head>
<body>
<header>
		<div id="hover-menu">
			<div id="p1"></div>
			<div id="p2"></div>
			<div id="p3"></div>
		</div>
		
		<div id="site-menu">
			<div id="close">
				<h3>+</h3>
			</div>
			<ul>
				<li>
					<a href="../">
						Strona główna
					</a>
				</li>
				<li>
					<a href="../zaproszenia/">
						Zaproszenia
					</a>
				</li>
			</ul>
</header>
<div id="contener">
	<div id="socials">
		<ul>
			<li class="social">
				<a href="https://www.facebook.com/studio2in1/">
					<img src="../images/fb-01.png" alt="social" />
				</a>
			</li>
			<li class="social">
				<a href="https://www.instagram.com/studio2in1/">
					<img src="../images/insta-01.png" alt="social" />
				</a>
			</li>
		</ul>
	</div>
	<div id="container">
		<div id="contact-form">
			<a href="../"><img src="images/logo2in1.png" class="logo" alt="strona" /></a>
			<form action="" method="post" autocomplete="off">
				<label name="imie">Podaj swoje imię:</br>
					<input type="text" name="name" />
				</label>
				<label name="mail">Podaj e-mail:</br>
					<input type="email" name="mail" />
				</label>
				<label name="phone">Podaj numer telefonu:</br>
					<input type="text" name="phone" />
				</label>
				<label name="services">Wybierz usługę:</br>
					<select name="services">
						<option value="fotografia">Fotografia</option>
						<option value="zaproszenia">Zaproszenia</option>
					</select></br>
				</label>
				<label name="message_text">Napisz o co chcesz się zapytać:</br>
					<textarea name="message_text"></textarea>
				</label>
				<input type="submit" name="action" value="Wyślij" />
			</form>
			<br>
			<?php echo $error; ?>
		</div>
		<div id="contact-aside">
		</div>
				
	</div>
	<script src="../js/index.js" type="text/javascript"></script>