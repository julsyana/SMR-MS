$(document).ready(function(){

   $('#med-search').keyup(function(){
      
      var search = $('#med-search').val();

      $('.medicine-list').load('../sort-search-php/search_medicine.php', {
         search:search
      });

   });


   $('#med-sort').change(function(){
      
      var sort = $('#med-sort').val();

      $('.medicine-list').load('../sort-search-php/sort_medicine.php', {
         sort:sort
      });

   });

});