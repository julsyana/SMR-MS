<?php
    include "../includes/db_conn.php";
    include "../includes/date.php";
    include "../functions/appointment.php";

    $app_slot = $_POST['app_slot'];
    $app_type = $_POST['app_type'];
    $app_date = $_POST['date_selected']; 

    try {

        $app_id = "app".generateAppID(14);
        
        $insApp = insApp($conn, $app_id, $app_type, $date_today);

        if($insApp){

            foreach($app_date as $i => $sched){

                // echo "$app_id: $sched - $app_slot <br>";
                insAppSched($conn, $app_id, $sched, $app_slot);

            }

            ?>

            <div class="message-modal" id="message-modal">

                <h3> Successfully added new <?=$app_type?> appointment.  </h3>

                <div class="icon">
                <i class="fas fa-check-circle"> </i>
                </div>

            </div>

            <script>
                window.location.href = "./appointment.php";
            </script>
            
            <?php 

        } else {
            
            echo "Inserted Failed ".mysqli_error($conn);
        }

    } catch (\Throwable $th) {

        echo "Inserted Failed ".mysqli_error($conn);

    }
?>