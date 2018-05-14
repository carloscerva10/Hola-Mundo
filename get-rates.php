<?php
    get_header();
/**
* Template name: t_getRates
*/
    $dateIn = new DateTime('2018-04-30T23:44:31.000');
    $rateStartDate = date_format($dateIn, 'Y-m-d\TH:i:s.000');

    $vehicleClassId = 2;

    /* LLAMADA A METODO QUE TRATA SERVICIOS: GetRates */
    $serviceData = I77ServicesClient::getRates($rateStartDate, $vehicleClassId);
?>
<p>
    <div class='container'>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-7"><h4>Input - <?php the_title(); ?></h4></div>
            <div class="col-md-2"></div>
        </div>
        <div class="row">
            <div class="col-md-12">&nbsp;</div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-1">FacilityId</div>
            <div class="col-md-1">I77</div>
            <div class="col-md-7"></div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-1">StartDate</div>
            <div class="col-md-3"><?php echo $rateStartDate; ?></div>
            <div class="col-md-5"></div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-1">VehicleId</div>
            <div class="col-md-3"><?php echo $vehicleClassId;?></div>
            <div class="col-md-5"></div>
        </div>
        <div class="row">
            <div class="col-md-12">&nbsp;</div>
        </div>
    </div>
<?php
    if (is_int($serviceData)) {
?>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-3 alert alert-danger" role="alert">
<?php
        switch ($serviceData) {
          case 1:
            echo '[' .$serviceData. '] Validation error in getRates service. 
            Date entered not is included within 180 days passed until the current date.';
            break;
          case 2:
            echo '[' .$serviceData. '] Validation error in getRates service. Vehicle class incorrect.';
            break;
          case 3:
            echo '[' .$serviceData. '] Communication error in call to getRates service.';
            break;
          case 4:
            echo '[' .$serviceData. '] Error request in getRates service.';
            break;
          default:
            echo '[' .$serviceData. '] Indefinite error in service get_rates.';
            break;
        } ?>
            </div>
            <div class="col-md-5"></div>
        </div>
        <?php
    } else {  ?>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-3 alert alert-primary" role="alert">Correct process!!!
            </div>
            <div class="col-md-5"></div>
        </div>
<?php
        $dateHoy = date('Y-m-d\TH:i:s.000');
?>
        <div class="container">

            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-7"><h4>Output - <?php the_title(); ?></h4></div>
                <div class="col-md-2"></div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-9"></div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-7"><h6><?php echo 'Period:&nbsp;&nbsp;&nbsp;' .$rateStartDate."&nbsp;&nbsp;to&nbsp;&nbsp;".$dateHoy;?></h6></div>
                <div class="col-md-4"></div>
            </div>
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
            <div class="row">
                <div class="col-md-1">Nº</div>
                <div class="col-md-1">RateId</div>
                <div class="col-md-1">GantryId</div>
                <div class="col-md-1">VehicleId</div>
                <div class="col-md-2">StartDate</div>
                <div class="col-md-2">EndDate</div>
                <div class="col-md-1">AmountTag</div>
                <div class="col-md-1">AmountVideo</div>
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-1">&nbsp;</div>
            </div>

<?php
    foreach ($serviceData['rates'] as $key => $recordRate) {  ?>
        <div class="row">
            <div class="col-md-1"><?php echo  ($key + 1);?></div>
            <div class="col-md-1"><?php echo  $recordRate['rateId'];?></div>
            <div class="col-md-1"><?php echo  $recordRate['gantryId'];?></div>
            <div class="col-md-1"><?php echo  $recordRate['vehicleClassId'];?></div>
            <div class="col-md-2"><?php echo  $recordRate['rateStartDate'];?></div>
            <div class="col-md-2"><?php echo  $recordRate['rateEndDate'];?></div>
            <div class="col-md-1"><?php echo  $recordRate['rateAmountTag'];?></div>
            <div class="col-md-1"><?php echo  $recordRate['rateAmountVideo'];?></div>
            <div class="col-md-1">&nbsp;</div>
            <div class="col-md-1">&nbsp;</div>
        </div>
    <?php
    } ?>
    </div>
<?php
  }
  get_footer();
?>