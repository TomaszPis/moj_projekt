<!-- Head -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/szablony/head.php'; ?>
<body>
<!-- Menu -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/szablony/menu.php'; ?>
<div id="container">
	<a href="../"><img src="../images/<?php include $_SERVER['DOCUMENT_ROOT'] . '/szablony/logo.php' ?>" class="logo" alt="logo" /></a>
	<h1><?php echo $title; ?></h1>
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
	<div id="zdjecia">
		<?php foreach ($gallery as $g) { ?>	
				<a href="?img&id=<?php echo $g['id_zdjecia']; ?>">
					<div class="zdjecie">
						<img src="../images/foto/<?php echo $g['nazwa_zdjecia']; ?>"  class="zdj" alt="kategoria" />
					</div>
				</a>	
		<?php } ?>
	</div>
</div>
<script src="../js/index.js" type="text/javascript"></script>