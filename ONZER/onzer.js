// every second your audio element is playing
$('#player').on('timeupdate', function() {				
    var vol = 1,
    interval = 200; // 200ms interval
    if (Math.floor(audioElement.currentTime) == 15) {
        if (audioElement.volume == 1) {
            var intervalID = setInterval(function() {
	        // Reduce volume by 0.05 as long as it is above 0
	        // This works as long as you start with a multiple of 0.05!
	        if (vol > 0) {
	            vol -= 0.05;
	            // limit to 2 decimal places
                    // also converts to string, works ok
                    audioElement.volume = vol.toFixed(2);
	        } else {
	            // Stop the setInterval when 0 is reached
	            clearInterval(intervalID);
	        }
            }, interval);
        }
    }
});