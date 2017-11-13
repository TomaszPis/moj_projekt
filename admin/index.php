
<?php

//Połącz z bazą danych
 include 'function/db.ini.php';

 require $_SERVER['DOCUMENT_ROOT'] . '/admin/function/access.php';


 if (!userIsLoggedIn())
{
	include 'login.php';
	exit();
}



if(isset($_POST['action']) AND $_POST['action'] == 'Wyślij logo'){

		$file_tmp = $_FILES['plik']["tmp_name"]; 
		$file_nazwa = $_FILES['plik']["name"];  
		$file_type = $_FILES['plik']["type"];
	
	
		if(is_uploaded_file($file_tmp)) { 
				move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT']. "/images/logo/$file_nazwa");
			}
			else
			{
			 $error = 'Błąd przy tworzeniu folderu';
			 include 'error.php';
			 exit();
			}

			try
			{	
				$sql2 = "UPDATE logo
						SET nazwa_logo = '$file_nazwa'
						WHERE id = 1";
				pg_query($sql2);
			}
			catch(Exception $e)
			{
				 $error = 'Nie można dodać zdjęcia do bazy';
				 include 'error.php';
				 exit();
			}

			header('Location: .');
			exit();

}

if(isset($_GET['deletelogo'])){
	
	$nazwa = $_GET['nazwa'];

	unlink("../images/logo/$nazwa");

	header('Location: .');
	exit();
}

if (isset($_GET['update-logo'])) {
	
	$nazwa = $_GET['nazwa'];

	try
	{	
		$sql2 = "UPDATE logo
				SET nazwa_logo = '$nazwa'
				WHERE id = 1";
		pg_query($sql2);
	}
	catch(Exception $e)
	{
		 $error = 'Nie można dodać zdjęcia do bazy';
		 include 'error.php';
		 exit();
	}

	header('Location: .');
	exit();

}


include 'szablon.php';


