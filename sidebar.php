<?php 
include 'db.php';

$query = mysqli_query($conn,"SELECT * FROM college_academic_year where status='Yes' ");
$s = mysqli_fetch_assoc($query);

?>




 <ul class="nav navbar-nav side-nav">
 <li>
<a href="rms.php?page=home"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
</li>
<li>
<a id=demo1 href="javascript:void(0)" data-toggle="collapse" data-target="#masterlistCollapse"><i class="fa fa-fw fa-files-o"></i> Student List <i class="fa fa-fw fa-caret-down"></i></a>
<ul id="masterlistCollapse" class="collapse">
    <li>
        <a href="rms.php?page=Students"><i class="fa fa-fw fa-users"></i> Students Profile</a>
    </li>
    <li class="">
        <a href="rms.php?page=subjects"><i class="fa fa-fw fa-book"></i> Course List</a>
    </li>
    <li class="">
        <a href="rms.php?page=program"><i class="fa fa-fw fa-bars"></i> Department List</a>
    </li>
</ul>


<li>
<a href="javascript:void(0)" data-toggle="collapse" data-target="#recordsCollapse"><i class="fa fa-fw fa-file"></i> Records   <i class="fa fa-fw fa-caret-down"></i></a>
    <ul class="collapse" id="recordsCollapse">
<li>
          <a href="rms.php?page=records"><i class="fa fa-fw fa-files-o"></i>Academic Records </a>
        </li>
        <li>
        <a href="rms.php?page=placement"><i class="fa fa-fw fa-files-o"></i>Placement Records </a>
        </li>
</ul>
</li>
<li>
 <a href="javascript:void(0)" data-toggle="collapse" data-target="#reportsCollapse"><i class="fa fa-fw fa-file"></i>E-Certificates<i class="fa fa-fw fa-caret-down"></i></a>
    <ul id="reportsCollapse" class="collapse">
        <li>
        <a href="rms.php?page=report"><i class="fa fa-fw fa-files-o"></i> Student Bonafide</a>
        </li>

		<li>
        <a href="rms.php?page=form"><i class="fa fa-fw fa-files-o"></i> Student Marks</a>
        </li>

</ul>
</li>
<li>
    <a href="javascript:void(0)" data-toggle="collapse" data-target="#maintenanceCollapse"><i class="fa fa-fw fa-gears"></i> Maintenance <i class="fa fa-fw fa-caret-down"></i></a>
    <ul id="maintenanceCollapse" class="collapse">
        <li>
            <a href="rms.php?page=college_academic_year"><i class="fa fa-fw fa-calendar"></i>Academic Year</a>
        </li>
    </ul>
</li>

<script>
    $('.side-nav li a').each(function(){
        if((location.href).includes($(this).attr('href')) == true){
            $(this).closest('li').addClass("active")
            console.log($(this).closest('li').parent('ul').attr('id'))
            if($(this).closest('li').parent('ul').hasClass('collapse') == true){
                $('[data-target="#'+$(this).closest('li').parent('ul').attr('id')+'"]').click()
            }
        }
    })
</script>

                