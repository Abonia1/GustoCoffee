var url = 'http://aboweb.local/plate-forme/';


function ajax(id, page, categorie) {
    $.ajax({
        url: categorie + '/' + page + '/',
        type: 'GET',
        data: id,
        dataType: 'json',
        success: function(code_html, statut) {
            console.log(url);
            console.log(code_html);
            if (code_html != false) {
                $('<h1>', {
                    text: code_html[0]['sous_categorie']
                }).appendTo($("#dialog"));
                $('<p>', {
                    text: code_html[0]['sous_categorie_description']
                }).appendTo($("#dialog"));
                $('<img>', {
                    src: url + 'web/img/categorie/' + code_html[0]['image_sous_categorie']
                }).appendTo($("#dialog"));
                $('<div>', {
                    class: 'row enzynov'
                }).appendTo($("#dialog"));
                var count = 0;
                code_html.forEach(function(index) {
                    $('<div>', {
                        class: 'col-md-2 enzynov'
                    }).appendTo($("#dialog").children(".enzynov").eq(0));
                    $('<h2>', {
                        text: index['surface_nom']
                    }).appendTo($("#dialog").children(".enzynov").children(".enzynov").eq(count));
                    $('<img>', {
                        src: url + 'web/img/surface/' + index['surface_image']
                    }).appendTo($("#dialog").children(".enzynov").children(".enzynov").eq(count));
                    $('<a>', {
                        href: url + 'secteur/' + categorie + '/' + page + '/' + index['url'],
                        text: 'Aller au produit'
                    }).appendTo($("#dialog").children(".enzynov").children(".enzynov").eq(count));
                    count++;
                });
            } else {
                document.location.href = url + 'secteur/' + categorie + '/' + page + '/';
            }
        },

        error: function(resultat, statut, erreur) {
            console.log(resultat);
            // console.log(url);	
        },

        complete: function(resultat, statut) {

        }

    });
}
$(".stCat").on("click", function() {
    var id = { 'sous_secteur': $(this).data("id") };
    var page = $(this).data("souscategorie");
    var categorie = $(this).data("categorie");
    $('#dialog').empty();
    console.log(id);
    console.log(page);
    console.log(categorie);
    console.log(url);
    ajax(id, page, categorie);
});


$('#dialog').hide();


$('.img-link').on('click', function(event) {
    var id = $(this).data('id');
    event.preventDefault();

    $.ajax({
        url: "charger_surfaces_ajax",
        type: "POST",
        data: "id=" + id,
        success: function(data) {
            $(data).appendTo('body').modal();
        }
    });

    $('#dialog').dialog({
        modal: true
    });
})