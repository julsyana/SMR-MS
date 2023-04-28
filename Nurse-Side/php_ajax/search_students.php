<?php
   include "../includes/db_conn.php";

   if(isset($_POST['search'])){
      $search = $_POST['search'];

      $search_students_query = "SELECT * FROM `mis.student_info`
          JOIN `mis.enrollment_status` ON `mis.student_info`.`student_id` = `mis.enrollment_status`.`student_id`
          WHERE `student_id` LIKE '%$search%' OR `email` LIKE '%$search%' OR `firstname` LIKE '%$search%' OR `lastname` LIKE '%$search%' ORDER BY id DESC;";
      // $search_students_query = "SELECT * FROM `mis.student_info`
      //       JOIN `mis.enrollment_status` ON `mis.student_info`.`student_id` = `mis.enrollment_status`.`student_id`
      //       WHERE `mis.student_info`.`student_id` LIKE '%$search%' OR `email` LIKE '%$search%' OR `firstname` LIKE '%$search%' OR `lastname` LIKE '%$search%' OR `contact_number` LIKE '%$search%';"; 
      
      $fetchAllStudents = mysqli_query($conn1, $search_students_query);
      
      ?>

           <div class="students">
                      <!-- <h1>Student</h1> -->

                         

                                <?php if(mysqli_num_rows($fetchAllStudents) > 0) { 
                                  while ($studs = mysqli_fetch_assoc($fetchAllStudents)) {  ?>


                                  <table class="table table-borderless shadow mt-3 text-center align-middle">
                                    <tbody>
                                      <tr class="">
                                        <td class="col-2  text-light fw-bold" style="background:#5D8FD9;width:max-content"><span><?=$studs['student_id']?></span></td>
                                        <td class="col-3 text-start"><span class="name"><?=$studs['firstname']?> <?=$studs['middlename']?> <?=$studs['lastname']?></span></td>
                                        <td class="col-1"><span class="course"><?=$studs['section']?></span></td>
                                        <td class="col-5 text-start"><span class="email"><?=$studs['email']?></span></td>
                                        <td class="col-1"><button class="addpatient-btn px-2" style="background-color: #163666;" id="view" data-id="<?=$studs['student_id']?>">View</button></td>
                                        <td class="col"><span class="name position-relative d-flex align-items-center justify-content-center">
                                        <a href="#" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical " style="color: #163666"></i></a>
                                        <ul class="dropdown-menu" data-popper-placement="left-start" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate3d(-106.667px, 0px, 0px);width:max-content;">
                                        <li><a class="dropdown-item" href="#"><i class="fa-solid fa-edit mx-2"></i>Edit</a></li>
                                        </ul>
                                        </span>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                  <?php } } ?>
                  
                            <div>
   <?php }

?>