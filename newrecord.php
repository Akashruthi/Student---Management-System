 	<?php

include 'db.php';

$id = $_POST['id'];
$test_term=$_POST['test_term'];

$a = $_POST['action'];
$subject = $_POST['subj'];
$internal = $_POST['internal'];
$external = $_POST['external'];
$total= $_POST['total'];



$last_id = mysqli_insert_id($conn);
$sc= count($subject);
       for($w=0;$w < $sc;$w++){
				if($subject[$w] != ''){
				mysqli_query($conn,"INSERT INTO total_grades_subjects (STUDENT_ID, SUBJECT, INTERNALS, EXTERNALS,TOTAL,PASSED_FAILED)
				VALUES('$id', '$subject[$w]', '$internal[$w]', '$external[$w]', '$total[$w]','$a[$w]')");
				
			}else{

			echo "Record not insert successfully ";
            
			}
			
		

		

		
			 
			
			header('location:rms.php?page=records');

		}
		mysqli_close($conn);
?>