<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale = 1.0, user-scalable = no">
	<title>Cool Kitten: A parallax scrolling responsive framework</title>
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
			<img src="images/logo.png">
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
			<h2>Get ready for the best week ever!</h2>
			<p>This is supposed to be a paragraph explaining what Tech Week is.</p>		
		</div>
		<div id="decorative" class="grid_5 omega">
			<img src="images/decorative.png">
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
			$events = $eb_client->event_search($search_params);

			//mark-up the list of events that were requested 
			// render in html - ?>
			<!-- <style type="text/css">
			.eb_event_list_item{
			  padding-top: 20px;
			}
			.eb_event_list_title{
	/*			  position: absolute;*/
	/*			padding-top: 10px;*/
	/*			margin-left: 10px;*/
	/*			  left: 220px;
			  width: 300px;*/
			  overflow: hidden;
			}
			.eb_event_list_date{
	/*			  padding-left: 20px;*/
			}
			.eb_event_list_time{
	/*			  position: absolute;*/
	/*			  left: 150px;*/
			}
			.eb_event_list_location{
	/*			  position: absolute;*/
	/*			  left: 520px;*/
			}
			</style> -->

			<!-- <h2>My Event List:</h2> -->
			<?= Eventbrite::eventList( $events, 'eventListRow'); ?>
			
			
			
			
		</div>
	
	</div>
</div>



<div class="slide" id="slide3" data-slide="3" data-stellar-background-ratio="0.5">
	<div class="container clearfix">
		
		<div id="content" class="grid_12">
			<h1>Grid</h1>
			<h2>See how the grid changes when you resize your screen</h2>
		</div>
		
		<div id="test" class="grid_1">1</div> <div id="test" class="grid_11 omega">11</div>
		<div id="test" class="grid_2">2</div> <div id="test" class="grid_10 omega">10</div>
		<div id="test" class="grid_3">3</div> <div id="test" class="grid_9 omega">9</div>
		<div id="test" class="grid_4">4</div> <div id="test" class="grid_8 omega">8</div>
		<div id="test" class="grid_5">5</div> <div id="test" class="grid_7 omega">7</div>
		<div id="test" class="grid_6">6</div> <div id="test" class="grid_6 omega">6</div>
		<div id="test" class="grid_7">7</div> <div id="test" class="grid_5 omega">5</div>
		<div id="test" class="grid_8">8</div> <div id="test" class="grid_4 omega">4</div>
		<div id="test" class="grid_9">9</div> <div id="test" class="grid_3 omega">3</div>
		<div id="test" class="grid_10">10</div> <div id="test" class="grid_2 omega">2</div>
		<div id="test" class="grid_11">11</div> <div id="test" class="grid_1 omega">1</div>
		<div id="test" class="grid_12">12</div>
		
		
	
	</div>
</div>



<div class="slide" id="slide4" data-slide="4" data-stellar-background-ratio="0.5">
	<div class="container clearfix">
		
		<div id="content" class="grid_12">
			<h1>Credits</h1>
			<h2>Alberta Tech Week is brought to you by AccelerateAB</h2>
			<!-- <p>Follow us on Twitter!</p> -->
			<a href="https://twitter.com/AccelerateAB" class="twitter-follow-button" data-show-count="false" data-size="large">Follow @AccelerateAB</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
			<!-- <p><a href="https://twitter.com/AccelerateAB" target="_blank"><img src="images/twitter.png"></a></p> -->
			<p><a href="http://www.eventbrite.com" target="_blank"><img src="images/eventbrite.png"></a></p>
		</div>
	
	</div>
</div>


</body>
</html>
