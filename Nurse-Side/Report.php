<?php
include('./includes/db_conn.php');

session_start();

if (!isset($_SESSION['emp_id']) || !isset($_SESSION['username'])) {
  //redirect to login
  header("location: index.php");
}
$emp_id = $_SESSION['emp_id'];

$fetchAllMedicine = mysqli_query($conn1, "SELECT * FROM `medicine`");

$fetchAllConsultations = mysqli_query($conn1, "SELECT * FROM `consultations` a 
                                                JOIN `mis.student_info` b 
                                                ON a.student_id = b.student_id
                                                JOIN `mis.enrollment_status` c
                                                ON a.student_id = c.student_id
                                                ORDER BY a.id DESC");

$fetchAllAppointments = mysqli_query($conn1, "SELECT * FROM `stud_appointment`");

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="./assets/favcon.png" />
  <title>SMRMS | NURSE | Report</title>


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

  <link rel="stylesheet" href="./style.css" />
  <link rel="stylesheet" href="./css/patients.css" />
  <link rel="stylesheet" href="./css/reportchart.css" />
  <link rel="stylesheet" href="./css/ReportsTab.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.1/chart.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>



  <script src="action.js" defer></script>
  <script src="./js/report.js" defer></script>

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
            <li class="px-4 w-100 mb-1 nav-item tab py-2">
              <a href="medicines.php" class="nav-link"><span class="fx-5 fw-800 text-light"> <i class="fa fa-medkit mx-2" aria-hidden="true"></i><span>Medicines</span></span></a>
            </li>
            <li class="px-4 w-100 mb-1 nav-item active tab py-2">
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
        <div class="container-fluid">
          <div class="container-fluid bg-secondary-subtle py-2 rounded-1">
            <!-- <span class="fw-bold fs-5 mx-3 text-uppercase">Summary Report</span> -->
            <div class="reports so_content so_active">
              <div class="reports_header d-flex justify-content-between" style=" margin-bottom: 10px;">
                <h3 class="m-0 text-black">SUMMARY REPORTS</h3>
                <div class="filter">
                  <select id="report_filter" name="report_filter" style="border-radius: 5px; font-size: 18px;">
                    <option id="student_filter" value="student_filter">Students</option>
                    <option id="appointment_filter" value="appointment_filter">Appointments</option>
                    <option id="medicine_filter" value="medicine_filter">Medicine</option>
                  </select>
                  <select style="border-radius: 5px; font-size: 18px;">
                    <option value="">-Select Campus-</option>
                    <option value="batasan">Batasan</option>
                    <option value="sanbartolome">San Bartolome</option>
                    <option value="sanfrancisco">San Francisco</option>
                  </select>
                  <select style="border-radius: 5px; font-size: 18px;">
                    <option>Select a date</option>
                  </select>
                </div>
              </div>
              <br>

              <div class="reports_table_details table-dark table-responsive" id="student_report">
                <h1 class="container-title" style="color:blue; text-align:center;">STUDENTS CONSULTATION REPORT</h1>
                <div class="charts-row">
                  <div class="bar-col">
                    <p class="chart-title text-black">TOTAL NUMBER OF CONSULTATIONS</p>
                    <canvas id="report_student_chart" class="chart"></canvas>
                  </div>
                  <!-- <div class="pie-col">
                      <p class="chart-title text-black">5 MOST COMMON SYMPTOMS</p>
                      <canvas id="report_student_pie" class="circle_chart"></canvas>
                    </div> -->
                </div>
                <div class="table-container">
                  <table class="table table-striped">
                    <tr id="table_header">
                      <th> Student No. </th>
                      <th> Student Name </th>
                      <th> Section </th>
                      <th> Consultation Date </th>
                      <th> Temperature </th>
                      <th> Symptoms </th>
                      <th> Medicine Given </th>
                      <th> Duration </th>
                      <th> Nurse Assisted </th>
                      <th> Remarks </th>
                    </tr>

                    <?php if (mysqli_num_rows($fetchAllConsultations) > 0) {
                      while ($con = mysqli_fetch_assoc($fetchAllConsultations)) {

                        $conDate = strtotime($con['date_of_consultation']); 
                           $formattedDate = date('F d, Y g:i A', $conDate);

                    ?>

                        <tr class="container">
                          <td> <?= $con['student_id'] ?> </td>
                          <td> <?= $con['firstname']." ". $con['middlename']." ".$con['lastname']?> </td>
                          <td> <?= $con['section']?> </td>
                          <td> <?= $formattedDate ?> </td>
                          <td> <?= $con['body_temp'] ?> </td>
                          <td> <?= $con['symptoms'] ?> </td>
                          <td> <?= $con['medicine'] ?> </td>
                          <td> <?= $con['how_long'] ?> Hour/s </td>
                          <td> </td>
                          <td style="color:green"> <b> Cleared </b></td>
                        </tr>

                    <?php }
                    } ?>

                  </table>
                </div>
              </div>
              <div>

                <div class="reports_table_details table-dark table-responsive" id="appointment_report">
                  <h1 class="container-title" style="color:blue; text-align:center;">APPOINTMENTS REPORT</h1>
                  <div class="charts-row">
                    <div class="bar-col">
                      <p class="chart-title text-black">TOTAL NUMBER OF APPOINTMENTS</p>
                      <canvas id="report_appointment_chart" class="chart"></canvas>
                    </div>
                    <!-- <div class="pie-col">
                      <p class="chart-title text-black">SERVICES</p>
                      <canvas id="report_appointment_pie" class="circle_chart"></canvas>
                    </div> -->
                  </div>
                  <div class="table-container">
                    <table class="table table-striped">
                      <tr id="table_header">
                        <th> Student No. </th>
                        <!-- <th> Student Name </th>
                        <th> Section </th> -->
                        <th> Appointment Type </th>
                        <th> Reason </th>
                        <th> Date </th>
                        <th> Time </th>
                        <th> Reference No. </th>
                        <!-- <th> Nurse Assisted </th> -->
                        <th> Remarks </th>
                      </tr>
                      <?php if (mysqli_num_rows($fetchAllAppointments) > 0) {
                        while ($app = mysqli_fetch_assoc($fetchAllAppointments)) {

                          $appDate = convertDate($app['app_date']);

                      ?>

                          <tr class="container">
                            <td> <?= $app['student_id'] ?> </td>
                            <!-- <td> Dela Cruz, Juan </td>
                        <td> SBIT-3A </td> -->
                            <td> <?= $app['app_type'] ?> Services </td>
                            <td> <?= $app['app_reason'] ?> </td>
                            <td> <?= $appDate ?> </td>
                            <td> <?= $app['app_time'] ?> </td>
                            <td> <?= $app['reference_no'] ?> </td>
                            <!-- <td> Nr. John Nicole Ablhay </td> -->
                            <td style="color:green"><b> <?= $app['app_status'] ?> </b></td>
                          </tr>

                      <?php }
                      } ?>
                    </table>
                  </div>
                </div>
                <div>

                  <div class="reports_table_details table-dark table-responsive" id="medicine_report">
                    <h1 class="container-title" style="color:blue; text-align:center;">MEDICINE INVENTORY REPORT</h1>
                    <div class="charts-row">
                      <div class="bar-col">
                        <p class="chart-title text-black">TOTAL NUMBER OF MEDICINES</p>
                        <canvas id="report_medicine_chart" class="chart"></canvas>
                      </div>
                      <!-- <div class="pie-col">
                      <p class="chart-title text-black">MOSTLY USED MEDICINES</p>
                      <canvas id="report_medicine_pie" class="circle_chart"></canvas>
                    </div> -->
                    </div>
                    <div class="table-container">
                      <table class="table table-striped">
                        <tr id="table_header">
                          <th> Medicine Name </th>
                          <th> Stocks </th>
                          <th> Expiration Date </th>
                          <th> Description </th>
                          <th> Campus </th>
                        </tr>

                        <?php if (mysqli_num_rows($fetchAllMedicine) > 0) {
                          while ($med = mysqli_fetch_assoc($fetchAllMedicine)) {

                            $expDate = convertDate($med['expirationDate']);

                            $description = substr($med['description'], 0, 120);

                        ?>

                            <tr class="container">
                              <td> <?= $med['name'] ?> </td>
                              <td> <?= $med['num_stocks'] ?> </td>
                              <td> <?= $expDate ?> </td>
                              <td> <?= $description ?>... </td>
                              <td> <?= $med['campus'] ?> </td>
                            </tr>

                        <?php }
                        } ?>

                      </table>
                    </div>
                  </div>
                  <div>

                    <div class="nav-row" style="display: flex; justify-content: space-between; margin-top: 30px;">
                      <div></div>
                      <div class="pagination" style=" display:flex; gap:5px;">
                        <div class="paginate-btn" style="background-color: rgb(214, 214, 214); height: 30px; width: 30px; display: flex; justify-content: center; align-items: center;">
                          <i class="fa fa-backward"></i>
                        </div>
                        <div class="paginate-btn" style="background-color: rgb(214, 214, 214); height: 30px; width: 30px; display: flex; justify-content: center; align-items: center;">
                          1
                        </div>
                        <div class="paginate-btn" style="background-color: rgb(214, 214, 214); height: 30px; width: 30px; display: flex; justify-content: center; align-items: center;">
                          2
                        </div>
                        <div class="paginate-btn" style="background-color: rgb(214, 214, 214); height: 30px; width: 30px; display: flex; justify-content: center; align-items: center;">
                          3
                        </div>
                        <div class="paginate-btn" style="background-color: rgb(214, 214, 214); height: 30px; width: 30px; display: flex; justify-content: center; align-items: center;">
                          <i class="fa fa-forward"></i>
                        </div>
                      </div>
                      <span class="export" style="  color: rgb(21, 21, 21); display: flex; gap: 5px;"><button style="width: 80px; background-color: rgb(175, 171, 171);" type="submit" id="print" onclick="printPage()"><b>Print</b></button> or </p><a href="Report.php?path=smrms-report.pdf"> Download</a></span>
                    </div>

                  </div>
                  <br>


                  <script>
                    function printPage() {
                      window.print();
                    }
                  </script>

                </div>

</body>
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


<script src="./js/reportchart.js"></script>


<!-- REPORT'S GRAPHS JS -->

<!-- bar graph js -->
<script>
  var xValues = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
  var yValues = [200, 100, 170, 270, 250, 290, 240, 210, 280, 320, 450, 200];

  new Chart("myChart3", {
    type: "bar",
    data: {
      labels: xValues,
      datasets: [{
        fill: false,
        lineTension: 0,
        backgroundColor: "rgba(0,0,255,1.0)",
        borderColor: "#7B89AD",
        data: yValues
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      aspectRatio: 5,
      legend: {
        display: false
      },
      scales: {
        yAxes: [{
          ticks: {
            min: 0,
            max: 700
          }
        }],
      }
    }
  });

  var xValues = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
  var yValues = [200, 100, 170, 270, 250, 290, 240, 210, 280, 320, 450, 200];

  new Chart("report_student_chart", {
    type: "bar",
    data: {
      labels: xValues,
      datasets: [{
        fill: false,
        lineTension: 0,
        backgroundColor: "rgba(0,0,255,1.0)",
        borderColor: "#7B89AD",
        data: yValues
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: true,
      aspectRatio: 3,
      legend: {
        display: false
      },
      scales: {
        yAxes: [{
          ticks: {
            min: 0,
            max: 700
          }
        }],
      }
    }
  });

  var xValues = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
  var yValues = [200, 100, 170, 270, 250, 290, 240, 210, 280, 320, 450, 200];

  new Chart("report_appointment_chart", {
    type: "bar",
    data: {
      labels: xValues,
      datasets: [{
        fill: false,
        lineTension: 0,
        backgroundColor: "rgba(0,0,255,1.0)",
        borderColor: "#7B89AD",
        data: yValues
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: true,
      aspectRatio: 3,
      legend: {
        display: false
      },
      scales: {
        yAxes: [{
          ticks: {
            min: 0,
            max: 700
          }
        }],
      }
    }
  });

  var xValues = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
  var yValues = [200, 100, 170, 270, 250, 290, 240, 210, 280, 320, 450, 200];

  new Chart("report_medicine_chart", {
    type: "bar",
    data: {
      labels: xValues,
      datasets: [{
        fill: false,
        lineTension: 0,
        backgroundColor: "rgba(0,0,255,1.0)",
        borderColor: "#7B89AD",
        data: yValues
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: true,
      aspectRatio: 3,
      legend: {
        display: false
      },
      scales: {
        yAxes: [{
          ticks: {
            min: 0,
            max: 700
          }
        }],
      }
    }
  });
</script>





<!-- line graph js -->

<script>
  var xValues = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov"];
  var yValues = [0, 100, 170, 270, 250, 290, 240, 210, 280, 320, 450];

  new Chart("myChart", {
    type: "line",
    data: {
      labels: xValues,
      datasets: [{
        fill: false,
        lineTension: 0,
        backgroundColor: "rgba(0,0,255,1.0)",
        borderColor: "#7B89AD",
        data: yValues
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      aspectRatio: 5,
      legend: {
        display: false
      },
      scales: {
        yAxes: [{
          ticks: {
            min: 0,
            max: 700
          }
        }],
      }
    }
  });
</script>



<!--#################################################################################################################################################################################################################################-->

<!-- REPORT FILTER JS -->
<script>
  $(document).ready(function() {
    // Show the student report div by default
    $('#student_report').show();
    $('#appointment_report').hide();
    $('#medicine_report').hide();

    // Trigger the change event for the select element
    $('#report_filter').trigger('change');

    // Call the function when the select element changes
    $('#report_filter').on('change', function() {
      if ($('#student_filter').is(':selected')) {
        $('#student_report').show();
        $('#appointment_report').hide();
        $('#medicine_report').hide();
      } else if ($('#appointment_filter').is(':selected')) {
        $('#student_report').hide();
        $('#appointment_report').show();
        $('#medicine_report').hide();
      } else if ($('#medicine_filter').is(':selected')) {
        $('#student_report').hide();
        $('#appointment_report').hide();
        $('#medicine_report').show();
      }
    });
  });
</script>

</html>