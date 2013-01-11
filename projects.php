<p id="sortProjects">
	Sort by: <a href="javascript:void(0)" onclick="$('#rightside').load('projects.php?sort=projectID&type=ASC')">Date Added</a> | 
		<a href="javascript:void(0)" onclick="$('#rightside').load('projects.php?sort=yearCompleted&type=ASC')">Year Completed</a> | 
		<a href="javascript:void(0)" onclick="$('#rightside').load('projects.php?sort=name&type=ASC')">A - Z</a> | 
		<a href="javascript:void(0)" onclick="$('#rightside').load('projects.php?sort=name&type=DESC')">Z - A</a>
</p>
<div id="projectsList">
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
	<?php
		//function to print projects
		function printProject($array) {
			print("<div class=\"top\">".$array['name']."</div>");
			print("<div class=\"middle\"><a rel=\"group".$array['projectID']."\" href=".$array['imgURL']." title=\"".htmlentities($array['summary'])."\"><img src=\"".$array['imgURL']."\" alt=\"". $array['name'] ."\" /></a>");
			print("<div class=\"descdiv\"><p class=\"descriptionOfProject\">".$array['summary']."</p></div></div>");
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
						print("<div class=\"right\" id=\"project_".$array['projectID']."\">");
						printProject($array);
					}else{//if even
						print("<div class=\"row\">");
						print("<div class=\"left\" id=\"project_".$array['projectID']."\">");
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
</div>