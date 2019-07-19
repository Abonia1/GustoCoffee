var url = 'http://aboweb.local:8080/service';
// var liste=[];
// var table_produit= {};
// var produit=[];

// (function motClef()
// {
// 	// requête ajax via le service $http
// 	console.log(url);
// 	//test si la requête a deja été effectué
// 	if(liste.length==0)
// 	{	
// 		$.ajax({
// 		   	url : 'liste_ajax',
// 		   	type : 'GET',
// 		   	dataType : 'json',
// 		   	success : function(code_html, statut){
// 		   		console.log(code_html);
// 		   		console.log(code_html[0]['id']);
// 		   		liste=code_html;
// 		   		liste.forEach(function(index){
// 		   			table_produit[index['id']]=index['mot_clef'].split("");
// 		   			console.log(table_produit);
// 				})
// 		   	},

// 		   	error : function(resultat, statut, erreur){

// 		  	},

// 		   	complete : function(resultat, statut){

// 		   	}

// 		});   
// 	}			
// })();

// $("#rechercher").on("keyup",function(){
// 	var i=0;
// 	produit.length= 0;
// 	$("#rechercher").val().split("").forEach(function(frappe)
// 	{
// 		var ajouter=true;
// 		//console.log(frappe);
// 		for(element in table_produit)
// 		{
// 			console.log(table_produit[element][i]);
// 			if(table_produit[element][i] == frappe && produit.length != 0)
// 			{
// 				console.log('rentrer1');
// 				if(produit.length != 0)
// 				{
// 					console.log('rentrer2');
// 					produit.forEach(function(index)
// 					{
// 						if(index == element)
// 						{
// 							console.log('rentrer3');
// 							ajouter=false;
// 						}
// 					});
// 					if(ajouter)
// 					{
// 						produit.push(element);
// 						console.log('ok');
// 						$('#'+element).hide();	
// 					}	
// 				}	
// 			}
// 			else if(table_produit[element][i] == frappe && produit.length == 0)
// 			{
// 				console.log('rentrer4');
// 				if(ajouter)
// 					{
// 						produit.push(element);
// 						console.log('ok');
// 						$('#'+element).hide();	
// 					}
// 			}
// 			else if(produit.length != 0)
// 			{
// 				console.log('rentrer5');
// 				for(var a=0; a<=produit.length; a++)
// 				{
// 					if(produit[a] == element)
// 					{
// 						console.log('sortie1');
// 						produit.splice(a, 1);
// 					}
// 				}
// 			}	
// 		}
// 	i=i+1;	
// 	});

// 	$('tr').hide('slow');
// 	console.log(produit);
// 	produit.forEach(function(index){
// 		$('#'+index).show('slow');
// 	})
// });


// $(document).ready(function() {
//     $("#recherche").keydown(function() {
//         $("#rechercher").css("background-color", "red");
//         var test = $("#recherche").val();
//         //console.log(test);
//     });
//     $("#recherche").keyup(function() {
//         $("#recherche").css("background-color", "white");
//     });
// });
$("#recherche").on("keyup", function() {
    var frappe = $("#recherche").val();
    //console.log(frappe);

    var data = {};
    data = { 'frappe': frappe };
    //console.log(data);
    motClef(data);

});



