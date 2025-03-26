<?php 

	include 'db.php';
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$errors = array();

	if(preg_match("/\S+/", $_POST['sy']) === 0){
		$errors['sy'] = "* School Year is required.";
	}
	
	if(count($errors) === 0){


	$sy=$_POST['sy'];
	$total=$_POST['total'];
	$user = $_SESSION['ID'];
	
	if($_POST['id'] == ""){

	if ($sql=mysqli_query($conn, "INSERT into college_academic_year (college_academic_year,total_no_of_years, status) 
		VALUES ( '$sy','$total', 'No' )") && $sql2=mysqli_query($conn, "INSERT into history_log (transaction,user_id,date_added) 
		VALUES ('added $sy in the school year list','$user',NOW() )") ){
	echo "<div class='erlert-success col-sm-12 col-sm-offset-2' style='width:300px;z-index:1000;position:fixed;left:500'><center><h4>New Academic Year Successfully Added.</h4></center></div>";
	echo "<script>
	setTimeout(function(){	window.location.href='rms.php?page=college_academic_year';  }, 2000);</script>";
	} else {
		echo "<script>
		alert('New subject failed to record!" .$sql."');
		window.location.href='rms.php?page=college_academic_year';
		</script>";
		unset($_POST);

	}
	}else{
		$id=$_POST['id'];
		$status=$_POST['status'];
		$sql = "UPDATE college_academic_year SET college_academic_year='$sy',status='$status' WHERE AY_ID='$id'";
		$sql2 = mysqli_query($conn,"UPDATE college_academic_year SET status='No' WHERE AY_ID != '$id'");
		if($status == 'Yes'){
			$query = mysqli_query($conn,"SELECT * FROM college_academic_year where AY_ID = '$id' ");
			$data = mysqli_fetch_assoc($query);
			$s_y= $data['college_academic_year'];
		$sql3=mysqli_query($conn, "INSERT into history_log (transaction,user_id,date_added) 
		VALUES ('updated $s_y as the current school year ','$user',NOW() )");
	}

		if (mysqli_query($conn, $sql)) {
			echo "<div class='erlert-success col-sm-12 col-sm-offset-2' style='width:300px;z-index:1000;position:fixed;left:500'><center><h4>Current College Year Successfully Updated.</h4></center></div>";
			echo "<script>
			setTimeout(function(){	window.location.href='rms.php?page=college_academic_year';  }, 2000);</script>";

		} else {
    echo "Error updating record: " . mysqli_error($conn);
		}
	}
}else{
	echo "<script>setTimeout(function(){	$('.erlert').hide()  }, 3000);</script>";
}

}

	mysqli_close($conn);

 ?>