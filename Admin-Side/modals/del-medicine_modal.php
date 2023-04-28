<?php
// include "../functions/medicine.php";
// include "../includes/db_conn.php";

 $med_id = $_POST['med_id'];
?>

<div class="del-medicine-container">

   <div class="del-icon">

      <i class="fas fa-trash-alt"> </i>

   </div>

   <div class="del-message">
      <h3> Are you sure you want to remove this medicine? </h3>

      <h2> <span style="text-transform: capitalize;"> <?=$med_id?> </span> </h2>
   </div>


   <div class="form-button">
      <button type="button" id="med-del-n"> No </button>
      <button type="button" id="med-del-y" data-role="med-del-y" data-med_id="<?=$med_id?>"> Yes </button>
   </div>


</div>

<script>
   $(document).ready(function(){

      $('#med-del-n').click(function(){

         $('#medicine-modal-container').hide();

      });


      $('button[data-role=med-del-y]').click(function(){

         let med_id = $(this).data('med_id');
         
         $('#medicine-modal-container').hide();
         
         $('#medicine-message-modal').show();

         $('#medicine-message-modal').load("../process/del_medicine.php", { 

            med_id:med_id,

         });


         


      });

   });
</script>


