<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
//Student personal details
$id=$_POST['id'];
$rn=$_POST['lrn'];
$pp=$_FILES['profilepic'];
$fn=$_POST['fname'];
$ln=$_POST['lname'];
$gender=$_POST['gender'];
$dob=$_POST['dob'];
$rel=$_POST['religion'];
$comm=$_POST['comm'];
$cn=$_POST['cn'];
$mot=$_POST['mot'];
$bg=$_POST['bg'];
$nat=$_POST['nn'];
$aadhar=$_POST['anum'];
$num=$_POST['num'];
$email=$_POST['email'];
$prog = $_POST['prog'];
$term = $_POST['term'];
$user = $_SESSION['ID'];

//Bank Details
$bn=$_POST['bn'];
$bb=$_POST['bb'];
$acnum=$_POST['acnum'];
$ifsc=$_POST['ifsc'];

//School Details SSLC
$ns1=$_POST['ns1'];
$mark10=$_POST['10mark'];
$per10=$_POST['10per'];
$yop10=$_POST['10yop'];

//School Details HSC
$ns2=$_POST['ns2'];
$mg=$_POST['mg'];
$mp=$_POST['mp'];
$mt=$_POST['mt'];

//permanent address
$pa=$_POST['pa'];
$pin=$_POST['pin'];

//communication address
$al=$_POST['al'];
$pinl=$_POST['pinl'];

//Father
$fan=$_POST['fan'];
$do=$_POST['do'];
$fnum=$_POST['fnum'];
$ai=$_POST['ai'];

//Mother
$mn=$_POST['mn'];
$mdo=$_POST['mdo'];
$mnum=$_POST['mnum'];
$mai=$_POST['mai'];

include 'db.php';
$fname=$_FILES['profilepic']['name'];
$ext=strtolower(end(explode('.',$fname)));
if($ext=='jpg'||$ext=='png'||$ext=='jpeg'){
	$dir='profilepic';
	$newfname=$rn. '.'.$ext;
	$profilepic_path=$dir.'/'.$newfname;

	move_uploaded_file($_FILES['profilepic']['tmp_name'],$profilepic_path);

			
			$sql = "UPDATE student_info set
			 PROFILEPIC='$profilepic_path'
			 where STUDENT_ID = '$id'";
			 $result=$conn->multi_query($sql);
			 if ($result) {
			 
				 
					 echo   "<div id='message' class='erlert-success'><center><h4>" . "Image Successfuly updated." . "</h4></center></div><br><br>";
					 "<script>
					 setTimeout(function(){ $('#message').hide)();  }, 2000); 
					 </script>";
					 } else {
						 "<script>
						 alert('Failed to Submit.');
						  location.replace(document.referrer);
						 </script>";
					 }}
			 $sql1 = "UPDATE student_info set 
			 RN_NO='$rn',
			 FIRSTNAME='$fn',
			 LASTNAME='$ln',
			 GENDER='$gender',
			 DATE_OF_BIRTH='$dob',
			 RELIGION='$rel',
			 COMMUNITY='$comm',
			 CASTE_NAME='$cn',
			 MOTHER_TONGUE='$mot',
			 BLOOD_GROUP='$bg',
			 NUMBER='$num',
			 EMAIL='$email',
			 NATIONALITY='$nat',
			 AADHAR='$aadhar',
			 DEPARTMENT='$prog',
			 TERM='$term'
			 where STUDENT_ID = '$id';
			 
			 UPDATE student_bank set
			 RN_NO='$rn',
			 BANK_NAME='$bn',
			 BRANCH='$bb',
			 ACC_NUM='$acnum',
			 IFSC='$ifsc'
			 where STUDENT_ID = '$id'; 
			 
			 UPDATE student_bank set
			 RN_NO='$rn',
			 BANK_NAME='$bn',
			 BRANCH='$bb',
			 ACC_NUM='$acnum',
			 IFSC='$ifsc'
			 where STUDENT_ID = '$id'; 
		
            UPDATE student_schoolinfo_sslc set
             RN_NO='$rn',
			 SCHOOL_NAME='$ns1',
			 10TH_MARK='$mark10',
			 10TH_PERCENTAGE='$per10',
			 10TH_YOP='$yop10'
			 where STUDENT_ID = '$id';
		
		
		


	
			UPDATE student_schoolinfo_hsc_iti set
			 
			 RN_NO='$rn',
			 SCHOOL_ITI_NAME='$ns2',
			 12TH_ITI_MARK='$mg',
			 12TH_ITI_PERCENTAGE='$mp',
			 12TH_ITI_YOP='$mt'
			 where STUDENT_ID = '$id'; 
		
		
		


			UPDATE student_address_pmt set
			 
			 RN_NO='$rn',
			 ADDRESS='$pa',
			 PINCODE='$pin'
			 where STUDENT_ID = '$id'; 
		



			UPDATE student_address_communication set
			 
			 RN_NO='$rn',
			 ADDRESS='$al',
			 PINCODE='$pinl'
			 where STUDENT_ID = '$id'; 
		



			UPDATE student_father_guardian set
			 
			 RN_NO='$rn',
			 NAME='$fan',
			 OCCUPATION='$do',
			 MOBILE='$fnum',
			 ANNUAL_INCOME='$ai'
			 where STUDENT_ID = '$id'; 
		



			UPDATE student_mother set
			 
			 RN_NO='$rn',
			 NAME='$mn',
			 OCCUPATION='$mdo',
			 MOBILE='$mnum',
			 ANNUAL_INCOME='$mai'
			 where STUDENT_ID = '$id'; ";


		$result1=$conn->multi_query($sql1);
		if ($result1) {
		
			
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

		
		

			
		

}
mysqli_close($conn);

  ?>