<!-- Włącz szablon head.php -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/szablony/head.php'; ?>

<body>
<!-- Włącz szablon menu.php-->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/szablony/menu.php'; ?>
<div id="container">
	<a href="../"><img src="../images/<?php include $_SERVER['DOCUMENT_ROOT'] . '/szablony/logo.php' ?>" class="logo" alt="logo" /></a>
	<h1>Fotografia</h1>
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
	<div id="kategorie">
		<!-- Wyświetl listę kategorii -->
		<?php foreach ($kat as $k) {
			
			//Jęzeli nazwa kategori ma więcej niż 20 znaków, dodaj klasę top
			$b = strlen($k['nazwa_kategorii']);

				if($b > 20){
					$klasa = 'top';
		 		}
		 		else
		 		{
		 			$klasa = '';
		 		}
		 ?>	
		<a href="?alb&id=<?php echo $k['id'] ?>">
			<div class="kategoria" style="background-image: url('../images/foto/<?php echo $k['zdj_glowne']; ?>')">
				<div class="nazwa_kat">
					<!--Nazwa kategorii-->
					<p class="nazwa_kat_p <?php echo $klasa; ?>">
						<?php echo $k['nazwa_kategorii']; ?>
					</p>
				</div>
			</div>
		</a>	
		<?php } ?>
	</div>
</div>
<!-- Wczytaj skryp otwierający menu -->
<script src="../js/index.js" type="text/javascript"></script>