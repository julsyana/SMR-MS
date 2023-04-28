<?php
    include_once 'db_conn.php';
    $success  = "";
    if(isset($_POST['addnew']))
    {	 
        $student_id  = $_POST['student_id'];
        $Email  = $_POST['username'];
        $password = $_POST['password'];
        $firstname   = $_POST['firstname'];
        $middlename  = $_POST['middlename'];
        $lastname  = $_POST['lastname'];
        $Birthday  = $_POST['Birthday'];
        $Gender  = $_POST['Gender'];
        $course  = $_POST['course'];
        $year_level  = $_POST['year_level'];
        $Contact_number  = $_POST['Contact_number'];
        $image  = $_POST['image'];
        
        $sql = "INSERT INTO students (student_id,lastname,firstname,middlename,Birthday,Gender,Contact_number,image,course,year_level,Email,password)
        VALUES ('$student_id','$lastname','$firstname','$middlename','$Birthday','$Gender','$Contact_number','$image','$course','$year_level','$Email','$password')";
        if (mysqli_query($conn, $sql))
        {
            $success    =   "New record created successfully!";
        }
        else
        {
        echo "Error: " . $sql . " " . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
?>