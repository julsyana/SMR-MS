$(document).ready(function () {
  $("#medicine-modal-container").hide();
  $("#medicine-message-modal").hide();

  $(".add-medicine").click(function () {
    $("#medicine-modal-container").show();

    $("#medicine-modal-container").load("../modals/add-medicine_modal.php");
  });

  $("button[data-role=med-edit]").click(function () {
    let med_id = $(this).data("id");

    $("#medicine-modal-container").show();

    $("#medicine-modal-container").load("../modals/edit-medicine_modal.php", {
      med_id: med_id,
    });
  });

  $("button[data-role=med-del]").click(function () {
    let med_id = $(this).data("id");

    $("#medicine-modal-container").show();

    $("#medicine-modal-container").load("../modals/del-medicine_modal.php", {
      med_id: med_id,
    });
  });
});
