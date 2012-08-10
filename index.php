<?php

require_once 'includes/db.php';	

$sql = $db->query('
	SELECT time, name, id
	FROM web_app
	ORDER BY time ASC
	LIMIT 15
');

// Display the last error created by our database
//var_dump($db->errorInfo());

$results = $sql->fetchAll();

?>

<!DOCTYPE HTML>
	<html>
	<head>
		<meta charset="utf-8">
		<title>Labyrinth</title>
		<link href="css/general.css" rel="stylesheet">
	</head>
	
	<body>
	
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=382875351767790";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>
		
		<header class="clearfix">
			<h1>Labyrinth..</h1>
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
				<p>Game Area</p>
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
							<?php foreach ($results as $web_app) : ?>
							<dd id="data-1"><?php echo $web_app['time']; ?></dd>
							<dd id="data-2"><?php echo $web_app['name']; ?></dd>
						<?php endforeach; ?>
						</dl>
					</fieldset>
			</div>
			
			
		</div>
		
		<footer>
			<p>2012. All Rights Reserved.</p>
		</footer>
		
		
	</body>
</html>
