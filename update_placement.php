<?php
error_reporting(0);
if($_SERVER['REQUEST_METHOD'] == 'POST'){
//Student personal details
$id=$_POST['id'];
$rn=$_POST['lrn'];
$letter=$_FILES['letter'];
$status=$_POST['status'];
$company=$_POST['company'];
$fn=$_POST['fname'];
$ln=$_POST['lname'];


include 'db.php';
$fname=$_FILES['letter']['name'];
$ext=strtolower(end(explode('.',$fname)));
if($ext=='pdf'){
	$dir='callletter';
	$newfname=$rn. '.'.$ext;
	$letter_path=$dir.'/'.$newfname;

	move_uploaded_file($_FILES['letter']['tmp_name'],$letter_path);

			
	$sql = "UPDATE student_placement_letter
	SET
	STUDENT_ID='$id',
	LETTER='$letter_path' WHERE STUDENT_ID='$id'";
	$result=$conn->query($sql);
		if ($result) {
			$sql1 = "UPDATE student_placement
			SET
			STUDENT_ID='$id',
			RN_NO='$rn',
			FIRSTNAME='$fn',
			LASTNAME='$ln',
			STATUS='$status',
			COMPANY='$company' WHERE STUDENT_ID='$id'";
		
		$result=$conn->query($sql1);
				if ($result) {
				
					
						echo   "<div id='message' class='erlert-success'><center><h4>" . "Data Successfuly updated." . "</h4></center></div>";
						"<script>
						setTimeout(function(){ $('#message').hide)();  }, 2000); 
						</script>";
						} else {
							"<script>
							alert('Failed to Submit.');
							 location.replace(document.referrer);
							</script>";
						}
				} else {
					"<script>
					alert('Failed to Submit.');
					 location.replace(document.referrer);
					</script>";
				}

}
			else{
				$sql5 = "UPDATE student_placement_letter
				SET
				STUDENT_ID='$id',
				LETTER='NILL' WHERE STUDENT_ID='$id';

				UPDATE student_placement
	SET
	STUDENT_ID='$id',
	RN_NO='$rn',
	FIRSTNAME='$fn',
	LASTNAME='$ln',
	STATUS='$status',
	COMPANY='$company' WHERE STUDENT_ID='$id'
	";
			
$result1=$conn->multi_query($sql5);
if ($result1) {

	
		echo   "<div id='message' class='erlert-success'><center><h4>" . "Data Successfuly Inserted." . "</h4></center></div>";
		"<script>
		setTimeout(function(){ $('#message').hide)();  }, 2000); 
		</script>";
		} else {
			"<script>
			alert('Failed to Submit.');
			 location.replace(document.referrer);
			</script>";
		}

}
}
mysqli_close($conn);

  ?>

		

		
		

			
		
