//(function(jQuery) {
//	'use strict';

	// Video
	var video = document.getElementById("bgvid");
	var clickonvideo = document.getElementById("bgvid");
	var btnPlayPause = document.getElementById('play-pause');
	// Buttons
	var playButton = document.getElementById("play-pause");
	var muteButton = document.getElementById("mute");
	var fullScreenButton = document.getElementById("full-screen");

	// Sliders
	var seekBar = document.getElementById("seek-bar");
	var volumeBar = document.getElementById("volume-bar");
	var scrollVideoStatus =false;

	
	jQuery(".bgvideo").click(function(){
		if (video.paused == true) {
			changeButtonType(btnPlayPause, 'play');
			video.play();	
			
		} else {
			video.pause();
			changeButtonType(btnPlayPause, 'pause');			
		}
	});

	jQuery('.video_header #bgvid').click(function () {
	   if (video.paused == true) {
			changeButtonType(btnPlayPause, 'play');
			video.play();	
			
		} else {
			video.pause();
			changeButtonType(btnPlayPause, 'pause');			
		}
	});


	// Event listener for the play/pause button
	playButton.addEventListener("click", function() {
		if (video.paused == true) {
			changeButtonType(btnPlayPause, 'play');
			video.play();	
			
		} else {
			video.pause();
			changeButtonType(btnPlayPause, 'pause');			
		}
		scrollVideoStatus= video.paused ;
	});

	clickonvideo.addEventListener("click", function(event) {
		if ( jQuery("#video-controls").has(event.target).length == 0 
            &&
            !jQuery("#video-controls").is(event.target) 
          ){			
			if (video.paused == true) {
				changeButtonType(btnPlayPause, 'pause');
				
			} else {
				changeButtonType(btnPlayPause, 'play');
				
			}
			scrollVideoStatus= video.paused ;
		}
		
	});


	var vid = document.getElementById("bgvid");
	vid.ontimeupdate = function(){
	  var percentage = ( vid.currentTime / vid.duration ) * 100;
	  jQuery("#custom-seekbar span").css("width", percentage+"%");
	};
	
	jQuery("#custom-seekbar").on("click", function(e){
		var offset = jQuery(this).offset();
		var left = (e.pageX - offset.left);
		var totalWidth = jQuery("#custom-seekbar").width();
		var percentage = ( left / totalWidth );
		var vidTime = vid.duration * percentage;
		vid.currentTime = vidTime;
	});//click()



	// Event listener for the mute button
	muteButton.addEventListener("click", function() {
		if (video.muted == false) {
			// Mute the video
			video.muted = true;
			changeButtonType(muteButton, 'unmute');
			// Update the button text
			//muteButton.innerHTML = "Unmute";
		} else {
			// Unmute the video
			video.muted = false;
			changeButtonType(muteButton, 'mute');
			// Update the button text
			//muteButton.innerHTML = "Mute";
		}
	});


	// Event listener for the full-screen button
	fullScreenButton.addEventListener("click", function() {
		if (video.requestFullscreen) {
			video.requestFullscreen();
		} else if (video.mozRequestFullScreen) {
			video.mozRequestFullScreen(); // Firefox
		} else if (video.webkitRequestFullscreen) {
			video.webkitRequestFullscreen(); // Chrome and Safari
		}
	});
	
	//scrollVideoStatus= video.paused ;
	jQuery(window).scroll(function() {
		
		if(scrollVideoStatus===false && jQuery(window).scrollTop() > 150 ){
			if(window.location.hash) {
			      var hash = window.location.hash.substring(1); //Puts hash in variable, and removes the # character
				if(hash!="video"){
					if(video.paused == false){						
						changeButtonType(btnPlayPause, 'pause');
						video.pause();
					}
				}
				else{
					if(video.paused == true){
						changeButtonType(btnPlayPause, 'play');
						video.play();
						
					}
				}
			}
		}
		
	});
	

	// Event listener for the seek bar
	if(seekBar){
		seekBar.addEventListener("change", function() {
			// Calculate the new time
			var time = video.duration * (seekBar.value / 100);

			// Update the video time
			video.currentTime = time;
		});
	}
	

	
	// Update the seek bar as the video plays
	video.addEventListener("timeupdate", function() {
		// Calculate the slider value
		var value = (100 / video.duration) * video.currentTime;

		// Update the slider value
		if(seekBar){
			seekBar.value = value;
		}
	});

	if(seekBar){
		// Pause the video when the seek handle is being dragged
		seekBar.addEventListener("mousedown", function() {
			video.pause();
		});


		// Play the video when the seek handle is dropped
		seekBar.addEventListener("mouseup", function() {
			video.play();
			scrollVideoStatus= video.paused ;
		});
	}

	// Event listener for the volume bar
	//volumeBar.addEventListener("change", function() {
		//video.volume = volumeBar.value;
	//});
	
	
function changeButtonType(btn, value) {
  	btn.className = value;  	
  	if(btn ==btnPlayPause){
  		if(value=="pause"){
			jQuery(".bgvideo").removeClass("d-none");
			jQuery(video).closest("section").removeClass("video-status-play");
		}
		else{
			jQuery(".bgvideo").addClass("d-none");
			jQuery(video).closest("section").addClass("video-status-play");
		}	
  	}
	
	
	
 }

  
//})(jQuery);