function motClef(data) {
    // requête ajax via le service $http
    // console.log(url);
    $.ajax({
        url: 'recherche_produit_ajax',
        type: 'GET',
        data: data,
        //type: 'POST',
        success: function(code_html, statut) {
            console.log(url);
            console.log(code_html);
            console.log(code_html[0]['label']);
            console.log(code_html[0]['description']);
            console.log(code_html[0]['image']);
            $("#test").empty();
            if (code_html.length > 1) {
                code_html.foreach(element => {

                });
                (function(index) {
                    console.log(index['label']);
                    console.log($("#test"));
                    $('<h2>', {
                        class: 'col-md-3',
                        style: 'display:inline-block; font-size:2em; border-style: outset',
                        text: index['label']
                    }).appendTo($("#test"));
                    $('<p>', {
                        class: 'col-md-6',
                        style: 'display:inline-block; border-style: inset;',
                        text: index['description']
                    }).appendTo($("#test"));
                    $('<img>', {
                        class: 'col-md-3',
                        style: 'display:inline-block',
                        src: index['image']
                    }).appendTo($("#test"));
                })
            } else {
                $("#test").empty();
                console.log(code_html);
                $('<h2>', {
                    class: 'col-md-3',
                    style: 'display:inline-block; font-size:2em; border-style: outset',
                    text: code_html[0]['label']
                }).appendTo($("#test"));
                $('<p>', {
                    class: 'col-md-6',
                    style: 'display:inline-block; border-style: inset;',
                    text: code_html[0]['description']
                }).appendTo($("#test"));
                $('<img>', {
                    class: 'col-md-3',
                    style: 'display:inline-block',
                    src: code_html[0]['image']
                }).appendTo($("#test"));
            }
        },

        error: function(resultat, statut, erreur) {
            // console.log("error");
        },

        complete: function(resultat, statut) {

        }

    });
};

/* Lorsqu'on recherche un produit avec l'autocomplétion */
$(document).on('keydown.autocomplete', '.productName', function() {
    $(this).autocomplete({
        source: '../recherche_produit_ajax',
        minLength: 2,
        select: function(event, ui) {
            var produit = ui.item.value;
            var prix = ui.item.prix;
            var remise = ui.item.remise;
            var id_produit = ui.item.id;
            var quantite = 1;

            /***********************************************************************/
            /* REMPLISSAGE CHAMPS AVEC INFORMATIONS PRODUIT */
            $(this).val(produit);
            $(this).siblings('.id_produit').val(id_produit);
            $(this).parent().parent().siblings('.prix_ht').find('input').val(prix);
            $(this).parent().parent().siblings('.remise').find('input').val(remise);
            $(this).parent().parent().siblings('.quantite_produit').find('input').val(quantite);
            /***********************************************************************/



            /*********************************************************************************/
            /* CALCUL PRIX TOTAL APRES REMISE */
            var prix_ht_remise = calculRemise(prix, remise);
            $(this).parent().parent().siblings('.total_ht').find('input').val(prix_ht_remise.toFixed(2));
            /*********************************************************************************/



            /******************************************************************************************/
            /* AJOUT DE TOUS LES PRIX HT DE BASE POUR TOTAL HT COMMANDE */
            var total_ht = 0.0;

            $(".prix_ht_produit").each(function() {
                quantite = $(this).parent().parent().siblings('.quantite_produit').find('input').val();
                total_ht += calculPrixQuantite($(this).val(), quantite);
            });

            $('#prix_ht_final').text(total_ht.toFixed(2));
            $('#prix_ht_final_cmd').val(total_ht.toFixed(2));
            /******************************************************************************************/




            /******************************************************************************/
            /* AJOUT DE TOUS LES PRIX HT APRES REMISE POUR TOTAL HT APRES REMISE COMMANDE */
            var total_ht_remise = 0.0;

            $(".prix_total_ht").each(function() {
                total_ht_remise += parseFloat($(this).val() * quantite);
            });

            $('#prix_ht_remise').text(total_ht_remise.toFixed(2));
            $('#prix_ht_remise_cmd').val(total_ht_remise.toFixed(2));
            /******************************************************************************/




            /*************************************************************************************/
            /* AJOUT DE TVA AU TOTAL HT COMMANDE POUR AVOIR PRIX FINAL TTC COMMANDE */
            var total_ttc = calculTva(total_ht_remise, 20);
            $('#prix_ttc_final').text(total_ttc.toFixed(2));
            $('#prix_ttc_final_cmd').val(total_ttc.toFixed(2));
            /*************************************************************************************/

            return false;
        }
    });


});