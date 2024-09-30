<?php



   include("config.php");

 
   if(isset($_POST['register'])) {

   $NAME = $_POST['Name'];
   $USERNAME = $_POST['Username'];
   $EMAIL = $_POST['Email'];
   $PASSWORD = $_POST['Password'];
   $CPASSWORD = $_POST['Repeatpassword'];
   $ADDRESS = $_POST['Address'];
   
   
   
   $db = mysqli_connect("localhost","root","","miniproject") or die("connectiion Failed");

   $sql="INSERT INTO user (Uid, Name, Email, Passworduser, Cpassword,Address) VALUES('{$USERNAME}','{$NAME}','{$EMAIL}','{$PASSWORD}','{$CPASSWORD}','{$ADDRESS}')";
   $Result= mysqli_query($db,$sql) or die("unSUCCESS");
   // $result = mysqli_query($conn, $sql) or die("unSUCCESS");

   echo "<SCRIPT> alert('Register Successful')  </SCRIPT> "; 
   header("Location: http://localhost/MiniProject%20V.1/Pages/HomePage.php");

   }



   
//Lohin Php
   session_start();
   
   //search
   if(isset($_POST['SearchButton'])) {
   $_SESSION['Search']=$_POST['Search'];
   $Search=$_SESSION['Search'];
   header("Location: http://localhost/MiniProject%20V.1/Pages/HomePage.php");

   }
   //discard search
   if(isset($_POST['discard'])) {
      unset($_SESSION['Search']);
      header("Location: http://localhost/MiniProject%20V.1/Pages/HomePage.php");
   
      }
   // if($_SERVER["REQUEST_METHOD"] == "POST") {
   if(isset($_POST['login'])) {


      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 

      if(isset($_POST['role'])) {
      $ROLE = $_POST['role'];
      
      if($ROLE=="User") {
      $sql = "SELECT * FROM user WHERE Email = '{$myusername}' and Passworduser = '{$mypassword}'";
      $res = mysqli_query($db,$sql) or die("result failed");
      if(mysqli_num_rows($res) >0)
      {
        $row=mysqli_fetch_assoc($res);
         echo "<SCRIPT> alert('You are logIn as User')  </SCRIPT> ";  
		$_SESSION['UID']=$row['Uid'];
		$_SESSION['UNAME']=$row['Name'];
		$_SESSION['EMAIL']=$row['Email'];



         header("Location: http://localhost/MiniProject%20V.1/Pages/HomePage.php");
      }
      else {
         $error = "Your Login Name or Password is invalid";
         echo'<script>
         alert("$error");
         </script>';
         header("Location: http://localhost/MiniProject%20V.1/Pages/HomePage.php");

      }

   } 
   if($ROLE=="ServiceProvider") {
      $sql = "SELECT * FROM serviceprovider WHERE gmail = '{$myusername}' AND password = '{$mypassword}'";
      $res = mysqli_query($db,$sql) or die("result failed");
      
      if(mysqli_num_rows($res) >0)
      {
         $row=mysqli_fetch_assoc($res);
         echo "<SCRIPT> alert('You are logIn as User')  </SCRIPT> ";  
		$_SESSION['SID']=$row['sid'];
		$_SESSION['SPNAME']=$row['faname'];
		$_SESSION['gmail']=$row['gmail'];




         header("Location: http://localhost/MiniProject%20V.1/Pages/Serviceprociderdashboard.php");
      }
      else {
         $error = "Your Login Name or Password is invalid";
      }

      // echo "<SCRIPT> alert('You are logIn as User')  </SCRIPT> ";  

   }
   if($ROLE=="Admin"){
      $sql = "SELECT * FROM admin WHERE AdminGmail = '{$myusername}' and AdminPass = '{$mypassword}'";
      $res = mysqli_query($db,$sql) or die("result failed");
      if(mysqli_num_rows($res) >0)
      {
         $row=mysqli_fetch_assoc($res);
         echo "<SCRIPT> alert('You are logIn as User')  </SCRIPT> ";  
		$_SESSION['UID']=$row['AdminId'];
		$_SESSION['ANAME']=$row['AdminName'];


      header("Location: http://localhost/MiniProject%20V.1/Pages/dashboard.php");
         
      }
      else {
         $error = "Your Login Name or Password is invalid";

      }

   }}
   else { ?>
       <script>
    alert("You Need To Choose Role");
    window.location.href = 'HomePage.php';

  </script>
      
    <?php }
      // $result = mysqli_query($db,$sql) or die("unsuccessful");
      // $row = mysqli_fetch_array($result,MYSQLI_ASSOC) or die("unsuccessful");
      // $active = $row['active'];
      
      // $count = mysqli_num_rows($result) or die("unsuccessful");
      
      // $res = mysqli_query($db,$sql) or die("result failed");
      // if(mysqli_num_rows($res) >0)
      // {
      //    $row=mysqli_fetch_assoc($res);
      //    echo "<SCRIPT> alert('hiiii')  </SCRIPT> ";  
		// $_SESSION['UID']=$row['Uid'];
		// $_SESSION['UNAME']=$row['Name'];


      //    header("Location: http://localhost/MiniProject%20V.1/Pages/HomePage.php");
      // }
      // else {
      //    $error = "Your Login Name or Password is invalid";
      // }





      // If result matched $myusername and $mypassword, table row must be 1 row
		
      // if($count == 1) {
      //   //  session_register("myusername");
      //     echo "<SCRIPT> alert('hiiii')  </SCRIPT> ";
      //    $_SESSION['login_user'] = $myusername;

         
      //    header("Location: http://localhost/MiniProject%20V.1/Pages/ServiceProviderRegistration.php");
      // }
   }
?>