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
		<div class="klient">
			<table class="dane"> 
				<tr><th>Klient</th><th>email</th></tr>
				
				<tr><td><? echo $k['login']; ?></td><td><? echo $k['email']; ?></td></tr>	
			</table>
		</div>
		<div class="klient k-albumy">
				<table class="dane"> 
					<tr><th>Album</th>
						<th>Edytuj</th>
						<th>Usuń</th>
					</tr>
					<?php foreach($album as $a){ ?>
					<tr>
						<td><? echo $a['nazwa_albumu']; ?></td>
						<td>
							<form action="" method="post">
								<input type="hidden" name="klient" value="<?php echo $k['id'] ?>">
								<input type="hidden" name="albumId" id="albumId" value="<?php echo $a['id']; ?>" />
								<input type="submit" name="edit" value="Edycja" />
							</form>
						</td>
						<td>
							<form action="" method="post">
								<input type="hidden" name="albumId" id="albumId" value="<?php echo $a['id']; ?>" />
								<input type="submit" name="action" value="Usuń" />
							</form>
						</td>
					</tr>
					<?php } ?>	
				</table>
				<div class="add-klient-photo">
					<h2>Dodaj zdjęcia</h2>
			<form method="post" action="" enctype="multipart/form-data" >
				<div class="filedToSend">
					<!--- Wybieranie albumu do zdjęć -->
					<label> Wybierz album:</br> 
						<select name="album">
								<option>Wybierz album</option>
							<!--- Iterowanie pętlą foreach po nazwach i indentyfikatorach wszystkich albumów -->
							<?php foreach($album as $a){ ?>
								<option value="<?php echo $a['nazwa_albumu']; ?>">
									<?php echo $a['nazwa_albumu']; ?>
								</option>
							<?php } ?>
						</select>
					</label>
					</div>
					<div id="formularz">
					</br>
					<input type="file" name="pliki[]" multiple>
					</br>
					<input type="submit" name="action" value="Wyślij">	
				</div>
			</form>
		</div>
	</div>
</div>
</body>