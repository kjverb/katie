<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Katherine Verbeck's Portfolio</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0"/>

	<link rel="stylesheet" href="styles/fancystyle.css" />
	<link rel="stylesheet" href="styles/main.css" type="text/css" />
	<script>
		if(document.cookie != null) {
			var styleFile = document.cookie.substr(6,document.cookie.length-1) + ".css";
		} else {
			var styleFile = "main.css";
		}
		document.writeln('<link rel="stylesheet" type="text/css" href="styles/' + styleFile + '">');
	</script>

	<link rel="stylesheet" href="styles/mobile.css" type="text/css" media="only screen and (max-device-width: 480px), only screen and (max-width: 480px)" />
	<script type="text/JavaScript" src="javascript/raphael-min.js"></script> 
	<script type="text/JavaScript" src="javascript/jquery-1.8.3.min.js"></script> 
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
	<script>
		!window.jQuery && document.write('<script src="jquery-1.4.3.min.js"><\/script>');
	</script>
	<script type="text/javascript" src="./fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="./fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="./fancybox/jquery.fancybox-1.3.4.css" media="screen" />
	<!--<script type="text/javascript">
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
	</script>-->
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
				<p id="stylePicker"><span id="styleTitle">Style:</span><br />
					<a href="javascript: document.cookie='style=main'; window.location.reload();">Default</a><br />
					<a href="javascript: document.cookie='style=largeProjectTheme'; window.location.reload();">Large Projects</a><br />
					<a href="javascript: document.cookie='style=colorful'; window.location.reload();">Joined by Descriptions</a>
				</p>
			</div>
		</div>
		<div id="rightside">
			<?php
				include "projects.php";
			?>
		</div>
	</div>
</body>
</html>
