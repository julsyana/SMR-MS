<?php
include './connection.php';

if(isset($_POST['toverify'])){
    
    // $uname = $_POST['student_number'];
    $query = "SELECT * FROM sample_stud_data WHERE student_id='$uname'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);
    // $abc = $row['student_number'];
    $changestatus = "UPDATE entrance_log SET status='Cleared' WHERE student_number = $abc";
    echo '<script type = "text/javascript">';
    echo 'alert("The Student is verify!");';
    // echo 'window.location.href = "entrance-dashboard.php"';
    echo '</script>';
}
?>