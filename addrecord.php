<!--$("#rowws").clone().appendTo("#table-body").show();-->

<script>
      $(document).ready(function(){

          $("#rowwss").hide();

          if($('#yr').val() == '1'){
            $('#class').val('TERM-I');
          }else if($('#yr').val() == '2'){
            $('#class').val('TERM-II');
          }else if($('#yr').val() == '3'){
            $('#class').val('TERM-III');
          }else if($('#yr').val() == '4'){
            $('#class').val('TERM-IV');
          }else if($('#yr').val() == '2'){
            $('#class').val('TERM-V');
          }else if($('#yr').val() == '3'){
            $('#class').val('TERM-VI');
          };
    
});
      function newrow($i){

        var data, i = $i +1;
        data = '<tr id="rowws" class="'+i+'">'+
           '<td style="width:50px;text-align:center;height:30px;font-size:12px">'+
             '<select name="subj[]" onchange="newrow('+i+')">'+
             '<option></option>'+
             ' <?php
                           include 'db.php';
                           $prog=$_GET['prog'];
                           $term=$_GET['term'];
                           $sql = mysqli_query($conn, " SELECT * from subjects where TERM='".$term."' AND `FOR` ='".$prog."'");
              while($row=mysqli_fetch_assoc($sql)){
                             $id = $row['SUBJECT_ID'];
                             $subj = $row['SUBJECT'];
             ?>'+
                '<option value="<?php echo $id ?>"><?php echo $subj ?> </option>'+
                '<?php
                              }
                              mysqli_close($conn);
                              ?>'+
            '</select> </td>'+
             '<td style="width:50px;text-align:center;height:30px;font-size:12px">'+
             '<input style="width:50px" class="'+i+'"  type="text" name="internal[]" required></td><td style="width:50px;text-align:center;height:30px;font-size:12px">'+
             '<input style="width:50px" class="'+i+'"  type="text" name="external[]" required></td><td style="width:50px;text-align:center;height:30px;font-size:12px">'+
             '<input style="width:50px" class="'+i+'"  type="text" name="total[]" required></td><td style="width:50px;text-align:center;height:30px;font-size:12px">'+
             '<select  name="action[]" id="action'+i+'"> <option value="" disabled="" selected="">PASS OR FAIL</option><option value="PASS">PASS</option><option value="FAIL">FAIL</option>'+ 
            
            
            
            
            
              
              '</td>'+
             ' <td><a onclick="remtrr('+i+')"  id="remtr">X</a></td>'+
              '</tr>';

              $("#table-body").append(data);
      }
      function adds(){

      }
      function remtrr($i){
        var i = $i;
       $("."+ i).remove();
      }
    </script>
  
    <?php
    include 'db.php';


    $sql=  mysqli_query($conn, "SELECT * FROM student_info where STUDENT_ID = '".$_GET['id']."' ");
    while($row = mysqli_fetch_assoc($sql)) {


    ?>

          <h1 class="page-header"><?php echo $row['FIRSTNAME'] . ' ' . $row['LASTNAME'] ?></h1>
          
          <?php
    } mysqli_close($conn);
      ?>
<table>

           <tr id="rowwss" class="<?php echo $i ?>">
           <td style="width:50px;text-align:center;height:30px;font-size:12px">
             <select name="subj[]">

             <?php
              include 'db.php';
              $prog=$_GET['prog'];
              $term=$_GET['term'];
              $sql = mysqli_query($conn, " SELECT * from subjects where TERM='".$term."' AND `FOR` ='".$_GET['prog']."' ");
              while($row=mysqli_fetch_assoc($sql)){
                $id = $row['SUBJECT_ID'];
                $subj = $row['SUBJECT'];
?>
                <option value="<?php echo $id ?>"><?php echo $subj ?> </option>
                <?php
              }
              mysqli_close($conn);
              ?>

