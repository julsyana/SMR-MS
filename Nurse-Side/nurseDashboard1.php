<?php
session_start();
include_once 'insert_data.php';
include_once 'insert_new_patient.php';
include('db_conn.php');


$emp_id = $_SESSION['emp_id'];

if (empty($emp_id)) {

  header("location: ./index.php");
}



// SELECT ALL MEDICINE 
$fetchAllMedicine = mysqli_query($conn, "SELECT * FROM `medicine`");

// SELECT ALL REPORTS 
$fetchAllReports = mysqli_query($conn, "SELECT * FROM `reports`");


// SELECT ADD PATIENTS
$fetchAddPatients = mysqli_query($conn, "SELECT * FROM `stud_data`");


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>NURSE | SMRMS</title>
  <link rel="stylesheet" href="./style.css" />
  <link rel="stylesheet" href="./css/home.css" />
  <link rel="stylesheet" href="./css/NurseTab.css" />
  <link rel="stylesheet" href="./css/medicine.css" />
  <link rel="stylesheet" href="./css/reportchart.css" />
  <link rel="stylesheet" href="./css/messagetab.css" />
  <link rel="stylesheet" href="./css/patients.css" />
  <link rel="stylesheet" href="./css/viewpage.css" />

  <script src="./js/calendar.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

  <!-- <script src="action.js" defer></script> -->
</head>

