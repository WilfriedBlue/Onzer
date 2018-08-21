<!DOCTYPE html	>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>Audio Player: Responsive &amp; Touch-Friendly</title>
		<meta name="description" content="Responsive &amp; Touch-Friendly Audio Player" />
		<link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro.min.css">
		<link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-colors.min.css">
		<link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-rtl.min.css">
		<link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-icons.min.css">
		<link rel="stylesheet" href="onzer.css">
		<script src="onzer.js"></script>
   	 	

		
		<script>
		
			(function(doc){var addEvent='addEventListener',type='gesturestart',qsa='querySelectorAll',scales=[1,1],meta=qsa in doc?doc[qsa]('meta[name=viewport]'):[];function fix(){meta.content='width=device-width,minimum-scale='+scales[0]+',maximum-scale='+scales[1];doc.removeEventListener(type,fix,true);}if((meta=meta[meta.length-1])&&addEvent in doc){fix();scales=[.25,1.6];doc[addEvent](type,fix,true);}}(document));
		</script>
	</head>
	<body>
	<h1 class="text-center">ONZER</h1>
    <h3 class="text-center">Vos envies, votre musique</h3>
    <div data-role="cube"></div>

        <?php
include("co.php");

$id_music=1;
$music = $bdd->prepare('SELECT * FROM music WHERE id = ?');
$music->execute(array($id_music));
$reqmusic = $music->fetch();
{
    ?>
<audio id = "player"
	   data-role="audio"
	   data-loop-icon="<span class='mif-loop2 fg-orange'></span>"
       data-mute-icon="<span class='mif-volume-mute2 fg-red'></span>"
       data-volume-low-icon="<span class='mif-volume-low fg-yellow'></span>"
       data-volume-medium-icon="<span class='mif-volume-medium fg-green'></span>"
       data-volume-high-icon="<span class='mif-volume-high fg-red'></span>"
	   data-play-icon="<img src='play.png'>"
	   data-stop-icon="<img src='stop.png'>"
	   >
<source src="<?php echo $reqmusic['url_music'] ?>" type="audio/mpeg">
</audio>


<div class="d-flex flex-justify-center mt-4">
    
    <button class="button m-1" onclick="stepperMethod('prev')">Precedent</button>
    <button class="button m-1" onclick="audioSuivant">Suivant</button>
    
</div>

<script>
    function stepperMethod (m){
        var stepper = $("#stepper_methods").data('stepper');
        stepper[m]();
    }
</script>

<script>
var suivante = id_music + 1;
var audioSuivant = document.getElementById("player"); audio.addEventListener("ended", function() { 
	 audio.src = suivante; audio.play(); }); 

</script>


<?php

}
?>


		
			<script>$( function() { $( 'audio' ).audioPlayer(); } );</script>

			<div class="attribution">
			
			</div>
		</div>

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.metroui.org.ua/v4/js/metro.min.js"></script>
	</body>
</html>