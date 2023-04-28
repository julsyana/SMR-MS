$(document).ready(function () {
  testing();
  function testing() {
    console.log("testing");
  }

  $(document).on("click", "#close-cert", function () {
    window.location.href = "student.php";
  });

  const medicine = (() => {
    const medicine_arr = [];

    $(document).on("change", "#medicine", function () {
      var select = document.getElementById("medicine");
      var selectedOption = select.options[select.selectedIndex];

      // var listItem = document.createElement("li");
      // listItem.textContent =

      var close_span = ` 
          <li class="d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto" id="content">
             ${selectedOption.textContent}
            </div>
              <button class="btn badge bg-body-secondary text-dark rounded-pill" id="remove_medicine">X</button>
          </li>`;

      $("#list").append(close_span);
      select.remove(select.selectedIndex);
      medicine_arr.push(selectedOption.textContent);
    });
    return medicine_arr;
  })();

  const hospital = (() => {
    $(document).on("change", "#hospital", function () {
      var select = document.getElementById("hospital");
      var li = document.createElement("li");
      var selectedOption = select.options[select.selectedIndex];

      li.textContent = selectedOption.value;
      $("#hospital-list").html(li.textContent);
      $("#hospital-list").attr("data-hospital", selectedOption.text);
    });
  })();

  $(document).on("change", "input[name='referred[]']", function () {
    var select = document.getElementById("hospital");
    if ($(this).val() === "Yes" || $(this).val() === "yes") {
      $("#hospital").prop("disabled", false);
    } else {
      $("#hospital").prop("disabled", true);
      select.selectedIndex = 0;
      $("#hospital-list").text("");
    }
  });
  $(document).on("change", "input[name='confined[]']", function () {
    if ($(this).val() === "Yes" || $(this).val() === "yes") {
      $("#how_long").prop("disabled", false);
    } else {
      $("#how_long").prop("disabled", true);
      $("#how_long").val("");
    }
  });

  $(document).on("click", "#remove_medicine", function () {
    var select = document.getElementById("medicine");

    const parent = $(this).parent()[0];
    const content = $(parent).children("#content").text();
    const option = document.createElement("option");
    option.text = content;

    parent.remove();
    select.add(option);
    console.log(parent);
  });

  $(document).on("click", "#view_appointment", function () {
    let ref_no = $(this).attr("data-ref_no");
    console.log(ref_no);

    $.ajax({
      url: "fetchData.php",
      method: "POST",
      data: { appointment: 1, ref_no: ref_no },
      success: function (data) {
        $("#appointment_content").html(data);
      },
    });
  });
  $(document).on("click", "#change_status", function () {
    let student_id = $(this).attr("data-id");
    $.ajax({
      url: "fetchData.php",
      method: "POST",
      data: { status: 1, student_id: student_id },
      success: function (data) {
        console.log(data);
      },
    });
  });

  $(document).on("click", "#done", function () {
    let ref_no = $(this).attr("data_ref_no");

    console.log(ref_no);

    $.ajax({
      url: "fetchData.php",
      method: "POST",
      data: { done: 1, ref_no: ref_no },
      success: function (data) {
        console.log(data);
      },
    });
  });

  $(document).on("click", "#consultation_submit", function () {
    const date = new Date();
    const date_now = Intl.DateTimeFormat("en-ph", {
      dateStyle: "short",
      timeZone: "Asia/Manila",
    }).format(date);

    let symptoms = [],
      otherSymptoms = [],
      close_contact = [],
      confined,
      referred,
      cleared,
      covid_test,
      temperature,
      how_long,
      quantity,
      student_id,
      hospital = $("#hospital-list").attr("data-hospital"),
      hospital_add = $("#hospital-list").text(),
      medicines = medicine.join(", ");

    console.log(hospital_add);
    student_id = $(this).attr("data-id");

    $("input[name='symptoms[]']:checked").each(function () {
      symptoms.push($(this).val());
    });
    $("input[name='othersymptoms[]']:checked").each(function () {
      otherSymptoms.push($(this).val());
    });
    $("input[name='confined[]']:checked").each(function () {
      // confined.push($(this).val());
      confined = $(this).val();
    });
    $("input[name='referred[]']:checked").each(function () {
      // referred.push($(this).val());
      referred = $(this).val();
    });
    $("input[name='cleared[]']:checked").each(function () {
      // cleared.push($(this).val());
      cleared = $(this).val();
    });
    $("input[name='close_contact[]']:checked").each(function () {
      // close_contact.push($(this).val());
      close_contact = $(this).val();
    });

    covid_test = $("input[name='covid_test']").val();
    temperature = $("input[name='body_temp']").val();
    how_long = $("input[name='how_long']").val();
    quantity = $("input[name='quantity']").val();

    if (
      typeof quantity === "undefined" ||
      quantity === null ||
      quantity === ""
    ) {
      alert("please Fill the FF:");
    } else {
      $.ajax({
        method: "POST",
        url: "fetchData.php",
        data: {
          confirm: 1,
          student_id: student_id,
          date_now: date_now,
          symptoms: symptoms.join(", "),
          othersymptoms: otherSymptoms.join(", "),
          body_temp: temperature,
          close_contact: close_contact,
          covid_test: covid_test,
          cleared: cleared,
          confined: confined,
          how_long: how_long,
          medicines: medicines,
          referred: referred,
          quantity: quantity,
          hospital: hospital,
          hospital_add: hospital_add,
        },
        success: function (response) {
          $("#student").html(response);
        },
      });

      if (cleared[0] === "Not Verified") {
        $.ajax({
          url: "fetchData.php",
          method: "POST",
          data: { fetch_stud_data: 1, id: student_id },
          success: function (response) {
            $("#student").html(response);

            // $('#student').html(data)
            consultation(student_id, student);
          },
        });
      }
    }
  });

  $(document).on("click", "#view", function () {
    let id = $(this).attr("data-id");
    $.ajax({
      url: "fetchData.php",
      method: "POST",
      data: { fetch_stud_data: 1, id: id },
      success: function (response) {
        $("#student").html(response);
        // $('#student').html(data)
        consultation(id);
      },
    });
  });

  $(document).on("click", "#consultation", function () {
    let id = $(this).attr("data-id");
    $.ajax({
      url: "fetchData.php",
      method: "POST",
      data: { new_consultation: 1, id: id },
      success: function (response) {
        $("#student").html(response);
        console.log(data);
        consultation(id);
      },
    });
  });

  function consultation(id) {
    $.ajax({
      url: "fetchData.php",
      method: "POST",
      data: { consultation: 1, id: id },
      success: function (response) {
        $("#medical-content").html(response);
        // $('#student').html(data)
      },
    });
  }
  $(document).on("click", "#med-his", function () {
    let id = $(this).attr("data-id");

    consultation(id);
    console.log(id);
  });

  $(document).on("click", "#covac-info", function () {
    let id = $(this).attr("data-id");
    $.ajax({
      url: "fetchData.php",
      method: "POST",
      data: { med_info: 1, id: id },
      success: function (response) {
        console.log(response);
        $("#medical-content").html(response);
      },
    });
  });
  $(document).on("click", "#med-req", function () {
    let id = $(this).attr("data-id");
    $.ajax({
      url: "fetchData.php",
      method: "POST",
      data: { med_req: 1, id: id },
      success: function (response) {
        console.log(response);
        $("#medical-content").html(response);
      },
    });
  });
  $(document).on("click", "#health-his", function () {
    let id = $(this).attr("data-id");
    $.ajax({
      url: "fetchData.php",
      method: "POST",
      data: { health_history: 1, id: id },
      success: function (response) {
        console.log(response);
        $("#medical-content").html(response);
      },
    });
  });
  $(document).on("click", "#family-his", function () {
    let id = $(this).attr("data-id");
    $.ajax({
      url: "fetchData.php",
      method: "POST",
      data: { fam_history: 1, id: id },
      success: function (response) {
        console.log(response);
        $("#medical-content").html(response);
      },
    });
  });

  $(document).on("click", ".student_input_button", function () {
    $(this).addClass("active").siblings().removeClass("active");
  });

  function data() {
    const cert_data = {
      student_name: $("#student_name").text(),
      degree: $("#degree").text(),
      yrLvl: $("#yrLvl").text(),
      campus: $("#campus").text(),
      contact: $("#contact").text(),
      address: $("#address").text(),
      schoolYr: $("#yr").text(),
      remark: $("#remark").text(),
      nurse: $("#nurse").text(),
    };
    return cert_data;
  }
  function get_data() {
    const cert_data = data();
    const certificate = generateCert(
      cert_data.student_name,
      cert_data.degree,
      cert_data.yrLvl,
      cert_data.schoolYr,
      cert_data.campus,
      cert_data.contact,
      cert_data.address,
      cert_data.nurse,
      cert_data.remark
    );
    return certificate;
  }

  $(document).on("click", "#send-email", function () {
    // console.log(cert_data);
    const certificate = get_data();
    const email = $(this).attr("data-email");
    console.log(email);
    // return certificate.open();
    certificate.getBase64((data) => {
      $.ajax({
        url: "mailer/send-email.php",
        method: "POST",
        data: { email: email, attachment: data },
        success: function (response) {
          // console.log(response);
        },
      });
    });
  });
  $(document).on("click", "#donwload-cert", function () {
    // console.log(cert_data);
    const cert_detail = data();
    let filename = cert_detail.student_name + "_" + cert_detail.campus;
    const certificate = get_data();
    return certificate.download(filename);
  });
  $(document).on("click", "#print-cert", function () {
    // console.log(cert_data);
    const certificate = get_data();
    return certificate.print();
  });

  //meadical Requirement function

  $(document).on("click", "#view-requirement", function () {
    const student_id = $(this).attr("data-student_id");
    const id = $(this).attr("data-id");

    $.ajax({
      url: "fetchData.php",
      method: "POST",
      data: { view: 1, student_id: student_id, id: id },
      success: function (data) {
        $(`#requirement${id}`).html(data);
      },
    });
  });

  $(document).on("click", "#approved", function () {
    const student_id = $(this).attr("data-student_id");
    const column = $(this).attr("data-column");
    $.ajax({
      url: "fetchData.php",
      method: "POST",
      data: { update_status: 1, student_id: student_id, column: column },
      success: function (data) {},
    });
  });

  $(document).on("click", "#send_reason", function () {
    const student_id = $("#declined").attr("data-student_id");
    const reason_column = $("#declined").attr("reason-column");
    const status_column = $("#declined").attr("status-column");
    const reason_content = $("#reason_input").val();
    $.ajax({
      url: "fetchData.php",
      method: "POST",
      data: {
        send_reason: 1,
        student_id: student_id,
        reason_column: reason_column,
        status_column: status_column,
        reason_content: reason_content,
      },
      success: function (response) {
        if (!response.error) {
          const html = `<h4 class="fw-semibold text-center">Send Successfully!</h4>
                          <div class="container-fluid d-flex justify-content-center align-items-center">
                            <img src="assets/email-success.svg" class="w-50 h-50" alt="">
                          </div>`;
          $("#msg_result").html(html);
        } else {
          const html = `<h4 class="fw-semibold text-center">Send Successfully!</h4>
                          <div class="container-fluid d-flex justify-content-center align-items-center">
                            <img src="assets/email-success.svg" class="w-50 h-50" alt="">
                          </div>`;
          $("#msg_result").html(html);
        }
      },
    });
  });
});

//still open function
// const certificatiom = () => {};

