<?php


if (!isset($_POST['register'])) {
    ?>
      <script>
       alert('REGISTRATION FAILED AS A SERVICE PROVIDER TRY AGAIN!!!');  
   
        window.location.href = 'HomePage.php';
      </script>
<?php }
else{
    
$FNAME = $_POST['fname'];
$LNAME = $_POST['lname'];
// $Age = $_POST['lname'];

$GMAIL = $_POST['gmail'];
$GENDER = $_POST['gender'];
$ADDRESS = $_POST['address'];
$AADHAR = $_POST['uploadadhar'];
$ADHARNO = $_POST['adharno'];
$COMPANY = $_POST['company'];
$REGISTERDATE = $_POST['regdate'];



$DOB = $_POST['dbd'];
$CHARGE=$_POST['charge'];
$SCATEGORY = $_POST['selectCategory'];
$SSERVICE = $_POST['selectService'];
$PASSWORD = $_POST['password'];
$CPASSWORD = $_POST['cpassword'];
$MESSAGE = $_POST['message'];
$STATE = $_POST['state'];
$CITY = $_POST['city'];


$filename = $_FILES["uploadadhar"]["name"];
$tempname=$_FILES["uploadadhar"]["tmp_name"];
$folder ="ADHAR_IMG/".$filename;
move_uploaded_file($tempname,$folder);

$filenameprofile = $_FILES["profile"]["name"];
$tempnameprofile=$_FILES["profile"]["tmp_name"];
$folderprofile ="PROFILE_IMG/".$filenameprofile;
move_uploaded_file($tempnameprofile,$folderprofile);


$conn = mysqli_connect("localhost", "root", "", "miniproject") or die("connection feild");
$sql = "INSERT INTO serviceprovider (profile,adharimg,faname, lname, gmail, gender, companyName, address , city,state,registrtiondate, addharcard,addharnumber,dob,scategory,sservice,charge,password,cpassword,desp) VALUES ('{$folderprofile}','{$folder}','{$FNAME}','{$LNAME}','{$GMAIL}','{$GENDER}','{$COMPANY}','{$ADDRESS}','{$CITY}','{$STATE}',{$REGISTERDATE} ,'{$AADHAR}','{$ADHARNO}','{$DOB}'
,'{$SCATEGORY}','{$SSERVICE}','{$CHARGE}','{$PASSWORD}','{$CPASSWORD}','{$MESSAGE}') ";
$result = mysqli_query($conn, $sql) or die("unSUCCESS");
?>
<script>
       alert(' YOU ARE REGISTER SUCCESSFUL AS A SERVICE PROVIDER ');  
   
         window.location.href = 'HomePage.php';
      </script>
<?php 
// header("Location: http://localhost/MiniProject%20V.1/Pages/HomePage.php");


mysqli_close($conn);
}

    

?>