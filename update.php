<?php
include 'crud.php';

if ($_SERVER["REQUEST_METHOD"]  == 'POST' ){
    $id= $_POST ['id'];
    $Full_Name = $_POST ['Full_Name'];
    $Email = $_POST ['Email'];
    $Contact = $_POST ['Contact'];

    function test_input($data){
      $data = trim($data);
      $data = stripcslashes($data);
      $data = htmlspecialchars($data);
      return $data;
  }

$sql = "UPDATE student_data SET Full_Name = '$Full_Name', Email = '$Email' , Contact = '$Contact' WHERE id =$id";

if( $conn->query($sql) === TRUE){
    echo "Record Update Successully";


}else{
    echo "Error Updating Record:" . $conn->error;
}
$conn->close();

header("Location: readtable.php");
exit();
} else{
    if(!isset ($_GET['id'])){
        echo "No ID Parameter Provided";
        exit();   
    }
    $id = $_GET['id'];
    $sql = "SELECT * FROM student_data WHERE id =$id";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $Full_Name = $row['Full_Name'];
        $Email = $row['Email'];
        $Contact = $row['Contact'];
    } else{
        echo "No Record  Found";
        $conn->close();
        exit();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="formtt.css">
</head>
<body>

<!-- <div class="container mt-3"> -->
    

<form class="form-inline" id= "formmt" action="update.php" method ="post">
<input type="hidden" name="id" value=  "<?php echo $id; ?>" >  
<div class="form-group">

  <label for="Full_Name">Full name:</label><br>
    <input type="text" class="form-control" name="Full_Name"  id="Full_Name" value=  "<?php echo $Full_Name; ?>" required>
    <br><br>

  <label for="email">Email address:</label><br>
    <input type="email" class="form-control" name="Email" id="email" value=  "<?php echo $Email; ?>" required>
    <br><br>

    <label for="Contact">Contact:</label><br>
    <input type="text" class="form-control" name="Contact" id="Contact" value=  "<?php echo $Contact; ?>" required>
  <br><br>

    <button type="submit" class="btn btn-default" id="btn">Update User</button>
    <a href="readtable.php" class="btn btn-default" id="cnn"> Cancel</a>
    <!-- <br><br>
    <button type="submit" class="btn btn-default">Cancel</button>
    <a href="readtable.php" class="btn btn-default" ></a> -->

</div>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
</body>
</html>