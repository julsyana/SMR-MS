<?php
   include "../includes/db_conn.php";
   
   if(isset($_POST['search'])){
      $search = $_POST['search'];

      $search_hospital_query = "SELECT * FROM `hospitals` WHERE  `hospital` LIKE '%$search%' OR `hospital_add` LIKE '%$search%' OR `email` LIKE '%$search%' OR `contact_num` LIKE '%$search%';"; 
      
      $fetchAllHospitals = mysqli_query($conn, $search_hospital_query);
      
      ?>



            <table>
              
              <tr id="table_header">
                  <th>Hospital ID</th>
                  <th>Hospital Name</th>
                  <th>Address</th>
                  <th>Email Address</th>
                  <th>Contact No.</th>
                  <th><span>Action</span></th>
              </tr>
              

                <?php if(mysqli_num_rows($fetchAllHospitals) > 0) { 
                  while ($hospital = mysqli_fetch_assoc($fetchAllHospitals)) {  ?>
              
              <tr class="container">
                  <td style="width:140px;" ><span class="hospitalname"><?=$hospital['hospi_id']?></span></td>
                  <td style="width:250px;" ><span class="hospitalname"><?=$hospital['hospital']?></span></td>
                  <td style="width:400px;"><span class="address"><?=$hospital['hospital_add']?></span></td>
                  <td><span class="email"><?=$hospital['email']?></span></td>
                  <td style="width:180px;"><span class="contact_num"><?=$hospital['contact_num']?></span></td>
                  <td>

                  <td><a href="#editHospitalInfo" class="custom_btn edithosbtn" data-toggle="modal"><i class="fa fa-edit" aria-hidden="true" style="color: #3e64ff; font-size: 30px; margin-left: -95px;"></i></a></td>

                  <td><a href="#delHospital" class="custom_btn deletebtn" data-toggle="modal"><i class="fa fa-trash" aria-hidden="true" style="color: #ED1C24; font-size: 30px; margin-left: -75px;"></i></a></td>
                  
              </tr>

                <?php } } ?>
                  

              
            </table>


      
   <?php }

?>