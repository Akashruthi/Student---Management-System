<?php
include 'newcurriculm.php';
?>
<script>
    $(document).ready(function(){

    $(document).on('click', '#get_sub', function(e){
  
     e.preventDefault();
  
     var dep = $(this).data('id');  
     var trm = $(this).data('id');      
 
     $.ajax({
          url: 'get_subject.php',
          type: 'POST',
          data: 'dep='+dep+'&trm='+trm,
          beforeSend:function()
{
 $("#content").html('Working on Please wait ..');
},
success:function(data)
{
   $("#content").html(data);
},
     })

    });
})
  </script>
          <h3 class="page-header">Program <small>section</small></h3>
  
       <div class="col-md-8">
       <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">List of Department</h3>
        </div> 
        <div class="panel-body">     
  <table id="students" class="table table-hover table-bordered">
    <thead>
      <tr id="heads">
        <th style="width:10%">Department</th>
	    <th style="width:10%">Term</th>
        <th style="width:20%"></th>
      </tr>
    </thead>
    <tbody>
    <?php
    include 'db.php';
    $sql=  mysqli_query($conn, "SELECT * FROM program Order by DEPARTMENT");
    while($row = mysqli_fetch_assoc($sql)) {
      


    ?>
    <form method="post" action="update_program.php">
      <tr>
      <input type="hidden" name="id" value="<?php echo $row['PROGRAM_ID']?>">
        <td><input  name="dep" type="text" style="border:0px" value="<?php echo $row['DEPARTMENT'] ?>"></td>
        <td><input  name="trm" type="text" style="border:0px" value="<?php echo $row['TERM'] ?>"></td>
        <td><center><a  data-toggle="modal" data-target="#program" data-id="<?php echo $row['TERM'] ?>" id="get_sub">Subjects</a>|<button type="submit" style="border:0px;background:white" ><i class="fa fa-pencil-square" aria-hidden="true"></i> update</button></center></td>
      </tr>
      </form>
      <?php
    } mysqli_close($conn);
      ?>
      
    </tbody>
  </table>
</div>
</div>
</div>


      <div class="col-md-4">
        
            <div class="container frm-new">
      <div class="row main">
        <div class="main-login main-center">
        <h3>Add New Department</h3>
          <form class="" method="post" >
            <input type="hidden" name="id">
            <div class="form-group">
              <label for="sub" class="cols-sm-2 control-label">Department</label>
              <div class="cols-sm-4">
                <div class="input-group">
                  <input type="text" class="form-control" name="dep" id="sub"
                  style="width:225px"  placeholder="Enter Department" value="<?php if(isset($_POST['dep'])){echo $_POST['dep'];} ?>"/>
                  <p>
            <?php if(isset($errors['dep'])){echo "<br><br><div class='erlert'><h5>" .$errors['dep']. "</h5></div>"; } ?>
            </p>
                </div>
              </div>
            </div>
			<div class="form-group">
              <label for="trm" class="cols-sm-2 control-label">Term</label>
              <div class="cols-sm-4">
                <div class="input-group">
                  <input type="text" class="form-control" name="trm" id="trm"  
                  style="width:225px" placeholder="Enter Term" value="<?php if(isset($_POST['trm'])){echo $_POST['trm'];} ?>" ></textarea>
                  <p>
            <?php if(isset($errors['des'])){echo "<br><br><br><div class='erlert'><h5>" .$errors['des']. "</h5></div>"; } ?>
            </p>
                </div>
              </div>
            </div>
            <div class="form-group ">
            <input type="reset" class="btn btn-info" id="reset" name="reset" value="Cancel">
              <button  class="btn btn-info" id="submit">Add</button>
            </div>
            
          </form>
        </div>
      </div>

    </div>
    <div class="modal fade" id="program" role="dialog">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Subjects</h4>
            </div>
            <div class="modal-body">
                <div class="container">
                  <div id="content"></div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
            </div>
        </div>
      </div>
    </div>

