<?php 

 include $_SERVER['DOCUMENT_ROOT'] . '/admin/function/db.ini.php';

 require $_SERVER['DOCUMENT_ROOT'] . '/szablony/access_klient.ini.php';

 if (!userIsLoggedIn())
{ 
	include 'login.php';
	exit();
}

$dostep = $_SESSION['password'];

try{

	$sql = "SELECT * FROM album_klienta 
			INNER JOIN klienci 
			ON id_klienta = klienci.id
			WHERE password = '{$dostep}'";
	$klient = pg_query($sql);
	$kli = pg_fetch_array($klient);
}
catch(Exception $e){
	$error = 'Błąd przy pobieraniu danych';
	include 'error.php';
	exit();
}

$dir = '../images/klienci/' . $kli['nazwa_albumu'];
if(!($folder = opendir($dir))){
	exit("Nie mogę otworzyć katalogu $dir");
	}
 
	while (($file = readdir($folder)) !== FALSE ) { 
		if($file != '.' && $file != '..'){	
	 	
	 	$pliki[] = $file;
	 }
	}

closedir($folder);

include 'szablon.php';