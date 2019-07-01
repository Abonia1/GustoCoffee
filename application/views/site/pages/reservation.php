<div class="container">
    <section>
        <h1>Reservez votre place en avance</h1>

        <p>Attention vous devez inscrire dans notre site avant de finaliser votre Reservation
        </p>
    </section>

    <section>
       


        <div class="row">
            <div class="col-xs-12 col-sm-3">
                <label>Date *</label>
                <?= form_input(array('name' => 'Date', 'placeholder' => 'Date de reservation', 'id' => 'datepicker', 'class' => (empty(form_error('Date')) ? "" : "has-error") . "col-xs-12 col-sm-12 col-md-12 col-lg-12", 'value' => set_value('Date'))); ?>
            </div>

            <div class="col-xs-12 col-sm-3">
                <label>Time *</label>
                <?= form_input(array('name' => 'Time', 'placeholder' => 'Heure de reservation ', 'id' => 'timepicker', 'class' => (empty(form_error('Time')) ? "" : "has-error") . "col-xs-12 col-sm-12 col-md-12 col-lg-12", 'value' => set_value('Time'))); ?>
            </div>


            <div class="col-xs-12 col-sm-3">
                <label>Number of people</label>
                <input type='button' value='-' field='quantity'
                    class='col-xs-12 col-sm-12 col-md-12 col-lg-12 qtyminus' />
                <?= form_input(array('name' => 'quantity', 'placeholder' => 'Nombre de persons', 'id' => 'quantity', 'value'=>'1', 'class' => (empty(form_error('quantity')) ? "" : "quantity") . " col-xs-12 col-sm-12 col-md-12 col-lg-12", 'value' => set_value('quantity'))); ?>
                <input type='button' value='+' field='quantity'
                    class='col-xs-12 col-sm-12 col-md-12 col-lg-12 qtyplus' />

            </div>

            <div class="col-xs-12 col-sm-3">
                <button  id="checkbutton" class = 'col-xs-12 col-sm-12 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6 contact-button'>
                Check Availability</button>
            </div>
        </div>
        <div class="row" style="display:none;" id="Plan">
            <!-- <div id="Plan" class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="display:none;">
            

            </div> -->
            <h1>Try to select your seat</h1>

 
