<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<html lang="pl-PL">
<title>Studio 2in1</title>
<link rel="stylesheet" href="../../styles/admin.css" type="text/css">
<link rel="stylesheet" href="../../styles/admin-480px.css" type="text/css">

</head>
<body>
<header>
	<nav>
		<div class="link_box">
			<a href="../">Home</a>
		</div>
		<div class="link_box">
			<a href="../zgloszenia/">Wiadomości</a>
		</div>
		<div class="link_box">
			<a href="../klienci/">Klienci</a>
		</div>
		<div class="link_box">
			<a href="../fotografia/">Fotografia</a>
		</div>
		<div class="link_box">
			<a href="../blog/">Blog</a>
		</div>
		<?php include 'logout.php'; ?>
	</nav>
	<h1>Klienci</h1>	
</header>
<div id="contener">
	<div id="klient">
		<h1>Edytujesz album</h1>
		<form action="" method="post">
			Podaj nową nazwę albumu:<br>
			<input type="text" name="name">
			<input type="hidden" name="klientId" value="<?php echo $klientId; ?>">
			<input type="hidden" name="albumId" value="<?php echo $albumId; ?>">
			<br>
			<input type="submit" name="action" value="Zapisz">
		</form>
	</div>
</div>