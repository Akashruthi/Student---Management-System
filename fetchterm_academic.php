
<head>

    
    
    <link href="asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="asset/css/sb-admin.css" rel="stylesheet">
    <link href="asset/css/plugins/morris.css" rel="stylesheet">
    <link href="asset/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="datatables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="asset/css/styles.css" rel="stylesheet">
    
    <script src="assets/js/jquery.min.js"></script>
    <script src="datatables/jquery.dataTables.js"></script>
    <script src="datatables/dataTables.bootstrap.js"></script>
    <script src="asset/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/ie-emulation-modes-warning.js"></script>


</head>

  


<?php
include  'db.php';

if(isset($_POST['requestterm'])){
    
    
    include 'db.php';
    
    $requestterm=$_POST['requestterm'];
    $sql=  mysqli_query($conn, "SELECT * FROM total_grades_subjects ");
    while($row = mysqli_fetch_assoc($sql)) {
      $sid = $row['STUDENT_ID'];
      $subj =  $row['SUBJECT'];
      $sql3=  mysqli_query($conn, "SELECT * FROM subjects where TERM='$requestterm' AND SUBJECT_ID = '$subj' ");
      $count=mysqli_num_rows($sql3);
    
    
    ?>

<table id="table" class="table table-bordered table-condensed">
        <?php
        if($count){
            ?>
            <thead>
            <tr>
        <th style="width:10%;text-align:center">COURSE</th>
		<th style="width:10%;text-align:center">INTERNAL</th>
		<th style="width:10%;text-align:center">EXTERNAL</th>
        <th style="width:10%;text-align:center">TOTAL</th>
		<th style="width:10%;text-align:center">PASS/FAIL</th>
      </tr>
      
      <?php}
      else{

          echo"Sorry! No Record Found";
      }
      ?>
    </thead>
    <tbody> 
           <?php
           while($row3=mysqli_fetch_assoc($sql3)){
            $sid = $row['STUDENT_ID'];
               ?>
               <tr>


               <td style="text-align:center"><?php echo $row3['SUBJECT'] ?></td>
               <td style="text-align:center"><?php echo $row['INTERNALS']?></td>
               <td style="text-align:center"><?php echo $row['EXTERNALS'] ?></td>
               <td style="text-align:center"><?php echo $row['TOTAL'] ?></td>
               <td style="text-align:center"> <?php echo $row['PASSED_FAILED'] ?></td>
</tr>
      <?php } ?>  
           </tbody>  
    </table>
        
       <?php }}}
       
       ?>

  