function generateCert(
  Student_name,
  degree,
  yrLvl,
  schoolYr,
  campus,
  Contact,
  address,
  Nname,
  Remark,
  Qr
) {
  const h1 = {
    text: "Medical Clearance",
    style: {
      fontSize: 24,
      bold: true,
      alignment: "center",
    },
  };

  const year = {
    text: schoolYr,
    style: {
      alignment: "center",
      margin: [0, 10, 0, 10],
    },
  };
  const certContent = {
    name: Student_name,
    course: degree,
    yrLvl: yrLvl,
    campus: campus,
    Contact: Contact,
    address: address,
    Nname: Nname,
    Remark: Remark,
    Qr: Qr,
    style: {
      bold: false,
    },
  };
  //Image header
  const headerImage = {
    stack: [
      {
        image:
          "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAtAAAABgCAYAAAA0AkXAAAABU2lDQ1BpY20AABiVY2BgPJGTnFvMJMDAkJtXUhTk7qQQERmlwP6IgZlBhIGTgY9BNjG5uMA32C2EgYGBoTixvDi5pCiHAQV8u8bACKIv62Yk5qXMnchg69CwwdahRKdx3lKlPgb8gDMltTiZgYHhAwMDQ3xyQVEJAwMjDwMDA095SQGILcHAwCBSFBEZxcDAqANip0PYDiB2EoQdAlYTEuTMwMCYwcDAkJCOxE5CYkPtAgHW0iB3J2SHlKRWlIBoZ2cDBlAYQEQ/h4D9xih2EiGWv4CBweITAwNzP0IsaRoDw/ZOBgaJWwgxlQUMDPytDAzbjiSXFpVBrdFiYGCoYfjBOIeplLmZ5SSbH4cQlwRPEt8XwfMi3ySyZPQUnFXWaGbp1Rm/ttxsf80t3NcspCxGPEU2p600rK63Q2eS2ZzVy3s23d4389Tx66lPyj/+/P8fAEeDZOWRl0f5AAAgAElEQVR4nOydZ3hU1daA33OmZNJ7J40QIAGS0HtHQEBEBewKWLECKqj3qnhtqEi5VrCAoCAoAtJ76B0CoRNSIb3XSWbm7O8HExzHABOK4v3mfZ55kkzO2b2svfbaa0vcQgiBhARpWyY7JO7Z2MJUlRNdU1PRVBamkFqjMQhJCkYxeppMwlsoQiOESQaQZJUiybJBJVMoyeoSoYjzWo06y4R8XuvodEbjGHyiXc+7TzTqMkGPAElC/N15tWPHjh07duzY+X+IyvyRAQUwmT//KKS/OwEA6z7u71xZmRmhr66MUYzV3YzG2hihGIM1OjdfjaO7u1bnqtY6eqBz9Ufr6IbOxQe1RoekUgMgTEZMRj368nxqqsupqcijpqqYWn2FyVBdUmrQl+Uhq7PUKu0JWafb6ah1OebsHJI64JX1lX933u3YsWPHjh07dv7HUAMhQBQQCgQBvoAn4AzoLARoPVAJFAP5wHnz5yyQCRj/7szUx98qQB9fPNnlxMnFfWvLC3qYFMPttdWVTTWOHirPoJb4hsbjEdhSeAQ2xdUrDJ2rr1CptDISiEsJlwCBMH8jAQgwmWqFvjyfiuJMqST7DMXZSeRnJFJy4Ri11cWK1tHltKRSr3Vw8d7eIvreDTEjJlfatdJ27NixY8eOHTvXhAfQFOgA9Fer1d08PT09fX19CQ4OJigoCD8/P9zc3HBxccXNzRVXV1dMJhNFRcWUlBRTUlJCXl4e58+fJzs7m/z8fIqLi4uNRuMOYD2wDzgDlPzdmeXvEKBXr37eoWz3urtqq4vuMOorh0oqBxe/iE6EtLydoGY98QpqiSTLKEJBQhKgSCZDLZWV1ZSXFaOSoCg/EydXD8Kj4sjNTqEoJ43wpu1wcvHAYKglNzsFL58gHB1dhSRJCIGQJCEJoVCcfULKOpVA5rE15KbsRjHWVGp1ziscnDxX+PZ58NfevSfr/+oysWPHjh07duzY+YehBToCjwH9PD09Azt27CgPGjSIdu3a4eLiAsDChQtJTU0lLS2N4uJixowZw/r161m0aBEuLi4MGDiQtydPpmfPngCkpqZy7NgxOnToQHZ2Ntu3b2f16tXs3btXKS4uzgY2At8Ce4Havyvzf5kA/evHXfxqSi50NVaVP6wI0c3FK8w7oGlPOTR2iPDwb4qzRzBIkiRJEgZDLdkZp/DwDubIziWUFqRSVZiMRueGb1g7CvJyUKpz6X7PmxxN+AKtVkW7/i/h6OxOYX4Wm+Y8RssBb9Ikui2V5cXkpB+mcYveQqtVoyiKkCVZqizNojT3jJSRtIrs0wlKRWFaEZLY6eDsPs/RJ2DnneP25v5VZWPHjh07duzYsfMPQDabZIxQqVRPBQcHR/bq1Zu+ffvg6emJwWCgR48ezJs3j+XLlzNzxkwW/rSQ3bt34+DgwIwZM2jatCldu3blvvvuQ61Ws3LlSlavXo1afdEsd9q0aUyfPp3MzEyqq6v59NNPGTJkCM2aNWPp0qWsWLGShIQtXLhw4ZzJZJoF/AykX7RB+B9i8eIRqmVTOnf5fpxL4jfPaKt/eae1SDuyQlSWZJuEoihCCMVkMor83PMiYe1CsX/nRnE+9ayY/WZvcfLYAbFzw2Kx7tevxdcvNxVH9m0UhQV5Yv/OzWLuu3eItYumil9n9BepR1fXBSXSzxwUs15uJo4e2ieq9dViz/Z1Yv67t4kLWRdEevIJsW3lFFFScF4oiqIoQlGEUExVZTki/ehKseTdduKbZ7TVc190ObJqapceW7ZMVv/d5WfHjh07duzYsXMLEA0skiSprG+/fmLZsmWitLRUJCcni6ioKNGxY0fRo0cPkZCQIFatWiX8/PxEHR988IEYOHDgpb+XLVsmAgMDRWhoqDhz5oywZPTo0eKRRx4RQgiRlpYm/P39xdGkJJGbmyvi4uLE+fPnRWlpqVi2bJno26+fkCSpDJhnTt9fhnyzAhYC6ee3Y/rW7tm8pDDz4Bbfxj3ieo/+QXfXq7tFWOxgxck9QEaSJJPJJCUnbWH7gjFUXthFac4xahSBTq2ipCCd1l0H0zimC0LjjJuzBi8vH8KiWuDXuBs5xxfh2ygO3/COSGYj5qL8TNRO/ri6e6KSJXJT96JzDUYtqziw9SfOJXzJkV0LqSgvkzLOHpIKctJkB2dfEdJykBj26k7R+7Efdf5NesXmpB7YkLni06VL34nrL8StcdjSjh07duzYsWPnL0QCmgFr3N3dk1588cWRZ8+edd24YQN33nknbm5u/Oc//6FLly7s2bOHrVu30rNnT6KioqiuriY1NRUAf39/cnJyLgU6dOhQ2rRpw9ChQ4mKivpDhMeOHaNz584AJCcnYzAYaNmiBQsXLuTIkSOsW7cONzc3jhw5whv//jfnzp1zHTt27MPu7u5JwBpzem+63HZTBOjFH7UP+On1RmMqCtK/cXALGtKq3yva7g99JcLbDBNCiD/EW1FeSlrSaoKietJm4ETa9HgADw9vHD0jKcjYh1ol4+ziisrBi6qKYpAk3N3dCWjcHqHIBEX3R+fkdinu8sLzOHmE4OjkjNFgoDL/OI6eoRhqKinL2Irk05my3FPk52Syb+2XnD1+mLLiAikv67RkUiA8fpjo9uAXolX/SVon9+DbS/LOfb3otdAnln/YOuhmlJUdO3bs2LFjx84tiAcwW6VS7Z84ceLAQ4cOqYqLi9m3b98fHkpOTqZly5aX/hZC4OvrS/PmzdmxYwcAfn5+5OfnX3pGkiQcHBzw9PT8U6RCCKqrqwHYuXMnsbGx1NTU8O2339KxY0fmzp3LmTNnmD9/PiaTCZPJRHR0NIcOHVJNnDhxoEql2g/MNqf/pnHDBehVn/UJ02ef/bGiOPermF7Ph/d/Zpmq3Z3v4OIZIlWWl0rrl/5Xqij7/QBlZXk5JfmZOLg3wT8oGE8fX1xcXHAPiqUiYxd6fTUOOid0zv5UFGcDoNFocff2R63zQOPsg0qlAvNyQzHpcfNwQa3WUF5WTHXeMVx8Yyg8fwKjUeAZHEd1YTrnkw9QlHMWV+9wThxYw+qvn+RC+jmpvDhP0rkG0P6OyaL/M8tULfq8EFpRmv15SW7qwnWf9o+40eVlx44dO3bs2LFzC6EFHlOpVIn33Xff43PmzHF96aWXaNy4Mc2aNWPSpEmUlpZeeviee+7hs88+Y+vWrWzbto3u3buze/du2rdvz/nz5wGIjY3l5Zdf+UMkr7/+Og8++OCfIp806VU+//xzWrduzXfffce4ceM4evQoKSkpzJ49m2PHjjFlyhSCgoLo3r07H3wwhVWrVqFSqfDx8eHIkSOu999//+MqlSrRfMBRezMKSXWjAlr3cX/noZ3kEcUXTi1z9W3WovPI6XLLvi+gdXKnproKIQTFRcUcS5hNVWU5QeGxqNQaqqqryTp3kOyME8S0HYQkq6gozaeouILcE0uJiB+Ko4sHmSmnUGsFYc06AxKVFRWUFGQT3KQ9Lm7eZid2Eg46JzKOLSfn3E6O7VqCQXGkRdcH2b/5ezwDYgiMbE/+8V8prQYXZzfCY28jKeELHN3D8Q5tw/7f3gCNp+QbFCk5OHsS3LwvHoExcnHWybD89EOPPDgwLGvEyNiUn1en/W0nP+3YsWPHjh07dm4CYcBnLVq0mPDhhx/6jBs3jueff54vvviC8+fP07lzZzZu3IiTkxPt27dHkiSio6PJycnh62++ZmvCVoYOHco999xDjx496NSpE7IsYzKZiIiIIDMzk+TkZM6cOUNVVRXl5eVkZ2dTUlJCVVUVJpOJ2NhYhg8fQfv2HRg79mm6dOnCihUrMBgMvPjii2zYsIFVq1bx1FNP4efnx8svv8SsWbPIyclh4sSJfPjhhwwZMoTIyEiPs2fP3pafn98cOACU2pB/m7khNiIbZvVzz01OmqavLB0d0mqI1P2Bz3B080dRFNJO72PXb+9iwIN2fcZQWlrN8c3v0+e+94mK7UFVVTWJu9dw9LcXCIh/jJCIGDKOLyUwZiSZJ9bSbciL+AQ1JT0lGU9PL7x8/YUkSVJNTQ2VlZW4ubmhVqvqsiIURaGoIFdKTztDbXUNnn6NcHVxZM3XT9Ciz3iCw5uz9ouhqJyDCW/zAF4eHiRu/C8x/V7F213H7t8+IG7gm7Rq24kafQUSAq3OBX1lAbsWjiP9yFLh4Og2zzk4Ztxd4xNuCV+EduzYsWPHjh0710kPYNbIkSOb12mcfXx8mD17Ns8//zxdu3bl+PHjCCHw8fFh48aNBAX9bt1aWVmJVntR2Xvy5EkOHz5M0vHTpJ0v4UJOBbmFVZRVGEHlgCRr6VGVQpfKZPRCUIHA5O6O7O+HFBqCOiyUJi1b0rp1a6Kjo6mpqaGwsJCwsDA+++wzXn/9dbZu3cqCBQs4dOgQ69atY+7cuXz99dfs3bsXgPXr1+Pk5Mynn/6XxYsXnwKeArbdqMK6bi8T6+Y97Jx7bNOPxtqa/jE9n5HaDZ2M2sEZEJgUE6Ul5dSW5lEpFHYsGo9PzIO4eYZycv8KIqI7odPpCGvegcLs8RSmbMRUlUFYizuIjO1JRHQnvL39UGnUhEdGIcsqs4sSgVajQu3mBBgRikCSLwrRsizj5eOPh6cPihCoVCoUxUDP+z7E2T0AV2cdktoBnVaDX1Bz9qz9BJ/g1gSFNSfz2Hq0rn64eflRlJfF9hXTcHZQ6D7yA3TOPvR89BsO/tZIOrXjmwcqs0/5rZv38IgBj8y332Zox44dO3bs2PmnogEecXV1nTVp0iRVSkoKQ4YMobq6mocffpiPPvqI9957j+HDh/PNN9/wxRdfsHr1ag4dOnRJgC4tLWX//gOsXb+VX1Zsp6zGDSevFmhcw3/X1XqBq9fvkbYvUjFa5P3+hRG4kA8X8lF2H+KQcREL9FWkuLsRN/xuOg0ciIeHB08//TStWrVCo9Ewf/58Fi1ahFqt5uzZs0RFRZGdnc0rr7zCvn37LrnE69y5S/M333xjc3l5+VNmjx2G6y2069JAL36jeavaqrxpRhP9uj7wGZHtRqIoggtpx8hOPYKHf3Oc3PxJ2rWEgoxDuPq1IPvkUow44SiX0+fhz4hs0QWTyURZWRlVlRU46HS4urqh1WioKE4nP/0wpbmnKck5TUVROtVlOdRUFqMY9SgmI0KApJJRaRzROXvh5BaAs1cYHv5NcfNvim9Ya1y9wy8+J13M7tnjuyjKL8Ak4PiKCbQZ/gUtWnfj5y+ewz+oCeFxQ9i66CW0jj407TIGD1cNHl6e+IfEIsuQcnAJOxY8gwqx2dnTZ8Ldb545cr0VYceOHTt27Nix8xejAqZ4enqOX7VqlWrevPnk5+cxdepUioqKGDBgIO+++w4ODg5MnDiJ5OSzuLm5UVtbi0ajITs7my+//IrFv+2iTIlC6x6FrHG1KeKninbyZNFOm54tUEzsMtSwxtOV5iNH8NTYsXh5eXHo0CG6dOkCwO23346Liwt79+6lTZs2fP311yQmJvLQQw/x3nvvERMTw5AhQ0zFxcXTgVcB0/UU3DUL0Es/ahtZlnVmiax2juv39BICIrtgNBo4tnsRyXu+x2BUUXjhKBEdnyQifhg7fnqBqPb34R3WjqNbvsNUtIdWt42jTc9HLyXDUFNOSc4Zss9u4/SuuRRfOE6t0Y3KGm/K9T4UlkdQWBFCfmkEFXovjGh5wWMcocWZmHSg94BaZ6h1A6MOTA5gUIFHUHOadX6UwGa98QyMRq1xwmgyUV6cw9GDW4lu0w8nBw3z3rsNn/A+FGTuJ6BJb1p0uhsnJw2/fXoPwY0Cadl3HOExt6HWaClI38+6z+9GMVQe8wltdc/gl3acuZ6KsGPHjh07duzY+QtxAxa0bNly8NKlSwkJCaFly5Z89dVX9O3bF4B3332Xw4cPs2DBAqZPn85TTz2Fp6cnR44cYcpHM9m8Lw8Hv56otA13eNEQAdqSLMXEt7VV6Pv25unXXiUuLg6AVq1akZmZyezZsxk+fDinTp1i6NCh3H777Rw4cICYmBheffVV7rnnHpKSkuYDzwFlDU6AmWsSoBe/0bxVdfn5+V6N2se2ueMtKahpT0wmE+dTj3Nw2YvEDXoHtWMASTt+JvfMahq3fYDqqgpKcw7T78EPMRigRl+Gf1CocNBopNK8s2QmrSY9aRXZ6Vlk5XmQlt+Os1ndySlpSlm1HxV6L2qNTgjxu+MQtbaWb/3b0CLzxO/Xz0igqMGkkzA6gt4dKoMkKn0l8HPDNawFoa0GEdpqEK7+TVEUCbVaQ35OJmu/GkGt7IN/ZHfa932Emop8dv/2HiqdB2Gxg6nM3ol/ZD+atOyJzlFHTvJODq54WxRk7D/u5NHo4ZGTjydea0XYsWPHjh07duz8RTgDy7p27dpvzJjHWLToJ9asWUPnzp0ZMGAAkydPRlEU+vXrx9ChQ5kwYQIAKSkp/Oed99hyqBbh3BKVg9dVI6oXYWRM4XbGluy/ZndwFxQjq2TBub69ePfDDzGZTOj1eho3bozBYLhks/3www/zwQcf8MYbbzBp0iQ0Gg3Dhg0Te/fu3QQMA67JFLfBAvSBWU86nTrzy3IhOfTr+8RCApv2QJhM1NTWcuzAes5u+YBBL6zC1c2L1HPJHFo3DQxFtLztX5w7tIRO/Ufh7R+BEELUVBVxevs3UsrBnynIPM6prD4cODeCkxd6UlgeDuZ7GSVzMoXFJY0aTR6+fkd4xuvftDtzFO+amkv/k82mGkrdCxIYXCXKg6AkUqY8GDwatSSi7QhiejyJzsUHQ62e4/vXUFZRS3h0Jzzc3Njyy7vknV1LZOsBNGn3EFpnH6oqqnBzc8XN3QutzpGc5J1snH0vwqjf7N968FC7TbQdO3bs2LFj5xbGF/h24MCBdwwcOJD33nuPmpoaSktL2bJlC/fffz/h4eFUVVXRqlUrvv76a4SAmTP/y6yFBxCu7VA5eF9TxEKfxuAOv9Gv82kctSaKTmqpWeBOvzIXnK/RKCJDMTJXJQh8+kmee3Eczs5OTJgwgaVLl7JkyRLmzJmDwWDgq6++orS0lHfeeYdHHnmE1157jdWrV68wu7rLtyGqP9Cg1K7+b0e34syMeQZDzZ0DnluBf+POVFeVsWPlNDz8WuHgFsyuH+6ny/BPaNV5GJWVVRzaOJvynL30HTWXmppaXF1dMNaUkZb4G3t/mUhxicypC71Ztu9NckubgQDLi/+02mziW2/C31+wNaEzZWVNAEHLlif4aREEBoew4/bbCdq9G4AinY7TvXpSra8hdv9+fCqt5FkJatwkcjpIlAeD5OlJx3s+IiJ+GGqdO4qioFKpWPPj22Sd3EBoh2dwc6qiqqKcjrc9Qda5o+xb8z6xreJo0msijs7uoiDtoLTm09uRVeoVAT6tHr7t1Y031FWKHTt27NixY8fODUAFfN6mbdsnH3/sMWnKlCl8/PHHPP744xQWFqLRaDh69CiHDx/Gz8+Pnj17UlZWzsOjnuJEbhha9xiQrk1nrBjKGXfn+zz7WCFaze/fH9yvYuvjPtxncEV3jZkyApuNNSxr2ZwZ8+dTVVXFI488THx8PO+++y4FBQWEhYUxbNgwEhISGDx4MFOmTGHEyJHi0MGDs4FnG2oTbbMf6MXTRjiWX0icZqjVj+h2/2eqkJa3U5ibTtL2r6nMO0lFWQFNYgdQVmHi3MFFlJaUUFaYRlVBElFt7sQvpBUaleDCyQ3sXPAcBzatYXvSMBbvmsr2k2MorQo0y/N/lOnd3Qt54w3BuHEdWbq0moICT0Dg55fPiBESLm7upP/4Iy5mZ93V3t50XPAjXu3aYtq4EceSP3uaU9eAe4bAPQNErZ60zI1kntuEo5s/7j7hyCoN1RW5yFTiFxhEdLt78A6KJuX4TnYvfxMH9wjQaNAXnMTZJ1ryCGyiuHqFS+mJyxtXVecHjBnVd+PClWeu+4SnHTt27NixY8fODWRK69atn/1h/nyVEIJnn32WFi1aMGvWLEaPHs2SJUtYsuRXJk2aSPPmzVm6dBkPPvkO+VJv1M6NQLp23xONdL8y66MTqK0kz6BgwQmpFmmPK96SfE0mHTIQKavplF/EB9/PwTGmOf/697/ZtGkTW7ZsYcCAAYwYMYL8/Hy2bNnC5s1bOHToENOnT5d27NgRn52d7QRsbEicNruxk0oOD6mtLHuieY8npcj292KoreHUgaUYqnJwCR1E/pmVyLIguvN9HK0s5Ny+H/EMCKdZhxEENe2HyaDnzO55HFj2BueyQtlw5E32J4/EZNIirhzzJaE6NvY0QUEFAPj65gHNkAQUNm2GwckJgApHRyJVqquECZIRdAWCoF1QkltFfuletuaMpu0dk2nebQzN296Jg5MnKYcX4h3cjoryIvYufwMff38i29+NwIGTOz7ANawfLu4+cuO2w5W89P2aEwmfj6nKOL4JWGhr2dqxY8eOHTt27Nxk7gsNDX1h+PDh6vc/+IAf5s8HoKysDEdHR2bOnMn69euZPXs2BoOBzz6fxYw5e5E9ByLL13mZn2KkU+xp5MvI3516mdgyrZbGakecriMab0nmjRrB9xNeIW/Ci7z99tuUlZUxatQo0tLS8Pa+aHrSoUN7pk6dypdffsnMmTPVDz744AsZGRmHgZ9sjcsmAXr9h7cFXTi/67PgmAFSuzvfQRGCvJwMPII64Rc0gpKSMrKSfqUg+xSNY7pRFjsAXddH8QsKw8PLE4xVbJz1IKlJO9l7djgLd0yn1uTYoEKRJPjPf6KJiooC4MSJEygChGKi1bPP0K5dOyRJIi0tDSGEzbYpkiLwPAseKYILXUvYX/kyGUdX0feJBUTF9sU7sCWnkvZyfPNU3IJ74OAskX7gS3Jz8nDzisQotAihIMsque0dk5WKgnT5wok1n677pP+OAS+tz2xQJu3YsWPHjh07dm48TSVJmvbiiy/qli//jSeeeJyDBw8SGhqKu7s7Op2On376iWXLltG0aVMm/2cK3/+Wgc635w1LgCxdXrUpS1ApBAbzybc6xDUc1nOUJJ5Gy4IPP2F2Xh7j33yTO+64gzvuuIOHHn6YAQMGUFJSwqhRo6itraV9+/ZMnTpVd++9904TQhwCbPKqdlUB+tePY/1ysw7McfVp4tf9oS9QaZ05m7iGnDMJtBv0Ok4ubkgqB9RO3mSd3Ul1cSqG6nyatOiAu5cPued2kbj2Q/bvuMD6o9PYl3wvBmPDrVyEgJ07M0lMvHhYsLw8i06dLm4nnE9MREpNRQLyy8tp2qvnVTXQ1kgmCN6p4JxrIK9kA5ukB4gbOJGAJj1Ek2bRkmx8koCoTiSum4GiDiKuz0M4e4aQfXY32SeW0iz+NnzCO0ndHvhUrPl0iHfO+X1zFn/U/qGRE/fnNDizduzYsWPHjh07NwYHSZJ+njRpUuCmTZuIiAgnPj6eO++8k1WrVpGSksqjjz7Ko48+iq+vL0+NHc+6Qxp0vp0bFotQkA2ZRAXso2X4EUorXEhIGoJRGw2ymu2HozEas1HXI3luWa8iQKVGRkIBjmj0HOlZjOJqwu2kE03OuBCtaHBogDj9gNaJjXN+4F/ZOUyZPQsHBwcqKyp44YUX6NmzJ56enjRr1gxFUfjvf//Lq6++GjhlypSfhRAdgJqrhX9FAVoIpEX/KhlYo6/o1XHAyzi6BVBckE1m0hKad3mS6qoyCnLT8Q2KwsUjmJzTa5Gqm9KyzyTcvfzJT93D3iWTSD2Vzvxtv5Ca1x6T8ucoJX5fYghx8dc/C8CCqVNVnDqlQQJiWqjp3FkgyTIVc+eSs3cvElDm54eysUFmLL+nwwSeZwS6YjjnuIF9FQV0GvmJ5B/ZXfH0i5CrK8rIz9hHRNxIWnS4neTjuziz+zs8AloiKr+ghUu45OMXpMQNmCht+e6hHtqSnEFCMEeSGizP27Fjx44dO3bs3AgmxsXFxb722mt8+eWXfPzxx6xdu47PP/8MvV7PyJEj2Lx5M4GBgYx95nnWJzqj82zaoAiMlZl0arKEiU+fpXWswWznnMf6LbN5evJ9CNcOZNUMYMasA4wfW4bKwtD50GEVSbNcuVtSoQM26CoJnprPhD5GAEwmPUePlvLtdEfa7fWijUprs/1xP60jjus28dLzLzDzyy/o3Lkz/fv3JzAwkLVr1xIQEMDEiRN55ZVX2LhxI2vWrIlNTEycCLxztbCveIiwhdSiW2VJzifNuz/lF9//ZWr0evZuXsjZfctQuUaSl7wWZ50Wz8Bo8nLzcXR0ps3AV/EJbExB2l7WfjqIXYdaMmvjAjIL4v7gw7mO1hHLiI9YSIT/BiL9txAZmEBUwG6cdWWUVgWgdahmwIASIpv44OlxluHDDdx5ZznxrYsIDfXD1cWFs5KEy/ARqIbdSU2nzgQ1bUpFWSnG5b/hUFlCabhEboRMrj/kB8gU+EnkN5LQ+0m45f3Z3ENTCZ6pUCJyOHnuFwKiukkevuFKba1eKivMR+UcSEjjGIpzTlKed5r4wW9SVlpJrUHCJyBM8g1pqdTqK9Q5Z7bFpu5rmrQoIT/Vxrq2Y8eOHTt27Ni5UbTXarXfTZ06VZ2ZmcmoUaNo3749K1euICUlhS+++ILPP/+cjh078srEV/l1hwoHj2a2hSwUqM2kfcgcZr+9jOfG5BEcqCBbiHqREUY04iw7DsQgO/qx92gL1q7OoV+PYlxdBPPnalj5gie9caGVrEIvBIWv5zBwqPFSGLIMgYGCHnfVou9bzg8pNcjZWrxR2SRIh6rUyCdPMj83i4+nTWPJkiXMnz+f5557jvfee4/nnnsOWZapqKhg/PjxzJo1q7PJZFoPZF0p3MvGvXjxYlX13meed/EMjWjR6xlMionqqgrContSkpvOqW2fEdQ4lqj2LclOT4TqFFp0HYWnTzB5KbvYt2QiB8/0ZPn+t8graVJvHFGBO/B2PcrRjP6UVPTml3sAACAASURBVDZCRqBzKMZVl4Oncybdo2diUrmgNvggTE3o3asVTaKaIBCcOnkKRVEQQtCsfXvatWsHQFpa2kX9dW0xJUFGStxlRDk4ZQjcqwTamot2z1WOEtnBEk4REt4pf1YQa8oEAQcgh0p2//wSne75SA6M6klsz0c5sv07CrKTcXAJAMWEMFbRotM9GIyCqvJ81J7+UnSPJ8X5Y2tDKsuyntuyZfK23r0nG+spguslHOhpdgTuAcSbf6ZZfJYBW4E/uyOpn1FAmA3PfW8O/3JMrncj4Xe2AgkNeL6hpANzryFdDeXtBjzrAdwJ9DLX3Y2or17mNlAfMxsQDjaUzeXK9EbQy1w28RZtGYtySTR/tl6l3XENbfhKZXi91L+h9kes+4IlV0rbtdTHrda/j5jbvK3Ykn7LtIcDj9oQbl1Z2hL+lerLkiuVUV07tiVtDaG+tF1r+040jx9HGjiOWDPKHH/4dfbthtYlN2G8r6MUcLfhuSvND1dK29X6n62ogJkTJkzQySoVY8aMoVu3bnz44Yds2bKFhx56iHHjxjFkyBDmzZvHgrWF6Hw72hSwofQUveI38cyDp+nYVo/qCurY0Q9UMXvBZkpN9yI7BXMybxg5uR8T6A9FZzT0VDnRVlbjisQcrxKeu+vy4lLLGIXoORUcPlDN4q+d8NvmRh+1I5rLvnGRHhod2T/8xPy4OO69916mT59OUlIScXFxJCQk8K9//QutVktRURETJkzQTZkyZSbQ/Uqu7S5rTLLio+5t8tL27Yjp/bxjx7s/JDvzJPvXzaJ554fQOHqQuG0xOSd+xie8Mx5uJiJbDSas1RAUQwWbv3mIkwcP8eHyBHJLo+ptIpKkcH+3Maw8+Bpl1U1BWCZFIEkm1HIebaJ+4YG79tIyrjmpxWE4uYcjhKCysoAuXaIJCgpi9eLF+Lm5AVBcVkJAoCDjxDaMP68lMKkMD6NAVU8aqtUS53tBk00gifrbca2bxJlhMn5tbqPv4wtQO7iQuO07KvNPU25wIe/UOtrdPZ0mzVpxeOcySs5vo+Md/8HLx0/Zv+wN+dimT2q9g9v0GPb6nr1Xqd+GEA68ZR6YrEmvZwIoAWbYKOwl2DjY9r7KJHK1Qett8wBi6/MNZat54mhouhqKLQZZHsCLwDjz75Zcqb5sEYAnm9tCfSSY68lWbBH06ivT62EYMN3cpi250gSVZp4gLzfJNLQNX6kM/wqs+4IlV0rbtdTHrdi/W5sFKFuwJf2Wae8FbLEh3LqytCX8K9WXJVfK89vmuGxJW0OoL203on3PBcY3UJAeZY63oX07ARhdz/8aWpfcJOG5Lg5b+tGV5ocrpe1q/c9WHo2JiZm7Z88eXF1dSUtL46233iIhIYF58+bRuXNnVCoVe/fuY+RjH6DxaI63cwY5JaFonMNA1vyeBcVAbUUGUUEn6NnmGCOHpBPTTLHZq913C9x5e/bTyK6NMVXn8OvHb9OutcLMVx2J+S2AeFRUCIUTr19g8MNXNT8Gs8nvidMyh37VUbvFGb80HXEa7aULWSRAj+CosZYC/1o8izSsM8L9vywiOyeHV199lbKyMubOnUujRo3417//TVpqKtu3b6dz586cOHFilHmeqZd6s754WmcvffqxtV6h7dv3eOQbXLzDOH0iiSObZ5OXsgXvoFiie45FX1lOyv4FtO52G5Ft70Mtw8bZ97Fvexrztn5Jck6ny7YfSTIxps8DfJ8wB5PJ6bItyds7jalTU2jX2oWpr/9EQZ47O04+RVjjAhb+JBEQHMKOQYNotGcPJY0lzjdypfErM6iR/DCNHYtXevplC98kSyT3kYjapCBfoSlX+0tk9JTx7Nqf/k//gsGocPLACjJO7sHZrwVaR1fO7f4KYTQRGPcAEc3bExXTGn1Zltg2/ykpP2XnQe/QpgPvePlgweVjsZlewFILQWy5eXCz1uKEm5+dbCGgJZoHpitNVvEWYY+yWvFbCmOJVxlMLSf2GUCceQCuizvNSvip73muQctWp225mgDdEM1xHeOsBn5bJtJ486BfV6ZbzflLsCo/D7MwOc4i72nAXVepr3CrCcp6gplpDtMW6quD7y3Kv6QBgs7V8ADmmPOMuZ5nmNtxmtVz8fW0xTrGm9+zpKFtuE7AuJpm0VIIsfXZuvh6Wb2faE479fQFSyzrd665L4+3SHtD6+NW6991z7a2UTizTH+8efF1xKqNW6bdUuOJVf+or23Xhe9hHmct0zja4ndbtIO9LH6+ZW7jdUqPNHOcl0ubrVruOuo05/WNSZZtqK7M6qhvgR1usUN2p8X3JebxyFbte117LzXX+Yx66rhuzLMWRusTHBpal9g43ltr6G15dqbFnDvXSgli2Q+uVFbW7cOyHV+t/9lCoCzLa95+++04rVbLY489hre3N3q9nieffBJfX18++eQTCgoKGHTX4+RJfXA2bGHh9N8oLNax74gPGTne1NRqcHGqITyogLiYYlpFV+PtKRrsDjo3T2bYY53Irr0TxVTFog/eoXN7hRkTnYha4UczZDYFlTFsYSH+fg1b9wgB+QUSKadUZB1VY8jQICpkJAeBJsRAcFsDjl4K347y4IFKd2YF+vDh6lXo9XoyMzPZsGED8+bNo127dowbN46ysjJyc3MZPXr0EUVRbgeybU7MT6+H3f7tWG3FmV3fC6OhRjHUVovKykqRcvaUSFj1g5j7/j3i27f6iMS9G0Ty6WOivLRQGGqqxMltX4svn/QQ3aO/ESq5VoBy2Y8kmcSgNm+IQM9jf/qfSq4RHs4XRKjPIRHfdIn48Yc1IisrS9x/+7/F/d3uEsM7jxHPj3xCHD96QBSVlIivH+kqfuwui896yGJmnwBx5niS2L55k1jaJlxs9ZXELhdJ7FMh9vPHz1YPSSxqK4l9/Pl/f/hIiHXNJPHdExpxLOELUVtTKaorK8TppP1i+Zw3xOzXO4lFMx4T+3dsENlZmWL1D5NE5rkjorZWr5zdu1B8+4ymcsGk0Dsa1tzqZZR5QBDmzmWr9mmuxXvFVoPQlZhs8d71rOQTzO/bmt4EizgbugqffJX3rjUv46zKwhbBZZjVO/XtGFwtrobUF1bx1X2G2fCeNXV1YIumraF4AIct0je3Hs18fYSby90yb1dLny1teLKNYTUk3vris057Q+qlrk3cCK1UHbdC/677XIsmttc1lElD6nCZ1fMN6YeWzL0J7csaW/trrwbWeS/zXFP3fKoNfdVy3CupRwNdH9bjqy3YUl62hNeQflDfWGE9zh+2Mf2YyzK1gf3HVp5v27atOHDggGjWrJno0KGDWLFipSgsLBRDhw4V06ZNE0ajUTz19HMiuN2/RXiv2SKs61Qx9pkIUZ4tCVHGDf+cPCiLt94KE517xIht62QhyhCfPO4sxnVxEwtfcxKnD8o3Jd7ybEm8NcZRzAgIFqcaRYrNAaHi3ddfF0ajUdx///0iOjpazJ37vVAURRQVFYlGjRqJc+fOibZt2wrg+csV8J9O9W3ZskVdW13xkLN3hHNEuxGisqKINT9NoTjvPGGRUXTofTed734XZ69oSrMOEdEkGhc3L3KSt7Nv2b/Yn3wXe84+UK+3DUsEsP3Uw8Q02oBKNiBJAjenbPrHT2d0n0foGfMOfu5bEKLool9nSeLk+cH8uvdLVh58g0MnmpO46h2yj61ALj+Pw0mI2SUIPSOQkS/2XAFpzhKnmsqc6SWT3V6ixlVCki5ajJQ1kvA6acMevADPZIHnGRMHl71B9qktODg5o5jKKCtIoXGnZ+lyz1vEdeiBf0AQzu5BnNn7DfqqaiLa3CXc/Jo7GWrLHzpwYNbVzHSuhLXmoFcDJg7LbQgPKw22natjXfalNgg/8WYNax2jG6BJtzS38bDSYF8Lc2ycxP4qllkII8vN7dMWbUua+dnSm5y+m4X1Amq6jfXqYdZQlTZgEfZPo9dNWqxdD9a7erbu5FjiYaHlv1nnB24mCVY7POH17PhYM87qd1u09TPMY8E/kWVWaY9vQFsZZy7TmTd4cezp4ODw5Pjx42nbti1JSUl0796dxx4bQ2BgIJIs8/jjj7Np02aWJRSjcQkFQNK4sSbxGQY93I6ff3MhOVWivPzabx60pnmUwuSX0unYKhXFdHGtopjAu6Oe+16rommUcsPiKq+QOJcqsXKZhleGueC/xpuOai1eSMSptei/mcPmTZuYPHkye/fu5dFHHwGgpKQEPz8/Zs+ezfjx43FwcHgS8Kwvjj8J0IVbnrhdUQy92t35NrJKS1F+oVSWfYqlM4ex/sd3KC3IIijQHw8/H7z9A5EkidrqEhLXfEDahQB+3P5fm/08V1Q3xskhhwHxHzO4zSTaR87mREYcc7dM57f9MziY8iLni/piUi7eS1Nj9KTG4EuNIYTCmi7oJXd2rv0aTWYJocUCV6PAyQASAhkILoboNIXowyYCtwjEaUhvJHGqtYoLbWQqdOBebVtlSCYI2qkgZxWTuO5DaquKaBLTlUGjptGx1zD8/XxJPraXZV+O5djmWeRlJJF3/qiEpKLN0LcRitIj5bdPhtgW25+wFqJmXsPW7SjzFiLmDjvnKs/buYhHPWVly6RgqVX9/homz8nmLT0s6r8hWNptWW9H/51MttguLb0GoSTxGgWZW4FEc9+tI9zGvNS1pRk36GDRrYK1wPTWTdDCXQ9zrRZrd17h2ctRt9Be/g+uu/pMQq6EpTlEQ/LckMOktxrjrNrKWzYsjuMtFsY3evF4b+vWrWO6dOnCxImTePzxx7njjqEcPXqUY8eO8dPChWi1Wib+eyo6v65/fFPrRqb+QV7+ZCy3PXQv73ysw2iSEEIi84LM6bPXctH2H5FlgUm5KJgLBaT6Dqk1kKQTMpkXZISQMJkkPvxIzVeDfEme6MeA8950VznQGNUl13OPaRz55pVJhIWF4erqSnZ2Ni+88ALx8Rd1O9999x2dO3emdevWMcC99cX5BzWxEEg/vlJ2h7NniL9/4y6KJMuyb2AYbQZNJCVxLZmn1pKbsR8v/yZoRD7+YSNBEmQeW0PqmUw2Jb1GrdG2SxhVkolQn8M4qPNxdEhh49GXyCuNwSScoM7dnQAhrFY/Eni7ptMiaAOBoc2IiH2WnSeeJEufREA9d8dIgFqAmxC4lUFtuaDSReJCrIxJCMqDJFxzBNJlz1n+jmwEv6OQ53aYjKOriOr4EO6eXmSnnyZp50Jyknei0nnSrMeLqFU15GYcwy+0teQf0UE4e4b61pRnDRWCZdfgF9r68Nm1drbJFsLgsAZqsf8pzK3HvtiShto+T7baurVFGB5lZeN5PfVVJ/jGN7C+xpnfqUtHvFkA+zuFz7rDlHXMvUahYpk5L7acgreFBKufN4LLtbPJ5vZRl/a3zPm53IK4zjtJ+i2oob1eEs1lbrm7sxSIuAH2nzeKuRZt1sNcdw1ZDNf1t5stHNbNETdLSLc8+Helw3PWZi4NSc/NmIuu5azLlbjcWJFm7p91bblO8XLXFcKq0+SPuwnt/cHu3bvLw4cPx8fHBycnJ4YMGcyPP/5IZGQkBQUFrN+wkdyapuicra0FJFA7IbtFghLCwoRAvl96CJRahOzOnbed4suP01CrwGS66GKuofbQKhUYzY42hCLVo8q9Oopy0ehXrQKjCWZMckSd5Ei5rKAIiFZp6a7REaFW4YqE1sqw3k2SGZadx8IFC+jYqRN9+vQhLCyMb7/9luHDhzNu3Dh27drFfffdJ+/Zs+dB4CvrNPyh5A4enKU21Ey4OyT2TtnZM5ja6grSzh4mO/McQVHdCYnpQ3byATCUEN3pUTz9ojDoy9m9+GUOnhnM7jMP/FngrQdJEkQFbSXEeyNrDr9BTOhanB2MKMLZyhvHn3F2KKJf7HsUi66ExnbAr1EIHjnOqDIFqe0lnPOv/L5WgKIWuBQpeCfDhcYSPuEyPuds2zrwPKtQ6V/Fnp9fITTuDtQaJ04cWUte5mkad3mO0CZx+AcGYTLWkHzsAMUFFwgJixIBUd1VybvnDktImDwWJuttiuwi1kLH8uvobNaCx1v/gwL01Q74NEQIGWZV9uk2CqCWcVyP5mmZ1cTVkPoqMU/2CRbvv2j+++/S9FgvBK91S7vEnIcb5QIs4Sb0g8u1s7p6sdwRmH4Fbyl1ZfS/aroxw2KRgMVuSUO8x9xM5lqNAY82oN3WLWBL/wLzjRt1uPdypFkpBWwlvgHjX9o13Np8NW70ovNKY8UMK+XJlZRUoywOu9/othEdEBDQRa/X07hxYxYvXowkSXzyyTRmzJhBixYtaNw4kp9/243Oq9/lQ5FkUOlQuzdD7RIGigEkiU2JTRj1/Cq83CtJOunEK89eYNBthgYlUCXLGI0CISQUI1zRi8NlWL9RxaIZOiJbmigrlGl0xpXeTo74IWMyC7fuSDhcoVENcHDijdnf0H/AANatW0d0dDQazUVL2/fee4+XXnqJUaNGERAQ0CUnJycaOGn5/h/k/ow1/+0uhPAOi7uDGr2eHb+9y/H1b5GTOJ9dCx/jyMYZNIntTkiL7pQW56MoBk7vmENxYQ3bTj6O0WSb6YaH83kaee0j4dhrVNaEcSz9btpFfo+36+X7mRCCCL/93B7/H5bvf4sLRe2RpIsFoxEC/1KB+1FBQWANSm3eZY8CKBqJzBYy3ukCV4OgyRmFMkcoD7St30om8DkpMBbnc2r71wB07fsYA0bPpGOPQYQ3jsTJyYnK0gKObv2Mc4dXYTAYpbDYIYDsUbjtp4b64+xlJXRcj/BTYtWZrcP+p9LQQ0y2UJ+ZyzAbFi+9rE5kX69gZlnfvRpoy1yfucOc6zgMdb1Y2o2nX+ekP8o8Lv4TtbJ1vr7r6HUZAbnOg873/4MLXUsszcu4xeyhEy1MqWhgH6yr05slPF/v4c+GYCk8X+kMgnWf/jvdQ/4d1DfeWuNhoam+GQvjF+8ZPlxWqVSEh4cjmdXDcXGx7Nmzh23btlFYVExKgbdtoUkyqJ1A6w4aN4RzS3amPMuKfU+TWv4Ikz4ayMxZbnzyuSu3jwxjwS8XrRAqqySWrnLg/Wkul7TNADU1EhVVYFJkFCEQClRWytTU/C6D6Wtg5idaVq1UU1l18ftfFqsZe5czsz/T8u1XWla87sZtKd50WxlI/13+DFE50RQVAUgEI+GPhM6GFVmH5FTWrVxJbGzsJeHZZDIxduxYLly4QExMDPcMHy5bLaTBUgO9Zc4o3YUTa3t6h7TB3b85OefPSYbyTFr0eQm0fuSmHSXl4EIObvoMZ52JJm3uobwglZQDi0nO7Up2cXMu40r5T4R4H6GkKgij4gJAda0Pm489TfvIH9iUNIFao7PF0xfHiNqyDLx0x9l09AGqa4KB8j88IQHe5QL9GSNHEn5E7dkCR8XKGbcEeU0knFLB2Wz7rBagKxWUeYOrjY5KHIoFrtkSKQcWE9pyEB6BMTi6uCGbr98pystk0+LJqNSuuAe1RZJlyT2gOT7h7SnPOdFz8bQR20ZO+NlG6+s/CYXXu0WXaGXL1+sfbnt2s7D2DPG2jQKfdX1dr2bIur57NXBCnmsWmC23oeeYNXx/5Ta5Rz2uy/4/M8rcNup2B6ab+2FdnYRb2Ef+U22+baXEvLhKsNptSbxFxqYZVoLQKBsF/JstQP9VWC8YrraYs/RtX+fGc/T/kz6fYD7nUDfehpvbimV7mWEeD9++CWXiBfQeMngwJSUlvPDCC8TGxtKkSRPGjx/PqFGjeeWVl3nqhXfQebW/thgkGbRuoHVBQqJC8WPaT60QxkpktRNvfp7L3J+PUlTiQF5JKLLGlUPHE2gWcZ6cfHeOnw0hpzCE23otvWixoEgELPPloz16TNFVqP2MFB11wCfJlUxZxXQ/PXp3I5zT0k9xRH0SKoRgqCwTIavw5KImVarvUJ8N9Nc5Me3nJRhGj74kQH/yySfs2rWLbdu24ebmxpDBg/n8s896A47AJdntkgBdeH5viMlU0z+k5e3C0b0Rx5NWImt8CG/eDUdnN0IbR6NxcCX98BfEdnub8OadOLtzNnlpB1m2fxf6WhebE1xc6UZUoKUmXCK/NJ7j54u4q+Ob/LrnPQx12mwJygvT2bL4J3afep2ckg6XXVPIgLPihH+n0Zza+SVaXdEf/l8SJlEJNL6g/CEEtRaUKpuTj2yAgP2CU2GHyTy+Bs+gGCRJxlSr59zpJPatfI8qRUPzdiPx8fXDZKjGxbMRjVoO5NiFI/3VlUe/B07bGJ21tvB6NVHWAl38LTJJ3UpMtrLz29oAjdiNFqATrLQ41+JNY5w5XZb20NMvc1nBzeJGt+N/OmnmibSubj0stoCxELpuhn3krUjdbomloDrH/P3fLXgts0rXozaMB3V27kf+AvOKm4211w1b8m556LmX2VXbMnO7/qd627CV+s451J336GVuPzfrTEM/Ly+viJ49eyLLMvn5+bz//vvU1tbyyCOPMGnSJDZu3MjJTBm1py2XYF8Js7gqa5FdwgAFkDARytmyGMCAyksLKh0Hs5pxIK0EFBOSSofkqUNRliEUgWKCOKElIFtHcbY7ZUJBAL4qGT9kavIdKMsXSEh4SxI6qS6mi9csXq/NjwMSYSdOs27dOvz8/BgzZgzp6el4e3vz0ksv0bp1a+677z68vLwiioqKWgH7/lACAiRjVWUzU01V68BmPZFkFRoHT1JP7ODg1sXUVJTh6KBBJZUS1DieyOjOqCRBeuIKknO7kFnQukHZOF/YicoaV9o0XoIkXVRbCyQyC3pzOLU7g9u+g1atBwTeulRE3lo63P0RWie/q9pYS4CLmweB8Y+QFeF70TRDgtIQiVwviZBT4g8prQiQqXSU8Lz8fSv14lgocM0WpB9ZibG2WlEMehZ8+SKb5z+BRqPFw1Em4+BcNv/wLHs3fkV1tZ7gZr2pramMNVZVRQvbC+xGb7dbT8a3uglHnHkwvtLnWmzzLke8lcB6va7DbrTwc61mKsOstl5H/cV2tX+X2citzGQr84BHzfU77CbaR97KzL1FvceUWKUr3AY3lnX/v5rLt8vxqA3j3s2mzozNcsdyvA0LgoTL3N42zCxEF5vDffQfMP9cCyX1jK11C7C69nCzxt6ed911l8bR0REHBweee+45tm7dyvbt23nzzTfR6XSsXLMFdBE3NlZJAkl1UTstqUDjBg5eoHG9eJuhxgXJKRjJJQQc/UHrjiIkFAWEUUKLhA8STZCJk9TES2pCkXEEPJAIRSYECWez0Kwxa39vlMF8JwG7Vq4iKCiIZ599lgMHDrB48WJuu+02CgoKyMrK4q677tIA91i+d3EJIsA4sbqjJGkdfMPaClmllhpFtiA9chAnE2aQuOULnL0icVNl0+muD1FrtRSdTyInI4UD5yY0OLFCaNmf/Ajdmn/KwNbvcyRtGLklzTEpKs5kDaVC787gtm+z4+TjtG+2CO8W9+Ll7QuU2RS+BKhkNb7JEhmRMr5uggIvaLxPQWu296h1lShqJFHoAhGHFBxs8MLxhzxI4H5OUBh2gpLc05JPSGvRfeAzUpX+KTz9AnF0dMRgqKWmRo+ptgZJlvEOiUOl1qkNBn0nBMttrP0b5Wngctzqgo3HX+jaqr4Je1QDNWANtXH/q0i7zOG1xL9IQ/a/OFHeCMZZCUNzrG4K/P/Greg9hnoOrQ67ws5duIXQea27e9Y3jN4sLieIW8e/3Lzgs3WsGGXhQ9p6DvOwWsD/L2qml1ld993LfMFK3E0+09C5f//+l/6QJAk/P79LfyuKwrZ9Gaidm96c2BUDtZWZOMgFeLlV4OVega9HKWqVifxiF45ntEd2DL2oqVZkFGFCKNIlUeiMMJAaU4HKxwQGMBWqEcUqRLGMj15NC/M13Tf6pGmoSoN+6zaCvvicsWPHXvq+Q4cOl37PyMjg22+/vQ2YVPedWYcvJKPJo6VbQBSy2gEJCX9/PzoNfILzTbuQn34Q2VhORPxT+Ia1BSFEbspuKSvHlVMXetvkecMaRXFi24kJBHruoWXoAnq3KGNT0rPkljYjp7gHxzJKeaTXo2w4+RwDlGube3UmCDgpON1HIm65gk4Bg7NEbkuJMpOEc6ZC1ElxUahuKALcLkBBbhG5yTsln5B4ERrVCkVRUKlUFw33hbhowX3xIhgB4B7YnNLskzEJCZNVMNl49Yj+32N9TW99WF8NfK3MsJo0vv8fM29ZZmWf93fZQ9v5nTptXZ1wVtf+boZ95D+BW9F7DOa4LW17H72CeU2dYPj9dfQrW9xl3ggt9NWUE4lmV2zX0hbnmsut7rruy43Rw8yfuuvS/1fMu6zPOcTf5DMNHh4eHrFt2rS57APbtm2joModZ5fr9+VsiVBqCNRt4e4eaxk2uIYmkaZ6hdx5i7bx5qxnkZwiMRpVCGFAKBetAs4JA+ffyuLB+/7s0UMgcfaczLKVErrlnvTMdsVHkm+YIK0GmuYXsW3bNnr1qr9LtGnTBp1OF6vX6z3q+rUaYNWM28JFbW24T1hbJLOGVqVS0SgkFP+AQKrbdEVCwtnJGZVaBUJwdvc8MgriyC5ufh3J1pBT0o2ckg64Op6jZegq2jSeAzjg6ZJLVpEfceFrcPg/9s47Pqoq7ePfc2cmk947LXQpQlBAKVJkV6wviAqWXQXFugWwrR3WXRF1dwHZXeyCKOpaAEVFEQgIotJC75AQSkJIMullZu55/8i9eLnOZCaN5vw+zgczc+45557ynOc853eexzpau6Co0S/Ez1EzpX5zURjvI9c2a1kyOLpA6GE48BtB0HEFqiSRO6FdqZvgRt5fDiqWhOZL9qx9h65D/oCiKCcvEtZWo3anpN+ClVIlvnVv4TiyNa1sQ0YHYFfjatAkONuFldlziLc0jcVIk4XJX5d1ZmSbvHCcbTgb+NABnIqJ2vjTF9rsRhz9nw84W/nQc0z0WtsPOgAAIABJREFUrrFe+qkpLg9mnSbZ7MldYJrBA0y6Zjmd1MD3cWjP6ZeZdWXZkzKdpm0KJp0n4998zwGtXZvLWHF5z549LSkpKV4TLFq0iOCoDk1ecMvQZXz26iKWrQrigUda4XRZiYlxcvGFDn4/ppQ2rWrdBN8+por3PvmcPcV3oaoWpATprtWPllxQxDMG5flQjuCT+TayN1spK1SwBkmuuKOaIZ+c4PXRKqOPRBPVhLboS+3BzF20yKsCnZKSQnJysiUrK+ty4FN0Bbqq5HA3xRqSGJvS/RSP2EIIgoKCCAoKMuYjK0uPczzrR/YeG+vTb7Mv1Fqv7ZRUduH73V1RcJIcs570tHfILxlI55Y/cnzDC6zJbUHvFtGk2lpTVRNLUnwxh7cKSo/EURpVyLFOApcNyqLLcHw+mZLSXMpjThB1ECKOSqrDIDxWpcWO2ogxTQIJ4cck2Yc2UlF8lLDoFnWlFkIoMia1K5agsMTq8txufirQZ7tCdj6goS7rPCGrmfurKRSIIVo+usI2VrP0N+eiZT76PZtCi59pOLT20Y97swInAswxXLjC5B/6TLWNWYG+w8Oc0d1YZp8DxgnqqONC7beeBrdrjaV76c9PMfDIzUGnMJR1LrSfL5gvgTcnXW5gjx49CAsL8/ijlJKNWw5gsXdt8oLTUrKJjZH8bXpXitWhKPYYsish87CT1z/dQ98u35MQU87uA7Hsyk4nKNaJS60NhiLdtSbPfjtjeOT/IKRjDY4jCsrGMC5SQugqLIQLgQIsmVHMqBsKKGtdxdEjknDEyciCjUVrxcrxDRt1xsAvfg8LC6Nnz55kZWUNPEWBdlY4OtvDYmKjkjv5o1nKEzmbFKcrhKNFXZqo6hqpWEgiQk5waaf/8dXGKVTWJLC/8ACDb9tHj8taMf+LxRzI7U2lMwoRfhBrpJvgmCRkhR3bcbC7wF0eSsehEzmeX0Tlu38gKbsMC+AsE2QnCMoSJeF5TVftYAdYXJIThzaJsOhUtZZF7x3RyZ0JCo2Kri53+LsNNCtkaY1UourjDeFcOULWow82tL4NdVnnCebFPb2RQtOsaDZFn+huw4xHwNO1NmwuAW+ud0CBPvM42+f3WA986DN5WpJl4rWme5jfp9N1XVNH2TNClxEHtb+jfQT8qS906+wMg2tO4zp3Pgb5am506ty5s9cfHQ4Hx0sjwLN+3Shk7u9FzpHN/GHsXqa+2QvsHUCxgAQlJJH1h9ORB8sAQVB8GFjDUVWlVoFWa5XjnoqN1H0JHN+r4gQirIJkBGHU/r6OarrfWcrho4KKzGCUZoi60/74CRwOBzExMR5/79evH4sWLTpJIFcAVNXd0hoUHhwRl4bPOklJcd4eKmpiKalMbFIv7gLomJrB9pyhVDkTtepZCQoKISIyjmB7FT3TvqG0si3F1V1JbnMhrTpeTKQzjPgiiHSBM8lCWGQ0IaGhhAjl5O7EpkqSd0oKWjRtk1srwFIjKM7b61dbRMSlYbNH2FHdLf0swixEGqt4mJ+vy5pjXmDP1guHczSrRkMUgsa4rPMEM0+zqfurqXigGR4W4AXNeNkv00cAhgBOP86FTc2Z9h5jhlkxNtK8og0W89OhQJv9Czc1srQ7EzqGNNOF7gxtbTEH0wnAf1iANu3bt/eaIDc3l5Kq0GYpvEz24tY/D+Sq31bw4fS5DOvyKrbKH1Brimu9cNhjEeGtEOEta71zWIKQUqmlcGiXCK1ACoILhYVewkInFKqlyoqgcr68/Dhxc49wyW9dTL09gh5loSRpinVTokVxCbm5uV5/79mzJ9pGz4KuQLvdNclBIWGERCX5LEAiceTtprwqntLKhKasO0G2Ui5s9QX78y43XEwUgEAIweasMXyz+W5G9n2Izqkrar/XklRHwb7eCtWltdECPanJYS5Q3eCyN12drVUSa6WkOG+XP9QQERKZJINCIlDdNXXyPQwwK0y+3Cf5glEw1TcaXEOVq7PVM0VTu6zDw4ansQuBsb+Lm9hCPMUUEc8TlaUpYWybwQHPHGcdGqpAN+f8zvIwJ6efwc38HJNCb3Txps/VReeAdd9fTDG9b3NFFnR4oMOcjRu6sxVhQFSLFt7Vij179iCtzePUS1js5FSM5OYHBlJdrfDf57awYNY8nrnjRQa2nU1Q6aeU566humgXrvIc3JV5vDa/E488lIAjp9aWvNvtJKOmivcqS3ktzMHHA/M58MRRer6fx83/KqXGKXjh9+H0yomkp8VGZJPbnyFFrW0nb9DaN0pr71oKh5SWlkGhCQQFR/pRhKCs4DBF5SlUOf0PnuIzVyG5sNXXrNp5By6XFw4PChU17Vjw43P0u3jVye8LWwiqigUt1qnURHv3sCykJPoI5HcUpGxrGtu54oSgcigryMEjccYEW1Ao9rAEJBZ/FehM07HhiEbc4k0z8c18WS88BV2p77GaUQieTUdyTeGyzhPMx7xN2V/NwVEeaeJDj2zGW+IzTArHxAZa0MyKflMdK//acK7Mb2/eY5qTwuCrPkZu9lhNsZ5o+P18gX4JUG973QpdV1/ri2vbesrTcz3gzJlEOBBR1wXCrdt2YAlqPq+4whbOMdeN3PZoF4ZdvJIx1x3g1lEF3HXrCQCKSxROFEBJKdTUQGUVFBUISi+2sGVfDWs2SfYdhytvcHPbXdWktVaprBKsWqXw4fQQKpaHc7ktmK4WKwnNYH0GSLZYWL5tGyNGjPD4u9a+EVp7l2h+oGW0LTgCUTd9V4MUlaW5FFeko6qNjWRzKuIi9rLxwEN1sEgESIWK6lTySnpo1YFqm6DlMYiokhT5iFASWgKFF/4c/rvRkGArl1SW5uoeTOrOWghs9ggksj4jeYqBr5rmhwDzBqNilO3HMaPDdIlxSAOUON0CW89QNQ2GzpPEh2LVWJd1Y7VF1JObvbEG7mCaD5+xvsrQUdxMCrTD4KNUx/RmsqBlmDYX/kR084SxhnHlKWBDAP7BoY0rXRY1ZH7rVtfmnt+evMc0lzXUF2aYPPbcoSl/PbX2PBPBb+qSR43FDIMCTT34yfW9r2M+kTpfrPinA6FWqzUkOtr7oV529hGEpZn9EViCscX0ZOWuNqzZuo+0pF1c2vMgPbuW0KFtNTHRblqmQkhI7ceiqIAbKWu4rlCwa7uFjK+sPHlvMF0vgIo9NuzZwXRw2WkfZCVV40Q3ve25FmFCIe+g92EXHR2N1WoNcblcoZy0QOOODQ6P9Sd/KYSgqvQE+SWtm67W6HtWN5KgOhMpwk331ktIT1sPjAYBYbmSE/GCwnYWhEWgalqsJ7hDwFXdtFW3lwiKygr81siDw2OQqtOvBtdg9hU7HehVz2qmm4Sgv0J2oeG5EQ0QiqfbKuNP4BWzy7qGLDr6RsZTr2eZLGb6Bb36eA9IMykIzRnSOVNzHTXd8F1zHZ9ONPj4TTNY7/xFtGkcNycH9NcAozX1bJ/fZu8xZ4rGkanJDF2ZH2IYh2cqcmRd8qixyDKtP/5YodHkbH0MPcb+XFlHugB+ieCoqOggq9W7UTO/wIFQOjZ/TRQrIjgOd1A0+wraYdvyP/YfEOw7IKmqEgQHW0hKiSEyrIjU0DLaRFeS1NnFgMEqAwe5GDjIxaZMhQ+mhdJjfxRdFCvxikLoz8HDmw0hQlB64oTX361WK1FRUUEFBQXBnKyPVO2KxeandzeBu6aC8ur66H9+ZVvrNs9abvrh50q1itvEwC6zCbMf4EhR55O/RVZK2uxViTigUlH9s/JcGQPVMQJnqMAVAlWxgtw2gvBdTStlLNXgclb6l1iCYglCqrK+TOyJhrC/6fXkqkabPC6Mq8eCZ14QFvipXOnHrPoic7b49fTE8x3bDMrpRENkrbR6hiQ200v+ehoW5hmnKRJYpsmyXh8+qz6OdTPLzICVqtEwz8v6zm/dpHU65rejCe6ANBXM83GEl+/PF5g3qv5Y/yfUc24bN8bnEw3mdCAiOjqqTrWmvLwSIZrK6ZsvCBCCC1K/ZfF7W3n/9aO8PiOf8MhIciuuZPuxEURHVtOpZwl7PgvF/dcWzLgsntlTQ3A4BL3SVabOLyerSwl2jXDc3MozgA1BdVlZnWmio6OFRuOorZNUVYtisepxP3xCVd24XCFNU2MNEsg50ZVhF84iIqTWz5yiOIkKzcOiVAOSqND9ZOd35Ie995BXfOEpzwdJSWKhJOWYiqJFAMyLhYNtBNmdFLI6WchKE1gKIKWwSauO4pSoqss//9ICFIsNVZX15b/oR+26Ej1WUyZ8CSjdFZGudIyrp5DPNHENdcf6E7wstNHaYrLJoCidTVHVzC7rJjUj926sQSnVaRL+9Jcx3czTaGUde5qoNgu1cVhsUIon+HhmiGm8zz0LwjufD8g0eVo42+e3J+8xZwKeZOjm85jHm2WiS/nrkWOBH+mGmDbGi84ig8u5ArvdXrdNzuly+/Ky26SQNbmMv2EtFkVyPF9ww109OVp6BdaojhCSQocOVq67UiUiXHCBsPJHeyTd5iXz0v3huFxgUSTd7ihlvayh5jTV2SJAddUdIFprZzuGUN71KqT2qpz5GT1K4EagE1JG1CtPpGDH4RHkFWeQnvYmdlsFEoHLEokQ3QHBtpwbyc7veNIzhycoWv0EkLYforJV3NSG1bY24nzLhWCXIugmJcKsKPu+O2h4T21z1rBqOLQFTuek6UpZpmHHnqmlidaUMX0RzDaEyK0vppgsBNEGH556mQ4vgnKunwpghmFQGS/ODa73APUOs8s6NAvodC/pGwvdYjZFU/bS69FfeshXX5udsSY6ig7jiYM/YYGN9d3kR9rGYo6hHdpoY2mK9neWoV3Q6mTceMz0oTwbQ7ublUBju/jaPKXXMTbuMIylhvJOvY35nqZ6NvclSb3up3t+N7QNp2h18cf7R3P1oUNT9Iy3jeqr9NVVt8lNyPEea7r0aIRxnPlqgykmWfO2YeNkfNbIq9ejC2YaaGzGuW1WxFfW4QmpKfuyqWSEJ9TV3tMNp53+yuVzEiG2Etq0rI0s+OXSIJzWPlgi2oCtVjdUNTd2qltiAyIkdBUWQjLjWbGqnN9ertKitWRvsIvKak1jPctgBVAUi0t1u/xRL4WUUgrFRpDNQLUQYLMeoWOnBdw9/jXmvnM3mzPvQsr6eeyW0sKJkqF8VzIAi1KDKi3ExOTich/+uaBT6ih9alaKBKWR+pcbwYE0hZiHLWyer9Jik0pCpXryd9UqURSrX7s7CajuGoRFcTeiShMNCscQg0N/T5hrCDTSGEzUlJuJpkUDL2Xr/pT9Lfd0uLo7U75Fp5iCBtTVX/rlzhl+0krSvLyXeVHyF5740M2FTAMPeqK2oHlbPIsNbeirXdLrGE/GdvHlRq8uPn2aYeFt6L7cWx394fE3Nc7E/G5MG5q9x3hDc/bhHFNb1Zd2cLr62ZuMwPS9rzYwc6G9tZ9uDNCV454+ZB5+jqem7MumkhHe6uKtns3F866urq77cpfNaoEatc40TYkKZww79oTS56IyEuLdSCnBEnzyd7db1PqBNkSzVoBQoERTpfbtUrBUKMgGME/cAiz1VP3cEpQ6eOTUNjRANSct0MJa43bV4KdvCmkNChVh9p/XMEXkMXz4ZJ586n/07VtBy1Yv8dCD4RzKGVdnqG8hirHbV1FdPQh50imFAgTjVvWG9m43PnrsKBXVFZ7z9vUWQJEQ7AxX6FumYpPelHHB7kiFsImCa+53cuC3Fla+YME9D5KdsvYKZrDAagv1t/1wO50IRVT5UcW6YPSPqguPdO1f3ZI0qYmPwjIMAm6ISWjpdcpqoLLeXBdrjTiTzvkdhv5KNy0GulUmqwFH4c0RTEEfM9GnyfXgHAO1Jt3QPnp7OOppBWqqfs5o5nF5OsZ8fXAuzW/dIj7Sx5xpzj5c2Mi8m3t86WhKGeFvIJuFpg2FeTwZ57S/46kp26s514LmDnDjCaUOR3GdCkhYWAiy3F3vBrQ5s+ifHuPxufXbCyijncfnlKBEXv9kECOu+oorhroZsugbVu1ORQlNBsRJC7RUf650oVRZ2u8EDwyQOIoFP74ZxlDFRn0Jw0tCgij54710ff6fdLfW5ZjiVDiR2MPrds/scDgkUMpJBVoRBdVlRSn+aoDBEXHER2YjhIPUlI948aWnGXXDCYKCJAjJqFFH6d7tAYZeHkJu7vUggw1PS4Rwk5j4GU8//SBXX3OUx/4ymo8++o9Bia4bQkiqq7dQWvIQIaEqx6oraSlE7Q7HT+yLUaj4k5XRD6gsetBK3Mdu0mrkKWwBKQR7QxXaLxT0HeRGUSQdOrlp+yqsuc3Gqj9D951OqiMlIeFxfpddVV6EYrE2JRPbvLA5tOO/6drx+F+b4ZLc2eTT+VxDfReOM4EzwUF0mJS4AM4czoU+yDyPOcfnG86F8XQuo6q42FHjcrns3jxxJMRFI3NrNBuv/0iKUXjr5Qc9hrkYM/4F1h3w8qBQOFx6Ofc/nsM/n9nOzL9nMeut1/hkxW8odnWntFShugaku1Zx3htZReXIYm6/t5IjRwSvTQ6hU04E7azWetM3DsXH8tD99/PRv2bRvR5n/ZVSEhEf7/V3l8tFcXFxDVDFyYuNKoXO6lKk6p95PyQihejQIyhKKRWV5SxcNJxZs7pTVFSbndMJoWFuHpz0DK1bfQziZwq4EAVc2GMaL7zwBHeNP0ybNBdPPPkZAwb8HSFKfJRcq+Cmpn7LxImz+O3wXHr3Pk7PxyrY29lyMoUv5AYrWP5oYcQEN4mJbq6equJ80sr2GAWntn+QwJ5YhaJ7LCS2Aqf2Cm4XfPmmlf1vQ4lDUikENaGCkKhkv9oOJM6qEqQqmsslGdruV79sOBEo0nitC86g79QAAggggAACCKDpUeFyuSodDu9qRZs2LZDuBvjw1Tykefz4ejQogrX7b+O2P13Kpi1WnnnwCB/+cx7jh8/kuzUqzzwTwfESlbXX5tF5Xh43P1ZB5haFGeMjaLE2mr7WIJIa4PfZ1qY1NpsNUvzVy2pRLlWS2np3QuRwOHC5XJVABboCrVjUo9Xl+dRU+VJgASThcS2JCs0l2BZOUdFEPvpoDnPefpCcnFr1NTdXMGnSdcx7dzyVldsQbDv5tBDrqa46xJ691FqsgbJSFz17zick5F8+VWAhdjF27L0MHbqB0FCw2SDlEgXHfaFstig+L/SVCMGMFCvZdgulJYCQVFVJtm1WWa8oFGuPnxCCjW5B9bfw/q2Cg3tqfygpExTOdZP+Xg3XHXGSYlVxhknCY1oha8k8dVbAWV1KdVk+CurhutI1AYaYbk2nGy60BRBAAAEEEEAA5wfKgNJjx455TXBh9664a4q9/t48EAh7LFkVNzPuybu57YEOlJRZeOSBI2R8dojbfldOar8aVmYIVn9j5bFxYXw7Pp4hh6MZag2mDQoNCdcXc0FnAJSW/gZ8rkWu202X7t29/q61b6nW3poFWgk+5qwul5UlufjSYIVQRFRiZxkeXEBE8IlabVEKysriOX689lWDgyUWJZqtWx4lP38aUl508nlVvZI9e15j27afKUgbNnbjv//dSkXlEz70TwGyHVOnbuKdeb+t/UpKDn7pJPXBUrqqqk9XchFS8rcsJ+3mODl8pPa7qlJJ8lo3YwucxGvPJ0rJrQ4Xg7bWEO90Y9GU/RMFYKuUtdwdwBUscIcIopK7IITwacKvLMnDWV2GUOxHfaVtJHTO7TiDNTqAAAIIIIAAAji/UAY4cnJyvCa44IILEC7fB98CecqnbpVQekjvAZZgLDEXsmbv7dx63wUMvrYVb84L4eKLVKa+Xc70+ZWsX2Wl7dpYrgsKo49iIxlBQ71WR3XsUFtsi9R6ucA7otS2kzdo7evQFWgrgNWi5DirSqtK8g+GRCd38cWCENHJnWWIrZDI0DzyHB0AQVl5LLm5UUA+YeHQomUOQgiv+qzLZUNKiRCgKKqmHPsme0uCEAQh9H2JqPXdFyrB5iOMt5ZcuzAoUSxaahVwnTpMjP9vby0Ij6r95vgxCC4VJ1M4Q8AZBFHJfkX4kaUnsoSzqqRKsQjvI71poV/QSjdcMgwggAACCCCAAM4PqMChgwcPXugtQWJiIpHBldTlvcBddYIb+xfSskXKye/i4jp65D8DjL66E5dk/xw6oLCggHnLrCghLX+RVqpVDLtwDq++dJCXX7EwdXpH3phZwujrCrj1vmpmf1DBX/8APVYmEdyI26JFUiWhZUsO5eSgpKZQqqrEKf75vz4WFUliYqLX37du3QpwSGvvWi00KCR6T5kjr7A4b08LLrzaZyHxrdNlkK1KpMZsZ++xgSChpDiWA/vTkPIEoSHQretOENKrF46y0kicToEtSBIVVQV+7BOExsU5BdoGyQIoGi/H154JoDoEIqNrU6mVAso8P6EA9m6COO2OYO4+QVDhz2mrYkC1ChJaXyT9cQjtyNtDdWWxIyIyeT/k+nznJkTgwk0AAQQQQAABnJ/Ys3v37mu8/RgdHU1iRCmHfJyT33rrbfS+2L8AkjfccMMpfx88eJD3V72LpyLaRC7l31MPsmuPwrxPunPjiONc95s8FoyP5eVvwhjzXwd/+Vcl/7y+mMRDMcQYuM9VUrLDXcMpyp2AtlYbAAdctbfXOlhtHHO7SU1NZeGCBbRMTSHTWU2qxUKMYiFZsXDI7aJcVbErgjYW2ylW7v2J8URHe/dcuHbtWoA9+t9WAFtoqx1qfnZ+4ZFtLWqtwqJObxz2sHiR3OEyOu3/jlU7xiOx4HIlsXlLTwTrQECfvnkgsz0aPCWSsvJkKishyA6JSWVYLKW4XEleKx4REc6kSfsoKMhDAinJPzuxcLZszYmnxlITFooICyUmMYljeXle8xJAdQQkJ2oc7HwI98KtrxaC6N4Su72WtlG1FUKL5cmMylMFiWl9CYlIwtemSUpJ0ZHtqM6K47bQ2K11pQ0ggNOEaFMQj83N4LElgAACCCCA5sXqLVu2TCovLycs7JcxOIQQXNSjHQd/LMBi999rWJNAdXFd/2UE2SRj7r6QcmUwwvoVySm1nO3RxVF8fpdCl7UnCL+6hAOzI+kprNi0x79qkcTQ9+ehGCzJVquVz6Y8S7CiMHzy0wB8+vAjJK34js5RUaxcsoR5H39M3oABqKrK2s8/p9UL0zkx61+k90rn0KFDrP7DRAaX1rpCPqS6SLz4Iq/W9vLycjZv3gyw+mQdAK57+Ousdx6MOXDi0Mb0U9T7OtCx3+9ptX46qbE7OFLQHSkiWfdjX9zut7BYVbp1V0lKWkZu3p2/tEJLQVFRGxwOhahoNylJBURH53HiRAev5YWFhTN+/MDavlAl338fh6jNisikZLr/4Y8kJf3sfqTO2guQbQWxsbXvWpStkCp/6etEADtsgmsHyZN/l/8AHdTav6tjBBXxChf3v90f47NEwImcDSgW68Fr0/54AFb5euZ8RpoWhGCk6XvdjVlTOplvLKb4cagx9ywKV14fpGluDtM0l4dDAy6nTmKIFjTC7AtZH59nS3/7G5VPx8rzoI/1SJbnc8jn81nuBND0WJ65ebP72LFjlg4dPOtSI0aM4L1v3iUs8fQq0Kq7gjYtXezPUnBUdsKekIqKDSRIVRBuEVxREcauPQW0aCU5qrrpavlZge577Dibxvzu1DxHjyKkbx/sFoUlb71FVIuWpA0cyOFNm6mpqeGaPQf47LdXgaZ0hzuK6Wi1cXTqC6yLCEdWVNGr7Oc4Ij9UVzFihDmG1M84duwYubm5bmC5/p2mzguslqAtJcf34Hb6ju8hBCSm9SU1uYIuLVaga7K5eX3ZsqXWEYWiQP8BqxF4dndcWJBKQUGtw+qExCoSEzP9jtjsaYfgbdfgCZVAbBdOur0u2C3xNJxcAqq6CBLiag8kiostqJslQdRq06WpAiUplsT2/X2WKSW4ndU4cndhsYbsYPTo0xcS6OzDEOAgcL0Wlvmv2melFvwl4yz0FtJWq9M4Q0hMAcRodT54mqL36RjbRC4JM7X+OG9DyjYQGVogiGzD+JypjYM5Wn+fTRDa2Jyi1VF4+Yw7wwGFmgLp2sbmbJMRzYHTJXfSNHlyro+NXzMcxQ7Hlo0bN3r8sbS0lEGDBhEfWlwbveQ0QrGGsWVXBClJEpu1FCxBtVcOZS2bWCA4pNTQuqVk71aFUFNU5xYShubmn/JxrVlL3wH9ubBvX45/vID9K1aQ0LkTOYkJOAoL6VZVwxWHjnJF1mGuyDrMIEcpwQiG5xdxxYEchufmo5EQcAF7EmIZNGiQ13fYuHEjVVVVW4wntCdrabEE/YR0V+Vnrxf+XMWLSGhHcpv29O7w0clvVbUrs//bDdUNIBkz+nMSEzd5VIxLSlvw/ZpUQJCQKOnd521qmSPNj0K7oFX/2rJKS4Gtkl8WLcgNUYi6+efm+GCuoFvlzxELHR0gqs2FRCV28KPikoKcTUK6a2oUu33t2RaC7DRDV0xGav+fYVCaz0YBPsWgYGYZIk1N0fxsp2uhpieexvqP/ZUoEGcCEzWL7hRDeGFdoR4CLDrTFTRBnzu6JXKOaYwaP+eDtTJTUyjNp1fnG06n3Ek7i+VvAP5j7TfffAOA0+lk3759vPrqq1x//fU88sgjKIrCoL6tcVWdOL21EhZWbBqEqsL4MT9B9VFUVSBVARKOCRflvyvCokBBRhgxQjlpffYGdc9eQkNDiY2NJSU3j9ADWcS1asWJFinkHjhIeD3UyUNuJ8GDB+F2u3n22WfJzc2lpKSEnJwc3O5adoLWrkuNzynUWpSlPTx6j8Uesv7Y7gxUt88LfcJqC1HT0kfQLvEn2iX9CICUVpYvf5hDh2pp2df+n4NL+32IEK5fZCDVJN5861JUNyiK5A9/2IzFcnq8reV0VEjtWvv/R7IEkftredlmFPUQDLhVo3kUCcrfkYRr9I2qOEFZskKb9BGEn88JAAAgAElEQVRYbaE+IzhKt4tju1diCwrdFBQctstvc/v5hyFAlLboe+LaZp5l9A1/kGW4oBlYgM596H3ojeZwLtMGMs8TJXrOeUBDaSwCcicAM1YuWLDAWVlZyeTJkxk2bBhvvPEGS5cuZezYcQBce9VQqPJ+gLZu3TqWLVt28vPDDz94TZuZmXlK2jVr1qC6PYf+O1wygGmzknn0j4X8X78P2bu7kmN5AofbzZar87nloSpm/zOIlodDSRW+/T/HFzrIz85m544dDLAFE5NzhKiYGDr37s3h3bsJF/553gD4QUD/a69h69atLFq0iCC7nXHjxtGvXz+WLl1KZWUlCxYscAKfGJ87WUd7VKvDSvHxbw5t+2pguz43E53UyVeZokXX35LY7lKu6/03Xv3mfSprIsnJGcK333Zm/PgdBAer3HnnN3z//WfkHx9l0jEVdmy/h40bP6B370ouulhl8OA5LFue7tVzR1OgSBGE3ClITKg9wti4QCG54JcdfiBEkPR7aN2q1sXenrUKnXbVqtmqDY72ESSk9aFl19/6U6wsK8zm0LYvUaz2r+NaJuXAzqZ/uXMLPev4zdtikK7xptM05dvhhQM4VuPzolm652h56gSnTFOQmebGSO190w1h1+d62EB4qvdIzRqaZthcDDakM9I4zNzWaEN7RWvlLmqgAmVs+ywvPFpP9R+r1df8TH36w1z2okZ4lNG53sV15BFtSOspTYaXDbOxvdMNyqr53dI0CoKOlVraOwxjpKm5renaeJto+M7IsdXrMMIw/1YaLKDGPqCOOpr52H819XWWRoWpq57GOZ5lqJu3/M3Qx+EQra8y6zg10Mszzk1vcyTNwInP8pGvPxiitX9zGQz0tvIld6YY5u1gg0zJNlG7/JVj3srX28ucviFyHQ9j63TL9bMR3xYWFh5cuXJlp2uvvZZ7772XCRMmcM8993DppZcAMHz4cLq8+il7SlwI5VQ11RIcx4vzy4GffRy0iDzGd59f4pEmO/Xlz1m3L+LUL4NSfpEOQARFM3/F3URH/IcXnj7EK2+H8ehfwolxO7nhkSre/I+Nmvkx9LfZSfAj+mBXWxBrf/wJp9vNRUIhzVlDdnY2I0dez8fPPUe4n7TeaiTZXTtz7/DhfPLJJ3Tu3Jm/TpmC3W7n/vvv57vvvgOgsLDw4CkNY6RwXP3nr6ojo5NWFh7eLIuO7UBKHxFJQETEt6V9n5tpl/QDLWK3A+B2p7Bo4WCKS2orP2DAUUaOeN0jPcPt7sPiz7tRVS1QBNx++8cIke/XSzcMgt2tFUaNkwhFUl6usPMNSbT6y7rl9lfoerVECInLBXsXCRIqNetzrKA8WdCu9xgiE9rjl/eN3F2i4NBG7OGxq4aOy/BNND9/oQvF9HpyeKdo4ch7aUJ4s3bhbZOHo9x07bcpmtCdqFkNe2m86zlNbEVMM2wIFpp+W6iFUG+rCfdsrQ4HtXrWVW/9KL6X4fs07f9jtGeGGj5pprw2aTzJYh/tVReiNY7lJq3Mldq/K7T3Mvr8Mdd/htb2bbV6rNDK1t/NV39EA28byl6k/bupgbzPsdqzGT7y0JW1yR76qC4UacphsfZvjPbvClM7RWvtpHOWR2p1ut7Aed3UxD7bZ2jvb8QQrUy9Diu0fmqrpdXTT9TqM1Tr/5VamoMmhRzD+JxkGsd6X8/QyvGEKaa+ztby2WQox5y/EdGGtDp3PUabd0Ue0hrH1lyt33Resbmtpmjft9XqJrRnzH3rD9K0clcYxmJ988Akd8yb2YVa/p7kjtlAMUTrH7T0ujwxjv2MesgxtD5faJgLen8UmdJ7kuu9tO/MfWCUL0YZ01xy/VxEIbBi8Rdf0K9fP7799ltWr17N4cOH+eCDD1i2bBmqqnLj/w2gqnCLh8cFWMJO+QjFe3wOIWy/SI9Xy6/AEtqCVz6/n9v/0J4b/6+Cd94upfMAF5OGh1H6ShyX2ULoICx+RR8MQxDzypskvV67x2trtfHTDz/Qvn07bMdy/fYj/U1VBV1vugEpJX379mX37t1s2rSJmTNnsn79enr27MnixV+gzadKrxmtWDHFOudP4bkZb4+TbrfTLf2As7pMvvdYG3nnsLHSZq2QCLeMiFgnX/pHe+mWQrpVIQ/lKDIy8nOJcEpQT34Ebtmy5Wz53epoqapCVtcosv+AMVKIspNpYmMPyrlzM04pU1Wl/O67kVKVQrol8qefLpF5eSdOSbN6+TL5TVqaXAcnP8sUIT+cbZUuVcgap5D/e9MivxPKKWnWgfw0SJFrf7BIt0S6pZCLP7HK91Nr0/1kQX4yVJHzHmkhayqLjUV6bS+32+Ve+c7dcs6fwvLXr3/VF7Xn14AZP3vwpkhbyLxff63FFA/KKdp3RV4WIKkJeKMVRbfEynoqKEMM+U02fKZr5Wd6UUwzvAj1rDouountYqx3mon2k1EHDShaez7LQ7tkeHl33RppXlz1782K0kjte0/v5qn+6Yb2yzDUq67+0Ms2L6QTvdSpLuhtIk0fT6cd0ZoVTE+zCZjgx3jxlF96He00xVCGUanQ36++Fzv1vn3bNEYna+3uiTM/xNBfxnYea1DKpnixxM+pYx5lGN7BOAYzPbyv8Z09KcUOD997Gv9TvNRnYh1pzWMo3UM9xnqpm57W24bAGxZ6GIfe+rqp5U6mF7kzxMs7+sovS5sfnvLypACb58gUL1QcXa57Glt6mxnXg4bK9fMRXZKTk9379++X5eXlcv369fKvf/2rtNvtMi0tTW7btk3m5+fLfkNGy7Qhr/n8DLzuKamqqkfdZvSdz/uVxymfSx6Vd96ZKlu27SmnvxApK/OFnPeyTc5qmSpzWnaQBY34zHzgD1JKKV9J7+33Mw9c2l/m5+fL2bNnywkTJsjS0lKpqqpcuHChHHfnnXLbtm0yOTnZDXQxN/QpW4UhQ6e4rfaQT/IO/uAqLzospOcF2jjpsQaF0m/0dC7q8B0DL3gbpKC0rDv/nvU4J/IVEJIWLSVPPfUU8XGrT5FjEsGRI2N49ZVrqawGq03llVcW06PnTBD1CcDoG8U2wfYxVq76vYoQkp0bFE5Mh2DTbdTcMIWi8Qq9+9R+X1khyH4BWhyrrXdhZ0FFx3D6jf4nVvspRxdCj05jbq+K4qPK8QPfuxWbfcHFF9/7S0L4rw8TNYtBtib4xhoE5tteBOAcLwrTQi0Pb5bCNNOi4DAI3oYIWvNN+F6alcVs4dIx0cuiNMdw1O8J0ab3zdKsL/5govb8HA/HpTNM/9YF/WZ+sYf0+kVQb4qluf46/SRNy0uvl8OgPBjz0cs2HyMb616fE4x0L5ssTwq0QytfPw5O18o8qCkLd3h4Bi8uADO1d6jLkj3XpKB6ao/6oJfpZMJ4YuEN5nZeaOi/OV6UND19XSca5jHobe7pc8Q8zhxeNs6eYKTeGLHQRPUwji1zeZ7uYOh1M49DnZIwpJ6nOp7Ggq++biq5s9CH3PGGuuSYOcKtt37I1Pohy/S8WdHGD7mOSb40Vq6fT9iZm5v7/eLFiykoKODBBx9k7ty5vPHGG6xbt441a9agKArjb7/KixW6+aC6ynnklld59Z/HSI49wJqPg5n65xBu+b2LiEkn2C1deGZQ+4eog9moqkrYcf+YDF9XV9DnnvFIKZk7dy4TJkxg1KhRHD16lCNHjvD0U0+xbNkycnNzv8cD7/YUS7kA+WFo3GeVRUeuy927ulWH2DYSIVQDRcF4WU7o/7Ts8hvSLmjHsJJ/8+OeW6lwRnDo0GjmvzeNe+/bjz1Ycu99W9m7dyZvvJGOlFEny5QymiVL7uCnH75k0GAHXbtVMO3557n11otwOK4wRB/8uehfsEs82uoFFgFWIXAK2HixlTHPS8JCwelUyJwr6LD91K5yI8gdrHDFYxJFkbjdgjVLFdqtdxMiJdIG+T0E0Z0vplW3K82cIE9thJSSvP3fU150ODc4JvEzIQo9bUp+jViofdI1ATpS47fp/z/OtHDqQtfMgUwzfO/tUpGZS9eYQCFZXqxkc7QjzpkeFMdorc5GZW2w4VlPWOmhnv5emqrrEpz+nT9+g/W29cYVztL6LN1DG2fX0c7+cHuNXFtPWGngV/rDh/aWj7dnHQb6z0jto3Nl9UXfvKHJ0Oo92LSISx/t3ZTjE63O5r73NXbMSqrD0DbGudfTg4JUF/3AXK6RwqWXqV8s9jTm8aJgeYJe3wVaH8018NCNc1ZXyryNCeM8NXLmPaXPNIwLfxX9TBOXFz/6/HTJnbrqHG14V3N+aYb2MVKg2mjtonPFze/gS67X1a5NPW/OJ7w1b968S2+77TbrvffeyxVXXME777xDv379sdmslJeX88ADD/DWO4s47O6MsNi9ZnS8yM0fHp7pUdHafdABHp0Ae0aEXMs9t5fw0NNxdOkSyt1jjvLpuFimPymZ+PcqnnytjNblUcQ1MJB3TPYh3nvnHdqpZvPwL5GvulnSsS2v3Xor3yxdyuHDh3n55Zex2+24XC5ee/11rr9+FPPmzXMBb3nK4xdUk9Hdn/123g/3r1i/6Jnb2150vbAGhQo4qUR7rJItOIL04X+h8PDv+P2Q+3l7+RvUuMJ55pmXSEyayJibDxEeIZk8eTE7dz7JmjUvImXIyQ5p3/44GzY8xqFsJ2irzdNPb6W8Ig9FuCgvc/POOz/PFSkh2J5z8u+CggJ++vF/RET8HH2nurIK9Z57UdxuaqQkKlGQkVFbntMFhUfW0JGvTqZXgZ86WPjti5KWrVSQgo3fKeyaCP1VkFbIGaQgWySQfuVjBIVEemoKXdM/uelwu6pY/9kUFIt1ZdLg25YEPI/9Apma4J9osPQN1izRRsGZri0UMYaLQfiM+HN6PHroylaRZpGdYRDuY7XjVqG9j/59c3oyrMsCoy8y/iyg+sLrbWHKMCix5kWuLiXZH4VXL3uwD481/ioCWRq/1ch7XuSH0qNbyOcYTkt0d18TTRbMGVr/bzZ5mTkbvFbOacSlRH3upZkucDbkvZrTA4jeR1MMMiVL6xfjZTddAfRnHPraROqoj0V3imHTgMEVXX1xOuVOffLTT8vmGLj0+jyaaRoDDZXrAdSNhVu3bn1wyZIl3S+99FKuvvpqCgsLCQ4O5r333uPhhx/m5ptv4ZnHH+D2CXMJSfa+v6+xtmWJZ9fSSNrXq1LJsbmUlMLytd3o1T0fm00QJhQiV0ZSUlpFTVINjgOSWD8uEXpC75Jysp75O52svpmy77qq+N3kZ7DZbKQkJ/PGG28wceJELBYLDz30EHfdeSfLly9j69atu7ytE7/kat80Wg3a2Pa9spIjo/b99H54p363o1iCfPoDSe44gEtveIHyson07zyP73beSVnZNTz39+NERjzN1dfmk9LCzXvzX2f8XTZWffcnqqvbAm5+89vWPPjgLX4HQ6mNRLgAqO3VuNg4LrppNIl+RteRUvK9MoeSz78iDkGpFfZ2tTD4bejYpZaFsT3Tws5n4OJsNyhQ2ElQ3N5Kv+ufI6XjZXXNb/2YTapupzyw/n+irOBAeWhk4rwhQ6Y05nTi1wCdz5dpsGzqAlW3ZJmtnUPqOFI/nTAqmbo1Jk3bCOhH+MY0U+oZPa6+dTFbuBoCvZ29KanNeVSql72yCV10zdDG0RBtXNXXDZrDoDBP1/LR/56oKTFmSyBauqboj8agMYFyFmr172VSJM+WuWfEDO2jnxrcYbhAOdTg5YF6jt8oH7/Xx/qZqZWt0z4WNsJ66k3u6MpuWhPInYbIsQwDVWSs4TRnrDaOsgzporTLiWejXD9XUVRdXf3a9OnTX16+fDk1NTUsXLiQf/zjH+zYsZOJkyZRVFTIsGGXM3LIZyxefwhbeGuvmTXVsXnO8VYIAVHhZSBsuFwSC1AZ6UIIqMqxeuTB+otgBBf4UdktrhqCx4/j8mHDuP3227FYLMyePZsNGzYwd+5c5s+fzy233MKVV15JdXX1a96oUr9QjIVAhke1WGezB2/Zs3YupYWH/Kq4xRpMuz5j6HDRFfymxyw6pnwPWNm58yaefPIBigprFc6WrVy8/PJshl8xFSFKEJQRHx9Ur0iC9Unr7fmwmBjKhMAJ7O5t4cJZ0L2XG6FAdZXgm8eh5Vo3dikpT4L8HgqpPa+hY99bsdhC/CqmvOiwsmftXGG12XdYE1v9JMSv1vezEfoFE29KmcMgSB2GZ6LOQR+2RirF6TxerEvx1S1l/jhd99XWugLSHP54fZWtH0835Ch6ho86e7swZczDDKMydD5BpzBkN8J1oC/ofd2Um4yFmrIWo431dMN81N/Dn7Fj3LjXhfrKJePJRlPLhiHauzVGMTfnRwPzyzTcyZhruhthpO6cS3L9XMHHmzZt2vzZZ5/x3HPPMXnyZJ56+mkuuqgXqtvNfffdx+rVq/n73yaTGrwV6fbuYKKpUGXpxdwPY3j20a3kZJ9g+Sobe6mm91MOPp5vo3NlCFENtD77ixKp8k7LJO6dNImSkhJ27NjBtGnTCA0N5cSJE1RWVrJo0SKWLFnCpk2bMoGPveXl0VvItY+vLlr80pB787LWrt2+fFb4pTf9C0Wx+KyYxWpn0O2vobrHEmEfwwufLedYURe2bn2a227N4b771hIZaUEiueuu9SjKePbuHUl1lWT58jK/FWMpJaWlP0fSKS0rZc2aNURHR9T5nPH5/OP5ZPXowXexbgbcJ6hwqmSsEFRVq2x//ziDvjmBRUqqYwQHhiuk9r6GoePe8ld5RkqV7Sv+w/H931fGt7/k3hEPrvIc0/zXiyF1KBveOIqerEBnSwABvR7FhkW3LrpEU1tvhxgoMHM0ruJID21sXAx9IUNTnAabOI4YFNjmUqzqKhuDNau5rOAj6jhW93SsX1dfN9dJw+mA/l6e5l5TtX2WD057pvbxxYU2RjTVoV8uM3K3Mw1jK9qDUphlukS50sAl9uT7nEZa+BuD+sqd+mw4p5jey185plNUzLJ5jmZV1vOpa2ydLXL9XMYxVVWnP//883PWrl3L6tWrsVmt/Off/yYjI4MRI0bw8MMPs2LFCma88BdG3/U8tuTrmrVCSlAEs/53E1P/9B5Tn8xjypPBhAdJjucp7JwVxVWWIKKbmb0zU63h7pkziY+Pp7S0lKqqKioqKgDYtm0b33zzDXfffTfPP/88qqrOAI55y8uru71ryofsmBe0dcHhbV/fXDxoly0mpZtflQsKjqTn8EepLn+Mm088zMJ1Uzh4vDdO5w0kJ/+epKT4k2lfeAFqaoKw2xWsVv+jxkgp2bcv9OTf9iA7rVq1Ii7Of9nQpnUbeg3oj2oBu4E/X1JWTqHrXyjyQyoTBMf6CGK7XErP4Y8SFOJ//sV5e8jZ9qXLFhLxWXWrP26BVX4/+yvB25oANQf+mK4J1EmG7zMMx4djDUI9XTs2P5PQL40Zj/J1ZGoL2wjT4tsUx5PGY+gsgzI5Q1v8V2plZJjaa7JmkfPXX+pYzU3XZO1ipw7j+zaXdd1Y9iTTicQE0xhpaujH1pNM7zdEG6NmDw76pmWy6cThTClWTQWHQYGcbPBmkVZPLyi+oPuafttAtUAbAz3rcZHwDpOXFwwhr40K5kSNezvdNK6naHLI2Ldjtbk83VS3iZrV3OxZ4nSgLrmTUYfc8SYvzUq33r8LDfndYYoAWZcc87QZ0g0j+uY903A6cLbJ9fMF7+7YsePe559/vt/kyZMZOHAgrVq1YsmSJSQlJbFnzx42bdrEZZddxtTHb+QvL64kOOGSZqSgC9TQXjz4Ivxp9Ie88kYJs6bY2fiXOIYFBXOBUPDudbpxkMCHNRX0eul5Lu13KU899RTDhg1j5MiRjBo1iuFaIJU33niDqVOnsmPHjrXAu3W/TR345O89Li3JOzCnfd9bOg+87RWEn6ERpVQpyMnkyxnD2bz3Yj5c+xIXD3DwyisdSUlJrudre8of1qy5ngEDFyGRbFh3CW3afOE3B7ouFJeUsPLRR4n932sc7S+o7BjFVX/+ioS0Pn6/P1Jl9QcT2Ld2zt7IhDbjbnhm+5pGV+z8QbTBQtHTcNtfd1mU7cHygcH7QU9tsXJo43eO6WKY0J43L+5/NUVew/RMXfBFvVlpuKxktp4N0erYxvCbHgXPuEgIw6U8c96erDHpWnrd33MvQ0AOHXo7ZGrtNUS7BDbWpIx68mNrbBP9HXQaja6QjPVSnhG6pwpzGSsNdJ66ytYvKEYZ2q+XVlZzBU3Qg70YqUMOgyu8uVr5ZqXJ+P4ZWvqZJg8DvsZhXWPXGzw9gx/8cU918FRWmtb/ekTJLI2zOsM094Zq5TV07qWb5kq0RsGYaFC6PL2r/p76xUHjWEnTyjCPVTyMa728kR7mcZqBC65zmPW6Ndcm6XTJHR0LNaVb5y+vNGxc6pOffjegp6HNo7UxY26vMynXfy3oExQUtGrbtm3BCxcuZPfu3fznP/+hqqqKAQMG8P7779OqVSuioqJ4+JG/8P4yN/boC5q1QnHyI44fLmBYvzymTj7GCzdFcveJOFKasctWOqv46bbRTP3HP3juuedISEhg2rRpTJgwge7du7Nx40aGDx9OaGgo3bt3r6qpqRkErKsrTx8R9BDzn0wbU1l0ZM7A216xdx4wzp/HTiI/ewNrP3qIgzu2s188xeN/H01Kiucwj/VBcyvQS57/CxW5rxHbpR/9Rv+LxLS+9akde9bO47t3xteExaSMv3nqoXcD3Oc6YVzgM/2wZqYZLsY0FyezOaArX1lNaK2KNnkU8NZ2etmN5SpHGy5xnm6LW7ThAtPp7Pc0wzG1v2Ububbnk2ut0zX3GtvXxj7zZ6zWZ1yfyTnQENRX7qQbaC2e2r4++Rnlk6++PFfl+rmCp9PT059duXIlDzzwAOvWraOiooJbbrmF3r1789RTT7Fq1SoSEhK4/4E/sXhdGPaoTs1SEemqYOr4Z5n3XiXJxSH0HlJB685u1KdT6a/Y8E0Wrj/WOKv4+v+uZubs/2KxWHjllVfYtm0bTzzxBDfddBPJycm88sor2O12Bg8eTGZm5jPA33zlW2fERCGQn05NXOquLv1my9J/XpfaZRgRsd5vapqR0PoiLhk1jeCwF3HuW0L2gV6UFFeiSmMTObHbnSgnjbu/VM7dbkmNE5AWIAgpBWVlFbVaqYTqqipy9u6lvOA4TkAVYLXWfjwr+xIpwVUNVoNqKwWUVpZzwlZM+97Xkn7loyS26e33+wKUOY6wZek/CQqNWG6JiFsixKGA8lw36qvUnSsLlxnNsSiYKTDNXba/5TUHzlTZDRlvZ6qNmhuna+41tq/rW8/6lHcm50BDUN+57yt9ffKrT1udq3L9XMGLmzdvvnHatGk93njjDXbv3o3VauXTTz/l6aef5sMPP6SwsBC73c6sl6dTc/8kvt64jeCY7k1eEdVVSVqrSmJi3AweVsaGBSFcMryMtaqLPs2gQH9bU8naK3/DP2e9zMaNm7jwwu6MHz+ewYMHc/DgQRYvXszs2bMpLi7mrbfeYvPmzVuAF/3J2y9T8qcv9U8syd6yMaHjwBbDxr+PPbR+F99rqkr4+q0HOLRzFUcLuzL/u39Q7QrXKrCfwUNm8PjjWwgLd3u8f1lTI9m+w8KGDaHs3xdHZuZ13HzLVzwzeRVSSla+ZWfZ32Ip7B1MXBp0u9hNj54qoSHS4ytW1wg+/o9C1CIXXZ1qreNmKxwZKKiIs9Ky8yCuumtWvTjPAM7KEpa/+TuO7Vmem9Ju4EVXTvraK/k8gAACCCCAAAII4DShkxAi48MPP0wZOXIkTz/9NGvXruXZZ5/lscceIzw8nKNHj/L4449z4403MuXZacz97BDBCf2atBLu6iLmPv0s/31d5earXHzyQigPzCxjw/hkbrCGEOpHHv5ifk0FxeN+z0NTallp06ZN48MPP2TYsGEIIdi+fTtLly7FYrHw0UcfMWbMmGNSyiHAHn/y90vZ/3BpTvmtV7feV3Ro8+iKkuNKq+5XIvzwynGyEKudDr2uITo2geqc92gX8yXFpXHsPjSA4pIObN9+NZ9+moTTdZDOnXfTvmMJMbHFRMeUEB1TQlx8KZ0vKObyYSe44YbDZGSkERNdxOXDshFAzk8q+dsqeG5ZIUOHO+jWvZiExBKiY0pP5hEVVUqho4Lv369gx6Nl9PrGQSdHKUFVpVS0KCe/dzlKajADb3yWfiOexGYP9/v9AFTVxQ8fPURW5idqRHTLsSOe/KlO7kwAAQQQQAABBBDAaUIBcOTHH3+8tk+fPta2bdty//3388QTT9CvXz9mz57NoEGDeOmll7jzzjvp368vdvUYa79fgwhORYimsQ0LxULHpB/JzqqiTQoc2mYlvqWK7YdIOghL3bQIP1EpJW/iJOSRSdz1pz/xySef8Oijj1LjdPLCCy9w/Phxli1bxubNm7npptHs3LmT++67r6q4uPiB+gRf87tFHrijR3ZlcUXkiUMbeoVEpVjjW/eqF0dfUazEJF9AQlpvqMwkNexLEsJ3UFqZTEVNEiWlvVm3bhAZGd1Z91Mw1dVOFFGJzeYmyI6B4gEf/a83cfFFDBuWBQIObRBk/ygYeL8ELfR3Lc1DISdLYc8aC6v+bSVnhiT6UzcX5KvYrVCZAHkXKzguCie6Ry3fuU2Pa7HYgut5/0Cy94d32fz1C9VBwdGvt0ns+983v97hqkcGAQQQQAABBBBAAM2JbcXFxZFbtmy55O6771aSkpL429/+xhNPPEGbNm1ISEigT58+JCQksH//foZf8RvaJAlWLP0Et7UFwtJ4HxlCWMjZf5jUuKOUFAjKj1g5vs9Kr5JQWgnFVwRunyhQVaYFK/R5aRp3jB/Pu+++y6xZs5g1axbfr1lDeHg4EyZM4MYbb2Tw4MHExERz1113uXbt2jWjvhfT/Vag5y7Kct18W+/VlsqKtKzNi3smpF1MZCkYYE0AABPBSURBVEK7+inRFiuRCW1J6zWSpFZtsTlm07PlHNomrievuBOFpd3Jz7+ILVtGsWDB9Xz80VV8tiiFZd+6yc4qp7xcpaZG8NVXF5OcUsjQodkgBTkbBFk/CBKvsLNli42vF1tY/G/B9pcVqmaB+rZK6x/dJOaqRDgllQmCIwMFeRcJ3O1T6Hf7v7nomqeISe2KYrHV+/Lu0T0rWTlnHEHB4Z+0SOv050ETvqyoVwYBBBBAAAEEEEAAzY8Vx44dS1m9Zs3Fo0ePFhaLhX/961+kpqbSqVMnHA4HDz30EH/5y1/o1q0bN9xwA6OvH8aqL/9NbkENFns8NDKYnaMilbS4H1m1DELyLQyoiKCbYmtUEBUX8K2rmtndOjFt8WJatmrFc89NpW/fvnzxxRdcdtllLFu2jJ07dxISEkKPHj2Ijo5mxMiRcuPGjW8AD9U36GK967r9f1OCNvw462Mplesuv3MeLbtd0UBvMZKaqlL2rJnD/vUfcjxrPftz+7N+/yh2HhlKbtEF2mVDqfVVFXAcRCHIMGJjs4iPP8rQ2Pfon/UdUbkuHAKipCQeCAVUKWtbQ0B1tKC0BTjaC8qSFeLb9qbdxWO4YOA4goIjG/wOR3Z+y/I3f4fA9VXL7n8eNXTclKoGZBRAAAEEEEAAAQRwOhABvDZgwICbFy9ezJo1a9iwYQOFhYXMnz+ff//738ybN4+33noLhGDf3r307t2bN954k6kzFyBihmIJbozXM0lI5VJalnzDzcVR9FBstEDB7seTnnBIdfECLoY89QR3jh/P999/zz333MMjjzzKmDGjWb9+A1dddSUTJkxg6NChlJSUMGDAAMaMGcOaNWs+AO4BSutbbr1JLf/9KMN92/BWm1wVxZcU5e5KCY1pKaIS2jdAARVYrEHEt7mY1E6DiEzsQJR9D21jv6Zz8ue0S/6R8OBCbNYqbJYaVBmEqsYhZSqSeKoq21NQkE5/2w8MPbaRKNVNgpRECBBBUBMmqIoRlLYSnOihkH+hhaoe8UT06Eu3YX+m528fpFW3K7EGhTZMeZaSw7u+ZePiZ9Wq4iMbg6Pi77920qeBS4MBBBBAAAEEEMDZjBpgSU5OTt/Vq1e3mzhxIuXl5Rw6dIjw8HA2ZWYSFxfHLbfcwkMPPkhxcTGDBw+mT5/ejLx6AId2LOTggQOoSgSK1b/ozKdCUFVeTmlePgmuMobaght0efCI6uID4ebr3wzhxY8/ok1aGkuXLiU0NJS1a9dy+eVDefrpp7n7nrtJTU3lq6++4rnnniM+Pp5Ro0bJtWvXLgNuBcoaUHzDvVb/b8rFrSuL9n6Cxd778ns+oGXnoY30Wy5xO6soPr6PvANr2bN2HvkHfqDaFUJlTSxl1XE4yltSVNaS/NLWVFTHUuMM4fL4d+lfuhxhdVMdCTVh4AwTuILBFSRRrYKEtpfQuf9YktpeSlRSB7/DcXuvquTonpV8+/pocFVtCE/ocMMNT23KblymAQQQQAABBBBAAKcNkcD8Cy+88JrFixfTunVrnE4nY8aM4bLLLqNt27ZMmzaNjIwMgoODT3lw8+bNTHtxJst/Oo49cRCWoJh6FZwctITBcUvouDKOQYqd+tizj6pu3qypoGrYUO57/DF69uzJgQMHuOKKK7jpppuYMmUKf/7zn1m1ahUfffQROTk5HDt2jD59+hAVFcW1117L1q1b5wF/BErqVXEDGkVk+eCpjl1qyk+8qKry2ktu/Aed+t2ucYgbA6n/R1VpHicObcKRu5fivJ2UFuZQWZJLVdkJ3DWVSNWFBIRixRoUQkh4LMGRKYTHtiY66QKikjoS37oXIZFJIEQj2DWG2qku9v44n+8/nIDVYl1ij0x6aPSU7TsanXEAAQQQQAABBBDA6YUFmBYTEzPpiy++sFx66aXcddd4Lr98KH//+99ZuHAhF1xwamTCyspKvvlmKVdeOZyCggJmz36F/332PSVqR4KiOqLYInwWaqtay4i2H3DJqkT6CxvBPtKfUN1876zmq5gILhh9E/fefz+pqaknf1+yZAkvvvgi4+++m9Xffcett97KH//4J6KiIpFSMn/+++TkHOKaa65xFxUVTQceA9wNbrWmCHX55Zd/sjtWffxmdXnpje363mq/9IYXCQqJqnc+Eqgo2I8jaznFRzeQ1G0MsW2HIITQAp9oHjZkbVi/2u/Vk6+h/awxwKUh7LakovAgZcd3EtWyL/bw+Aa/trOqhB8/fZx9P75bYwsOX9iu95ix/UdPr2xQZgEEEEAAAQQQQABnHjbg9oiIiFefffZvlnvvvYcvvviCSZMmMXPmTEaNGnUyYV5eHuPGjWPPnj0sW7aM2Nj/b+/Og6Ms8wSOf/tId6e7cx/kIoDhMHSQ0yDuEoJEC1jQiMcqaCEgY8nIjloy7AxRwdqgBSkGS4dMEAaZUZDYrMMERFCHKJeEEEGJhEBC7oR00kc63enrfd/9I/HYcXZdxniM+3yqnn+7nvfpf371q98Ry9WrV0lISOD06UreOfwB1rKj9PgjMcZaCIsY/jdjLjnQQ47tLZb0tTEOzdfqiWWgKuTnLz4v9VGRjL97ATfNns2UgSxyUVERS5YsIS6uP3ft8/lYv349PT09DB06lJ07d7Jx40aqq6t5+OGH+f3vd/DMM09Lbrf7EeAPQPDbPtqgLB4/8ttcc9uVmud9fc5Hk8fM0uQ88DuMManXlPFVFIW68o10NZ2ipuowE+a/wPhZj6JSqVFQkHw9BJwXUan16OMtqNVfTgtU5BCyrxdUKtR683+bUS3LMu++NIuu1k+46Z4Srrvxrr8jE63gcbZx7PUVtF44LBuM0SXm+IzVd6w+fs1F54IgCIIgCD9COUDJvffee31hYSHBYJB169axatUqJk+ezKVLl1i6dCnLly+ntLSU7du3c+DAAV555RVOnDjBnj17mD17NlqtlvorV/i4qopPqy/S0OKktaOXq91eenpDoNGjUoWR7a3jJm89akWhFwUpKgr1kERU6UPRDktnZFYWEydNIuO6DEwmI8XFxWRmZpKbm8uSJUvIzc1l8eLFX1w+GAxy4MABysrKANi+fTuXL19mzZo1lJaW1gCPAB8O1mMNSgANcGTHQ4buxhOz3fb2LebY4ck33PYUo2564CuZ4G+i0G138Nn7v+HS8d9w64qjDB09EQBPdyNHX12ASqNHDvlIu342Y25Zhc4Yg9fRyMW/vEBv58f4fX0kW+4ic9avviglcbZf5HDxAgKhAENH5TB98TbU6muc8XzqdT45VIS7q64zMi7158mRNxy4+ck3ReZZEARBEISfkmHA8xaLJX/VqlXh+fn5mEwmmpubWbx4MeHh4cTHx9Pc3MyuXbtYsWIF1dXVfPjhh+Tl5WG1Wlm2bBkWi4X8/Hzmz59PMBjEbrfT3t6OJEn4fD76+vqQZRm1Wk14eDhmsxmdTkdCQgIOhxNFkXnrrbc4f/48vb29WK1WsrOzMRpNlJSU0NjYwLZt23jjjTdQq9VIkoRKpWL9+vUMGTKE/Px8Dh06xMaNG/uqq6v/BPwKGNRetUFbO75z39lQaXl3zdL7p7/We7U280qVdbjXbdNEJmSgN8UOlFz8b1TotWrO7HsKc+QIMm9ZiV6vR5FlLp0upfbMfkbNfgl9rIXq8hdJGnUL5phUqo9s4WLVfhIm/pKAEk7TJ/tIs/wLBlMMiqJw6eSreHwSEbHXYas/wpibl6MN++ZZz4oi09N5mTP7n+PMvqcDstz3XsrIqXPnr644JZakCIIgCILwE+QCymw2W2tZWdn4hoaG6LFjx5KUlMTUqVP5xS8eJzIygvLycsaOHcuhQ4ewWCy0trbi9XqJiIggFAoxa9Ys1q9fz5w5c4iNjaWjo4OlS5dSUVGBTqfjvvvu4+DBg7zzzjtUVVWRk5PD2rVrueOOOygq2khHRweBQIBjx45RWFhIamoqL774IoWFhRQUFPDoo4+yd+9eXC4XO3bswO12M3HiRHJzcwkPD6egoIDnn3++8erVq/8OPAfYB/uhvu3Sl6+54/H3rxoShi0xxiQvu3xy56XDxXeGPrKuoqfrCrIU+ptzqhVFRg70Ym85h8tWz5CsOwkP7y8pl2UZSQaNWiJC3YFZ6yQUChIIBEBR8Pn8qFBIjAsnKSWdUMBHT3cbACG/h+aa90kaPoGkYVl4e7uoO74JKfg/x7+yFMLd1cCpvb/k8Jb80OUTOy6bY5OXG+KHP3jbynfbBvu9BEEQBEEQfkQCwHZJkibs3r172/jx492FhYVERUWh04WRk5PD9OnT2b9/P/PmzWPevHmsW7eOBx98kEOHDjF37lzuv/9+Zs6cSXl5OQBNTU2kpqayZcsWysr2Y7VaOXnyJHl5eaxZs4aUlBT27t3LihUrSEtLw2azsWbNGsaNG0dzczM+nw+/38/mzZux2x2sXLmSGTNmsGfPHnJycli4cCH19fWsXr2a8ePHu3fv3r1NkqQJwPaB7xl0g7F2/Gvu/fXHNgVe/8/nLFe8rs7HLpRvub2rqco45uYlZNx4D5q/mhvo77Vx5aMSvO4uNFoj8cNuRKPpv5pKrSZhxM0MSbPQebaEUCiE3hCNVhcOKohPn0xX7T4aTmwgLEyHHPIS8PUvAvR7XXjsTfhMFfQFOtGooeHTd0nPXok56usjV6SQj/pKKxdP7KCz7rhPHx7x58gh1710Z8G54yqarmlDjSAIgiAIwj8wJ/AzSZKKNmzYsLmkpOTWZcuWaR577DFeeOEFGhsbMRqNuN1uDAYD06ZNo6CggA0bNuB0OqmsrGTRokUAdHR0kJaWRnp6OgsX3s/Zs2fp6+vj2WefJTU1lbKyMlJSUrDZbLz22mvEDjQHZmVlcfp0JTNnzkStVrN161ZSUlIoLS1lxowZPPXUUzQ3N7Ny5Up27doluVyud4HHgdpr3Sx4rQY9A/05FSh3PVN9/IGiny9KHHXjdHtLVcXR15Z7rOsmUlf5Jr2OFhSlf4qGJKuQQgoddaeIjjLjqdlCwOPo/x0VxCUNI/POVzFN2oBXl0VM6gSMUcmoVGpSMmeROX8biROeRJ18LxpDIhp9/0hujc7EsLG3EJl4PZHXr8CckIUx3kJY+JcjuxVFxuNspf6Mlb3PTeboH5d57E2VlUkjp03XTd2ycEHBuWOq7/hPEARBEARB+BFSgIvAHJfLNW7Tpk2lGRkZ7ry8Wzl79ix6vZ4RI0ZQU1ODyWRi9OjR5OXlMXnyZCZNmsTEif29bG1tbcTFxWO323nvvfdIT09Hp9OxefNmDh48iNlsxmQyU1JSQnJyMh+dPEkoFGLKlCnU1l5Eo9Xy9NNPk56ejlarZd68eVRWVjJ79hwyMjLcxcXFf3S5XOOAOQP3/c7jtkFrIvwmpZumxQZtbTeF/O4HFCk0wxgzdMiQjH/SDB9/O5GJo1F0sXhcXbhtl+mzNzLm5kWYIqII+jxcOb0T2XsFv9dNS+0pRs4qZPi4Wej1egIeJ7aG44SCPhqrXsfT6yf7X0uIG5KGLMv0OO3IqNGFhdFWexStzkx65lS8zlZcHTU0nP0zV+uOSx5HS6dKqz2q00f+QW+O/2jBryu6v6+3EQRBEARB+AegBtKBezQazSOpqakZubkzufvuu5g7dy4ajQa73U4wGCQ+Ph6Npr/VrqioiK1btxIMBpk+fTovv/wyixYt4vz58+j1ep544gmsVivFxcVERUVhtVp56KGH0Gq19PT0EBcXhyRJvP3221iteykvP0Jra2udJEklwJsDDYLfa7LzewugP3fkyBGt7YPH5vp7O28PBfoWKIoSE5c+maFZc0kelUNUsgVJ7u/K1Gg0BAN+WmuP03zuTyiKhDnRQsbURURGRqJSqXB3t1Hz/n8Q7KnFJ0WRmHUfo6bcjl7/1a3qCooCvr5eulvO0VV/jObz79DVeAaVSnHq9Oa3dMbofSNuf/LtKVMe+dazAQVBEARBEH7idEA2MA+YGRMTMzk7O1szdepUxo27gczMTEaOzPireOxLDoeDYDCIwWDAZDJ9EWwD+P1+Ll+u48KFC3z66SecOnWKiooKyeFwnAGOAPuBiu+qvvn/4nsPoD+nKKg+e3Nt2MUL1hk+T/eMUMh/W9DvnaDW6LTRSWOIT79RFZ1iITppFKaYdNS6KDRhRsJ0evR63RdXl6QQTmcPXq8XozEcs9mEmhB9PR24uxtxtl/E0f4ZXU2VirO9BjnkD+kMpk80Wt3hMGNc+YTsn30wcs6/BVQqUaYhCIIgCILwd4gGRg8E1Ldptdp/jomJiUlISCA1NZWUlBQSExNJSEggNjb2i4BZkiQ8Hg92ux2bzUZnZyctLS20t7djs9lwOByOUCh0FHh3IGCuHajN/sH9YAH0V53YdE94R0/t0ECfKzMo+aZJks+iBAPDNDpzos4YGR2mj9DrDBHoTQloDREYzLFotDo0Wh0KIAX9hIJ+Ah4nwUAvgd5OAr5egn63P9Dncsn+3k6VRteg0Rk+C9MaThqMkRcSTGOaxCxnQRAEQRCEQacFhgKjBko+UoAEIAYwAYaBchAZ8AEewAHYgJaBcwloBn6Uo4N/FAH05xRQoUB5+VpNz7kPMkLuznE+tyNDkeV0RfanQViaQjBSkeVYWZYMsoQaFNQalaxWawMqtaoLtD0qQi1qjb5ZhbrFEBVdpzPFnzdNuOVSbu5aCVV/g+MP/a2CIAiCIAj/D2kGzucBtDRwBEEQBEEQBEEQBEEQBEEQBEHgvwDBNy4/uRImkwAAAABJRU5ErkJggg==",
        width: 595, // Width of the image in PDF units (A4 page width)
        height: 80, // Height of the image in PDF units
        alignment: "center",
        margin: [0, 20],
      },
    ],
  };
  var docDefinition = {
    content: [
      headerImage,
      h1,
      {
        text: year,
        alignment: "center",
        margin: [0, 10, 0, 40],
        fontSize: 12,
      },
      {
        // layout: "lightHorizontalLines", // optional
        table: {
          widths: [240, "auto", 150, "*"],

          body: [
            [
              `Name : ${certContent.name}`,
              `Course :${certContent.course} `,
              `Year Level : ${certContent.yrLvl}`,
              `Campus : ${certContent.campus}`,
            ],
            ["", "", "", ""],
            ["", "", "", ""],
            ["", "", "", ""],
            ["", "", "", ""],
            [
              `Contact No.: ${certContent.Contact}`,
              `Complete Address : ${certContent.address}`,
              "",
              "",
            ],
          ],
          // Set the noBorders property to true
          // to remove the borders of the table
        },
        layout: "noBorders",
        fontSize: 14,
        margin: [0, 0, 0, 50],
        bold: true,
      },
      {
        text: "I certify that the mentioned name above is medically qualified to enroll for the 1st semester of",
        alignment: "center",
        fontSize: 18,
        margin: [0, 10, 0, 30],
      },
      {
        text: year,
        alignment: "center",
        fontSize: 18,
        margin: [0, 0, 0, 50],
      },

      {
        columns: [
          {
            text: `Remark: ${certContent.Remark}`,
            bold: true,
          },
          [
            {
              text: `${certContent.Nname}`,
              alignment: "center",
              bold: "true",
            },
            {
              text: "_________________________________________________",
              alignment: "center",
              bold: "true",
            },
            {
              text: "University Nurse",
              alignment: "center",
              bold: "true",
            },
          ],
          [
            {
              text: "23819126339123",
              alignment: "center",
              margin: [0, 0, 0, 10],
            },
            {
              qr: "text in QR",
              fit: "80",
              alignment: "center",
              margin: [10, 0, 0, 100],
            },
          ],
        ],
      },
    ],

    pageSize: "legal",
    pageOrientation: "landscape",
    pageMargins: [30, 25, 30, 10],
    style: {
      fontSize: 14,
      font: "Courier",
    },
  };
  const pdfDoc = pdfMake.createPdf(docDefinition);

  // pdfDoc.open();
  return pdfDoc;
}