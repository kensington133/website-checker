<?php
	if($_GET['file'])
	{
		$file = $_GET['file'];
		//doc root is need to get the filesize correctly
		//as filesize() doesn't do http requests
		$path = "$_SERVER[DOCUMENT_ROOT]/crawler/sitemaps/$file";

		//set the download headers
		header('Content-Description: File Transfer');
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");
		header('Content-Disposition: attachment; filename="'.basename($path).'"');
		header('Content-Transfer-Encoding: binary');
		header('Connection: Keep-Alive');
		header('Expires: 0');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: public');
		header('Content-Length: ' . filesize($path));
		
		//read the file to be downloaded
		readfile($path);

	}
	/*                                                                                               
		`7MM"""Yp,                          .M"""bgd `7MM                          mm    
		  MM    Yb                         ,MI    "Y   MM                          MM    
		  MM    dP  .gP"Ya `7MMpMMMb.      `MMb.       MMpMMMb.  ,pW"Wq.`7Mb,od8 mmMMmm  
		  MM"""bg. ,M'   Yb  MM    MM        `YMMNq.   MM    MM 6W'   `Wb MM' "'   MM    
		  MM    `Y 8M""""""  MM    MM      .     `MM   MM    MM 8M     M8 MM       MM    
		  MM    ,9 YM.    ,  MM    MM      Mb     dM   MM    MM YA.   ,A9 MM       MM    
		.JMMmmmd9   `Mbmmd'.JMML  JMML.    P"Ybmmd"  .JMML  JMML.`Ybmd9'.JMML.     `Mbmo 
	*/
?>