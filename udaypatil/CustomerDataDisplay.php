<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- title -->
     <title>Customer query report</title>

     <!-- bootstrap -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

     <!-- style -->
     <style>
          /* table div style */
          .table-div {
               overflow-x: scroll;
               border: 1px solid rgb(45, 45, 45);
          }

          .data-table {
               width: 100%;
          }

          .data-table,
          .data-table th,
          .data-table td {
               border: 1px solid rgb(45, 45, 45);
               font-size: 14px;
          }

          /* title div */
          .title-div {
               padding-left: 15px;
               padding-right: 15px;
          }

          /* title */
          .title-div .title {
               display: inline-block;

          }

          .title-div .title h3 {
               text-align: center;
          }

          /* search bar div */
          .title-div .search-bar-div {
               display: inline-block;
               float: right;
               margin-top: 2px;
          }

          .title-div .search-bar-div #search-btn {
               margin-left: 5px;
          }

          @media screen and (max-width: 900px) {

               /* title */
               .title-div {
                    height: fit-content;
                    display: grid;
                    padding-top: 15px;
                    padding-bottom: 15px;
               }

               /* search bar div */
               .title-div .search-bar-div {
                    float: left;
                    margin-top: 2px;
               }
          }
     </style>


     <!-- php connection file import -->
     <?php include('connection/connection.php') ?>
     <?php include('Session/Session.php') ?>

</head>
<!-- php code -->
<?php
if (isset($_GET["username"])) {
     $name = $_GET["username"];

     // echo "username: " . $name . "<br>";
     // echo "session value: " . $_SESSION["name"] . "<br>";
     if ($_SESSION["name"] != "") {
          if ($_SESSION["name"] != $_GET['username']) {
               die("<script>alert('Invalid creadentials or You don't allowed to access');</script>");
          }
     } else {
          die("Data is not accessible..!");
     }
} else {
     die("Data is not accessible..!");
}
if (isset($_POST['logout'])) {
     if(session_status() == PHP_SESSION_ACTIVE){
          session_destroy();
          header("Location: http://localhost/eaglebyte/hpcl/refinery/login.php");
          
     }
}
?>

<body>
     <!-- hero section -->
     <section class="hero">
          <!-- main -->
          <main class="container mt-5">
               <div class="logout-btn-div m-2 ms-0">
                    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                         <input type="submit" value="Logout" name="logout" class="btn btn-primary">
                    </form>
               </div>
               <div class="title-div bg-primary">
                    <div class="title">
                         <h3 class="text-light">Available Customers</h3>
                    </div>
                    <div class="search-bar-div">
                         <form action="<?php echo (htmlspecialchars($_SERVER['PHP_SELF'])); ?>" method="post"
                              class="form d-flex">
                              <input type="search" name="search-box" id="search-box" class="form-control"
                                   placeholder="Customer id">

                              <button type="submit" value="Search" id="search-btn" name="search-btn"
                                   class="btn btn-light">
                                   <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="blue"
                                        class="bi bi-search" viewBox="0 0 16 16">
                                        <path
                                             d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                   </svg>
                              </button>
                         </form>
                    </div>
               </div>
               <div class="table-div">
                    <table class="data-table">
                         <tr>
                              <th>Customer id</th>
                              <th>Name</th>
                              <th>Mobile number</th>
                              <th style="width: 25%;">query</th>
                              <th style="width: 20%;">Product</th>
                              <th>Date</th>
                              <th>Address</th>
                              <th>Report</th>
                         </tr>
                         <?php
                         if (isset($_POST['search-btn'])) {
                              $ref_id = intval($_POST['search-box']);
                              $sql_search1 = "SELECT customer.id, customer.name, 
                               customer.address, customer.mobile_no,
                               customer.product_name, customer.date, 
                              query_status.query
                              FROM customer INNER JOIN query_status ON customer.id = query_status.customer_id 
                              WHERE customer.id= $ref_id";
                              $sql_search = "SELECT `id`, `name`, `address`, `mobile_no`, `product_name`, `date`, `query`, `delete_status` FROM `customer` WHERE `id`=$ref_id";

                              $res_search = mysqli_query($conn, $sql_search1);
                              if ($res_search) {

                                   while ($row = mysqli_fetch_assoc($res_search)) {

                                        if ($row['delete_status'] != 9) {
                                             echo "
                                             <tr>
                                             <td>" . $row['id'] . "</td>
                                             <td>" . $row['name'] . "</td>
                                             <td>" . $row['mobile_no'] . "</td>
                                             <td>" . $row['query'] . "</td>
                                             <td>" . $row['product_name'] . "</td>
                                             <td>" . $row['date'] . "</td>
                                             <td>" . $row['address'] . "</td>
                                             <td> <a class='btn text-primary' href='customerQueryReport.php?id=" . $row['id'] . "'>View</a> </td> 
                                             </tr>";
                                        }
                                   }
                              }
                         } else {


                              $sql1 = "SELECT customer.id, customer.name, 
                               customer.address, customer.mobile_no,
                               customer.product_name, customer.date, 
                               customer.delete_status, query_status.query
                              FROM customer INNER JOIN query_status ON customer.id = query_status.customer_id";
                              $sql = "SELECT `id`, `name`, `address`, `mobile_no`, `product_name`, `date`, `query`,`delete_status` FROM `customer`";
                              $res = mysqli_query($conn, $sql1);
                              if ($res) {

                                   while ($row = mysqli_fetch_assoc($res)) {
                                        if ($row['delete_status'] != 9) {
                                             // echo "
                                             // <tr>
                                             // <td>" . $row['id'] . "</td>
                                             // <td>" . $row['name'] . "</td>
                                             // <td>" . $row['address'] . "</td>
                                             // <td>" . $row['mobile_no'] . "</td>
                                             // <td>" . $row['product_name'] . "</td>
                                             // <td>" . $row['date'] . "</td>
                                             // <td>" . $row['query'] . "</td>
                                             // <td> <a class='btn text-primary' href='customerQueryReport.php?value=". $row['id'] ."'>View</a> </td>
                         
                                             // </tr>";
                                             ?>
                                             <tr>
                                                  <td>
                                                       <?php echo $row['id'] ?>
                                                  </td>
                                                  <td>
                                                       <?php echo $row['name'] ?>
                                                  </td>
                                                  <td>
                                                       <?php echo $row['mobile_no'] ?>
                                                  </td>
                                                  <td>
                                                       <?php echo $row['query'] ?>
                                                  </td>
                                                  <td>
                                                       <?php echo $row['product_name'] ?>
                                                  </td>
                                                  <td>
                                                       <?php echo $row['date'] ?>
                                                  </td>
                                                  <td>
                                                       <?php echo $row['address'] ?>
                                                  </td>
                                                  <td><a href="CustomerQueryReport.php?id=<?php echo $row['id'] ?>"
                                                            class="btn text-primary">View</a></td>
                                             </tr>
                                             <?php
                                        }
                                   }
                              }

                         }

                         ?>
                    </table>
                    <form action="" method="get">

                    </form>
               </div>
          </main>
     </section>
</body>

</html>