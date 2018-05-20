var url='http://localhost/plate-forme/admin/';
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
$("#rechercher").on("keyup",function(){
	var frappe=$("#rechercher").val();
	var data={};
	data={'frappe':frappe};
	console.log(frappe);
	motClef(data);
});	

function motClef(data)
{
	// requête ajax via le service $http
	console.log(url);
	$.ajax({
	   	url : 'recherche_produit_ajax/',
	   	type : 'GET',
	   	data : data,
	   	dataType : 'json',
	   	success : function(code_html, statut){
	   		console.log(url);
	   		console.log(code_html);
	  		console.log(code_html[0]['label']);
	  		console.log(code_html[0]['description']);
	  		console.log(code_html[0]['image']);
	  		$("#test").empty();
	  		if(code_html.length > 1)
	  		{
	  			code_html.forEach(function(index){
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
		  	}
		  	else
		  	{
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

	   	error : function(resultat, statut, erreur){
	     		
	  	},

	   	complete : function(resultat, statut){

	   	}

	});   		
};
