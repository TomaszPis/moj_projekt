<?php


function userIsLoggedIn()
{
	if(isset($_POST['action']) and $_POST['action'] == 'login')
	{
		if (!isset($_POST['password']) or $_POST['password'] == '')
		{
			$GLOBALS['loginError'] = 'Musisz podać kod dostępu';
			return FALSE;
		}
		
		if (databaseContainsUser($_POST['password']))
		{
			session_start();
			$_SESSION['password'] = $_POST['password'];
			return TRUE;
		}
		else
		{
			session_start();
			unset($_SESSION['password']);
			$GLOBALS['loginError'] = 'Kod dostępu jest niepoprawny';
			return FALSE;
		}
	}


		
	if (isset($_POST['action']) and $_POST['action'] == 'logout')
	{
		session_start();
		unset($_SESSION['loggedIn']);
		unset($_SESSION['email']);
		unset($_SESSION['password']);
		header('Location: ' . $_POST['goto']);
		exit();
	}

	session_start();
	if (isset($_SESSION['loggedIn']))
	{
		return databaseContainsUser($_SESSION['email'], $_SESSION['password']);
		
	}
	
	
}


function databaseContainsUser($password)
{
	$conn = pg_connect("host='sql.tomaszpis.nazwa.pl' dbname='tomaszpis_std' user='tomaszpis_std' password='@)!&studio@IN!ST'");

	$sql = "SELECT * FROM album_klienta
			WHERE  password = '{$password}'; ";
	$user = pg_query($sql);
	
	$row = pg_fetch_array($user); 
	
	if($row > 0)
	{
		return true;
	}
	else
	{
		return false;
	}
	
}


