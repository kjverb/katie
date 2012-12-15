<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Katherine Verbeck's Portfolio</title>

	<!-- Place the HTML code for your CSS stylesheet here -->
	<link rel="stylesheet" href="styles/main.css" type="text/css" />
	<script type="text/JavaScript" src="javascript/raphael-min.js"></script> 

</head>
<body>
	<div id="body">
		<h1>Katherine Verbeck</h1>
		<div id="leftside">
			<img src="images/katie.png" width="300" alt="Katherine Verbeck" />
			<div id="navigation">
				<h2>Navigation</h2>
				<p class="sidenav">
					<a href="resume.pdf" class="sidenav">Resume</a><br />
					<a href="http://www.linkedin.com/profile/view?id=166312313" class="sidenav">LinkedIn</a><br />
					<a href="http://www.ragebaker.blogspot.com" class="sidenav">Blog</a><br />
					<a href="mailto:kjv26@cornell.edu" class="sidenav">Email Me</a>
				</p>
			</div>
		</div>
			<div id="rightside">
				<?php
					//function to print projects
					function printProject($array) {
						print("<div class=\"top\">".$array['name']."</div>");
						//print("<div class=\"middle\"><a href=".$array['imgURL']."><img src=\"".$array['imgURL']."\" height=\"107\" width=\"100%\" alt=\"". $array['name'] ."\" /></a></div>");
						//start create thumb
						echo "<div id=\"paper".$array['projectID']."\"></div>";
						echo "<script type=\"text/javascript\">
								var paper = Raphael(\"paper".$array['projectID']."\", 376,300);
								var rect1 = paper.rect(0, 0, 376, 300);
								var theImage = paper.image(\"".$array['imgURL']."\", 0, 0, 585, 511);
								var img2=theImage.attr({\"clip-rect\":\"0 0 376 300\"});
								img2.click(function(){
									alert(\"pop up\");
								});
							</script>";
						//end thumb
						print("<div class=\"bottom\">".$array['summary']."</div>");
						print("</div>");
					}
					
					include 'password.inc';
					
					$mysqli = new mysqli($host, $login, $password, $databaseName);
					//Check for errors, and only perform queries if there are none
					if ( mysqli_connect_error() ) {
						die("Can't connect to database: " . $mysqli->error);
					}
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
					$mysqli->close();
				?>
			</div><!--end rightside div -->
	</div>
</body>
</html>
