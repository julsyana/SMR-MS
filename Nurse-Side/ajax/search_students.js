$(document).ready(function(){

   $('#search_stud').keyup(function(){
      
      var search = $('#search_stud').val();

      $('.students').load('./php_ajax/search_students.php', {
         search:search
      });

   });


   $('#sort_stud').change(function(){
      
      var sort = $('#sort_stud').val();

      $('.students').load('./php_ajax/sort_students.php', {
         sort:sort
      });

   });

});