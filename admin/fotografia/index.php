<?php

 //Połącz z bazą danych
 include '../function/db.ini.php';
 
 include_once $_SERVER['DOCUMENT_ROOT'] . '/admin/function/access.php';


 if (!userIsLoggedIn())
{
	include 'login.php';
	exit();
}

//Funcka odpowiedzialna za przesyłanie zdjęć
function send_img(){

		

		$filesArr = isset($_FILES['pliki']) ? $_FILES['pliki'] : array();
 
		if (isset($filesArr['name'])){
		 
		  foreach ($filesArr['name'] as $index=>$fileName){
		 
		    $file_nazwa = $fileName; // nazwa pliku
		 
		    $file_type = $filesArr['type'][$index]; //typ pliku
		    $file_tmp = $filesArr['tmp_name'][$index]; //lokalizacja w folderze tymczasowym

		    $album = $_POST['album']; //Podaj album do którego przypisane będą zdjęćia
		
		    
			//Jeżeli jest 'uploadowany' plik to zapisz zdjęcie w folerze 'foto'
			if(is_uploaded_file($file_tmp)) { 
					move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT']. "/images/foto/{$file_nazwa}");
				}
				else
				{
				 $error = 'Błąd przy tworzeniu folderu';
				 include 'error.php';
				 exit();
				}

				try
				{

					 //Zapisz nazwę zdjęcia w podanym albumie
					$sql = "INSERT INTO zdjecia_foto (id_albumu, nazwa_zdjecia)
							VALUES ('{$album}', '{$file_nazwa}')";
					 pg_query($sql);
				}
				catch(Exception $e)
				{
					 $error = 'Nie można dodać zdjęcia do bazy';
					 include 'error.php';
					 exit();
				}	
			}
		    
		  }	
    }


//dodawanie kategorii
if(isset($_POST['action']) AND $_POST['action'] == 'Dodaj kategorię')
	{
		 $kategoria = $_POST['kategoria'];//podaj nazwę kategorii
		 $sql = "INSERT INTO kategorie (nazwa_kategorii)
					VALUES('{$kategoria}')";
		 pg_query($sql);
		 
		 header('Location: .');
	}
else
	{
		$error = 'Błąd przy tworzeniu folderu';
	}

//Dodawanie kategorii	
if(isset($_POST['action']) AND $_POST['action'] == 'Dodaj album')
	{
		 $kategoria = $_POST['id'];  //podaj kategorię
		 $album = $_POST['album']; //Podaj nazwę kategorii
		 
		 $sql = "INSERT INTO albumy (id_kategorii, nazwa_albumu)
					VALUES('{$kategoria}', '{$album}')";
		 pg_query($sql);
		 
		 header('Location: .');
		 
	}
	
//uaktualniane tła kategorii
	if(isset($_POST['action']) AND $_POST['action'] == 'Dalej')
	{
		 $id = $_POST['id'];

		 $sql = "SELECT * from zdjecia_foto
		 		INNER JOIN ON id_albumu =id_zdjecia
		 		WHERE albumy.id_kategorii = {$id}
		 		ORDER BY id_zdjecia DESC";
		 $zdjecia = pg_query($sql);
		 $zdj = pg_fetch_all($zdjecia);

		 include 'add_backround.php';
		 exit();
	}
else
	{
		$error = 'Błąd przy blablabla';
	}
	

//Jeżeli zostało wybrane x zdjęć	
 if(isset($_POST['action']) AND $_POST['action'] == 'ok')
	{
		
		$img_amount = $_POST['img_amount'];

		//Pętla for odpowiedzialna jest za stworzenie odpowiedniej ilości pul <input>
		for($i = 1; $i <= $img_amount; $i++)
		{
			//Utwórz tablicę i przechowuj w niej wyniki
			$img_input[] = "<input type='file' name='upload{$i}' multiple> </br>";
			
		}
		

		$a = count($img_input);//Zmienna, która jest przesyłana do pliku szablon.php, ma za zadanie 'podać' granicę pętli pętli for
		

		$album = $_POST['id'];

		$sql = "SELECT * FROM albumy WHERE id_albumu = $album";
		$album2 = pg_query($sql);
		$alb = pg_fetch_array($album2);
		
		include 'szablon2.php';
		exit();
		 
		 
	}
