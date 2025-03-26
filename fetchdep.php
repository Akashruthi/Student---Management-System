<head>

    
    
    <link href="asset/css/bootstrap.min.css" rel="stylesheet">
    <link href="asset/css/sb-admin.css" rel="stylesheet">
    <link href="asset/css/plugins/morris.css" rel="stylesheet">
    <link href="asset/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="datatables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="asset/css/styles.css" rel="stylesheet">
    
    <script src="assets/js/jquery.min.js"></script>
    <script src="datatables/jquery.dataTables.js"></script>
    <script src="datatables/dataTables.bootstrap.js"></script>
    <script src="asset/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/ie-emulation-modes-warning.js"></script>


</head>

  


<?php
include  'db.php';

if(isset($_POST['request'] || $_POST['request1'] )){
    $request=$_POST['request'];
    $request1=$_POST['request1'];
    $query="SELECT * FROM student_info where DEPARTMENT='$request' AND TERM="$request1" ";
    $result=mysqli_query($conn,$query);
    $count=mysqli_num_rows($result);
    
    
    ?>

<table id="table" class="table table-bordered table-condensed">
        <?php
        if($count){
            ?>
            <thead>
      <tr >
        <th style="width:10%;text-align:center">REGNO</th>
		<th style="width:30%;text-align:center">NAME</th>
		<th style="width:20%;text-align:center">DEPARTMENT</th>
        <th style="width:20%;text-align:center">TERM</th>
		<th style="width:20%;text-align:center">ACTION</th>
      </tr>
      <?php}
      else{

          echo"Sorry! No Record Found";
      }
      ?>
    </thead>
    <tbody> 
           <?php
           while($row=mysqli_fetch_assoc($result)){
            $sid = $row['STUDENT_ID'];
               ?>
               <tr>
                   <td><?php echo $row['RN_NO'] ?></td>
                   <td><?php echo $row['FIRSTNAME'] . ' ' . $row['LASTNAME']?></td>
                   <td style="text-align:center"><?php echo $row['DEPARTMENT'] ?></td>
                   <td style="text-align:center"><?php echo $row['TERM'] ?></td>
                   <td style="text-align:center"> 
<a  class="btn btn-info" data-toggle="modal" data-target="#view-modal" data-id="<?php echo $sid ?>" id="getUser">View Profile</a>
<a  class="btn btn-info"  data-target="#view-modal" data-id="<?php echo $sid ?>" id="deleteUser">Delete Profile</a>
</td>
</tr>
      <?php } ?>  
           </tbody>  
    </table>
        
       <?php }}
       
       ?>
<script type="text/javascript">
        $(function() {
            $("#table").dataTable(
        { "aaSorting": [[ 2, "asc" ]] }
      );
        });
    </script><script src='./bootbox/bootbox.min.js'></script></head>
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
 
     $.ajax({
          url: 'view_students.php',
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