var artiste = document.getElementById('artiste_all');
var bandes_collab = document.getElementById('bandes_collab');
var mes_playlists = document.getElementById('mes_playlists');
var mon_compte = document.getElementById('mon_compte');
var container = document.getElementsByTagName('main');

artiste.onclick = function () {
  $.get('artiste_all.php', function (e) {
     //console.log(e);
     container[0].innerHTML = e;
  })
};

bandes_collab.onclick = function () {
    $.get('bandes_collab.php', function (e) {
        container[0].innerHTML = e;
    })
};

mes_playlists.onclick = function () {
    $.get('mes_playlists.php', function (e) {
        container[0].innerHTML = e;
    })
};

mon_compte.onclick = function () {
    $.get('mon_compte.php', function (e) {
        container[0].innerHTML = e;
    })
};
