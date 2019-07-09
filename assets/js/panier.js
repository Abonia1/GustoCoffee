  var urlServer = "http://aboweb.local/Gustocoffee/";


  //   function panierUpdata() {
  //       $.ajax({
  //           url: "reservation",
  //           type: "GET",
  //           success: function(code_html) {
  //               var result = JSON.parse(code_html);
  //               console.log(result);
  //               if (result && result.lenght > 0) {
  //                   for (article in result) {
  //                       console.log(article);
  //                       console.log("fin");
  //                       // console.log(result[article]);
  //                       //$( "<p>Test</p>" ).appendTo( ".inner" );
  //                       $('<div id="' + article + '" class="row"><div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><p>' + result[article].nom + '</p></div></div>').appendTo('#panier');
  //                       $('<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"><img src="' + urlServer + 'assets/images/produit/' + result[article].image + '" width="100%"></div>').appendTo('#' + article);
  //                       $('<p>' + result[article].description + '<p>').appendTo('#' + article + ' div:eq(0)');
  //                       $('<p>Quantité: ' + result[article].quantite + '<p>').appendTo('#' + article + ' div:eq(0)');
  //                   }
  //               } else {
  //                   $('#panier').html("<p>Aucun reservation ajouté</p>");
  //               }
  //           },
  //           error: function() {
  //               $('#panier').html("<p>Aucun reservation ajouté</p>");
  //           }
  //       });
  //   }

  $(document).ready(function() {
      $('#monPanier').on('mouseenter', function() {
          $('#panier').empty();
          panierUpdata();
          $('#panierBox').removeClass("panierEtat");
          $('#panierBox').on('mousemove', function() {
              $('#panierBox').removeClass("panierEtat");
          });
          $('#panierBox').on('mouseout', function() {
              $('#panierBox').addClass("panierEtat");
          });
      });

      $('#monPanier').on('mousemove', function() {
          $('#panierBox').removeClass("panierEtat");
      });
      // $('header').on('mouseout', function(){
      //     $('#panierBox').css('display', 'none');
      // });



      $('#add-product').on('click', function(e) {
          e.preventDefault();

          var id = $(this).data('id');

          $.ajax({
              url: "ajouter-panier",
              type: "POST",
              dataType: "html",
              data: "id=" + id,
              success: function(data) {
                  $.toast({
                      text: "Votre article a bien été ajouté à votre panier.",
                      heading: 'Succès',
                      icon: 'success',
                      showHideTransition: 'slide',
                      allowToastClose: true,
                      hideAfter: 3000,
                      stack: 5,
                      position: 'bottom-right',
                      textAlign: 'left',
                      loader: true,
                      loaderBg: '#1d3949',
                      beforeShow: function() {},
                      afterShown: function() {},
                      beforeHide: function() {},
                      afterHidden: function() {}
                  });
              },
              error: function() {
                  $.toast({
                      text: "Une erreur est survenue, votre article n'a pas pu être ajouté à votre panier.",
                      heading: 'Erreur',
                      icon: 'error',
                      showHideTransition: 'slide',
                      allowToastClose: true,
                      hideAfter: 3000,
                      stack: 5,
                      position: 'bottom-right',
                      textAlign: 'left',
                      loader: true,
                      loaderBg: '#1d3949',
                      beforeShow: function() {},
                      afterShown: function() {},
                      beforeHide: function() {},
                      afterHidden: function() {}
                  });
              }
          });
      });

      $('.delete-product').on('click', function() {
          var id = $(this).data('id');
          var line = $(this).parent().parent();

          $.ajax({
              url: "produit/supprimer-panier",
              type: "POST",
              dataType: "html",
              data: "id=" + id,
              success: function(data) {
                  line.remove();

                  $.toast({
                      text: "Votre article a bien été supprimé de votre panier.",
                      heading: 'Succès',
                      icon: 'success',
                      showHideTransition: 'slide',
                      allowToastClose: true,
                      hideAfter: 3000,
                      stack: 5,
                      position: 'bottom-right',
                      textAlign: 'left',
                      loader: true,
                      loaderBg: '#1d3949',
                      beforeShow: function() {},
                      afterShown: function() {},
                      beforeHide: function() {},
                      afterHidden: function() {}
                  });
              },
              error: function() {
                  $.toast({
                      text: "Une erreur est survenue, votre article n'a pas pu être supprimé de votre panier.",
                      heading: 'Erreur',
                      icon: 'error',
                      showHideTransition: 'slide',
                      allowToastClose: true,
                      hideAfter: 3000,
                      stack: 5,
                      position: 'bottom-right',
                      textAlign: 'left',
                      loader: true,
                      loaderBg: '#1d3949',
                      beforeShow: function() {},
                      afterShown: function() {},
                      beforeHide: function() {},
                      afterHidden: function() {}
                  });
              }
          });
      });


      $('.update-product').on('change', function() {
          var id = $(this).data('id');
          var qte = $(this).val();

          var prix = $(this).parent().siblings(".prix");

          $.ajax({
              url: "produit/update-panier",
              type: "POST",
              dataType: "html",
              data: "id=" + id + "&qte=" + qte,
              success: function(data) {
                  //ajouter un loader
                  prix.html(data); //maj le prix dans le panier
              }
          });
      });


      $('#adresse_autre').on('change', function() {
          if (this.checked) {
              $.ajax({
                  url: "get-adresse",
                  type: "POST",
                  dataType: "html",
                  success: function(data) {
                      //ajouter un loader
                      $('#adresse_fieldset').append(data);
                  }
              });
          } else {
              $('#adresse_autre_container').remove();
          }
      })

  });