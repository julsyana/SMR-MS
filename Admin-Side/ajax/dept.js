$(document).ready(function(){

   $('#modal-dept-container').hide();
   $('#dept-message-modal').hide();

   // edit department
   $('button[data-role=edit-dept]').click(function(){

      let dept_id = $(this).data('dept_id');

      $('#modal-dept-container').show();

      $('#modal-dept-container').load('../modals/edit-dept_modal.php',{

         dept_id: dept_id,

      });

   });


   // add department
   $('.add-dept').click(function(){

      $('#modal-dept-container').show();

      $('#modal-dept-container').load('../modals/add-dept_modal.php');
   });

   // delete department
   $('button[data-role=del-dept]').click(function(){

      let dept_id = $(this).data('dept_id');
      let dept_name = $(this).data('dept_name');

      $('#modal-dept-container').show();

      $('#modal-dept-container').load('../modals/del-dept_modal.php',{

         dept_id: dept_id,
         dept_name: dept_name,

      });

   });

});