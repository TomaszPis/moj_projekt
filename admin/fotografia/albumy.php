<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<html lang="pl-PL">	
<title>Studio 2in1 - Fotografia</title>
<meta name="description" content="Internetowe zaproszenia ślubne połączone z tradycjnymi zaproszeniami">
<link rel="stylesheet" href="../../styles/foto.css" type="text/css">
<link rel="stylesheet" href="../../styles/admin.css" type="text/css">
<link rel="stylesheet" href="../../styles/admin-480px.css" type="text/css">


</head>
<body>
<div id="container">
	<div id="albumy_admin">
		<?php foreach ($alb as $a) { ?>	
		<a href="?gallery&id=<?php echo $a['id_albumu']; ?>&id2=<?php echo $id2; ?>">
			<div class="album" style="background-image: url('../../images/foto/<?php echo $a['zdj_albumu']; ?>')">
				<div class="nazwa_alb">
					<p>
						<?php echo $a['nazwa_albumu']; ?>
					</p>
				</div>
			</div>
		</a>	
		<?php } ?>
	</div>
</div>