<?php
  
 session_start(); 
  
 require $_SERVER['DOCUMENT_ROOT'] . '/admin/function/access.php';


 if (!userIsLoggedIn())
{
	include 'login.php';
	exit();
}
 
 //Usuñ zg³oszenia

 if (isset($_POST['delete']) == 'Usuñ')
{ 
	include $_SERVER['DOCUMENT_ROOT'] . '/admin/function/db.ini.php';
	
	$sql = "DELETE FROM zgloszenia WHERE id = '{$_POST['id']}'; ";
	pg_query($sql);
 
 header('Location: .');
 exit();
}

 //Po³¹cz z baz¹ danych
 include $_SERVER['DOCUMENT_ROOT'] . '/admin/function/db.ini.php';

 //Wyœwietl zg³oszenia
 try
 {
	 $sql = 'SELECT * FROM zgloszenia
			ORDER BY id DESC;';
	 $a = pg_query($sql);
	 $b = pg_fetch_all($a);
 }
 catch(Exception $e)
 {
	 $error = 'B³¹d przy pobieraniu danych z bazy' . $e;
	 include '../error.php';
	 exit();
 }
 
 
 //za³aduj szablon
 
include 'szablon.php';

 




