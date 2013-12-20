<?php
	function printr($input)
	{
		if( is_array($input) || is_object($input) )
		{
			echo "<pre>".print_r($input,true)."</pre>";
		}
		else
		{
			echo $input;
		}
		echo '<br/>';
	}
	
	/*$sites = array(
	array('url' => 'agwildlifepics.co.uk', 'name' => 'Animals Galore'),
	array('url' => 'ajpavingbude.co.uk', 'name' => 'AJ Paving'),
	array('url' => 'alchemist-jewellery.com', 'name' => 'Alchemist Jewellery'),
	array('url' => 'alkemica-international.com', 'name' => 'alkemica'),
	array('url' => 'artandcraftretreats.co.uk', 'name' => 'Edgcumbe'),
	array('url' => 'thebeachatbude.co.uk', 'name' => 'The Beach'),
	array('url' => 'breezelyn.co.uk', 'name' => 'breezylyn'),
	array('url' => 'budecyclingclub.org.uk', 'name' => 'Cycling Club'),
	array('url' => 'budehockey.org.uk', 'name' => 'Bude Hockey'),
	array('url' => 'budesurfingexperience.co.uk', 'name' => 'Bude Surfing'),
	array('url' => 'budezest.co.uk', 'name' => 'BudeZest'),
	array('url' => 'castlerisedentalpractice.co.uk', 'name' => 'Castle Rise Dental'),
	array('url' => 'cornwallbeachcottages.com', 'name' => 'Beach Cottages'),
	array('url' => 'cornwallcakes.co.uk', 'name' => 'Cornwall Cakes'),
	array('url' => 'cornwalllawsociety.org.uk', 'name' => 'Cornwall Law Society'),
	array('url' => 'deeheadon-motorsport.co.uk', 'name' => 'Dee Headon Motor Sport'),
	array('url' => 'dirtboxguitars.com', 'name' => 'Dirbox Guitars'),
	array('url' => 'driveandsucceed.co.uk', 'name' => 'Drive and Succeed'),
	array('url' => 'drumscool.com', 'name' => 'Drumscool'),
	array('url' => 'dylansguesthouseinbude.co.uk', 'name' => 'Dylans Guest House'),
	array('url' => 'earplugs-direct.co.uk', 'name' => 'Earplugs Direct'),
	array('url' => 'ecohubb-gardenpods.co.uk', 'name' => 'ecohubb'),
	array('url' => 'edgcumbe-hotel.co.uk', 'name' => 'edgcumbe hotel'),
	array('url' => 'eleanorrose.org', 'name' => 'eleanor rose'),
	array('url' => 'elements-life.co.uk', 'name' => 'elements'),
	array('url' => 'eluckhurst.co.uk', 'name' => 'ellis luckhurst'),
	array('url' => 'energyperformanceservices.co.uk', 'name' => 'energy performance services'),
	array('url' => 'finkprint.co.uk', 'name' => 'fink print'),
	array('url' => 'geckodecks.com', 'name' => 'geckodecks'),
	array('url' => 'geckoheadgear.com', 'name' => 'geckoheadgear'),
	array('url' => 'goodlife-joinery.co.uk', 'name' => 'good life joinery'),
	array('url' => 'guitar-retreats.co.uk', 'name' => 'guitar retreats'),
	array('url' => 'hilhouse-ships.co.uk', 'name' => 'mr hillhouse'),
	array('url' => 'hip-services.co.uk', 'name' => 'hip services'),
	array('url' => 'hirst-environmental-services.co.uk', 'name' => 'Hirst Environmental services'),
	array('url' => 'hirstconstruction.co.uk', 'name' => 'hirst construction'),
	array('url' => 'ian-mill-plumbing.co.uk', 'name' => 'ian mill'),
	array('url' => 'ivyleaf-caravan-storage.co.uk', 'name' => 'ivyleaf caravan storage'),
	array('url' => 'ivyleafgolf.com', 'name' => 'ivyleaf golf'),
	array('url' => 'ivyleafmountainboarding.co.uk', 'name' => 'ivyleaf mountain boarding'),
	array('url' => 'kjbromell.co.uk', 'name' => 'kj brommel'),
	array('url' => 'marhamchurchpreschool.co.uk', 'name' => 'marhamchurch'),
	array('url' => 'md-searchengineoptimisation.co.uk', 'name' => 'searchengine'),
	array('url' => 'md-softwaredevelopment.co.uk', 'name' => 'softwaredevelopment'),
	array('url' => 'md-softwaresystems.co.uk', 'name' => 'softwaresystems'),
	array('url' => 'md-websitedesign.co.uk', 'name' => 'websitedesign'),
	array('url' => 'md-websolutions.co.uk', 'name' => 'websolutions'),
	array('url' => 'number9bude.co.uk', 'name' => 'number 9'),
	array('url' => 'olivetreebude.co.uk', 'name' => 'olive tree'),
	array('url' => 'pegasusinteriors.co.uk', 'name' => 'pegasus interiors'),
	array('url' => 'peirceshark.com', 'name' => 'richard peirce'),
	array('url' => 'resin8surfboards.com', 'name' => 'resin 8'),
	array('url' => 'revolutionatbude.co.uk', 'name' => 'revolution'),
	array('url' => 'riverlifebistro.co.uk', 'name' => 'river life'),
	array('url' => 'sampson-solicitors.co.uk', 'name' => 'sampson solicitors'),
	array('url' => 'sandymouth.com', 'name' => 'sandymouth'),
	array('url' => 'scottmarshallphotography.co.uk', 'name' => 'scott marshall'),
	array('url' => 'sharkconservationsociety.com', 'name' => 'shark conservation'),
	array('url' => 'sheridan-oliver.com', 'name' => 'sheridon-oliver'),
	array('url' => 'shorelineactivities.co.uk', 'name' => 'shoreline'),
	array('url' => 'shorethingholidayhomes.co.uk', 'name' => 'shorething'),
	array('url' => 'stockgaylard.com', 'name' => 'stock gaylard'),
	array('url' => 'the-electricians-store.com', 'electricians store'),
	array('url' => 'thebeachatbude.co.uk', 'name' => 'the beach'),
	array('url' => 'thecornwallsolarcompany.co.uk', 'name' => 'cornwall solar'),
	array('url' => 'thekitchenfront.co.uk', 'name' => 'kitchen font'),
	array('url' => 'thelookoutincornwall.co.uk', 'lookout'),
	array('url' => 'themostimportantthinginlifeisdeath.com', 'name' => 'death'),
	array('url' => 'thepoachersmoon.com', 'name' => 'poachers moon'),
	array('url' => 'thethirdeye.org', 'name' => 'third eye'),
	array('url' => 'totallytruro.co.uk', 'name' => 'totally truro'),
	array('url' => 'trestonedental.co.uk', 'name' => 'trestone dental'),
	array('url' => 'twpltd.com', 'name' => 'Military'),
	array('url' => 'waldon-valley-lodges.co.uk', 'name' => 'Waldon Valley'),
	array('url' => 'webbelectricalsw.co.uk', 'name' => 'Webb Electrical'),
	array('url' => 'westcountrypropertysales.co.uk', 'name' => 'West Country Property'),
	array('url' => 'wickettspoultryandpork.co.uk', 'name' => 'Wicketts')
	);
	*/

