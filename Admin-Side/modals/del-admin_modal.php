<?php
   include "../includes/db_conn.php";
   include "../functions/admin.php";

   $unique_id = $_POST['unique_id'];

   $admin_selected = fetchAdmin($conn, $unique_id);

   $admin_result = mysqli_fetch_assoc($admin_selected);
?>

<div class="del-admin-container">

   <div class="del-icon">

      <i class="fas fa-trash-alt"> </i>

   </div>

   <div class="del-message">
      <h3> Are you sure you want to remove this admin? </h3>

      <h2> <?=$admin_result['unique_id']?> </h2>
   </div>


   <div class="form-button">
      <button type="button" id="admin-del-n"> No </button>
      <button type="button" id="admin-del-y"> Yes </button>
   </div>





</div>

<script>
   $(document).ready(function(){

      $('#admin-del-n').click(function(){

         $('#admin-modal-container').hide();

      });

      $('#admin-del-y').click(function(){

         let unique_id = "<?=$admin_result['unique_id']?>";

         $('#admin-modal-container').hide();

         $('#admin-message-modal').load('../process/del_admin.php', {

            unique_id:unique_id, 

         });

         $('#admin-message-modal').show();

      });
   });
</script>
