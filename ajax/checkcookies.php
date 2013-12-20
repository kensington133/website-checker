<?php
require_once('../clsWebsiteChecker.php');		
$website = new WebsiteChecker();

		$fullurl = $_POST['url'];
		//$fullurl = $_GET['site'];
		$url = str_replace('http://', '', $fullurl);

		$headers = $website->getHeaderParts($url);
		
		foreach($headers as $h)
		{
			if( (strpos($h, 'mdwebsolutionscookieconsent') !== false) )
			{
				$foundCookie = true;
				break;
			}
			else
			{
				$foundCookie = false;
			}
		}
		
		if($foundCookie)
		{
			$website->outPut('yes');
		}
		else
		{
			$website->outPut('no');
		}
?>