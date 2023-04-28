$(document).ready(function(){

   $('#arc-search').keyup(function(){
      
      var search = $('#arc-search').val();

      $('.archive-list-container').load('../sort-search-php/search_archive.php', {
         search:search
      });

   });


   $('#arc-sort').change(function(){
      
      var sort = $('#arc-sort').val();

      $('.archive-list-container').load('../sort-search-php/sort_archive.php', {
         sort:sort
      });

   });

});