<?php
include 'crud.php';




if ($_SERVER["REQUEST_METHOD"]  == 'POST' ){
    $Full_Name = $_POST ['Full_Name'];
    $Email = $_POST ['Email'];
    $Contact = $_POST ['Contact'];

    function test_input($data){
      $data = trim($data);
      $data = stripcslashes($data);
      $data = htmlspecialchars($data);
      return $data;
  }

$sql = "INSERT INTO student_data (Full_Name , Email , Contact) VALUES ('$Full_Name' , '$Email' , '$Contact')";

if( $conn->query($sql) === TRUE){
    echo "New record created successully";


}else{
    echo "Error:" . $sql . "<br>" . $conn->error;
}
$conn->close();
header("Location: readtable.php");
exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="formtt.css">
</head>
<body>


<form class="form-inline" id= "formmt" action="edit.php" method ="post">
  <div class="form-group">
  <label for="Full_Name">Full name:</label><br>
    <input type="text" class="form-control" name="Full_Name"  id="Full_Name">
    <br><br>
  <label for="email">Email address:</label><br>
    <input type="email" class="form-control" name="Email" id="email">
    <br><br>
    <label for="Contact">Contact:</label><br>
    <input type="text" class="form-control" name="Contact" id="Contact">
  <br><br>
    <button type="submit" class="btn btn-default" id="btn">Submit</button>
</div>
  
  

</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>

