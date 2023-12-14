<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Get Checkbox Value</title>
</head>
<body>

  <label for="myCheckbox">Check me:</label>
  <input type="checkbox" id="myCheckbox" onclick="getCheckboxValue()">
  <button >Get Checkbox Value</button>

  <script>
    function getCheckboxValue() {
      // Mendapatkan elemen checkbox berdasarkan ID
      var checkbox = document.getElementById("myCheckbox");

      // Mendapatkan nilai checkbox (true jika dicentang, false jika tidak)
      var checkboxValue = checkbox.checked;

      // Menampilkan nilai checkbox
        console.log("Checkbox Value: " + checkboxValue);
    }
  </script>

</body>
</html>
