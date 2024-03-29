<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>

     <?php include('../connection/connection.php') ?>
</head>
<body>
     <?php 
     $sql = "SELECT * FROM `refinery` WHERE `refinery_id` = 1";
     $res = mysqli_query($conn, $sql);
     
     include "phpqrcode/qrlib.php";
     $png_temp_dir = 'temp/';
     if(!file_exists($png_temp_dir)){
          mkdir($png_temp_dir);
     }
     while ($row = mysqli_fetch_assoc($res)) {
          $codeString = $row['sample_label']."\n";
          $codeString .= $row['supply_location']."\n";
          $codeString .= $row['regional_office']."\n";
          $codeString .= $row['retail_outletname']."\n";
          $codeString .= $row['location']."\n";
          $codeString .= $row['oil_companyname']."\n";
          $codeString .= $row['product_name']."\n";
          $codeString .= $row['sample_source']."\n";
          $codeString .= $row['dispense_unitno']."\n";
          $codeString .= $row['sample_drawndt']."\n";
          $codeString .= $row['sample_drawntime']."\n";
          $codeString .= $row['tank_no']."\n";
          $codeString .= $row['den_rec_denregister']."\n";
          $codeString .= $row['den_obs_inspofficer']."\n";
          $codeString .= $row['p_lreceipt_invoicedt']."\n";
          $codeString .= $row['lastreceipt_tanklorryno']."\n";
          $codeString .= $row['woodbox_plastsealno']."\n";
          $codeString .= $row['cash_memodt']."\n";

          $filename = $png_temp_dir.'test'.md5($codeString).'.png';
          QRcode::png(@$codeString, $filename);

          echo '<img src="'. $png_temp_dir. basename($filename). '" /> <hr>';
     }
     

     ?>
</body>
</html>