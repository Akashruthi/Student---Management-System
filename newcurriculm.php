<?php 

	include 'db.php';
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$errors = array();

	if(preg_match("/\S+/", $_POST['dep']) === 0){
		$errors['dep'] = "* Department is required.";
	}
	if(preg_match("/\S+/", $_POST['trm']) === 0){
		$errors['trm'] = "* Term is required.";
	}
	if(count($errors) === 0){
	$dep=$_POST['dep'];
	$trm=$_POST['trm'];
	$user = $_SESSION['ID'];
	if(empty($_POST['id'])){
		$sql=mysqli_query($conn, "INSERT into program (DEPARTMENT,TERM) VALUES ( '$dep', '$trm')");
	}else{
		$sql=mysqli_query($conn, "UPDATE program set DEPARTMENT='$dep',`TERM`='$trm' where PROGRAM_ID = ".$_POST['id']);
	}
	if ($sql){
		echo "<script>
		alert('New program successfully saved');
		window.location.href='rms.php?page=program';
		</script>";

	} else {
		echo "<script>
		alert('New program failed to record!" .$sql."');
		window.location.href='rms.php?page=program';
		</script>";

	}

}
}	

	mysqli_close($conn);

 ?>