<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['mgsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {


$fname=$_POST['fullname'];
$cnum=$_POST['cnumber'];
$email=$_POST['email'];
$bloodgrp=$_POST['bloodgrp'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$address=$_POST['address'];
$medcond=$_POST['medcond'];
$idate=$_POST['idate'];
$validdate=$_POST['validdate'];
$eid=$_GET['editid'];
$sql="update tblmedicalcard set FullName=:fname,ContactNumber=:cnum,Email=:email,BloodGroup=:bloodgrp,Age=:age,Gender=:gender,Address=:address,MedicalCond=:medcond,IssuedDate=:idate,ValidDate=:validdate where ID=:eid";
$query=$dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':cnum',$cnum,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':bloodgrp',$bloodgrp,PDO::PARAM_STR);
$query->bindParam(':age',$age,PDO::PARAM_STR);
$query->bindParam(':gender',$gender,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->bindParam(':medcond',$medcond,PDO::PARAM_STR);
$query->bindParam(':idate',$idate,PDO::PARAM_STR);
$query->bindParam(':validdate',$validdate,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
 $query->execute();
         echo '<script>alert("Medical card detail has been updated")</script>';
}
?>

<!DOCTYPE html>
<html>

<head>
    
    <title>Medical Card Generations System | Edit Medical Card</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
   <link href="assets/css/style.css" rel="stylesheet" />
      <link href="assets/css/main-style.css" rel="stylesheet" />



</head>

<body>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
      <?php include_once('includes/header.php');?>
        <!-- end navbar top -->

        <!-- navbar side -->
        <?php include_once('includes/sidebar.php');?>
        <!-- end navbar side -->
        <!--  page-wrapper -->
          <div id="page-wrapper">
            <div class="row">
                 <!-- page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Medical Card</h1>
                </div>
                <!--end page header -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                       
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form method="post" enctype="multipart/form-data"> 
                                    <?php
$eid=$_GET['editid'];
$sql="SELECT * from  tblmedicalcard where ID=$eid";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?> 
  <p colspan="6" style="font-size:20px;color:blue;text-align: center;">
 Reference ID: <?php  echo ($row->RefNumber);?></p>
    <div class="form-group"> <label for="exampleInputEmail1">Full Name</label> <input type="text" name="fullname" value="<?php  echo $row->FullName;?>" class="form-control" required='true'> </div>
    <div class="form-group"> <label for="exampleInputEmail1">Photo</label> <img src="images/<?php echo $row->ProfileImage;?>" width="50" height="50" value="<?php  echo $row->ProfileImage;?>">
<a href="changeimage.php?editid=<?php echo $row->ID;?>"> &nbsp; Edit Image</a> </div>
    <div class="form-group"> <label for="exampleInputEmail1">Contact Number</label> <input type="text" name="cnumber" value="<?php  echo $row->ContactNumber;?>" class="form-control" required='true' maxlength="10" pattern="[0-9]+"> </div>
    <div class="form-group"> <label for="exampleInputEmail1">Email Address</label> <input type="email" name="email" value="<?php  echo $row->Email;?>" class="form-control" required='true'> </div>
     <div class="form-group"> <label for="exampleInputEmail1">Blood Group</label><input type="text" name="bloodgrp" value="<?php  echo $row->BloodGroup;?>" class="form-control" required='true'></div>
    <div class="form-group"> <label for="exampleInputEmail1">Age</label> <input type="text" name="age" value="<?php  echo $row->Age;?>" class="form-control" required='true'> </div>
     <div class="form-group"> <label for="exampleInputEmail1">Gender</label><select name="gender" class="form-control" required='true'>
  
<option value="<?php  echo $row->Gender;?>"><?php  echo $row->Gender;?></option>
<option value="Male">Male</option><option value="Female">Female</option><option value="Transgender">Transgender</option>
     </select></div>
     <div class="form-group"> <label for="exampleInputEmail1">Address</label> <textarea name="address" value="" class="form-control" required='true'><?php  echo $row->Address;?></textarea> </div>
     <div class="form-group"> <label for="exampleInputEmail1">Medical Conditions(if any)</label> <textarea name="medcond" value="" class="form-control"><?php  echo $row->MedicalCond;?></textarea> </div>
<div class="form-group"> <label for="exampleInputEmail1">Issued Date</label> <input type="date" name="idate" value="<?php  echo $row->IssuedDate;?>" class="form-control" required='true'> </div>
<div class="form-group"> <label for="exampleInputEmail1">Valid Upto</label> <input type="date" name="validdate" value="<?php  echo $row->ValidDate;?>" class="form-control" required='true'> </div>
<?php $cnt=$cnt+1;}} ?> 
     <p style="padding-left: 450px"><button type="submit" class="btn btn-primary" name="submit" id="submit">Update</button></p> </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>
        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/plugins/pace/pace.js"></script>
    <script src="assets/scripts/siminta.js"></script>

</body>

</html>
<?php }  ?>