<?php
require_once('funcs.php');


	$url = array(
	'scottmarshallphotography.co.uk',
	'scottmarshallphotography.co.uk/contact',
	'scottmarshallphotography.co.uk/gallery',
	'scottmarshallphotography.co.uk/prices'.
	'scottmarshallphotography.co.uk/proofs',
	'scottmarshallphotography.co.uk/videography'
	);
	foreach($url as $loc)
	{
		checkPageExistis($loc).'<br/>';
	}

//echo checkFileExistis('budezest.co.uk', 'sitemap.xml');








?>