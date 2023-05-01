<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <label for="option">Select an option:</label>
        <select id="option" name="option">
            <option value="None">None</option>
            <option value="Batasan">Batasan</option>
            <option value="San Bartolome">San Bartolome</option>
            <option value="San Francisco">San Francisco</option>
        </select>
<script>
    // Get a reference to the selection element
var option = document.getElementById("option");

// Add an event listener to detect when the user selects an option
option.addEventListener("change", function() {
  // Get the selected option
  var selectedOption = option.value;
  
  // Send an AJAX request to the PHP script
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "insert.php");
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send("option=" + selectedOption);
});

</script>
</body>
</html>