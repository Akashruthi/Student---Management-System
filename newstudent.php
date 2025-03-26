<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
//Student personal details

$rn=$_POST['lrn'];
$pp=$_FILES['profilepic'];
$ln=$_POST['lname'];
$fn=$_POST['fname'];
$rel=$_POST['religion'];
$mot=$_POST['mot'];
$bg=$_POST['bg'];
$aadhar=$_POST['anum'];
$gender=$_POST['gender'];
$dob=$_POST['dob'];
$cn=$_POST['cn'];
$prog = $_POST['prog'];
$num=$_POST['num'];
$email=$_POST['email'];
$comm=$_POST['comm'];
$nat=$_POST['nn'];
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

//Academic Year
$ay=$_POST['ay'];
$total=$_POST['total'];

include 'db.php';

$fname=$_FILES['profilepic']['name'];
$ext=strtolower(end(explode('.',$fname)));
if($ext=='jpg'||$ext=='png'||$ext=='jpeg'){
	$dir='profilepic';
	$newfname=$rn. '.'.$ext;
	$profilepic_path=$dir.'/'.$newfname;

	move_uploaded_file($_FILES['profilepic']['tmp_name'],$profilepic_path);
	
	
		$sql = "INSERT INTO student_info
		 (
		 PROFILEPIC,
		 RN_NO,
		 FIRSTNAME,
		 LASTNAME,
		 GENDER,
		 DATE_OF_BIRTH,
		 RELIGION,
		 COMMUNITY,
		 CASTE_NAME,
		 MOTHER_TONGUE,
		 BLOOD_GROUP,
		 NUMBER,
		 EMAIL,
		 NATIONALITY,
		 AADHAR,
		 DEPARTMENT,
		 TERM
		 
		   )
	VALUES (
		'$profilepic_path',
		'$rn',
		'$fn',
		'$ln',
		'$gender',
		'$dob',
		'$rel',
		'$comm',
		'$cn',
		'$mot',
		'$bg',
		'$num',
		'$email',
		'$nat',
		'$aadhar',
		'$prog',
		'$term'
	);
	INSERT INTO student_bank
			 (
			 RN_NO,
			 BANK_NAME,
			 BRANCH,
			 ACC_NUM,
			 IFSC
			 )
		VALUES (
			'$rn',
			'$bn',
			'$bb',
			'$acnum',
			'$ifsc'
		);

        INSERT INTO student_schoolinfo_sslc
			 (
			 RN_NO,
			 SCHOOL_NAME,
			 10TH_MARK,
			 10TH_PERCENTAGE,
			 10TH_YOP
			 )
		VALUES (
			'$rn',
			'$ns1',
			'$mark10',
			'$per10',
			'$yop10'
		);

		INSERT INTO student_schoolinfo_hsc_iti
			 (
			 RN_NO,
			 SCHOOL_ITI_NAME,
			 12TH_ITI_MARK,
			 12TH_ITI_PERCENTAGE,
			 12TH_ITI_YOP
			 )
		VALUES (
			'$rn',
			'$ns2',
			'$mg',
			'$mp',
			'$mt'
		);
		
		
			INSERT INTO student_mother
			 (
			 RN_NO,
			 NAME,
			 OCCUPATION,
			 MOBILE,
			 ANNUAL_INCOME
			 )
		VALUES (
			'$rn',
			'$mn',
			'$mdo',
			'$mnum',
			'$mai'
		);
		
			INSERT INTO student_father_guardian
			 (
			 RN_NO,
			 NAME,
			 OCCUPATION,
			 MOBILE,
			 ANNUAL_INCOME
			 )
		VALUES (
			'$rn',
			'$fan',
			'$do',
			'$fnum',
			'$ai'
		);
		
			INSERT INTO student_address_pmt
			 (
			 RN_NO,
			 ADDRESS,
			 PINCODE
			 )
		VALUES (
			'$rn',
			'$pa',
			'$pin'
		);
		
			INSERT INTO student_address_communication
			 (
			 RN_NO,
			 ADDRESS,
			 PINCODE
			 )
		VALUES (
			'$rn',
			'$pa',
			'$pin'
		);
		INSERT INTO student_address_communication
			 (
			 RN_NO,
			 ADDRESS,
			 PINCODE
			 )
		VALUES (
			'$rn',
			'$pa',
			'$pin'
		);
		INSERT INTO student_year_info
			 (
			 RN_NO,
			 YEAR,
			 TOTAL_NO_OF_YEAR
			 )
		VALUES (
			'$rn',
			'$ay',
			'$total'
		);
	";
$result=$conn->multi_query($sql);
if ($result) {

	echo "<div class='erlert-success'><center><h4>" . "New Student Successfully Added." . "</h4></center></div>";
				}
} else {
	"<script>
	alert('Failed to Submit.');
	</script>";
}


}























      
			
		
			
		
        
			
		
		
		


		


	
		
mysqli_close($conn);

  ?>