<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="./assets/favcon.png"/>
    <title>SMRMS | NURSE | Report</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    
    <link rel="stylesheet" href="./style.css" />
    <link rel="stylesheet" href="./css/patients.css"/>
    <link rel="stylesheet" href="./css/reportchart.css"/>
    <link rel="stylesheet" href="./css/ReportsTab.css"/>
     

  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
  />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.1/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="action.js" defer></script>
  <script src="./js/report.js" defer></script>

</head>
<body>
    <div class="container-fluid bg-light-subtle">
        <nav class="row">
            <div class="py-2 px-3 d-flex justify-content-between align-items-center" style="background-color:#134E8E;">
                <div class="logo navbar-brand" href="#">
                    <img src="./assets/QCUClinicLogo.png" width="50" height="50" alt="" />
                    <span class="fw-regular fs-4 text-light">Student Medical Record</span>
                  </div>
                  <div class="container-fluid d-flex justify-content-start">
                    <button
                      id="sidebarCollapse"
                      class="navbar-toggle border-0 bg-dark ms-0 ms-md-2 ms-lg-0 order-1 order-md-1"
                    >
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="ms-auto order-sm-0" id="navbarNav">
                      <ul
                        class="navbar-nav ms-auto text-white d-flex align-items-left align-items-lg-center"
                      >
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
          <div class="col-md-2 p-0 position-relative" style="min-height:100vh;box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;background: #05285c;">
             <div class="w-100">
              <ul class="mt-4 list-unstyled navbar-nav ps-0 ">

                  <li  class="px-4 w-100 mb-1 nav-item tab py-2">
                    <a href="dashboard.php" class="nav-link"><span class="fx-5 fw-800 text-light"><i class="fa fa-area-chart mx-2"></i><span>Home</span></span></a>
                  </li>
                  <li  class="px-4 w-100 mb-1 nav-item tab py-2">
                    <a href="student.php" class="nav-link"><span class="fx-5 fw-800 text-light"><i class="fa fa-users mx-2"></i><span>Students</span></span></a>
                  </li>
                  <li  class="px-4 w-100 mb-1 nav-item tab py-2">
                    <a href="Mreport.php" class="nav-link"><span class="fx-5 fw-800 text-light"><i class="fa fa-plus-square mx-2"></i><span>Medical Requirements</span></span></a>
                  </li>
                  <!-- <li  class="px-4 w-100 mb-1 nav-item tab py-2">
                  <a href="department.php" class="nav-link"><span class="fx-5 fw-800 text-light"><i class="fa fa-building-o mx-2"></i><span>Departments</span></span></a>
                  </li> -->
                  <li  class="px-4 w-100 mb-1 nav-item tab py-2">
                    <a href="appointment.php" class="nav-link"><span class="fx-5 fw-800 text-light"><i class="fa fa-calendar mx-2" aria-hidden="true"></i><span>Appointments</span></span></a>
                  </li>
                  <li  class="px-4 w-100 mb-1 nav-item tab py-2">
                    <a href="medicines.php" class="nav-link"><span class="fx-5 fw-800 text-light"> <i class="fa fa-medkit mx-2" aria-hidden="true"></i><span>Medicines</span></span></a>
                  </li>
                  <li  class="px-4 w-100 mb-1 nav-item active tab py-2">
                    <a href="Report.php" class="nav-link"><span class="fx-5 fw-800 text-light"><i class="fa fa-book mx-2"></i><span>Reports</span></span></a>
                  </li>
                  <li  class="px-4 w-100 mb-1 nav-item tab py-2">
                    <a href="activityLog.php" class="nav-link"><span class="fx-5 fw-800 text-light"><i class="fa fa-history mx-2"></i><span>Activity Log</span></span></a>
                  </li>
                  <li  id="account_btn" class="px-4 w-100 mb-1 nav-item tab py-2">
                    <a href="account.php" class="nav-link"><span class="fx-5 fw-800 text-light"><i class="fa fa-user-o mx-2" aria-hidden="true"></i><span>Account</span></span></a>
                  </li>
                </ul>
             </div>
          </div>




               <!-- REPORTS PAGE -->
       

                <div class="reports_header d-flex justify-content-between">
                  <h3 class="m-0 text-white">REPORTS</h3>
                  <div class="filter">
                    <select id="report_filter">
                      <option id="student_filter">Students</option>
                      <option id="appointment_filter">Appointments</option>
                      <option id="medicine_filter">Medicine</option>
                    </select>
                    <select>
                      <option>Campus</option>
                    </select>
                    <select>
                      <option>Select a date</option>
                    </select>
                  </div>
                </div>


                <div class="reports_table_details table-dark table-responsive" id="student_report">
                  <h1 class="container-title">STUDENTS CONSULTATION REPORT</h1>
                  <div class="charts-row">
                    <div class="bar-col">
                      <p class="chart-title">TOTAL NUMBER OF CONSULTATIONS</p>
                      <canvas id="report_student_chart" class="chart"></canvas>
                    </div>
                    <div class="pie-col">
                      <p class="chart-title">5 MOST COMMON SYMPTOMS</p>
                      <canvas id="report_student_pie" class="circle_chart"></canvas>
                    </div>
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
                    <tr class="container">
                        <td> 19-0249 </td>
                        <td> Dela Cruz, Juan </td>
                        <td> SBIT-3A </td>
                        <td> March 3, 2023 </td>
                        <td> 35 </td>
                        <td> Headache </td>
                        <td> Biogesic </td>
                        <td> 1 Hour </td>
                        <td> Nr. John Nicole Ablhay </td>
                        <td style="color:lightgreen"> Cleared </td>
                    </tr>

                    <tr class="container">
                        <td> 19-0249 </td>
                        <td> Dela Cruz, Juan </td>
                        <td> SBIT-3A </td>
                        <td> March 3, 2023 </td>
                        <td> 35 </td>
                        <td> Headache </td>
                        <td> Biogesic </td>
                        <td> 1 Hour </td>
                        <td> Nr. John Nicole Ablhay </td>
                        <td style="color:lightgreen"> Cleared </td>
                    </tr>

                    <tr class="container">
                        <td> 19-0249 </td>
                        <td> Dela Cruz, Juan </td>
                        <td> SBIT-3A </td>
                        <td> March 3, 2023 </td>
                        <td> 35 </td>
                        <td> Headache </td>
                        <td> Biogesic </td>
                        <td> 1 Hour </td>
                        <td> Nr. John Nicole Ablhay </td>
                        <td style="color:lightgreen"> Cleared </td>
                    </tr>

                    <tr class="container">
                        <td> 19-0249 </td>
                        <td> Dela Cruz, Juan </td>
                        <td> SBIT-3A </td>
                        <td> March 3, 2023 </td>
                        <td> 35 </td>
                        <td> Headache </td>
                        <td> Biogesic </td>
                        <td> 1 Hour </td>
                        <td> Nr. John Nicole Ablhay </td>
                        <td style="color:lightgreen"> Cleared </td>
                    </tr>

                    <tr class="container">
                        <td> 19-0249 </td>
                        <td> Dela Cruz, Juan </td>
                        <td> SBIT-3A </td>
                        <td> March 3, 2023 </td>
                        <td> 35 </td>
                        <td> Headache </td>
                        <td> Biogesic </td>
                        <td> 1 Hour </td>
                        <td> Nr. John Nicole Ablhay </td>
                        <td style="color:lightgreen"> Cleared </td>
                    </tr>

                    <tr class="container">
                        <td> 19-0249 </td>
                        <td> Dela Cruz, Juan </td>
                        <td> SBIT-3A </td>
                        <td> March 3, 2023 </td>
                        <td> 35 </td>
                        <td> Headache </td>
                        <td> Biogesic </td>
                        <td> 1 Hour </td>
                        <td> Nr. John Nicole Ablhay </td>
                        <td style="color:lightgreen"> Cleared </td>
                    </tr>
                    
                  </table>
                  </div>
                </div>
                <div>

                <div class="reports_table_details table-dark table-responsive" id="appointment_report">
                  <h1 class="container-title">APPOINTMENTS REPORT</h1>
                  <div class="charts-row">
                    <div class="bar-col">
                      <p class="chart-title">TOTAL NUMBER OF APPOINTMENTS</p>
                      <canvas id="report_appointment_chart" class="chart"></canvas>
                    </div>
                    <div class="pie-col">
                      <p class="chart-title">SERVICES</p>
                      <canvas id="report_appointment_pie" class="circle_chart"></canvas>
                    </div>
                  </div>
                  <div class="table-container">
                  <table class="table table-striped">
                  <tr id="table_header">
                        <th> Student No. </th>
                        <th> Student Name </th>
                        <th> Section </th>
                        <th> Appointment Type </th>
                        <th> Reason </th>
                        <th> Date </th>
                        <th> Time </th>
                        <th> Reference No. </th>
                        <th> Nurse Assisted </th>
                        <th> Remarks </th>
                    </tr>

                    <tr class="container">
                        <td> 19-0249 </td>
                        <td> Dela Cruz, Juan </td>
                        <td> SBIT-3A </td>
                        <td> Medical Services </td>
                        <td> Follow-up medical requirements </td>
                        <td> March 3, 2023 </td>
                        <td> 1:00 PM </td>
                        <td> asd3ja </td>
                        <td> Nr. John Nicole Ablhay </td>
                        <td style="color:lightgreen"> Completed </td>
                    </tr>

                  </table>
                  </div>
                </div>
                <div>

                <div class="reports_table_details table-dark table-responsive" id="medicine_report">
                  <h1 class="container-title">MEDICINE INVENTORY REPORT</h1>
                  <div class="charts-row">
                    <div class="bar-col">
                      <p class="chart-title">TOTAL NUMBER OF MEDICINES</p>
                      <canvas id="report_medicine_chart" class="chart"></canvas>
                    </div>
                    <div class="pie-col">
                      <p class="chart-title">MOSTLY USED MEDICINES</p>
                      <canvas id="report_medicine_pie" class="circle_chart"></canvas>
                    </div>
                  </div>
                  <div class="table-container">
                  <table class="table table-striped">
                  <tr id="table_header">
                        <th> Medicine Name </th>
                        <th> Stocks </th>
                        <th> Expiration Date </th>
                        <th> Description </th>
                    </tr>

                    <tr class="container">
                        <td> Biogesic </td>
                        <td> 1,000 </td>
                        <td> April 2025 </td>
                        <td> Lorem Ipsum Dolor Iset </td>
                    </tr>
                    
                  </table>
                  </div>
                </div>
                <div>

                <div class="nav-row">
                <div></div>
                <div class="pagination">
                  <div class="paginate-btn">
                    <i class="fa fa-backward"></i>
                  </div>
                  <div class="paginate-btn">
                    1
                  </div>
                  <div class="paginate-btn">
                    2
                  </div>
                  <div class="paginate-btn">
                    3
                  </div>
                  <div class="paginate-btn">
                    <i class="fa fa-forward"></i>
                  </div>
                </div>
                <span class="export"><p>Print or </p><a href="#"> Download</a></span>
                </div>

                </div>


