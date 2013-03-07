<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale = 1.0, user-scalable = no">
	<title>Alberta Tech Week 2013</title>
	<link rel="stylesheet" href="css/grid.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/normalize.css" type="text/css" media="screen">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/js.js"></script>
	<script type="text/javascript" src="js/jquery.stellar.min.js"></script>
	<script type="text/javascript" src="js/waypoints.min.js"></script>
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
</head>

<body>

<div class="menu">	
	<div class="container clearfix">

		<div id="logo" class="grid_3">
			<img src="images/logo2.png">
		</div>
		
		<div id="nav" class="grid_9 omega">
			<ul class="navigation">
				<li data-slide="1">About</li>
				<li data-slide="2">Events</li>
				<li data-slide="3">Submit an Event</li>
				<li data-slide="4">Credits</li>
			</ul>
		</div>
	
	</div>
</div>


<div class="slide" id="slide1" data-slide="1" data-stellar-background-ratio="0.5">
	<div class="container clearfix">
		
		<div id="content" class="grid_7">
			<h1>Alberta Tech Week</h1>
			<h2>10 full days of technology</h2>
			<p>This site is the hub of all events, meetups, socials, and hackathons.</p>		
		</div>
		<div id="decorative" class="grid_5 omega">
			<img src="images/calendar.png">
			<div id="caption" align="center"><h2>July 5-14th, 2013</h2></div>
		</div>
	
	</div>
</div>



<div class="slide" id="slide2" data-slide="2" data-stellar-background-ratio="0.5">
	<div class="container clearfix">
		
		<div id="content" class="grid_12">
			<h1>Events</h1>
			<?php
			// load the API Client library
			include "Eventbrite.php"; 


			// Initialize the API client
			//  Eventbrite API / Application key (REQUIRED)
			//   http://www.eventbrite.com/api/key/
			//  Eventbrite user_key (OPTIONAL, only needed for reading/writing private user data)
			//   http://www.eventbrite.com/userkeyapi
			$authentication_tokens = array('app_key'  => 'Q7CJKJDPCRV6WRHAZK');
			$eb_client = new Eventbrite( $authentication_tokens );


			// For more information about the features that are available through the Eventbrite API, see http://developer.eventbrite.com/doc/
			$search_params = array(
			  'date' => 'This Week',
			  'city' => 'Calgary',
			  'region' => 'AB',
			  'country' => 'CA'
			);
			$events = $eb_client->event_search($search_params); ?>

			
			<?= Eventbrite::eventList( $events, 'eventListRow'); ?>			
			
			
		</div>
	
	</div>
</div>



<div class="slide" id="slide3" data-slide="3" data-stellar-background-ratio="0.5">
	<div class="container clearfix">
		
		<div id="content" class="grid_12">
			<h1>Submit an Event</h1>
			<h2>Do you have a tech-related event during this week? </h2>
			<p>Post it here!</p>
		</div>
		
	</div>
</div>



<div class="slide" id="slide4" data-slide="4" data-stellar-background-ratio="0.5">
	<div class="container clearfix">
		
		<div id="content" class="grid_12">
			<h1>Credits</h1>
			<div id="brought2u"><h2 align='center'>Alberta Tech Week is brought to you by</h2></div>
			<!-- <p>Follow us on Twitter!</p> -->
			<div id='credit_1' align='center' class="grid_4"><h2>AccelerateAB<h2><div id='accelerateab'><a href="https://twitter.com/AccelerateAB" class="twitter-follow-button" data-show-count="false" data-size="large">Follow @AccelerateAB</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></div></div>
			<!-- <p><a href="https://twitter.com/AccelerateAB" target="_blank"><img src="images/twitter.png"></a></p> -->
			<div id='credit_2' align='center' class="grid_3"><a href="http://www.eventbrite.com" target="_blank"><img src="images/eventbrite.png"></a></div>
			<div id='credit_3' align='center' class="grid_4"><h2 align='center'>Design by</h2>
			<p align='center'><a href="http://www.ownthenight.co" target="_blank"><img src="images/OwnTheNight.png"></a></p></div>
		</div>
	
	</div>
</div>


</body>
</html>
