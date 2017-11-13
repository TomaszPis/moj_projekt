<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<html lang="pl-PL">
<title>Studio 2in1 - System zarządzania zgłoszeniami</title>
<link rel="stylesheet" href="../../styles/admin.css" type="text/css">

</head>
<body>
<header>
</header>
<div id="contener">
	<div class="posts add">
		<div id="formularz">
			<form action="" method="post" enctype="multipart/form-data" >
				<h3>Dodajesz zdjęcia do albumu <span class="albumline"><?php echo $alb['nazwa_albumu']; ?></span></h3>
				</br>
				<?php 
					foreach($img_input as $i)
					{
						echo $i; 
					}?></br>
				<input type="hidden" name="img_sum" value="<?php echo $a; ?>">
				<input type="hidden" name="album" value="<?php echo $album; ?>">
				</br>
				<input type="submit" name="action" value="Wyślij">
			<form>
		</div>
	</div>
</div>