<body>
  <div class="main">
    <nav id="sidebar" class="sidebar navbar-dark active" style="width: 225px; box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;backgrou">

      <ul class="mt-2 list-unstyled navbar-nav ps-0">
        <li data-tab-target="#dashboard" class="mt-3 px-4 w-100 mb-1 nav-item so_active tab">
          <i class="fa fa-area-chart"></i>
          <a class="nav-link align-items-center"> Home </a>
        </li>

        <li data-tab-target="#patient" class="px-4 w-100 mb-1 nav-item tab">
          <i class="fa fa-users"></i>
          <div class="nav-link align-items-center" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
            Students
          </div>
        </li>

        <li data-tab-target="#medreports" class="px-4 w-100 mb-1 nav-item tab">
          <i class="fa fa-plus-square"></i>
          <div class="nav-link align-items-center" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
            Medical Reports
          </div>
        </li>

        <li data-tab-target="#departments" class="px-4 w-100 mb-1 nav-item tab">
          <i class="fa fa-building-o"></i>
          <div class="nav-link align-items-center" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
            Departments
          </div>
        </li>

        <li data-tab-target="#appointment" class="px-4 w-100 mb-1 nav-item tab">
          <i class="fa fa-calendar" aria-hidden="true"></i>
          <div class="nav-link align-items-center" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
            Appointments
          </div>
        </li>

        <li data-tab-target="#medicine" class="px-4 w-100 mb-1 nav-item tab">
          <i class="fa fa-medkit" aria-hidden="true"></i>
          <div class="nav-link align-items-center" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
            Medicines
          </div>
        </li>

        <li data-tab-target="#reports" class="px-4 w-100 mb-1 nav-item tab">
          <i class="fa fa-book"></i>
          <div class="nav-link align-items-center" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
            Reports
          </div>
        </li>

        <li data-tab-target="#account" id="account_btn" class="px-4 w-100 mb-1 nav-item tab">
          <i class="fa fa-user-o" aria-hidden="true"></i>
          <div class="nav-link align-items-center" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
            Account
          </div>
        </li>
      </ul>
    </nav>
    <nav id="navigation" class="mynav px-3 navbar navbar-expand navbar-dark" style="z-index: 1">
      <div class="logo navbar-brand m-0" href="#">
        <img src="./assets/QCUClinicLogo.png" alt="" />
        Student Medical Record
      </div>
      <div class="container-fluid d-flex justify-content-start">
        <button id="sidebarCollapse" class="navbar-toggle border-0 bg-dark ms-0 ms-md-2 ms-lg-0 order-1 order-md-1">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="ms-auto order-sm-0" id="navbarNav">
          <ul class="navbar-nav ms-auto text-white d-flex align-items-left align-items-lg-center">
            <span></span>
            <li class="nav-item px-0 d-flex align-items-center">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>

          </ul>
        </div>
      </div>
    </nav>

    <div class="content_wrapper">


      <!-- HOME PAGE -->
      <section id="dashboard" class="dashboard so_content so_active" data-tab-content>
        <div class="row">
          <!--Nurse Header-->
          <div class="col">
            <div class="container" style="width:650px; height:150px; position:absolute; border:1px solid #0C4079; border-radius:10px; background-color:#0C4079; margin-top:10px;">
              <img src="./assets/badang.jpg" style="width:100px; height:150px; position:absolute; margin-top:-20px;">
              <div class="active-nurse" style="display:grid; position:relative; margin:10px 100px 0px 120px; color:white;">
                <p>22001</p>
                <p>Jessica O. Bulleque</p>
                <p>Position</p>
              </div>
              <div class="consult_today" style="position:absolute; display:grid;  margin: -100px 0px 90px 470px;  color:white; text-align:center;">
                <span style="font-size:24px;">20</span>
                <span>Consult Today</span>
              </div>
            </div>
          </div>
          <!--Calendar-->
          <div class="col">
            <div class="container" style="background-color:#134E8E; border-radius:10px; width:400px; position:relative; margin-right:15px;">
              <div class="row">
                <div class="col">
                  <div class="card mb-1" style="border:none;">
                    <div class="card-header" style="background-color:#134E8E; color:white;">
                      <h2 id="time-display" style="text-align:center;">Loading...</h2>
                      <h4 class="card-title text-center" id="month-year" style="background-color:#134E8E;"></h4>
                    </div>
                    <div class="card-body p-0">
                      <table class="table table-bordered table-hover mb-0" style="border:transparent; text-align:center;">
                        <thead>
                          <tr style="background-color:white;">
                            <th class="text-center">Sun</th>
                            <th class="text-center">Mon</th>
                            <th class="text-center">Tue</th>
                            <th class="text-center">Wed</th>
                            <th class="text-center">Thu</th>
                            <th class="text-center">Fri</th>
                            <th class="text-center">Sat</th>
                          </tr>
                        </thead>
                        <tbody id="calendar-body">
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--Recent Appointment-->
        <div class="row">
          <div class="col">
            <div class="container" style="margin-top:-170px;">
              <div style=" position:relative; display:flex; gap:380px;">
                <input type="button" value="RECENT APPOINTMENTS" style="border:none; cursor:default;">
                <input type="button" style="color:#0066FF; background:none; border:transparent;" value="View All">
              </div>

              <table class="appointment-header" style="width:630px;  position:absolute; text-align:center; padding-left:-100px;">
                <thead style="background-color:#2D6DB2; color:white; font-size:18px;">
                  <th>Student No.</th>
                  <th>Name</th>
                  <th>Course</th>
                  <th>Year</th>
                  <th>Status</th>
                </thead>
                <tbody>
                  <tr style="border-bottom: 1px solid #B3BBCC;">
                    <td>17-1324</td>
                    <td>Kenneth Nunag</td>
                    <td>BSIT</td>
                    <td>4th</td>
                    <td style="color:#FF7A00;">Pending</td>
                  </tr>
                  <tr style="border-bottom: 1px solid #B3BBCC;">
                    <td>17-1324</td>
                    <td>Kenneth Nunag</td>
                    <td>BSIT</td>
                    <td>4th</td>
                    <td style="color:#FF7A00;">Pending</td>
                  </tr>
                  <tr style="border-bottom: 1px solid #B3BBCC;">
                    <td>17-1324</td>
                    <td>Kenneth Nunag</td>
                    <td>BSIT</td>
                    <td>4th</td>
                    <td style="color:#FF7A00;">Pending</td>
                  </tr>
                  <tr style="border-bottom: 1px solid #B3BBCC;">
                    <td>17-1324</td>
                    <td>Kenneth Nunag</td>
                    <td>BSIT</td>
                    <td>4th</td>
                    <td style="color:#FF7A00;">Pending</td>
                  </tr>
                  <tr style="border-bottom: 1px solid #B3BBCC;">
                    <td>17-1324</td>
                    <td>Kenneth Nunag</td>
                    <td>BSIT</td>
                    <td>4th</td>
                    <td style="color:#FF7A00;">Pending</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>


          <!--Activity Log-->
          <div class="col">
            <div class="container">
              <h5 style="margin:0px 5px 100px -40px; position:relative; padding-top:15px;">ACTIVITY LOG</h5>
              <table class="header" style="margin:-90px 0px 0px -40px; width:370px; border-spacing:100px; text-align:center; position:absolute;">
                <thead style="background-color:#B3BBCC; width:300px;">
                  <th>Date</th>
                  <th>Time in</th>
                  <th>Time out</th>
                </thead>
                <tbody style="background-color:#E8E8ED;">
                  <tr>
                    <td>03/3/2023</td>
                    <td style="color:#42BB56;">6:49</td>
                    <td style="color:#EB1717;">4:51</td>
                  </tr>
                  <tr>
                    <td>03/3/2023</td>
                    <td style="color:#42BB56;">6:49</td>
                    <td style="color:#EB1717;">4:51</td>
                  </tr>
                  <tr>
                    <td>03/3/2023</td>
                    <td style="color:#42BB56;">6:49</td>
                    <td style="color:#EB1717;">4:51</td>
                  </tr>
                  <tr>
                    <td>03/3/2023</td>
                    <td style="color:#42BB56;">6:49</td>
                    <td style="color:#EB1717;">4:51</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>


        <!-- Consult Student -->
        <div class="row">
          <div class="col">
            <div class="container" style="margin-top:-100px;">
              <div style=" position:relative; display:flex; gap:330px;">
                <input type="button" value="LIST OF CONSULTED STUDENTS" style="border:none; cursor:default;">
                <input type="button" style="color:#0066FF; background:none; border:transparent;" value="View All">
              </div>

              <table class="table table-striped" style="width:630px; position:absolute;">
                <thead style="background-color:#2D6DB2; color:white;">
                  <tr>
                    <th>Student No</th>
                    <th>Name</th>
                    <th>Course</th>
                    <th>Year</th>
                    <th>Date</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>17-1234</td>
                    <td>Kenneth Nunag</td>
                    <td>BSIT</td>
                    <td>4th</td>
                    <td>03/03/23</td>
                    <td style="color:#42BB56;">Cleared</td>
                  </tr>
                  <tr>
                    <td>17-1234</td>
                    <td>Kenneth Nunag</td>
                    <td>BSIT</td>
                    <td>4th</td>
                    <td>03/03/23</td>
                    <td style="color:#42BB56;">Cleared</td>
                  </tr>
                  <tr>
                    <td>17-1234</td>
                    <td>Kenneth Nunag</td>
                    <td>BSIT</td>
                    <td>4th</td>
                    <td>03/03/23</td>
                    <td style="color:#42BB56;">Cleared</td>
                  </tr>
                  <tr>
                    <td>17-1234</td>
                    <td>Kenneth Nunag</td>
                    <td>BSIT</td>
                    <td>4th</td>
                    <td>03/03/23</td>
                    <td style="color:#42BB56;">Cleared</td>
                  </tr>
                  <tr>
                    <td>17-1234</td>
                    <td>Kenneth Nunag</td>
                    <td>BSIT</td>
                    <td>4th</td>
                    <td>03/03/23</td>
                    <td style="color:#42BB56;">Cleared</td>
                  </tr>

                </tbody>
              </table>
            </div>
          </div>
        </div>




      </section>



      <!-- PATIENTS -->

      <section id="patient" class="patient so_content" data-tab-content>

        <div class="filter_wrapper">
          <h3>STUDENTS</h3>
          <div class="sort flex-grow-1">
            <span>Sort by</span>
            <input type="button" class="px-2" value="Recent">
          </div>
          <div class="input-group form-input-sma">
            <input type="text" class="form-control" placeholder="Search..." aria-label="Search..." aria-describedby="button-addon2">
            <button class="btn bg-secondary fw-bold text-light" type="button" id="button-addon2"><i class="fa-solid fa-magnifying-glass"></i>Search</button>
          </div>
        </div>
        <div class="patient_table_details">
          <table>

            <?php if (mysqli_num_rows($fetchAddPatients) > 0) {
              while ($addPatient = mysqli_fetch_assoc($fetchAddPatients)) {
            ?>
                <tr class="container">
                  <!--Patient info-->
                  <td class="py-2" style="background-color: #163666;"><span class="patient_id"><?= $addPatient['student_id'] ?></span></td>
                  <td class="py-2"><span class="name"><?= $addPatient['lastname'] ?>, <?= $addPatient['firstname'] ?> <?= $addPatient['middlename'] ?></span></td>
                  <td class="py-2"><span class="course"><?= $addPatient['Section'] ?></span></td>
                  <td class="py-2"><span class="email"><?= $addPatient['Email'] ?></span></td>
                  <td class="py-2"><button class="addpatient-btn px-2" style="background-color: #163666;" data-tab-target="#viewpage_student" id="view" name="student_id" data-id='<?= $addPatient['student_id'] ?>'>View</button></td>
                  <td class="py-2"><a href="#addAdminModal" class="custom_btn" data-toggle="modal"><i class="fa fa-edit" aria-hidden="true" style="color: #163666"></i></a>
                    <a href="#addAdminModal" class="custom_btn" data-toggle="modal"><i class="fa fa-trash" aria-hidden="true" style="color: #163666"></i></a>
                  </td>


                </tr>
            <?php }
            } ?>

          </table>
          <div class="pagination">
            <a href="#">&laquo;</a>
            <a href="#">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#">6</a>
            <a href="#">&raquo;</a>
          </div>
        </div>
      </section>

      <section id="#viewpage_student" class="viewpage so_content" data-tab-content>
        <div class="viewheader" id="viewheader">
          <!-- student_info -->
          <hr>
        </div>
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="card">
                <img src="./assets/badang.jpg" class="patient-img">
                <div class="card-body">
                  <h5 class="patient-name">Jessica O. Bulleque</h5>
                  <p class="patient-email">randomemail@gmail.com</p>
                  <p class="patient-course">BSIT</p>
                  <p class="patient-id">22-0001</p>
                  <p class="patient-status">Status : Complete </p>
                </div>
              </div>
            </div>

            <div class="col">
              <div class="content">
                <div class="content-body1">
                  <form class="form-info">

                    <label for="gender">Gender:</label>
                    <!-- <input type="text" id="gender" name="gender" placeholder="Female" readonly> -->
                    <p></p>

                    <label for="age">Age:</label>
                    <!-- <input type="text" id="age" name="age" placeholder="22" readonly> -->


                    <label for="age">Date of Birth:</label>
                    <!-- <input type="text" id="bday" name="bday" placeholder="Jan 1 2002" readonly> -->


                    <label for="age">Contact Number:</label>
                    <!-- <input type="text" id="age" name="age" placeholder="09123787954" readonly> -->


                    <label for="age">Complete Address:</label>
                    <!-- <input type="text" id="age" name="age" placeholder="sampleadd quezon city" readonly> -->

                </div>
              </div>
            </div>
            <div class="col">
              <div class="content">
                <div class="content-body">
                  <label for="age">Contact Person:</label>
                  <input type="text" id="person" name="number" placeholder="Juan Luna" readonly>

                  <label for="age">Contact Number:</label>
                  <input type="text" id="age" name="age" placeholder="09198880339" readonly>

                  <label for="age">Relationship:</label>
                  <input type="text" id="relationship" name="relationship" placeholder="Father" readonly></input>

                  <label for="age">Complete Address:</label>
                  <input type="text" id="contact_address" name="contact_address" placeholder="Sample Add Quezon City" readonly>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-8">
            <div class="container">
              <div class="nav">
                <input type="button" class="px-2 mx-2" value="Medical History">
                <input type="button" class="px-2" value="Medical Requirements">
                <input type="button" class="btn-newconsult px-2 " value="New Consultation" data-bs-toggle="modal" data-bs-target="#consultation">
              </div>

              <div class="modal fade" id="consultation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Consultation</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      ...
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>


              <div class="container my-custom-bg">
                <ul class="nurse-details">
                  <div class="container custom-content">
                    <li>22-0001</li>
                    <li>NR. John Nicole Abihay</li>
                    <li>Medical Clearance</li>
                    <li>09/21/22 - 11:36AM</li>
                  </div>
                </ul>
              </div>
            </div>


          </div>
          <div class="col-4">
            <div class="container custom1">
              <h5>Recent Consulation</h5>
              <form>
                <input type="text" readonly placeholder="NR. John Nicole Abihay">
                <input type="button" class="view-btn" readonly value="view">
              </form>
            </div>
          </div>
          <!-- student_info -->
        </div>

      </section>

      <section id="nurses" class="nurses so_content" data-tab-content>
        <div class="nurse_header d-flex justify-content-between">
          <h3 class="m-0">NURSES</h3>
          <button class="custom_btn">
            <i class="fa fa-user-md" aria-hidden="true"></i>
            Add Nurses
          </button>
        </div>
        <div class="filter_wrapper">
          <div class="sort flex-grow-1">
            <span>Sort by</span>
            <select name="filter" id="filter">
              <option value="Surname">Surname</option>
              <option value="Firstname">Firstname</option>
            </select>
          </div>
          <div class="r">
            <div class="search">
              <input type="text" placeholder="Search" />
            </div>
            <div class="grid">
              <i class="fa fa-th-large" aria-hidden="true"></i>
            </div>
            <div class="bars">
              <i class="fa fa-bars" aria-hidden="true"></i>
            </div>
          </div>
        </div>
        <div class="card_container">
          <div class="card">
            <img src="./assets/badang.jpg" alt="" />
            <div class="card_content">
              <span class="stud_id">17-1499</span>
              <span class="name">Jessica Bulleque</span>
              <span class="nurse">Nurse</span>
              <div class="card_footer">
                <span class="date">M/W/F</span>
                <i class="fa fa-info-circle" aria-hidden="true"></i>
                <i class="fa fa-commenting" aria-hidden="true"></i>
              </div>
            </div>
          </div>
          <div class="card">
            <img src="./assets/nurse.jpg" alt="" />
            <div class="card_content">
              <span class="stud_id">17-1499</span>
              <span class="name">Jessica Bulleque</span>
              <span class="nurse">Nurse</span>
              <div class="card_footer">
                <span class="date">M/W/F</span>
                <i class="fa fa-info-circle" aria-hidden="true"></i>
                <i class="fa fa-commenting" aria-hidden="true"></i>
              </div>
            </div>
          </div>
          <div class="card">
            <img src="./assets/nurse2.jpg" alt="" />
            <div class="card_content">
              <span class="stud_id">17-1499</span>
              <span class="name">Jessica Bulleque</span>
              <span class="nurse">Nurse</span>
              <div class="card_footer">
                <span class="date">M/W/F</span>
                <i class="fa fa-info-circle" aria-hidden="true"></i>
                <i class="fa fa-commenting" aria-hidden="true"></i>
              </div>
            </div>
          </div>
          <div class="card">
            <img src="./assets/nurse3.jpg" alt="" />
            <div class="card_content">
              <span class="stud_id">17-1499</span>
              <span class="name">Jessica Bulleque</span>
              <span class="nurse">Nurse</span>
              <div class="card_footer">
                <span class="date">M/W/F</span>
                <i class="fa fa-info-circle" aria-hidden="true"></i>
                <i class="fa fa-commenting" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </section>



      <!-- APPOINTMENT -->
      <section id="appointment" class="appointment so_content" data-tab-content>
        <div class="row1">
          <div class="column1">

            <h3 class="m-0">MESSAGES</h3>
            <input type="text" class="msgsearch" placeholder="Search">

            <div class="stdmsg">
              <img src="./assets/nurse.jpg" alt="" id="stdimage">
              <p class="datetime">11/10/2022 - 5:06PM</p>
              <p class="std-name">Clarissa Calubaquib (Student - 4th year)</p>
              <p class="message-content">Good morning po, hindi po ako makakapasok.</p>
            </div>

            <div class="stdmsg">
              <img src="./assets/nurse.jpg" alt="" id="stdimage">
              <p class="datetime">11/10/2022 - 5:06PM</p>
              <p class="std-name">Jessica Bulleque (Student - 4th year)</p>
              <p class="message-content">Good morning po, hindi po ako makakapasok.</p>
            </div>

            <div class="stdmsg">
              <img src="./assets/nurse.jpg" alt="" id="stdimage">
              <p class="datetime">11/10/2022 - 5:06PM</p>
              <p class="std-name">Kenneth Nunag (Student - 4th year)</p>
              <p class="message-content">Di po ako papasok masama po kasi ako.</p>
            </div>
          </div>



          <div class="column2">
            <h5 class="stdname">Juan Dela Cruz (Student-4th year)</h5>
            <div class="stdchat">
              <img src="./assets/nurse.jpg" alt="" id="stdimg">
              <input type="text" class="chatbg" value="Hi" readonly>

            </div>
            <input type="text" class="msgreply" placeholder="Type Here">
          </div>

        </div>
      </section>


      <!-- MEDICINES -->
      <!-- MEDICINES -->
      <section id="medicine" class="medicine so_content" data-tab-content>
        <div class="medicine_landing">
          <div class="medicine_header d-flex justify-content-between">
            <h3 class="m-0">MEDICINES</h3>
          </div>
        </div>
        <div class="filter_wrapper">
          <div class="sort flex-grow-1">
            <span>Sort by</span>
            <select name="filter" id="filter">
              <option value="Date Manufactured">Date Manufactured</option>
              <option value="Date Expiration">Date Expiration</option>
              <option value="Quantity">Quantity</option>
            </select>
          </div>
          <div class="r">
            <div class="search">
              <input type="text" placeholder="Search" />
            </div>
            <div class="grid">
              <i class="fa fa-th-large" aria-hidden="true"></i>
            </div>
            <div class="bars">
              <i class="fa fa-bars" aria-hidden="true"></i>
            </div>
          </div>
        </div>


        <div>
          <ul class="accordion">

            <?php if (mysqli_num_rows($fetchAllMedicine) > 0) {
              while ($med = mysqli_fetch_assoc($fetchAllMedicine)) {  ?>


                <li>
                  <input type="radio" name="accordion" id="first" checked>
                  <label for="first">
                    <div class="medicine-table">
                      <table class="table-mdc">
                        <tbody>
                          <tr class="mdc-header">
                            <td style="width:120px;"><img src="./assets/<?= $med['image'] ?>" width="150px" height="130px"> </td>
                            <td style="width:200px;">
                              <table>
                                <td class="b1"><?= $med['name'] ?></td>
                                <tr>
                                  <td class="mdc-brand">Brand: <?= $med['brand'] ?></td>
                                <tr>
                                  <td><?= $med['prod_id'] ?></td>
                              </table>
                            </td>

                            <td>
                              <span class="mdc-stock">Desctiption: </span>
                              <span class="mdc-qty"><?= $med['description'] ?></span>
                            </td>



                            <td style="width:280px;"><b>Expiration Date:</b> <?= $med['expirationDate'] ?></td>
                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#medModal">
                                View
                              </button>
                            </td>
                            <td><button type="button" class="btn btn-danger">Delete</button>
                            </td>

                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </label>

                </li>


                <div class="modal fade" id="medModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" style="max-width: 1000px; margin-right:2.5rem;">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">MEDICINE INFORMATION</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form>
                        <div class="modal-body">
                          <div class="row">
                            <div class="col">
                              <label for="medname" class="form-label">Medicine Name</label>
                              <input type="text" class="form-control" id="medname" style="width:200px;" readonly placeholder="<?= $med['name'] ?>">
                            </div>

                            <div class="col">
                              <label for="brand" class="form-label">Brand</label>
                              <input type="text" class="form-control" id="brand" readonly placeholder="<?= $med['brand'] ?>">
                            </div>

                            <div class="col">
                              <label for="stocks" class="form-label">Stocks</label>
                              <input type="text" class="form-control" id="stocks" readonly placeholder="<?= $med['num_stocks'] ?>">
                            </div>

                            <div class="col">
                              <label for="expdate" class="form-label">Expiration Date</label>
                              <input type="date" class="form-control" id="expirationDate" readonly value="<?= $med['expirationDate'] ?>">
                            </div>
                            <!---->
                            <div class="row">
                              <div class="col">
                                <label for="genname" class="form-label">Generic Name</label>
                                <input type="text" class="form-control" id="genname" style="width:200px;" readonly value="<?= $med['genericName'] ?>">
                              </div>
                              <div class="col">
                                <label for="gendatemanu" class="form-label">Date Manufactured</label>
                                <input type="date" class="form-control" id="datemanu" style="width:200px;" readonly value="<?= $med['date_manufactured'] ?>">
                              </div>
                              <div class="col">
                                <label for="prod_con" class="form-label">Product Condition</label>
                                <input type="text" class="form-control" id="prod_con" style="width:200px;" readonly value="<?= $med['prodCondition'] ?>">
                              </div>
                              <div class="col">
                                <label for="storage" class="form-label">Storage</label>
                                <input type="text" class="form-control" id="storage" style="width:100px;" readonly value="<?= $med['storage'] ?>">
                              </div>
                              <div class="col">
                                <label for="box_id" class="form-label">Box ID</label>
                                <input type="text" class="form-control" id="box_id" style="width:100px;" readonly value="<?= $med['box_id'] ?>">
                              </div>

                              <div class="row">
                                <div class="col">
                                  <label for="manu_comp" class="form-label">Manufacturer's Company</label>
                                  <input type="text" class="form-control" id="manu_comp" style="width:210px;" readonly value="<?= $med['manufacturerName'] ?>">
                                </div>
                                <div class="col">
                                  <label for="email" class="form-label">Email Address</label>
                                  <input type="text" class="form-control" id="email" style="width:100px;" readonly value="<?= $med['prodCondition'] ?>">
                                </div>
                                <div class="col">
                                  <label for="contact_num" class="form-label">Contact Number</label>
                                  <input type="text" class="form-control" id="contact_num" style="width:100px;" readonly value="<?= $med['contact_info'] ?>">
                                </div>
                              </div>
                              <div class="row">
                                <div class="col"></div>
                              </div>

                            </div>

                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>





            <?php }
            } ?>
          </ul>
        </div>

      </section>



      <!-- REPORTS -->
      <section id="reports" class="reports so_content" data-tab-content>
        <h3 class="m-0">REPORTS</h3>
        <div class="headerpatients">
          <span class="headerpatients1">NUMBER OF PATIENTS</span>
          <select name="filter" class="reportfilter">
            <option value="Monthly">Monthly</option>
            <option value="Yearly">Yearly</option>
          </select>
          <div class="reportchart">
            <canvas id="lineChart" style="width:800px; height: 300px; padding-top: 15px;"></canvas>
          </div>
        </div>

        <div class="tbl_report">
          <table class="report-tbl">

            <tr>
              <th>ID</th>
              <th>Nurse Name</th>
              <th>Consultation</th>
              <th>Patients</th>
              <th>Status</th>
              <th>Date & Time</th>
            <tr>
              <td colspan="6"></td>
            </tr>
            </tr>

            <?php if (mysqli_num_rows($fetchAllReports) > 0) {
              while ($reports = mysqli_fetch_assoc($fetchAllReports)) {  ?>


                <tr style="padding-bottom:1em;">
                  <td><?= $reports['data_id'] ?></td>
                  <td><?= $reports['nurse_name'] ?></td>
                  <td><?= $reports['consultation'] ?></td>
                  <td><?= $reports['patient_name'] ?></td>
                  <td class="complete"><?= $reports['status'] ?></td>
                  <td><?= $reports['date'] ?> - <?= $reports['time'] ?></td>
                <tr>
                  <td class="colsp" colspan="6"></td>
                </tr>
                </tr>

            <?php }
            } ?>



          </table>
        </div>

        <button onClick="window.print()" class="reportbtn">Print</button>
        <br><br>
      </section>



      <!-- ACCOUNT -->
      <section id="account" class="account so_content" data-tab-content>
        <div class="account_landing">
          <div class="account_header d-flex justify-content-between">

            <!-- nurse account section clicking my account  -->
            <div class="nurse_account_section">
              <h3>MANAGE MY ACCOUNT</h3>

              <div class="form_wrapper">

                <div class="profile_picture">
                  <img src="./assets/badang.JPG" alt="">
                  <div class="edit_icon"></div>
                </div>

                <div class="border">
                  <span></span>
                </div>

                <form action="" class="l_form form">
                  <h4>Change Email</h4>
                  <div class="input_wrap">
                    <span>Old Email</span>
                    <input type="text">
                  </div>
                  <div class="input_wrap">
                    <span>New Email</span>
                    <input type="text">
                  </div>
                  <div class="input_wrap">
                    <span>Confirm Email</span>
                    <input type="text">
                  </div>
                  <button id="changeEmail" class="change">Change</button>
                  <span class="note"><span class="note_color">Note:</span> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet</span>

                </form>

                <form action="" class="l_form form">
                  <h4>Change Password</h4>
                  <div class="input_wrap">
                    <span>Old Password</span>
                    <input type="text">
                  </div>
                  <div class="input_wrap">
                    <span>New Password</span>
                    <input type="text">
                  </div>
                  <div class="input_wrap">
                    <span>Confirm Password</span>
                    <input type="text">
                  </div>
                  <button id="changePass" class="change">Change</button>
                  <span class="note"><span class="note_color">Note:</span> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet</span>
                </form>

              </div>
            </div>


            <!-- nurse_acctount otp modal-->
            <div class="confirmation_modal">
              <div class="confirmation">
                <h3>We have a confirmation of changes to the admin?</h3>
                <span>Waiting to approve...</span>
              </div>
            </div>

          </div>
        </div><br><br>
      </section>


    </div>
  </div>
  <!-- custom js -->
  <script src="./js/app.js"></script>

  <!-- bootstrap js -->
  <script src="./js/jquery.min.js"></script>
  <script src="./js/popper.js"></script>
  <script src="./js/bootstrap.min.js"></script>
  <script src="./js/main.js"></script>
  <script src="./js/modalSample.js"></script>
  <script src="./js/reportchart.js"></script>
  <script src="./js/line_graph.js"></script>
  <script src="./js/popup.js"></script>


  <script>
    $(document).ready(function() {
      setTimeout(function() {
        $('#message').hide();
      }, 3000);
    });
  </script>

  <script>
    $(funtion() {
      $('[data-toggle="popover"]').popoever();
    })
  </script>

  <script>
    $(document).ready(function() {
      setInterval(function() {
        var time = new Date().toLocaleTimeString();
        $('#time-display').text(time);
      }, 1000);
    });
  </script>
</body>

</html>