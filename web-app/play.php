<?php

require_once 'includes/db.php';	

$sql = $db->query('
	SELECT id, movie_title, release_date
	FROM movies
	ORDER BY movie_title ASC
');

// Display the last error created by our database
//var_dump($db->errorInfo());

$results = $sql->fetchAll();

?>



<!DOCTYPE HTML>
	<html>
	<head>
		<meta charset="utf-8">
		<title>Play</title>
		<link href="css/general.css" rel="stylesheet">
	</head>
	
	<body>
		
		<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=382875351767790";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>
		
		<header class="clearfix">
			<h1>Play..</h1>
			<nav>
				<ul>
					<li class="current"><a href="index.php">Home</a></li>
					<li><a href="about.php">About</a></li>
					<li><a href="play.php">Play</a></li>
				</ul>
			</nav>
		</header>
		
		<div class="main clearfix">
			<div class="game">

			
			
				<iframe src="labyrinth/index.html" name="labirinth" width="650" height="650" frameborder="0" scrolling="no" ><p>Your browser does not support iframes.</p> ></iframe>

				

			</div>
			
			<div id="right-side">
					
				<fieldset id="player"><legend>Player Info</legend>
						<p>Login to save your progress</p>
						
						<div class="fb-login-button" data-show-faces="true" data-width="100" data-max-rows="1"></div>
						
				</fieldset>
				<fieldset id="record"><legend>Total Records</legend>
					<dl>
						<dt id="time">Time</dt>
						<dt id="name">Name</dt>
						<?php foreach ($results as $movie) : ?>
							<dd id="data-1"><?php echo $movie['id']; ?></dd>
							<dd id="data-2"><?php echo $movie['movie_title']; ?></dd>
						<?php endforeach; ?>
					</dl>
				</fieldset>
				
			</div>
			
		</div>
		
		<footer>
			<p>2012. All Rights Reserved.</p>
		</footer>
		
		<script>
			sessionStorage.finalTime = 0;
			
			var checkFinalTime = setInterval(function () {

				if ('finalTime' in sessionStorage && sessionStorage.finalTime > 0) {
					console.log(sessionStorage.finalTime);
					clearTimeout(checkFinalTime);
				}
			}, 100);
		</script>
		
	</body>
</html>