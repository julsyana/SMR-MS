$(document).ready(function() {
    setInterval(function() {
      var time = new Date().toLocaleTimeString();
      $('#time-display').text(time);
    }, 1000);
  });