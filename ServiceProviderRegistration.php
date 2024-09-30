<?php

use LDAP\Result;

// isset()
if(isset($_GET['service_id'])){
  include "config.php";
  $service_id = $_GET['service_id'];
  
  // $sqlstatus = "select * from serviceprovider where service_status='$service_name'";
  $sqlstatus ="UPDATE orders
       SET service_status = 1
       WHERE id=$service_id";
  $_SESSION['service_status']=1;
  $result = mysqli_query($db, $sqlstatus) or die("connection failed in card");
  header("Location: http://localhost/MiniProject%20V.1/Pages/serviceprociderdashboard.php");
  
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css" rel="stylesheet" />
   <link rel="stylesheet" href="ServiceProviderRegistration.css">
    <style>
        button {
            box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.35);
            padding: 0%;
        }
        body{
    background-color: #fff9f9;
  }

.outercontainer{
    margin-top: 10px;
    background-color: #FFFFFF;
    box-shadow: 0 7px 7px 7px rgba(220, 214, 214, 0.45);
    margin-bottom: 20px;
    border-radius: 17px;
   
   
  }
  .providerheading{
    display: flex; 
   height: 70px;
   display: flex;
    justify-content: center;
    align-items: center;
    color: white;
  }
  
  

    </style>
</head>

<body>
    <div class="container outercontainer ">
      <div class="container-fluid providerheading bg-dark">
        <h2 >Register As A Service Provider</h2>
      </div>
        <div class="row ">
          <div
            class="h-100  d-flex align-items-center justify-content-center mt-5 w-100"
          >
  
          
            <form class="w-100" action="ServiceProviderSaveData.php"  method = "post" enctype="multipart/form-data">
              <div class="form-row ">
                <div class="form-group col-md-6">
                  <label for="inputEmail4">First Name</label>
                  <input
                    type="text" 
                    class="form-control"
                    id="inputEmail4"
                    placeholder="First Name"
                    name="fname"
                  />
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Last Name</label>
                  <input
                    type="text"
                    class="form-control"
                    id="inputPassword4"
                    placeholder="Last Name"
                    name="lname"
                  />
                </div>
              </div>
  
              <div class="form-row">
                <div class="form-group col-md-6">
                <label for="Gmail">Email</label>
                  <input
                    type="email"
                    class="form-control"
                    id="Gmail"
                    placeholder="Email"
                    name="gmail"
                  />  
                </div>
                <div class="form-group col-md-6">
                  <label for="inputState">Gender</label>
                  <select id="inputState" name="gender" class="form-control">
                    <option selected disabled>Choose...</option>
                    <option value="male" >Male</option>
                    <option value="female" >Female</option>
                    <option value="other" >Other</option>
                  </select>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail4">Company name</label>
                  <input type="text" name="company" class="form-control" id="inputEmail4" />
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Register Date</label>
                  <input type="date" class="form-control" name="regdate" id="inputPassword4" />
                  <small class=" text-info">Enter current date </small>
                </div>
              </div>
              
              
  
              <div class="form-group">
                <label for="inputAddress">Address</label>
                <input
                  type="text"
                  class="form-control"
                  id="inputAddress"
                  placeholder="1234 Main St"
                  name="address"
                />
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail4">city name</label>
                  <input type="text" name="city" class="form-control" id="inputEmail4" />
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4">state </label>
                  <input type="text" class="form-control" name="state" id="inputPassword4" />
                  
                </div>
              </div>
              <div class="form-group col-12">
                  <label for="inputPassword4">Upload Addhar Card</label>
                  <input type="file" class="form-control" name="uploadadhar" id="inputPassword4" />
                </div>
              
  
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail4">Addhar Number</label>
                  <input type="Number" name="adharno" class="form-control" id="inputEmail4" />
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4">DOB</label>
                  <input type="date" class="form-control" name="dbd" id="inputPassword4" />
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail4">Charge/hrs</label>
                  <input type="Number" name="charge" class="form-control" id="inputEmail4" />
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Profile Picture</label>
                  <input type="file" class="form-control" name="profile" id="inputPassword4" />
                </div>
              </div>
       
       
              
              <div class="input-group mb-3">
                <!-- <div class="input-group-prepend">
                  <button class="btn btn-outline-secondary" type="button">Choose Category</button>
                </div> -->
                <select class="custom-select" name="selectCategory" id="inputGroupSelect03" aria-label="Example select with button addon">
                  <option value="" disabled selected>select...</option>
                  <?php
                 $conn= mysqli_connect("localhost","root","","miniproject") or die("connection feild");
                 $sql = "SELECT * FROM  category ";
                $result = mysqli_query($conn,$sql) or die("query unsuccessful");
                 while($row = mysqli_fetch_assoc($result)){
                ?>
                <option value="<?php echo $row['category']  ?>"><?php echo $row['category']  ?></option>
                <?php } ?>
                </select>
              </div>
              
              
<div class="input-group mb-3">
<div class="input-group-prepend">
  <button class="btn btn-outline-secondary" type="button">Choose Service</button>
</div>
<select class="custom-select" name="selectService" id="inputGroupSelect03" aria-label="Example select with button addon">

    <option value="" disabled selected>select...</option>
    <?php
                 $conn= mysqli_connect("localhost","root","","miniproject") or die("connection feild");
                 $sql = "SELECT * FROM  subcategory ";
                $result = mysqli_query($conn,$sql) or die("query unsuccessful");
                 while($row = mysqli_fetch_assoc($result)){
                ?>
                <option value="<?php echo $row['sname']  ?>"><?php echo $row['sname']  ?></option>
                <?php } ?>
</select>

</div>   
              
              
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail4">Password</label>
                  <input
                    type="password"
                    class="form-control"
                    id="inputEmail4"
                    placeholder="Password"
                    name="password"
                  />
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Confirm Password</label>
                  <input
                    type="password"
                    class="form-control"
                    id="inputPassword4"
                    placeholder="Confirm Password"
                    name="cpassword"
                  />
                </div>
              </div>
  
              <div class="mb-3">
                <label for="validationTextarea">Textarea</label>
                <textarea class="form-control " name="message"  id="validationTextarea" placeholder="Required example textarea" required></textarea>
                <div class="invalid-feedback">
                  Please enter a message in the textarea.
                </div>
              </div>
              
  
              <button type="submit" name="register" class="btn btn-primary my-2">Register</button>
            </form>
          </div>
        </div>
      </div>
</body>

</html>