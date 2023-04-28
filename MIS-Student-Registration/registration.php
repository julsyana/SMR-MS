<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="registration.css">
    <title>Student Registration</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="header-name">
              <img src="../Entrance/assets/QCULogo.png" alt="">
              <h3>Welcome to Quezon City University</h3>
          </div>
        </div>

        <div class="content">
            <h1>Student Registration</h1>
            <div class="form-container">
                <form action="insert.php" method="POST" enctype="multipart/form-data">
                    <h2>Basic Information</h2><br>
                    <label for="firstname">Firstname:</label>
                    <input type="text" name="firstname" id="firstname" required><br><br>

                    <label for="middlename">Middlename:</label>
                    <input type="text" name="middlename" id="middlename" required><br><br>

                    <label for="lastname">Lastname:</label>
                    <input type="text" name="lastname" id="lastname" required><br><br>

                    <label for="extension">Extension</label>
                    <input type="text" name="extension" id="extension"><br><br>

                    <label for="age">Age</label>
                    <input type="text" name="age" id="age" required><br><br>

                    <label for="birthdate">Birthdate</label>
                    <input type="date" name="birthdate" id="birthdate" required><br><br>

                    <label for="gender">Gender</label>
                    <select id="gender" name="gender">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>

                    <br>
                    <br>

                    <label for="weight">Weight(kg)</label>
                    <input type="text" name="weight" id="weight" required><br><br>

                    <label for="height">Height(ft)</label>
                    <input type="text" name="height" id="height" required><br><br>

                    <label for="contactnum">Contact Number</label>
                    <input type="text" name="contactnum" id="contactnum" required><br><br>

                    <label for="reg-email">School Email</label>
                    <input type="text" name="reg-email" id="reg-email" required><br><br>

                    <label for="image">Profile Picture:</label>
                    <input type="file" name="image" id="image" accept="image/*" required><br><br>
                    <br>
                        <hr>
                    <br>
                    <h2>Address</h2>
                    <br>
                    
                    <label for="house_no">House Number</label>
                    <input type="text" name="house_no" id="house_no" required><br><br>

                    <label for="street">Street</label>
                    <input type="text" name="street" id="street" required><br><br>

                    <label for="barangay">Barangay</label>
                    <input type="text" name="barangay" id="barangay" required><br><br>

                    <label for="city">City</label>
                    <input type="text" name="city" id="city" required><br><br>

                    <label for="province">Province</label>
                    <input type="text" name="province" id="province" required><br><br>

                    <label for="district">District</label>
                    <input type="text" name="district" id="district" required><br><br>

                    <label for="zip_code">Zip_code</label>
                    <input type="text" name="zip_code" id="zip_code" required><br><br>

                    <br>
                        <hr>
                    <br>
                    <h2>Emergency Contact</h2>
                    <br>

                    <label for="fullname">Fullname</label>
                    <input type="text" name="fullname" id="fullname" required><br><br>

                    <label for="relationship">Relationship</label>
                    <input type="text" name="relationship" id="relationship" required><br><br>

                    <label for="emer_contactnum">Contact Number</label>
                    <input type="text" name="emer_contactnum" id="emer_contactnum" required><br><br>

                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" required><br><br>

                    <br>
                        <hr>
                    <br>
                    <h2>Enrollment</h2>
                    <br>

                    <label for="stud_num">Student Number</label>
                    <input type="text" name="stud_num" id="stud_num" required><br><br>

                    <label for="code">Course Code</label>
                    <select id="code" name="code">
                        <option value="BSIT">BSIT</option>
                        <option value="BSA">BSA</option>
                        <option value="BSENT">BSENT</option>
                        <option value="BECEd">BECEd</option>
                        <option value="BSECE">BSECE</option>
                        <option value="BSIE">BSIE</option>
                    </select>
                    <br><br>

                    <label for="course">Course</label>
                    <select id="course" name="course">
                        <option value="Bachelor Of Science In Information Technology">Bachelor Of Science In Information Technology</option>
                        <option value="Bachelor Of Science In Accountancy">Bachelor Of Science In Accountancy</option>
                        <option value="Bachelor Of Science In Entrepreneurship">Bachelor Of Science In Entrepreneurship</option>
                        <option value="Bachelor Of Early Childhood Education">Bachelor Of Early Childhood Education</option>
                        <option value="Bachelor Of Science In Electronics Engineering">Bachelor Of Science In Electronics Engineering</option>
                        <option value="Bachelor Of Science In Information Technology">Bachelor Of Science In Information Technology</option>
                    </select>
                    
                    <br><br>

                    <label for="yrlvl">Year Level</label>
                    <select id="yrlvl" name="yrlvl">
                        <option value="1st">1st</option>
                        <option value="2nd">2nd</option>
                        <option value="3rd">3rd</option>
                        <option value="4th">4th</option>
                        <option value="5th">5th</option>
                    </select>

                    <br><br>

                    <label for="section">Section</label>
                    <input type="text" name="section" id="section" required><br><br>

                    <label for="campus">Campus</label>
                    <select id="campus" name="campus">
                        <option value="batasan">Batasan</option>
                        <option value="san fransisco">San Fransisco</option>
                        <option value="san bartolome">San Bartolome</option>
                    </select>
                    <br>
                    <br>

                    <input type="submit" name="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>