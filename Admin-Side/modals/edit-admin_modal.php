<?php

   include "../includes/db_conn.php";
   include "../functions/admin.php";

   $unique_id = $_POST['unique_id'];

   $admin_selected = fetchAdmin($conn, $unique_id);

   $admin_result = mysqli_fetch_assoc($admin_selected);

   


?>

<div class="edit-admin-container">

   <div class="edit-container-header">
      <p> Edit Admin Data </p>
   </div>

   <form action="">

      <div class="form-input">
         <label for="admin-id"> Admin ID </label>
         <input type="text" name="admin_id" value="<?=$admin_result['unique_id']?>" id="admin-id" readonly>
      </div>

      <div class="form-input">
         <label for="admin-email"> Email </label>
         <input type="text" name="admin_email" value="<?=$admin_result['email']?>" id="admin-email">
      </div>

      <div class="form-input">
         <label for="admin-fname"> Firstname </label>
         <input type="text" name="admin_fname" value="<?=$admin_result['fname']?>" id="admin-fname">
      </div>

      <div class="form-input">
         <label for="admin-lname"> Lastname </label>
         <input type="text" name="admin_lname" value="<?=$admin_result['lname']?>" id="admin-lname">
      </div>

      <div class="form-input">
         <label for="admin-cnum"> Contact number </label>
         <input type="text" name="admin_cNum" value="<?=$admin_result['contact_num']?>" maxlength="11" minlength="11" id="admin-cnum">
      </div>


      <div class="form-button">
         <button type="button" id="admin-edit-cancel"> Cancel </button>
         <button type="button" id="admin-edit-upd"> Update Admin </button>
      </div>

   </form>

</div>

<script>
   $(document).ready(function(){

      $('#admin-edit-cancel').click(function(){

         $('#admin-modal-container').hide();

      });
   });
</script>