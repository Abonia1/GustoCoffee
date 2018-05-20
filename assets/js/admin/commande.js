$(document).ready(function() {
	var scntDiv = $('#p_scents');
    var i = $('#p_scents .row').length + 1;

	$("#addProduct").on("click", function() {
        $('<div class="row p_scents_container"><div class="form-group col-md-1"><button type="button" class="btn btn-danger deleteProduct"><i class="fa fa-minus-square"></i></button></div><div class="form-group col-md-4 "><div class=""><input type="text" name="produit[]" placeholder="Produit" class="form-control productName"><input type="hidden" class="id_produit" name="id_produit[]" value=""></div></div><div class="prix_ht form-group col-md-2 "><div class="input-prepend input-group"><input type="text" name="prix_ht[]" value="0.0" readonly class="form-control prix_ht_produit"><span class="input-group-addon">€</span></div></div><div class="quantite_produit form-group col-md-1 "><div class=""><input type="number" name="quantite[]" value="1" class="form-control quantite"></div></div><div class="remise form-group col-md-2"><div class="input-prepend input-group"><input type="text" name="remise[]" value="0" class="form-control remise_produit"><span class="input-group-addon">%</span></div></div><div class="total_ht form-group col-md-2 "><div class="input-prepend input-group"><input type="text" readonly name="total_ht[]" value="0.0" class="form-control prix_total_ht"><span class="input-group-addon">€</span></div></div></div>').appendTo(scntDiv);
        i++;
        return false;
    });

	$('#p_scents').on('click', '.deleteProduct', function() {
        if( i > 1 ) {
            $(this).parents('.p_scents_container').remove();
            i--;
        }


        /******************************************************************************************/
        /* AJOUT DE TOUS LES PRIX HT DE BASE POUR TOTAL HT COMMANDE */
        var total_ht = 0.0;

        $( ".prix_ht_produit" ).each(function() {
        	quantite = $(this).parent().parent().siblings('.quantite_produit').find('input').val();
        	total_ht += calculPrixQuantite( $( this ).val(), quantite );
    	});

        $('#prix_ht_final').text( total_ht.toFixed(2) );
        $('#prix_ht_final_cmd').val( total_ht.toFixed(2) );
        /******************************************************************************************/




        /******************************************************************************/
        /* AJOUT DE TOUS LES PRIX HT APRES REMISE POUR TOTAL HT APRES REMISE COMMANDE */
        var total_ht_remise = 0.0;

        $( ".prix_total_ht" ).each(function() {
    	   total_ht_remise += parseFloat( $( this ).val() );
    	});

        $('#prix_ht_remise').text( total_ht_remise.toFixed(2) );
        $('#prix_ht_remise_cmd').val( total_ht_remise.toFixed(2) );
        /******************************************************************************/




        /*************************************************************************************/
        /* AJOUT DE TVA AU TOTAL HT COMMANDE POUR AVOIR PRIX FINAL TTC COMMANDE */
        var total_ttc = calculTva(total_ht_remise, 20);
        $('#prix_ttc_final').text( total_ttc.toFixed(2) );
        $('#prix_ttc_final_cmd').val( total_ttc.toFixed(2) );
        /*************************************************************************************/

        return false;
    });




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
	            $(this).parent().parent().siblings('.total_ht').find('input').val( prix_ht_remise.toFixed(2) );
	            /*********************************************************************************/



	            /******************************************************************************************/
	            /* AJOUT DE TOUS LES PRIX HT DE BASE POUR TOTAL HT COMMANDE */
	            var total_ht = 0.0;

	            $( ".prix_ht_produit" ).each(function() {
	            	quantite = $(this).parent().parent().siblings('.quantite_produit').find('input').val();
	            	total_ht += calculPrixQuantite( $( this ).val(), quantite );
            	});

	            $('#prix_ht_final').text( total_ht.toFixed(2) );
	            $('#prix_ht_final_cmd').val( total_ht.toFixed(2) );
	            /******************************************************************************************/




	            /******************************************************************************/
	            /* AJOUT DE TOUS LES PRIX HT APRES REMISE POUR TOTAL HT APRES REMISE COMMANDE */
	            var total_ht_remise = 0.0;

	            $( ".prix_total_ht" ).each(function() {
            	   total_ht_remise += parseFloat( $( this ).val() * quantite);
            	});

	            $('#prix_ht_remise').text( total_ht_remise.toFixed(2) );
	            $('#prix_ht_remise_cmd').val( total_ht_remise.toFixed(2) );
	            /******************************************************************************/




	            /*************************************************************************************/
	            /* AJOUT DE TVA AU TOTAL HT COMMANDE POUR AVOIR PRIX FINAL TTC COMMANDE */
	            var total_ttc = calculTva(total_ht_remise, 20);
	            $('#prix_ttc_final').text( total_ttc.toFixed(2) );
	            $('#prix_ttc_final_cmd').val( total_ttc.toFixed(2) );
	            /*************************************************************************************/

	            return false;
	        }
	    });


	});




	/* Quand on modifie la quantité d'un produit, on réactualise les champs nécessaires */
    $(document).on('change', '.quantite', function() {
        var quantite = $(this).val();
        var remise = $(this).parent().parent().siblings('.remise').find('input').val();
        var prix = $(this).parent().parent().siblings('.prix_ht').find('input').val();

        /* Je calcule le prix total HT du produit en fonction de la quantite */
		var prix_ttc_remise = calculRemise(prix, remise);
        var total = prix_ttc_remise * quantite;
        $(this).parent().parent().siblings('.total_ht').find('input').val( total.toFixed(2) );


        /* Je prends le total HT de chaque produit pour faire le total HT après remise de la commande */
        var total_ht_remise = 0.0;

        $( ".prix_total_ht" ).each(function() {
        	total_ht_remise += parseFloat($( this ).val());
    	});

        $('#prix_ht_remise').text( total_ht_remise.toFixed(2) );
        $('#prix_ht_remise_cmd').val( total_ht_remise.toFixed(2) );


        /* Je prends le Prix Final HT après remise et j'ajoute la TVA pour avoir le prix TTC */
        var total_ttc = calculTva(total_ht_remise, 20);
        $('#prix_ttc_final').text( total_ttc.toFixed(2) );
        $('#prix_ttc_final_cmd').val( total_ttc.toFixed(2) );


        /* Je prends le prix HT de chaque produit pour faire le total HT de la commande */
        var total_ht = 0.0;

        $( ".prix_ht_produit" ).each(function() {
        	quantite = $(this).parent().parent().siblings('.quantite_produit').find('input').val();
        	total_ht += parseFloat( $( this ).val() * quantite );
    	});

        $('#prix_ht_final').text( total_ht.toFixed(2) );
        $('#prix_ht_final_cmd').val( total_ht.toFixed(2) );

    });



    /* Lorsqu'on modifie la remise pour chaque produit on réactualise les champs nécessaires */
    $(document).on('change', '.remise_produit', function() {
    	var remise = $(this).val();
        var quantite = $(this).parent().parent().siblings('.quantite_produit').find('input').val();
        var prix = $(this).parent().parent().siblings('.prix_ht').find('input').val();
        var total_ht = $(this).parent().parent().siblings('.total_ht').find('input').val();



        /************************************************************************************/
        /* CALCUL PRIX TOTAL HT APRES REMISE SELON QUANTITE POUR UN PRODUIT */
		var prix_ttc_remise = calculRemise( prix, remise );
        var total = calculPrixQuantite( prix_ttc_remise, quantite );

        $(this).parent().parent().siblings('.total_ht').find('input').val( total.toFixed(2) );
        /************************************************************************************/




        /******************************************************************************/
        /* AJOUT DE TOUS LES PRIX HT APRES REMISE POUR TOTAL HT APRES REMISE COMMANDE */
        var total_ht_remise = 0.0;

        $( ".prix_total_ht" ).each(function() {
    	   total_ht_remise += parseFloat( $( this ).val() );
    	});

        $('#prix_ht_remise').text( total_ht_remise.toFixed(2) );
        $('#prix_ht_remise_cmd').val( total_ht_remise.toFixed(2) );
        /******************************************************************************/




        /* Je prends le Prix Final HT après remise et j'ajoute la TVA pour avoir le prix TTC */
        var total_ttc = calculTva(total_ht_remise, 20);
        $('#prix_ttc_final').text( total_ttc.toFixed(2) );
        $('#prix_ttc_final_cmd').val( total_ttc.toFixed(2) );
    });




    /**
     * Calculer le prix TTC après remise.
     *
     * @param prix_ht Le prix HT
     * @param tva Le taux de TVA
     * @param remise La remise
     * @return Le prix TTC après remise
     */
    function calculPrixTTC(prix_ht, tva, remise)
    {
    	var prix_ttc = parseFloat(prix_ht) + (prix_ht * (tva / 100));
    	var prix_total = parseFloat(prix_ttc) - (prix_ttc * (remise / 100));

    	return prix_total;
    }

    /**
     * Calculer le prix TTC.
     *
     * @param prix_ht Le prix HT
     * @param tva Le taux de TVA
     * @return Le prix TTC
     */
    function calculTva(prix_ht, tva)
    {
    	return parseFloat(prix_ht) + (prix_ht * (tva / 100));
    }


    /**
     * Calculer le prix TTC après remise.
     *
     * @param prix_ttc Le prix TTC
     * @param remise La remise
     * @return Le prix TTC après remise
     */
    function calculRemise(prix_ttc, remise)
    {
    	return parseFloat(prix_ttc) - (prix_ttc * (remise / 100));
    }


    /**
     * Calculer le prix HT Total.
     *
     * @param prix_ht Le prix HT
     * @param quantite La quantite
     * @return Le prix HT total
     */
    function calculHtTotal(prix_ht, quantite)
    {
    	return parseFloat(prix_ht * quantite);
    }


    /**
     * Calculer un prix HT en fonction de la quantite.
     *
     * @param prix Le prix HT
     * @param quantite La quantite
     * @return Le prix HT total
     */
    function calculPrixQuantite(prix, quantite)
    {
    	return parseFloat(prix * quantite);
    }






    $('#client').autocomplete({
    	source: '../recherche_client_ajax',
        minLength: 2,
        select: function(event, ui) {
        	$(event.target).val(ui.item.desc);
            var id = ui.item.id;
            var societe = ui.item.societe;
            var prenom = ui.item.prenom;
            var nom = ui.item.nom;

            $('#id_client').val( id );
        }
    })


});
