<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Katherine Verbeck's Portfolio</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0"/>

	<link rel="stylesheet" href="styles/fancystyle.css" />
	<link rel="stylesheet" href="styles/main.css" type="text/css" />
	<link rel="stylesheet" href="styles/mobile.css" type="text/css" media="only screen and (max-device-width: 480px), only screen and (max-width: 480px)" />
	<script type="text/JavaScript" src="javascript/raphael-min.js"></script> 
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
	<script>
		!window.jQuery && document.write('<script src="jquery-1.4.3.min.js"><\/script>');
	</script>
	<script type="text/javascript" src="./fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="./fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="./fancybox/jquery.fancybox-1.3.4.css" media="screen" />
	<script type="text/javascript">
		$(document).ready(function() {
			//fancybox prep
			for (var i=0;i<=7;i++){
				$("a[rel=group"+i+"]").fancybox({
					'transitionIn'	: 'elastic',
					'transitionOut'	: 'elastic',
					'titlePosition' 	: 'inside',
					'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
						return '<span id="fancybox-title-inside">'+ (title.length ? ' &nbsp; ' + title : '') + '</span>';
					}
				});
			}
		});
	</script>
</head>
<body>
	<div id="body">
		<h1>Katherine Verbeck</h1>
		<div id="leftside">
			<img id="mainpic" src="images/katie.png" width="80%" alt="Katherine Verbeck" />
			<div id="navigation">
				<p class="sidenav">
					<a href="resume.pdf" class="sidenav" target="_blank">Resume</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
					<a href="http://www.linkedin.com/profile/view?id=166312313" target="_blank" class="sidenav">LinkedIn</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
					<a href="http://www.ragebaker.blogspot.com" target="_blank" class="sidenav">Blog</a><br/>
					<a href="mailto:kjv26@cornell.edu" class="sidenav" style="margin-right:25%;font-weight:normal;font-variant:normal;font-size:15px">kjv26@cornell.edu</a>
				</p>
			</div>
		</div>
			<div id="rightside">
				<p id="sortProjects">
					Sort by: <a href="index.php?sort=projectID&type=ASC">Date Added</a> | <a href="index.php?sort=yearCompleted&type=ASC">Year Completed</a> | <a href="index.php?sort=name&type=ASC">A - Z</a> | <a href="index.php?sort=name&type=DESC">Z - A</a>
				</p>
				<?php
					//function to print projects
					function printProject($array) {
						print("<div class=\"top\">".$array['name']."</div>");
						//print("<div class=\"middle\"><a href=".$array['imgURL']."><img src=\"".$array['imgURL']."\" height=\"107\" width=\"100%\" alt=\"". $array['name'] ."\" /></a></div>");
						//start create thumb
						/*echo "<div id=\"paper".$array['projectID']."\"></div>";
						echo "<script type=\"text/javascript\">
								var paper = Raphael(\"paper".$array['projectID']."\", 376,300);
								var rect1 = paper.rect(0, 0, 376, 300);
								var theImage = paper.image(\"".$array['imgURL']."\", 0, 0, 585, 511);
								var img2=theImage.attr({\"clip-rect\":\"0 0 376 300\"});
								img2.click(function() {
									$.fancybox({
										'transitionIn'	: 'elastic',
										'transitionOut'	: 'elastic',
										'titlePosition' 	: 'inside',
										'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
											return '<img src=".$array['imgURL']." alt=".$array['name'].">';
										}
									});
								});
							</script>";*/
						//end thumb
						print("<div class=\"middle\"><a rel=\"group".$array['projectID']."\" href=".$array['imgURL']." title=\"".htmlentities($array['summary'])."\"><img src=\"".$array['imgURL']."\" height=\"250\" width=\"100%\" alt=\"". $array['name'] ."\" /></a></div>");
						//print("<div class=\"bottom\">".$array['summary']."</div>");
						print("</div>");
					}
					
					include 'password.inc';
					
					$mysqli = new mysqli($host, $login, $password, $databaseName);
					//Check for errors, and only perform queries if there are none
					if ( mysqli_connect_error() ) {
						die("Can't connect to database: " . $mysqli->error);
					}
					if(isset($_GET['sort']) && isset($_GET['type']) &&
						($_GET['sort']=="projectID" || $_GET['sort']=="yearCompleted" || $_GET['sort']=="name") &&
						($_GET['type']=="ASC" || $_GET['type']=="DESC")	) {
						$query1 = "SELECT * FROM project NATURAL JOIN projectSummary ORDER BY ".$_GET['sort'] . " " . $_GET['type'];
						$result = $mysqli->query($query1);
						//check projectID: if odd, start new row and print info in div class "left". If even, print info in div class "right"
						$i=0;
						while($array = $result->fetch_assoc() ){
							if ($i!=count($array)){
								if($i&1) {//if odd
									print("<div class=\"right\">");
									printProject($array);
								}else{//if even
									print("<div class=\"row\">");
									print("<div class=\"left\">");
									printProject($array);
								}
								$i++;
							}
						}
					} else {
						$query1 = "SELECT * FROM project NATURAL JOIN projectSummary ORDER BY projectID";
						$result = $mysqli->query($query1);
						//check projectID: if odd, start new row and print info in div class "left". If even, print info in div class "right"
						while($array = $result->fetch_assoc() ){
							if($array['projectID']&1) { //if odd
								print("<div class=\"row\">");
									print("<div class=\"left\">");
									printProject($array);
							}else{//if even
									print("<div class=\"right\">");
									printProject($array);
								print("</div>");
							}
						}
					}
					
					if(isset($_GET['sort']) && isset($_GET['type'])) {
						$query2 = "SELECT * FROM project NATURAL JOIN projectFiles ORDER BY ".$_GET['sort'] . " " . $_GET['type'];
					} else {
						$query2 = "SELECT * FROM project NATURAL JOIN projectFiles ORDER BY projectID";
					}
					$result2 = $mysqli->query($query2);
					//add other files to fancybox slideshow depending on projectID and file type **TODO: sort
					while($array2=$result2->fetch_assoc() ){
						if($array2['fileType'] == "img") {
							print("<div style=\"display:none\"><a rel=\"group".$array2['projectID']."\" 
									id=\"id".$array2['projectID']."f".$array2['fileID']."\" 
									href=".$array2['fileURL']." 
									title=\"".htmlentities($array2['fileTitle'])."\"><img src=\"".$array2['filePic']."\" width=\"100%\" alt=\"". $array2['fileTitle'] ."\" /></a></div>");
						} else if($array2['fileType'] == "pdf") {
							print("<div style=\"display:none\"><a rel=\"group".$array2['projectID']."\" 
									id=\"inline\" 
									href=\"#data\" 
									title=\"".htmlentities($array2['fileTitle'])."\"><div id=\"data\"><img width=\"100%\" src=\"images/paperclipart.gif\"/></div></a></div>");
						} else { //must be a video
							print("<div style=\"display:none\"><a rel=\"group".$array2['projectID']."\" 
									class=\"iframe\" 
									href=".$array2['fileURL']." 
									title=\"".htmlentities($array2['fileTitle'])."\"><img src=\"".$array2['filePic']."\" width=\"100%\" alt=\"". $array2['fileTitle'] ."\" /></a></div>");
						}
					}
					
					$mysqli->close();
				?>
			</div><!--end rightside div -->
	</div>
</body>
</html>
