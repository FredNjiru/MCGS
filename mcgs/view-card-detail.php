<?php
include('includes/dbconnection.php');
session_start();
error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required Meta Tags -->
   

    <!-- Page Title -->
    <title>Medical Card Generations System || Download Medical Card</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/x-icon">

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/animate-3.7.0.css">
    <link rel="stylesheet" href="assets/css/font-awesome-4.7.0.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-4.1.3.min.css">
    <link rel="stylesheet" href="assets/css/owl-carousel.min.css">
    <link rel="stylesheet" href="assets/css/jquery.datetimepicker.min.css">
    <link rel="stylesheet" href="assets/css/linearicons.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=500,height=500');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }
 </script>
</head>
<body>
    
   <?php include_once('includes/header.php');?> 


<!-- Banner Area Starts -->
<section class="banner-area other-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>View Medical Card</h1>
                <a href="index.php">Home</a> <span>|</span> <a href="download-medical-cards.php">Medical Card</a>
            </div>
        </div>
    </div>
</section>
<!-- Banner Area End -->


<br>
    <!-- Contact Form Starts -->
    <section class="contact-form section-padding3">
        <div class="container">  
            <div class="agileits-title">
                <h3>View Medical Card Details</h3>
            </div>  
            <br>
            <div class="contact-agileinfo">
          
                 
                <div class="clearfix"> </div>   
                <div class="table-responsive" id="divToPrint">
                              <?php
$vid=$_GET['viewid'];
$sql="SELECT * from  tblmedicalcard where ID=$vid";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                                    <table border="1" class="table table-bordered" > 
                                    <tr align="center">
<td colspan="6" style="font-size:20px;color:blue">
 Reference ID: <?php  echo ($row->RefNumber);?></td></tr>
  
<tr>
    <th scope>Full Name</th>
    <td colspan="3"><?php  echo ($row->FullName);?></td>
    
  </tr>
  <tr>
    <th scope>Photo</th>
    <td colspan="3"><img src="admin/images/<?php  echo ($row->ProfileImage);?>" width="50" height="50"></td>

  </tr>

  <tr>
    <th scope>Mobile Number</th>
    <td><?php  echo ($row->ContactNumber);?></td>
    <th scope>Email</th>
    <td><?php  echo ($row->Email);?></td>
  </tr>
<tr>
    <th scope>Age</th>
    <td><?php  echo ($row->Age);?></td>
    <th scope>Gender</th>
    <td><?php  echo ($row->Gender);?></td>

  </tr>
  <tr>
    <th scope>Blood Group</th>
    <td><?php  echo ($row->BloodGroup);?></td>
    <th scope>Address</th>
    <td><?php  echo ($row->Address);?></td>
  </tr>
<tr>
    <th scope>Issued Date</th>
    <td><?php  echo ($row->IssuedDate);?></td>
    <th scope>Valid Upto</th>
    <td><?php  echo ($row->ValidDate);?></td>
  </tr>
  <tr>
    
    <th scope>Medical Conditions</th>
    <td><?php  echo ($row->MedicalCond);?></td>
    <th scope>Card Creation Date</th>
    <td><?php  echo ($row->CreationDate);?></td>
  </tr>
                                    
   <?php $cnt=$cnt+1;}} ?>
   </table>
   <p style="text-align: center;font-size: 20px;color: red">
  <input type="button" value="print" onclick="PrintDiv();" /></p>
                            </div>
            </div>
        </div>
    </section>
    <!-- Contact Form End -->


    <!-- Footer Area Starts -->
    <?php include_once('includes/footer.php');?>
    <!-- Footer Area End -->


    <!-- Javascript -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
	<script src="assets/js/vendor/bootstrap-4.1.3.min.js"></script>
    <script src="assets/js/vendor/wow.min.js"></script>
    <script src="assets/js/vendor/owl-carousel.min.js"></script>
    <script src="assets/js/vendor/jquery.datetimepicker.full.min.js"></script>
    <script src="assets/js/vendor/jquery.nice-select.min.js"></script>
    <script src="assets/js/vendor/superfish.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I"></script>
    <script src="assets/js/vendor/gmaps.min.js"></script>
    <script src="assets/js/main.js"></script>



</body>
</html>
