 
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
 <script>
  jQuery(document).ready(function(){
    $('#messsage').hide(); 
    
  });  
        </script>
        <script type="text/javascript">
          $(function(){
            $("input[name='status']").click(function (){
              if($("#placed").is(":checked")){
                $("#company").removeAttr("readonly");
                $("#company").focus();
              } else {
                $("#company").attr("readonly","readonly");
              }
            });
          });
          </script>
          <script type="text/javascript">
          $(function(){
            $("input[name='status']").click(function (){
              if($("#placed").is(":checked")){
                $("#letter").removeAttr("disabled");
                
              } else {
                $("#letter").attr("disabled","disabled");
              }
            });
          });
          </script>
  <div class="row">
    <div class="col-md-1 text-right">
      <a type="button" class="btn btn-info" href="rms.php?page=placement" >
	  <i class="fa fa-chevron-circle-left" aria-hidden="true"></i>BACK</a>
    </div>
    </div>
    <div class="row">
    <div class="col-md-4">
    </div>
    <div class="col-md-4">
    <?php include 'update_placement.php'; ?>
    </div>
    <div class="col-md-4">
    </div>
    </div>

    

    <?php
    include 'db.php';
    $id = $_GET['id'];
	$sql = mysqli_query($conn, "SELECT * From student_info where STUDENT_ID = '$id' ");
  $sql1 = mysqli_query($conn, "SELECT * From student_placement where STUDENT_ID = '$id' ");
  
	while($row = mysqli_fetch_assoc($sql)){
     ?>
     <div class="container">
         <div class="col-md-12">
         <form method="post" enctype="multipart/form-data">
         <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">

         <div class="row">
         <div class="col-md-2 text-right">
         <label></label>
         </div>
         <div class="col-md-2 text-center">
         
          <br>
          <label></label>
            
          </div>

         </div>
		 <hr style="width:95%;border-top:3px solid #cc9933">
         <h3><center><b>UPDATION OF STUDENT'S PLACEMENT DETAILS </b></center></h3>
		 <hr style="width:95%;border-top:3px solid #cc9933">
         </div>
         <div class="row">
         <div class="col-md-2 text-right">
         <label>Profile:</label>
         </div>
         <div class="col-md-2 text-center">
          <img src="<?= $row['PROFILEPIC'] ?>" width="200" height="200">

            
          </div>

         </div><br><br>
         
         <br><br>
         
         <div class="row">
         <div class="col-md-2 text-right">
         <label>REG NO:</label>
         </div>
         <div class="col-md-2 text-center">
          <input type="text" maxlength="12" class="form-control input-xs"  name="lrn" value="<?php echo $row['RN_NO'] ?>"readonly>
          <br>
          <label></label>
            
          </div>

         </div>

         <div class="row">
         <div class="col-md-2 text-right">
         <label>NAME:</label>
         </div>
         <div class="col-md-2 text-center">
         <input type="text" class="form-control input-xs"  name="fname" value="<?php echo $row['FIRSTNAME'] ?>"readonly>
         <br>
          <label style="font-size:10px">(FIRST NAME)</label>
            
          </div>
          <div class="col-md-2 text-center">
          <input type="text" class="form-control input-xs"  name="lname" value="<?php echo $row['LASTNAME'] ?>"readonly>
          <br>
          <label style="font-size:10px">(LAST NAME)</label>
            
          </div>
          

        </div>
         
		<?php
    }
      ?>
     <div class="row">
         <div class="col-md-2 text-right">
         <label>PLACEMENT STATUS:</label>
         </div>
         <div class="col-md-2 text-center">
           <input type=radio id="placed"name="status"  required="" value="placed">
         
       <h5> PLACED </h5>
        <input type=radio id="notplaced"name="status" required="" value="notplaced"><h5>NOT PLACED</h5>
        
      
      
            <br>
          
            
          </div>

         </div>
    <div class="row">
         <div class="col-md-2 text-right">
         <label>COMPANY:</label>
         </div>
         <div class="col-md-2 text-center">
          <input type="text" maxlength="12" class="form-control input-xs"  id="company" name="company" readonly>
          <br>
          
            
          </div>
          <h6><b>(IF PLACED ENTER THE COMPANY NAME AND UPLOAD THE CALL LETTER)</b></h6>
         </div>
         

         </div>
         <div class="row">
         <div class="col-md-2 text-right">
         <label>UPLOAD PDF:</label>
         </div>
         <div class="col-md-2 text-center">
          <input id="letter" type="file" name="letter" disabled/>

            
          </div>

         </div>
         <div class="row">
         <div class="col-md-8 text-right">
          <button type="submit" class="btn btn-info"><i class="fa fa-pencil-square" aria-hidden="true"></i>UPDATE</button>
          
          </div>
        </form>
          
          </div> 
        </div>

    <?php
     mysqli_close($conn);
     ?>

</div>
</div>
</div> 
</div> 


   
