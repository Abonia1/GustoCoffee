<div class="container">
    <section>
        <h1>Reservez votre place en avance</h1>

        <p>Attention vous devez inscrire dans notre site avant de finaliser votre Reservation
        </p>
    </section>

    <section>
        <?= form_open( 'reservation' ); ?>

        <?= validation_errors('<div class="row"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><div class="alert alert-danger">', '</div></div></div>'); ?>


        <div class="row">
            <div class="col-xs-12 col-sm-3">
                <?= form_label('Date *', 'Date'); ?>
                <?= form_input(array('name' => 'Date', 'placeholder' => 'Date de reservation', 'id' => 'datepicker', 'class' => (empty(form_error('Date')) ? "" : "has-error") . "col-xs-12 col-sm-12 col-md-12 col-lg-12", 'value' => set_value('Date'))); ?>
            </div>

            <div class="col-xs-12 col-sm-3">
                <?= form_label('Time *', 'Time'); ?>
                <?= form_input(array('name' => 'Time', 'placeholder' => 'Heure de reservation ', 'id' => 'timepicker', 'class' => (empty(form_error('Time')) ? "" : "has-error") . "col-xs-12 col-sm-12 col-md-12 col-lg-12", 'value' => set_value('Time'))); ?>
            </div>


            <div class="col-xs-12 col-sm-3">
                <?= form_label('Number of people *', 'quantity'); ?>
                <input type='button' value='-' field='quantity'
                    class='col-xs-12 col-sm-12 col-md-12 col-lg-12 qtyminus' />
                <?= form_input(array('name' => 'quantity', 'placeholder' => 'Nombre de persons', 'id' => 'quantity', 'class' => (empty(form_error('quantity')) ? "" : "quantity") . " col-xs-12 col-sm-12 col-md-12 col-lg-12", 'value' => set_value('quantity'))); ?>
                <input type='button' value='+' field='quantity'
                    class='col-xs-12 col-sm-12 col-md-12 col-lg-12 qtyplus' />

            </div>

            <div class="col-xs-12 col-sm-3">
                <button onclick="show()" class = 'col-xs-12 col-sm-12 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6 contact-button'>
                Check Availability</button>
            </div>
        </div>
        <div class="row" style="display:none;" id="Plan">
            <!-- <div id="Plan" class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="display:none;">
            

            </div> -->
            <h1>Try to select your seat</h1>
            <img id="planImg" src="assets/images/plan.svg" >
                

            
        

        <?= form_submit('envoyer', 'Continue Reservation', array('class' => 'col-xs-12 col-sm-12 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6 contact-button')); ?>
       <?= form_close(); ?>
       </div>
    </section>
</div>
<script type="text/javascript" src="assets/js/reservation.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>