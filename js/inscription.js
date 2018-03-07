/* FORMULAIRE INSCRIPTION */
$('#boutonMusicien').click(function(){
    $('#artiste').attr('value', 1);
});

$('#boutonMelomane').click(function(){
    $('#artiste').attr('value', 2);
});

$('#boutonInscription').click(function(){
    $('#formInscription').submit();
});