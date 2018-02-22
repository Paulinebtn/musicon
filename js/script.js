// PLAYER

var songs = [
            'song/song1.mp3',
            'song/song2.mp3'
        ];

        var current_song = 0;

        var player = document.querySelector('audio');
        var btn_play = document.querySelector('.btn-play');
        var btn_pause = document.querySelector('.btn-pause');
        var btn_previous = document.querySelector('.btn-previous');
        var btn_next = document.querySelector('.btn-next');
        var btn_plus = document.querySelector('.btn-plus');
        var btn_minus = document.querySelector('.btn-minus');
        var progress_value = document.querySelector('.progress_value');
        var loop = document.querySelector('.btn-loop');
        var volum = document.querySelector('.btn-volum');
        var muted = document.querySelector('.btn-muted');

        player.src = songs[current_song];

        btn_play.addEventListener('click', play);

        function play() {
            player.play();
            btn_pause.classList.remove('hidden');
            btn_play.classList.add('hidden');
        }

        btn_pause.addEventListener('click', pause);

        function pause() {
            player.pause();
            btn_pause.classList.add('hidden');
            btn_play.classList.remove('hidden');
        }

        btn_next.addEventListener('click', function() {
            current_song = current_song + 1;

            if (current_song >= songs.length) {
                current_song = songs.length - 1;
                return;
            }

            player.src = songs[current_song];
            play();
        });

        btn_previous.addEventListener('click', function() {
            current_song = current_song - 1;

            if (current_song < 0) {
                current_song = 0;
                return;
            }

            player.src = songs[current_song];
            play();
        });

        player.addEventListener('timeupdate', function () {
            if (
                !isNaN(player.currentTime) && 
                !isNaN(player.duration)
            ) {
                var percent = player.currentTime / player.duration;
                percent = percent * 100;
                progress_value.style.width = percent + '%';
            }
        });

      btn_plus.addEventListener('click', function() {
            var current_volume = player.volume;
            current_volume = ((current_volume * 10) + 1) / 10;

            if (current_volume > 1) {
                current_volume = 1;
            }

            player.volume = current_volume;
        });
		
        btn_minus.addEventListener('click', function() {
            var current_volume = player.volume;
            current_volume = ((current_volume * 10) - 1) / 10;

            if (current_volume < 0) {
                current_volume = 0;
            }

            player.volume = current_volume;
        });
		
        
        loop.addEventListener('click', function() {
	       player.loop();
        });
        
        
        
        muted.addEventListener('click', function() {
	        player.volume = 1;
	        muted.classList.add('hidden');
            volum.classList.remove('hidden');
        });
        
        volum.addEventListener('click', function() {
	        player.volume = 0;
	        
            volum.classList.add('hidden');
            muted.classList.remove('hidden');
        });

// SCROLL

// When the user scrolls the page, execute myFunction 
window.onscroll = function() {
	myFunction()
};

// Get the navbar
var navbar = document.querySelector(".player");

// Get the offset position of the navbar
var sticky = navbar.offsetTop + 50;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky");
  } else {
    navbar.classList.remove("sticky");
  }
} 