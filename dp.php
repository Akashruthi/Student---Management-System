<?php
include 'db.php';
 
 $id = $_POST['id'];
$sql = "DELETE FROM student_info WHERE STUDENT_ID='$id'";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
  header('Location: rms.php?page=Students');
} else {
  echo "Error deleting record: " . $conn->error;
}
  $sql1="DELETE From student_bank where STUDENT_ID = '$id'";
  if ($conn->query($sql1) === TRUE) {
  
} else {
  
}
  $sql2="DELETE From student_schoolinfo_sslc where STUDENT_ID = '$id'";
  if ($conn->query($sql2) === TRUE) {
  
} else {
  echo "Error deleting record: " . $conn->error;
}
  $sql3="DELETE From student_schoolinfo_hsc_iti where STUDENT_ID = '$id'";
  if ($conn->query($sql3) === TRUE) {
  
} else {
  
}
  $sql4="DELETE From student_address_pmt where STUDENT_ID = '$id'";
  if ($conn->query($sql4) === TRUE) {
  
} else {
  
}
  $sql5="DELETE From student_address_communication where STUDENT_ID = '$id'";
  if ($conn->query($sql5) === TRUE) {
  
} else {
  
}
  $sql6="DELETE From student_father_guardian where STUDENT_ID = '$id'";
  if ($conn->query($sql6) === TRUE) {
  
} else {
  
}
  $sql7="DELETE From student_mother where STUDENT_ID = '$id'";
if ($conn->query($sql7) === TRUE) {
  
} else {
  
}


 
mysqli_close($conn);

  ?>