</select> </td>
             <td style="width:50px;text-align:center;height:30px;font-size:12px">
             <input style="width:50px" class="<?php echo $i ?>"  type="text" name="internal[]" required></td><td style="width:50px;text-align:center;height:30px;font-size:12px">
             <input style="width:50px" class="<?php echo $i ?>"  type="text" name="external[]" required></td><td style="width:50px;text-align:center;height:30px;font-size:12px">
             <input style="width:50px" class="<?php echo $i ?>"  type="text" name="total[]" required></td><td style="width:50px;text-align:center;height:30px;font-size:12px">
             <select  name="action[]" id="action<?php echo $i ?>" >
             <option value="" disabled="" selected="" required >PASS OR FAIL</option>
             <option value="PASS">PASS</option><option value="FAIL">FAIL</option>
            </select>
          </tr>
          </table>



     <form action="newrecord.php" method="post">
     <input name="id" type="hidden" value="<?php echo $_GET["id"] ?>">
     <div class="col-md-6">
       
       <div class="row">
       <label class="col-md-4 te" for="yr"> Term:</label>
       <div class="col-md-6">
         <select type="text" name="test_term" class="form-control" id ="test_term" required>
        <?php 
       include 'db.php';
       $id = $_GET['id'];
      
        
        $query1=mysqli_query($conn,"SELECT * from student_tests");
       

       ?>
         <option value="<?php echo $_GET['term'] ?>"><?php echo $_GET['term'] ?></option>
         <?php
          ?>
          
          </select>
       </div>
       </div>
       <br>
       
       
       
       
       <div class="row">
       <label class="col-md-4 te" for="sy">Academic Year</label>
       <div class="col-md-6">
         <input type="text" name="sy" class="form-control" id ="sy" value="<?php echo $_GET['sy'] ?>"  >
       </div>
       </div>
       <br>
       <div class="row" style="display:none">
       <label class="col-md-4 te" for="class">To be classified as</label>
       <div class="col-md-6">
         <input type="text" name="class" class="form-control" id ="" readonly="">
       </div>
       </div>
     </div>
     

     <div class="col-md-7">
     <br>
     <br>
       <table class="table-bordered">
         <thead>
           <tr>
             <th style="width:140px;text-align:center">Course</th>
             <th style="width:110px;text-align:center">Internal Mark</th>
             <th style="width:130px;text-align:center">External Mark</th>
             <th style="width:130px;text-align:center">Total</th>
            
             <th style="width:120px;text-align:center">Passed<br>or<br>Failed</th>
             <th style="width:50px;text-align:center"></th>
           </tr>
         </thead>
         <tbody id="table-body">
         <?php
          for($i =0 ; $i<1; $i++){
          ?>
         <tr id="rowws" class="<?php echo $i ?>">
           <td style="width:50px;text-align:center;height:30px;font-size:12px">
             <select name="subj[]" onchange="newrow(<?php echo $i ?>)">
             <option></option>
             <?php
              include 'db.php';
              $prog=$_GET['prog'];
              $term=$_GET['term'];
              $sql = mysqli_query($conn, " SELECT * from subjects where TERM='".$term."' AND `FOR` ='".$prog."'");
              while($row=mysqli_fetch_assoc($sql)){
                $id = $row['SUBJECT_ID'];
                $subj = $row['SUBJECT'];
?>
                <option value="<?php echo $id ?>"><?php echo $subj ?> </option>
                <?php
              }
              mysqli_close($conn);
              ?>

            </select> </td>
             <td style="width:50px;text-align:center;height:30px;font-size:12px">
             <input style="width:50px" class="<?php echo $i ?>"  type="text" name="internal[]" required></td><td style="width:50px;text-align:center;height:30px;font-size:12px">
             <input style="width:50px" class="<?php echo $i ?>"  type="text" name="external[]" required></td><td style="width:50px;text-align:center;height:30px;font-size:12px">
             <input style="width:50px" class="<?php echo $i ?>"  type="text" name="total[]" required></td><td style="width:50px;text-align:center;height:30px;font-size:12px">
             <select  name="action[]" id="action<?php echo $i ?>" >
             <option value="" disabled="" selected="" required >PASS OR FAIL</option>
             <option value="PASS">PASS</option><option value="FAIL">FAIL</option>
            </select>
              

              </td>
              <td><a onclick="remtrr(<?php echo $i ?>)"  id="remtr">X</a></td>
              </tr>
              <?php
              } ?>
           
         </tbody>

       </table>
      <!-- <div class="btn btn-success" id="addnew">Add</div>-->
       </div>
       <center><div class="col-md-8">
        <br>
         <br>
       
          
     <button class="btn btn-success" type="submit">Save</button>
     </div></center>

    </form>
    </div>
    
 
 