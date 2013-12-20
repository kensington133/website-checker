<?php
require_once('../clsWebsiteChecker.php');
$website = new WebsiteChecker();
	
	$pages = array();
	$finalPages = array();
	$file = 'sitemap.xml';
	$pageCount = 0;
	$fullurl = $_POST['site'];
	//$fullurl = $_GET['url'];
	$url = str_replace('http://', '', $fullurl);
	$page = $website->getPage($url);
	$page = htmlentities($page);
	$sitemap = $website->checkFileExists($url, $file);

		if($sitemap == 'yes')
		{
			//read the websites sitemap.xml file		
			$xml = simplexml_load_file("http://$url/$file");
			
			//for every url
			foreach($xml->url as $sitemapurl)
			{
				//for every loc in the url
				foreach($sitemapurl->loc as $loc)
				{
					//strip the http://
					$loc = str_replace('http://', '', $loc);
					//check if the loc exists
					$got404 = $website->checkPageExists($loc);

						//if it doesn't return a 404 error
						if($got404 === false)
						{	
							//increase the page count
							$pageCount++;
							//create a new DOMDocument
							$doc = new DOMDocument();
							libxml_use_internal_errors(true);
							//if it loads
							if($doc->loadHTMLFile("http://$loc"))
							{
								//create a new XPath to search through elements							
								$xpath = new DOMXPath($doc);
								//find all the links
								$links = $xpath->query("//a");
								//for every link found add the the the pages array with the href attribute
								for($i = 0; $i < $links->length; $i++)
								{
									$item = $links->item($i);
									array_push($pages, $item->attributes->getNamedItem('href')->nodeValue);
							
								}						
							}
						}
				}
			}
			
			//count the values of 
			$occurence = array_count_values($pages);
			foreach($occurence as $page => $count)
			{
				//if the websites url is in the page url	
				if(strpos($page, $url) !== false)
				{
					//if the link shows up on every page add it to the array
					if($count >= $pageCount)
					{
						array_push($finalPages, $page);
					}
				}
			}
			
			//start the xml file output
			//header('Content-type: application/xml');
			$xmlHeader = '<?xml version="1.0" ?>
			<urlset xmlns="http://www.google.com/schemas/sitemap/0.84" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.google.com/schemas/sitemap/0.84 http://www.google.com/schemas/sitemap/0.84/ sitemap.xsd">';
			$sitemap = $xmlHeader;
			
			//for every final page add the url and the date to the sitemap xml file
			foreach($finalPages as $page)
			{
				$sitemap .= "<url>\r\n";
					$sitemap .= "<loc>$page</loc>\r\n";
					$sitemap .= "<lastmod>".date('c')."</lastmod>\r\n";
				$sitemap .= "</url>\r\n";
			}
			$sitemap .= "</urlset>";

			//if directory already exits create it in that directory and overwrite the current one
			if(is_dir("../sitemaps/$url/"))
			{
				$makefile = file_put_contents("../sitemaps/$url/sitemap.xml", $sitemap);
				
				//if the file was made sucessfully output the auto download iframe
				if($makefile !== false)
				{	
					
					echo "<iframe id='downloadfile' src='http://dev.md-softwaresystems.co.uk/crawler/downloadfile.php?file=$url/sitemap.xml' style='display:none;'></iframe>";

				}
				else
				{
					echo "<p>Failed to save file, please refresh the page and try again</p>";
				}

			}
			//otherwise create the url's directory
			else
			{
				if(mkdir("../sitemaps/$url/"))
				{
					$makefile = file_put_contents("../sitemaps/$url/sitemap.xml", $sitemap);
					
					//if the file was made sucessfully output the auto download iframe
					if($makefile !== false)
					{		
						//echo $makefile.' chars written';
						//echo "<p><a class='button' style='margin-bottom: 10px;' href='$_SERVER[DOCUMENT_ROOT]/crawler/downloadfile.php?file=$url/sitemap.xml'>View Sitemap</a></p>";
						echo "<iframe id='downloadfile' src='http://dev.md-softwaresystems.co.uk/crawler/downloadfile.php?file=$url/sitemap.xml' style='display:none;'></iframe>";
					}
					else
					{
						echo "<p>Failed to save file, please refresh the page and try again</p>";
					}
				}
				else
				{
					echo "<p>Unable to create directory, please refresh the page and try again</p>";
				}
			}

		}
		else
		{
			echo "<p>sitemap not found, unable to create an updated version</p>";
		}










?>