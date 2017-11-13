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
	<div id="klienci">
		<div class="klienci-list">
			<h1>Lista klientów</h1>
			<table class="dane"> 
				<tr><th>Klient</th></tr>
				<?php
					foreach ($klient as $k) {
				?>
				<tr><td><a href="?klient&klientId=<?php echo $k['id']; ?>"><? echo $k['login']; ?></a></td></tr>
				<?php } ?>
			</table>
		</div>
		<div class="klienci-list">
			<h1>Dodaj klienta</h1>
			<form action="" method="post">
				<label >Nazwa klienta:
					<br>
					<input type="text" name="login" id="login">
				</label>
				<br>
				<label >Adres e-mail:
					<br>
					<input type="text" name="email" id="email">
				</label>
				<br>
				<label >Hasło do albumu klienta:
					<br>
					<input type="password" name="password" id="password">
				</label>
				<br>
				<label >Dodaj pierwszy album klienta:
					<br><span class="opcja">(Opcjonalnie)
					<br>
					<input type="text" name="album" id="album">
				</label>
				<br>
				<input type="submit" name="action" value="Dodaj">
			</form>
		</div>
		<?php echo $id_klienta; ?>
	</div>
</div>
</body>