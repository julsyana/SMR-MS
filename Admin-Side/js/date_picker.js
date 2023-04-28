$("#date-picker").flatpickr({
  mode: "multiple",
  dateFormat: "Y-m-d", 
  inline: true,
  onChange: function(selectedDates, dateStr, instance) {
  }
});

$("#date-picker_view").flatpickr({
  mode: "multiple",
  dateFormat: "Y-m-d", 
  inline: true,
  PointerEvent: false,
  onChange: function(selectedDates, dateStr, instance) {
  }
});

$("#date-picker_edit").flatpickr({
  mode: "multiple",
  dateFormat: "Y-m-d", 
  inline: true,
  onChange: function(selectedDates, dateStr, instance) {
  }
});