<div class="map" id="map">
        <div class="map__image">
          <svg version="1.1" id="Calque_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 571 620" style="enable-background:new 0 0 571 620;" xml:space="preserve">
            <g>
            <image style="overflow:visible;enable-background:new;" width="587" height="637" id="svg_1" xlink:href="<?= site_url('assets/images/plan2.PNG'); ?>" transform="matrix(0.9438 0 0 0.9438 6 40.4055)"></image>
            <g id="table1">
            <title>Table 1</title>
            <rect id="svg_2" x="34" y="142.5" class="st3" width="33" height="30" onclick="alert('click!')"/>
            <text id="svg_5" transform="matrix(1 0 0 1 43 166.5)" class="st4 st5 unselectable">1</text>
            </g>
            <g id="table5">
            <title>Table 5</title>
            <rect id="svg_6" x="125" y="186.5" class="st3" width="33" height="30"/>
            <text id="svg_7" transform="matrix(1 0 0 1 134 210.5)" class="st4 st5 unselectable">5</text>
            </g>
            <g id="table8">
            <title>Table 8</title>
            <rect id="svg_11" x="209" y="227.5" class="st3" width="33" height="30"/>
            <text id="svg_12" transform="matrix(1 0 0 1 218 251.5)" class="st4 st5">8</text>
            </g>
            <g id="table10">
            <title>Table 10</title>
            <rect id="svg_13" x="299" y="278.5" class="st3" width="33" height="30"/>
            <text id="svg_14" transform="matrix(1 0 0 1 301 302.5)" class="st4 st5">10</text>
            </g>
            <g id="table9">
            <title>Table 9</title>
            <rect id="svg_15" x="208" y="322.5" class="st3" width="33" height="30"/>
            <text id="svg_16" transform="matrix(1 0 0 1 217 346.5)" class="st4 st5">9</text>
            </g>
            <g id="table6">
            <title>Table 6</title>
            <rect id="svg_17" x="122" y="283.5" class="st3" width="33" height="30"/>
            <text id="svg_18" transform="matrix(1 0 0 1 131 307.5)" class="st4 st5">6</text>
            </g>
            <g id="table2">
            <title>Table 2</title>
            <rect id="svg_19" x="33" y="230.5" class="st3" width="33" height="30"/>
            <text id="svg_20" transform="matrix(1 0 0 1 42 254.5)" class="st4 st5">2</text>
            </g>
            <g id="table3">
            <title>Table 3</title>
            <rect id="svg_21" x="34" y="327.5" class="st3" width="33" height="30"/>
            <text id="svg_22" transform="matrix(1 0 0 1 43 351.5)" class="st4 st5">3</text>
            </g>
            <g id="table7">
            <title>Table 7</title>
            <rect id="svg_23" x="123" y="372.5" class="st3" width="33" height="30"/>
            <text id="svg_24" transform="matrix(1 0 0 1 132 396.5)" class="st4 st5">7</text>
            </g>
            <g id="table11">
            <title>Table 11</title>
            <rect id="svg_25" x="70" y="540.5" class="st3" width="33" height="30"/>
            <text id="svg_26" transform="matrix(1 0 0 1 73 564.5)" class="st4 st5">11</text>
            </g>
            <g id="table15">
            <title>Table 15</title>
            <rect id="svg_27" x="462" y="355.5" class="st3" width="33" height="30"/>
            <text id="svg_28" transform="matrix(1 0 0 1 465 379.5)" class="st4 st5">15</text>
            </g>
            <g id="table16">
            <title>Table 16</title>
            <rect id="svg_29" x="465" y="464.5" class="st3" width="33" height="30"/>
            <text id="svg_30" transform="matrix(1 0 0 1 468 488.5)" class="st4 st5">16</text>
            </g>
            <g id="table17">
            <title>Table 17</title>
            <rect id="svg_31" x="465" y="569.5" class="st3" width="33" height="30"/>
            <text id="svg_32" transform="matrix(1 0 0 1 467 593.5)" class="st4 st5">17</text>
            </g>
            <g id="table14">
            <title>Table 14</title>
            <rect id="svg_33" x="496" y="203.5" class="st3" width="33" height="30"/>
            <text id="svg_34" transform="matrix(1 0 0 1 498 227.5)" class="st4 st5">14</text>
            </g>
            <g id="table13">
            <title>Table 13</title>
            <rect id="svg_35" x="391" y="158.5" class="st3" width="33" height="30"/>
            <text id="svg_36" transform="matrix(1 0 0 1 394 182.5)" class="st4 st5">13</text>
            </g>
            <g id="table12">
            <title>Table 12</title>
            <rect id="svg_37" x="495" y="93.5" class="st3" width="33" height="30"/>
            <text id="svg_38" transform="matrix(1 0 0 1 497 117.5)" class="st4 st5">12</text>
            </g>
            <g id="table21">
            <title>Table 21</title>
            <rect id="svg_39" x="110" y="90.5" class="st3" width="33" height="30"/>
            <text id="svg_40" transform="matrix(1 0 0 1 114 114.5)" class="st4 st5">21</text>
            </g>
            <g id="table20"> 
            <title>Table 20</title>
            <rect id="svg_41" x="73" y="81.5" class="st3" width="33" height="30"/>
            <text id="svg_42" transform="matrix(1 0 0 1 76 105.5)" class="st4 st5">20</text>
            </g>
            <g id="table19">
            <title>Table 19</title>
            <rect id="svg_43" x="37" y="69.5" class="st3" width="33" height="30"/>
            <text id="svg_44" transform="matrix(1 0 0 1 40 93.5)" class="st4 st5">19</text>
            </g>
            <g id="table18">
            <title>Table 18</title>
            <rect id="svg_45" x="2" y="63.5" class="st3" width="33" height="30"/>
            <text id="svg_46" transform="matrix(1 0 0 1 4 87.5)" class="st4 st5">18</text>
            </g>
            <g id="table22">
            <title>Table 22</title>
            <rect id="svg_47" x="146" y="100.5" class="st3" width="33" height="30"/>
            <text id="svg_48" transform="matrix(1 0 0 1 149 124.5)" class="st4 st5">22</text>
            </g>
            <g id="table4">
            <title>Table 4</title>
            <rect id="svg_49" x="33" y="417.5" class="st3" width="33" height="30"/>
            <text id="svg_50" transform="matrix(1 0 0 1 42 441.5)" class="st4 st5">4</text>
            </g>
          </g>
          </svg>
        </div>
        <div class="map__list">
          
        </div>
      </div>
        <?= form_open( 'inscription' ); ?>
        <?= form_submit('envoyer', 'Continue Reservation', array('class' => 'col-xs-12 col-sm-12 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6 contact-button')); ?>
       <?= form_close(); ?>
       </div>
    </section>
</div>
<script type="text/javascript" src="assets/js/reservation.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>