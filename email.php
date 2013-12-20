<?php

/* print_r($_POST); */

if($_POST)
{
	$message = $_POST['message'];
	$subject = $_POST['subject'];
	$headers = $_POST['headers'];
	$toEmail = $_POST['email'];
	$page = $_POST['page'];
	
	if( (!empty($message)) && (!empty($subject)) && (!empty($headers)) && (!empty($toEmail)) && (!empty($page)))
	{
		if(mail($toEmail, $subject, $message, $headers))
		{
			$error = 1;
		}
		else
		{
			$error = 0;
		}

		$url = $page.'?s='.$error;
		header("Location: http://dev.md-softwaresystems.co.uk/crawler/$url");
		exit();
	}
}
?>