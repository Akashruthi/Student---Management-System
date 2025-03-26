&nbsp<!DOCTYPE html>
<html>
<?php 
include 'db.php';
session_start();
$user = $_SESSION['ID'];


	$id = $_GET['id'];

	$query = mysqli_query($conn,"SELECT * FROM student_info where STUDENT_ID = '$id' ");
	$row = mysqli_fetch_assoc($query);
	$student = $row['FIRSTNAME'].' '. $row['LASTNAME'];

	mysqli_query($conn, "INSERT into history_log (transaction,user_id,date_added) 
		VALUES ('printed $student permanent record','$user',NOW() )");



?>
<head>
    <link rel="icon" href="images/logo.jpg">

    <title>SESHASAYEE INSTITUTE OF TECHNOLOGY</title>

     <!-- Bootstrap Core CSS -->
    <link href="asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="asset/css/styles.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="asset/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="asset/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="asset/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    
    <script src="datatables/jquery.dataTables.js"></script>
    <script src="datatables/dataTables.bootstrap.js"></script>
        <link href="datatables/dataTables.bootstrap.css" rel="stylesheet">

    <script src="assets/js/jquery.min.js"></script>
    <script src="asset/js/bootstrap.min.js" type="text/javascript"></script>

    <script src="assets/js/ie-emulation-modes-warning.js"></script>
    <script src="assets/js/jq.js"></script>
	<style>
	@media print {  
		@page {
			size:8.5in 13in;
		}
		head{
			height:0px;
			display: none;
		}
		#head{
			display: none;
			height:0px;
		}
		#print{
		position:fixed;
		top:0px;
		margin-top:20px;
		margin-bottom:50px;
		margin-right:20px;
		margin-left:20px;
		}
		}
		#print{
		width:7.5in;
		}
		input {
    border: 0;
    outline: 0;
    background: transparent;
    border-bottom: 1px solid black;
}

.foo{
	font-family: "Bodoni MT", Didot, "Didot LT STD", "Hoefler Text", Garamond, "Times New Roman", serif;
	font-size: 24px;
	font-style: italic;
	font-variant: normal;
	font-weight: bold;
	line-height: 24px;
	}
	.p {
	font-family: "Segoe UI", Frutiger, "Frutiger Linotype", "Dejavu Sans", "Helvetica Neue", Arial, sans-serif;
	font-size: 14px;
	font-style: italic;
	font-variant: normal;
	font-weight: 550;
	line-height: 20px;
	 letter-spacing: 2px;
}
	</style>

</head> 
<body style="background-color:white"> 
<span id='returncode'></span>
<div class="col-md-2" id="head">
	<button class="btn btn-info" onclick="print()"><i class="glyphicon glyphicon-print"></i>PRINT</button>
	<a class="btn btn-info" onclick="window.close()">Cancel</a>
	
