<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="formtt.css"> -->
</head>
<body>
    
<div class ="container mt-5">

<h2 class = "mb-4 text-center"> Student Information</h2>
<a href="edit.php" class = "btn btn-success mb-4"> Add New Student</a>
<table class = "table table-bordered  bg-info" >
    <thead class = "bg-primary" id = "table">
        <tr>
            <th>ID</th>
            <th>Full_Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Actions</th> <!-- New coulom add-->
            
        </tr>

    </thead>
<tbody>
    <?php
    include "crud.php";
// $servername="localhost";
// $username="root";
// $password="";
// $database="data_form";




// $conn = new mysqli($servername, $username , $password, $database);
// if($conn->connect_error){
//     die("Connection Failed:" . $conn->connect_error);
// }else{
//     // echo "Connected Successfully";
// }

$sql = "SELECT * FROM `student_data`";
$result = $conn -> query($sql);

if ($result -> num_rows > 0 ){
    while ($row = $result -> fetch_assoc() ){
        // echo "ID" . $row ["id"]. "(Full_Name) ". $row ["Full_Name"]. "(Email)" .$row ["Email"]. "(Contact)" . $row ["Contact"]. "<br>";
        echo '<tr>';
        echo '<td> '.  $row ["id"]. '</td>';
        echo '<td> '.  $row ["Full_Name"]. '</td>';
        echo '<td> '.  $row ["Email"]. '</td>';
        echo '<td> '.  $row ["Contact"]. '</td>'; 
        echo '<td> ';
        echo '<a href="update.php?id=' . $row["id"] . '" class="btn btn-warning btn-sm">Update</a> ';
        echo '<a href="delete.php?id=' . $row["id"] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Are You Sure You Want to delete This record?\')">Delete</a> ';
        echo '</td>';
        
        echo '</tr>';
    }
}   else{
    echo '<tr><td> colspan = "4">No result Found </td></tr>';
}
    $conn-> close();

    ?>
</tbody>
</table>


</div>



</body>
</html>