

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
else{
    $AName =$_SESSION['ANAME'];
}



?>