</body>

 <!-- REPORT'S GRAPHS JS -->

  <!-- bar graph js -->
  <script>
      var xValues = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
          var yValues = [200,100,170,270,250,290,240,210,280,320,450,200];

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
                  legend: {display: false},
                  scales: {
                  yAxes: [{ticks: {min: 0, max:700}}],
              }
          }
      });

      var xValues = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
          var yValues = [200,100,170,270,250,290,240,210,280,320,450,200];

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
                  legend: {display: false},
                  scales: {
                  yAxes: [{ticks: {min: 0, max:700}}],
              }
          }
      });

        var xValues = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
          var yValues = [200,100,170,270,250,290,240,210,280,320,450,200];

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
                  legend: {display: false},
                  scales: {
                  yAxes: [{ticks: {min: 0, max:700}}],
              }
          }
      });

      var xValues = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
          var yValues = [200,100,170,270,250,290,240,210,280,320,450,200];

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
                  legend: {display: false},
                  scales: {
                  yAxes: [{ticks: {min: 0, max:700}}],
              }
          }
      });
  </script>


  <!-- circle graph js -->

  <script>
    var xValues = ["Verified", "Unverified", "Visitor", "Invalid"];
var yValues = [55, 49, 44, 24];
var barColors = [
  "#2D7538",
  "#f5c71a",
  "#5180C7",
  "#FF4646",
];

