var artiste = document.getElementById('artiste_all');
var container = document.getElementsByTagName('main');

artiste.onclick = function () {
  $.get('artiste_all.php', function (e) {
     //console.log(e);
     container[0].innerHTML = e;
  })
};