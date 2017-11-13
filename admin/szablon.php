<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<html lang="pl-PL">
<title>Studio 2in1 - System zarządzania zgłoszeniami</title>
<link rel="stylesheet" href="../styles/admin.css" type="text/css">
<link rel="stylesheet" href="../styles/admin-480px.css" type="text/css">

</head>
<body>
<header>
	<nav>
		<div class="link_box">
			<a href="">Home</a>
		</div>
		<div class="link_box">
			<a href="zgloszenia/">Wiadomości</a>
		</div>
		<div class="link_box">
			<a href="klienci/">Klienci</a>
		</div>
		<div class="link_box">
			<a href="fotografia/">Fotografia</a>
		</div>
		<div class="link_box">
			<a href="blog/">Blog</a>
		</div>
		<?php include 'logout.php'; ?>
	</nav>
	<h1>Zarządzanie treścią</h1>	
</header>
<div id="contener">
	<h1>Witaj <?php echo $_SESSION['email']; ?></h1>
	<div id="logo">
		<h1>Logo</h1>
		<p>Twoje aktualne logo to:</p>
		<img src="../images/<?php include $_SERVER['DOCUMENT_ROOT'] . '/szablony/logo.php' ?>" class="logo" alt="logo" />
		<br>
		<form action="" method="post" enctype="multipart/form-data">
			<label>Wyślij nowe logo: <br>
				<input type="file" name="plik">
			</label>
			<input type="submit" name="action" value="Wyślij logo">
			<br>
			<?php
				$dir = '../images/logo/';
				if(!($folder = opendir($dir))){
				exit("Nie mogę otworzyć katalogu $dir");
				}

				while (($file = readdir($folder)) !== FALSE ) { 
						if($file != '.' && $file != '..'){	
						?>
			<div class="logo_admin">
				<ul id="manage-logo">
					<li class="deletelogo"><a href="?deletelogo&nazwa=<?php echo $file; ?>"><img src="../../images/wrong.png"></a></li>	
					<li><a href="?update-logo&nazwa=<?php echo $file; ?>">Ustaw jako logo</a></li>				
				</ul>
				<img src="../images/logo/<?php echo $file; ?>" class="zdj-logo" alt="logo" />	
			</div>
			<?php	
				 }
				}
				closedir($folder);
			?>
		</form>
	</div>
</div>
</body>
</html>
	