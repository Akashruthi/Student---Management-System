<h1 class="page-header">STUDENTS ACADEMIC RECORDS</h1>
   <div class="col-md-12">
    <div class="panel panel-default">
    <div class="panel-heading">
   <h3 class="panel-title">STUDENTS ACADEMIC RECORDS</h3>
 </div>  
        <br>
   <div class="container-sm">
  <table id="table" class="table table-bordered table-condensed">
    <thead>
      <tr>
        <th style="width:10%;text-align:center">REGNO</th>
		<th style="width:30%;text-align:center">NAME</th>
		<th style="width:20%;text-align:center">DEPARTMENT</th>
        <th style="width:20%;text-align:center">TERM</th>
		<th style="width:20%;text-align:center">ACTION</th>
      </tr>
    </thead>
    <tbody>
    <?php
    include 'db.php';
    $sql=  mysqli_query($conn, "SELECT * FROM student_info order by LASTNAME ");
    while($row = mysqli_fetch_assoc($sql)) {
      $sid = $row['STUDENT_ID'];
    ?>
      <tr>


        <td><?php echo $row['RN_NO'] ?></td>
        <td><?php echo $row['FIRSTNAME'] . ' ' . $row['LASTNAME']?></td>
        <td style="text-align:center"><?php echo $row['DEPARTMENT'] ?></td>
		<td style="text-align:center"><?php echo $row['TERM'] ?></td>
        <td>
	<a class="btn btn-info" onclick='window.open("mark.php?id=<?php echo $row['STUDENT_ID'] ?>")'>
	<i class="fa fa-fw fa-print"></i>RESULT</a>
	</td>
       </tr>
      <?php
    }
     mysqli_close($conn);
      ?>
    </tbody>
  </table>
  </div>
  
</div>
</div> 
</div>

<script type="text/javascript">
        $(function() {
            $("#table").dataTable(
        { "aaSorting": [[ 2, "asc" ]] }
      );
        });
    </script>