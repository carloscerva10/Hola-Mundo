<?php
    get_header();
/**
* Template name: t_getCurrentSpeeds
*/
    $segmentId = 1;
    $roadwayType = 2;

    /* LLAMADA A METODO QUE TRATA SERVICIOS: GetCurrentSpeeds */
    $serviceData = I77ServicesClient::getCurrentSpeeds($segmentId, $roadwayType);
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
            <div class="col-md-4"></div>
            <div class="col-md-1">FacilityId</div>
            <div class="col-md-1">I77</div>
            <div class="col-md-8"></div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-1">SegmentId</div>
            <div class="col-md-3"><?php echo $segmentId; ?></div>
            <div class="col-md-6"></div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-1">Roadway</div>
            <div class="col-md-3"><?php echo $roadwayType;?></div>
            <div class="col-md-6"></div>
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
            echo '[' .$serviceData. '] Validation error in getCurrentSpeeds service. Segment incorrect.';
            break;
          case 2:
          case 3:
            echo '[' .$serviceData. '] Validation error in getCurrentSpeeds service. Roadway incorrect.';
            break;
          case 24:
            echo '[' .$serviceData. '] Communication error in call to getCurrentSpeeds service.';
            break;
          case 5:
            echo '[' .$serviceData. '] Error request in getCurrentSpeeds service.';
            break;
          default:
            echo '[' .$serviceData. '] Indefinite error in service getCurrentSpeeds.';
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
                <div class="col-md-12">&nbsp;</div>
            </div>
            <div class="row">
                <div class="col-md-2">Nº</div>
                <div class="col-md-2">Speed</div>
                <div class="col-md-2">SegmentId</div>
                <div class="col-md-2">Roadway</div>
                <div class="col-md-2">DataTimestamp</div>
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-2">&nbsp;</div>
            </div>

<?php
    foreach ($serviceData['speeds'] as $key => $recordRate) {  ?>
        <div class="row">
            <div class="col-md-2"><?php echo  ($key + 1);?></div>
            <div class="col-md-2"><?php echo  $recordRate['currentSpeed'];?></div>
            <div class="col-md-2"><?php echo  $recordRate['segmentId'];?></div>
            <div class="col-md-2"><?php echo  $recordRate['roadwayType'];?></div>
            <div class="col-md-2"><?php echo  $recordRate['dataTimestamp'];?></div>
            <div class="col-md-2">&nbsp;</div>
            <div class="col-md-2">&nbsp;</div>
        </div>
    <?php
    } ?>
    </div>
<?php
  }
  get_footer();
?>