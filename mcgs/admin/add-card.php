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

$refnum=mt_rand(100000000, 999999999);
$propic=$_FILES["propic"]["name"];
$extension = substr($propic,strlen($propic)-4,strlen($propic));
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Profile Pics has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{

$propic=md5($propic).time().$extension;
 move_uploaded_file($_FILES["propic"]["tmp_name"],"images/".$propic);
$sql="insert into tblmedicalcard(RefNumber,FullName,ProfileImage,ContactNumber,Email,BloodGroup,Age,Gender,Address,MedicalCond,IssuedDate,ValidDate)values(:refnum,:fname,:propic,:cnum,:email,:bloodgrp,:age,:gender,:address,:medcond,:idate,:validdate)";
$query=$dbh->prepare($sql);
$query->bindParam(':refnum',$refnum,PDO::PARAM_STR);
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
$query->bindParam(':propic',$propic,PDO::PARAM_STR);

 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Medical card detail has been added.")</script>';
echo "<script>window.location.href ='add-card.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  

}
}
?>

<!DOCTYPE html>
<html>

<head>
    
    <title>Medical Card Generations System | Add Medicalcard</title>
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
                    <h1 class="page-header">Add Medicalcard</h1>
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
                                    
    <div class="form-group"> <label for="exampleInputEmail1">Full Name</label> <input type="text" name="fullname" value="" class="form-control" required='true'> </div>
    <div class="form-group"> <label for="exampleInputEmail1">Profile Image</label> <input type="file" name="propic" value="" class="form-control" required='true'> </div>
    <div class="form-group"> <label for="exampleInputEmail1">Contact Number</label> <input type="text" name="cnumber" value="" class="form-control" required='true' maxlength="10" pattern="[0-9]+"> </div>
    <div class="form-group"> <label for="exampleInputEmail1">Email Address</label> <input type="email" name="email" value="" class="form-control" required='true'> </div>
    <div class="form-group"> <label for="exampleInputEmail1">Blood Group</label><input type="text" name="bloodgrp" value="" class="form-control" required='true'></div>
    <div class="form-group"> <label for="exampleInputEmail1">Age</label> <input type="text" name="age" value="" class="form-control" required='true'> </div>
     <div class="form-group"> <label for="exampleInputEmail1">Gender</label><select name="gender" value="" class="form-control" required='true'>
  
<option value="">Select Gender</option>
<option value="Male">Male</option><option value="Female">Female</option><option value="Transgender">Transgender</option>
     </select></div>
     <div class="form-group"> <label for="exampleInputEmail1">Address</label> <textarea name="address" value="" class="form-control" required='true'></textarea> </div>
     <div class="form-group"> <label for="exampleInputEmail1">Medical Conditions(if any)</label> <textarea name="medcond" value="" class="form-control"></textarea> </div>
<div class="form-group"> <label for="exampleInputEmail1">Issued Date</label> <input type="date" name="idate" value="" class="form-control" required='true'> </div>
<div class="form-group"> <label for="exampleInputEmail1">Valid Upto</label> <input type="date" name="validdate" value="" class="form-control" required='true'> </div>

     <p style="padding-left: 450px"><button type="submit" class="btn btn-primary" name="submit" id="submit">Add</button></p> </form>
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