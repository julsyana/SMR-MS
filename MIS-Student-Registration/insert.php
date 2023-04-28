<?php
include 'conn.php';

if (isset($_POST['submit'])) {
	// Basic Info
	$fname = $_POST['firstname'];
	$mname = $_POST['middlename'];
	$lname = $_POST['lastname'];
	$extension = $_POST['extension'];
	$age = $_POST['age'];
	$birthdate = $_POST['birthdate'];
	$gender = $_POST['gender'];
	$weight = $_POST['weight'];
	$height = $_POST['height'];
	$contactnum = $_POST['contactnum'];
	$email = $_POST['reg-email'];
	$image = $_FILES['image']['name'];
	$image_tmp = $_FILES['image']['tmp_name'];
	// Move uploaded image to a folder
	$upload_dir = "../Student/assets/student-img/";
	move_uploaded_file($image_tmp, $upload_dir.$image);

    // Address
    $house_no = $_POST['house_no'];
    $street = $_POST['street'];
    $barangay = $_POST['barangay'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $district = $_POST['district'];
    $zip_code = $_POST['zip_code'];

    //Emergency Contact
    $fullname = $_POST['fullname'];
    $relationship = $_POST['relationship'];
    $emer_contactnum = $_POST['emer_contactnum'];
    $address = $_POST['address'];

    //Enrollment Status
    $stud_num = $_POST['stud_num'];
    $code = $_POST['code'];
    $course = $_POST['course'];
    $yrlvl = $_POST['yrlvl'];
    $section = $_POST['section'];
    $campus = $_POST['campus'];


	// for basic info
	$sql = "INSERT INTO `mis.student_info` (student_id, firstname, middlename, lastname, extension, age, birthdate, gender, height, weight, contact_number, email, id_image) 
			VALUES ('$stud_num', '$fname', '$mname', '$lname', '$extension', '$age', '$birthdate', '$gender', '$height', '$weight', '$contactnum', '$email', '$image');
--  for address
            INSERT INTO `mis.student_address` (student_id,house_no, street, brgy, city, province, district, zip_code) VALUES ('$stud_num', '$house_no', '$street' ,'$barangay', '$city', '$province' ,'$district', '$zip_code');
-- for emergency contact
            INSERT INTO `mis.emergency_contact` (student_id,fullname, relation, contact_number, address) VALUES ('$stud_num', '$fullname', '$relationship', '$emer_contactnum', '$address');
-- for enrollment status
            INSERT INTO `mis.enrollment_status` (student_id, code, program, year_level, section, branch) VALUES ('$stud_num', '$code', '$course', '$yrlvl', '$section', '$campus')";

	if ($conn->multi_query($sql) === TRUE) {
  echo "New records created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}


?>