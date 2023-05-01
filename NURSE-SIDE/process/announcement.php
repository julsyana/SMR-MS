<?php
    session_start();
    date_default_timezone_set("Singapore");
    include('../includes/db_conn.php');
    $emp_id = $_SESSION['emp_id'];
    $dateNow = date("m-d-y");
    $timeNow = date("h:i:sa");

    $selNurseInfo = mysqli_query($conn1, "SELECT * FROM `nurses` WHERE emp_id = '$emp_id'");
    $nurseInfo = mysqli_fetch_assoc($selNurseInfo);
    $img = $nurseInfo['profile_pic'];
    $position = $nurseInfo['position'];
    $lname = $nurseInfo['lastname'];
    $fname = $nurseInfo['firstname'];
    echo $img.' '.$position.' '.$lname.', '.$fname.' ';

    if(isset($_POST['announceBtn'])){
        $announce = $_POST['announcement'];
        echo $announce;

        $ins = mysqli_query($conn1, 'INSERT INTO `announce` (`emp_id`, `position`, `lastname`, `firstname`, `announcement`, `image`, `date`, `time`) VALUES ("'.$emp_id.'", "'.$position.'" , "'.$lname.'" , "'.$fname.'", "'.$announce.'", "'.$img.'", "'.$dateNow.'", "'.$timeNow.'")');

        if($ins){
            header("location:../dashboard.php?Inserted Successfuly!");
        }
        else{
            error_log($selNurseInfo);
        }
        
    }
?>

