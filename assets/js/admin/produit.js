var url="http://localhost/Gustocoffee/admin/produit/";
$(document).ready(function() {
	//Variable pour les caractere
	var caracDiv = $('#p_scents_caractere');
  var i = $('#p_scents_caractere .row').length + 1;

	$("#addCaracters").on("click", function() {
		$('<div class="row p_scents_container"><div class="form-group col-md-4 text-center"><button type="button" class="btn btn-danger deleteCaractere"><i class="fa fa-minus-square"></i></button></div><div class="form-group col-md-8 text-center"><input type="text" name="caracteristique[]" class="form-control caracteristique"></div></div>').appendTo($("#p_scents_caractere"));
	});

	$('#p_scents_caractere').on('click', '.deleteCaractere', function() {
				console.log($(".p_scents_container"));
				if( i > 1 ) {
            $(this).parents('.p_scents_container').remove();
            i--;
        }
	});

	//Variable pour les utilisations
	var caracDiv = $('#p_scents_utilisation');
  var r = $('#p_scents_utilisation .row').length + 1;

	$("#addUtilisation").on("click", function() {
		console.log(url);
		$.ajax({
	        url : "charger_utilisation_ajax",
	        type : "POST",
					dataType : 'html',
	        success: function(code_html) {
	        	$('<div class="row p_scents_utilisation"><div class="form-group col-md-4 text-center"><button type="button" class="btn btn-danger deleteUtilisation"><i class="fa fa-minus-square"></i></button></div><div class="form-group col-md-8 text-center"><select name="utilisation[]" class="form-control utilisation"><option value="0">Aucune</option>' + code_html +'</select></div>').appendTo($("#p_scents_utilisation"));
	            r++;
							console.log(code_html);
	            return false;

	        },

					error : function(resultat, statut, erreur){
						console.log(resultat);
						console.log(statut);
						console.log(erreur);
       		},

					complete : function(resultat, statut){
						console.log(resultat);
						console.log(url);
       		}

	    });
    });

		$('#p_scents_utilisation').on('click', '.deleteUtilisation', function() {
	        if( r > 1 ) {
	            $(this).parents('.p_scents_utilisation').remove();
	            i--;
	        }
		});

		$("#addUtilisation_modifier").on("click", function() {
			console.log(url);
			$.ajax({
		        url : "../charger_utilisation_ajax",
		        type : "POST",
						dataType : 'html',
		        success: function(code_html) {
		        	$('<div class="row col-md-12 p_scents_utilisation"><div class="form-group col-md-4 text-center"><button type="button" class="btn btn-danger deleteUtilisation"><i class="fa fa-minus-square"></i></button></div><div class="form-group col-md-8 text-center"><select name="utilisation[]" class="form-control utilisation"><option value="0">Aucune</option>' + code_html +'</select></div>').appendTo($("#p_scents_utilisation"));
		            r++;
								console.log(code_html);
		            return false;

		        },

						error : function(resultat, statut, erreur){
							console.log(resultat);
							console.log(statut);
							console.log(erreur);
	       		},

						complete : function(resultat, statut){
							console.log(resultat);
							console.log(url);
	       		}

		    });
	    });



});
