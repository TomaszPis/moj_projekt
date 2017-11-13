<?php
//Po³¹cz z baz¹ danych
 try
  {
	$conn = pg_connect("host='sql.tomaszpis.nazwa.pl' dbname='tomaszpis_std' user='tomaszpis_std' password='' ");
  }
  catch(Exception $e)
  {
	$error = 'Wyst¹pi³ b³¹d po³¹czena z baz¹ danych' . $e;
	include 'error.php';
	exit();
  }