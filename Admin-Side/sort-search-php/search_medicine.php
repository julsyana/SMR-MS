<?php
   include "../includes/function-header.php";

   if(isset($_POST['search'])){
      $search = $_POST['search'];

      $search_medicine_query = "SELECT * FROM `medicine` WHERE  `prod_id` LIKE '%$search%' OR `name` LIKE '%$search%';"; 
      
      $med_res = mysqli_query($conn, $search_medicine_query);
      
      ?>


                                    
            <!-- <div class="medicine-list-container"> -->
               <table class="medicine-list" border="0">
                  <tbody>

                  <?php 
                     if(mysqli_num_rows($med_res) > 0) {

                        while($med_row = mysqli_fetch_assoc($med_res)){

                           $expDate = convertDate($med_row['expirationDate']);

                           $description = substr($med_row['description'], 0, 120);

                           

                           ?>
                              <tr>
                                 <td>
                                    <div class="med-img" style="padding-left:10px;">
                                       <img src="../assets/<?=$med_row['image']?>" alt="<?=$med_row['image']?>">
                                    </div>
                                 </td>
         
                                 <td width="17%">
                                    <h3 style="text-transform:capitalize;"> <?=$med_row['name']?> </h3>
                                    
                                    <p class="med-id"> <?=$med_row['prod_id']?> </p>

                                    <p class="brand"> Campus: <span> <?=$med_row['campus']?> </span> </p>
         
                                    
                                 </td>
         
                                 <td width="40%">
                                    <div class="med-desc">
                                       
                                       <p>  Description:  <span><?=$description?>...</span> </p>
         
                                    </div>
                                    
                                 </td>
         
                                 <td style="padding-left:40px;">
                                    <p> Expiration Date: <em><?=$expDate?></em> </p>
         
                                    <p> Stocks: <span> <?=$med_row['num_stocks']?> </span></p>
                                 </td>
         
                                 <!-- <td>
                                    <div class="qr-image">
                                       <img src="../qr_images/<?=$med_row['qr_code']?>" alt="">
                                    </div>
                                 </td> -->
         
                                 <td width="8%">
                                    <div class="action-button">
         
                                       <button id="med-edit" data-role="med-edit" data-id="<?=$med_row['prod_id']?>">
                                          <i class="fas fa-edit"></i>
                                       </button>
         
                                       <button id="med-del" data-role="med-del" data-id="<?=$med_row['prod_id']?>">
                                       <i class="fas fa-trash-alt"></i>
                                       </button>
                                    </div>
                                 </td>
                              </tr>
                              
                           <?php 

                        }


                     } else { ?>

                        <tr>
                           <td colspan="6" style="text-align:center;"> No Medicine </td>
                        </tr>


                     <?php }
                  ?>
                     
                     
                  </tbody>

                  
               </table>

              
            <!-- </div> -->
      
   <?php }

?>