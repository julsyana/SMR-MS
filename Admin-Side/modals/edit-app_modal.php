
<?php
    include "../includes/db_conn.php";
    include "../functions/appointment.php";

    $app_id = $_POST['app_id'];

    $appRes = selApp($conn, $app_id);
    
?>

<div class="modal-container edit-appointment-container" id="edit-appointment-container">
    
    <div class="modal-header">
       <h3> Edit Service Details <span id="app-mess"></span> </h3>
    </div>

     <div class="modal-content">

       <form id="edit-appointment-form">
          <div class="form-input">
             <label for="app-slot"> Service ID: </label>
             <input type="text" name="app_id" value="<?=$appRes['app_id']?>" readonly> 
          </div>

          <div class="form-input">
             <label for="app-type"> Appointment Type: </label>
             <input type="text" name="app_type" value="<?=$appRes['app_type']?>" readonly> 
          </div>

          <div class="form-input date">
             <!-- <label for="app-dates"> Pick an available dates </label> -->

             <table id="app-dates-tbl" border="0">
                <tr>
                   <th width="60%" style="text-align: left;"> Dates </th>
                   <th> Slots </th>
                   <th> Status </th>
                </tr>

                <?php 

                    $appSchedRes = selAppSched($conn, $app_id);

                    if(mysqli_num_rows($appSchedRes) > 0){
                        
                        while($rowAppSched = mysqli_fetch_assoc($appSchedRes)) {
                            $schedDate = $rowAppSched['app_dates'];
                            $schedDate = new DateTime($schedDate);
                            $schedDate = $schedDate->format("F d, Y");
                            ?>
                            <tr>
                                <td> 
                                    <input type="text" value="<?=$schedDate?>" id="date_choose" readonly>
                                </td>
                                <td> 
                                    <input type="number" name="app_slot" id="date_choose" value="<?=$rowAppSched['app_slot']?>">
                                </td>
                                <td> 
                                    <select name="app_status" id="">
                                        <?php 
                                            if($rowAppSched['app_status'] == 'on'){?>

                                                <option value="on"> On </option>
                                                <option value="off"> Off </option>
                                                
                                            <?php } else { ?>

                                                <option value="off"> Off </option>
                                                <option value="on"> On </option>
                                                                                                
                                            <?php 
                                            }
                                        ?>
                                        
                                    </select>
                                </td>
                            </tr>

                            <?php

                        }
                    }
                ?>
                
            </table>
             
          </div>

          <div class="form-button">
             <button type="button" id="edit-app-cancel"> Cancel </button>
             <button type="submit" id="edit-app-save"> Save Changes </button>
          </div>
       </form>

    </div>

</div>


<script>
   $(document).ready(function(){

      $('#edit-app-cancel').click(function(){

          $("#modal-overlay-container").hide();

          $('#edit-appointment-container').hide();

      });
      

   });

</script>


