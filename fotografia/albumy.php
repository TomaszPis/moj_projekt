<!DOCTYPE html>

<!-- Head -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/szablony/head.php'; ?>

<body>
<!-- Menu -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/szablony/menu.php'; ?>
<div id="container">
	<div id="socials">
		<ul>
			<li class="social">
				<a href="https://www.facebook.com/studio2in1/">
					<img src="../../images/fb-01.png" alt="social" />
				</a>
			</li>
			<li class="social">
				<a href="https://www.instagram.com/studio2in1/">
					<img src="../../images/insta-01.png" alt="social" />
				</a>
			</li>
		</ul>
	</div>
	<!--Nagłówek-->
	<div class="starter in" style="background-image: url('../images/foto/<?php echo $zdj['zdj_kategori']; ?>');">
		<div class="pagename">
			<a href="../">
				<img src="../../images/<?php include $_SERVER['DOCUMENT_ROOT'] . '/szablony/logo.php' ?>" class="pgnlogo" alt="strona" />
			</a>
			<p><?php echo $title; ?></p>
		</div>
	</div>
	<!--Wyświetl albumy -->
	<div id="albumy">
		<?php foreach ($alb as $a) {
	
	 		$c = strlen($a['nazwa_albumu']);

	 		//Jęzeli nazwa albumu ma więcej niż 20 znaków, dodaj klasę top
	 		if($c > 20){
				 	
				$klasa = 'top';
			}
			else{
				 
				 $klasa = '';
			}
			
	 	?>	
		<a href="?gallery&id=<?php echo $a['id_albumu'] ?>">
			<div class="album" style="background-image: url('../images/foto/<?php echo $a['zdj_albumu']; ?>')">
				<div class="nazwa_alb">
					<!--Nazwa albumu-->
					<p class="nazwa_alb_p <?php echo $klasa; ?>">
						<?php echo $a['nazwa_albumu']; ?>
					</p>
				</div>
			</div>
		</a>	
		<?php } ?>
	</div>
</div>
<script src="../js/index.js" type="text/javascript"></script>
</body>