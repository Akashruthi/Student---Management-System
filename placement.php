
        
<script src='./bootbox/bootbox.min.js'></script></head>

  
  <script>
    $(document).ready(function(){

    $(document).on('click', '#getUser', function(e){
  
     e.preventDefault();
  
     var uid = $(this).data('id');      
 
     $.ajax({
          url: 'view_placement.php',
          type: 'POST',
          data: 'id='+uid,
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
   


   <h1 class="page-header">STUDENT'S PLACEMENT DETAILS</h1>
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
        
     
      <td style="text-align:center"> 
     <a  class="btn btn-info" href="rms.php?page=student_placement&id=<?php echo $sid ?>">ADD</a>
     <a  class="btn btn-info" data-toggle="modal" data-target="#view-modal" data-id="<?php echo $sid ?>" id="getUser">VIEW</a>
       
 
     
	 
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
        $(function() {
            $("#table").dataTable(
        { "aaSorting": [[ 2, "asc" ]] }
      );
        });
    </script>
    
      <script type="text/javascript">
      $(document).ready(function(){
        $('#fetch').on('change',function(){
          var value=$(this).val();
          //alert(value);
        
      $.ajax({
        url:"fetchterm.php",
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
 
