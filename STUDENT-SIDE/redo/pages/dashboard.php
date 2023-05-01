<?php
   include "../includes/header_process.php";

    // SELECT ALL ANNOUNCEMENT
    $selAnnounce = mysqli_query($conn, "SELECT * FROM `announce` ORDER BY time DESC");
   //  $selRemind = mysqli_query($profConn, "SELECT * FROM `reminders` WHERE `empid`");
   //  $selStud = mysqli_query($profConn, "SELECT * FROM `studacc` WHERE `stud_id`");

    // SELECT ALL ANNOUNCMENTS
    $fetchAllAnnouncement = mysqli_query($conn, "SELECT * FROM `announce` ORDER BY `date` desc ");

    $dateToday = date('m-d-y');
    $day = date("d");
    $dayName = date("l");
    $monthName = date("M");
    $year = date("Y");
    $month = date("F");
    $dateNow = "$month $day, $year";

      //SELECT ALL ANNOUNCEMENT TODAY
     $fetchAnnouncementToday = mysqli_query($conn, "SELECT * FROM `announce` WHERE `date` = '$dateNow'");

     $todaysAnnouncement = mysqli_fetch_assoc($fetchAnnouncementToday);


   //   $emp_id = $_SESSION['emp_id'];

   //   // SELECT ALL NURSES
   //    $fetchNurseAccount = mysqli_query($conn, "SELECT * FROM `nurses` WHERE emp_id = '$emp_id'");
   //    $nurse = mysqli_fetch_assoc($fetchNurseAccount);

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" type="image/png" href="../../assets/favcon.png"/> <!-- Icon -->
   <link rel="stylesheet" href="../css/style.css">
   <link rel="stylesheet" href="../css/dashboard.css">
   <title> SMRMS | STUDENT | Personal Information </title>
</head>
<body>

   

   <div class="side-panel">

      <?php include "../includes/profile_nav.php" ?>
        
      <nav class="nav primary-nav">
         
         <div class="sub-header">
         
            <p> Main </p>
         
         </div>
         
         <ul>

            <li class="selected"> 
               <a href="./dashboard.php"> Dashboard </a>
            </li>

            <li> 
               <a href="./personal-information.php"> Personal Information </a>
            </li>
         
            <li> 
               <a href="./medical-requirements.php"> Medical Requirements</a>
            </li>
         
            <li> 
               <a href="./medical-history.php"> Medical History </a>
            </li>

            <li> 
               <a href="./health-history.php"> Health History  </a>
            </li>
         
         
            <li> 
               <a href="./appointment-list.php"> Appointment </a>
            </li>

            <li> 
               <a href="./entrancelog.php"> Entrace Log </a>
            </li>
         </ul>
        
      </nav>
        
      <nav class="nav secondary-nav">
        
         <div class="sub-header">
         
            <p> Settings </p>
         
         </div>
        
         <ul>
            <li> 
               <a href="./manage-account.php"> Manage Account </a>
            </li>
         
            <li> 
               <a href="../../process/logout.php"> Logout </a>
            </li>
         </ul>
        
      </nav>
        
   </div>

   <main>

      <header>

         <div class="logo">
            <img src="../../assets/favcon.png" alt="">
         </div>

         <div class="title">
            <h1>Student Medical Record</h1>
         </div>

      </header>

      <div class="container">

         <div class="personal-details">
            
            <div class="personal-info">

               
            </div>
            
              <div class="announement-prof">
                <div class="announcement-container">

                   <div class="posted-announcement">
                        <h3> ANNOUNCEMENTS FORM SCHOOL NURSES! </h3>
                        <div class="announcements">
                            <?php
                                if ($selAnnounce -> num_rows > 0){
                                    while ($row = $selAnnounce -> fetch_assoc()){ ?>
                                        <div class="announce-prof">
                                            <h5> 
                                                <img src="../../assets/<?=$row['image']?>" width="30" height="40" alt="" />
                                                <span style="margin-right: auto; margin-top: 10px; font-size: 17px;"> &nbsp; <?=$row['position']?> <?=$row['firstname']?> <?=$row['lastname']?> posted </span>
                                                <span class="date-time"> <?=$row['date']?> <?=$row['time']?></span>
                                            </h5>
                                            <p style="margin-left: auto; font-size: 18px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?=$row['announcement'];?> </p>
                                        </div>
                                 <?php }
                                } ?>
                           
                        
                        </div>
                    </div>

                </div>
            </div>




               </div>   

            </div>
            
         </div>

      </div>

   </main>

</body>
</html>