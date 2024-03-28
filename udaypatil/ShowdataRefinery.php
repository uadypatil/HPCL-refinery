<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- title -->
     <title>Displaying data || Refinery</title>

     <!-- css file -->
     <style>
          /* table-div */
          .table-div {
               overflow-x: scroll;
               border: 1px solid rgb(61, 61, 61);
          }

          /* table */
          .data-table,
          .data-table tr,
          .data-table td,
          .data-table th {
               border: 1px solid rgb(61, 61, 61);
               text-align: center;
               font-size: 14px;
          }

          /* title div */
          .title-div {
               padding-left: 15px;
               padding-right: 15px;
          }

          /* title */
          .title-div .title {
               display: inline-block
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

          @media screen and (max-width: 900px) {

               /* title */
               .title-div {
                    height: fit-content;
                    display: grid;
                    padding-top: 15px;
                    padding-bottom: 15px;
               }

               .title-div .title {}

               /* search bar div */
               .title-div .search-bar-div {
                    float: left;
                    margin-top: 2px;
               }

          }

          .title-div .search-bar-div #search-btn {
               margin-left: 5px;
          }
     </style>
     <!-- bootstrap -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


     <!-- php connection file import -->
     <?php include('connection/connection.php') ?>
     <!-- Connection.php file is for database connection -->
     <?php include('Session/Session.php') ?>
     <!-- session.php file is for including session variables in file -->
</head>
<!-- php code -->
<?php
if (isset($_GET["username"])) { // will check the username is provided or not if not then it terminates program
     $name = $_GET["username"]; // usernaem is saved in $name variable

     // echo "username: " . $name . "<br>";
     // echo "session value: " . $_SESSION["name"] . "<br>";
     if ($_SESSION["name"] != "") { // if name variable in sessions is not empty
          if ($_SESSION["name"] != $_GET['username']) { // if name variable of session and provided username value is not similar
               die("<script>alert('Invalid creadentials or You don't allowed to access');</script>"); // terminate code


          } // if values of username from session and provided username are same then the file is accessible
     } else {
          die("Data is not accessible..!"); // terminates the program if session['name'] is empty
     }

     // session timeout code here
     // if ($_SESSION["expiry"] + 5 > time()) {
     //      if (session_status() == PHP_SESSION_ACTIVE) {     // if session is active
     //           session_unset();         // unsets values of session
     //           session_destroy();       // destroys session
     //           header("Location: http://localhost/eaglebyte/hpcl/refinery/login.php");    // redirect to login page
     //      }
     // }

     if (isset($_SESSION["expiry"]) && $_SESSION["expiry"] > time()) {
          // Session is still active, update last activity time
          $_SESSION["last_activity"] = time();
     } else {
          // Session has expired or not set, destroy the session and redirect to login page
          session_unset(); // Unset all session variables
          session_destroy(); // Destroy the session
          header("Location: http://localhost/eaglebyte/hpcl/refinery/login.php"); // Redirect to login page
          exit; // Stop further execution
     }


} else { // terminates the program if username is not provided
     die("Data is not accessible..!");
}

// to timeout the session session.gc_maxlifetime is used. 1800 = 30 minutes* 60 seconds;
// ini_set('session.gc_maxlifetime', 20);

if (isset($_POST['logout'])) { // logout button
     if (session_status() == PHP_SESSION_ACTIVE) {
          // distroys the session if logout button is clicked
          session_destroy();
          // redirect to the login page
          header("Location: http://localhost/eaglebyte/hpcl/refinery/login.php");
     }
}
?>