else
	{
		$error = 'Błąd przy dodawaniu pliku';
	}


//Wyślij zdjęcia na serwer
if(isset($_POST['action']) AND $_POST['action'] == 'Wyślij')
{
			
	    send_img(); //Funckja do przesyłania zdjęć
		
		$album = $_POST['album'];
		
		header('Location: .');
		exit();
		
}

//Jeżeli jest akcja 'alb' to otwórz link w albumy.php z podanym id
if(isset($_GET['alb']))
	{
		$id = $_GET['id'];
		$id2 = $_GET['id'];

	 	$sql = "SELECT * from albumy
	 			WHERE id_kategorii = {$id}";
	 	$s   = pg_query($sql);
	 	$alb = pg_fetch_all($s);

	

	 	include 'albumy.php'; 
	 	exit();
	}

if(isset($_GET['gallery']))
	{
		$id = $_GET['id'];
		$id2 = $_GET['id2'];

	 	$sql = "SELECT * from zdjecia_foto
	 			WHERE id_albumu = $id";
	 	$s   = pg_query($sql);
	 	$gallery = pg_fetch_all($s);

	 	$sql2 = "SELECT id_albumu from albumy
	 			WHERE id_albumu = $id";
	 	$g   = pg_query($sql2);
	 	$gallery2 = pg_fetch_array($g);

	 	$g = $gallery2['id_albumu'];

	 	include 'gallery.php'; 
	 	exit();
	}

//Ustawianie danego zdjecia na tło kategorii
	if(isset($_GET['add_backround']))
	{
		$id = $_GET['id'];
		$id2 = $_GET['id2'];
		$id_zdjecia = $_GET['id_zdjecia'];
		
		$sql = "SELECT nazwa_zdjecia FROM zdjecia_foto
				WHERE id_zdjecia = {$id_zdjecia}";
		$zdjecie = pg_query($sql);
		$z = pg_fetch_array($zdjecie);

		

		$sql2 = "UPDATE kategorie
				SET zdj_kategori = '{$z['nazwa_zdjecia']}'
				WHERE id = {$id2}";
		pg_query($sql2);

		header("Location: ?gallery&id=$id&id2=$id2");
		exit();
	}

//Ustawianie zdjecia głównego
	if(isset($_GET['add_icon']))
	{
		$id = $_GET['id'];
		$id2 = $_GET['id2'];
		$id_zdjecia = $_GET['id_zdjecia'];
		
		$sql = "SELECT nazwa_zdjecia FROM zdjecia_foto
				WHERE id_zdjecia = {$id_zdjecia}";
		$zdjecie = pg_query($sql);
		$z = pg_fetch_array($zdjecie);

		

		$sql2 = "UPDATE kategorie
				SET zdj_glowne = '{$z['nazwa_zdjecia']}'
				WHERE id = {$id2}";
		pg_query($sql2);

		header("Location: ?gallery&id=$id&id2=$id2");
		exit();
	}
//Ustawianie zdjecia głównego
if(isset($_GET['add_icon_alb']))
	{
		$id = $_GET['id'];
		$id2 = $_GET['id2'];
		$id_zdjecia = $_GET['id_zdjecia'];
		
		$sql = "SELECT nazwa_zdjecia FROM zdjecia_foto
				WHERE id_zdjecia = {$id_zdjecia}";
		$zdjecie = pg_query($sql);
		$z = pg_fetch_array($zdjecie);

		

		$sql2 = "UPDATE albumy
				SET zdj_albumu = '{$z['nazwa_zdjecia']}'
				WHERE id_albumu = {$id}";
		pg_query($sql2);

		header("Location: ?gallery&id=$id&id2=$id2");
		exit();
	}	

