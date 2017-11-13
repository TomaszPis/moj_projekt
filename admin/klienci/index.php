<?php

//Połącz z bazą danych
 include $_SERVER['DOCUMENT_ROOT'] . '/admin/function/db.ini.php';

 require $_SERVER['DOCUMENT_ROOT'] . '/admin/function/access.php';


 if (!userIsLoggedIn())
{ 
	include 'login.php';
	exit();
}


if(isset($_POST['edit']) AND $_POST['edit'] == 'Edycja'){

	$albumId = $_POST['albumId'];
	$klientId = $_POST['klient'];

	include 'klient_edit.php';
	exit();
}


if(isset($_POST['action']) AND $_POST['action'] == 'Zapisz'){

	$album = $_POST['name'];
	$id = $_POST['albumId'];
	$klientId = $_POST['klientId'];

	try{
		
		$sql = "SELECT * FROM album_klienta
				WHERE id = $id";
		$album2 = pg_query($sql);
		$alb = pg_fetch_array($album2);
		$a = $alb['nazwa_albumu'];

		if(file_exists($_SERVER['DOCUMENT_ROOT'] . '/images/klienci/' . $a)){

			rename($_SERVER['DOCUMENT_ROOT'] . "/images/klienci/$a", $_SERVER['DOCUMENT_ROOT'] . "/images/klienci/$album");

			$sql2 = "UPDATE album_klienta
				SET nazwa_albumu = '{$album}'
				where id = $id";
			pg_query($sql2); 
		}
		else{
			$error = "Nie odnaleziono folderu docelowego";
			include 'error.php';
			exit();
		}
		
	}
	catch(Exception $e)
	{
		$error = 'Nie można dodać albumu';
		include 'error.php';
		exit();
	} 

	header("Location: ?klient&klientId={$klientId}");
	exit();
}

if(isset($_POST['action']) AND $_POST['action'] == 'Wyślij')
{
			
		
		$album = $_POST['album'];
		$klientId = $_GET['klientId'];

		$filesArr = isset($_FILES['pliki']) ? $_FILES['pliki'] : array();
 
		if (isset($filesArr['name'])){
		 
		  foreach ($filesArr['name'] as $index=>$fileName){
		 
		    $file_nazwa = $fileName; // nazwa pliku
		 
		    $file_type = $filesArr['type'][$index]; //typ pliku
		    $file_tmp = $filesArr['tmp_name'][$index]; //lokalizacja w folderze tymczasowym

		    $album = $_POST['album']; //Podaj album do którego przypisane będą zdjęćia


			//Jeżeli jest 'uploadowany' plik to zapisz zdjęcie w folerze 'foto'
			if(is_uploaded_file($file_tmp)) { 
					move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT']. "/images/klienci/{$album}/{$file_nazwa}");
				}
				else
				{
				 $error = 'Błąd przy tworzeniu folderu';
				 include 'error.php';
				 exit();
				} 	
			}
		    
		  }	

	header("Location: ?klient&klientId={$klientId}");
	exit();
		
}

if(isset($_GET['klient'])){


	$klientId = $_GET['klientId'];
	

	try{

		$sql = "SELECT * FROM klienci 
				WHERE id = $klientId ";
		$klient = pg_query($sql);
		$k = pg_fetch_array($klient);

		$sql2 = "SELECT * FROM album_klienta
				 WHERE id_klienta = $klientId";
		$album_klienta = pg_query($sql2);
		$album = pg_fetch_all($album_klienta);

		include 'klient.php';
		exit();
	}
	catch(Exception $e){
		$error = 'Błąd przy pobieraniu danych';
		include 'error.php';
		exit();
	}
}




if(isset($_POST['action']) AND $_POST['action'] == 'Dodaj'){

	$login = $_POST['login'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$album = $_POST['album'];

	try{

		$sql = "INSERT INTO klienci(login, email)
				VALUES ('{$login}', '{$email}')";
		pg_query($sql); 

		if($album != ''){
			try{
				$sql2 = 'SELECT * FROM klienci
						ORDER BY id DESC LIMIT 1 ';
				$id	= pg_query($sql2);
				$id2 = pg_fetch_array($id);
				$id_klienta = $id2['id'];


				 $sql3 = "INSERT INTO album_klienta(id_klienta, nazwa_albumu, password)
						VALUES ('{$id_klienta}', '{$album}', '{$password}')";
				 pg_query($sql3); 

				 mkdir($_SERVER['DOCUMENT_ROOT']. "/images/klienci/{$album}");
			}
			catch(Exception $e)
			{
				$error = 'Nie można dodać albumu';
				include 'error.php';
				exit();
			} 
		} 

	}
	catch(Exception $e)
			{
				$error = 'Nie można dodać klienta';
				include 'error.php';
				exit();
			}
	/* header('Location: ./'); */
}


try{
	$sql = 'SELECT * FROM klienci';
	$klienci = pg_query($sql);
	$klient =pg_fetch_all($klienci);
}
catch(Exception $e)
{
	$error = 'Nie można wczytać list klientów';
	include 'error.php';
	exit();
}

 include 'szablon.php';


