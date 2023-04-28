<?php
   include "../includes/function-header.php";

   if(isset($_POST['sort'])){
      $sort = $_POST['sort'];

      // $sort_by_query = "SELECT * FROM `medicine` ORDER BY `$sort`"; 
      if($sort == 'id'){
          $sort_by_query = "SELECT * FROM `medicine` ORDER BY id DESC";
      }
      elseif($sort == 'expirationDate'){
         $sort_by_query = "SELECT * FROM `medicine` ORDER BY expirationDate ASC"; 
      }
      elseif($sort == 'num_stocks'){
         $sort_by_query = "SELECT * FROM `medicine` ORDER BY num_stocks ASC"; 
      }
      else{
         $sort_by_query = "SELECT * FROM `medicine` WHERE campus = '$sort' ORDER BY id DESC"; 
      }
      
      $med_res = mysqli_query($conn, $sort_by_query);
      
      ?>



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


      
   <?php }

?>