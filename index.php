<?php
/*
	Eat My Gif

	Copyright (c) 2013, MikeNGarrett >> See bottom for license
	Github: https://github.com/MikeNGarrett

==================================================

Where are you going to put your gifs?
For example if this file is in http://domain.com/gifs and $dir is set to "a/" we'll look in http://domain.com/gifs/a/ for your gifs.
*/
$dir = "a/";

/* Which file do you want to start with? I'm going to assume you want to start at the beginning. */
$start = 0;

/* How many gifs do you want to show per page? I like 10. You should give it a try. */
$limit = 10;

/* Which page do you want to start on? I'm going to also assume you want to start at the first page. */
$page = 0;

/* Twitter username. I'm using this because it's the easiest way to get in touch "anonymously." */
$twitter = "MikeNGarrett";

// Pagination check
if ($_GET['page']) {
	$page = $_GET['page'];
	$start = $page * $limit;
}

// Look through files and get all gifs with modified dates and stick it in an array
$files = array();
if ($handle = opendir($dir)) {
	while (false !== ($file = readdir($handle))) {
		if ($file != "." && $file != "..") {
			if (filetype($dir.$file) == 'file') {
				if (pathinfo($dir.$file, PATHINFO_EXTENSION) == 'gif') {
					$files[filemtime($dir.$file)] = $dir.$file;
				}
			}
		}
	}
	closedir($handle);
	$total = count($files);
}

