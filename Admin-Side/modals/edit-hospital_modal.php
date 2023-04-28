<?php

   include "../includes/db_conn.php";
   include "../functions/hospital.php";

   $hospi_id = $_POST['hospi_id'];

   $hos_res = fetchSelHospital($conn, $hospi_id);
   $hospital_info = mysqli_fetch_assoc($hos_res);


?>

<div class="edit-hospital-container">

   <div class="edit-container-header">
      <p> Edit Hospital Data </p>
   </div>

   <form id="edit-hospital-form">

      <div class="form-input">
         <label for="hospi-id"> Hospital ID </label>
         <input type="text" name="hospi_id" value="<?=$hospital_info['hospi_id']?>" id="hospi-id" readonly>
      </div>

      <div class="form-input">
         <label for="hospi-name"> Hospital name </label>
         <input type="text" name="hospi_name" value="<?=$hospital_info['hospital']?>" id="hospi-name">
      </div>


      <div class="form-input">
         <label for="hospi-address"> Hospital address </label>
         <input type="text" name="hospi_address" value="<?=$hospital_info['hospital_add']?>" id="hospi-address">
      </div>

      <div class="form-input">
         <label for="hospi-email"> Hospital Email </label>
         <input type="text" style="text-transform:lowercase" name="hospi_email" value="<?=$hospital_info['email']?>" id="hospi-email">
      </div>

      <div class="form-input">
         <label for="hospi-cnum"> Hospital number </label>
         <input type="text" name="hospi_cNum" value="<?=$hospital_info['contact_num']?>" maxlength="14" minlength="14" id="hospi-cnum">
      </div>


      <div class="form-button">
         <button type="button" id="hospi-edit-cancel"> Cancel </button>
         <button type="submit" id="hospi-edit-upd"> Save Changes </button>
      </div>

   </form>

</div>

<script>
   $(document).ready(function(){

      $('#hospi-edit-cancel').click(function(){

         $('#hospital-modal-container').hide();

      });


        // when form is submitted
      $('#edit-hospital-form').submit(function(e){

         e.preventDefault(); // prevent load page

         const form =  $('#edit-hospital-form')[0];
         const formData = new FormData(form);

         // ajax
         $.ajax({

            url: "../process/edit_hospital.php",
            type: "POST",
            data: formData,
            contentType: false, 
            processData: false,
            cache: false,
            success: function (data) {

               $('#hospital-modal-container').hide();
               
               $('#hospital-message-modal').show();

               $('#hospital-message-modal').html(data);

               window.location.href = "../pages/hospital.php";

            },
           


         });
         

       

      });
   });
</script>