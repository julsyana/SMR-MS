$(document).ready(function(){

   $('#admin-modal-container').hide();
   $('#admin-message-modal').hide();

   $('button[data-role=edit-admin]').click(function(){

      let unique_id = $(this).data('admin_id');

      $('#admin-modal-container').show();

      $('#admin-modal-container').load('../modals/edit-admin_modal.php', {

         unique_id: unique_id

      });

   });


   $('button[data-role=del-admin]').click(function(){

      let unique_id = $(this).data('admin_id');

      // alert(unique_id);

      $('#admin-modal-container').show();

      $('#admin-modal-container').load('../modals/del-admin_modal.php', {

         unique_id: unique_id

      });

   });


   $('#add-admin').click(function(){

      $('#admin-modal-container').show();

      $('#admin-modal-container').load('../modals/add-admin_modal.php');

   });

  

});