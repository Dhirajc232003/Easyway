

<?php  
session_start();

$AName = $_SESSION['ANAME'];
 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" integrity="sha512-PgQMlq+nqFLV4ylk1gwUOgm6CtIIXkKwaIHp/PAIWHzig/lKZSEGKEysh0TCVbHJXCLN7WetD8TFecIky75ZfQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Admin Panel</title>
  </head>
  <body class="bg-right"></d>
  
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-10 col-11 mx-auto">
                
                  
                  <nav aria-label="breadcrumb" class="mb-3">
                  <span type="button" class="nav-item nav-link  sm-bold"> <i class="fa-solid fa-user-gear"> </i> <?php echo $AName ?> </span>
                  </nav>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 d-md-block">
                        <div class="card bg-common card-left">
                            <div class="card-body">
                                <nav class="nav d-block ">
                                    <a data-toggle='tab' class="nav-link active" aria-current="page" href="#profile">
                                    <i class="fas fa-user mr-1"></i>Profile</a>

                                    <a data-toggle='tab'class="nav-link" href="#account ">
                                    <i class="fas fa-user-cog mr-1"></i>Account</a>

                                

                                    <a data-toggle='tab'class="nav-link" href="#notification">
                                    <i class="fas fa-bell mr-1"></i>Notification</a>

                                    <a data-toggle='tab'class="nav-link" href="serviceLogout.php">
                                    <i class="fas fa-money-check-alt mr-1"></i>Billing</a>


                                  </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-9">
                        <div class="card ">
                          <div class="card-header border-bottom mb-3">
                            <ul class="nav nav-tabs card-header-tabs nav-fill">
                                <li class="nav-item">
                                  <a  data-toggle='tab' class="nav-link active" aria-current="page" href="#profile">
                                    <i class="fas fa-user mr-1"></i></a>
                                </li>
                                <li class="nav-item">
                                  <a data-toggle='tab' class="nav-link" href="#account">
                                     <i class="fas fa-user-cog mr-1"></i></a>
                                </li>
                                <li class="nav-item">
                                  <a data-toggle='tab' class="nav-link" href="#security">
                                    <i class="fas fa-user-shield mr-1"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a data-toggle='tab' class="nav-link" href="#notification"> 
                                        <i class="fas fa-bell mr-1"></i></a>
                                  </li>
                                  <li class="nav-item">
                                    <a data-toggle='tab' class="nav-link" href="#billing">
                                        <i class="fas fa-money-check-alt mr-1"></i></a>
                                  </li>
                            
                              </ul>
                          </div>
                          <div class="card-body tab-content border-0">
                            <div class="tab-pane active" id="profile">
                                <h6> YOUR PROFILE INFORMATION</h6>
                                <hr> 
                                <form>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Full Name </label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
                                        <small class="form-text text-muted">Please Enter your fullname</small>
                                    </div>

                                    

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Contact</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
                                        <small class="form-text text-muted">Please Enter your Contact</small>
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Address
                                        </label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
                                        <small class="form-text text-muted">Please Enter your Address</small>
                                    </div>
                                    <button class="btn btn-outline-info" type="button">Update Profile</button>
                                    <button class="btn btn-outline-info" type="reset">Reset Profile</button>

                                </form>
                            // Notification Module
                           
                            <div class="tab-pane active" id="notification">
                                <h6>NOTIFICATION</h6>
                                <br>
                                <hr>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                      <?php  $sid=$_SESSION['SID'] ;
                                         $sql = "SELECT * FROM orders WHERE sid =$sid ";
                                        $res = mysqli_query($db,$sql) or die("result failed");
                                        if(mysqli_num_rows($res) >0)
                                        { ?>
                                            <thead>
                                                <tr>
                                                    <th>SR NO</th>
                                                    <th>OEDER ID</th>
                                                    <th>PAYMENT ID</th>
                                                    <th>STATUS</th>
                                                    <th>FROM </th>
                                                    <th>YOU</th>
                                                    <th>STATUS</th>

                                                </tr>
                                               
                                            </thead>                                      
                                            <tbody>                                          
                                            <?php 
                                            $count=0;
                                             while($row= mysqli_fetch_assoc($res)) 
                                             {?>
                                                <tr>
                                                    <th scope="row"><?php echo $count + 1  ?></th>
                                                    <td><?php echo $row['order_id']  ?></td>
                                                    <td><?php echo $row['razorpay_payment_id']  ?></td>
                                                    <td><?php echo $row['status']  ?></td>
                                                    <td><?php echo $row['fromemail']  ?></td>
                                                    <td><?php echo $crow['toemail'] ?></td>
                                                    <td> <a href="ser"></a> <?php echo $crow['toemail'] ?></td>

                                                </tr>
                                                <?php }?>
                                            </tbody>
                                            <?php } 
                                            else  $html = "<p>Your payment failed</p>";
                                              echo $html ;
                                            ?>
                                        </table>
                                    </div>
                                
                            </div>       
                            <div class="tab-pane active" id="billing">
                                <h6>BILLING SETTINGS</h6>
                                <hr>
                                <form>
                                    <div class="mb-3">
                                        <label class="d-block">Payment Method</label>
                                        <small class="text-muted small"> Not added</small>
                                        <br>
                                        <button class="btn btn-outline-info mt-2"> Add Payment Method</button>

                                    </div>
                                    <div class="mb-3">
                                        <label class="d-block">Payment History</label>
                                        <div class="border p-3 text-center">
                                            You have not payment yet.
                                        </div>
                                    </div>
                                </form>
                            </div>
                                       
                                       
                            </div>

                          </div>
                        </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>