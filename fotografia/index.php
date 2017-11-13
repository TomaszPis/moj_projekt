<?php
	require $_SERVER['DOCUMENT_ROOT'] . '/admin/function/db.ini.php';

	//Pobierz kategorie kategorie

	try
	{
	 	$sql = "SELECT * from kategorie 
	 			ORDER BY id"; 
	 	$s   = pg_query($sql);
	 	$kat = pg_fetch_all($s); 

	}
	catch(Exception $e)
	{
		$error = "Nie można wczytać kategorii";
		include 'error.php';
		exit();
	}


	//Pobierz albumy przypisane do kategorii

	if(isset($_GET['alb']))
	{
		$id = $_GET['id']; //Id kategorii
	 	$sql = "SELECT * from albumy
	 			WHERE id_kategorii = {$id}";
	 	$s   = pg_query($sql);
	 	$alb = pg_fetch_all($s);

	 	//Pobierz tło kategorii
		$sql2 = "SELECT zdj_kategori FROM kategorie
	 			WHERE id = $id";
	 	$zdjecie = pg_query($sql2);
	 	$zdj = pg_fetch_array($zdjecie);


	 	//Pobierz nazwę kategorii
	 	$sql3 = "SELECT * from kategorie
	 			 WHERE id = {$id}";
	 	$n = pg_query($sql3);
	 	$t = pg_fetch_array($n);
	 	$title = $t['nazwa_kategorii'];
	 		

	 	//Włącz szablon albumy.php	
		include 'albumy.php';
	 	exit();
	}


	//Pobierz zdjęcia przypisane do albumu

	if(isset($_GET['gallery']))
	{

		$id = $_GET['id'];//Id wybranego albumu
	 	$sql = "SELECT * from zdjecia_foto
	 			WHERE id_albumu = $id";
	 	$s   = pg_query($sql);
	 	$gallery = pg_fetch_all($s);


	 	//Pobierz nazwę albumu
	 	$sql2 = "SELECT * from albumy
	 			WHERE id_albumu = $id";
	 	$tytul = pg_query($sql2);
	 	$t = pg_fetch_array($tytul);
	 	$title = $t['nazwa_albumu'];

	 	//Włącz szablon gallery.php
	 	include 'gallery.php'; 
	 	exit();
	}

	//Pobierz pojedyncze zdjęcie
	if(isset($_GET['img']))
	{
		$id = $_GET['id']; //Id wybranego zdjęca
	 	$sql = "SELECT * from zdjecia_foto
	 			WHERE id_zdjecia = {$id}";
	 	$image  = pg_query($sql);
	 	$img = pg_fetch_array($image);
	 	

	 	//Włącz szablon image.php
	 	include 'image.php'; 
	 	exit();
	}


	//Włącz szablon 
	include 'index2.php';
