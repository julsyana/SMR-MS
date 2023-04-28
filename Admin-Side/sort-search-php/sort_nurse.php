<?php
    include "../includes/function-header.php";


   if(isset($_POST['sort'])){
      $sort = $_POST['sort'];

      if($sort == 'id'){
          $sort_by_query = "SELECT * FROM `nurses` ORDER BY id DESC";
      }
      else{
         $sort_by_query = "SELECT * FROM `nurses` WHERE campus = '$sort' ORDER BY id DESC"; 
      }

      
      $total_nurse = mysqli_query($conn, $sort_by_query);
      
      ?>





  
                  <!-- loop here -->

                  <?php 
                     if(mysqli_num_rows($total_nurse) > 0) {

                        while($nurse_row = mysqli_fetch_assoc($total_nurse)) {
                           
                           $nurseSched_res = fetchScheduleByNurse($conn, $nurse_row['emp_id']);



                           ?>

                           <!-- <a href="./veiw-nurse.php?emp_id=<?=$nurse_row['emp_id']?>" class="card-holder"> -->

                              <div class="card">
                                 <div class="image-holder"><img src="../assets/<?=$nurse_row['profile_pic']?>" alt="" /></div>
                                 

                                 <div class="card_content">

                                    <span class="stud_id"> <?=$nurse_row['emp_id']?> </span>
                                    <!-- <span class="name"> <?=$nurse_row['firstname']?> <?=$nurse_row['lastname']?> </span> -->

                                     <span class="name"> <?=$nurse_row['username']?> </span>
                                    <span class="nurse"> <?=$nurse_row['position']?> </span>

                                    <div class="card_footer">
                                   
                                       <span class="date">

                                          

                                          <?php
                                             if(mysqli_num_rows($nurseSched_res) > 0){
                                                while($nurseSched_row = mysqli_fetch_assoc($nurseSched_res)){

                                                   echo "<span>".$nurseSched_row['day']."</span>";

                                                }
                                             } else {

                                                echo "No Schedule";
                                             }
                                          ?>
                                       </span>

                                       <span class="form-button">

                                          <a href="./veiw-nurse.php?emp_id=<?=$nurse_row['emp_id']?>" class="custom_btn nurseinfobtn" >

                                             
                                             <i class="fas fa-info-circle    "></i>
                                          </a>

                                          <button data-role="del-nurse" data-emp_id="<?=$nurse_row['emp_id']?>" data-uname="<?=$nurse_row['username']?>">

                                             <i class="fas fa-trash-alt"></i>
                                          </button>

                                       </span>

                                    </div>
                                 </div>
                              </div>

                           <!-- </a> -->

                           <?php


                        }

                     }
                  
                  ?>
    

      
   <?php }

?>