var container = document.getElementsByTagName('main');
var mon_compte = document.getElementById('mon_compte');

// changement de page coté mélomane //

var artiste = document.getElementById('artiste_all');
var bandes_collab = document.getElementById('bandes_collab');
var mes_playlists = document.getElementById('mes_playlists');


if (artiste != null) {
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
}


// ---------------------------------//

// changement de page coté musicien //

var mes_creations = document.getElementById('mes_creations');
var outil_creation = document.getElementById('outil_creation');
var messagerie = document.getElementById('messagerie');

if (mes_creations != null) {
    mes_creations.onclick = function () {
        $.get('mes_creations.php', function (e) {
            console.log(e);
            container[0].innerHTML = e;
        })
    };

    outil_creation.onclick = function () {
        $.get('outil_creation.php', function (e) {
            //console.log(e);
            container[0].innerHTML = e;
        })
    };

    messagerie.onclick = function () {
        $.get('messagerie.php', function (e) {
            //console.log(e);
            container[0].innerHTML = e;
        })
    };

    mon_compte.onclick = function () {
        $.get('mon_compte.php', function (e) {
            container[0].innerHTML = e;
        })
    };
}

// recherche
setInterval(function () {
    if ($('#recherche') == true){
        $('#recherche')[0].onclick = function () {
            //alert('issou');
            var data = {'requete': $('#requete').val()}
            $.post('reponse_requete.php', data, function (e) {
                container[0].innerHTML = e;
            });
        }
    }

},1000)

