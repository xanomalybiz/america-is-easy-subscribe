<?php
	if($_SERVER['REQUEST_METHOD'] ===  "POST")
	{
		$name = strip_tags(trim($_POST['name']));
		$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
		$recipient = $_POST['recipient'];	
		$subject = $_POST['subject'];
		
				
		//build emial
		
		$message = "Name: $name\n";
		$message .= "Email: $email\n\n";
		
		$headers = "From: $name <$email>";
		
		if(mail($recipient, $subject, $message, $headers))
		{
			echo 'You are now subcribed';
			http_response_code(200);
			exit;
			
	
			
		}
		else
		{
			
			http_response_code(200);
			echo 'There Was A Problem';	
			
		}
		
	}
	else
	{
		
		echo 'There was a problem';
			
	}