// Let's make sure you actually have some files
if (count($files) > 0) {
	// sort
	krsort($files);
	$x = 0;
	if ($start < $total) {
		$output = '';
		foreach ($files as $file) {
			if ($x >= $start && $x < $start + $limit) {
				$theId = 'container';
				$lastModified = date('F d Y, H:i:s', filemtime($file));
				$info = getimagesize($file);
				$output .= '<article class="item">';
				$time = filemtime($file);
				$output .= '<header class="timestamp"><p>Added <time datetime="'.date('c', $time).'">'.date('F d Y, H:i:s', $time).'</time></p></header>';
				$output .= '<figure><img src="'.$file.'" '.$info[3].' alt="gify goodness"></figure>';
				$output .= '</article>';
			}
			$x++;
		}
	} else {
		$theId = 'errorContainer';
		$output = '<script type="text/javascript">$(function() { $("h6").remove(); });</script>';
		$output .= '<article class="error"><p><strong>OH NOES!</strong> You&rsquo;ve seen everything! That&rsquo;s it! <em>CRAP!</em> <br><a href="http://twitter.com/'.$twitter.'" title="Get in touch with the Author">Poke Mike</a> and get him to add more.</p></article>';
	}
} else {
	$theId = 'errorContainer';
	$output = '<script type="text/javascript">$(function() { $("h6").remove(); });</script>';
	$output .= '<article class="error"><p><strong>WHOOPS</strong> There aren&raquo;t any files to show. Try adding some files to '.$_SERVER['SERVER_NAME'].strtok($_SERVER["REQUEST_URI"], '?').$dir.'</p></article>';
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Eat My Gif - Building a Peanut-Buttery Future</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<script type="text/javascript" src="//cdn.jsdelivr.net/jquery/2.0.3/jquery-2.0.3.min.js"></script>
		<script type="text/javascript" src="//cdn.jsdelivr.net/isotope/1.5.25/jquery.isotope.min.js"></script>
		<style type="text/css">
			/* http://meyerweb.com/eric/tools/css/reset/ v2.0 | 20110126 License: none (public domain) Modified for Eat My Gif */
			html, body, div, span, h1, h2, h3, h4, h5, h6, p, a, img, small, strike, strong, ol, ul, li, article, footer, header, section, time, figure {
				margin: 0;
				padding: 0;
				border: 0;
				font-size: 100%;
				font: inherit;
				vertical-align: baseline;
			}
			/* HTML5 display-role reset for older browsers */
			article, footer, header, section, figure {
				display: block;
			}
			body {
				line-height: 1;
			}
			ol, ul {
				list-style: none;
			}
			body {
				margin: 50px;
				font-family: "Myriad Pro", Arial, sans-serif;
				font-size: 14px;
				line-height: 1.4;
			}
			strong {
				font-weight: 700;
			}
			img {
				min-width: 150px;
				min-height: 150px;
			}
			h1 {
				font-size: 24px;
				margin: 20px 0 40px 0;
				line-height: 1.6;
			}
			.page {
				background: #CCC;
				color: #000;
				padding: 10px;
				margin-bottom: 20px;
				text-align: center;
			}
			footer nav {
				display: block;
				overflow: auto;
				clear: both;
				margin: 30px 0;
			}
			footer nav li a {
				font-size: 20px;
				background: #000;
				color: #FFF;
				padding: 10px 20px;
				text-decoration: none;
				text-align: center;
				line-height: 2;
				text-decoration: none;
			}
			footer nav li a:hover {
				background: #3e3e3e;
				color: #FFF;
				text-decoration: none;
			}
			footer nav li a:active {
				background: #FFF;
				color: #000;
				text-decoration: none;
			}
			footer nav li.next {
				float: right;
			}
			footer nav li.prev {
				float: left;
			}
			.isotope-item {
			  z-index: 2;
			}
			.timestamp {
				position: absolute;
				bottom: 0;
				right: 0;
				padding: 4px 10px;
				background: rgba(255,255,255,0.8);
				font-size: 12px;
				font-weight: 700;
				line-height: 1.6;
			}
			.error p{
				background: #dd0000;
				color: #FFF;
				font-size: 20px;
				padding: 20px;
			}
			.error a {
				color: #FFF;
			}

		</style>
		<script type="text/javascript">
			$(function() {
				$('#container').isotope({
				  itemSelector : '.item',
				}, function() {
					$('h6').remove();
				});
			});
		</script>
	</head>

	<body>
		<header>
			<h1><a href="http://<?php echo $_SERVER['SERVER_NAME'].strtok($_SERVER["REQUEST_URI"], '?'); ?>" title="Return home">Eat My Gif</a></h1>
			<h6 class="loading">PEANUT BUTTER LOADING!</h6>
			<p class="page">Items <?php print $start.'-'.($start+$limit).' of '.$total; ?></p>
		</header>
		<section id="<?php echo $theId; ?>">
			<?php print $output; ?>
		</section>
		<footer>
			<nav>
				<ul>
					<?php if ($page > 0) { ?>
						<li class="prev"><a href="http://<?php echo $_SERVER['SERVER_NAME'].strtok($_SERVER["REQUEST_URI"], '?'); ?>?page=<?php echo $page-1; ?>" title="Previous Page">&laquo; LESS!</a></li>
					<?php } ?>
					<?php if ($start + $limit < $total) { ?>
					<li class="next"><a href="http://<?php echo $_SERVER['SERVER_NAME'].strtok($_SERVER["REQUEST_URI"], '?'); ?>?page=<?php echo $page+1; ?>" title="Next Page">MOAR! &raquo;</a></li>
					<?php } ?>
				</ul>
			</nav>
			<p>Created with love by <a href="http://twitter.com/<?php echo $twitter; ?>" title="Say hi to <?php echo $twitter; ?> on Twitter">@<?php echo $twitter; ?></a></p>
		</footer>
	</body>
</html>
<?php
/*
	Literally the Simplified BSD License

	All rights reserved.

	Redistribution and use in source and binary forms, with or without
	modification, are permitted provided that the following conditions are met:

	1. Redistributions of source code must retain the above copyright notice, this
	   list of conditions and the following disclaimer.
	2. Redistributions in binary form must reproduce the above copyright notice,
	   this list of conditions and the following disclaimer in the documentation
	   and/or other materials provided with the distribution.

	THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
	ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
	WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
	DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR
	ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
	(INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
	LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
	ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
	(INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
	SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.

	The views and conclusions contained in the software and documentation are those
	of the authors and should not be interpreted as representing official policies,
	either expressed or implied, of Mike Garrett.
*/
?>