
          <h1 class="page-header">Student Records</h1>

       <div class="col-md-12">   
       <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Students List</h3>
        </div> 
        <div class="panel-body">  
  <table id="students" class="table table-bordered">
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
    $sql=  mysqli_query($conn, "SELECT * FROM student_info order by LASTNAME");
    while($row = mysqli_fetch_assoc($sql)) {
      
      


    ?>
      <tr>


        <td><?php echo $row['RN_NO'] ?></td>
        <td><?php echo $row['FIRSTNAME'] . ' ' . $row['LASTNAME']?></td>
        <td style="text-align:center"><?php echo $row['DEPARTMENT'] ?></td>
		    <td style="text-align:center"><?php echo $row['TERM'] ?></td>
        <td><center><?php 
        include 'db.php';
        $query = mysqli_query($conn,"SELECT college_academic_year FROM college_academic_year where status='Yes'");
    while($sy = mysqli_fetch_assoc($query)){ ?>
      <a class='btn btn-success' href="rms.php?page=addrecord&id=<?php echo $row['STUDENT_ID'] ?>&prog=<?php echo $row['DEPARTMENT'] ?>&sy=<?php echo $sy['college_academic_year'] ?>&term=<?php echo $row['TERM'] ?>"><i class="fa fa-plus"> Add</i></a>
      <?php
    } ?>
        <a class="btn btn-info" href="rms.php?page=record&id=<?php echo $row['STUDENT_ID'] ?>&prog=<?php echo $row['DEPARTMENT']?>&term=<?php echo $row['TERM']?>">View</a></center></td>
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
 <script type="text/javascript">
        $(function() {
            $("#students").dataTable(
        { "aaSorting": [[ 0, "asc" ]] }
      );
        });
    </script>


