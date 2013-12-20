<?php
	require_once('../funcs.php');
	
	if(isset($_GET['file']))
	{
		echo basename($file);
	}
	
?>