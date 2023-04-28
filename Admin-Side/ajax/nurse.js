$(document).ready(function(){

   $('#nurse-modal-container').hide();
   $('#nurse-message-modal').hide();

   $('.add-nurse').click(function(){

      $('#nurse-modal-container').show();

      $('#nurse-modal-container').load('../modals/add-nurse_modal.php');


   });


   $('button[data-role=del-nurse]').click(function(){

      let emp_id = $(this).data('emp_id');
      let emp_uname = $(this).data('uname');

      $('#nurse-modal-container').show();

      $('#nurse-modal-container').load('../modals/del-nurse_modal.php', {

         unique_id: emp_id,
         uname: emp_uname

      });

   });


});