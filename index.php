<?php
require_once('clsWebsiteChecker.php');
?>
<!DOCTYPE html>
<html>
	<head>
	<title> MD Web Solutions Website Checker</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	</head>
	<body>
		<div class="head">
			<h1 class="left">Website Checker</h1>
				<form class='right sitechooser' action='index.php' method='POST'>
					<input id="other" type="text" name="site" placeholder="webisitename.co.uk"/>
					<input class='button submit' type='submit' name='submit' value='Check Website' />
				</form>
		</div>
		<div class="wrapper">
			<div class="content">
				<div class='key'>
					<p>Key:</p>
					<p><span class='yes'>&#10003;</span> = Correct</p>
					<p><span class='maybe'>&#10003;</span> = Incorrect</p>
					<p><span class='no'>&#10008;</span> = Not Found</p>
				</div>
				<!-- ajax check data here -->
				<div class="checkcontent">
				<div class="loading">Checking site...</div>
				<p>Enter a url then the website checker will check the specified site for a sitemap.xml, favicon.ico and robots.txt all in the root directory</p>
				<script type="text/javascript">
					$(document).ready(function(){
						$.ajax({
							url: 'ajax/getcheckdata.php',
							type: 'POST',
							data: {
								'site': '<?php if($_POST) {echo 'http://'.$_POST['site'];} ?>'
							},
							complete: function (data)
							{
								$('.loading').hide();
							},
							success: function(data)
							{
								$('.loading').hide();
								$('.checkcontent').html(data);
								$('.imagecheck').show();
								$('.statcheck').show();
								$('.sitemapcheck').show();
								$('.sitemap').show();
							},
							error: function(data)
							{
								$('.loading').html("Unable to load data");
							}
						});	
					});
				</script>
				</div>
				<!-- end of check data -->
				<!-- ajax image data here -->
				<div class='imagedata'>
					<div class="loading5" style='display: none; margin-bottom: 10px; text-align:center;'>Checking Images....</div>
					<div class='button imagecheck' style='display: none; margin-bottom: 10px;'>Check Images</div>
					<script type="text/javascript">
						$('.imagecheck').click(function(){
							$('.imagecheck').hide();
							$('.loading5').show();
							$.ajax({
								url: 'ajax/imagechecker.php',
								type: 'POST',
								data: {
									'site': '<?php if($_POST) {echo 'http://'.$_POST['site'];}?>'
								},
								complete: function (data)
								{
									$('.loading5').hide();
								},
								success: function(data)
								{
									$('.loading5').hide();
									$('.imagedata').html(data);
								},
								error: function(data)
								{
									$('.loading5').html("Unable to load data");
								}
							});
						});
					</script>
				</div>
				<!-- end of image data -->
				<!-- ajax sitemap data here -->
				<div class='sitemapdata'>
					<div class="loading3" style='display: none; margin-bottom: 10px; text-align:center;'>Checking pages...</div>
					<div class='button sitemapcheck' style='display: none; margin-bottom: 10px;'>Check Links</div>
					<script type="text/javascript">
						$('.sitemapcheck').click(function(){
							$('.sitemapcheck').hide();
							$('.loading3').show();
							$.ajax({
								url: 'ajax/checksitemap.php',
								type: 'POST',
								data: {
									'site': '<?php if($_POST) {echo 'http://'.$_POST['site'];}?>'
								},
								complete: function (data)
								{
									$('.loading3').hide();
								},
								success: function(data)
								{
									$('.loading3').hide();
									$('.sitemapdata').html(data);
								},
								error: function(data)
								{
									$('.loading3').html("Unable to load data");
								}
							});
						});
					</script>
				</div>
				<!-- end of sitemap data -->

				<!-- ajax stat data here -->
				<div class='statdata'>
					<div class="loading2" style='display: none; margin-bottom: 10px; text-align:center;'>Calculating statistics...</div>
					<div class='button statcheck' style='display: none; margin-bottom: 10px;'>View Stats</div>
					<script type="text/javascript">
						$('.statcheck').click(function(){
							$('.statcheck').hide();
							$('.loading2').show();
							$.ajax({
								url: 'ajax/getstats.php',
								type: 'POST',
								data: {
									'site': '<?php if($_POST) {echo 'http://'.$_POST['site'];} ?>'
								},
								complete: function (data)
								{
									$('.loading2').hide();
								},
								success: function(data)
								{
									$('.loading2').hide();
									$('.statdata').html(data);
								},
								error: function(data)
								{
									$('.loading2').html("Unable to load data");
								}
							});
						});
					</script>
				</div>
				<!-- end of stat data -->
				
				<!-- ajax sitemap download here -->
				<!--<div class='sitemapxml'>
					<div class='button sitemap' style='display: none; margin-bottom: 10px;'>Update Sitemap</div>
					<div class="loading4" style='display: none; margin-bottom: 10px; text-align:center;'>Creating updated sitemap....</div>
					<script type="text/javascript">
						$('.sitemap').click(function(){
							$('.sitemap').hide();
							$('.loading4').show();
							$.ajax({
								url: 'ajax/createsitemap.php',
								type: 'POST',
								data: {
									'site': '<?php if($_POST) {echo 'http://'.$_POST['site'];} ?>'
								},
								complete: function (data)
								{
									$('.loading4').hide();
								},
								success: function(data)
								{
									$('.loading4').hide();
									$('.sitemapxml').html(data);
								},
								error: function(data)
								{
									$('.loading4').html("Unable to load data");
								}
							});
						});
					</script>
				</div>->>
				<!-- end of sitemap download -->
			</div>
		</div>
		<div class='footer'>
			<p class='right'>Made by Ben Short</p>
		</div>
	</body>

</html>
<!--                                                                                                      
              ,,                                                                                                        
      db      db                         `7MMF'     A     `7MF'                                                   OO OO 
     ;MM:                                  `MA     ,MA     ,V                                                     88 88 
    ,V^MM.  `7MM  ,6"Yb.  `7M'   `MF'       VM:   ,VVM:   ,V ,pW"Wq.   ,pW"Wq.   ,pW"Wq.   ,pW"Wq.   ,pW"Wq.      || || 
   ,M  `MM    MM 8)   MM    `VA ,V'          MM.  M' MM.  M'6W'   `Wb 6W'   `Wb 6W'   `Wb 6W'   `Wb 6W'   `Wb     || || 
   AbmmmqMA   MM  ,pm9MM      XMX            `MM A'  `MM A' 8M     M8 8M     M8 8M     M8 8M     M8 8M     M8     `' `' 
  A'     VML  MM 8M   MM    ,V' VA.           :MM;    :MM;  YA.   ,A9 YA.   ,A9 YA.   ,A9 YA.   ,A9 YA.   ,A9     ,, ,, 
.AMA.   .AMMA.MM `Moo9^Yo..AM.   .MA.          VF      VF    `Ybmd9'   `Ybmd9'   `Ybmd9'   `Ybmd9'   `Ybmd9'      db db 
           QO MP                                                                                                        
           `bmP                                                                                                         
-->