$(document).ready(function() {
    //console.log($('.menu'));
    $('#o_accueil').attr("Class", "selected");
    
    $('.menu a').click(function(){
        var e = $(this);
        var rq = e.attr('href');
        var rq = rq.split(".")[0];

        $.get("index.php?rq=" + rq, function(result){
            $("#contenu").html(result);
            $('input[type="submit"]').click(function(event){
                var rq = $('form').attr('action');
                var rq = rq.split(".")[0];
                $.get('index.php?rq='+ rq+'&'+$('form').serialize()+ '&submit=' + $(this).attr('name'),function(result){
                    $('#contenu').html(result);
                    $('input[type="file"]').data();
                });
                event.preventDefault();
            });
        });
        /*$.get('index.php','rq='+rq,function(result){
            $('#contenu').html(result);
            $('form').submit(function( event ) {
                event.preventDefault();
                var rq = e.getAttribute('href');
                rq = rq.substring(0, rq.lastIndexOf("."));
                $.get('index.php'
                    ,'rq='+ rq+' '+$(this).serialize()
                    ,function(result){
                        $('#contenu').html(result);
                    });
            });
        });*/
        $('.menu a').removeClass('selected');
        $(this).addClass('selected');
        $('title').html(rq);

    });
});

/* var e = this;
event.preventDefault();
var rq = e.getAttribute('href');
rq = rq.substring(0, rq.lastIndexOf("."));
$.ajax({
   url : "index.php",
   type : 'GET',
    data: "rq="+rq ,
   success : function(an, statut){
       //$(code_html).appendTo("#commentaires");
       $("#contenu").html(an);
       $('title').html(e.innerHTML);
   }
});
var x = document.getElementByClassName("selected");
var i;
for(i=0; i < x.length; i++){
    x[i].className="";
}
this.className = "selected";

function getContenu(e){
    var rq = (e).Attr('href');
    rq = rq.substring(0,rq.lastIndexOf("."));
    var title = (e).text();
    var xmlhttp = new XMLHttpRequest();
    $(e).addClass('selected');
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("contenu").innerHTML = xmlhttp.responseText;
            document.getElementById("title").innerHTML = title;
        }
    };
    xmlhttp.open("GET", "index.php?rq=" + rq , true);
    xmlhttp.send();
}*/