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
	<h1>System zarządzania Zgłoszeniami</h1>
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
	<div id="message_box">
				<?php foreach($b as $uslugi): ?>
					 <div class="message">
						<form action="" method="post">
							<div class="info">
							    <div class="w name">   Imię: </br><span class="color"> <?php echo $uslugi['imie']; ?></span>      	</div>
								<div class="w service">Wybrana usługa: </br><span class="color"><?php echo $uslugi['usluga']; ?></span>		</div>
								<div class="w mail">   E-mail: </br><span class="color"><?php echo $uslugi['mail']; ?></span>			</div>
								<div class="w phone">  Telefon: <span class="color"></br><?php echo $uslugi['phone']; ?></span>			</div>
								<div class="w zgloszenie"> Data zgłoszenia:</br><span class="color"><?php echo $uslugi['data_zgloszenia']; ?></span></div>
								<div class="w delete">   
											<input type="hidden" name="id" value="<?php echo $uslugi['id']; ?>" />
											<input type="submit"  name="delete" value="Usuń" />
								</div>
							</div>
							<div class="content">
								<div class="w text">   <?php echo nl2br($uslugi['message_text']); ?>	</div>
							</div>
						</form>	
					</div>
				<?php endforeach; ?>
	</div>
	