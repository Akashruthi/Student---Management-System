 
 <script>
  jQuery(document).ready(function(){
    $('#messsage').hide(); 
    
  });  
        </script>
  <div class="row">
    <div class="col-md-1 text-right">
      <a type="button" class="btn btn-info" href="rms.php?page=Students" >
	  <i class="fa fa-chevron-circle-left" aria-hidden="true"></i>BACK</a>
    </div>
    </div>
    <div class="row">
    <div class="col-md-4">
    </div>
    <div class="col-md-4">
    <?php include 'update_student.php'; ?>
    </div>
    <div class="col-md-4">
    </div>
    </div>

    

    <?php
    include 'db.php';
    $id = $_GET['id'];
	$sql = mysqli_query($conn, "SELECT * From student_info where STUDENT_ID = '$id' ");
	while($row = mysqli_fetch_assoc($sql)){
     ?>
     <div class="container">
         <div class="col-md-12">
         <form method="post" enctype="multipart/form-data">
         <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>"

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
         <h3><center><b>STUDENT'S PERSONAL DETAILS </b></center></h3>
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
         <div class="row">
         <div class="col-md-2 text-right">
         <label>Change:</label>
         </div>
         <div class="col-md-2 text-center">
          <input type="file" name="profilepic"/>

            
          </div>

         </div>
         <br><br>
         
         <div class="row">
         <div class="col-md-2 text-right">
         <label>REG NO:</label>
         </div>
         <div class="col-md-2 text-center">
          <input type="text" maxlength="12" class="form-control input-xs"  name="lrn" value="<?php echo $row['RN_NO'] ?>"
          <br>
          <label></label>
            
          </div>

         </div>

         <div class="row">
         <div class="col-md-2 text-right">
         <label>NAME:</label>
         </div>
         <div class="col-md-2 text-center">
         <input type="text" class="form-control input-xs"  name="fname" value="<?php echo $row['FIRSTNAME'] ?>"
         <br>
          <label style="font-size:10px">(FIRST NAME)</label>
            
          </div>
          <div class="col-md-2 text-center">
          <input type="text" class="form-control input-xs"  name="lname" value="<?php echo $row['LASTNAME'] ?>"
          <br>
          <label style="font-size:10px">(LAST NAME)</label>
            
          </div>
          

        </div>
         <div class="row">
         <div class="col-md-2 text-right">
         <label>GENDER:</label>
         </div>
         <div class="col-md-2 text-center">
          <select type="text" class="form-control input-xs"  name="gender">
          <option><?php echo $row['GENDER'] ?></option>
          <?php if($row['GENDER']=='MALE'){
              echo '<option>FEMALE</option>';

          }
          else{
             echo '<option>MALE</option>';
          }?>
          </select>
      
          <label></label>
            
          </div>

         </div>

        <div class="row">
         <div class="col-md-2 text-right">
         <label>DATE OF BIRTH:</label>
         </div>
         <div class="col-md-2 text-center">
          <input type="date" class="form-control input-xs"  name="dob" value="<?php echo $row['DATE_OF_BIRTH'] ?>"
          <br>
          <label></label>
            
          </div>

         </div>

		 <div class="row">
         <div class="col-md-2 text-right">
         <label>RELIGION:</label>
         </div>
         <div class="col-md-2 text-center">
          <select type="text" class="form-control input-xs"  name="religion">
          <option><?php echo $row['RELIGION'] ?></option>
          <?php if($row['RELIGION']=='HINDU'){
              echo '<option>MUSLIM</option>';
			  echo '<option>CHRISTIAN</option>';

          }
          elseif($row['RELIGION']=='MUSLIM'){
              echo '<option>HINDU</option>';
			  echo '<option>CHRISTIAN</option>';

          }
		  elseif($row['RELIGION']=='CHRISTIAN'){
              echo '<option>HINDU</option>';
			  echo '<option>MUSLIM</option>';

          }?>
          </select>
      
          <label></label>
            
          </div>

         </div>

		 <div class="row">
         <div class="col-md-2 text-right">
         <label>COMMUNITY:</label>
         </div>
         <div class="col-md-2 text-center">
          <select type="text" class="form-control input-xs"  name="comm">
          <option><?php echo $row['COMMUNITY'] ?></option>
          <?php if($row['COMMUNITY']=='OC'){
              echo '<option>BC</option>';
              echo '<option>MBC</option>';
              echo '<option>SC</option>';
              echo '<option>SCA</option>';
              echo '<option>ST</option>';

          }
          elseif($row['COMMUNITY']=='BC'){
              echo '<option>OC</option>';
              echo '<option>MBC</option>';
              echo '<option>SC</option>';
              echo '<option>SCA</option>';
              echo '<option>ST</option>';

          }
		  elseif($row['COMMUNITY']=='MBC'){
              echo '<option>OC</option>';
              echo '<option>BC</option>';
              echo '<option>SC</option>';
              echo '<option>SCA</option>';
              echo '<option>ST</option>';

          }
		  elseif($row['COMMUNITY']=='SC'){
              echo '<option>OC</option>';
              echo '<option>BC</option>';
              echo '<option>MBC</option>';
              echo '<option>SCA</option>';
              echo '<option>ST</option>';

          }
		  elseif($row['COMMUNITY']=='SCA'){
              echo '<option>OC</option>';
              echo '<option>BC</option>';
              echo '<option>MBC</option>';
              echo '<option>SC</option>';
              echo '<option>ST</option>';

          }
		  elseif($row['COMMUNITY']=='ST'){
              echo '<option>OC</option>';
              echo '<option>BC</option>';
              echo '<option>MBC</option>';
              echo '<option>SC</option>';
              echo '<option>SCA</option>';
              

          }?>
          </select>
      
          <label></label>
            
          </div>

         </div>


		 <div class="row">
         <div class="col-md-2 text-right">
         <label>CASTE NAME:</label>
         </div>
		 <div class="col-md-4 text-center">
          <input type="text" rows="2" class="form-control input-xs"  name="cn" value="<?php echo $row['CASTE_NAME'] ?>">
          
          <label></label>
            
          </div>
		 </div>

		 <div class="row">
         <div class="col-md-2 text-right">
         <label>MOTHER TONGUE:</label>
         </div>
		 <div class="col-md-4 text-center">
          <input type="text" rows="2" class="form-control input-xs"  name="mot" value="<?php echo $row['MOTHER_TONGUE'] ?>">
          
          <label></label>
            
          </div>
		 </div>

		 <div class="row">
         <div class="col-md-2 text-right">
         <label>BLOOD GROUP:</label>
         </div>
		 <div class="col-md-4 text-center">
          <input type="text" rows="2" class="form-control input-xs"  name="bg" value="<?php echo $row['BLOOD_GROUP'] ?>">
          
          <label></label>
            
          </div>
		 </div>

		<div class="row">
         <div class="col-md-2 text-right">
         <label>NATIONALITY:</label>
         </div>
         <div class="col-md-4 text-center">
          <input type="text" rows="2" class="form-control input-xs"  name="nn" value="<?php echo $row['NATIONALITY'] ?>">
          
          <label></label>
            
          </div>

         </div>


		 <div class="row">
         <div class="col-md-2 text-right">
         <label>AADHAR NUMBER:</label>
         </div>
		 <div class="col-md-4 text-center">
          <input type="text" rows="2" class="form-control input-xs"  name="anum" value="<?php echo $row['AADHAR'] ?>">
          
          <label></label>
            
          </div>
		 </div>

		 <div class="row">
         <div class="col-md-2 text-right">
         <label>MOBILE NUMBER:</label>
         </div>
		 <div class="col-md-4 text-center">
          <input type="text" rows="2" class="form-control input-xs"  name="num" value="<?php echo $row['NUMBER'] ?>">
          
          <label></label>
            
          </div>
		 </div>

		<div class="row">
         <div class="col-md-2 text-right">
         <label>EMAIL ID:</label>
         </div>
         <div class="col-md-4 text-center">
          <input type="text" rows="2" class="form-control input-xs"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="email" value="<?php echo $row['EMAIL'] ?>">
          
          <label></label>
		  </div>
            
          </div>

         
<?php }?>
		 <?php 
         include 'db.php';
		 $sql10 = mysqli_query($conn, "SELECT * From student_bank where STUDENT_ID = '$id'");
		 while($row = mysqli_fetch_assoc($sql10)){
     ?>  <div>
	     <hr style="width:95%;border-top:3px solid #cc9933">
         <h3><center><b>BANK DETAILS OF STUDENTS </b></center></h3>
		 <hr style="width:95%;border-top:3px solid #cc9933">
         </div>
		 
		 <div class="row">
         <div class="col-md-2 text-right">
         <label>BANK NAME:</label>
         </div>
		 <div class="col-md-4 text-center">
          <input type="text" rows="2" class="form-control input-xs"  name="bn" value="<?php echo $row['BANK_NAME'] ?>">
          
          <label></label>
            
          </div>
		 </div>

		 
		 <div class="row">
         <div class="col-md-2 text-right">
         <label>BANK BRANCH:</label>
         </div>
		 <div class="col-md-4 text-center">
          <input type="text" rows="2" class="form-control input-xs"  name="bb" value="<?php echo $row['BRANCH'] ?>">
          
          <label></label>
            
          </div>
		 </div>

		 
		 <div class="row">
         <div class="col-md-2 text-right">
         <label>ACCOUNT NO:</label>
         </div>
		 <div class="col-md-4 text-center">
          <input type="text" rows="2" class="form-control input-xs"  name="acnum" value="<?php echo $row['ACC_NUM'] ?>">
          
          <label></label>
            
          </div>
		 </div>

		 
		 <div class="row">
         <div class="col-md-2 text-right">
         <label>IFSC NO:</label>
         </div>
		 <div class="col-md-4 text-center">
          <input type="text" rows="2" class="form-control input-xs"  name="ifsc" value="<?php echo $row['IFSC'] ?>">
          
          <label></label>
            
          </div>
		 </div>
<?php }?>
		 <?php 
         include 'db.php';
		 $sql2 = mysqli_query($conn, "SELECT * From student_schoolinfo_sslc where STUDENT_ID = '$id'");
		 while($row = mysqli_fetch_assoc($sql2)){
     ?>
		 <div>
		 <hr style="width:95%;border-top:3px solid #cc9933">
         <h3><center><b>SSLC SCHOOL DETAILS OF STUDENTS </b></center></h3>
		 <hr style="width:95%;border-top:3px solid #cc9933">
         </div>

		 <div class="row">
         <div class="col-md-2 text-right">
         <label>NAME OF SCHOOL:</label>
         </div>
		 <div class="col-md-4 text-center">
          <input type="text" rows="2" class="form-control input-xs"  name="ns1" value="<?php echo $row['SCHOOL_NAME'] ?>">
          
          <label></label>
            
          </div>
		 </div>
		 <div class="row">
         <div class="col-md-2 text-right">
         <label>10th MARK OUT OF 500:</label>
         </div>
		 <div class="col-md-4 text-center">
          <input type="text" rows="2" class="form-control input-xs"  name="10mark" value="<?php echo $row['10TH_MARK'] ?>">
          
          <label></label>
            
          </div>
		 </div>

		 
		 <div class="row">
         <div class="col-md-2 text-right">
         <label>10th PERCENTAGE:</label>
         </div>
		 <div class="col-md-4 text-center">
          <input type="text" rows="2" class="form-control input-xs"  name="10per" value="<?php echo $row['10TH_PERCENTAGE'] ?>">
          
          <label></label>
            
          </div>
		 </div>

		 
		 <div class="row">
         <div class="col-md-2 text-right">
         <label>10th YEAR OF PASSING:</label>
         </div>
		 <div class="col-md-4 text-center">
          <input type="text" rows="2" class="form-control input-xs"  name="10yop" value="<?php echo $row['10TH_YOP'] ?>">
          
          <label></label>
            
          </div>
		 </div>


		 
<?php } ?>
<?php 
         include 'db.php';
		 $sql3 = mysqli_query($conn, "SELECT * From student_schoolinfo_hsc_iti where STUDENT_ID = '$id'");
		 while($row = mysqli_fetch_assoc($sql3)){
     ?>
		 <div>
		 <hr style="width:95%;border-top:3px solid #cc9933">
         <h3><center><b>HSC\ITI SCHOOL DETAILS OF STUDENTS </b></center></h3>
		 <hr style="width:95%;border-top:3px solid #cc9933">
         </div>
		 <div class="row">
         <div class="col-md-2 text-right">
         <label>NAME OF SCHOOL:</label>
         </div>
		 <div class="col-md-4 text-center">
          <input type="text" rows="2" class="form-control input-xs"  name="ns2" value="<?php echo $row['SCHOOL_ITI_NAME'] ?>">
          
          <label></label>
            
          </div>
		 </div>
		 <div class="row">
         <div class="col-md-2 text-right">
         <label>+2 Mark/ ITI GRADE:</label>
         </div>
		 <div class="col-md-4 text-center">
          <input type="text" rows="2" class="form-control input-xs"  name="mg" value="<?php echo $row['12TH_ITI_MARK'] ?>">
          
          <label></label>
            
          </div>
		 </div>

         <div class="row">
         <div class="col-md-2 text-right">
         <label>+2 Mark/ ITI PERCENTAGE & TRADE:</label>
         </div>
		 <div class="col-md-4 text-center">
          <input type="text" rows="2" class="form-control input-xs"  name="mp" value="<?php echo $row['12TH_ITI_PERCENTAGE'] ?>">
          
          <label></label>
            
          </div>
		 </div>
		 <div class="row">
         <div class="col-md-2 text-right">
         <label>+2 Mark/ ITI YEAR OF PASSING:</label>
         </div>
		 <div class="col-md-4 text-center">
          <input type="text" rows="2" class="form-control input-xs"  name="mt" value="<?php echo $row['12TH_ITI_YOP'] ?>">
          
          <label></label>
            
          </div>
		 </div>
<?php } ?>
	<?php 
         include 'db.php';
		 $sql4 = mysqli_query($conn, "SELECT * From student_address_pmt where STUDENT_ID = '$id'");
		 while($row = mysqli_fetch_assoc($sql4)){
     ?>
		 <div>
         <hr style="width:95%;border-top:3px solid #cc9933">
         <h3><center><b>PERMANENT ADDRESS DETAILS OF STUDENTS </b></center></h3>
		 <hr style="width:95%;border-top:3px solid #cc9933">
         </div>

		 <div class="row">
         <div class="col-md-2 text-right">
         <label>PERMANENT RESIDENTIAL ADDRESS:</label>
         </div>
		 <div class="col-md-4 text-center">
          <textarea type="text" rows="2" class="form-control input-xs" style="width:300px;height:100px;" name="pa" ><?php echo $row['ADDRESS'] ?></textarea>
          
          <label></label>
            
          </div>
		 </div>

		 <div class="row">
         <div class="col-md-2 text-right">
         <label>PINCODE RESIDENTIAL ADDRESS:</label>
         </div>
		 <div class="col-md-4 text-center">
          <input type="text" rows="2" class="form-control input-xs"  name="pin" value="<?php echo $row['PINCODE'] ?>">
          
          <label></label>
            
          </div>
		 </div>
		 <?php } ?>
		<?php 
         include 'db.php';
		 $sql5 = mysqli_query($conn, "SELECT * From student_address_communication where STUDENT_ID = '$id'");
		 while($row = mysqli_fetch_assoc($sql5)){
     ?>
         <div>
         <hr style="width:95%;border-top:3px solid #cc9933">
         <h3><center><b>COMMUNICATION ADDRESS DETAILS OF STUDENTS </b></center></h3>
		 <hr style="width:95%;border-top:3px solid #cc9933">
         </div>
		 <div class="row">
         <div class="col-md-2 text-right">
         <label>ADDRESS FOR COMMUNICATION(Local Guardian):</label>
         </div>
		 <div class="col-md-4 text-center">
          <textarea type="text" rows="2" class="form-control input-xs" style="width:300px;height:100px;" name="al"><?php echo $row['ADDRESS'] ?></textarea>
          
          <label></label>
            
          </div>
		 </div>


		 <div class="row">
         <div class="col-md-2 text-right">
         <label>PINCODE FOR COMMUNICATION ADDRESS:</label>
         </div>
		 <div class="col-md-4 text-center">
          <input type="text" rows="2" class="form-control input-xs"  name="pinl" value="<?php echo $row['PINCODE'] ?>">
          
          <label></label>
            
          </div>
		 </div>
<?php } ?>
	<?php 
         include 'db.php';
		 $sql6 = mysqli_query($conn, "SELECT * From student_father_guardian where STUDENT_ID = '$id'");
		 while($row = mysqli_fetch_assoc($sql6)){
     ?>
		 <div>
		 <hr style="width:95%;border-top:3px solid #cc9933">
         <h3><center><b>DETAILS OF FATHER/GUARDIAN </b></center></h3>
		 <hr style="width:95%;border-top:3px solid #cc9933">
         </div>


		 <div class="row">
         <div class="col-md-2 text-right">
         <label>NAME:</label>
         </div>
		 <div class="col-md-4 text-center">
          <input type="text" rows="2" class="form-control input-xs"  name="fan" value="<?php echo $row['NAME'] ?>">
          
          <label></label>
            
          </div>
		 </div>

		 <div class="row">
         <div class="col-md-2 text-right">
         <label>OCCUPATION:</label>
         </div>
		 <div class="col-md-4 text-center">
          <input type="text" rows="2" class="form-control input-xs"  name="do" value="<?php echo $row['OCCUPATION'] ?>">
          
          <label></label>
            
          </div>
		 </div>


		 <div class="row">
         <div class="col-md-2 text-right">
         <label>MOBILE NUMBER:</label>
         </div>
		 <div class="col-md-4 text-center">
          <input type="text" rows="2" class="form-control input-xs"  name="fnum" value="<?php echo $row['MOBILE'] ?>">
          
          <label></label>
            
          </div>
		 </div>


		 <div class="row">
         <div class="col-md-2 text-right">
         <label>ANNUAL INCOME:</label>
         </div>
		 <div class="col-md-4 text-center">
          <input type="text" rows="2" class="form-control input-xs"  name="ai" value="<?php echo $row['ANNUAL_INCOME'] ?>">
          
          <label></label>
            
          </div>
		 </div>
<?php } ?>
	<?php 
         include 'db.php';
		 $sql7 = mysqli_query($conn, "SELECT * From student_mother where STUDENT_ID = '$id'");
		 while($row = mysqli_fetch_assoc($sql7)){
     ?>
		 <div>
		 <hr style="width:95%;border-top:3px solid #cc9933">
         <h3><center><b>DETAILS OF MOTHER </b></center></h3>
		 <hr style="width:95%;border-top:3px solid #cc9933">
         </div>

		 <div class="row">
         <div class="col-md-2 text-right">
         <label>NAME:</label>
         </div>
		 <div class="col-md-4 text-center">
          <input type="text" rows="2" class="form-control input-xs"  name="mn" value="<?php echo $row['NAME'] ?>">
          
          <label></label>
            
          </div>
		 </div>

		 <div class="row">
         <div class="col-md-2 text-right">
         <label>OCCUPATION:</label>
         </div>
		 <div class="col-md-4 text-center">
          <input type="text" rows="2" class="form-control input-xs"  name="mdo" value="<?php echo $row['OCCUPATION'] ?>">
          
          <label></label>
            
          </div>
		 </div>


		 <div class="row">
         <div class="col-md-2 text-right">
         <label>MOBILE NUMBER:</label>
         </div>
         <div class="col-md-4 text-center">
          <input type="text" rows="2" class="form-control input-xs"  name="mnum" pattern="[0-9]{10}" value="<?php echo $row['MOBILE'] ?>">
          <label></label>
		  </div>
		  </div>
		  </div>
		 <div class="row">
         <div class="col-md-2 text-right">
         <label>ANNUAL INCOME:</label>
         </div>
		 <div class="col-md-4 text-center">
          <input type="text" rows="2" class="form-control input-xs"  name="mai" value="<?php echo $row['ANNUAL_INCOME'] ?>">
          
          <label></label>
            
          </div>
		 </div>
		 <?php } ?>
    <?php
    include 'db.php';
    $sql8 = mysqli_query($conn, "SELECT * From student_info where STUDENT_ID = '$id' ");
	while($row = mysqli_fetch_assoc($sql8)){
	?>   <div>
		 <hr style="width:95%;border-top:3px solid #cc9933">
         <h3><center><b>DEPARTMENT DETAILS </b></center></h3>
		 <hr style="width:95%;border-top:3px solid #cc9933">
         </div>
         <div class="row">
         <div class="col-md-2 text-right">
         <label>DEPARTMENT ENROLLED:</label>
         </div>
         <div class="col-md-2 text-center">
         <select id="prog" name="prog" class="form-control input-xs" required="">
        <option value=""><?php echo $row['DEPARTMENT'] ?></option>
        <option>Mechanical </option>
        <option>Civil</option>
        <option>Paper Technology</option>
        <option>Electrical</option>
        <option>ICE</option>
        <option>Computer</option>
      
      
    </select>          <br>
          <label></label>
            
          </div>

         </div>
		 <div class="row">
         <div class="col-md-2 text-right">
         <label>TERM:</label>
         </div>
         <div class="col-md-2 text-center">
         <select id="term" name="term" class="form-control input-xs" required="">
        <option value=""><?php echo $row['TERM'] ?></option>
        <option>I</option>
    <option>II</option>
    <option>III</option>
    <option>IV</option>
    <option>V</option>
    <option>VI</option>
		<?php
    }
      ?>
    
    </select>          <br>
          <label></label>
            
          </div>

         </div>
         <div class="row">
         <div class="col-md-8 text-right">
          <button type="submit" class="btn btn-info"><i class="fa fa-pencil-square" aria-hidden="true"></i> UPDATE</button>
          
          </div>

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


   
