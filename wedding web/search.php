<?php
include('db_connect.php'); // Include the database connection script.

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $card_NO = $_POST['card_NO'];

    $sql = "SELECT NAME FROM invitees_real WHERE card_NO = '$card_NO'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['NAME'];
        echo '<div id="result">Name: ' . $name . '</div>';
    } else {
        echo '<div id="result">Person not found in the database.</div>';
    }
}
?>
