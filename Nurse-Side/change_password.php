<?php
session_start();

if (!isset($_SESSION['emp_id']) && !isset($_SESSION['username'])) {
    //redirect to login
    header("location: index.php");
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="./assets/favcon.png" />
    <title> | SMRMS | NURSE | Manage Account</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <link rel="stylesheet" href="./style.css" />

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
    <div class="container-fluid bg-light">
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
                                <a class="nav-link px-2" href="logout.php">Logout</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <div class="row">
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
                            <a href="report.php" class="nav-link"><span class="fx-5 fw-800 text-light"><i class="fa fa-plus-square mx-2"></i><span>Medical Requirements</span></span></a>
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
                        <!-- <li id="account_btn" class="px-4 w-100 mb-1 nav-item active tab py-2">
              <a href="account.php" class="nav-link"><span class="fx-5 fw-800 text-light"><i class="fa fa-user-o mx-2" aria-hidden="true"></i><span>Account</span></span></a>
            </li> -->
                        <li id="account_btn" class="px-4 w-100 mb-1 nav-item active tab py-2 position-relative">
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



            <div class=" col-sm-10 p-5" id="student" style="width: 50%; margin-left: auto; margin-right: auto;">
                <span class="fw-bold fs-5">MANAGE MY ACCOUNT</span>
                <div class="container-fluid p-2 shadow rounded-2 mt-5 bg-white">
                    <div class="container-fluid my-3 d-grid align-items-center justify-content-center">
                        <div class="position-relative" style="width: 120px;height: 120px;"><img src="./assets/badang.JPG" class="w-100 rounded-circle position-absolute start-50 translate-middle" alt="" style="top:-10%"></div>
                    </div>
                    <div class="px-5 text-center">
                        <p class="fw-semibold mb-3 text-start">Change Password</p>

                        <form method="post" action="update_password.php">





                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingInput" name="old_password" placeholder="Password">
                                <label for="floatingInput">Old Password</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingPassword" name="new_password" placeholder="Password">
                                <label for="floatingPassword">New Password</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingPassword" name="confirm_password" placeholder="Password">
                                <label for="floatingPassword">Confirm Password</label>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-primary rounded-0 fw-semibold">CHANGE</button>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
</body>

</html>