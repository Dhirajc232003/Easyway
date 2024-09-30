
<?php
include "config.php";
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>

                                <div class="row">
                                    <div class="mx-3 my-1 col-2"><a class="btn btn-danger aling-item-center w-10" href="HomePage.php">Back</a></div>
                                
                        <div class="col-md-12 col-lg-12">
                            <div class="card">
                            
                                <div class="card-header d-flex justify-content-center p-0 "> <p class="fs-4 fs-bold"> Your Appoint Services</p></div>
                                <div class="card-body">
                                  
                                    <div class="table-responsive">
                                        <table class="table">
                                       
                                    <?php  
		                                //    $gmail1= $_SESSION['gmail'];
                                       $serviceemail= $_SESSION['EMAIL'];
                                    $YourName=$_SESSION['UNAME'];
                                    $sql1 = "SELECT * FROM orders WHERE fromemail = '$serviceemail'";
                                    $res = mysqli_query($db,$sql1) or die("result failed in table");
                                    if(mysqli_num_rows($res) >0)
                                                 { ?>
                                        <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Order Id</th>
                                                    <th>Payment Id</th>
                                                    <th>Status</th>
                                                    <th><?php echo $YourName ?>(You)</th>
                                                    <th>Service Provider</th>
                                                    <th>Service Status</th>




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
                                                    <th scope="row"> <?php echo $count ?></th>
                                                    <td><?php echo $row['order_id'] ?></td>
                                                    <td><?php echo $row['razorpay_payment_id'] ?></td>
                                                    <td><?php echo $row['status']?></td>
                                                    <td><?php echo $row['fromemail']?></td>
                                                    <td><?php echo $row['toemail']?></td>
                                                    <?php if($row['service_status']==0) {
                                                        ?>
                                                    <td class="" > <a class="btn btn-warning" href="#">Incomplete</a></td>
                                                    <?php } 
                                                     else{
                                                    ?>
                                                   
                                                    <td d-flex justify-content-center> <a class="btn btn-success" href="#">Completed</a></td>

                                                    <?php } ?>


                                                </tr>
                                                <?php 
                                            $count = $count +1;} ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        
                    </div>
    
</body>
</html>