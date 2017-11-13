<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<html lang="pl-PL">	
<title>Studio 2in1 - Fotografia</title>
<meta name="description" content="Internetowe zaproszenia ślubne połączone z tradycjnymi zaproszeniami">
<link rel="stylesheet" href="../styles/foto.css" type="text/css">
<link rel="stylesheet" href="../../styles/menu.css" type="text/css">
<link rel="stylesheet" href="../../styles/socials.css" type="text/css">
<link rel="stylesheet" href="../../styles/foto-780px.css" type="text/css">
<link rel="stylesheet" href="../../styles/foto-480px.css" type="text/css">
</head>
<body>
<header>
		<div id="hover-menu">
			<div id="p1"></div>
			<div id="p2"></div>
			<div id="p3"></div>
		</div>
		
		<div id="site-menu">
				<div id="close">+</div>
			<ul>
				<li>
					<a href="../../">
						Strona główna
					</a>
				</li>
				<li>
					<a href="../../kontakt/">
						Kontakt
					</a>
				</li>
				<li>
					<a href="../../zaproszenia/">
						Zaproszenia
					</a>
				</li>
				<li>
					<a href="../../fotografia/">
						Fotografia
					</a>
				</li>
			</ul>
</header>
<div id="container">
	<a href="../">
		<img src="../images/<?php include $_SERVER['DOCUMENT_ROOT'] . '/szablony/logo.php' ?>" class="logo" alt="logo" />
	</a>
	<h1><?php echo $t['nazwa_albumu']; ?></h1>
	<div id="socials">
		<ul>
			<li class="social">
				<a href="https://www.facebook.com/studio2in1/">
					<img src="../../images/fb-01.png" alt="social" />
				</a>
			</li>
			<li class="social">
				<a href="https://www.instagram.com/studio2in1/">
					<img src="../../images/insta-01.png" alt="social" />
				</a>
			</li>
		</ul>
	</div>
	<div id="zdjecia">
					<div class="zdjecie big">
						<img src="../images/foto/<?php echo $img['nazwa_zdjecia']; ?>"  class="zdj bigger" alt="kategoria" />
					</div>	
	</div>
</div>
<script src="../js/index.js" type="text/javascript"></script>