<?php
    include "../includes/db_conn.php";
    include "../functions/medicine.php";

    $med_id = $_POST['med_id'];
    $med_stocks = $_POST['med_stocks'];
    $med_expDate = $_POST['med_expDate'];
    $med_campus = $_POST['med_campus'];

    try {
        $updMed = updMed($conn, $med_id, $med_stocks, $med_expDate, $med_campus);

        
    
    } catch (\Throwable $th) {
        ?>

        <div class="message-success">
            <h2> Query Failed </h2>

            <p> <?=mysqli_error($conn)?> </p>

            <div class="icon">
                <i class="fas fa-times-circle" style="color: var(--alertBgButton)"></i>
            </div>
        </div>


        <?php 

    }

?>