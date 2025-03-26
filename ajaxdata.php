<?php
include 'db.php';

if($_POST['department_id']){
$query="SELECT * FROM program WHERE PROGRAM_ID =".$_POST['department_id'];
$result=$db->query($query);
if($result->num_rows > 0){
while ($row=$result->fetch_assoc()){
    echo '<option value='.$row['id'].'>'.$row['TERM'].'</option>';

}
else{
    echo '<option>No Term Found</option>';
}
}




}






?>