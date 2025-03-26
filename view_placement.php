<div class="modal-body"> 

    <?php
    include 'db.php';
    $id = $_POST['id'];

  if($_POST['id']){
    $sql = mysqli_query($conn, "SELECT * From student_info where STUDENT_ID = '$id'");
    $sql1 = mysqli_query($conn, "SELECT * From student_placement where STUDENT_ID = '$id'");
    $sql2 = mysqli_query($conn, "SELECT * From student_placement_letter where STUDENT_ID = '$id'");
	
	 
    while($row = mysqli_fetch_assoc($sql)){
     ?>
		 <div class="col-md-20" style="width:100%;border-bottom:1px solid #333">
         <hr style="width:100%;border-top:1px solid #333">
         <h2><center><b>STUDENT'S PLACEMENT DETAILS </b></center></h2>
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
        <?php } 
while($row = mysqli_fetch_assoc($sql1)){
  ?>
         <div class="row">
         <div class="col-md-5 text-right">
         <label>STATUS:</label>
         </div>
         <div class="col-md-2 text-left">
         <?php echo $row['STATUS'] ?>
          <label></label>
            
          </div>

         </div>

        <div class="row">
         <div class="col-md-5 text-right">
         <label>COMPANY:</label>
         </div>
         <div class="col-md-2 text-left">
         <?php echo $row['COMPANY'] ?>
          <label></label>
            
          </div>

         </div>
         
         <div class="row">
         <div class="col-md-5 text-right">
         <label>OFFER LETTER:</label>
         </div>
 <?php }       
  while($row = mysqli_fetch_assoc($sql2)){
  if($row['LETTER']=="NILL"){
    ?><div class="col-md-2 text-left">
         <?php echo "NILL" ?>
          <label></label>
            
          </div>

         </div>

  <?php }else{
  
    ?>
    <embed type="application/pdf" src="<?php echo $row['LETTER'] ; ?>" width="896" height="700">
    <?php
  }}}     mysqli_close($conn);
     ?>
 <div class="modal-footer">
           <a  class="btn btn-default" href="rms.php?page=update_student_placement&id=<?php echo $id ?>">UPDATE</a>
                  
         <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>  
         </div>



