<?php
//Po��cz z baz� danych
 try
  {
	$conn = pg_connect("host='sql.tomaszpis.nazwa.pl' dbname='tomaszpis_std' user='tomaszpis_std' password='' ");
  }
  catch(Exception $e)
  {
	$error = 'Wyst�pi� b��d po��czena z baz� danych' . $e;
	include 'error.php';
	exit();
  }