<div class="modal-body"> 

    <?php
    include 'db.php';
    $id = $_POST['id'];

  if($_POST['id']){
    $sql = mysqli_query($conn, "SELECT * From student_info left join program on student_info.DEPARTMENT = program.PROGRAM_ID where STUDENT_ID = '$id'");
	$sql1 = mysqli_query($conn, "SELECT * From student_bank where STUDENT_ID = '$id'");
	 $sql2 = mysqli_query($conn, "SELECT * From student_schoolinfo_sslc where STUDENT_ID = '$id'");
	 $sql3 = mysqli_query($conn, "SELECT * From student_info where STUDENT_ID = '$id'");
	 $sql4 = mysqli_query($conn, "SELECT * From student_schoolinfo_hsc_iti where STUDENT_ID = '$id'");
	 $sql5 = mysqli_query($conn, "SELECT * From student_address_pmt where STUDENT_ID = '$id'");
	 $sql6 = mysqli_query($conn, "SELECT * From student_address_communication where STUDENT_ID = '$id'");
	 $sql7 = mysqli_query($conn, "SELECT * From student_father_guardian where STUDENT_ID = '$id'");
	 $sql8 = mysqli_query($conn, "SELECT * From student_mother where STUDENT_ID = '$id'");
	 
    while($row = mysqli_fetch_assoc($sql)){
     ?>
		 <div class="col-md-20" style="width:100%;border-bottom:1px solid #333">
         <hr style="width:100%;border-top:1px solid #333">
         <h2><center><b>STUDENT'S PERSONAL DETAILS </b></center></h2>
         </div>
         <br>
         <input type="hidden" name="id" value="<?php echo $id ?>">
         <div class="row">
         <div class="col-md-5 text-right">
         <label>Profile:</label>
         </div>
         <div class="col-md-2 text-left">
          <img src="<?= $row['PROFILEPIC'] ?>" width="100" height="100">

            
          </div>

         </div><br><br>
         <div class="row">
         <div class="col-md-5 text-right">
         <label>REG NO:</label>
         </div>
         <div class="col-md-2 text-left">
          <?php echo $row['RN_NO'] ?>

            
          </div>

         </div>
         
         <div class="row">
         <div class="col-md-5 text-right">
         <label>NAME:</label>
         </div>
         <div class="col-md-4 text-left">
         <?php echo $row['FIRSTNAME']." ".$row['LASTNAME']; ?>
    
          </div>
        </div>
         <div class="row">
         <div class="col-md-5 text-right">
         <label>GENDER:</label>
         </div>
         <div class="col-md-2 text-left">
         <?php echo $row['GENDER'] ?>
          <label></label>
            
          </div>

         </div>

        <div class="row">
         <div class="col-md-5 text-right">
         <label>DATE OF BIRTH:</label>
         </div>
         <div class="col-md-2 text-left">
         <?php echo $row['DATE_OF_BIRTH'] ?>
          <label></label>
            
          </div>

         </div>
         
		 <div class="row">
         <div class="col-md-5 text-right">
         <label>RELIGION:</label>
         </div>
         <div class="col-md-4 text-left">
         <?php echo $row['RELIGION'] ?>
          <label></label>
            
          </div>

         </div>

		 <div class="row">
         <div class="col-md-5 text-right">
         <label>COMMUNITY:</label>
         </div>
         <div class="col-md-4 text-left">
          <?php echo $row['COMMUNITY'] ?>
          <label></label>
            
          </div>

         </div>

		 <div class="row">
         <div class="col-md-5 text-right">
         <label>CASTE NAME:</label>
         </div>
         <div class="col-md-4 text-left">
          <?php echo $row['CASTE_NAME'] ?>
          <label></label>
            
          </div>

         </div>

         <div class="row">
         <div class="col-md-5 text-right">
         <label>MOTHER TONGUE:</label>
         </div>
         <div class="col-md-4 text-left">
          <?php echo $row['MOTHER_TONGUE'] ?>
          <label></label>
            
          </div>

         </div>

		 
		 <div class="row">
         <div class="col-md-5 text-right">
         <label>BLOOD GROUP:</label>
         </div>
         <div class="col-md-4 text-left">
          <?php echo $row['BLOOD_GROUP'] ?>
          <label></label>
            
          </div>

         </div>

		 <div class="row">
         <div class="col-md-5 text-right">
         <label>NUMBER:</label>
         </div>
         <div class="col-md-4 text-left">
          <?php echo $row['NUMBER'] ?>
          <label></label>
            
          </div>

         </div>

		 <div class="row">
         <div class="col-md-5 text-right">
         <label>EMAIL:</label>
         </div>
         <div class="col-md-4 text-left">
          <?php echo $row['EMAIL'] ?>
          <label></label>
            
          </div>

         </div>

		 <div class="row">
         <div class="col-md-5 text-right">
         <label>NATIONALITY:</label>
         </div>
         <div class="col-md-4 text-left">
          <?php echo $row['NATIONALITY'] ?>
          <label></label>
            
          </div>

         </div>

		 <div class="row">
         <div class="col-md-5 text-right">
         <label>AADHAR:</label>
         </div>
         <div class="col-md-4 text-left">
          <?php echo $row['AADHAR'] ?>
          <label></label>
            
          </div>
</div>
 <?php }       
while($row = mysqli_fetch_assoc($sql1)){
     ?>
		 <div class="col-md-20" style="width:100%;border-bottom:1px solid #333">
         <hr style="width:100%;border-top:1px solid #333">
         <h3><center><b>BANK DETAILS OF STUDENTS:</b></center></h3>
         </div>
         <br>
		 <div class="row">
         <div class="col-md-5 text-right">
         <label>BANK NAME:</label>
         </div>
         <div class="col-md-4 text-left">
          <?php echo $row['BANK_NAME'] ?>
          <label></label>
            
          </div>

         </div>

		 <div class="row">
         <div class="col-md-5 text-right">
         <label>BANK BRANCH:</label>
         </div>
         <div class="col-md-4 text-left">
          <?php echo $row['BRANCH'] ?>
          <label></label>
            
          </div>

         </div>

		 <div class="row">
         <div class="col-md-5 text-right">
         <label>ACCOUNT NO:</label>
         </div>
         <div class="col-md-4 text-left">
          <?php echo $row['ACC_NUM'] ?>
          <label></label>
            
          </div>

         </div>

		 <div class="row">
         <div class="col-md-5 text-right">
         <label>IFSC NO:</label>
         </div>
         <div class="col-md-4 text-left">
          <?php echo $row['IFSC'] ?>
          <label></label>
            
          </div>

         </div>
<?php }
		 while($row = mysqli_fetch_assoc($sql2)){?> 
		 <div class="col-md-20" style="width:100%;border-bottom:1px solid #333">
         <hr style="width:100%;border-top:1px solid #333">
         <h3><center><b>SSLC SCHOOL DETAILS OF STUDENTS:</b></center></h3>
         </div>
		 <br>
         <div class="row">
         <div class="col-md-5 text-right">
         <label>SCHOOL NAME:</label>
         </div>
         <div class="col-md-4 text-left">
          <?php echo $row['SCHOOL_NAME'] ?>
          <label></label>
            
          </div>

         </div>
		 <div class="row">
         <div class="col-md-5 text-right">
         <label>10th MARK OUT OF 500:</label>
         </div>
         <div class="col-md-4 text-left">
          <?php echo $row['10TH_MARK'] ?>
          <label></label>
            
          </div>

         </div>

		 <div class="row">
         <div class="col-md-5 text-right">
         <label>10th PERCENTAGE:</label>
         </div>
         <div class="col-md-4 text-left">
          <?php echo $row['10TH_PERCENTAGE'] ?>
          <label></label>
            
          </div>

         </div>

		 <div class="row">
         <div class="col-md-5 text-right">
         <label>10th YEAR OF PASSING:</label>
         </div>
         <div class="col-md-4 text-left">
          <?php echo $row['10TH_YOP'] ?>
          <label></label>
            
          </div>

         </div>

		 <?php }
		 while($row = mysqli_fetch_assoc($sql4)){?>

	     <div class="col-md-20" style="width:100%;border-bottom:1px solid #333">
         <hr style="width:100%;border-top:1px solid #333">
         <h3><center><b>HSC\ITI SCHOOL DETAILS OF STUDENTS:</b></center></h3>
         </div>
		  <br>
		 <div class="row">
         <div class="col-md-5 text-right">
         <label>SCHOOL NAME:</label>
         </div>
         <div class="col-md-4 text-left">
          <?php echo $row['SCHOOL_ITI_NAME'] ?>
          <label></label>
            
          </div>

         </div>
		 <div class="row">
         <div class="col-md-5 text-right">
         <label>+2 Mark/ITI MARK:</label>
         </div>
         <div class="col-md-4 text-left">
          <?php echo $row['12TH_ITI_MARK'] ?>
          <label></label>
            
          </div>

         </div>

		 <div class="row">
         <div class="col-md-5 text-right">
         <label>+2 Mark/ ITI YEAR OF PASSING:</label>
         </div>
         <div class="col-md-4 text-left">
          <?php echo $row['12TH_ITI_YOP'] ?>
          <label></label>
            
          </div>

         </div>

		 <div class="row">
         <div class="col-md-5 text-right">
         <label>+2 Mark/ ITI PERCENTAGE & TRADE:</label>
         </div>
         <div class="col-md-4 text-left">
          <?php echo $row['12TH_ITI_YOP'] ?>
          <label></label>
            
          </div>

         </div>
<?php } while($row = mysqli_fetch_assoc($sql5)){?>
		 <div class="col-md-20" style="width:100%;border-bottom:1px solid #333">
         <hr style="width:100%;border-top:1px solid #333">
         <h3><center><b>PERMANENT ADDRESS DETAILS OF STUDENT:</b></center></h3>
         </div>
         <br>
		 <div class="row">
         <div class="col-md-5 text-right">
         <label>PERMANENT RESIDENTIAL ADDRESS:</label>
         </div>
         <div class="col-md-4 text-left">
          <?php echo $row['ADDRESS'] ?>
          <label></label>
            
          </div>

         </div>
         <br><br>
		 <div class="row">
         <div class="col-md-5 text-right">
         <label>PINCODE RESIDENTIAL ADDRESS:</label>
         </div>
         <div class="col-md-4 text-left">
          <?php echo $row['PINCODE'] ?>
          <label></label>
            
          </div>

         </div>
<?php } while($row = mysqli_fetch_assoc($sql6)){?>
		 <div class="col-md-20" style="width:100%;border-bottom:1px solid #333">
         <hr style="width:100%;border-top:1px solid #333">
         <h3><center><b>COMMUNICATION ADDRESS DETAILS OF STUDENT:</b></center></h3>
         </div>
		 <br>
		 
		 <div class="row">
         <div class="col-md-5 text-right">
         <label>ADDRESS FOR COMMUNICATION(Local Guardian):</label>
         </div>
         <div class="col-md-4 text-left">
          <?php echo $row['ADDRESS'] ?>
          <label></label>
		  </div>
            
          </div>
		  <br><br>
		  <div class="row">
         <div class="col-md-5 text-right">
         <label>PINCODE FOR COMMUNICATION ADDRESS:</label>
         </div>
         <div class="col-md-4 text-left">
          <?php echo $row['PINCODE'] ?>
          <label></label>
            
          </div>

         </div>
<?php } while($row = mysqli_fetch_assoc($sql7)){?>
		 <div class="col-md-20" style="width:100%;border-bottom:1px solid #333">
         <hr style="width:100%;border-top:1px solid #333">
         <h3><center><b>DETAILS OF FATHER/GUARDIAN:</b></center></h3>
         </div>
         <br>
	     <div class="row">
         <div class="col-md-5 text-right">
         <label>NAME:</label>
         </div>
         <div class="col-md-4 text-left">
          <?php echo $row['NAME'] ?>
          <label></label>
            
          </div>

         </div>

		 <div class="row">
         <div class="col-md-5 text-right">
         <label>OCCUPATION:</label>
         </div>
         <div class="col-md-4 text-left">
          <?php echo $row['OCCUPATION'] ?>
          <label></label>
            
          </div>

         </div>

		 <div class="row">
         <div class="col-md-5 text-right">
         <label>MOBILE NUMBER:</label>
         </div>
         <div class="col-md-4 text-left">
          <?php echo $row['MOBILE'] ?>
          <label></label>
            
          </div>

         </div>

		 

		 <div class="row">
         <div class="col-md-5 text-right">
         <label>ANNUAL INCOME:</label>
         </div>
         <div class="col-md-4 text-left">
          <?php echo $row['ANNUAL_INCOME'] ?>
          <label></label>
            
          </div>

         </div>
<?php } while($row = mysqli_fetch_assoc($sql8)){?>
		 <div class="col-md-20" style="width:100%;border-bottom:1px solid #333">
         <hr style="width:100%;border-top:1px solid #333">
         <h3><center><b>DETAILS OF MOTHER:</b></center></h3>
         </div>
         <br>
		<div class="row">
         <div class="col-md-5 text-right">
         <label>NAME:</label>
         </div>
         <div class="col-md-4 text-left">
          <?php echo $row['NAME'] ?>
          <label></label>
            
          </div>

         </div>

		 <div class="row">
         <div class="col-md-5 text-right">
         <label>OCCUPATION:</label>
         </div>
         <div class="col-md-4 text-left">
          <?php echo $row['OCCUPATION'] ?>
          <label></label>
            
          </div>

         </div>

		 <div class="row">
         <div class="col-md-5 text-right">
         <label>MOBILE NUMBER:</label>
         </div>
         <div class="col-md-4 text-left">
          <?php echo $row['MOBILE'] ?>
          <label></label>
            
          </div>

         </div>

		 

		 <div class="row">
         <div class="col-md-5 text-right">
         <label>ANNUAL INCOME:</label>
         </div>
         <div class="col-md-4 text-left">
          <?php echo $row['ANNUAL_INCOME'] ?>
          <label></label>
            
          </div>

         </div>

         
        <?php }while($row = mysqli_fetch_assoc($sql3)){?>
			<br>
         <div class="col-md-20" style="width:100%;border-bottom:1px solid #333">
         <hr style="width:100%;border-top:1px solid #333">
         <h3><center><b>DEPARTMENT DETAILS:</b></center></h3>
         </div>
		 <br>
		 <div class="row">
         <div class="col-md-5 text-right">
         <label>DEPARTMENT ENROLLED:</label>
         </div>
         <div class="col-md-2 text-left">
         <?php echo $row['DEPARTMENT'] ?>
          <label></label>
            
          </div>

         </div>
		 <div class="row">
         <div class="col-md-5 text-right">
         <label>TERM:</label>
         </div>
         <div class="col-md-2 text-left">
         <?php echo $row['TERM'] ?>
          <label></label>
            
          </div>

         </div>
		 <br>
		 
         <div class="row">
         <div class="col-md-8 text-right">
         <!-- <button type="submit" class="btn btn-info"><i class="fa fa-pencil-square" aria-hidden="true"></i> Update</button> -->
          
          </div>

         </div>
         </div>
         </div>
         <div class="modal-footer">
           <a  class="btn btn-default" href="rms.php?page=student_p&id=<?php echo $id ?>">UPDATE</a>
                  
         <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>  
         </div>
        
       

        

    <?php
    }}
     mysqli_close($conn);
     ?>




 