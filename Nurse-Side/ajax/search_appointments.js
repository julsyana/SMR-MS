$(document).ready(function(){

   $('#search_app').keyup(function(){
      
      var search = $('#search_app').val();

      $('.table').load('./php_ajax/search_appointments.php', {
         search:search
      });

   });


   $('#sort_app').change(function(){
      
      var sort = $('#sort_app').val();

      $('.table').load('./php_ajax/sort_appointments.php', {
         sort:sort
      });

   });

});