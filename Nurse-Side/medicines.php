<?php
include('./includes/db_conn.php');
session_start();

if (!isset($_SESSION['emp_id']) || !isset($_SESSION['username'])) {
  //redirect to login
  header("location: index.php");
}


$fetchAllMedicine = mysqli_query($conn1, "SELECT * FROM `medicine`");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="./assets/favcon.png" />
  <title>SMRMS | NURSE | Medicines</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

  <link rel="stylesheet" href="./style.css" />
  <link rel="stylesheet" href="./css/medicine.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="action.js" defer></script>

</head>
<style>
  #account_btn:hover .submenu {
    display: block;
  }

  .submenu {
    list-style-type: none;
    padding: 0;
    margin: 0;
    min-width: 150px;
    display: none;
  }

  .submenu li a {
    color: #000;
    /* You can adjust the text color as needed */
    text-decoration: none;
    display: block;
    padding: 10px;
  }

  .submenu li a:hover {
    color: #007bff;
    /* You can adjust the hover text color as needed */
    background-color: #f8f9fa;
    /* You can adjust the hover background color as needed */
  }
</style>

<body>
  <div class="container-fluid bg-light-subtle">
    <nav class="row">
      <div class="py-2 px-3 d-flex justify-content-between align-items-center" style="background-color:#134E8E;">
        <div class="logo navbar-brand" href="#">
          <img src="./assets/QCUClinicLogo.png" width="50" height="50" alt="" />
          <span class="fw-regular fs-4 text-light">Student Medical Record</span>
        </div>
        <div class="container-fluid d-flex justify-content-start">
          <button id="sidebarCollapse" class="navbar-toggle border-0 bg-dark ms-0 ms-md-2 ms-lg-0 order-1 order-md-1">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="ms-auto order-sm-0" id="navbarNav">
            <ul class="navbar-nav ms-auto text-white d-flex align-items-left align-items-lg-center">
              <span></span>
              <li class="nav-item px-0 mx-2 d-flex align-items-center">
                <a class="nav-link" href="logout.php">Logout</a>
              </li>

            </ul>
          </div>
        </div>
      </div>
    </nav>
    <div class="row bg-light">
      <div class="col-md-2 p-0 position-relative" style="min-height:100vh;box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;background: #134E8E;">
        <div class="w-100">
          <ul class="mt-4 list-unstyled navbar-nav ps-0 ">

            <li class="px-4 w-100 mb-1 nav-item tab py-2">
              <a href="dashboard.php" class="nav-link"><span class="fx-5 fw-800 text-light"><i class="fa fa-area-chart mx-2"></i><span>Home</span></span></a>
            </li>
            <li class="px-4 w-100 mb-1 nav-item tab py-2">
              <a href="student.php" class="nav-link"><span class="fx-5 fw-800 text-light"><i class="fa fa-users mx-2"></i><span>Students</span></span></a>
            </li>
            <li class="px-4 w-100 mb-1 nav-item tab py-2">
              <a href="Mreport.php" class="nav-link"><span class="fx-5 fw-800 text-light"><i class="fa fa-plus-square mx-2"></i><span>Medical Requirements</span></span></a>
            </li>
            <!-- <li  class="px-4 w-100 mb-1 nav-item tab py-2">
                  <a href="department.php" class="nav-link"><span class="fx-5 fw-800 text-light"><i class="fa fa-building-o mx-2"></i><span>Departments</span></span></a>
                  </li> -->
            <li class="px-4 w-100 mb-1 nav-item tab py-2">
              <a href="appointment.php" class="nav-link"><span class="fx-5 fw-800 text-light"><i class="fa fa-calendar mx-2" aria-hidden="true"></i><span>Appointments</span></span></a>
            </li>
            <li class="px-4 w-100 mb-1 nav-item active tab py-2">
              <a href="medicines.php" class="nav-link"><span class="fx-5 fw-800 text-light"> <i class="fa fa-medkit mx-2" aria-hidden="true"></i><span>Medicines</span></span></a>
            </li>
            <li class="px-4 w-100 mb-1 nav-item tab py-2">
              <a href="Report.php" class="nav-link"><span class="fx-5 fw-800 text-light"><i class="fa fa-book mx-2"></i><span>Reports</span></span></a>
            </li>
            <li class="px-4 w-100 mb-1 nav-item tab py-2">
              <a href="activityLog.php" class="nav-link"><span class="fx-5 fw-800 text-light"><i class="fa fa-history mx-2"></i><span>Activity Log</span></span></a>
            </li>
            <li id="account_btn" class="px-4 w-100 mb-1 nav-item  tab py-2 position-relative">
              <div class="nav-link">
                <span class="fx-5 fw-800 text-light">
                  <i class="fa fa-user-o mx-2" aria-hidden="true"></i>
                  <span>Manage Account</span>
                </span>
              </div>
              <ul class="submenu position-absolute bg-white">
                <li><a href="account.php" class="dropdown-item">Profile</a></li>
                <li><a href="change_password.php" class="dropdown-item">Change Password</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-sm-10 p-3">
        <div class="container-fluid py-3">
          <span class="fw-bold fs-3 text-uppercase">Medicines</span>
        </div>
        <div class="container-fluid">
          <div class="container-fluid bg-secondary-subtle py-2 rounded-1">

            <div class="d-flex align-items-center gap-2 bg-body-secondary p-2 rounded-2">

              <div class="d-flex align-items-center">
                <span for="#sort" class="px-2 text-nowrap">Sort By</span>
                <select class="form-select shadow-none" style="flex-basis:500px" aria-label="Default select example" name="sort" id="sort_meds">
                  <option value="id"> All </option>
                  <option value="expirationDate"> Expiration Date </option>
                  <option value="num_stocks"> Stocks </option>
                  <!-- <option value="campus"> Campus </option> -->
                  <option value="San Bartolome"> San Bartolome Campus </option>
                  <option value="San Francisco"> San Francisco Campus </option>
                  <option value="Batasan"> Batasan Campus </option>
                </select>
              </div>
              <div class="input-group form-input-sm d-flex align-items-center gap-2" style="width: 30%; margin-left: 49%;">
                <input type="text" class="form-control w-50 shadow-none" name="search" id="search_meds" placeholder="&#xF002; Search Medicine" aria-label="Search Medicine" aria-describedby="button-addon2" style="font-family:Poppins, FontAwesome">
                <!-- <a href="#" class="text-secondary"> <i class="fa fa-th-large mx-1 fs-3" aria-hidden="true"></i></a> -->
                <a href="#" class="text-secondary"><i class="fa fa-bars mx-1 fs-3" aria-hidden="true"></i></a>
              </div>
            </div>

            <ul class="accordion">


              <?php if (mysqli_num_rows($fetchAllMedicine) > 0) {
                while ($med = mysqli_fetch_assoc($fetchAllMedicine)) {


                  $expDate = convertDate($med['expirationDate']);

                  $description = substr($med['description'], 0, 120);


              ?>




                  <li>
                    <input type="radio" name="accordion" id="first" checked>
                    <label for="first">
                      <div class="medicine-table">
                        <table class="table-mdc">
                          <tbody>
                            <tr class="mdc-header">
                              <td style="width:120px; padding-left: 30px;"><img src="./assets/<?= $med['image'] ?>" width="150px" height="130px"> </td>
                              <td style="width:200px; padding-left: 20px;">
                                <table>
                                  <td class="b1"><?= $med['name'] ?></td>
                                  <tr>
                                    <td><?= $med['prod_id'] ?>
                                  <tr>
                              </td>
                              <td class="mdc-brand"><b>Campus:</b> <?= $med['campus'] ?></td>
                        </table>
                        </td>

                        <td style="text-align:justify;text-justify:inter-word;width:450px;padding-left: 30px;">
                          <span class="mdc-stock">Desctiption: </span>
                          <span class="mdc-qty"><?= $description ?>...</span>
                        </td>



                        <td style="width:370px; padding-left: 50px;">
                          <!-- <b>Expiration Date:</b> <?= $med['expirationDate'] ?> -->
                          <table>
                            <td class="b1"><b>Expiration Date:</b> <em><?= $expDate ?></em></td>
                            <tr>
                              <td><b>Stocks:</b> <?= $med['num_stocks'] ?></td>
                          </table>
                        </td>


                        <!-- <td style="width:160px;"><img src="./qr_images/<?= $med['qr_code'] ?>" width="150px" height="130px"> </td> -->
                        <!-- <td style="width:160px;">
                                        <div class="qr-image">
                                        <img src="./qr_images/<?= $med['qr_code'] ?>" alt="">
                                        </div>
                                      </td> -->

                        </tr>
                        </tbody>
                        </table>
                      </div>
                    </label>

                  </li>

              <?php }
              } ?>

            </ul>

          </div>
        </div>
      </div>

    </div>

    <?php


    function convertDate($date)
    {

      $date = new DateTime("$date");
      $date = $date->format('F d, Y');

      return $date;
    }

    function convertTime($time)
    {

      $time = new DateTime("$time");
      $time = $time->format('h:i A');

      return $time;
    }

    ?>

</body>


<!-- CUSTOM AJAX FILE -->
<script src="./ajax/search_medicine.js"> </script>
<!-- <script src="../ajax/sort-search_medicine.js"></script> -->

</html>