new Chart("myChart2", {
  type: "doughnut",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
   options: {
      responsive: true,
      maintainAspectRatio: false,
      aspectRatio: 2,
      legend: {
        display: true,
        position: 'left',
        maxWidth: 60,
      }
   }
});

var xValues = ["Difficulty Breathing", "Fever or Chills", "Headache", "Diarrhea", "Dizziness"];
var yValues = [55, 49, 44, 24, 35];
var barColors = [
  "#255B98",
  "#5CE1E6",
  "#2BB4D4",
  "#255B98",
  "2D306D",
];

new Chart("report_student_pie", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
   options: {
      responsive: true,
      maintainAspectRatio: true,
      aspectRatio: 0,
      legend: {
        display: true,
        position: 'left',
        maxWidth: 60,
      }
   }
});

var xValues = ["Medical", "Dental",];
var yValues = [55, 49,];
var barColors = [
  "#5CE1E6",
  "#2BB4D4",
];

new Chart("report_appointment_pie", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
   options: {
      responsive: true,
      maintainAspectRatio: true,
      aspectRatio: 0,
      legend: {
        display: true,
        position: 'left',
        maxWidth: 60,
      }
   }
});

var xValues = ["Difficulty Breathing", "Fever or Chills", "Headache", "Diarrhea", "Dizziness"];
var yValues = [55, 49, 44, 24, 35];
var barColors = [
  "#255B98",
  "#5CE1E6",
  "#2BB4D4",
  "#255B98",
  "2D306D",
];

new Chart("report_medicine_pie", {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
   options: {
      responsive: true,
      maintainAspectRatio: true,
      aspectRatio: 0,
      legend: {
        display: true,
        position: 'left',
        maxWidth: 60,
      }
   }
});
  </script>


  <!-- line graph js -->

  <script>
    var xValues = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov"];
    var yValues = [0,100,170,270,250,290,240,210,280,320,450];

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
                legend: {display: false},
                scales: {
                yAxes: [{ticks: {min: 0, max:700}}],
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