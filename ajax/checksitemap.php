<?php

require_once('../clsWebsiteChecker.php');
$website = new WebsiteChecker();
	
	$fullurl = $_POST['site'];
	//$fullurl = $_GET['site'];
	$pageurl = str_replace('http://', '', $fullurl);
	$file = 'sitemap.xml';

	$sitemap = $website->checkFileExists($pageurl, $file);
	
	if($sitemap== 'yes')
	{	
		echo '<h3>Page Checks</h3>
			<table>
				<thead>
					<tr>
						<th>Page URL</th>
						<th>Found</th>
					</tr>
				</thead>
				<tbody>';
		$xml = simplexml_load_file("http://$pageurl/$file");
		
		foreach($xml->url as $url)
		{
			foreach($url->loc as $loc)
			{
				echo "<tr>";
				$fullurl = $loc;
				$loc = str_replace('http://', '', $loc);
				$got404 = $website->checkPageExists($loc);

				echo "<td>$fullurl</td>";
				
				//got 404
				if($got404 === true)
				{
					$website->outPut('no');
				}
				else
				{
					$parts = explode('/', $loc);
					if(strpos($parts[0], $pageurl) === false)
					{
						//got sitemap but wrong website link
						$website->outPut('maybe');
					}
					else
					{
						//all good
						$website->outPut('yes');
					}
				}
				echo "</tr>";
			}
		}
	}
	else
	{
		echo '<p>sitemap not found</p>';
	}
?>
		</tbody>
	</table>