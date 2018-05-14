
<?php
    get_header();

    $dateIn = new DateTime('2018-04-30T23:44:31.000');
    $rateStartDate = date_format($dateIn, 'Y-m-d\TH:i:s.000');

    $vehicleClassId = 2;

    /* LLAMADA A METODO QUE TRATA SERVICIOS: GetRates */
    $serviceData = I77ServicesClient::getRates($rateStartDate, $vehicleClassId);
?>
<p>
<img src="<?php bloginfo('template_url'); ?>/logo_i77.png" alt="logo_i77">
<hr>
    <table class='tab-data'>
      <tr><td colspan="3" align="center"> Test Datasss</td></tr>
      <tr><td>facilityId    </td><td bgcolor='17ED0C'>I77</td></tr>
      <tr><td>rateStartDate </td><td bgcolor="
        <?php if($serviceData === 1) echo 'red';
              else echo '17ED0C';?>"><?php echo $rateStartDate; ?></td></tr>
      <tr><td>vehicleClassId</td><td bgcolor="
        <?php if($serviceData === 2) echo 'red';
              else echo '17ED0C';?>"><?php echo $vehicleClassId;?></td></tr>
    </table>
<?php
    if (is_int($serviceData)) {
?>      <p class="error"><?php
        switch ($serviceData) {
          case 1:
            echo '<br>['.$serviceData.']Validation error in getRates service. 
            Date entered not is included within 180 days passed until the current date.';
            break;
          case 2:
            echo '<br>['.$serviceData.']Validation error in getRates service. Vehicle 
                class incorrect.';
            break;
          case 3:
            echo '<br>['.$serviceData.']Communication error in call to getRates service.';
            break;
          case 4:
            echo '<br>['.$serviceData.']Error request in getRates service.';
            break;
          default:
            echo '<br>['.$serviceData.']Indefinite error in service get_rates.';
            break;
        } ?></p><?php
    } else {  
        $dateHoy = date('Y-m-d\TH:i:s.000');
        //echo "<br>ES UN ARREGLO: " .$serviceData['description']. "<br>"; ?>
        <p />
        <table>
            <tr><td colspan="8" align="center">
            <table cellpadding="5"><tr><td align="center">R A T E S</td></tr>
                   <tr><td align="center"><?php echo $rateStartDate." - ".$dateHoy;?></td></tr></table>
            </tr>
            <tr align="center">
                <td>Nº</td>
                <td>rateId</td>
                <td>gantryId</td>
                <td>vehicleClassId</td>
                <td>rateStartDate</td>
                <td>rateEndDate</td>
                <td>rateAmountTag</td>
                <td>rateAmountVideo</td>
            </tr>

<?php
    foreach ($serviceData['rates'] as $key => $recordRate) {  ?>
        <tr>
            <td align="center"><?php echo  ($key + 1);?></td>
            <td align="center"><?php echo  $recordRate['rateId'];?></td>
            <td align="center"><?php echo  $recordRate['gantryId'];?></td>
            <td align="center"><?php echo  $recordRate['vehicleClassId'];?></td>
            <td align="center"><?php echo  $recordRate['rateStartDate'];?></td>
            <td align="center"><?php echo  $recordRate['rateEndDate'];?></td>
            <td align="right" ><?php echo  $recordRate['rateAmountTag'];?></td>
            <td align="right" ><?php echo  $recordRate['rateAmountVideo'];?></td>
        </tr>
    <?php
    } ?>
    </table>
<?php
}
get_footer();
?>
