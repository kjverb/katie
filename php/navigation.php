<div id="leftside">
	<img src="images/everest.jpg" height="353" width="390" alt="My Cat" />
	<h2>Navigation</h2>
	<p>
	<?php
		$pages = array("Student Information" => "studentinfo.php", "Extracurricular Interests" => "extracurriculars.php", "Other Hobbies" => "hobbies.php", "Portfolio" => "portfolio.php", "Contact Me" => "contact.php");
		
		foreach ($pages as $pagename => $pageurl) {
			if ($pageurl == $currentpage) {
				print("<span class=\"clicked\">$pagename</span><br />");
			} else {
				print("<a href=\"$pageurl\" class=\"sidenav\">$pagename</a><br />");
			}
		}
	?>
	</p>
	
</div>