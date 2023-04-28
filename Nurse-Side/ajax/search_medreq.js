$(document).ready(function(){

   $('#search_hospital').keyup(function(){
      
      var search = $('#search_hospital').val();

      $('.hospital_table_details').load('./php_ajax/search_medreq.php', {
         search:search
      });

   });


   $('#filter_admin').change(function(){
      
      var sort = $('#filter_admin').val();

      $('.hospital_table_details').load('./php_ajax/sort_medreq.php', {
         sort:sort
      });

   });

});