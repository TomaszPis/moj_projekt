<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<html lang="pl-PL">
<title>Studio 2in1 - System zarządzania zgłoszeniami</title>
<link rel="stylesheet" href="../../styles/foto.css" type="text/css">

</head>
<body>
<div id="container">
	<div id="zdjecia_a">
		<?php foreach ($zdj as $z) { ?>	
			<div class="zdjecie admin">
				<img src="../../images/foto/<?php echo $z['nazwa_zdjecia']; ?>"  class="zdj" alt="kategoria" />
				<a href="?add_backround&id=<?php echo $id; ?>&id_zdjecia=<?php echo $z['id_zdjecia']; ?>">Ustaw jako tło</a>
				<a href="?add_icon&id=<?php echo $id; ?>&id_zdjecia=<?php echo $z['id_zdjecia']; ?>">Ustaw jako główne</a>
			</div>	
		<?php } ?>
	</div>
</div>
	
	