<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

   <link rel="stylesheet" href="../custom-properties.css">
   <link rel="stylesheet" href="mediaQueries.css">
   <link rel="stylesheet" href="./css/register.css">

   <link rel="shortcut icon" href="../assets/favcon.png" type="image/x-icon">
   <title> SMRMS | STUDENT | Regiter your Email </title>
</head>
<body>

      <nav class="navbar" style="background: var(--primary-bg);">
        <div class="container-fluid">
          <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="../clinic-logo.png" alt="" width="50" height="50" class="d-inline-block align-text-top mx-3">
            <h4 class="fw-bold text-light w-100 text-wrap" style="font-size: 30px">Welcome to Student Medical Record</h4>
          </a>
        </div>
      </nav>
   
   <main>
      <form action="../process/check_email.php" method="POST">
         <div class="form-input">
            <label for="email"> Enter your school email </label>
            <input type="email" name="email" id="email" placeholder="juan.delacruz@gmail.com"> 
         </div>

         <div class="form-button">
            
            <input type="submit" name="reg-btn" value="Register Email" />

            <a href="./student-login.php"> Back </a>
         </div>
      </form>
   </main>
</body>
</html>