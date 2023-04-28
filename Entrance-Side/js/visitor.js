$(".choosePhoto").on("click", function () {

   $(this).siblings().removeClass("btn-primary");
   $(this).addClass("btn-primary");

   const index = $(this).index();
   $(".inputPhoto").eq(index).siblings().removeClass("isDisplay");
   $(".inputPhoto").eq(index).addClass("isDisplay");

 });

 $(".next").on("click", function () {

   $(".form-1").addClass("toLeft");
   $(".form-2").removeClass("toLeft");

 });
 
 $(".back").on("click", function () {
   $(".form-2").addClass("toLeft");
   $(".form-1").removeClass("toLeft");
 });
 
 $("#image_upload").on("change", function (e) {
   $("#imgChosen").text(this.files[0].name);
 
   // test lang hahah create and display img pag upload
   // const img = document.getElementById("image_output");
   // img.src = URL.createObjectURL(e.target.files[0]);
 });
 