<body>
     <!-- All the data is in hero section  -->
     <section class="hero">
          <main class="container mt-5">
               <!-- logout button div -->
               <div class="logout-btn-div m-2 ms-0">
                    <!-- form for logout button -->
                    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                         <!-- logout button (if logged out then session is distroyed) -->
                         <input type="submit" value="Logout" name="logout" class="btn btn-primary">
                    </form>
               </div>
               <div class="table-main-div">
                    <!-- title div(Header title ang search bar) -->
                    <div class="title-div bg-primary">
                         <div class="title">
                              <h3 class="text-left text-light">Displaying available refineries</h3>
                         </div>
                         <div class="search-bar-div">
                              <!-- search bar form (we can search the refinery by using refinery id)-->
                              <form action="<?php echo (htmlspecialchars($_SERVER['PHP_SELF'])); ?>" method="post"
                                   class="form d-flex">
                                   <!-- input field for getting refinery id -->
                                   <input type="search" name="search-box" id="search-box" class="form-control"
                                        placeholder="Refinery id">
                                   <!-- submit button -->
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
                    <!-- data displaying table -->
                    <div class="table-div">
                         <table class="container data-table table-striped-columns table-hover table-responsive table"
                              border="1">
                              <tr>
                                   <th>Sample label</th>
                                   <th>Sypply location</th>
                                   <th>Regional lffice</th>
                                   <th>Name of retail outlet</th>
                                   <th>Location</th>
                                   <th>Oil company name</th>
                                   <th>Product name</th>
                                   <th>Source of sample</th>
                                   <th>Dispensing unit no</th>
                                   <th>Tank no</th>
                                   <th>Sample drawn date</th>
                                   <th>sample drawn time</th>
                                   <th>density recoded at 15<sup>o</sup>C in density register</th>
                                   <th>density observed at 15<sup>o</sup>C by inspecting officer </th>
                                   <th>Invoice date no of last receipt of product</th>
                                   <th>Tank lorry no of last receipt</th>
                                   <th>Plastic seal no of wooden box</th>
                                   <th>Cash memo date</th>
                                   <th>Report</th>
                              </tr>

                              <?php
                              if (isset($_POST['search-btn'])) { // if record is searching
                                   $ref_id = intval($_POST['search-box']);
                                   // select query for selecting particular data from refinery table
                                   $sql_search = "SELECT `refinery_id`,`sample_label`, `supply_location`, `regional_office`,
                                    `retail_outletname`, `location`, `oil_companyname`, `product_name`, `sample_source`, 
                                    `dispense_unitno`, `sample_drawndt`, `sample_drawntime`, `tank_no`, `den_rec_denregister`, 
                                    `den_obs_inspofficer`, `p_lreceipt_invoicedt`, `lastreceipt_tanklorryno`, `woodbox_plastsealno`, 
                                    `cash_memodt`,`delete_status` FROM `refinery` WHERE `refinery_id`=$ref_id";

                                   // run query and store result of searched data in res_search variable
                                   $res_search = mysqli_query($conn, $sql_search);
                                   if ($res_search) {
                                        // if multiple records available then all records will be printed
                                        while ($row = mysqli_fetch_assoc($res_search)) {
                                             if ($row['delete_status'] != 9) {
                                                  // bellow commented code is just similar to displaying data but little confusing so replaced
                                                  // echo "
                                                  // <tr>
                                                  // <td>" . $row['sample_label'] . "</td>
                                                  // <td>" . $row['supply_location'] . "</td>
                                                  // <td>" . $row['regional_office'] . "</td>
                                                  // <td>" . $row['retail_outletname'] . "</td>
                                                  // <td>" . $row['location'] . "</td>
                                                  // <td>" . $row['oil_companyname'] . "</td>
                                                  // <td>" . $row['product_name'] . "</td>
                                                  // <td>" . $row['sample_source'] . "</td>
                                                  // <td>" . $row['dispense_unitno'] . "</td>
                                                  // <td>" . $row['sample_drawndt'] . "</td>
                                                  // <td>" . $row['sample_drawntime'] . "</td>
                                                  // <td>" . $row['tank_no'] . "</td>
                                                  // <td>" . $row['den_rec_denregister'] . "</td>
                                                  // <td>" . $row['den_obs_inspofficer'] . "</td>
                                                  // <td>" . $row['p_lreceipt_invoicedt'] . "</td>
                                                  // <td>" . $row['lastreceipt_tanklorryno'] . "</td>
                                                  // <td>" . $row['woodbox_plastsealno'] . "</td>
                                                  // <td>" . $row['cash_memodt'] . "</td>
                                                  // </tr>";
                                                  ?>
                                                  <tr>
                                                       <td>
                                                            <?php echo $row['sample_label']; ?>
                                                            <!-- pinting sample label -->
                                                       </td>
                                                       <td>
                                                            <?php echo $row['supply_location']; ?>
                                                            <!-- printing supply location -->
                                                       </td>
                                                       <td>
                                                            <?php echo $row['regional_office']; ?>
                                                            <!-- printing regional office -->
                                                       </td>
                                                       <td>
                                                            <?php echo $row['retail_outletname']; ?>
                                                            <!-- priting retail outlet name -->
                                                       </td>
                                                       <td>
                                                            <?php echo $row['location']; ?>
                                                            <!-- Location -->
                                                       </td>
                                                       <td>
                                                            <?php echo $row['oil_companyname']; ?>
                                                            <!-- Oil company name -->
                                                       </td>
                                                       <td>
                                                            <?php echo $row['product_name']; ?>
                                                            <!-- product name -->
                                                       </td>
                                                       <td>
                                                            <?php echo $row['sample_source']; ?>
                                                            <!-- source of sample -->
                                                       </td>
                                                       <td>
                                                            <?php echo $row['dispense_unitno']; ?>
                                                            <!-- dispense unit number -->
                                                       </td>
                                                       <td>
                                                            <?php echo $row['sample_drawndt']; ?>
                                                            <!-- Sample drawn date -->
                                                       </td>
                                                       <td>
                                                            <?php echo $row['sample_drawntime']; ?>
                                                            <!-- sample drawn time -->
                                                       </td>
                                                       <td>
                                                            <?php echo $row['tank_no']; ?>
                                                            <!-- Tank no -->
                                                       </td>
                                                       <td>
                                                            <?php echo $row['den_rec_denregister']; ?>
                                                            <!-- Density registered at 15deg C in density register -->
                                                       </td>
                                                       <td>
                                                            <?php echo $row['den_obs_inspofficer']; ?>
                                                            <!-- Density observed at 15deg C by inspecting officer -->
                                                       </td>
                                                       <td>
                                                            <?php echo $row['p_lreceipt_invoicedt']; ?>
                                                            <!--  -->
                                                       </td>
                                                       <td>
                                                            <?php echo $row['lastreceipt_tanklorryno']; ?>
                                                            <!-- Tank lorry number of last receipt -->
                                                       </td>
                                                       <td>
                                                            <?php echo $row['woodbox_plastsealno']; ?>
                                                            <!-- plastic seal number on wooden box -->
                                                       </td>
                                                       <td>
                                                            <?php echo $row['cash_memodt']; ?>
                                                            <!-- cash memo date -->
                                                       </td>
                                                       <td><a href="RefineryReport.php?id=<?php echo $row['refinery_id'] ?>"
                                                                 class="btn text-primary">View</a></td>
                                                       <!-- View button for viewing refinery report -->
                                                  </tr>
                                                  <?php
                                             }
                                        }
                                   }
                              } else {
                                   // if record is not searching (actual state)
                                   // selecting all records from refinery table
                                   $sql = "SELECT  `refinery_id`,`sample_label`, `supply_location`, `regional_office`, `retail_outletname`, `location`, `oil_companyname`, `product_name`, `sample_source`, `dispense_unitno`, `sample_drawndt`, `sample_drawntime`, `tank_no`, `den_rec_denregister`, `den_obs_inspofficer`, `p_lreceipt_invoicedt`, `lastreceipt_tanklorryno`,  `woodbox_plastsealno`, `cash_memodt`, `delete_status` FROM `refinery`";
                                   $res = mysqli_query($conn, $sql); // executing query
                                   if ($res) {

                                        while ($row = mysqli_fetch_assoc($res)) {
                                             if ($row['delete_status'] != 9) {
                                                  //      echo "
                                                  // <tr>
                                                  // <td>" . $row['sample_label'] . "</td>
                                                  // <td>" . $row['supply_location'] . "</td>
                                                  // <td>" . $row['regional_office'] . "</td>
                                                  // <td>" . $row['retail_outletname'] . "</td>
                                                  // <td>" . $row['location'] . "</td>
                                                  // <td>" . $row['oil_companyname'] . "</td>
                                                  // <td>" . $row['product_name'] . "</td>
                                                  // <td>" . $row['sample_source'] . "</td>
                                                  // <td>" . $row['dispense_unitno'] . "</td>
                                                  // <td>" . $row['sample_drawndt'] . "</td>
                                                  // <td>" . $row['sample_drawntime'] . "</td>
                                                  // <td>" . $row['tank_no'] . "</td>
                                                  // <td>" . $row['den_rec_denregister'] . "</td>
                                                  // <td>" . $row['den_obs_inspofficer'] . "</td>
                                                  // <td>" . $row['p_lreceipt_invoicedt'] . "</td>
                                                  // <td>" . $row['lastreceipt_tanklorryno'] . "</td>
                                                  // <td>" . $row['woodbox_plastsealno'] . "</td>
                                                  // <td>" . $row['cash_memodt'] . "</td>
                                                  // </tr>";
                              
                                                  ?>
                                                  <tr>
                                                       <td>
                                                            <?php echo $row['sample_label']; ?>
                                                       </td>
                                                       <td>
                                                            <?php echo $row['supply_location']; ?>
                                                       </td>
                                                       <td>
                                                            <?php echo $row['regional_office']; ?>
                                                       </td>
                                                       <td>
                                                            <?php echo $row['retail_outletname']; ?>
                                                       </td>
                                                       <td>
                                                            <?php echo $row['location']; ?>
                                                       </td>
                                                       <td>
                                                            <?php echo $row['oil_companyname']; ?>
                                                       </td>
                                                       <td>
                                                            <?php echo $row['product_name']; ?>
                                                       </td>
                                                       <td>
                                                            <?php echo $row['sample_source']; ?>
                                                       </td>
                                                       <td>
                                                            <?php echo $row['dispense_unitno']; ?>
                                                       </td>
                                                       <td>
                                                            <?php echo $row['sample_drawndt']; ?>
                                                       </td>
                                                       <td>
                                                            <?php echo $row['sample_drawntime']; ?>
                                                       </td>
                                                       <td>
                                                            <?php echo $row['tank_no']; ?>
                                                       </td>
                                                       <td>
                                                            <?php echo $row['den_rec_denregister']; ?>
                                                       </td>
                                                       <td>
                                                            <?php echo $row['den_obs_inspofficer']; ?>
                                                       </td>
                                                       <td>
                                                            <?php echo $row['p_lreceipt_invoicedt']; ?>
                                                       </td>
                                                       <td>
                                                            <?php echo $row['lastreceipt_tanklorryno']; ?>
                                                       </td>
                                                       <td>
                                                            <?php echo $row['woodbox_plastsealno']; ?>
                                                       </td>
                                                       <td>
                                                            <?php echo $row['cash_memodt']; ?>
                                                       </td>
                                                       <td><a href="RefineryReport.php?id=<?php echo $row['refinery_id'] ?>"
                                                                 class="btn text-primary">View</a></td>
                                                  </tr>
                                                  <?php
                                             }
                                        }
                                   }

                              }

                              ?>
                         </table>
                    </div>
               </div>
          </main>
     </section>

</body>

</html>