<?php

   require $_SERVER['DOCUMENT_ROOT'] . '/admin/function/db.ini.php';


 
 
    if(isset($_POST['action']) AND $_POST['action'] == 'Wyślij')
 	{
	 
	 $name = pg_escape_string($_POST['name']);
	 $mail = pg_escape_string($_POST['mail']);
	 $phone = pg_escape_string($_POST['phone']);
	 $services = $_POST['services'];
	 $message_text = pg_escape_string($_POST['message_text']);
	 
	try
	 {
		
		if($name == '')
		{
			$error = "Podaj swoje imie.";
			$mail;
			$phone;
			$services;
			$message_text;
			include 'error.php';
			exit();
		}
		
		if($mail == '')
		{
			$error2 = "Podaj e-mail byśmy mogli Ci odpowiedzieć.";
			$name;
			$phone;
			$services;
			$message_text;
			include 'error.php';
			exit();
		}
		
		if($phone == '')
		{
			$error3 = "Podaj numer telefonu byśmy mogli Ci odpowiedzieć.";
			$name;
			$mail;
			$services;
			$message_text;
			include 'error.php';
			exit();
		}
			 
		$sql = "INSERT INTO zgloszenia (imie, mail, phone, usluga, message_text, data_zgloszenia)
			  VALUES ('{$name}', '{$mail}', '{$phone}', '{$services}', '{$message_text}', current_date)";
		pg_query($sql);
     }	 
	 
	 catch(Exception $e)
	 {
		echo "Upssiii coś poszło nie tak!";
	 }

	 try{
			$to      = 'tomek.pisarski@gmail.com';
			$subject = 'Nowa wiadomość';
			$message = 'Witaj, masz nową wiadomość na www.studio2in1.pl/admin';
			$headers = 	'From: studio2in1@studio2in1.pl ' . "\r\n" .
		    'Reply-To: No reply ' . "\r\n" .
		    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
		}
		catch(Exception $e){
			
			$error = 'No i chuj w dupę strzelił';
			include 'error.php';
			exit();
		}

		header("Location: .");
		exit();
	} 
	
	

	 include 'szablon.php';



