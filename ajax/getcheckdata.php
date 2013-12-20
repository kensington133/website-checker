<?php
require_once('../clsWebsiteChecker.php');
$website = new WebsiteChecker();
?>
	
			<?php
				$files = array(
				'sitemap.xml',
				'favicon.ico',
				'robots.txt'
				);
				//if there has been post, set the url to the post
				if(!empty($_POST['site']))
				{
					echo "<h2>Checked on ".date('jS F Y \a\t H:i:s')."</h2>";
					echo"<table>
						<thead>
							<tr>
								<th>Sitemap.xml</th>
								<th>Favicon.ico</th>
								<th>Robots.txt</th>
							</tr>
						</thead>
						<tbody>
						<tr>";
					$fullurl = $_POST['site'];
				
				
					//$fullurl = $_GET['url'];
					//strip the http:// off the url so it can be displayed cleanly
					$url = str_replace('http://', '', $fullurl);
					$files = $website->checkMultiFileExists($url, $files);
					
					//website url as the page title
					echo "<h3>$url</h3>";
					
					if(is_array($files))
					{
						foreach($files as $f)
						{
							$found = $f['FOUND'];
							$file = $f['FILE'];
							
							//check the file name and see if it is found in the website
							switch($file)
							{
								case 'sitemap.xml':
									if($found == 'yes')
									{
										//found sitemap
										$website->outPut('yes');
									}
									else
									{
										//not found sitemap
										$website->outPut('no');
									}
								break;
								case 'favicon.ico':
									if($found == 'yes')
									{
										//found favicon, show it on the page
										echo "<td><img src='$fullurl/$file'/></td>";
									}
									else
									{
										//not found favicon
										$website->outPut('no');
									}
								break;
								case 'robots.txt':
									$loc = "$fullurl/$file";
									if($found == 'yes')
									{
										//got everything
										$website->outPut('yes');
									}
									else
									{
										//robots not found
										$website->outPut('no');
									}
								break;
							}
						}
						
					}
					echo "</tr>
					</tbody>
				</table>";
				}
				else
				{
					echo "<h2>Please provide a website url</h2>";
				}
			?>
			
