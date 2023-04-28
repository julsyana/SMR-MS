<?php
include('./includes/db_conn.php');
session_start();


if (!isset($_SESSION['emp_id']) || !isset($_SESSION['username'])) {
  //redirect to login
  header("location: index.php");
}


// SELECT ALL STUDENTS 
//  $fetchAllStudents = mysqli_query($conn, "SELECT * FROM `stud_data` LIMIT 10");

$fetchStudents = "SELECT * FROM `student_account`
            JOIN `mis.student_info` ON `student_account`.`student_id` = `mis.student_info`.`student_id`
            JOIN `mis.enrollment_status` ON `mis.student_info`.`student_id` = `mis.enrollment_status`.`student_id` 
            JOIN `mis.student_address` ON `mis.enrollment_status`.`student_id` = `mis.student_address`.`student_id` 
            JOIN `mis.emergency_contact` ON `mis.student_address`.`student_id` = `mis.emergency_contact`.`student_id` LIMIT 10";
$fetchStudsAccount = mysqli_query($conn1, $fetchStudents);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="./assets/favcon.png" />
  <title>SMRMS | NURSE | Students</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

  <link rel="stylesheet" href="./style.css" />
  <link rel="stylesheet" href="./css/patients.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

  <script defer src="./ajax/action.js"></script>

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
  <div class="container-fluid">
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
    
    <div class="row bg-secondary-subtle">
      <div class="col-md-2 p-0 position-relative" style="min-height:100vh;box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;background: #134E8E;">
        <div class="w-100">
          <ul class="mt-4 list-unstyled navbar-nav ps-0 ">

            <li class="px-4 w-100 mb-1 nav-item tab py-2">
              <a href="dashboard.php" class="nav-link"><span class="fx-5 fw-800 text-light"><i class="fa fa-area-chart mx-2"></i><span>Home</span></span></a>
            </li>
            <li class="px-4 w-100 mb-1 nav-item active tab py-2">
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
            <li class="px-4 w-100 mb-1 nav-item tab py-2">
              <a href="medicines.php" class="nav-link"><span class="fx-5 fw-800 text-light"> <i class="fa fa-medkit mx-2" aria-hidden="true"></i><span>Medicines</span></span></a>
            </li>
            <li class="px-4 w-100 mb-1 nav-item tab py-2">
              <a href="Report.php" class="nav-link"><span class="fx-5 fw-800 text-light"><i class="fa fa-book mx-2"></i><span>Reports</span></span></a>
            </li>
            <li class="px-4 w-100 mb-1 nav-item tab py-2">
              <a href="activityLog.php" class="nav-link"><span class="fx-5 fw-800 text-light"><i class="fa fa-history mx-2"></i><span>Activity Log</span></span></a>
            </li>
            <li id="account_btn" class="px-4 w-100 mb-1 nav-item tab py-2">
              <a href="account.php" class="nav-link"><span class="fx-5 fw-800 text-light"><i class="fa fa-user-o mx-2" aria-hidden="true"></i><span> Manage Account</span></span></a>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-sm-10 p-4" id="student">

        <div class="container-fluid">
          <div class="container-fluid bg-body-secondary d-flex justify-content-between align-items-center py-2 rounded-1">
            <!-- <h3 class="fw-semibold m-0 p-0">STUDENTS</h3> -->
            <span class="fw-bold fs-5 text-uppercase">Students</span>
            <div class="d-flex gap-2 ">
              <div class="d-flex align-items-center" style="flex-basis:300px">
                <span for="#sort" class="px-2 text-nowrap">Sort By</span>
                <select class="form-select shadow-none" aria-label="Default select example" name="sort" id="sort_stud">
                  <option name="sort" value="id">All</option>
                  <!-- <option name="sort" value="year_level">Year Level</option> -->
                  <option name="sort" value="section">Section</option>
                  <!-- <option name="sort" value="Degree Program/ Course">Degree Program/Course</option> -->

                </select>
              </div>
              <div class="input-group form-input-sma">
                <input type="text" class="form-control" name="search" id="search_stud" placeholder="Search..." aria-label="Search..." aria-describedby="button-addon2">
                <button class="btn bg-secondary fw-bold text-light" type="button" id="button-addon2"><i class="fa-solid fa-magnifying-glass"></i>Search</button>
              </div>
            </div>
          </div>




          <div class="students">

            <!-- <h1>Student</h1> -->

            <div class="students">
              <!-- <h1>Student</h1> -->



              <?php if (mysqli_num_rows($fetchStudsAccount) > 0) {
                while ($studs = mysqli_fetch_assoc($fetchStudsAccount)) {  ?>


                  <table class="table table-borderless shadow mt-3 text-center align-middle">
                    <tbody>
                      <tr class="">
                        <td class="col-2  text-light fw-bold" style="background:#5D8FD9;width:max-content"><span><?= $studs['student_id'] ?></span></td>
                        <td class="col-3 text-start"><span class="name"><?= $studs['firstname'] ?> <?= $studs['middlename'] ?> <?= $studs['lastname'] ?></span></td>
                        <td class="col-1"><span class="course"><?= $studs['section'] ?></span></td>
                        <td class="col-5 text-start"><span class="email"><?= $studs['email'] ?></span></td>
                        <td class="col-1"><button class="addpatient-btn px-2" style="background-color: #163666;" id="view" data-id="<?= $studs['student_id'] ?>">View</button></td>
                        <!-- <td class="col"><span class="name position-relative d-flex align-items-center justify-content-center">
                                        <a href="#" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical " style="color: #163666"></i></a>
                                        <ul class="dropdown-menu" data-popper-placement="left-start" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(-106.667px, 0px, 0px);width:max-content;">
                                        <li><a class="dropdown-item" href="#"><i class="fa-solid fa-edit mx-2"></i>Edit</a></li> -->
                        </ul>
                        </span>
                        </td>
                      </tr>
                    </tbody>
                  </table>
              <?php }
              } ?>

              <div>
                <!-- </table>
                      </div> -->
              </div>


            </div>

          </div>


          <!-- PRINT OR DOWNLOAD MODAL -->


</body>
<script src="./ajax/search_appointments.js"> </script>
<script src="./ajax/search_medreq.js"> </script>
<script src="./ajax/search_students.js"> </script>
<script src="./ajax/search_medicine.js"> </script>


<!-- CUSTOM AJAX FILE -->

</html>