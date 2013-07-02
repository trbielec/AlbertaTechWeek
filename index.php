<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale = 1.0, user-scalable = no">
	<title>Alberta Tech Week 2013</title>
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="css/grid.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/normalize.css" type="text/css" media="screen">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/js.js"></script>
	<script type="text/javascript" src="js/jquery.stellar.min.js"></script>
	<script type="text/javascript" src="js/waypoints.min.js"></script>
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-40112391-1', 'albertatechweek.com');
	  ga('send', 'pageview');

	</script>
</head>

<body>

<div class="menu">	
	<div class="container clearfix">

		<div id="logo" class="grid_3">
			<a href="index.php"><img src="images/logo.png"></a>
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
			<!-- <p>This site is the hub of all events, meetups, socials, and hackathons.</p>-->
			
			
			<p>After the explosive growth of <a href="http://accelerateab.com/">AccelerateAB</a> over the past two years, Alberta Tech Week has been created as a banner to capture all of the amazing events, meet-ups, parties and workshops taking place during ten intense days in July. Alberta Tech Week is a celebration of all things tech related in our amazing province and we're putting a call out to anyone that wants to add to the festivities. <a href="about.html">More...</a></p> 
			
			<p>Start your own meetup, host a party, plan a run along the river. It's going to be an insanely busy week and we're excited to see all the great events that you've planned!</p>
			<div id='hashtag'>#abtw2013</div>
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
			<h1>Eventbrite Events</h1>
			<?php
				// load the API Client library
				include "Eventbrite.php";

				if (file_exists('eventbrite.data')) {
				    $eb_data = unserialize(file_get_contents('eventbrite.data'));
				    if ($eb_data['timestamp'] > time() - 2 * 60) { // Cache is 2 mins
				        $events = $eb_data['events'];
				    }
				}
				if (!$events) { // cache doesn't exist or is older than 2 mins
				    // Initialize the API client
					//  Eventbrite API / Application key (REQUIRED)
					//   http://www.eventbrite.com/api/key/
					//  Eventbrite user_key (OPTIONAL, only needed for reading/writing private user data)
					//   http://www.eventbrite.com/userkeyapi
					$authentication_tokens = array('app_key'  => 'Q7CJKJDPCRV6WRHAZK');
					$eb_client = new Eventbrite( $authentication_tokens );

					// For more information about the features that are available through the Eventbrite API, 
					// see http://developer.eventbrite.com/doc/
					// $search_params = array(
					// 			  'date' => 'This Week',
					// 			  'city' => 'Calgary',
					// 			  'region' => 'AB',
					// 			  'country' => 'CA'
					// 			);

					$search_params = array(
					  'keywords' => '#abtw2013',
					  'sort_by' => 'date'
					);
					$events = $eb_client->event_search($search_params);
				    $eb_data = array ('events' => $events, 'timestamp' => time());
				    file_put_contents('eventbrite.data', serialize($eb_data));
				} 
			?>
			<?= Eventbrite::eventList( $events, 'eventListRow'); ?>
		</div>
			
		<div id="content" class="grid_12">
			<h1>Meetup Events</h1>
			<?php
			require 'meetup.php';
			if (file_exists('meetup.data')) {
			    $m_data = unserialize(file_get_contents('meetup.data'));
			    if ($m_data['timestamp'] > time() - 2 * 60) { // Cache is 2 mins
			        $events = $m_data['events'];
			    }
			}
			if (!$events) { // cache doesn't exist or is older than 2 mins
				$meetup = new Meetup(array(
				    'key' => '5f502f351c2654a3a107464dc4c35'
				));
			
				date_default_timezone_set('UTC');
			
				$events = $meetup->getOpenEvents(array(
				    'state' => 'ab',
					'city' => 'Calgary',
					'country' => 'ca',
					'text' => 'startup', //#abtw2013
					'time' => '1373004000000,1373867999000'
				));
			    $m_data = array ('events' => $events, 'timestamp' => time());
				    file_put_contents('meetup.data', serialize($m_data));
			}
			foreach ($events as $m_event) {
				echo "<div id='evnt_div_1' class=\"grid_7\"><a class='eb_event_list_title' target=_blank href='".$m_event->event_url."'>".$m_event->name."</a><br><span class='eb_event_list_location'>" . $m_event->venue->name . "</span></span></div>
		<div id='evnt_div_2' class=\"grid_5 omega\" align='right'><span class='eb_event_list_date'>" .strftime('%a, %B %e', ($m_event->time + $m_event->utc_offset)/1000). ", </span><span class='eb_event_list_time'>" .strftime('%l:%M %p', ($m_event->time + $m_event->utc_offset)/1000)."</span></div>\n\n";
			}
			?>
		</div>
	
	</div>
</div>



<div class="slide" id="slide3" data-slide="3" data-stellar-background-ratio="0.5">
	<div class="container clearfix">
		
		<div id="content" class="grid_12">
			<h1>Submit an Event</h1>
			<h2>Do you have a tech-related event during this week? </h2>
			<p>Just create an Eventbrite event, add #abtw2013 to the event description, and it will be showcased on this page! </p>
			<h2><a href="https://www.eventbrite.ca/signup?referrer=/create" target=_blank>Create an event</a></h2>
		</div>
		
	</div>
</div>



<div class="slide" id="slide4" data-slide="4" data-stellar-background-ratio="0.5">
	<div class="container clearfix">
		
		<div id="content" class="grid_12">
			<h1>Credits</h1>
			<div id="brought2u"><h2 align='center'>Alberta Tech Week is brought to you by</h2></div>
			<!-- <p>Follow us on Twitter!</p> -->
			
			<div id='credit_1' align='center' class="grid_4 omega">
			<p align='center'><a href="http://accelerateab.com/" target="_blank"><img src="images/ACC_AB.jpg"></a></p></div>
			
			<div id='credit_2' align='center' class="grid_4 omega"><a href="http://www.eventbrite.com" target="_blank"><img src="images/eventbrite.png"></a></div>
			
			<div id='credit_3' align='center' class="grid_4 omega"><!-- <h2 align='center'>Design by</h2> -->
			<p align='center'><a href="http://www.ownthenight.co" target="_blank"><img src="images/OwnTheNight-icon.png"></a></p></div>
			
			<div id='credit_4' align='center' class="grid_4 omega">
			<p align='center'><a href="http://boastcapital.com/" target="_blank"><img src="images/BoastCapital.png"></a></p></div>
		</div>
	
	</div>
</div>


</body>
</html>
