<!DOCTYPE html>
<head>
  <meta charset="utf-8">
	<title> Studio2in1 - Zarządzanie danymi </title>
	<link rel="stylesheet" href="../styles/klienci.css" type="text/css">
</head>
</head>
<body>

<div id="container">
	<a href="../"><img src="../images/<?php include $_SERVER['DOCUMENT_ROOT'] . '/szablony/logo.php' ?>" class="logo" alt="logo" width="300"/></a>
	<div id="log">
		<div id="hello">
			<h1>Witaj<br>Podaj kod dostępu aby przejść dalej</h1>
		</div>
		<div id="error">
			<?php if(isset($loginError)): ?>
				<p><?php echo($loginError); ?></p>
			<?php endif ?>
		</div>
		
		<form action="" method="post">
			<div id="log_f">
				<label for="password"><input type="password" name="password" id="password" placeholder="Wpisz kod dostępu"></label>
				<input type="hidden" name="action" value="login"></br>
				<input type="submit" value="Zaloguj">
			</div>
		</form>
	</div>
</div>
	
</body>
</html>