$(document).ready(function(){

   $('#hospital-modal-container').hide();
   $('#hospital-message-modal').hide();

   $('.add-hospital').click(function(){

      $('#hospital-modal-container').show();

      $('#hospital-modal-container').load('../modals/add-hospital_modal.php');

   });


   $('button[data-role=hospital-edit]').click(function(){

      let hospi_id = $(this).data('hos_id');

      $('#hospital-modal-container').show();

      $('#hospital-modal-container').load('../modals/edit-hospital_modal.php', {

         hospi_id: hospi_id,

      });
      
   });


   $('button[data-role=hospital-del]').click(function(){

      let hospi_id = $(this).data('hos_id');
      let hospi_name = $(this).data('name');

      $('#hospital-modal-container').show();

      $('#hospital-modal-container').load('../modals/del-hospital_modal.php',{

         hospi_id: hospi_id,
         hospi_name: hospi_name,

      });
      
   });

});