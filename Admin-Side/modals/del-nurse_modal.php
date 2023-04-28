<?php
   $unique_id = $_POST['unique_id'];
   $uname = $_POST['uname'];
?>

<div class="del-admin-container">

   <div class="del-icon">

      <i class="fas fa-trash-alt"> </i>

   </div>

   <div class="del-message">
      <h3> Are you sure you want to remove this nurse? </h3>

      <h2> <?=$uname?> </h2>
   </div>


   <div class="form-button">
      <button type="button" id="nurse-del-n"> No </button>
      <button type="button" id="nurse-del-y" data-nurse_id="<?=$unique_id?>"> Yes </button>
   </div>





</div>

<script>
   $(document).ready(function(){

      $('#nurse-del-n').click(function(){

         $('#nurse-modal-container').hide();

      });

      $('#nurse-del-y').click(function(){

         let nurse_id = $(this).data('nurse_id');

         $('#nurse-modal-container').hide();

         $('#nurse-message-modal').show();

         $('#nurse-message-modal').load('../process/del_nurse.php', {

            nurse_id: nurse_id,

         });

      });

     
   });
</script>
