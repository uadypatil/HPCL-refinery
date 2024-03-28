<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Title -->
     <title>Refinery report</title>
     <!-- bootstrap -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <!-- style -->
     <style>
          .report-main-div {
               border: 1px solid rgb(50, 50, 50);
          }

          .customer-query-table-div table {
               margin: auto;
               margin-top: 5%;
          }

          .customer-query-table-div table tr td {
               width: 200px;
               text-align: left;
               margin: 10px;
               padding-left: 10%;
          }
     </style>


     <!-- php connection file import -->
     <?php include('connection/connection.php') ?>
</head>
<!-- php code insert here -->
<?php
$got_cus_id = $_GET['id'];
//$got_cus_id = 1;


$sql = "SELECT `refinery_id`, `sample_label`, `supply_location`, 
`regional_office`, `retail_outletname`, `location`, 
`oil_companyname`, `product_name`, `sample_source`, 
`dispense_unitno`, `sample_drawndt`, `sample_drawntime`, 
`tank_no`, `den_rec_denregister`, `den_obs_inspofficer`, 
`p_lreceipt_invoicedt`, `lastreceipt_tanklorryno`, `cash_memono`, 
`woodbox_plastsealno`, `cash_memodt`, `delete_status` FROM `refinery` WHERE `refinery_id` = $got_cus_id";

$res = mysqli_query($conn, $sql);
$data = mysqli_fetch_row($res);
if ($res) {
     ?>

     <body>
          <section class="hero">
               <main class=" container">
                    <div class="report-main-div mt-5">
                         <div class="report-title-div">
                              <h2 class="text-primary text-center mt-2">Refinery report</h2>
                         </div>
                         <div class="customer-query pb-5 mb-5">
                              <div class="customer-query-table-div">
                                   <table class="container data-table table-responsive table">
                                        <!--table-borderless"-->
                                        <tr>
                                             <td>Refinery id:</td>
                                             <td>
                                                  <?php echo $data[0]; ?>
                                             </td>
                                        </tr>
                                        <tr>
                                             <td>Sampal label:</td>
                                             <td>
                                                  <?php echo $data[1]; ?>
                                             </td>
                                        </tr>
                                        <tr>
                                             <td>Supply location:</td>
                                             <td>
                                                  <?php echo $data[2]; ?>
                                             </td>
                                        </tr>
                                        <tr>
                                             <td>Regional office:</td>
                                             <td>
                                                  <?php echo $data[3]; ?>
                                             </td>
                                        </tr>
                                        <tr>
                                             <td>Retail outlet name:</td>
                                             <td>
                                                  <?php echo $data[4]; ?>
                                             </td>
                                        </tr>
                                        <tr>
                                             <td>Location:</td>
                                             <td>
                                                  <?php echo $data[5]; ?>
                                             </td>
                                        </tr>
                                        <tr>
                                             <td>Oil company name:</td>
                                             <td>
                                                  <?php echo $data[6]; ?>
                                             </td>
                                        </tr>
                                        <tr>
                                             <td>Product name:</td>
                                             <td>
                                                  <?php echo $data[7]; ?>
                                             </td>
                                        </tr>
                                        <tr>
                                             <td>Source of sample:</td>
                                             <td>
                                                  <?php echo $data[8]; ?>
                                             </td>
                                        </tr>
                                        <tr>
                                             <td>Dispense unit no:</td>
                                             <td>
                                                  <?php echo $data[9]; ?>
                                             </td>
                                        </tr>
                                        <tr>
                                             <td>Sample drawn date:</td>
                                             <td>
                                                  <?php echo $data[10]; ?>
                                             </td>
                                        </tr>
                                        <tr>
                                             <td>Sampal drawn time:</td>
                                             <td>
                                                  <?php echo $data[11]; ?>
                                             </td>
                                        </tr>
                                        <tr>
                                             <td>Tank no:</td>
                                             <td>
                                                  <?php echo $data[12]; ?>
                                             </td>
                                        </tr>
                                        <tr>
                                             <td>Density at 15<sup>o</sup>C as recorded in density register:</td>
                                             <td>
                                                  <?php echo $data[13]; ?>
                                             </td>
                                        </tr>
                                        <tr>
                                             <td>Density at 15<sup>o</sup>C observed by inspecting officer:</td>
                                             <td>
                                                  <?php echo $data[14]; ?>
                                             </td>
                                        </tr>
                                        <tr>
                                             <td>Invoice date of last receipt of product:</td>
                                             <td>
                                                  <?php echo $data[15]; ?>
                                             </td>
                                        </tr>
                                        <tr>
                                             <td>Tank lorry number of last receipt:</td>
                                             <td>
                                                  <?php echo $data[16]; ?>
                                             </td>
                                        </tr>
                                        <tr>
                                             <td>Cash memo number:</td>
                                             <td>
                                                  <?php echo $data[17]; ?>
                                             </td>
                                        </tr>
                                        <tr>
                                             <td>Plastic seal number of wooden box:</td>
                                             <td>
                                                  <?php echo $data[18]; ?>
                                             </td>
                                        </tr>
                                        <tr>
                                             <td>Cash memo date:</td>
                                             <td>
                                                  <?php echo $data[19]; ?>
                                             </td>
                                        </tr>
                                        <tr>
                                             <td><a href="" class="btn btn-light border-primary text-primary">Back</a></td>
                                             <td></td>
                                        </tr>
                                   </table>
                              </div>
                         </div>
                    </div>
               </main>
          </section>
     <?php } ?>

</body>

</html>


<!-- inner join query
//without where clause
select customer.id,
customer.name,
customer.mobile_no,
customer.address,
customer.date,
customer.product_name,
query_status.query,
query_status.status from customer INNER JOIN query_status on customer.id = query_status.customer_id;

// with where clause
select customer.id,
customer.name,
customer.mobile_no,
customer.address,
customer.date,
customer.product_name,
query_status.query,
query_status.status from customer INNER JOIN query_status on customer.id = query_status.customer_id
where customer.id=1;


---->