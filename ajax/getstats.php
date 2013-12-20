<?php
require_once('../clsWebsiteChecker.php');
$website = new WebsiteChecker();	
	
	$fullurl = $_POST['site'];
	//$fullurl = $_GET['site'];
	$url = str_replace('http://', '', $fullurl);
	$file = 'sitemap.xml';
	
	//initilise count variables
	$linkcount = $pagecount = $imagecount = 0;
	
	//check if the sitemap exists
	$sitemap = $website->checkFileExists($url, $file);
	
	//if it does
	if($sitemap== 'yes')
	{
		//load the sitemap
		$xml = simplexml_load_file("http://$url/$file");
		
		//for every sitemap url
		foreach($xml->url as $url)
		{
			//for every loc in the url
			foreach($url->loc as $loc)
			{
				//increaste page count
				$pagecount++;
				
				//search for all links on the page
				$linkregex = '/<a[^\/>].*?<\/a>/';
				$linkmatches = $website->checkFileMultiContentsRegex($loc, $linkregex);
				
				//increase link count
				foreach ($linkmatches as $match)
				{
					foreach($match as $m)
					{
						$linkcount++;
					}
				}
				
				//search for all images on the page
				$imgregex = '/<img[^\/>].*?>/';
				$imgmatches = $website->checkFileMultiContentsRegex($loc, $imgregex);
			
				//increase the image count
				foreach ($imgmatches as $match)
				{
					foreach($match as $m)
					{
						$imagecount++;
					}
				}

			}
		}
		
	}
	else
	{
		$pagecount = 'Sitemap Not Found';
	}
	
?>

<h3>Website Statistics</h3>
<table>
<thead>
	<tr>
		<th>Number of Pages</th>
		<th>Number of Images</th>
		<th>Number of Links</th>
	</tr>
</thead>
<tbody>
	<tr>
		<td><?php echo $pagecount ?></td>
		<td><?php echo $imagecount ?></td>
		<td><?php echo $linkcount ?></td>
	</tr>
</tbody>
</table>