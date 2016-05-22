/**
 * Created by Grégory Pyck on 05/04/2016.
 */

//Version du point 10
$(document).ready(function () {
    // console.log($('.menu'));
    $.get("index.php?rq=accueil", function (result) {
        traiteRetour(testeJSON(result));
        gereClick('menu');
        gereClick('sous-menu');
        $('#o_Accueil a').addClass('selected');
    });

});
    function gereClick(menu) {

        $('#'+menu+' a').click(function () {
            var rq = $(this).attr("href").split(".")[0];
            $.get("index.php?rq=" + rq, function (result) {
                traiteRetour(testeJSON(result));

                $('input[type="submit"]').click(function (event) {
                    var rq = $('form').attr('action');
                    var rq = rq.split(".")[0];
                    $.get('index.php?rq=' + rq + '&' + $('form').serialize(), function (result) {
                        traiteRetour(testeJSON(result));
                    });
                    event.preventDefault();
                });
            });
            $('#'+menu+' a').removeClass('selected');
            $(this).addClass('selected');
            $('title').html(rq);
            // event.preventDefault();
            return false;
        });
    }



function traiteRetour(objetJS){
    $.map(objetJS, function(val, i) {
            switch (i) {
                case 'menu' :
                    break;
                case 'sous-menu' : $('#'+i).html(val);
                                   gereClick(i);
                    break;
                case 'contenu' :
                    $('#' + i).html(val);
                    break;
                case 'alerte' :
                case 'message' :/*$('#' + i).html(val.texte);
                    if(val.title)$('#message').dialog("option",'title',val.title);
                    $('#message').dialog("open");*/
                    break;
                case 'nomSite' :
                case 'imageFolder' :
                case 'logo' :
                default :
                    alert('Erreur retour : \nCas non traité = ' + i + '\n' + val);
            }

        }
    )
}

function testeJSON(result){
    var json= {};
    try     {json = $.parseJSON(result); }
    catch (err){
        json['message']={
            'texte' :result,
            'title': "Retour NON json",
            'dialogClass': 'error'};
        }
    return json;
}
