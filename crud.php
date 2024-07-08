<?php



$servername="localhost";
$username="root";
$password="";
$database="data_form";




$conn = new mysqli($servername, $username , $password, $database);
if($conn->connect_error){
    die("Connection Failed:" . $conn->connect_error);
}else{
    // echo "Connected Successfully";
}

// $sql = "SELECT * FROM `student_data`";
// $result = $conn -> query($sql);

// if ($result -> num_rows > 0 ){
//     while ($row = $result -> fetch_assoc() ){
//         echo "ID" . $row ["id"]. "(Full_Name) ". $row ["Full_Name"]. "(Email)" .$row ["Email"]. "(Contact)" . $row ["Contact"]. "<br>";
//     }
// }   else{
//     echo "0 Results";
// }

?>