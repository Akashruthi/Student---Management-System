
        
<script src='./bootbox/bootbox.min.js'></script></head>
  <script>
            
            $(document).ready(function () {

                // Delete 
                $(document).on('click', '#deleteUser', function(e){
                    e.preventDefault();

                    // Delete id
                    var uid = $(this).data('id');

                    // Confirm box
                    bootbox.confirm("Do you really want to delete record?", function (result) {

                        if (result) {
                            // AJAX Request
                            $.ajax({
                                url: 'delete_students.php',
                                type: 'POST',
                                data: 'id='+uid,
                                success: function (response) {

                                    // Removing row from HTML Table
                                    if (response == 1) {
                                        $(el).closest('tr').css('background', 'tomato');
                                        $(el).closest('tr').fadeOut(800, function () {
                                            $(this).remove();
                                        });
                                    } else {
                                        bootbox.alert('Record deleted successfully.');
										location.reload();
                                    }

                                }
                            });
                        }

                    });

                });
            });
        </script>
  <script>
    $(document).ready(function(){

    $(document).on('click', '#getUser', function(e){
  
     e.preventDefault();
  
     var uid = $(this).data('id');
     var lrn = $(this).data('id');      
 
     $.ajax({
          url: 'view_students.php',
          type: 'POST',
          data: 'id='+uid+'&lrn='+lrn,
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
   <?php
  include 'newstudent.php';
  ?>

          <h1 class="page-header">STUDENTS <button style="float:right" type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
		  <i class="glyphicon glyphicon-plus"></i> New Entry</button></h1>
  
 

<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog modal-lg">
    
     
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-title">NEW STUDENTS</h2>
        </div>
        <div class="modal-body">
<form class="form-horizontal" method="post" enctype="multipart/form-data">
<fieldset>
<div class="container">

<div class="col-md-20" style="width:73%;border-bottom:1px solid #333">
<hr style="width:100%;border-top:1px solid #333">
<h2><center><b>STUDENT'S PERSONAL DETAILS </b></center></h2>

</div>
<br>
<div class="form-group">
<label class="col-xs-2 control-label" for="pp">PROFILE PICTURE</label>  
<div class="col-xs-6">
<input type="file" name="profilepic" class="form-contol" required>
</div>
</div>

<div class="col-md-40">
<div class="form-group">
<label class="col-xs-2 control-label" for="lrn">REGNO</label>  
<div class="col-xs-6">
<input id="lrn" name="lrn" type="text" style="width:222px;" placeholder="Enter Regno " maxlength="12" class="form-control input-xs" required="">
</div>
</div>

<!-- Prepended text-->

<div class="form-group">
<label class="col-xs-2 control-label" for="name">NAME</label>  
<div class="col-xs-6">
<div class="input-group">
 <input id="name" class="form-control input-xs" style="width:222px;"
 style="text-transform: capitalize;" name="fname" placeholder="Firstname"  type="text" required="">
 <div class="col-xs-4">
 <input id="name" class="form-control input-xs" style="width:222px;"
 style="text-transform: capitalize;" name="lname" placeholder="Lastname"  type="text" required="">
 <br>    
    </div>
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-xs-2 control-label" for="gender">GENDER</label>
  <div class="col-xs-6">
    <select id="gender" name="gender" style="width:222px;" class="form-control input-xs">
      <option value="MALE">Male</option>
      <option value="FEMALE">Female</option>
    </select>
  </div>
</div>
<div class="form-group">
  <label class="col-xs-2 control-label" for="dob">DATE OF BIRTH</label>  
  <div class="col-xs-6">
  <input id="dob" name="dob" type="date"  style="width:222px;" class="form-control input-md" required="">
</div>
</div>
</div>

<div class="form-group">
<label class="col-xs-2 control-label" for="religion">RELIGION</label>
 <div class="col-xs-6">
 <select id="religion" name="religion" style="width:222px;" class="form-control input-xs">
 <option value="HINDU">HINDU</option>
 <option value="MUSLIM">MUSLIM</option>
 <option value="CHRISTIAN">CHRISTIAN</option>
 </select>
  </div>
</div>
<div class="form-group">
<label class="col-xs-2 control-label" for="community">COMMUNITY</label>
<div class="col-xs-6">
<select id="community" style="width:222px;" name="comm" class="form-control input-xs">
<option value="OC">OC</option>
<option value="BC">BC</option>
<option value="MBC">MBC</option>
<option value="SC">SC</option>
<option value="SCA">SCA</option>
<option value="ST">ST</option>
</select>
</div>
</div>


<div class="form-group">
<label class="col-xs-2 control-label" for="castename">CASTE NAME</label>  
<div class="col-xs-6">
<input id="cn" name="cn" style="width:222px;" type="text" placeholder="Enter caste name " maxlength="50" class="form-control input-xs" required="">
</div>
</div>

<div class="form-group">
<label class="col-xs-2 control-label" for="mother_tongue">MOTHER TONGUE</label>
<div class="col-xs-6">
<select id="mother_tongue" name="mot" style="width:222px;" class="form-control input-xs">
<option value="TAMIL">TAMIL</option>
<option value="HINDI">HINDI</option>
<option value="MALAYALAM">MALAYALAM</option>
<option value="TELUGU">TELUGU</option>
<option value="URUDU">URUDU</option>
<option value="ENGLISH">ENGLISH</option>
</select>
</div>
</div>
<br>

<div class="form-group">
<label class="col-xs-2 control-label" for="bg">BLOOD GROUP</label>  
<div class="col-xs-6">
<input id="lrn" name="bg" type="bg" style="width:222px;" placeholder="Enter Blood Group"maxlength="12" class="form-control input-xs" required="">
</div>
</div>
<div class="form-group">
<label class="col-xs-2 control-label" for="nn">NATIONALITY</label>
<div class="col-xs-8">
<div class="input-group">
<input id="nn" style="width:222px;" name="nn" class="form-control" style="text-transform: capitalize;" placeholder="Enter Nationality" type="text" required="">
</div>
</div>
</div>


<div class="form-group">
<label class="col-xs-2 control-label" for="ad">AADHAR NUMBER</label>
<div class="col-xs-7">
<div class="input-group">
<input id="anum" name="anum" class="form-control" style="text-transform: capitalize;" placeholder="Enter Aadhar Number" type="text" pattern="[0-9]{12}">
</div>
</div>
</div>
<div class="form-group">
  <label class="col-xs-2 control-label" for="num">MOBILE NUMBER</label>
  <div class="col-xs-7">
    <div class="input-group">
      <input id="num" name="num" class="form-control" style="text-transform: capitalize;" placeholder="Enter Number" type="text" pattern="[0-9]{10}">
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-xs-2 control-label" for="email">EMAIL ID</label>
  <div class="col-xs-7">
    <div class="input-group">
      <input id="email" name="email" class="form-control" style="text-transform: capitalize;" placeholder="Enter Email" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required="Enter in Correct Format">
    </div>
  </div>
</div>

<br>

<div class="col-md-20" style="width:70%;border-bottom:1px solid #333">
<hr style="width:100%;border-top:1px solid #333">
<h3><center><b>BANK DETAILS OF STUDENTS:</b></center></h3>
</div>
<br>
<div class="form-group">
<label class="col-xs-2 control-label" for="bn">BANK NAME</label>  
<div class="col-xs-6">
<input id="bn" style="width:222px;" name="bn" type="text" placeholder="Enter Bank Name " maxlength="50" class="form-control input-xs" required="">
</div>
</div>
<br>
<div class="form-group">
<label class="col-xs-2 control-label" for="bb">BANK BRANCH</label>  
<div class="col-xs-6">
<input id="bb" name="bb" style="width:222px;" type="text" placeholder="Enter Bank Branch " maxlength="50" class="form-control input-xs" required="">
</div>
</div>
<br>
<div class="form-group">
<label class="col-xs-2 control-label" for="acnum">ACCOUNT NO</label>
<div class="col-xs-7">
<div class="input-group">
<input id="acnum" style="width:222px;" name="acnum" class="form-control" style="text-transform: capitalize;" placeholder="Enter Account Number" type="text" pattern="[0-9]{15}">
</div>
</div>
</div>
<br>
<div class="form-group">
<label class="col-xs-2 control-label" for="ifsc">IFSC NO</label>  
<div class="col-xs-7">
<input id="ifsc" name="ifsc" style="width:222px;" type="text" placeholder="Enter IFSC Number " maxlength="50" class="form-control input-xs" required="">
</div>
</div>

<br>
<div class="col-md-20" style="width:70%;border-bottom:1px solid #333">
<hr style="width:100%;border-top:1px solid #333">
<h3><center><b>SSLC SCHOOL DETAILS OF STUDENTS:</b></center></h3>
</div>
<br>
<div class="form-group">
<label class="col-xs-3 control-label" for="ns1">NAME OF SCHOOL</label>  
<div class="col-xs-6">
<input id="ns1" name="ns1" type="text" style="width:222px;" placeholder="Enter Name of school " maxlength="50" class="form-control input-xs" required="">
</div>
</div>

<br>
<div class="form-group">
<label class="col-xs-3 control-label" for="10mark">10th MARK OUT OF 500 </label>  
<div class="col-xs-6">
<input id="10mark" name="10mark" style="width:222px;" type="text" placeholder="Enter 10th Mark " maxlength="50" class="form-control input-xs" required="">
</div>
</div>
<br>

<div class="form-group">
<label class="col-xs-3 control-label" for="10per">10th PERCENTAGE</label>  
<div class="col-xs-6">
<input id="10per" name="10per" type="text" style="width:222px;" placeholder="Enter 10th Percentage " maxlength="50" class="form-control input-xs" required="">
</div>
</div>
<br>

<div class="form-group">
<label class="col-xs-3 control-label" for="10yop">10th YEAR OF PASSING</label>  
<div class="col-xs-6">
<input id="10yop" name="10yop" type="text" style="width:222px;" placeholder="Enter 10th year of passing " maxlength="50" class="form-control input-xs" required="">
</div>
</div>
<br>
<div class="col-md-20" style="width:70%;border-bottom:1px solid #333">
<hr style="width:100%;border-top:1px solid #333">
<h3><center><b>HSC/ITI DETAILS OF STUDENTS:</b></center></h3>
</div>
<br>
<div class="form-group">
<label class="col-xs-3 control-label" for="ns2">NAME OF SCHOOL</label>  
<div class="col-xs-6">
<input id="ns" name="ns2" type="text" style="width:222px;" placeholder="Enter Name of school " maxlength="50" class="form-control input-xs" >
</div>
</div>

<br>

<div class="form-group">
<label class="col-xs-3 control-label" for="mg">+2 Mark/ ITI GRADE</label>  
<div class="col-xs-6">
<input id="mg" name="mg" type="text" style="width:222px;" placeholder="+2 mark/ ITI grade " maxlength="50" class="form-control input-xs" >
</div>
</div>

<br>
<div class="form-group">
<label class="col-xs-3 control-label" for="mt">+2 Mark/ ITI PERCENTAGE & TRADE</label>  
<div class="col-xs-6">
<input id="mt" name="mt" type="text" style="width:222px;" placeholder="+2 mark/ ITI percentage & trade " maxlength="50" class="form-control input-xs" >
</div>
</div>

<br>
<div class="form-group">
<label class="col-xs-3 control-label" for="mp">+2 Mark/ ITI YEAR OF PASSING</label>  
<div class="col-xs-6">
<input id="mp" name="mp" type="text" style="width:222px;" placeholder="+2 mark/ ITI year of passing " maxlength="50" class="form-control input-xs" >
</div>
</div>
<br>

<div class="col-md-20" style="width:70%;border-bottom:1px solid #333">
<hr style="width:100%;border-top:1px solid #333">
<h3><center><b>PERMANENT ADDRESS DETAILS OF STUDENT:</b></center></h3>
</div>
<br>
<div class="form-group">
<label class="col-xs-3 contol-label" for="pa">PERMANENT RESIDENTIAL ADDRESS</label>  
<div class="col-xs-7">
<textarea id="pa" name="pa" style="width:300px;height:100px;"  type="text" placeholder="Enter permanent residental address" maxlength="100" class="form-control input-xs" required=""></textarea>
</div>
</div>
<br>

<div class="form-group">
<label class="col-xs-3 control-label" for="pin">PINCODE RESIDENTIAL ADDRESS</label>  
<div class="col-xs-6">
<input id="pin" name="pin" style="width:222px;" type="text" placeholder="Enter pincode residental address " maxlength="50" class="form-control input-xs" required="">
</div>
</div>
<br>
<div class="col-md-20" style="width:70%;border-bottom:1px solid #333">
<hr style="width:100%;border-top:1px solid #333">
<h3><center><b>COMMUNICATION ADDRESS DETAILS OF STUDENT:</b></center></h3>
</div>
<br>
<label><input type="checkbox"id="same"name="same"onchange="addressFunction()" />
SAME AS PERMANENT ADDRESS</label>
<br><br><br>
<div class="form-group">
<label class="col-xs-3 control-label" for="al">ADDRESS FOR COMMUNICATION(Local Guardian)</label>  
<div class="col-xs-6">
<textarea id="al" name="al" style="width:300px;height:100px;"  type="text" placeholder="Enter Communication Address" maxlength="100" class="form-control input-xs" required=""></textarea>
</div>
</div>
<br>
<div class="form-group">
<label class="col-xs-3 control-label" for="pinl">PINCODE FOR COMMUNICATION ADDRESS</label>  
<div class="col-xs-6">
<input id="pinl" name="pinl" style="width:222px;" type="text" placeholder="Enter pincode for communication address" maxlength="50" class="form-control input-xs" required="">
</div>
</div>

<script>
function addressFunction() {
if (document.getElementById("same").checked)
 {
document.getElementById("al").value=document.getElementById("pa").value;
document.getElementById("pinl").value=document.getElementById("pin").value;
}
 else
 {
document.getElementById("al").value = "";
document.getElementById("pinl").value = "";
}
}
</script>

<br>
<div class="col-md-20" style="width:70%;border-bottom:1px solid #333">
<hr style="width:100%;border-top:1px solid #333">
<h3><center><b>DETAILS OF FATHER/GUARDIAN:</b></center></h3>
</div>
<br>
<div class="form-group">
<label class="col-xs-2 control-label" for="fan">NAME</label>  
<div class="col-xs-6">
<input id="fan" name="fan" style="width:222px;" type="text" placeholder="Enter Name" maxlength="50" class="form-control input-xs" required="">
</div>
</div>
<br>
<div class="form-group">
<label class="col-xs-2 control-label" for="do">OCCUPATION</label>  
<div class="col-xs-6">
<input id="do" name="do" style="width:222px;" type="text" placeholder="Enter designation/occupation" maxlength="50" class="form-control input-xs" required="">
</div>
</div>
<br>
<div class="form-group">
 <label class="col-xs-2 control-label" for="fnum">MOBILE NUMBER</label>
 <div class="col-xs-6">
 <div class="input-group">
 <input id="fnum" name="fnum" style="width:222px;" class="form-control" style="text-transform: capitalize;" placeholder="Enter Number" type="text" pattern="[0-9]{10}">
</div>
</div>
</div>
<br>


<div class="form-group">
<label class="col-xs-2 control-label" for="ai">ANNUAL INCOME</label>  
<div class="col-xs-6">
<input id="ai" name="ai" style="width:222px;" type="text" placeholder="Enter Annual Income" maxlength="50" class="form-control input-xs" required="">
</div>
</div>

<br>
<div class="col-md-20" style="width:70%;border-bottom:1px solid #333">
<hr style="width:100%;border-top:1px solid #333">
<h3><center><b>DETAILS OF MOTHER:</b></center></h3>
</div>
<br>
<div class="form-group">
<label class="col-xs-2 control-label" for="mn">NAME</label>  
<div class="col-xs-6">
<input id="mn" name="mn" style="width:222px;" type="text" placeholder="Enter Name" maxlength="50" class="form-control input-xs" required="">
</div>
</div>
<br>
<div class="form-group">
<label class="col-xs-2 control-label" for="mdo">OCCUPATION</label>  
<div class="col-xs-6">
<input id="mdo" name="mdo" style="width:222px;" type="text" placeholder="Enter designation/occupation" maxlength="50" class="form-control input-xs" required="">
</div>
</div>

<br>
<div class="form-group">
 <label class="col-xs-2 control-label" for="mnum">MOBILE NUMBER</label>
 <div class="col-xs-6">
 <div class="input-group">
 <input id="mnum" name="mnum" style="width:222px;" class="form-control" style="text-transform: capitalize;" placeholder="Enter Number" type="text" pattern="[0-9]{10}">
 </div>
 </div>
</div>
 <br>
<div class="form-group">
<label class="col-xs-2 control-label" for="mai">ANNUAL INCOME</label>  
<div class="col-xs-6">
<input id="mai" name="mai" type="text" style="width:222px;" placeholder="Enter Annual Income" maxlength="50" class="form-control input-xs" required="">
</div>
</div>
<br>
<div class="col-md-20" style="width:70%;border-bottom:1px solid #333">
<hr style="width:100%;border-top:1px solid #333">
<h3><center><b>PROGRAM ENROLLED</b></center></h3>
</div>
<br><br>
<div class="form-group">
  <label class="col-xs-2 control-label" for="Prog">DEPARTMENT</label>
  
  <div class="col-xs-7">
    <select style="width:222px;" id="prog" name="prog" class="form-control input-xs"  required="">
    <option></option>
    <option>Mechanical </option>
    <option>Civil</option>
    <option>Paper Technology</option>
    <option>Electrical</option>
    <option>ICE</option>
    <option>Computer</option>
    </select>
  </div>
</div>
<div class="form-group">
  <label class="col-xs-2 control-label" for="Term">TERM</label>
  <div class="col-xs-7">
    <select id="term" style="width:222px;" name="term" class="form-control input-xs" required="">
    <option></option>
    <option>I</option>
    <option>II</option>
    <option>III</option>
    <option>IV</option>
    <option>V</option>
    <option>VI</option>
    
   </select>
  </div>
</div>
<div class="form-group">
  <label class="col-xs-2 control-label" for="ay">ACADEMIC YEAR</label>
  <div class="col-xs-7">
    <select id="ay" style="width:222px;" name="ay" class="form-control input-xs" required="">
    <option></option>
    <?php
    include 'db.php';
    $sql = mysqli_query($conn,"SELECT * from college_academic_year Order by college_academic_year ASC");
    while($row=mysqli_fetch_assoc($sql)){
    ?>
      <option value="<?php echo $row['AY_ID'] ?>"><?php echo $row['college_academic_year'] ?></option>
      <?php
    }
    mysqli_close($conn);
      ?>
    
   </select>
  </div>
</div>
<div class="form-group">
  <label class="col-xs-2 control-label" for="total">TOTAL NO OF YEARS</label>
  <div class="col-xs-7">
    <select id="total" style="width:222px;" name="total" class="form-control input-xs" required="">
    <option></option>
    <option>2</option>
    <option>3</option>
    
    
   </select>
  </div>
</div>
</div>
</fieldset>





        </div>
        <div class="modal-footer">
        <!--<input type="reset" class="btn btn-success " id="reset" name="reset" value="Reset Form">-->
      <input type="submit" class="btn btn-success " name="submit" value="Submit">
      
        </form>
          <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
        </div>
      </div>
      
    </div>
  </div>



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
     <a  class="btn btn-info" data-toggle="modal" data-target="#view-modal" data-id="<?php echo $sid ?>" id="getUser">View</a>
     
       
 
     <a  class="btn btn-info"  data-target="#view-modal" data-id="<?php echo $sid ?>" id="deleteUser">Delete</a>
	 
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
 
