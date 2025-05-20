<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['mgsaid']==0)) {
  header('location:logout.php');
  } else{
    
  ?>
<!DOCTYPE html>
<html>

<head>
    
    <title>Medical Card Generations System | Dashboard</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
   <link href="assets/css/style.css" rel="stylesheet" />
      <link href="assets/css/main-style.css" rel="stylesheet" />

<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

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
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!--end page header -->
            </div>

            <div class="row">
                <!--quick info section -->
              
                <div class="col-lg-4">
                    
                    <div class="alert alert-success text-center">
                        <?php 
$sql ="SELECT ID from tblmedicalcard";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$totalcard=$query->rowCount();
?><div class="panel-body blue" style="color:#000">
                        <i class="fa fa-file fa-3x"></i><h3><?php echo htmlentities($totalcard);?></h3><a href="manage-card.php" style="color:#000; font-size:16px;" target="blank"> Total Medical Card</a>
                    </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="alert alert-info text-center">
 <?php 
//todays Pass Generated
 

$sql ="SELECT ID from tblmedicalcard where date(CreationDate)=CURDATE()";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$today_card=$query->rowCount();
?>
 <div class="panel-body red">
                        <i class="fa fa-file fa-3x"></i><h3><?php echo htmlentities($today_card);?></h3> <a href="todays-cards.php" style="color:#fff; font-size:16px;" target="blank">Medical Card Created Today</a>
</div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="alert alert-warning text-center">
                       <?php 
//Yesterday Pass Generated
 

$sql ="SELECT ID from tblmedicalcard where date(CreationDate)=CURDATE()-1";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$yes_card=$query->rowCount();
?><div class="panel-body green">
                        <i class="fa fa-file fa-3x"></i>
                        <h3><?php echo htmlentities($yes_card);?></h3> <a href="yesterdays-card.php" style="color:#000; font-size:16px;" target="blank">Medical Card Created Yesterday </a>
                    </div>
                    </div>
                </div>
                  <div class="col-lg-4">
                    <div class="alert alert-info text-center">
                       <?php 
//7 days Pass Generated
 

$sql ="SELECT ID from tblmedicalcard where date(CreationDate)>=(DATE(NOW()) - INTERVAL 7 DAY)";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$seven_card=$query->rowCount();
?><div class="panel-body yellow">
                        <i class="fa  fa-file fa-3x"></i>
                        <h3><?php echo htmlentities($seven_card);?></h3> 
                        <a href="last-7days-card.php" style="color:#000; font-size:16px;" target="blank">Medical Card Created in Seven Days</a>
</div>
                    </div>
                </div>
                   <div class="col-lg-4">
                    <div class="alert alert-info text-center">
                       <?php 
//7 days Pass Generated
 

$sql ="SELECT * from tblcontact where IsRead is null";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$unreadenq=$query->rowCount();
?><div class="panel-body green">
                        <i class="fa  fa-file fa-3x"></i>
                        <h3><?php echo htmlentities($unreadenq);?></h3> <a href="unreadenq.php" style="color:#000; font-size:16px;" target="blank">Total Unread Enquiry</a>
</div>
                    </div>
                </div>
                   <div class="col-lg-4">
                    <div class="alert alert-info text-center">
                       <?php 
//7 days Pass Generated
 

$sql ="SELECT * from tblcontact where IsRead='1'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$readenq=$query->rowCount();
?><div class="panel-body yellow">
                        <i class="fa  fa-file fa-3x"></i>
                        <h3><?php echo htmlentities($readenq);?></h3> <a href="readenq.php" style="color:#000; font-size:16px;" target="blank">Total Read Enquiry</a>
</div>
                    </div>
                </div>
                <!--end quick info section -->
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