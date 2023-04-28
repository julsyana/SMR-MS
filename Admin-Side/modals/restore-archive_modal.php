<?php

   $id = $_POST['id'];

?>

<div class="message-modal">
   <div class="icon">
      <i class="fas fa-question-circle" aria-hidden="true"></i>
   </div>
   <h3> Are you sure you want to restore this data? </h3>

   <h2> <?=$id?> </h2>
   <div class="form-button">
      <button id="no-archive"> No </button>
      <button id="yes-archive"> Yes </button>
   </div>
</div>

<script>
   $(document).ready(function(){

      $('#no-archive').click(function(){

         $('#archive-message-modal').hide();

      });

      $('#yes-archive').click(function(){

         let id = "<?=$id?>";

         $('#archive-message-modal').show();

         $('#archive-message-modal').load('../process/restore_archive.php',{
            id: id,
         });

      });

   });
  
</script>