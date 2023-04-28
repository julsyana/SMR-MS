<?php
   include "../includes/function-header.php";

   if(isset($_POST['search'])){
      $search = $_POST['search'];

      $search_hospital_query = "SELECT * FROM `hospitals` WHERE  `hospital` LIKE '%$search%' OR `hospital_add` LIKE '%$search%' OR `email` LIKE '%$search%' OR `contact_num` LIKE '%$search%';"; 
      
      $hospital_res = mysqli_query($conn, $search_hospital_query);
      
      ?>


        <!-- <div class="hospital-list-container"> -->
               <table class="hospital-list" border="0">
                  <thead>
                     <tr>
                        <th width="10%" style="text-align:center"> Hospital ID </th>
                        <th> Hospital Name </th>
                        <th width="30%"> Address </th>
                        <th> Email </th>
                        <th width="15%"> Contact </th>
                        <th width="8%" style="text-align:center"> Action </th>
                     </tr>
                  </thead>

                  <tbody>

                  <?php 
                  
                     if(mysqli_num_rows($hospital_res) > 0) {

                        while($hospital_row = mysqli_fetch_assoc($hospital_res)){

                           ?>

                           <tr>
                              <td  style="text-align:center"> <?=$hospital_row['hospi_id']?>	</td>
                              <td> <?=$hospital_row['hospital']?> </td>
                              <td style="font-size: .9em;"> <?=$hospital_row['hospital_add']?> </td>
                              <td> 
                                 <div class="email">

                                    <?=$hospital_row['email']?>

                                 </div>
                              </td>
                              <td> <?=$hospital_row['contact_num']?> </td>
                              <td> 
                                 <div class="action-button">

                                    <button id="hospital-edit" data-role="hospital-edit" data-hos_id="<?=$hospital_row['hospi_id']?>">

                                       <i class="fas fa-edit"></i>

                                    </button>

                                    <button id="hospital-del" data-role="hospital-del" data-hos_id="<?=$hospital_row['hospi_id']?>" data-name="<?=$hospital_row['hospital']?>">

                                       <i class="fas fa-trash-alt"></i>

                                    </button>

                                 </div>
                              </td>
                              
                           </tr>


                           <?php

                        }

                     } else {

                        ?>

                           <tr>
                              <td  style="text-align:center" colspan="6"> No data </td>
                           
                              
                           </tr>


                           <?php

                        

                     }
                  ?>
                     
                  </tbody>
               </table>
            <!-- </div> -->

      
   <?php }

?>