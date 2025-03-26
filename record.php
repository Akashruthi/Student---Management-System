
        

  
   
          <h1 class="page-header">STUDENTS </h1>
  
 





       <div class="col-md-12">
          
       <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Students List</h3>

        </div> 
        
        <br>
        
        <div id="filters">
            <b><span>  By Term</span></b>
            <select class="fetchterm" name="fetch" id="fetch"> 
            <option value="" disabled="" selected="">Select Filter</option>
            
            <option value="I">I</option> 
            <option value="II">II</option>
            <option value="III">III</option>
            <option value="IV">IV</option>
            <option value="V">V</option>
            <option value="VI">VI</option>
             </select>
        </div>
        <div class="container-sm">
  <table id="table" class="table table-bordered table-condensed">
    <thead>
      <tr>
        <th style="width:10%;text-align:center">COURSE</th>
		<th style="width:10%;text-align:center">INTERNAL</th>
		<th style="width:10%;text-align:center">EXTERNAL</th>
        <th style="width:10%;text-align:center">TOTAL</th>
		<th style="width:10%;text-align:center">PASS/FAIL</th>
      </tr>
    </thead>
    <tbody>
    <?php
    include 'db.php';
    $id=$_GET['id'];
   
    $sql=  mysqli_query($conn, "SELECT * FROM total_grades_subjects WHERE STUDENT_ID='$id' ");
    while($row = mysqli_fetch_assoc($sql)) {
      $sid = $row['STUDENT_ID'];
      $subj =  $row['SUBJECT'];
      $term=$_GET['term'];
      $sql3=  mysqli_query($conn, "SELECT * FROM subjects where TERM='$term' AND SUBJECT_ID = '$subj' ");
      while($row3 = mysqli_fetch_assoc($sql3)){
  

    ?>
      <tr>


        <td style="text-align:center"><?php echo $row3['SUBJECT'] ?></td>
        <td style="text-align:center"><?php echo $row['INTERNALS']?></td>
        
        <td style="text-align:center"><?php echo $row['EXTERNALS'] ?></td>
		<td style="text-align:center"><?php echo $row['TOTAL'] ?></td>
        
     
      <td style="text-align:center"> <?php echo $row['PASSED_FAILED'] ?></td>
       </tr>
      <?php
    }}
     mysqli_close($conn);
      ?>
    </tbody>
  </table>
  </div>
  
</div>
</div> 
</div>

       <div id="view-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog"> 
               <div class="modal-content modal-lg">  
             
                  <div class="modal-header"> 
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                     <h4 class="modal-title">
                     <i class=""></i> PROFILE
                     </h4> 
                  </div> 
                       <div id="content">
                      
                     </div>
                  
                                 
              </div> 
            </div>
          </div>  




    
      <script type="text/javascript">
      $(document).ready(function(){
        $('#fetch').on('change',function(){
          var value=$(this).val();
          //alert(value);
        
      $.ajax({
        url:"fetchterm_academic.php",
        type:"POST",
        data:'requestterm='+value,
        beforeSend:function(){
          $(".container-sm").html("<span>Working....</span>");
        
        },
        success:function(data){
          $(".container-sm").html(data);
        }


      });   

                });
      });
      </script>
 
