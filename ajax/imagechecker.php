<?php
require_once('../clsWebsiteChecker.php');
$website = new WebsiteChecker();
	
	$fullurl = $_POST['site'];
	//$fullurl = $_GET['site'];
	$pageurl = str_replace('http://', '', $fullurl);
	
	$file = 'sitemap.xml';
	$siteMapExists = $website->checkFileExists($pageurl, $file);

	$images = array();
	
	//if it has a sitemap
	if($siteMapExists == 'yes')
	{
		//load the xml into an simple php xml object
		$xml = simplexml_load_file("http://$pageurl/$file");
		
		//for every url
		foreach($xml->url as $url)
		{
			//get every image from every page on the website using the sitemaps <loc></loc> fields
			$regex = '/<img[^\/>].*?>/';
			$matches = $website->checkFileMultiContentsRegex($url->loc, $regex);
		
			//for every img found add it to the images array along with the page it is on to be outputted
			foreach ($matches as $match)
			{
				foreach($match as $m)
				{
					$push = array('image' => $m, 'page' => $url->loc);
					array_push($images, $push);
				}
			}
			
		}
		//if we have images
		if(is_array($images))
		{
			//and it isn't empty
			if(!empty($images))
			{
				echo '<table>';
					echo '<thead>';
						echo '<tr>';
							echo '<th>Image Location</th>';
							echo '<th>Image Source</th>';
							echo '<th width="40px">Missing Both</th>';
							echo '<th width="40px">Missing Alt</th>';
							echo '<th width="40px"">Missing Title</th>';
							echo '<th width="40px">Got Both</th>';
						echo '</tr>';
	
					echo '</thead>';
					echo '<tbody>';
						
						//get the total images found and initilise the count variables
						$totalimages = count($images);
						$missingboth = $missingtitle = $missingalt = $gotboth = 0;
						
						//for every image
						foreach($images as $i)
						{	
							//create a new php DOMDocument to search for attributes				
							$doc = new DOMDocument();
							libxml_use_internal_errors(true);
							$doc->loadHTML($i['image']);
							$xpath = new DOMXPath($doc);
							$nodelist = $xpath->query("//img");
							$node = $nodelist->item(0);
							
							//get the required attrivutes
							$src = $node->attributes->getNamedItem('src')->nodeValue;
							$title = $node->attributes->getNamedItem('title')->nodeValue;
							$alt = $node->attributes->getNamedItem('alt')->nodeValue;
							
							echo '<tr>';
								
								//if we have a src
								if(!empty($src))
								{
									//output the page url where the image was found
									echo "<td><a href='".$i['page']."'>View Page</a></td>";
									
									//echo the src of the image
									echo "<td>$src</td>";
									
									//missing both
									if( (empty($title)) && (empty($alt)) )
									{
										$website->outPut('no');
										$website->outPut('empty');
										$website->outPut('empty');
										$website->outPut('empty');
										$missingboth++;
									}
									else
									{
										//missing alt
										if( (!empty($title)) && (empty($alt)))
										{
											$website->outPut('empty');
											$website->outPut('maybe');
											$website->outPut('empty');
											$website->outPut('empty');
											$missingalt++;
			
										}
										else
										{
											//missing title
											if((empty($title)) && (!empty($alt)))
											{
												$website->outPut('empty');
												$website->outPut('empty');
												$website->outPut('maybe');
												$website->outPut('empty');
												$missingtitle++;
			
											}
											else
											{
												//got both
												if((!empty($title)) && (!empty($alt)))
												{
													$website->outPut('empty');
													$website->outPut('empty');
													$website->outPut('empty');
													$website->outPut('yes');
													$gotboth++;
												}
											}
										}
									}
								}
	
							echo '</tr>';
							
						}	
					echo '</tbody>';
	
				echo '</table>';
				echo "<table style='margin-top: 20px;'>
				<thead>
					<tr>
						<th>Missing Both</th>
						<th>Missing Alt</th>
						<th>Missing Title</th>
						<th>Got Both</th>
					</tr>
				</thead>
					<tbody>
						<tr>
							<td>$missingboth</td>
							<td>$missingalt</td>
							<td>$missingtitle</td>
							<td>$gotboth</td>
						</tr>
					<tbody>
				</table>";
			}
			else
			{
				echo "<p style='text-align: center;'>No images found</p>";
			}
		}
		
	}
	else
	{
		echo "<p>Error: sitemap.xml not found</p>";
	}

?>