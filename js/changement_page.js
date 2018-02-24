var artiste = document.getElementById('artiste_all');

artiste.onclick = function () {
  $.get('artiste_all.php', function (e) {
      console.log(e);
  })
};