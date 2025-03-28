
          <h1 class="page-header">SUBJECTS</h1>
      <?php
            include 'newsubject.php';
                ?> 
       <div class="col-md-8 " id="s_page">
        
             
              <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">LIST OF SUBJECTS</h3>
        </div> 
        <div class="panel-body">  

  <table id="students" class="table table-hover table-bordered">
    <thead>
      <tr>
        <th style="width:20%">SCHEME</th>
        <th style="width:20%">SUBJECTS</th>
        <th style="width:10%">APPLICABLE FOR</th>
        <th style="width:10%">TERM</th>
        <th style="width:10%"></th>
      </tr>
    </thead>
    <tbody>
    <?php
    include 'db.php';

    
    $sql=  mysqli_query($conn, "SELECT *,`FOR` as para1,`TERM` as para2 FROM subjects Order by TERM ");
    while($row = mysqli_fetch_assoc($sql)) {

        $count = mysqli_num_rows($sql);
     
    ?>

      <tr>
         <input type="hidden" id="id<?php echo $row["SUBJECT_ID"] ?>" name="id" value="<?php echo $row['SUBJECT_ID'] ?>">
         <td><input id="scheme<?php echo $row["SUBJECT_ID"] ?>"  name="scheme" type="text" style="border:0px" value="<?php echo $row['SCHEME'] ?>" readonly></td>
         <td><input id="sub<?php echo $row["SUBJECT_ID"] ?>"  name="subj" type="text" style="border:0px" value="<?php echo $row['SUBJECT'] ?>" readonly></td>
          <td><input id="para1<?php echo $row["SUBJECT_ID"] ?>"  name="dept" type="text" style="border:0px" value="<?php echo $row['para1'] ?>" readonly></td>
        <td><input id="para2<?php echo $row["SUBJECT_ID"] ?>" name="term" type="text" style="border:0px;width:100%" value="<?php echo $row['para2'] ?>" readonly></td>
        <td><center><a onclick="update_subject(<?php echo $row["SUBJECT_ID"] ?>)" class="btn btn-info" ><i class="fa fa-pencil-square" aria-hidden="true"></i> Edit</a></center></td>
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

<script>
  function update_subject($i){
    var act,sub,scheme,para1,para2,term,i =$i;
      para1 = $("#para1"+i).val();
	  para2 = $("#para2"+i).val();
      $("#id").val($("#id"+i).val());
      $("#sub").val($("#sub"+i).val());
      $("#scheme").val($("#scheme"+i).val());
      $("#para1").html(para1);
	    $("#para2").html(para2);
      $("#trm").val($("#trm"+i).val());
      $("#head").html("Update Subject");
      $("#btn_add").html("Update");


  }
</script>


      <div class="col-md-4" id="">
        
            <div class="container frm-new">
      <div class="row main">
        <div class="main-login main-center">
        <h3 id="head">ADD NEW SUBJECT</h3>
          <form class="" method="post">
            <input type="hidden" id="id" name="id">
            <div class="form-group">
              <label for="sub" class="cols-sm-2 control-label">SUBJECT</label>
              <div class="cols-sm-4">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-book fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" id="sub" name="sub" id="sub"
                  style="width:200px"  placeholder="Enter Subject" value="<?php if(isset($_POST['sub'])){echo $_POST['sub'];} ?>"/>
                </div>
                 <p>
            <?php if(isset($errors['sub'])){echo "<div class='erlert'><h5>" .$errors['sub']. "</h5></div>"; } ?>
            </p>
              </div>
            </div>
            <div class="form-group">
              <label for="scheme" class="cols-sm-2 control-label">SCHEME</label>
              <div class="cols-sm-4">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-book fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" id="scheme" name="scheme" id="scheme"
                  style="width:200px"  placeholder="Enter Scheme" value="<?php if(isset($_POST['scheme'])){echo $_POST['scheme'];} ?>"/>
                </div>
                 <p>
            <?php if(isset($errors['scheme'])){echo "<div class='erlert'><h5>" .$errors['scheme']. "</h5></div>"; } ?>
            </p>
              </div>
            </div>
            <div class="form-group">
              <label for="sub" class="cols-sm-2 control-label">FOR</label>
              <div class="cols-sm-4">
                <div class="input-group">
                  <select name="f1" class="form-control" id="para1">
                  
                  <option id="para1"></option>
                  <option id="para1">Mechanical</option>
                  <option id="para1">Civil</option>
                  <option id="para1">Paper Technology</option>
                  <option id="para1">Electrical</option>
                  <option id="para1">ICE</option>
                  <option id="para1">Computer</option>
                  
                  
                  </select>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="sub" class="cols-sm-2 control-label">TERM</label>
              <div class="cols-sm-4">
                <div class="input-group">
                  <select name="f2" class="form-control" id="para2">
                  <option id="para2"></option>
                  <option id="para2">I</option>
                  <option id="para2">II</option>
                  <option id="para2">III</option>
                  <option id="para2">IV</option>
                  <option id="para2">V</option>
                  <option id="para2">VI</option>
                  
                  
                  </select>
                </div>
              </div>
            </div>


            <div class="form-group ">
            <input type="reset" class="btn btn-info " id="reset" name="reset" value="CANCEL">
              <button class="btn btn-info" id="btn_add">ADD</button>
            </div>
            
          </form>
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
