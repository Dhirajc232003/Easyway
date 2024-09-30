<?php

session_start();
$msg = "";
if (!isset($_SESSION['UID'])) {
?>
  <script>
    alert("You Need To Login First");
    window.location.href = '../HomePage.php';

  </script>
<?php
} ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <style>
    .gradient-custom-2 {
      /* fallback for old browsers */
      background: #fccb90;

      /* Chrome 10-25, Safari 5.1-6 */
      background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
    }

    @media (min-width: 768px) {
      .gradient-form {
        height: 100vh !important;
      }
    }

    @media (min-width: 769px) {
      .gradient-custom-2 {
        border-top-right-radius: .3rem;
        border-bottom-right-radius: .3rem;
      }
    }
  </style>
</head>

<body>
  <section class="h-100 gradient-form" style="background-color: #eee;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-10">
          <div class="card rounded-3 text-black">
            <div class="row g-0">
              <div class="col-lg-6">
                <div class="card-body p-md-5 mx-md-4">

                  <div class="text-center">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp" style="width: 185px;" alt="logo">
                    <h4 class="mt-1 mb-5 pb-1">We are The Lotus Team</h4>
                  </div>

                  <form action="" method="POST">


                    <div class="form-outline mb-3">
                      <input type="text" name="yourname" id="form2Example11" class="form-control" placeholder="Please Enter Your Name" />
                      <label class="form-label" for="form2Example11">Name</label>
                    </div>

                    <span>Please Choose Your Service Date</span>
                    <div class="form-outline mb-4">
                      <input type="date" id="form2Example22" name="date" class="form-control" />
                      <label class="form-label" for="form2Example22">Service Date</label>
                    </div>
                    <div class="form-outline mb-4">
                      <input type="text" id="form2Example22" name="address" class="form-control" placeholder="Please Enter Your Address With City" />
                      <label class="form-label" for="form2Example22">Address</label>
                    </div>

                    <div class="text-center pt-1 mb-5 pb-1">
                      <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3"  type="submit" name="submitform"> Submit</button>

                    </div>

                  </form>
                  <?php
                  if(isset($_POST['submitform'])) {
                    include "config.php";
                    $serviceId = $_GET['serviceId'];
                    
                    $sql1 = "SELECT * FROM serviceprovider where sid=$serviceId";
                    $res = mysqli_query($db,$sql1) or die("result failed in table");
                    if(mysqli_num_rows($res) >0)
                                 { 
                          $row=mysqli_fetch_assoc($res);      
              
                    echo $SID  =$row['sid'];
                    echo $TOEMAIL=$row['gmail'];           
                    echo $FROMEMAIL=$_SESSION['EMAIL'];
                    echo $NAME = $_POST['yourname'];
                    echo $DATE = $_POST['date'];
                    echo $ADDRESS = $_POST['address'];
                    

                    $sql = "INSERT INTO appointdateinfo(sid,fromemail,toemail,name,date,address) VALUES('{$SID }','{$FROMEMAIL}','{$TOEMAIL}','{$NAME}','{$DATE}','{$ADDRESS}')";
                    $Result = mysqli_query($db, $sql) or die("unSUCCESS");
                    // $result = mysqli_query($conn, $sql) or die("unSUCCESS");

                    echo "<SCRIPT> alert('You are appoint Successful wait for their response')  </SCRIPT> ";
                    header("Location: http://localhost/MiniProject%20V.1/Pages/HomePage.php");
                  }}

                  ?>
                </div>
              </div>
              <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                  <h4 class="mb-4">We are more than just a company</h4>
                  <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>