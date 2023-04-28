<?php
   include "../includes/db_conn.php";
   include "../functions/dept.php";

   $emp_id = $_POST['dept_id'];
   $dept_name = $_POST['dept_name'];

?>

<div class="del-dept-container">

   <div class="del-icon">

      <i class="fas fa-trash-alt"> </i>

   </div>

   <div class="del-message">
      <h3> Are you sure you want to remove this department? </h3>

      <h2> <?=$dept_name?> Department </h2>
   </div>


   <div class="form-button">
      <button type="button" id="dept-del-n"> No </button>
      <button type="button" id="dept-del-y" data-role="dept-del-y" data-emp_id="<?=$emp_id?>"> Yes </button>
   </div>





</div>

<script>
   $(document).ready(function(){

      $('#dept-del-n').click(function(){

         $('#modal-dept-container').hide();

      });


      $('button[data-role=dept-del-y]').click(function(){

         let emp_id = $(this).data('emp_id');
         
         // alert(emp_id);

         $('#modal-dept-container').hide();
         
         $('#dept-message-modal').show();


         $('#dept-message-modal').load("../process/del_dept.php", { 

            emp_id:emp_id,

         });


         


      });

   });
</script>


