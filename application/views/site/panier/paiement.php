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
                    <th>Nombre de personnes</th>
                    <th>Numéro de table</th>
                    <th>Total</th>
                    
                </tr>
            </thead>

            <tbody>
                <?php if(isset($date) && isset($time) && isset($quantity)) : ?>
                    
                        <tr>
                            <td>
                            <?= $date; ?>
                            </td>

                            <td>
                            <?= $time; ?>
                            </td>

                            <td>
                            <?= $quantity; ?>
                            </td>
                            <td>
                            <?= $tablenumber; ?>
                            </td>
                            <td>
                            <?= $quantity*50; ?>€
                            </td>
      
                        </tr>
                    
                <?php endif; ?>
            </tbody>
        </table>
    </section>
    <br><br>

    <section class="col-xs-12 col-sm-9 profil-form">
        <?= form_open( '' , array('autocomplete' => 'off')); ?>
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
<script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD"></script>

<script>
    // Render the PayPal button into #paypal-button-container
    paypal.Buttons({

        // Set up the transaction
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '0.01'
                    }
                }]
            });
        },

        // Finalize the transaction
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                // Show a success message to the buyer
                alert('Transaction completed by ' + details.payer.name.given_name + '!' );
                window.location.href = "<?= site_url('site/reservationsuccess'); ?>";
            });
        }


    }).render('#paypal-button-container');
</script>
            </div>

        </fieldset>

        <a href="<?= site_url('site/reservations'); ?>" class="contact-button">Retour</a> - <input type="submit" style="display:none" value="Valider votre commande" class="contact-button">
        <?= form_close( '' ); ?>


    </section>



</div>
