<?php
session_start();
$msg = "";
if (!isset($_SESSION['UID'])) {
?>
  <script>
    window.location.href = 'HomePage.php';
  </script>
<?php
}
$UName = $_SESSION['UNAME'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <style>
    a{
      color: white;
      text-decoration: none;
      font-size: large;
      
    }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-dark p-1 ">
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"> </span>
        </button>
        <div class="collapse navbar-collapse p-0" id="navbarNavAltMarkup">
          <div class="navbar-nav mr-auto pr-md-3 p-0 mb-0">

            <!-- <a  onclick="searchIcon()" ><i class="fa-solid fa-magnifying-glass"></i> </a>
             <a id="searchIcon" class=""><input type="text">search</a> -->

            <a class="nav-item nav-link pr-md-3 sm-bolder fs-md-3 active" href="user_request_page.php">Service Request
            </a>
            <a type="button" class="nav-item nav-link pr-md-3 sm-bold" href="notification.php">Appointed Service Status</a>


          </div>

          <button class="btn btn-info mr-3" type="button">
          <SPan><i class="fa-solid fa-user-gear mx-2"> </i><?php echo $UName ?></SPan>
          </button>
          <!-- <i class="fa-solid fa-user-gear"> </i> -->



        </div>
      </nav>
  <button class="btn btn-danger position-fixed">PLEASE DO NOT PAY UNTIL THE SERVICES HAVE BEEN COMPLETED</button>



<div class="row mt-5">
<div class="mx-3 mb-1 col-2"></div>
                              
<div class="col-md-12 col-lg-12">
<div class="card">
<div class="card-header d-flex justify-content-center p-0"><p class="fs-3 fs-bold"> Your Service Rrequest </p></div>
<div class="card-body">
  
    <div class="table-responsive">
        <table class="table">
       
    <?php 
    include "config.php"; 
 
        //    $gmail1= $_SESSION['gmail'];
    $userEmail= $_SESSION['EMAIL'];
     
    $sql1 = "SELECT * FROM appointdateinfo WHERE fromemail = '$userEmail'";
    $res = mysqli_query($db,$sql1) or die("result failed in table");
    if(mysqli_num_rows($res) >0)
                 { ?>
        <thead>
                <tr>
                    <th>ID</th>
                    <th>Service_Provider</th>                   
                    <th>Service_Date</th>
                    <th>Status</th> 
                    <th>Payment</th>                    
                    <th>Reschedule</th>
                   


                    



                </tr>
            </thead> <?php } ?>
            <tbody>
            <?php 
            $count=1;
            
            while($row= mysqli_fetch_assoc($res))
                {
                  
                    
                 ?>
                <tr>
                <?php  ?>
                    <th scope="row"> <?php echo $count?></th>
                    <td><?php echo $row['toemail'] ?></td>
                    <td><?php echo $row['date']?></td>
                    <?php if($row['service_status']==0) {
                        ?>
                    <td class="" > <a href="#" class="btn btn-warning">Waiting</a></td>
                    <?php } 
                     elseif($row['service_status']==1){?>
                        <td d-flex justify-content-center> <a href="#" class="btn btn-success ">Confirmed</a></td>
                      
                    <?php }
                    else{ ?>
                         <td d-flex justify-content-center> <a href="#" class="btn btn-danger">Your Service Has been Descarded</a></td>
    
                   <?php }
                    ?>

                    <?php 
                      $toemail=$row['toemail'];
                      $fromemail=$row['fromemail'];
                        
                        $pay="select * from serviceprovider where gmail='$toemail'";
                        $respay = mysqli_query($db,$pay) or die("result failed in payment table");
                        if(mysqli_num_rows($respay) >0){
                        $rowpay= mysqli_fetch_assoc($respay);
                        if($row['service_status']==0 ) {   
                          ?>
                              <td d-flex justify-content-center> <a href="#" class="btn btn-warning">Not Applicable</a></td>
                 <?php }
                 elseif($row['service_status']==1 and $row['survice_btn_status']==1 ){ ?>
                    <td d-flex justify-content-center> <a href="#" class="btn btn-info">Done</a></td>
                 <?php } 
                  elseif($row['service_status']==1){ ?>
                    <td d-flex justify-content-center> <a href="PAYMENT/pay.php?serviceId=<?php echo $rowpay['sid'] ?>" class="btn btn-info">Payment</a></td>
                 <?php } 
                 
                 else { ?>   
                  <td d-flex justify-content-center> <a href="#" class="btn btn-warning">Not Applicable</a></td>
                
                 <?php } }
                
                 ?>
                    
                    <?php if($row['service_status']==0 or $row['service_status']==2) {
                        ?>
                    <td class="" > <a class="btn btn-warning" href="#"> Reschedule</a></td>
                    <?php }
                     elseif($row['service_status']==1) { ?> <td class="" > <span>No Action</span> </td>    <?php } 
                     else{}
                     ?> 
                    
                    
                </tr>
                <?php  $count = $count +1;} ?>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>

</body>
</html>