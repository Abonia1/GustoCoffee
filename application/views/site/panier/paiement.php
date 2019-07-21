<div class="container profil-container">
    <div class="titre col-xs-12">
        <h1>Paiement</h1>

        <div class="ancre">
            <hr>
        </div>
    </div>

    <section class="col-xs-12 col-sm-9 profil-table">
        <h2>Mon détail de Réservation </h2>

        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Heure</th>
                    <th>Durée</th>
                    <th>Nombre de personnes</th>
                    <th>Numéro de table</th>
                    <th>Total</th>
                    
                </tr>
            </thead>

            <tbody>
            <?= form_open( 'panier/reservationsuccess' , array('autocomplete' => 'off','id'=>'myForm')); ?>
                <?php if(isset($date) && isset($time) && isset($quantity) ) : ?>
                
                    
                        <tr>
                            <td>
                            <?= form_input(array('name' => 'Date','id'=>"tablenumber",'value' =>$date )) ?><?= $date; ?>
                            </td>

                            <td>
                            <?= form_input(array('name' => 'Time','id'=>"tablenumber",'value' =>$time )) ?><?= $time; ?>
                            </td>
                            <td>
                            <?= form_input(array('name' => 'Duree','id'=>"tablenumber",'value' =>$duree )) ?><?= $duree; ?>h
                            </td>
                            <td>
                            <?= form_input(array('name' => 'quantity','id'=>"tablenumber",'value' => $quantity)) ?><?= $quantity; ?>
                            </td>
                            <td>
                            <?= form_input(array('name' => 'tablenumber','id'=>"tablenumber",'value' =>$tablenumber )) ?><?= $tablenumber; ?>
                            </td>
                            <td>
                            <?= form_input(array('name' => 'total','id'=>"tablenumber",'value' => $duree*$quantity*2.5)) ?><?= $duree*$quantity*2.5; ?>€
                            </td>
                            <input type="hidden" name="amount" value="<?php echo $duree*$quantity*2.5; ?>">
                            <?php if (isset($_POST['colab'])) :?>
                            <td style="display:none;">
                            <?= form_input(array('name' => 'colab','id'=>"colab",'value' => '1'))?><?= 1 ?>
                            </td>
                            <?php endif; ?>
                        </tr>
                        <?php endif; ?>
                
            </tbody>
        </table>
    </section>
    <br><br>

    <section class="col-xs-12 col-sm-9 profil-form">
        
        <legend>Choisir votre type de paiement</legend>

        <?= validation_errors('<div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><div class="alert alert-danger">', '</div></div></div>'); ?>

        <fieldset>
            <legend>Type de paiement</legend>

            <div class="">
                <?= form_label('Sélectionnez un mode paiement', 'paiement', array('class' => 'col-xs-12 col-sm-4')); ?>
            </div>

            <div class="col-xs-12 col-sm-8">
                 <!-- Set up a container element for the button -->
    <div id="paypal-button-container"></div>

<!-- Include the PayPal JavaScript SDK -->
<script src="https://www.paypal.com/sdk/js?client-id=sb&currency=EUR"></script>

<script>
   // var price = document.getElementById('price').value;
    // Render the PayPal button into #paypal-button-container
    paypal.Buttons({

        // Set up the transaction
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        currency_code: 'EUR',
                        value: '0.01'
                    }
                }]
            });
        },

        // Finalize the transaction
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                // Show a success message to the buyer
                //alert('Transaction completed by ' + details.payer.name.given_name + '!' );
                //window.location.href = "<?= site_url('panier/reservationsuccess'); ?>";
                $("#myForm").submit(); 
            });
        }


    }).render('#paypal-button-container');
</script>
            </div>

        </fieldset>

        <a href="<?= site_url('/reservations'); ?>" class="contact-button">Retour</a> - <input type="submit"  value="Valider votre commande" style="display:none" class="contact-button">
        <?= form_close( '' ); ?>


    </section>



</div>

