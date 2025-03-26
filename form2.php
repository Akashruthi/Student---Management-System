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
		
		top:0px;
		margin-top:20px;
		margin-bottom:30px;
		margin-right:50px;
		margin-left:50px;
		}
		}
		#print{
		width:10in;
		}
		input {
    border: 0;
    outline: 0;
    background: transparent;
    border-bottom: 1px solid black;
}


	.p {
	
	font-size: 54px;
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
		  <h1 class="page-header"><img src="./images/sit.jpg">
		  <h2><center><b>SESHASAYEE INSTITUTE OF TECHNOLOGY</b></center></h2>	
		  </div>

          </div>
          <div class="row">
		  <div class="col-md-12">

		  
		<?php
		$sql= mysqli_query($conn,"SELECT * FROM student_info where STUDENT_ID = '$id'");
		while($row = mysqli_fetch_assoc($sql)){
			$sid=$row['STUDENT_ID'];
			$sql3 = mysqli_query($conn,"SELECT * FROM student_year_info where STUDENT_ID = '$id'");
			$num = mysqli_num_rows($sql3) ; 
			if($num > 0){
		$sql2 = mysqli_query($conn,"SELECT * FROM student_year_info where STUDENT_ID = '$id' ");
		while($row2 = mysqli_fetch_assoc($sql2)){
			$sql3 = mysqli_query($conn,"SELECT * FROM college_academic_year where status = 'Yes' ");
		while($row3 = mysqli_fetch_assoc($sql3)){
			$sql4 = mysqli_query($conn,"SELECT * FROM student_father_guardian WHERE STUDENT_ID='$sid'");
		while($row4 = mysqli_fetch_assoc($sql4)){

		 ?>
		<p class="p" style="text-align:justify;line-height:5mm;font-transform:capitalize"> 
		<h3>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp This to  certify that Selvam /Selvi <?php echo '<b><span style="text-transform:uppercase">'  . $row['FIRSTNAME'] . ' ' . $row['LASTNAME'] . '</span></b>'  ?> Son/Daughter of Thiru<?php echo '<b><span style="text-transform:uppercase">&nbsp'  . $row4['NAME'].' </span></b>'?>  &nbsp student of this Institution in the I / II / III year of the Diploma in <?php echo '<b><span style="text-transform:uppercase">' .$row['DEPARTMENT'].'</span></b>' ?>   Engineering during the year <?php echo '<b><span style="text-transform:uppercase">' .$row3["college_academic_year"].' </span></b>' ?>  &nbsp&nbsp&nbsp</h3></p>

		<?php
		}}
	}}else{
		?>
		<p class="p" style="text-align:justify;line-height:5mm;font-transform:capitalize"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp I hereby certify that this is the true record of &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <?php echo '<u>&nbsp&nbsp&nbsp&nbsp'  . $row['FIRSTNAME'] . ' ' . $row['LASTNAME'] . '&nbsp&nbsp&nbsp</u>' . '.' ?> This student is eligible on this &nbsp&nbsp&nbsp <?php echo date("d") . 'th'?> &nbsp&nbsp&nbsp day of &nbsp&nbsp&nbsp <?php echo date("M") . ',' . date("y")?> &nbsp&nbsp&nbsp for admission to &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp year as (regular/irregular) student, and has no property responsibility in this school. </p>

		
		<?php
		}
		}
		 ?>
			
				<br><br><br><br><br><br>
				
			    <h3 ><p style="display:inline;"><i>Dept.In-Charge<i></p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<p style="display:inline;align:right"><i>PRINCIPAL<i></p></h3>
				
</div>
</p>

<?php

 mysqli_close($conn);
?>
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