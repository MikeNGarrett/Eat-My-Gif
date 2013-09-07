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
			<h1><a href="http://<?php echo $_SERVER['SERVER_NAME'].strtok($_SERVER["REQUEST_URI"],'?'); ?>" title="Return home">Eat My Gif</a></h1>
			<h6 class="loading">PEANUT BUTTER LOADING!</h6>
		</header>
			<?php
			$dir = "a/";
			$start = 0;
			$limit = 10;
			$page = 0;
			
			if ($_GET['page']) {
				$page = $_GET['page'];
				$start = $page * $limit;
			}
			
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
			
			
				// sort
				krsort($files);
				$x = 0;
				$total = count($files);
				if($start < $total) {
				?>
				<section id="container">
				<?php 
					foreach ($files as $file) {
						if ($x >= $start && $x < $start + $limit) {
							$lastModified = date('F d Y, H:i:s', filemtime($file));
							$info = getimagesize($file);
							print '<article class="item">';
							$time = filemtime($file);
							print '<header class="timestamp"><p>Added <time datetime="'.date('c', $time).'">'.date('F d Y, H:i:s', $time).'</time></p></header>';
							print '<figure><img src="'.$file.'" '.$info[3].' alt="gify goodness"></figure>';
							print '</article>';
						}
						$x++;
					}
				} else {
					print '<script type="text/javascript">$(function() { $("h6").remove(); });</script>';

					print '<section><article class="error"><p><strong>OH NOES!</strong> You&rsquo;ve seen everything! That&rsquo;s it! <em>CRAP!</em> <br><a href="mailto:hello@kernme.org" title="Get in touch with the Author">Poke Mike</a> and get him to add more.</p></article>';
				}
			}
			?>
		</section>
		<footer>
			<nav>
				<ul>
					<?php if($page > 0) { ?>
		 				<li class="prev"><a href="http://<?php echo $_SERVER['SERVER_NAME'].strtok($_SERVER["REQUEST_URI"],'?'); ?>?page=<?php echo $page-1; ?>" title="Previous Page">&laquo; LESS!</a></li>
		 			<?php } ?>
		 			<?php if($start + $limit < $total) { ?>
					<li class="next"><a href="http://<?php echo $_SERVER['SERVER_NAME'].strtok($_SERVER["REQUEST_URI"],'?'); ?>?page=<?php echo $page+1; ?>" title="Next Page">MOAR! &raquo;</a></li>
					<?php } ?>
				</ul>
			</nav>
			<p>Created with love by <a href="http://twitter.com/MikeNGarrett" title="Say hi to MikeNGarrett on Twitter">@MikeNGarrett</a></p>
		</footer>
	</body>
</html>
