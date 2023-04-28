<?php
   include "../includes/db_conn.php";

   if(isset($_POST['search'])){
      $search = $_POST['search'];

      $search_medicine_query = "SELECT * FROM `medicine` WHERE  `prod_id` LIKE '%$search%' OR `name` LIKE '%$search%' OR `description` LIKE '%$search%';"; 
      
      $fetchAllMedicine = mysqli_query($conn1, $search_medicine_query);
      
      ?>


                                    
                 <ul class="accordion">
 

                          <?php if(mysqli_num_rows($fetchAllMedicine) > 0) { 
                                      while ($med = mysqli_fetch_assoc($fetchAllMedicine)) {  
                                        
                                        
                                        $expDate = convertDate($med['expirationDate']);

                                        $description = substr($med['description'], 0, 120);
                                        
                                        
                                        ?>

                                      


                          <li>
                              <input type="radio" name="accordion" id="first" checked>
                              <label for="first">
                              <div class="medicine-table">
                                  <table class="table-mdc">
                                  <tbody>
                                      <tr class="mdc-header">
                                      <td style="width:120px; padding-left: 30px;"><img src="./assets/<?=$med['image']?>" width="150px" height="130px"> </td>
                                      <td style="width:200px; padding-left: 20px;" >
                                          <table>
                                          <td class="b1"><?=$med['name']?></td>
                                          <tr>
                                          <td><?=$med['prod_id']?>
                                          <tr>
                                          </td><td class="mdc-brand"><b>Campus:</b> <?=$med['campus']?></td>
                                          </table>
                                      </td>
                                  
                                      <td style="text-align:justify;text-justify:inter-word;width:450px;padding-left: 30px;">
                                          <span class="mdc-stock">Desctiption: </span>
                                          <span class="mdc-qty"><?=$description?>...</span>
                                      </td>
                                          
                              
                                      
                                      <td style="width:370px; padding-left: 50px;">
                                      <!-- <b>Expiration Date:</b> <?=$med['expirationDate']?> -->
                                          <table>
                                          <td class="b1"><b>Expiration Date:</b> <em><?=$expDate?></em></td>
                                          <tr>
                                          <td><b>Stocks:</b> <?=$med['num_stocks']?></td>
                                          </table>
                                      </td>

                                      
                                      <!-- <td style="width:160px;"><img src="./qr_images/<?=$med['qr_code']?>" width="150px" height="130px"> </td> -->
                                      <!-- <td style="width:160px;">
                                        <div class="qr-image">
                                        <img src="./qr_images/<?=$med['qr_code']?>" alt="">
                                        </div>
                                      </td> -->

                                      </tr>
                                      </tbody>
                                      </table>
                                      </div>
                              </label>

                          </li>

                          <?php }} else { ?>

                        <li>
                              <input type="radio" name="accordion" id="first" checked>
                              <label for="first">
                              <div class="medicine-table">
                                  <table class="table-mdc">
                                  <tbody>
                                      <tr class="mdc-header">
                                        <td colspan="6" style="text-align:center;"> No Medicine </colspan=>
                                        </td>
                                      </tr>
                                  </tbody>
                                  </table>
                              </div>
                              </label>

                        </li>

                      <?php }
                      ?>

                  </ul>
   <?php }

?>

<?php


                              function convertDate($date){

                                $date = new DateTime("$date");
                                $date = $date->format('F d, Y');

                                return $date;
                              }

                              function convertTime($time){

                                $time = new DateTime("$time");
                                $time = $time->format('h:i A');

                                return $time;
                              }

?>