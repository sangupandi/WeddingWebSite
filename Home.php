<?php
	include_once('Utils/DomManager.php');
	include_once('Utils/SessionManager.php');
	include_once('Widgets/User.php');
	include_once('Widgets/Songs.php');
	DomManager::addCSS('CSS/Body.css');
	DomManager::addCSS('CSS/Home.css');
	DomManager::addCSS('CSS/Strips.css');
	DomManager::addCSS('CSS/Widgets/Slider.css');
	DomManager::addCSS('CSS/Widgets/Songs.css');
	DomManager::addCSS('CSS/Widgets/WeddingParty.css');
	DomManager::addCSS('CSS/Widgets/WhereToStay.css');
	DomManager::addCSS('CSS/Widgets/PartyDetails.css');
	DomManager::addCSS('CSS/Widgets/WeddingPartyOval.css');
	DomManager::addCSS('CSS/Fonts/LavanderiaRegular.css');
	DomManager::addCSS('CSS/Fonts/KabelBook.css');
	DomManager::addCSS('CSS/Fonts/KabelMedium.css');
	DomManager::addScript('//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js');
	DomManager::addScript('Scripts/jquery.simplemodal.js');
	DomManager::addScript('Scripts/Widgets/Slider.js');
	DomManager::addScript('Scripts/Widgets/WeddingParty.js');
	DomManager::addScript('Scripts/Widgets/PartyDetails.js');
	DomManager::addScript('Scripts/Home.js');
	SessionManager::clearSession();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Emir & Laura</title>
		<link rel="shortcut icon" href="Files/Images/favicon.ico" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
		<?php echo DomManager::getCSS(); ?>		
	</head>
	<body>
		<div class="Menu  Center">
			<a href="#Strip_02">OUR STORY</a>
			<a href="#Strip_03">WEDDING PARTY</a>
			<a href="#Strip_04">THE DAY</a>
			<a href="#Strip_05">WHERE TO STAY</a>
			<a href="#Strip_06">RSVP</a>
			<a href="#Strip_07">SONG REQUESTS</a>
		</div>
		<div id="Strip_01" class="Strip Strip_01">
			<img class="BannerImage" src="Files/Images/monogram_png-24.png" />
		</div>
		<div id="Strip_02" class="Strip Strip_02 ">
 			<img class="BannerImage" src="Files/Images/ourstory.png" /> 
<!-- 			<div class="Banner">Our Story</div> -->
			<?php include('Widgets/Slider.php'); ?>
		</div>
		<div id="Strip_03" class="Strip Strip_03">
 			<img class="BannerImage" src="Files/Images/weddingparty.png" /> 
<!-- 			<div class="Banner">Wedding Party</div> -->
			<?php include('Widgets/WeddingParty.php'); ?>
			
		</div>
		<div id="Strip_04" class="Strip Strip_04">
 			<img class="BannerImage" src="Files/Images/theday.png" /> 
<!-- 			<div class="Banner">The Day</div> -->
			<?php include('Widgets/PartyDetails.php'); ?>
		</div>
		<div id="Strip_05" class="Strip Strip_05">
  			<img class="BannerImage" src="Files/Images/wheretostay.png" />  
<!-- 			<div class="Banner">Where to Stay</div> -->
			<?php include('Widgets/WhereToStay.php'); ?>
		</div>
		<div id="Strip_06" class="Strip Strip_06">
 			<img class="BannerImage" src="Files/Images/rsvp.png" /> 
<!-- 			<div class="Banner">Rsvp</div> -->
			<div class="Header3">
				WE HOPE YOU CAN SHARE IN OUR SPECIAL DAY
			</div>
			<?php if (!SessionManager::isLoggedIn()) :	?>
			<div class="Header3" class="ReplyCodeForm">
				<form id="ReplyCodeRSVP" >
					TO RSVP PLEASE ENTER YOUR REPLY CODE  <input class="Input" type="text">
					<input class="Button ReplyCodeButton" type="submit">
				</form>
			</div>
			<?php else : ?>
				<?php 
					echo User::getUsers(null);
					DomManager::addScript('Scripts/Widgets/User.js');
				?>
			<?php endif;?>
		</div>
		<div id="Strip_07" class="Strip Strip_07">
 			<img class="BannerImage" src="Files/Images/songrequests.png" /> 
<!-- 			<div class="Banner">Song Requests</div> -->
			<div class="Header3">
				HELP THE US BY SUGGESTING YOUR FAVOURITE TUNES
			</div>
			<?php if (!SessionManager::isLoggedIn()) :	?>
			<div class="Header3">
				<form id="ReplyCodeSongs" >
					TO RSVP PLEASE ENTER YOUR REPLY CODE <input class="Input" type="text">
					<input class="Button ReplyCodeButton" type="submit">
				</form>
			</div>
			<?php else : ?>
				<?php 
					echo Songs::getSongs(null, null, false);
					DomManager::addScript('Scripts/Widgets/Songs.js');
				?>
			<?php endif;?>
		</div>
	</body>
	<?php echo DomManager::getScripts(); ?>
</html>
