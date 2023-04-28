<?php
   include "../includes/function-header.php";

   if(isset($_POST['sort'])){
      $sort = $_POST['sort'];

      $sort_by_query = "SELECT * FROM `archive` ORDER BY `$sort`"; 
      
      $archive_res = mysqli_query($conn, $sort_by_query);
      
      ?>



              
            <div class="archive-list-container">
   
               <table>
                  <thead>
                     <tr> 
                        <th width="10%" style="text-align:center"> Image </th>
                        <th width="10%"> ID No. </th>
                        <th width="20%"> Name </th>
                        <th width="10%"> Type </th>
                        <th width="15%"> Date Archive	</th>
                        <th width="5%" style="text-align:center"> Action </th>
                     </tr>
                  </thead>
               </table>
              
               <table border="0"> 
                  
                  <tbody>

                  <?php 
                     if(mysqli_num_rows($archive_res) > 0){

                        while($arch_row = mysqli_fetch_assoc($archive_res)) {

                           $dateArch = convertDate($arch_row['archive_datetime']);
                           $timeArch = convertTime($arch_row['archive_datetime']);

                           ?>

                           <tr>
                              <td width="10%">
                                 <div class="archive-img">
                                    <?php 
                                       if($arch_row['archive_img'] == ''){ ?>

                                          <img src="../assets/QCUClinicLogo.png" alt="">

                                       <?php } else { ?>

                                          <img src="../assets/<?=$arch_row['archive_img']?>" alt="">
                                          
                                       <?php }
                                    ?>
                                    
                                 </div>
                              </td>
                              <td width="10%"> <?=$arch_row['archive_id']?> </td>
                              <td width="20%"> <?=$arch_row['archive_name']?>	 </td>
                              <td width="10%"> <?=$arch_row['archive_type']?> </td>
                              <td width="15%"> <?=$dateArch." ".$timeArch?> </td>
            
                              <td width="5%">
                                 <div class="action-button">
                                    <button id="arch-restore">
                                       <i class="fas fa-redo-alt"></i>
                                    </button>
            
                                    <button id="arch-del">
                                       <i class="fas fa-trash-alt"></i>
                                    </button>
                                 </div>   
                              </td>
                           </tr>

                           <?php 

                        }

                     } else {


                     }

                  ?>

                    

                  </tbody>
               </table>
              
            </div>
      
   <?php }

?>