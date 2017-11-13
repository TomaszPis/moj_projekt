<!DOCTYPE html>
<head>
  <meta charset="utf-8">
	<title> Studio2in1 - Zarządzanie danymi </title>
	<link rel="stylesheet" href="../styles/klienci.css" type="text/css">
</head>
</head>
<body>

<div id="container">
	<?php
			$dir = '../images/klienci/' . $kli['nazwa_albumu'];
			if(!($folder = opendir($dir))){
			exit("Nie mogę otworzyć katalogu $dir");
			}

			while (($file = readdir($folder)) !== FALSE ) { 
			if($file != '.' && $file != '..'){	
			?>
				<img src="../images/klienci/<?php echo $kli['nazwa_albumu']; ?>/<?php echo $file; ?>" class="zdj-logo" alt="logo"  width="200" />
				<a href="">Pobierz</a>	
			</div>
			<?php	
				 }
				}
				closedir($folder);
			?>
		<?php var_dump($pliki); ?>
</div>
</body>
</html>