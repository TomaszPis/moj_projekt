<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<html lang="pl-PL">	
<title>Studio 2in1 - Fotografia</title>
<meta name="description" content="Internetowe zaproszenia ślubne połączone z tradycjnymi zaproszeniami">
<link rel="stylesheet" href="../../styles/foto.css" type="text/css">


</head>
<body>
<div id="container">
	

	<div id="g_a_p">
			<a href="?edit&id=<?php echo $gallery2['id_albumu']; ?>">Edytuj album</a>
			<a href="?delete&id=<?php echo $gallery2['id_albumu']; ?>">Usuń album</a>
			<a href="?add&id=<?php echo $gallery2['id_albumu']; ?>">Dodaj zdjęcia</a>
			<a href="../fotografia">Powrót</a> 
			<form action="" method="post">
			Wybierz ile zdjęć biędziesz wgrywać:
				<select name="img_amount">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
				</select>
					<input type="hidden" name="id" value="<?php echo $album; ?>" />
					<input type="submit" name="action" value="ok">
			</form>
	</div>
</div>