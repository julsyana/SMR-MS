<?php
    session_start();
    date_default_timezone_set("Singapore");
    include('../includes/db_conn.php');
    $emp_id = $_SESSION['emp_id'];

    $dateNow = date("m-d-y");
    $timeNow = date("h:i:sa");

    $selNurseInfo = mysqli_query($conn1, "SELECT * FROM `nurses` WHERE emp_id = '$emp_id'");
    $nurseInfo = mysqli_fetch_assoc($selNurseInfo);
    $kind = $nurseInfo['kind'];
    $lname = $nurseInfo['lastname'];
    $fname = $nurseInfo['firtname'];
    echo $lname;

    if(isset($_POST['announceBtn'])){
        $announce = $_POST['announcement'];
        echo $announce;

        $ins = mysqli_query($conn1, 'INSERT INTO `announce` (`emp_id`, `kind`, `lastname`, `firstname`, `announcement`, `date`, `time`) VALUES ("'.$emp_id.'", "'.$kind.'" , "'.$lname.'", "'.$fname.'", "'.$announce.'", "'.$dateNow.'", "'.$timeNow.'")');

        if($ins){
            header("location: ../dashboard.php?Inserted Successfuly");
        }
        else{
            error_log($selNurseInfo);
        }
        
    }

?>