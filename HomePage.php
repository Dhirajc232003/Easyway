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



?>
<?php

use LDAP\Result;

include "config.php";



?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Service Provider</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.6.3.slim.min.js" integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="HomePage.css">
  
  <style>
    button {
      box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.35);
      padding: 0%;
    }
  </style>
</head>

<body>

  <!-- NavBar  -->
  <section>

    <!-- for PHP Navebar -->
    <?php if (!isset($_SESSION['UID'])) {
    ?>
      <nav class="navbar navbar-expand-lg bg-white p-1 ">
        <a class="navbar-brand" href="#">
          <img src="../Images/logo.jpg" alt="" class="img-fluid" /> ServiceProvider
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"> </span>
        </button>
        <div class="collapse navbar-collapse p-0" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto pr-md-3 p-0 mb-0">

            <!-- <a  onclick="searchIcon()" ><i class="fa-solid fa-magnifying-glass"></i> </a>
             <a id="searchIcon" class=""><input type="text">search</a> -->

            <a class="nav-item nav-link pr-md-3 sm-bolder" href="aboutus.php">About
            </a>
            <a type="button" class="nav-item nav-link pr-md-3 sm-bold" href="ServiceProviderRegistration.php">Register
              As Service Provider</a>


          </div>

          <button type="button" class="btn btn-primary p-1" data-toggle="modal" data-target="#Loginlogout">
            SignIn/SignUp
          </button>
          <!-- <i class="fa-solid fa-user-gear"> </i> -->



        </div>
      </nav>

    <?php } else {

      $UName = $_SESSION['UNAME'];
      $Uemail = $_SESSION['EMAIL'];

        
    ?>

     
 <div class="alert-box hide hidden">
     You are Login Successful
     <span class="close-alert">&times;</span>
 </div>

 <script>

   const alertBox=document.querySelector(".alert-box");
   const closeBtn=document.querySelector(".close-alert")     
   let timer;
  
        showAlertBox();
   
   closeBtn.addEventListener("click",function () {
        hideAlertBox();
        clearTimeout(timer);
   })

   function showAlertBox(){
      alertBox.classList.remove("hide");
      alertBox.classList.add("show");
      // hide animation onload 
      if(alertBox.classList.contains("hidden")){
          alertBox.classList.remove("hidden");
      }
      timer=setTimeout(function(){
          hideAlertBox();
      },6000)
   }
    
   function hideAlertBox(){
     alertBox.classList.remove("show");
      alertBox.classList.add("hide");
   }
 </script>

      <!-- for PHP Navebar -->

      <nav class="navbar navbar-expand-lg bg-white p-1 ">
        <a class="navbar-brand" href="#">
          <img src="../Images/logo.jpg" alt="" class="img-fluid" /> ServiceProvider
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse p-0" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto pr-md-3 p-0 mb-0">
            <a class="nav-item nav-link pr-md-3 sm-bolder" href="aboutus.php">About
            </a>
            <a class="nav-item nav-link pr-md-3 sm-bolder" href="user_request_page.php">Appoint Service
            </a>

            <span type="button" class="nav-item nav-link  sm-bold"> <a href="logout.php"> <i class="fa-solid fa-user-gear"> </i> <?php echo $UName ?> </a> </span>

          </div>


          <!-- <i class="fa-solid fa-user-gear"> </i> -->

        <?php } ?>

        </div>
      </nav>


  </section>

  <!-- Log In Log Out Outer Model -->

  <section>
    <div class="modal fade" id="Loginlogout" tabindex="-10" role="dialog" aria-labelledby="Register" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id=""> SignIn / SignUp</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="true">Login</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="tab-register" type="button" data-toggle="modal" data-target="#pills-register" href="#">Register</a>
              </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                <!--Login  -->
                <form action="HomePagePhp.php" method="post">
                  <!-- Email input -->
                  <div class="form-outline mb-4">
                    <input type="email" id="loginName" name="username" class="form-control" />
                    <label class="form-label" for="loginName">Email or username</label>
                  </div>

                  <!-- Password input -->
                  <div class="form-outline mb-4">
                    <input type="password" name="password" id="loginPassword" class="form-control" />
                    <label class="form-label" for="loginPassword">Password</label>
                  </div>
                  <!-- 2 column grid layout -->
                  <div class="row mb-4">
                    <div class="col-md-6 d-flex justify-content-center">
                      <!-- Checkbox -->



                    </div>


                    <div class="form-grod:\App\resources\app\out\vs\code\electron-sandbox\workbench\workbench.htmlup col-md-6">
                      <label for="inputState">ROLE</label>
                      <select id="inputState" name="role" class="form-control">
                        <option selected disabled>Choose...</option>
                        <option value="User">User </option>
                        <option value="ServiceProvider">Service Provider</option>
                        <option value="Admin">Admin</option>
                      </select>
                    </div>

                    <!-- Submit button -->
                    <input type="submit" name="login" class="btn btn-primary btn-block mb-4">Sign in</input>

                    <!-- Register buttons -->
                    <div class="text-center">
                      <p>Not a member? <a type="button" data-toggle="modal" data-target="#pills-register" href="#" s>Register</a></p>
                    </div>
                </form>

                <!-- 
                  // if (ispost($_POST['login'])) {
                  //   include "config.php"
                  //   $username =$_POST['username'];
                  //   $password =$_POST['password'];
                  //   $use_role =$_POST['use_role'];
  
                  //    $sql = "SELECT userid,gmail,use_role from user where username='{$username}' AND Password='{$password}'";
                  //  $Result = mysqli_query($conn,$sql) or die("query feild");
  
                  //  if(mysqli_num_query($Result)>0){
                  //   while($row = mysqli_fetch_assoc($Result)){
                  //     session_start();
                  //     $_SESSION["username"] = $row['username'];
                  //     $_SESSION["password"] = $row['password'];
  
                  //     $_SESSION["use_role"] = $row['use_role'] ;
                    
                  //     header("Location: {$hostname}/admin/firstbpage.php")
                  //   }
                  //  }
                  //  else{
                  //   echo '<div class = "alert alert-denger> userbame and password invalid </div>"'
                  //  }
                  // }  
                  // ?>
                </div>
  
                -->
                <!-- <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register"> -->


                <!-- User Register Dilog Box -->

                <div class="modal fade" id="pills-register" tabindex="-1" role="dialog" aria-labelledby="Register" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="">SignUp</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="HomePagePhp.php" method="POST">
                          <!-- Name input -->
                          <div class="form-outline mb-4">
                            <input type="text" id="registerName" name="Name" class="form-control" />
                            <label class="form-label" for="registerName">Name</label>
                          </div>

                          <!-- Username input -->
                          <div class="form-outline mb-4">
                            <input type="text" id="registerUsername" name="Username" class="form-control" />
                            <label class="form-label" for="registerUsername">Username</label>
                          </div>

                          <!-- Email input -->
                          <div class="form-outline mb-4">
                            <input type="email" id="registerEmail" name="Email" class="form-control" />
                            <label class="form-label" for="registerEmail">Email</label>
                          </div>

                          <!-- Password input -->
                          <div class="form-outline mb-4">
                            <input type="password" id="registerPassword" name="Password" class="form-control" />
                            <label class="form-label" for="registerPassword">Password</label>
                          </div>

                          <!-- Repeat Password input -->
                          <div class="form-outline mb-4">
                            <input type="password" id="registerRepeatPassword" name="Repeatpassword" class="form-control" />
                            <label class="form-label" for="registerRepeatPassword">Repeat password</label>
                          </div>

                          <div class="form-outline mb-4">
                            <input type="text" id="" name="Address" class="form-control" />
                            <label class="form-label" for="registerRepeatPassword">Address</label>
                          </div>
                          <div class="form-outline mb-4">
                            <input type="text" id="registerRepeatPassword" name="city" class="form-control" />
                            <label class="form-label" for="registerRepeatPassword">City</label>
                          </div>
                          <!-- Checkbox -->


                          <!-- Submit button -->
                          <button type="submit" name="register" class="btn btn-primary btn-block mb-3">SignUp</button>
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
  </section>

  <!-- search box for mobile -->

  <section>

    <div class="row " id="search">
      <div class="col-md-7 sticky" id="insearch">

        <div class="input-group mb-3 ">
          <div class="input-group-prepend ">
            <span class="input-group-text p-3 ">

              <select>
                <option value=""> Location
                </option>
                <option value="nagpur"> nagpur
                </option>
                <option value="wardha"> wardha
                </option>
                <option value="pune"> pune
                </option>
                <option value="mumbai"> mumbai
                </option>
              </select>
            </span>
          </div>
          <input type="text" id="" class="form-control " placeholder="Type services">
          <div class="input-group-append ">
            <span id="input-group-append" type="button" class="input-group-text bg-success p-3"> Search </span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- BackGround Image Editing -->
  <section>
    <div id="BackGround" class="">
      <br>
      <br>
      <br>

      <br>

      <h3 class="" id="Heading">Fast, FREE way to get experts.</h3> <br>

    </div>

  </section>

  <!-- Float BOX -->

  <section>

    <div class="container FloatBoxMain">
      <div class="row ">
        <div id="box-service" class=" container col-md-8 p-1 py-4   ">
          <div class="row FloatBOX">
            <div class="boximg col-6 col-sm-2 FloatBOX1 " onClick="show_Home()">
              <img class="img-fluid" src="../Images/HomeService.jpg" alt="">
              <span>
                <center> Home & Services </center>
              </span>
            </div>

            <div class="boximg col-6 col-sm-2  " onClick="show_HomeImprovement()">
              <img class="img-fluid" src="../Images/HomeRpaire.jpg" alt="">
              <span>
                <center> Home Repair </center>
              </span>
            </div>

            <div class="boximg col-6 col-sm-2" onclick="show_Professionalservices()">
              <img class="img-fluid" src="../Images/Professional.jpg" alt="">
              <span>
                <center> Professional services </center>
              </span>
            </div>

            <div class="boximg col-6 col-sm-2" onclick="show_Transport()">
              <img class="img-fluid" src="../Images/Transport.jpg" alt="">
              <span>
                <center> Transport </center>
              </span>
            </div>

            <div class="boximg col-6 col-sm-2" onclick="show_HealthServices()">
              <img class="img-fluid" src="../Images/Health.jpg" alt="">
              <span>
                <center> Health Services </center>
              </span>
            </div>

            <div class="boximg col-6 col-sm-2">
              <img class="img-fluid" src="../Images/event.jpg" alt="">
              <span>
                <center> Events </center>
              </span>
            </div>





          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- HIDING MENU SECTION -->

  <section class="hidemenu container " id="hidemenu">

    <!-- dropdown_Home -->

    <div class="dropdown_Home" id="dropdown_Home" style="display:none" ;>


      <button type="button" class="btn-close btn-danger" onClick="close_menu()" aria-label="Close"></button>
      <div class="row col-data">
        <div class="col-lg-4">

          <ul class="my-3 ">
            <?php $conn = mysqli_connect("localhost", "root", "", "miniproject") or die("connection feild");
            $sqlsubcategory = "SELECT sname FROM  subcategory  where cid=1 LIMIT 10 ;";
            $resultsubcategory = mysqli_query($conn, $sqlsubcategory) or die("query unsuccessful");
            while ($row = mysqli_fetch_assoc($resultsubcategory)) {
            ?>
              <li> <a href="demo.php?service_name=<?php echo $row['sname'] ?>"> <?php echo $row['sname'] ?></a> </li> <br>


            <?php } ?>

          </ul>

        </div>

        <div class="col-lg-4">
          <ul class="my-3 ">
            <?php $conn = mysqli_connect("localhost", "root", "", "miniproject") or die("connection feild");
            $sqlsubcategory = "SELECT sname FROM  subcategory  where cid=1 LIMIT 5 ;";
            $resultsubcategory = mysqli_query($conn, $sqlsubcategory) or die("query unsuccessful");
            while ($row = mysqli_fetch_assoc($resultsubcategory)) {
            ?>
              <li> <a href="demo.php"> <?php echo $row['sname'] ?></a> </li> <br>


            <?php } ?>


          </ul>
        </div>
        <div class="col-lg-4">
          <ul class="my-3 ">
            <?php $conn = mysqli_connect("localhost", "root", "", "miniproject") or die("connection feild");
            $sqlsubcategory = "SELECT sname FROM  subcategory  where cid=1 LIMIT 5 ;";
            $resultsubcategory = mysqli_query($conn, $sqlsubcategory) or die("query unsuccessful");
            while ($row = mysqli_fetch_assoc($resultsubcategory)) {
            ?>
              <li> <a href="demo.php"> <?php echo $row['sname'] ?></a> </li> <br>


            <?php } ?>

          </ul>
        </div>

      </div>
    </div>

    <!-- dropdown_Improvement -->

    <div class="dropdown_Improvement" id="dropdown_Improvement" style="display:none ;">


      <button type="button" class="btn-close btn-danger" onClick="close_menu()" aria-label="Close"></button>
      <div class="row col-data">
        <div class="col-lg-4">
          <ul class="my-3 ">
            <li> <a href="demo.php"> Interior Designers </li></a> <br>
            <li><a href="demo.php">Modular Kitchen Dealers</li></a> <br>
            <li><a href="demo.php">Painting Contractors</li></a> <br>
            <li><a href="demo.php">Waterproofing contractors</li></a> <br>
            <li><a href="demo.php"> Architects</li></a> <br>
            <li><a href="demo.php"> Furnitures Dealers</li></a> <br>
            <li><a href="demo.php">Solar Plate Dealers</li></a> <br>


          </ul>
        </div>

        <div class="col-lg-4">
          <ul class="my-3 ">
            <li> <a href="demo.php"> Interior Designers </li></a> <br>
            <li><a href="demo.php">Modular Kitchen Dealers</li></a> <br>
            <li><a href="demo.php">Painting Contractors</li></a> <br>
            <li><a href="demo.php">Waterproofing contractors</li></a> <br>
            <li><a href="demo.php"> Architects</li></a> <br>
            <li><a href="demo.php"> Furnitures Dealers</li></a> <br>
            <li><a href="demo.php">Solar Plate Dealers</li></a> <br>


          </ul>
        </div>

        <div class="col-lg-4">
          <ul class="my-3 ">
            <li> <a href="demo.php"> Interior Designers </li></a> <br>
            <li><a href="demo.php">Modular Kitchen Dealers</li></a> <br>
            <li><a href="demo.php">Painting Contractors</li></a> <br>
            <li><a href="demo.php">Waterproofing contractors</li></a> <br>
            <li><a href="demo.php"> Architects</li></a> <br>
            <li><a href="demo.php"> Furnitures Dealers</li></a> <br>
            <li><a href="demo.php">Solar Plate Dealers</li></a> <br>


          </ul>
        </div>


      </div>
    </div>

    <!-- dropdown_Professionalservices-->

    <div class="dropdown_Professionalservices" id="dropdown_Professionalservices" style="display:none ;">


      <button type="button" class="btn-close btn-danger" onClick="close_menu()" aria-label="Close"></button>
      <div class="row col-data">
        <div class="col-lg-4">
          <ul class="my-3 ">
            <li> <a href="demo.php">Civil Lawyers </li></a> <br>
            <li><a href="demo.php"> Property Lawyers</li></a> <br>
            <li><a href="demo.php"> CA Services</li></a> <br>
            <li><a href="demo.php"> GST Consultants</li></a> <br>
            <li><a href="demo.php"> Home insurance</li></a> <br>
            <li><a href="demo.php">Accident insurance</li></a> <br>
            <li><a href="demo.php">Business Loan</li></a> <br>


          </ul>
        </div>

        <div class="col-lg-4">
          <ul class="my-3 ">
            <li> <a href="demo.php">Civil Lawyers </li></a> <br>
            <li><a href="demo.php"> Property Lawyers</li></a> <br>
            <li><a href="demo.php"> CA Services</li></a> <br>
            <li><a href="demo.php"> GST Consultants</li></a> <br>
            <li><a href="demo.php"> Home insurance</li></a> <br>
            <li><a href="demo.php">Accident insurance</li></a> <br>
            <li><a href="demo.php">Business Loan</li></a> <br>


          </ul>
        </div>
        <div class="col-lg-4">
          <ul class="my-3 ">
            <li> <a href="demo.php">Civil Lawyers </li></a> <br>
            <li><a href="demo.php"> Property Lawyers</li></a> <br>
            <li><a href="demo.php"> CA Services</li></a> <br>
            <li><a href="demo.php"> GST Consultants</li></a> <br>
            <li><a href="demo.php"> Home insurance</li></a> <br>
            <li><a href="demo.php">Accident insurance</li></a> <br>
            <li><a href="demo.php">Business Loan</li></a> <br>


          </ul>
        </div>

      </div>
    </div>

    <div class="dropdown_Transport" id="dropdown_Transport" style="display:none ;">


      <button type="button" class="btn-close btn-danger" onClick="close_menu()" aria-label="Close"></button>
      <div class="row col-data">
        <div class="col-lg-4">
          <ul class="my-3 ">
            <li> <a href="demo.php">BUS Travel Agents </li></a> <br>
            <li><a href="demo.php"> Train Travel Agent</li></a> <br>
            <li><a href="demo.php"> Domestic Tour Packages</li></a> <br>
            <li><a href="demo.php"> Car Rentals</li></a> <br>
            <li><a href="demo.php"> Bus Rentals</li></a> <br>
            <li><a href="demo.php">Petroleum Transporters</li></a> <br>
            <li><a href="demo.php">International Sea Cargo</li></a> <br>


          </ul>
        </div>

        <div class="col-lg-4">
          <ul class="my-3 ">
            <li> <a href="demo.php">BUS Travel Agents </li></a> <br>
            <li><a href="demo.php"> Train Travel Agent</li></a> <br>
            <li><a href="demo.php"> Domestic Tour Packages</li></a> <br>
            <li><a href="demo.php"> Car Rentals</li></a> <br>
            <li><a href="demo.php"> Bus Rentals</li></a> <br>
            <li><a href="demo.php">Petroleum Transporters</li></a> <br>
            <li><a href="demo.php">International Sea Cargo</li></a> <br>


          </ul>
        </div>

        <div class="col-lg-4">
          <ul class="my-3 ">
            <li> <a href="demo.php">BUS Travel Agents </li></a> <br>
            <li><a href="demo.php"> Train Travel Agent</li></a> <br>
            <li><a href="demo.php"> Domestic Tour Packages</li></a> <br>
            <li><a href="demo.php"> Car Rentals</li></a> <br>
            <li><a href="demo.php"> Bus Rentals</li></a> <br>
            <li><a href="demo.php">Petroleum Transporters</li></a> <br>
            <li><a href="demo.php">International Sea Cargo</li></a> <br>


          </ul>
        </div>
      </div>
    </div>

    <div class="dropdown_HealthServices" id="dropdown_HealthServices" style="display:none ;">


      <button type="button" class="btn-close btn-danger" onClick="close_menu()" aria-label="Close"></button>
      <div class="row col-data">
        <div class="col-lg-4">
          <ul class="my-3 ">
            <li> <a href="demo.php">Birth Centers </li></a> <br>
            <li><a href="demo.php"> Cancer Hospitals</li></a> <br>
            <li><a href="demo.php"> Ambulance Services</li></a> <br>
            <li><a href="demo.php"> Oxygen Cocentrators</li></a> <br>
            <li><a href="demo.php"> Blood Banks</li></a> <br>
            <li><a href="demo.php">Neurology Hospitals</li></a> <br>
            <li><a href="demo.php">Pathalogists</li></a> <br>


          </ul>
        </div>

        <div class="col-lg-4">
          <ul class="my-3 ">
            <li> <a href="demo.php">Birth Centers </li></a> <br>
            <li><a href="demo.php"> Cancer Hospitals</li></a> <br>
            <li><a href="demo.php"> Ambulance Services</li></a> <br>
            <li><a href="demo.php"> Oxygen Cocentrators</li></a> <br>
            <li><a href="demo.php"> Blood Banks</li></a> <br>
            <li><a href="demo.php">Neurology Hospitals</li></a> <br>
            <li><a href="demo.php">Pathalogists</li></a> <br>


          </ul>
        </div>

        <div class="col-lg-4">
          <ul class="my-3 ">
            <li> <a href="demo.php">Birth Centers </li></a> <br>
            <li><a href="demo.php"> Cancer Hospitals</li></a> <br>
            <li><a href="demo.php"> Ambulance Services</li></a> <br>
            <li><a href="demo.php"> Oxygen Cocentrators</li></a> <br>
            <li><a href="demo.php"> Blood Banks</li></a> <br>
            <li><a href="demo.php">Neurology Hospitals</li></a> <br>
            <li><a href="demo.php">Pathalogists</li></a>


          </ul>
        </div>
      </div>
    </div>

  </section>
  <!-- <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <input type="text" name="searchbar" placeholder="search services" >
    <input type="submit" name="search" value="search" > -->







  <section>

    <div class="container ">
      <div class="page-info">
        <ul>
          <li><strong>30+ M <br></strong>Happy Users</li>
          <li><strong>200+ K <br></strong>Verified Experts</li>
          <li><strong>200+ <br></strong>Categories</li>
        </ul>
      </div>

      <hr class="bg-secondary">
      <div class="container row d-flex justify-content-center d-flex align-items-center">
      <div class="col-lg-5">
        <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow mt-4 justify-content-center">
         
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#fliterDropDown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class=" collapse navbar-collapse justify-content-center " id="fliterDropDown">
              
                <form class="d-flex mx-md-4 mt-3" action="HomePagePhp.php" method="POST">
                  <input class="form-control me-2" type="text" placeholder="Search" name="Search" aria-label="Search">
                  <button class="btn btn-outline-success mr-2" type="submit" name="SearchButton">Search</button>
                  <?php  if(isset($_SESSION['Search'])) { ?>
                    <button class="btn btn-outline-denger" type="submit" name="discard">discard</button>
                    <?php }?>
                </form>
             

            
          </div>
        </nav>
      </div>
      </div>
     
      <div class="container ">
     
     <!-- With search -->
     <?php
     
     
        if(isset($_SESSION['Search'])) {
          ?>
      <div class="row">
      <?php
         
          $search=$_SESSION['Search'];
           $sql = "select * from serviceprovider where sservice='$search' or city='$search'";

           $search_result = mysqli_query($db, $sql) or die("connection failed in card");
           if(mysqli_num_rows($search_result) > 0){
           while ($row = mysqli_fetch_assoc($search_result)) {
          ?>
 <div class="col-md-6">
              <!-- <Form action="./PAYMENT/pay.php" method="$_POST"> -->
              <div class="card m-3 border-0 shadow " style="max-width: 520px;">
                <div class="row g-0 p-3 aling-item-center m-0">
                  <div class="col-md-5">
                    <img src="<?php echo $row['profile']?>" class="card-img" alt="...">
                  </div>
                  <div class="col-md-7 pl-0">


                    <div class="card-body d-flex flex-column m-0">
                      <h5 class="card-title"> <i class="fa-solid fa-user mx-2"></i> <?php echo $row['faname'], $row['lname'];; ?> </h5>
                      <p class="card-title pl-0 text-left "> <i class="fa-solid fa-chalkboard-user mx-2"></i><strong> Service : </strong> <?php echo $row['sservice']; ?> </p>
                      <p class="card-title " name="price"> <i class="fa-solid fa-sack-dollar mx-2"></i> <strong> Charge :</strong> <?php echo $row['charge']; ?> <i class="fa-solid fa-indian-rupee-sign"></i> /Hour</p>
                      <p class="card-title "> <i class="fa-solid fa-star mx-2"></i> <strong> Rating: </strong> <?php echo "4" ?></p>
                      <p class="card-title "> <i class="fa-solid fa-business-time mx-2"></i> <strong> Exprience </strong></p>

                      <!-- <button type="submit" class="btn btn-primary" name="appoint">Appoint</button> -->
                      <a href="appointpage.php?serviceId=<?php echo $row['sid'] ?>" class="btn btn-primary">Appoint</a>
                      


                      <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
                    </div>
                  </div>
                </div>
              </div>
              </Form>
              <!-- if(isset($_POST["Submit1"])) -->

              <!-- </form> -->
            </div>

<?php } }
else{
echo "<script>alert('{$search} provider found')</script>";

}?>

      </div>
      <?php } 
      
     else {  
    ?>

        <!-- //Card fetch   -->

        <div class="row">
          <?php
          $sql = "select * from serviceprovider ";

          $result = mysqli_query($db, $sql) or die("connection failed in card");
          while ($row = mysqli_fetch_assoc($result)) {

          ?>

            <div class="col-md-6">
              <!-- <Form action="./PAYMENT/pay.php" method="$_POST"> -->
              <div class="card m-3 border-0 shadow " style="max-width: 520px;">
                <div class="row g-0 p-3 aling-item-center m-0">
                  <div class="col-md-5">
                    <img src="<?php echo $row['profile']  ?>" class="card-img" alt="...">
                  </div>
                  <div class="col-md-7 pl-0">


                    <div class="card-body d-flex flex-column m-0">
                      <h5 class="card-title"> <i class="fa-solid fa-user mx-2"></i> <?php echo $row['faname']." ".$row['lname']; ?> </h5>
                      <p class="card-title pl-0 text-left "> <i class="fa-solid fa-chalkboard-user mx-2"></i><strong> Service : </strong> <?php echo $row['sservice']; ?> </p>
                      <p class="card-title " name="price"> <i class="fa-solid fa-sack-dollar mx-2"></i> <strong> Charge :</strong> <?php echo $row['charge']; ?> <i class="fa-solid fa-indian-rupee-sign"></i> /Hour</p>
                      <p class="card-title "> <i class="fa-solid fa-star mx-2"></i> <strong> Rating: </strong> <?php echo "4" ?></p>
                      <p class="card-title "> <i class="fa-solid fa-business-time mx-2"></i> <strong> Exprience </strong></p>

                      <!-- <button type="submit" class="btn btn-primary" name="appoint">Appoint</button> -->

                      <a href="appointpage.php?serviceId=<?php echo $row['sid'] ?>" class="btn btn-primary">Appoint</a>
                      <!-- Button trigger modal -->
                      <!-- <a  class="btn btn-primary">Appoint</a> -->



                      <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
                    </div>
                  </div>
                </div>
              </div>
              </Form>
              <!-- if(isset($_POST["Submit1"])) -->

              <!-- </form> -->
            </div>

          <?php
          }
          ?>
        </div>

        <?php }?>
      </div>


  </section>

  <!-- Footer -->
  <section>
    <footer class="text-center text-lg-start bg-dark ">
      <!-- Section: Social media -->
      <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
        <!-- Left -->
        <div class="me-5 d-none d-lg-block">
          <span>Get connected with us on social networks:</span>
        </div>
        <!-- Left -->

        <!-- Right -->
        <div class="icons">
          <a href="" class="me-4 text-reset">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-google"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-linkedin"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-github"></i>
          </a>
        </div>
        <!-- Right -->
      </section>
      <!-- Section: Social media -->

      <!-- Section: Links  -->
      <section class="">
        <div class="container text-center text-md-start mt-5">
          <!-- Grid row -->
          <div class="row mt-3">
            <!-- Grid column -->
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
              <!-- Content -->
              <h6 class="text-uppercase fw-bold mb-4">
                <i class="fas fa-gem me-3"></i>ServiceProvider
              </h6>
              <p>
                This web portal will help the customer to get the personalized service according to their requirement
              </p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold mb-4">
                Servicing In
              </h6>
              <p>
                <a href="#!" class="text-reset">Pune</a>
              </p>
              <p>
                <a href="#!" class="text-reset">Thane</a>
              </p>
              <p>
                <a href="#!" class="text-reset">Mumbai</a>
              </p>
              <p>
                <a href="#!" class="text-reset">Kolapur</a>
              </p>
              <p>
                <a href="#!" class="text-reset">Wardha</a>
              </p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold mb-4">
                Useful links
              </h6>

              <p>
                <a href="https://www.urbancompany.com/blog" class="text-reset">Blog</a>
              </p>
              <p>
                <a href="https://www.urbancompany.com/reviews" class="text-reset">Review</a>
              </p>
              <p>
                <a href="https://www.urbancompany.com/aboutus" class="text-reset">About Us</a>
              </p>
              <p>
                <a href="https://www.urbancompany.com/privacy-policy" class="text-reset">Privacy Policy</a>
              </p>
              <p>
                <a href="https://www.urbancompany.com/terms" class="text-reset">Terms & Conditions</a>
              </p>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
              <p><i class="fas fa-home me-3"></i> Wardha, MH 42001, India</p>
              <p>
                <i class="fas fa-envelope me-3"></i>
                ggg@gmail.com
              </p>
              <p><i class="fas fa-phone me-3"></i> + 876 759 7469</p>
              <p><i class="fas fa-print me-3"></i> + 937 008 7594</p>
            </div>
            <!-- Grid column -->
          </div>
          <!-- Grid row -->
        </div>
      </section>
      <!-- Section: Links  -->

      <!-- Copyright -->
      <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2022 Copyright:
        <a class="text-reset fw-bold" href="https://mdbootstrap.com/">ServiceProvider</a>
      </div>
      <!-- Copyright -->
    </footer>
  </section>




  <script>
    function show_Home() {
      var menu1 = document.getElementById('dropdown_Home');

      if (menu1.style.display == 'none') {
        menu1.style.display = 'block';
      } else {
        menu1.style.display = 'none';
      }
    }

    function appoint() {
      alert("Service appoint successfully")
    }

    function show_HomeImprovement() {
      var menu1 = document.getElementById('dropdown_Improvement');

      if (menu1.style.display == 'none') {
        menu1.style.display = 'block';
      } else {
        menu1.style.display = 'none';
      }
    }

    function show_Professionalservices() {
      var menu1 = document.getElementById('dropdown_Professionalservices');

      if (menu1.style.display == 'none') {
        menu1.style.display = 'block';
      } else {
        menu1.style.display = 'none';
      }
    }

    function show_Transport() {
      var menu1 = document.getElementById('dropdown_Transport');

      if (menu1.style.display == 'none') {
        menu1.style.display = 'block';
      } else {
        menu1.style.display = 'none';
      }
    }

    function show_HealthServices() {
      var menu1 = document.getElementById('dropdown_HealthServices');

      if (menu1.style.display == 'none') {
        menu1.style.display = 'block';
      } else {
        menu1.style.display = 'none';
      }
    }



    function searchIcon() {
      var menuu = document.getElementById('searchIcon');
      if (menuu.style.display == 'none') {
        menuu.style.width = '50px';
        menuu.style.display = 'block';

      } else {
        menuu.style.display = 'none';
      }
    }

    // function close_menu() {
    //   var menu1 = document.getElementById('hidemenu');

    //   if (menu1.style.display == 'block') {
    //     menu1.style.display = 'none';
    //   } else {
    //     menu1.style.display = 'block';
    //    }
    // }
    // function show_HomeImprovement() {
    //   var menu1 = document.getElementById('dropdown_Improvement');

    //   if (menu1.style.display == 'none') {
    //     menu1.style.display = 'block';
    //   } else {
    //     menu1.style.display = 'none';
    //   }
    // }
  </script>

  <script>
    const navbar = document.querySelector('#insearch');
    // const navbar = document.getElementById('#insearch');


    let top = navbar.offsetTop;

    function stickynavbar() {
      if (window.scrollY >= top) {
        navbar.classList.add('sticky-section');
      } else {
        navbar.classList.remove('sticky-section');
      }
    }
    window.addEventListener('scroll', stickynavbar);
  </script>


</body>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/d594306424.js" crossorigin="anonymous"></script>



</html>