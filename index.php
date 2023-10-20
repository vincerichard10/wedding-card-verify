<?php
include('db_connect.php'); // Include the database connection script.

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $card_NO = $_POST['card_NO'];
    $reservation = $_POST['reservation'];

    $sql = "SELECT name FROM guest WHERE cardNo = '$card_NO'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $name = $row['name'];
      if (array_key_exists('reservation', $row)) {
      
        echo '<div id="result">Name: ' . $name . '</div> </br>';
       
    } else {
        echo '<div id="result">Name: ' . $name . '</div> </br>';
        echo '<div id="result">Reservation: Data not available</div> </br>';
    }}}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="css/searchbar.css" />
    <script src="script.js" type="javascript"></script>
  </head>
  <body>
    <form method="post" class="search-bar">
      <input type="search" name="card_NO" id="searchBtn" pattern=".*\S.*" required
      />
      <button class="search-btn" id="press" type="submit">
        <span>Search</span>
      </button>
    </form>
    <div id="result"></div>

    <!-- <script>
      document.addEventListener("DOMContentLoaded", function () {
        const cardNumberInput = document.getElementById("searchBtn");
        const searchButton = document.getElementById("press");
        const resultDiv = document.getElementById("result");

        searchButton.addEventListener("click", function () {
          const cardNumber = cardNumberInput.value;

          // You can validate the cardNumber here.

          // Send a request to the server (search.php) to retrieve the name.
          fetch("search.php", {
            method: "POST",
            body: new URLSearchParams({ card_NO: cardNumber }),
            headers: {
              "Content-Type": "application/x-www-form-urlencoded",
            },
          })
            .then((response) => response.json())
            .then((data) => {
              if (data.success) {
                resultDiv.innerHTML = "Name: " + data.name;
              } else {
                resultDiv.innerHTML = "User not found.";
              }
            });
        });
      });
    </script> -->
  </body>
</html>
