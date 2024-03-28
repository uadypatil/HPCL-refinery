<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Title -->
     <title>Customer query report</title>
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


$sql = "SELECT customer.id, customer.name, 
customer.mobile_no, customer.address, 
customer.date, customer.product_name, 
query_status.query, query_status.status 
FROM customer INNER JOIN query_status ON customer.id = query_status.customer_id 
WHERE customer.id= $got_cus_id";

$res = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($res);
if ($res) {
     ?>

     <body>
          <section class="hero">
               <main class=" container">
                    <div class="report-main-div mt-5">
                         <div class="report-title-div">
                              <h2 class="text-primary text-center mt-2">Customer query report</h2>
                         </div>
                         <div class="customer-query pb-5 mb-5">
                              <div class="customer-query-table-div">
                                   <table class="container data-table table-responsive table">
                                        <!--table-borderless"-->
                                        <tr>
                                             <td>Customer id:</td>
                                             <td>
                                                  <?php echo $data['id']; ?>
                                             </td>
                                        </tr>
                                        <tr>
                                             <td>Customer name:</td>
                                             <td>
                                                  <?php echo $data['name']; ?>
                                             </td>
                                        </tr>
                                        <tr>
                                             <td>Mobile number:</td>
                                             <td>
                                                  <?php echo $data['mobile_no']; ?>
                                             </td>
                                        </tr>
                                        <tr>
                                             <td>Address:</td>
                                             <td>
                                                  <?php echo $data['address']; ?>
                                             </td>
                                        </tr>
                                        <tr>
                                             <td>Date:</td>
                                             <td>
                                                  <?php echo $data['date']; ?>
                                             </td>
                                        </tr>
                                        <tr>
                                             <td>Product name:</td>
                                             <td>
                                                  <?php echo $data['product_name']; ?>
                                             </td>
                                        </tr>
                                        <tr>
                                             <td>Query:</td>
                                             <td>
                                                  <?php echo $data['query']; ?>
                                             </td>
                                        </tr>
                                        <tr>
                                             <td>Query status:</td>
                                             <td>
                                                  <?php $status = $data['status'];
                                                  if ($status == "pending") { ?>
                                                       <span style="color:red">
                                                            <?php echo $status; ?>
                                                       </span>
                                                  <?php
                                                  } else {
                                                       echo "<span style='color: green;'>" . $status . "</span>";
                                                  }
                                                  ?>
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
     <?php
} else {
     echo "<script>alert('No query found..!');</script>";
}

?>

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