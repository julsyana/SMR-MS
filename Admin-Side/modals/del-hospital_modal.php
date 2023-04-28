<?php

   $hospi_id = $_POST['hospi_id'];
   $hos_name = $_POST['hospi_name'];

?>

<div class="del-hospital-container">

   <div class="del-icon">

      <i class="fas fa-trash-alt"> </i>

   </div>

   <div class="del-message">
      <h3> Are you sure you want to remove this hospital? </h3>

      <h2> <span style="text-transform: capitalize;"> <?=$hos_name?> </span> </h2>
   </div>


   <div class="form-button">
      <button type="button" id="hospi-del-n"> No </button>
      <button type="button" id="hospi-del-y" data-role="hospi-del-y" data-hospi_id="<?=$hospi_id?>"> Yes </button>
   </div>


</div>

<script>
   $(document).ready(function(){

      $('#hospi-del-n').click(function(){

         $('#hospital-modal-container').hide();

      });


      $('button[data-role=hospi-del-y]').click(function(){

         let hospi_id = $(this).data('hospi_id');
         
         $('#hospital-modal-container').hide();
         
         $('#hospital-message-modal').show();

         $('#hospital-message-modal').load("../process/del_hospital.php", { 

            hospi_id:hospi_id,

         });


         


      });

   });
</script>


