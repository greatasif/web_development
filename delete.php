<?php
include 'crud.php';
 
if(isset($_GET['id'])){
$id = $_GET['id'];

$sql = "DELETE  FROM student_data WHERE id=$id";

if( $conn->query($sql) === TRUE){
    echo "Record Deleted Successully";


}else{
    echo "Error Deleting Record:" . $conn->error;

}
echo $conn->close();

header("Location: readtable.php");
exit();

}else{
    echo "No ID Paramater Provided";
}


?>