//stop silly timezone errors
date_default_timezone_set('Europe/London');
/*
-----------------------------------------------------------------------------------------------------------
Class: WebsiteChecker
Version: 1.0
Release Date: 
-----------------------------------------------------------------------------------------------------------
Overview:	Website checking class with various functions to enable the checking of websites
-----------------------------------------------------------------------------------------------------------
History:
2/12/2013 	0.1	BHS 	Created
16/12/2013	1.0	BHS	Class created
-----------------------------------------------------------------------------------------------------------
*/
class WebsiteChecker
{	
	/*----------------------------------------------------------------------------------
	Function:	outPut
	Overview:	outputs <td></td>'s with appropriate data in them
	
	In:		$type		string		value to be checked
	Out:		html		table data tag with correct information inside
	----------------------------------------------------------------------------------*/
	public function outPut($type)
	{
		if(!empty($type))
		{
			switch($type)
			{
				case 'yes':
					echo '<td class="yes">&#10003;</td>';
				break;
				case 'maybe':
					echo '<td class="maybe">&#10003;</td>';
				break;
				case 'no':
					echo '<td class="no">&#10008;</td>';
				break;
				case 'empty':
					echo '<td></td>';
				break;
			}
		}
		else
		{
			echo '<td>Insufficient Parameters Supplied</td>';
		}
	}
	
	/*----------------------------------------------------------------------------------
	Function:	checkFileExists
	Overview:	checks for single file 404 errors using cURL
	
	In:		$url		string		url of website to check
			$file		string		file to check for
	Out:		string 		yes or no depending on outcome of check
	----------------------------------------------------------------------------------*/
	public function checkFileExists($url, $file)
	{
		$ch = curl_init("http://$url/$file");    
		curl_setopt($ch, CURLOPT_NOBODY, true);
		curl_exec($ch);
		$httpstatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		
		$status = ($httpstatus == 200) ? 'yes' : 'no';
	
		return $status;
		
		curl_close($ch);
	}
	
	/*----------------------------------------------------------------------------------
	Function:	checkMultiFileExists
	Overview:	checks for multiple files 404 errors using cURL
	
	In:		$url		string		url of website to check
			$files		array		files to check for
	Out:		$final		array		filename and whether it was found
	----------------------------------------------------------------------------------*/
	public function checkMultiFileExists($url, $files)
	{
		$final = array();
		foreach($files as $f)
		{
			$ch = curl_init('http://'.$url.'/'.$f);    
			curl_setopt($ch, CURLOPT_NOBODY, true);
			curl_exec($ch);
			$httpstatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			
			$status = ($httpstatus == 200) ? 'yes' : 'no';
		
			$push = array('FILE' => $f, 'FOUND' => $status);
			
			array_push($final, $push);
		}
		return $final;
		
		curl_close($ch);
	}
	