//Usuń album
if(isset($_GET['delete']))
	{
 		$id = $_GET['id'];

 		//Usuń zdjęcie z serwera
 		  try
 		  {
 		  $sql = "SELECT * FROM zdjecia_foto
 		  		WHERE id_albumu = $id";
 		  $zdj = pg_query($sql);
 		  $zd = pg_fetch_all($zdj);

 		  foreach ($zd as $z) {
 		  	$zdjecie_nazwa = $z['nazwa_zdjecia'];

 		  	 $dir = '../../images/foto/';

 		  	if(file_exists($dir . $zdjecie_nazwa))
 		  	{
 		  			unlink($dir . $zdjecie_nazwa);
 		  	}
 		  	else
 		  	{
 		  	 		$error = "$zdjecie_nazwa: taki plik nie istnieje." . '<br>';
 		  	 		include 'error.php';
 		  	 		exit();
 		  	}  
 		  }
 		}
 		catch(Exception $e)
 		{
 			$error = 'Nie można usunąć zdjęć';
			include 'szablon.php';
			exit();
 		}

 		//Usuń zdjęcia z podanego albumu
 		try
 		{
 			$sql = "DELETE from zdjecia_foto
 					WHERE id_albumu = $id";
 			pg_query($sql);
 		}
 		catch(Exception $e)
 		{
 			$error = 'Nie można usunąć zdjęć';
			include 'szablon.php';
			exit();
 		}

 		//Usuń podany album
 		try
 		{
 			$sql = "DELETE from albumy
 					WHERE id_albumu = $id";
 			pg_query($sql);
 		}
 		catch(Exception $e)
 		{
 			$error = 'Nie można usunąć albumy';
			include 'szablon.php';
			exit();
 		}

 		header('Location: .');
 		exit();
	}

//Usuń zdjęcie
if(isset($_GET['deletephoto']))
	{	
		$id = $_GET['id'];
		$id2 = $_GET['id2'];
 		$id_zdjecia = $_GET['id_zdjecia'];


 		//Usuń zdjęcie z serwera
 		try
 		{
 		  $sql = "SELECT * FROM zdjecia_foto
 		  		WHERE id_zdjecia = $id_zdjecia";
 		  $zdj = pg_query($sql);
 		  $zd = pg_fetch_array($zdj);

 		  $dir = '../../images/foto/';

 		  	if(file_exists($dir . $zd['nazwa_zdjecia']))
 		  	{
 		  			unlink($dir . $zd['nazwa_zdjecia']);
 		  	}
 		  	else
 		  	{
 		  	 		$error = "$zdjecie_nazwa: taki plik nie istnieje." . '<br>';
 		  	 		exit();
 		  	}  
 		}
 		catch(Exception $e)
 		{
 			$error = 'Nie można usunąć zdjęć';
			include 'szablon.php';
			exit();
 		}

 		//Usuń zdjęcia z podanego albumu
 		try
 		{
 			$sql = "DELETE from zdjecia_foto
 					WHERE id_zdjecia = $id";
 			pg_query($sql);
 		}
 		catch(Exception $e)
 		{
 			$error = 'Nie można usunąć zdjęć';
			include 'szablon.php';
			exit();
 		}

 		header("Location: ?gallery&id=$id&id2=$id2");
 		exit();
 	
 	}

//Dodaj zdjęcia do albumu
if(isset($_GET['add']))
	{
		$album = $_GET['id'];
		include 'gallery2.php';
		exit();
	}

//Buduj listę kategorii
	try
	{
		$sql = "SELECT * FROM KATEGORIE";
		$kategorie = pg_query($sql);
		$kat = pg_fetch_all($kategorie);
	}
	catch(Exception $e)
	{
		$error = 'Nie można wyświetlić kategorii';
		include 'szablon.php';
		exit();
	}

//Buduj listę albumów
	try
	{
		$sql = "SELECT * FROM albumy";
		$albumy = pg_query($sql);
		$alb = pg_fetch_all($albumy);
	}
	catch(Exception $e)
	{
		$error = 'Nie można wyświetlić kategorii';
		include 'szablon.php';
	}

include 'szablon.php';