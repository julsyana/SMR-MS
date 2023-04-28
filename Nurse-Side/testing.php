<?php 

     include('./includes/db_conn.php');
        $student_id = '17-1499';
        $sql = "SELECT * FROM stud_medical_requirements WHERE student_id  = '$student_id' ";
        // $run_query = mysqli_query($conn1,$sql) or die(mysqli_error($conn1));
        $query = $conn1->query($sql);

        $row = $query->fetch_assoc();

        $column_info = mysqli_fetch_field($sql);
        $column_name = $column_info->name;
        
        $cbc_file = $row['cbc_file'];
        $cbc_date_submitted = $row['cbc_date_submitted'];
        $cbc_status = $row['cbc_status'];

        echo $column_info;
?>