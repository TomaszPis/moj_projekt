<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<html lang="pl-PL">
<title>Studio 2in1 - System zarządzania zgłoszeniami</title>
<link rel="stylesheet" href="../../styles/admin.css" type="text/css">
<link rel="stylesheet" href="../../styles/admin-480px.css" type="text/css">

</head>
<body>
<header>
	<h1>System zarządzania zdjęciami</h1>
	<!--- Menu -->
	<nav>
		<div class="link_box">
			<a href="../">Home</a>
		</div>
		<div class="link_box">
			<a href="../zgloszenia/">Wiadomości</a>
		</div>
		<div class="link_box">
			<a href="../fotografia/">Fotografia</a>
		</div>
		<div class="link_box">
			<a href="../blog/">Blog</a>
		</div>
		<?php include '../logout.php'; ?>
	</nav>
</header>
<div id="contener">

	<div id="add_kat">
		<!--- Dodawanie kategorii -->
		<div class="add kat">
			<h2>Kategorie</h2>
			<form method="post" action="" autocomplete="off" >
			  <label for="kategoria">Dodaj kategorię:</br></label>
			  <input type="text" name="kategoria" id="kategoria"/>
			  <input type="submit" name="action" value="Dodaj kategorię">
			</form>
			<br><br>
			<!--- Lista wszystkich kategorii -->
		<div id="kategorie_admin">
			<form action="" method="get">
				<table>
					<tr>
						<th>Kategoria</th>
						<th>Edytuj</th>
						<th>Usuń</th>
					</tr>
				<?php foreach ($kat as $k) { ?>
					<tr>
						<td class="column one"><a href="?alb&id=<?php echo $k['id'] ?>"><?php echo $k['nazwa_kategorii'] ?></a></td>
						<td class="column"><input type="hidden" name="id" value="<?php echo $k['id'] ?>"><input type="submit" name="action" value="Edytuj"></td>
						<td class="column"><input type="hidden" name="id" value="<?php echo $k['id'] ?>"><input type="submit" name="action" value="Usuń"></td>
					</tr>
				<? } ?>
				</table>
			</form>
		</div>	

		</div>
	</div>
	<!-- Dodawanie albumów -->
	<div id="add_alb">
		<div class="add alb">
			<h2>Albumy</h2>
			<form method="post" action="" autocomplete="off" >
			  <label for="album">Dodaj album:</br>
			  <input type="text" name="album" id="album"/></label><br>
			  <label> Wybierz kategorię:</br> 
						<select name="id">
								<option>Wybierz kategorię</option>
							<?php foreach($kat as $k){ ?>
								<option value="<?php echo $k['id']; ?>"><?php echo $k['nazwa_kategorii']; ?></option>
							<? } ?>
						</select>
			  </label>
			  <input type="submit" name="action" value="Dodaj album">
			</form>
		</div>
	</div>

	<!--- Dodawanie zdjęć -->
	<div id="add_img">
		<div class="add">
			<h2>Dodaj zdjęcia</h2>
			<form method="post" action="" enctype="multipart/form-data" >
				<div class="filedToSend">
					<!--- Wybieranie albumu do zdjęć -->
					<label> Wybierz album:</br> 
						<select name="album">
								<option>Wybierz album</option>
							<!--- Iterowanie pętlą foreach po nazwach i indentyfikatorach wszystkich albumów -->
							<?php foreach($alb as $a){ ?>
								<option value="<?php echo $a['id_albumu']; ?>">
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
	