<?php
  include "../includes/db_conn.php";

   if(isset($_POST['search'])){
      $search = $_POST['search'];

      $search_app_query = "SELECT * FROM `stud_appointment` WHERE  `reference_no` LIKE '%$search%' OR `student_id` LIKE '%$search%';"; 
      
      $fetchAllAppointments = mysqli_query($conn1, $search_app_query);
      
      ?>



                              <table class="table text-center table-borderless">
                                <thead class="border-bottom border-2 rounded-2">
                                  <tr>
                                    <th scope="col">Student No.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Reference No.</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <a href="#" class="nav-link">

                                        <?php if(mysqli_num_rows($fetchAllAppointments) > 0) { 
                                          while ($appoint = mysqli_fetch_assoc($fetchAllAppointments)) {  ?>

                                        <tr>        
                                            <!-- <td colspan="2"><img src="./assets/badang.JPG"  width="65" height="65" alt=""></td> -->
                                            <td><?=$appoint['student_id']?></td>
                                            <td>Juan T. Dela Cruz</td>
                                            <td><?=$appoint['app_type']?></td>
                                            <td><?=$appoint['app_date']?></td>
                                            <td><?=$appoint['app_time']?></td>
                                            <td><?=$appoint['reference_no']?></td>
                                            <td><label style="color: Green; font-weight: bold;"><?=$appoint['app_status']?></label></td>
                                            <td><a href="#view" class="custom_btn" style="text-decoration: none; color: Blue;font-weight: bold;" data-toggle="modal">View</a></td>
                                        </tr>

                                        <?php } } ?>
                                        
                                     </a>
                                </tbody>
                              </table>
      
   <?php }

?>