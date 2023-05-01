<?php
    session_start();
    date_default_timezone_set("Singapore");
    include('../includes/db_conn.php');
    include('../includes/function-header.php');
    $id = $_SESSION['user_id'];
    // $unique_id = $_SESSION['unique_id'];
    $dateNow = date("m-d-y");
    $timeNow = date("h:i:sa");
    // $selAdminInfo = mysqli_query($conn, "SELECT * FROM `admins` WHERE unique_id = '$unique_id'");
    // $adminInfo = mysqli_fetch_assoc($selAdminInfo);
    // $img = $adminInfo['img'];
    // $position = $adminInfo['position'];
    // $lname = $adminInfo['lname'];
    // $fname = $adminInfo['fname'];

    // select logged admin
    $admin_logged_res = fetchAdmin($conn, $id);
    $admin_logged = mysqli_fetch_assoc($admin_logged_res);

    $img = $admin_logged['img'];
    $position = $admin_logged['position'];
    $fname = $admin_logged['fname'];
    $lname = $admin_logged['lname'];

    echo $img.' '.$position.' '.$lname.', '.$fname.' ';

    

    if(isset($_POST['announceBtn'])){
        $announce = $_POST['announcement'];
        echo $announce;

        $ins = mysqli_query($conn, 'INSERT INTO `announce` (`emp_id`, `position`, `lastname`, `firstname`, `announcement`, `image`, `date`, `time`) VALUES ("'.$id.'", "'.$position.'" , "'.$lname.'" , "'.$fname.'" ,"'.$announce.'", "'.$img.'", "'.$dateNow.'", "'.$timeNow.'")');

        if($ins){
            header("location:../pages/dashboard.php?Inserted Successfuly!");
        }
        else{
            error_log($selAdminInfo);
        }
        
    }
?>

