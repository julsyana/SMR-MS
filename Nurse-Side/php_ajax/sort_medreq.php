<?php
    include "../includes/db_conn.php";

   if(isset($_POST['sort'])){
      $sort = $_POST['sort'];

      $sort_by_query = "SELECT * FROM `nurses` ORDER BY `$sort`"; 
      
      $fetchAllNurses = mysqli_query($conn1, $sort_by_query);
      
      ?>



 

   
            <?php if(mysqli_num_rows($fetchAllNurses) > 0) { 
                while ($nurses = mysqli_fetch_assoc($fetchAllNurses)) {  ?>

            <div class="card">
              <img src="./assets/<?=$nurses['profile_pic']?>" alt="" />
              <div class="card_content">
                <span class="stud_id"><?=$nurses['emp_id']?></span>
                <span class="name"><?=$nurses['firstname']?> <?=$nurses['lastname']?></span>
                <span class="nurse"><?=$nurses['position']?></span>
                <div class="card_footer">
                  <span class="date"><?=$nurses['schedule']?></span>
                    <a href="#viewNurseInfo" class="custom_btn nurseinfobtn" ><i class="fa fa-info-circle" aria-hidden="true" style="color: gray;"></i></a>
                    <a href="#editNurseInfo" class="custom_btn nurseeditbtn"><i class="fa fa-edit" aria-hidden="true" style="color: #37954B;"></i></a>
                    <a href="#delNurse" class="custom_btn" data-toggle="modal"><i class="fa fa-trash" aria-hidden="true" style="color: #ED1C24;"></i></a>
                </div>
              </div>
            </div>

                <?php } } ?>




      
   <?php }

?>