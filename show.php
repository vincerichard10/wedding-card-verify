<?php 
include('db_connect.php'); 


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $name = $_POST['name'];
   $cardNumber = $_POST['reservation']; 

    $sql = "INSERT INTO guest (name, reservation)VALUE ('$name','$cardNumber')";
    $result = $conn->query($sql);

   


   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method = "POST">
        <label>name</label>
        <input name = "name" type = "text" >
        <label>reservation</label>
        <input name = "reservation" type = "text">
        <button type = "submite"> create</button>

</form>

</body>
</html>