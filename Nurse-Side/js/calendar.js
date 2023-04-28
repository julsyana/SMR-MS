function updateCalendar() {
    var today = new Date();
    var month = today.getMonth();
    var year = today.getFullYear();
    var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    var monthName = monthNames[month];
    var daysInMonth = new Date(year, month + 1, 0).getDate();
    var firstDayOfMonth = new Date(year, month, 1).getDay();
    var lastDayOfMonth = new Date(year, month, daysInMonth).getDay();
    var calendarBody = document.getElementById("calendar-body");
    calendarBody.innerHTML = "";
    var date = 1;
    for (var i = 0; i < 6; i++) {
      var row = document.createElement("tr");
      for (var j = 0; j < 7; j++) {
        var cell = document.createElement("td");
        if ((i === 0 && j < firstDayOfMonth) || (i === 5 && j > lastDayOfMonth)) {
          var textNode = document.createTextNode("");
          cell.appendChild(textNode);
        } else if (date > daysInMonth) {
          break;
        } else {
          var textNode = document.createTextNode(date);
          if (date === today.getDate() && month === today.getMonth() && year === today.getFullYear()) {
            cell.classList.add("table-success");
          }
          cell.appendChild(textNode);
          date++;
        }
        row.appendChild(cell);
      }
      calendarBody.appendChild(row);
    }
    document.getElementById("month-year").innerHTML = monthName + " " + year;
  }
  setInterval(updateCalendar, 1000); // Update the calendar every second