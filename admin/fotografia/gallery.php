<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<html lang="pl-PL">	
<title>Studio 2in1 - Fotografia</title>
<meta name="description" content="Internetowe zaproszenia ślubne połączone z tradycjnymi zaproszeniami">
<link rel="stylesheet" href="../../styles/admin-480px.css" type="text/css">
<link rel="stylesheet" href="../../styles/admin.css" type="text/css">



</head>
<body>
<div id="container">
	

	<div id="g_a_p">
			<a href="?edit&id=<?php echo $g; ?>">Edytuj album</a>
			<a href="?delete&id=<?php echo $g; ?>">Usuń album</a>
			<a href="?add&id=<?php echo $g; ?>">Dodaj zdjęcia</a>
			<a href="../fotografia">Powrót</a> 
	</div>
	<div id="zdjecia_a">
		<?php foreach ($gallery as $g) { ?>	
			<div class="zdjecie_admin">
					<ul id="manage-image">
						<li class="deletephoto"><a href="?deletephoto&<?php echo $id; ?>&id2=<?php echo $id2; ?>id_zdjecia=<?php echo $g['id_zdjecia']; ?> "><img src="../../images/wrong.png"></a></li>	
						<li><a href="?add_icon&id=<?php echo $id; ?>&id2=<?php echo $id2; ?>&id_zdjecia=<?php echo $g['id_zdjecia']; ?>">Ustaw jako okładka kategorii</a></li>
						<li><a href="?add_backround&id=<?php echo $id; ?>&id2=<?php echo $id2; ?>&id_zdjecia=<?php echo $g['id_zdjecia']; ?>">Ustaw jako tło kategorii</a></li>
						<li><a href="?add_icon_alb&id=<?php echo $id; ?>&id2=<?php echo $id2; ?>&id_zdjecia=<?php echo $g['id_zdjecia']; ?>">Ustaw jako okładka albumu</a></li>					
					</ul>
				<img src="../../images/foto/<?php echo $g['nazwa_zdjecia']; ?>"  class="zdj" alt="kategoria" />
			</div>	
		<?php } ?>
	</div>
</div>