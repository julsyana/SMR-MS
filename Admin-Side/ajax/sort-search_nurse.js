$(document).ready(function(){

   $('#nurse-search').keyup(function(){
      
      var search = $('#nurse-search').val();

      $("#nurse-container").load("../sort-search-php/search_nurse.php", {
        search: search,
      });

   });


   $('#nurse-sort').change(function(){
      
      var sort = $('#nurse-sort').val();

      $("#nurse-container").load("../sort-search-php/sort_nurse.php", {
        sort: sort,
      });

   });

});