	/*----------------------------------------------------------------------------------
	Function:	checkFileMultiContents
	Overview:	checks for multiple files contents using cURL
	
	In:		$url		string		url of website to check
			$search		array		strings to check in the file for
	Out:				string		yes or no depending on if search
							found in array
	----------------------------------------------------------------------------------*/
	public function checkFileMultiContents($url, $search)
	{
		$array = array();
		$ch = curl_init($url); 
			curl_setopt($ch, CURLOPT_URL, $url); 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
			$output = curl_exec($ch);
			foreach($search as $s)
			{
				$found = (strpos($output, $s) !== false ) ? 'yes' : 'no';
				array_push($array, $found);
			}
			if(in_array('yes', $array))
			{
				return 'yes';
			}
			else
			{
				return 'no';
			}
		curl_close($ch);
		
		
	}
	
	/*----------------------------------------------------------------------------------
	Function:	checkFileContents
	Overview:	checks a files contents using cURL
	
	In:		$url		string		url of website to check
			$search		string		string to check in the file for
	Out:		$found		string		yes or no depending if the search
							was found
	----------------------------------------------------------------------------------*/
	public function checkFileContents($url, $search)
	{
		$array = array();
		$ch = curl_init($url); 
			curl_setopt($ch, CURLOPT_URL, $url); 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
			$output = curl_exec($ch);
				$found = (strpos($output, $search) !== false ) ? 'yes' : 'no';
	
		curl_close($ch);
		return $found;	
	}
	
	/*----------------------------------------------------------------------------------
	Function:	checkFileContentsRegex
	Overview:	checks for multiple files contents using cURL and a Regex
	
	In:		$url		string		url of website to check
			$regex		string		regular expression to match
	Out:		$found		string		yes or no depending if regex match
	----------------------------------------------------------------------------------*/
	public function checkFileContentsRegex($url, $regex)
	{
		$ch = curl_init($url); 
			curl_setopt($ch, CURLOPT_URL, $url); 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
			$output = curl_exec($ch);
			if(preg_match($regex, $output) !== 0)
			{
				$found = 'yes';
			}
			else
			{
				$found = 'no';
			}
	
		curl_close($ch);
		return $found;	
	}
	
	/*----------------------------------------------------------------------------------
	Function:	checkFileContentsRegex
	Overview:	checks for multiple files contents using cURL and a Regex
	
	In:		$url		string		url of website to check
			$regex		string		regular expression to match
	Out:		$found		string		yes or no depending if regex match
	----------------------------------------------------------------------------------*/
	public function checkFileMultiContentsRegex($url, $regex)
	{
		$ch = curl_init('http://'.$url); 
			curl_setopt($ch, CURLOPT_URL, $url); 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
			$output = curl_exec($ch);
			$result = preg_match_all($regex, $output, $matches);
	
		curl_close($ch);
		return $matches;	
	}
	
	/*----------------------------------------------------------------------------------
	Function:	getHeaderParts
	Overview:	retreives a webpages headers using cURL
	
	In:		$url		string		url of website headers to retrieve
	Out:		$parts		array		array of header parts
	----------------------------------------------------------------------------------*/
	public function getHeaderParts($url)
	{
		$ch = curl_init("http://$url");
		curl_setopt($ch, CURLOPT_HEADER, true);
		curl_setopt($ch, CURLOPT_NOBODY, true);
		curl_setopt($ch, CURLOPT_HTTPGET, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$output = curl_exec($ch);
		
		$parts = explode("\r\n", $output);
	
		curl_close($ch);
		
		return $parts;
	
	}
	
	/*----------------------------------------------------------------------------------
	Function:	getPage
	Overview:	retreives a webpages content
	
	In:		$url		string		url of website headers to retrieve
	Out:		$output		string		html content of the page
	----------------------------------------------------------------------------------*/
	public function getPage($url)
	{
		$ch = curl_init("http://$url");
		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
		$output = curl_exec($ch);
		
		curl_close($ch);
		
		return $output;
	
	}
	
	/*----------------------------------------------------------------------------------
	Function:	checkPageExists
	Overview:	checks if a specified url does not return a 404 error
	
	In:		$url		string		url of website page to check
	Out:		$status		string		yes or no depending on the outcome
							of the check
	----------------------------------------------------------------------------------*/
	public function checkPageExists($url)
	{
		$ch = curl_init("http://$url");
		curl_setopt($ch,  CURLOPT_RETURNTRANSFER, TRUE);
		
		curl_exec($ch);
		
		$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		
		return $this->checkHTTPStatus($httpCode);
		/*if($httpCode == 404)
		{
			$status = 'yes';
		}
		else
		{
			$status = 'no';
		}*/
		
		curl_close($ch);
		//return $status;
	}
	
	/*----------------------------------------------------------------------------------
	Function:	checkHTTPStatus
	Overview:	checks if a specified http status isnt a 404 error
	
	In:		$status		string		status to check
	Out:		$status		bool		true or false depending on status
	----------------------------------------------------------------------------------*/
	private function checkHTTPStatus($status)
	{
		if($httpCode == 404)
		{
			$status = true;
		}
		else
		{
			$status = false;
		}
		return $status;
	}
	
}
?>
