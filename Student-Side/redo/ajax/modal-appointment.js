$(document).ready(function () {
  $(".view-appointment-container").hide();

  $("#appoint_view[data-role=view-appoint]").click(function () {
    let ref_no = $(this).data("ref_no");

    $(".view-appointment-container").show();

    $("#view-modal").load("../ajax/view/view-appointment.php", {
      ref_no: ref_no,
    });
  });

  $("#appoint_cancel[data-role=cancel-appoint]").click(function () {
    let ref_no = $(this).data("ref_no");

    $(".view-appointment-container").show();

    $("#view-modal").load("../ajax/view/cancel-appointment.php", {
      ref_no: ref_no,
    });
  });
});
