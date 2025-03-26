<?php 
include 'db.php';
$id = $_POST['id'];
$dep = $_POST['dep'];
$trm = $_POST['trm'];
$user = $_SESSION['ID'];

$sql = "UPDATE program SET DEPARTMENT='$dep',TERM='$trm' WHERE PROGRAM_ID='$id'";
mysqli_query($conn, "INSERT into history_log (transaction,user_id,date_added) 
		VALUES ('updated $id in the curriculum list','$user',NOW() )");

if (mysqli_query($conn, $sql)) {
	header("location:".$_SERVER['HTTP_REFERER']);

} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);

 ?>