</div>
<center>
<div id='print'>
<div style="margin-left:.5in;margin-right:.5in;margin-top:.1in;margin-bottom:.1in;line-height:1mm;">
 </div>

		  <div class="row">
		  <div class="col-md-12">
		 <img src="./images/sit.jpg"><h2><b>SESHASAYEE INSTITUTE OF TECHNOLOGY</h2></b></a>
		  </div>
          </div>
          <div class="row">
		  <div class="col-md-12">

		  <table style="line-height:5mm">
		<?php 
		include 'db.php';
		$id = $_GET['id'];
		$sql = mysqli_query($conn,"SELECT * from student_info where STUDENT_ID = '$id'");
		while($row = mysqli_fetch_assoc($sql)){
			$sid=$row['STUDENT_ID'];
		?>
			<tr>
				<td style="width:600px;font-size:12px">
					<label for="" style="">NAME:&nbsp&nbsp&nbsp&nbsp&nbsp</label>
					<span style="font-size:13px;text-transform: uppercase;"><?php echo $row['FIRSTNAME']." " .  $row['LASTNAME']; ?></span>
				</td>
				<br>
				<td style="width:600px;font-size:12px">
				<label for="">DATE:&nbsp&nbsp&nbsp&nbsp&nbsp</label>
					<h style="font-size:12px"><?php echo date(" d F,Y") ?></h>	
			</tr>

			<td style="width:600px;font-size:12px">
		     <label for="">DATE OF BIRTH:&nbsp&nbsp&nbsp&nbsp&nbsp</label>
			 <span style="font-size:13px;text-transform: uppercase;"><?php echo $row['DATE_OF_BIRTH']; ?></span>
				</td>
				<td style="width:600px;font-size:12px">
		     <label for="">TERM:&nbsp&nbsp&nbsp&nbsp&nbsp</label>
			 <span style="font-size:13px;text-transform: uppercase;"><?php echo $row['TERM']; ?></span>
				</td>
			</table> 
			<table>
			<tr>

			<td style="width:1000px;font-size:12px;align:left">		
		</table>
		
		  </div>
          </div>
          <div class="row">
          <div class="col-md-12">
          <hr style="border-color:black;border:1px solid black"></hr>
          </div>
          </div>

          <p style="">
          <?php
		$sql1 = mysqli_query($conn,"SELECT * FROM student_year_info left join grade on student_year_info.YEAR=grade.grade_id where STUDENT_ID = '$id'");
		$num1 = mysqli_num_rows($sql1);

		

		while($row1 = mysqli_fetch_assoc($sql1)){
		?>
		<table style="border-collapse:collapse">
		<tr>
		
		<td style="width:150px;border:1px solid black;font-size:12px;"><center><b>SUBJECT NAME</b></center></td>
		<td style="width:60px;border:1px solid black;font-size:12px;"><center><b>INTERNAL MARK</b></center></td>
		<td style="width:60px;border:1px solid black;font-size:12px;"><center><b>EXTERNAL MARK</b></center></td>
        <td style="width:150px;border:1px solid black;font-size:12px;"><center><b>TOTAL</b></center></td>
		<td style="width:150px;border:1px solid black;font-size:12px;"><center><b>RESULT</b></center></td>
		</tr>

		<?php

$sql2=  mysqli_query($conn, "SELECT * FROM total_grades_subjects WHERE STUDENT_ID='$id' ");
while($row2 = mysqli_fetch_assoc($sql2)) {
  
  $subj =  $row2['SUBJECT'];

  $sql3=  mysqli_query($conn, "SELECT * FROM subjects where SUBJECT_ID = '$subj' ");
  while($row3 = mysqli_fetch_assoc($sql3)){


?>
		<tr>
		<td style="width:83px;border:1px solid black;font-size:12px;height:15px"><?php echo $row3['SUBJECT']?></td>
		<td style="width:83px;border:1px solid black;font-size:12px;height:15px"><?php echo $row2['INTERNALS']?></td>
		<td style="width:83px;border:1px solid black;font-size:12px;height:15px"><?php echo $row2['EXTERNALS']?></td>
		<td style="width:83px;border:1px solid black;font-size:12px;height:15px"><?php echo $row2['TOTAL']?></td>
		<td style="width:83px;border:1px solid black;font-size:12px;height:15px"><?php echo $row2['PASSED_FAILED']?></td>
		</tr>
		<?php
}
	}
}}

?>
<?php
?>		

<?php
 mysqli_close($conn);
?>
</table>
<br><br><br><br><br><br>			
<h4><p style="display:inline;"><i>Dept.In-Charge<i></p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<p style="display:inline;align:right"><i>PRINCIPAL<i></p></h4>
</div>
</p>

</center>
</body>
<script>
function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;

	$.ajax({
		url:'print_log.php?act=form137&id=<?php echo $_GET['id'] ?>',
		success:function(html){
			$('#returncode').html(html);
		}
	});
}
</script>
</html>