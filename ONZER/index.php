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
</head>

<body>

<?php
							include("co.php");

							$musicQuery = $bdd->prepare('SELECT * FROM music');
							$musicQuery->execute();
							$musics = $musicQuery->fetchAll();

							{
								?>

	<h1 class="text-center">ONZER</h1>
	<h3 class="text-center">Vos envies, votre musique</h3>

<!-- LOGO SITE !-->
	<div id="cube">
	<div data-role="cube"></div>
	</div>

	<!-- TEST AFFICHAGE POCHETTE -->
	<div id="pochette">
	<img src= <?php echo $musics[0]['url_pochette'] ?>>
	</div>	
	

		<!-- Lecteur auduO -->
		<audio id="player" 
			data-role="audio" 
			data-loop-icon="<span class='mif-loop2 fg-orange'></span>" 
			data-mute-icon="<span class='mif-volume-mute2 fg-red'></span>"
			data-volume-low-icon="<span class='mif-volume-low fg-yellow'></span>" 
			data-volume-medium-icon="<span class='mif-volume-medium fg-green'></span>"
			data-volume-high-icon="<span class='mif-volume-high fg-red'></span>" 
			data-play-icon="<img src='images/play.png'>" 
			data-stop-icon="<img src='images/stop.png'>"
		    src="<?php echo $musics[0]['url_music'] ?>" data-index="0">
		</audio>


		<!-- boutons repeat suivant et précedent -->
		<div class="d-flex flex-justify-center mt-4">

			<button class="button m-1" onclick= "playNextSongOnClick('previous')"><img src='images/previous.jpeg'> </button>
			<button class="button m-1" onclick= "playNextSongOnClick('next')"><img src='images/next.png'></button>
			<button class="button m-1" onclick="playNextSongOnClick('random')"><img src='images/random.png'></button>

		</div>


		<script>
			var musics = <?= json_encode($musics) ?>;


			/*timer*/
			function stepperMethod(m) {
				var stepper = $("#stepper_methods").data('stepper');
				stepper[m]();
			}

			function playNextSongOnClick(action) {
				// On récupère l'index
				let index = parseInt($('#player').attr("data-index"));
				let audio = document.getElementById("player");
				let indexIncremente;

				if(action == "next") {
					// fonction suivant
					indexIncremente = index+1;
					if(indexIncremente > musics.length) {
						indexIncremente = 0;
					}
				}
				else if(action == "previous") {
					// fonction precedent
					indexIncremente = index-1;
					if(indexIncremente < 0) {
						indexIncremente = musics.length-1;
					}
				}
				else if(action == "random") {
					// selection random
					indexIncremente = Math.floor(Math.random()*musics.length-1);
				}
				console.log(action, index, indexIncremente, $('#player').attr("data-index"), $('#player').attr("src") )

				// on change la valeur de l'index
				$('#player').attr("data-index", indexIncremente );
				// On utilise l'index pour charger le morceau suivant
				$('#player').attr("src", musics[index]["url_music"]);

				audio.load();
				audio.play();
			}	
			
		</script>


		<?php

}
?>


		<div class="attribution">

		</div>
		</div>

		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<script src="https://cdn.metroui.org.ua/v4/js/metro.min.js"></script>
</body>

</html>