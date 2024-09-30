

<!doctype html>
<!-- 
* Bootstrap Simple Admin Template
* Version: 2.1
* Author: Alexis Luna
* Website: https://github.com/alexis-luna/bootstrap-simple-admin-template
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Users | Bootstrap Simple Admin Template</title>
    <link href="assets/vendor/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/solid.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/datatables/datatables.min.css" rel="stylesheet">
    <link href="assets/css/master.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <!-- sidebar navigation component -->
        <?php 
       include "sessonforAdmin.php";
       include "sideNav.php";
       ?>
        
        <!-- end of sidebar component -->
        <div id="body" class="active">
            <!-- navbar navigation component -->
            <nav class="navbar navbar-expand-lg navbar-white bg-white">
                <button type="button" id="sidebarCollapse" class="btn btn-light">
                    <i class="fas fa-bars"></i><span></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <div class="nav-dropdown">
                                <a href="#" id="nav1" class="nav-item nav-link dropdown-toggle text-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-link"></i> <span>Quick Links</span> <i style="font-size: .8em;" class="fas fa-caret-down"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end nav-link-menu" aria-labelledby="nav1">
                                    <ul class="nav-list">
                                        <li><a href="" class="dropdown-item"><i class="fas fa-list"></i> Access Logs</a></li>
                                        <div class="dropdown-divider"></div>
                                        <li><a href="" class="dropdown-item"><i class="fas fa-database"></i> Back ups</a></li>
                                        <div class="dropdown-divider"></div>
                                        <li><a href="" class="dropdown-item"><i class="fas fa-cloud-download-alt"></i> Updates</a></li>
                                        <div class="dropdown-divider"></div>
                                        <li><a href="" class="dropdown-item"><i class="fas fa-user-shield"></i> Roles</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <div class="nav-dropdown">
                                <a href="#" id="nav2" class="nav-item nav-link dropdown-toggle text-secondary" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-user"></i> <span> <?php echo $AName ?></span> <i style="font-size: .8em;" class="fas fa-caret-down"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end nav-link-menu">
                                    <ul class="nav-list">
                                        <li><a href="" class="dropdown-item"><i class="fas fa-address-card"></i> Profile</a></li>
                                        <li><a href="" class="dropdown-item"><i class="fas fa-envelope"></i> Messages</a></li>
                                        <li><a href="" class="dropdown-item"><i class="fas fa-cog"></i> Settings</a></li>
                                        <div class="dropdown-divider"></div>
                                        <li><a href="" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- end of navbar navigation -->
            <div class="content">
                <div class="container">
                    <div class="page-title">
                        <h3>Service Provider
                            <a href="roles.html" class="btn btn-sm btn-outline-primary float-end"><i class="fas fa-user-shield"></i> Roles</a>
                        </h3>
                    </div>
                    <div class="box box-primary">
                        <div class="box-body">
                            <table width="100%" class="table table-hover" id="dataTables-example">
                            <?php  
		                            
                                     
                                     include "config.php";
                                    $sql1 = "SELECT * FROM serviceprovider";
                                    $res = mysqli_query($db,$sql1) or die("result failed in table");
                                    if(mysqli_num_rows($res) >0)
                                                 { ?>  
                            <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Type</th>
                                        <th>Charge</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php } ?>
                              
                                <tbody>
                                    <?php 
                                while($row= mysqli_fetch_assoc($res))
                                 {
                                    ?>
                                    <tr>
                                        <td> <?php echo $row['faname']." ".$row['lname'] ?> </td>
                                        <td><?php echo $row['gmail'] ?> </td>
                                        <td><?php echo $row['sservice'] ?></td>
                                        <td><?php echo $row['scategory'] ?></td>
                                        <td><?php echo $row['charge'] ?></td>
                                        <!-- <td><a class="btn btn-danger" href="user.php?sid=<?php echo $row['sid'] ?>"></a></td> -->

                                        <td class="text-end">
                                            <a href="users.php?editid=<?php echo $row['sid'] ?>" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                                            <a href="users.php?sid=<?php echo $row['sid'] ?>" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                   <?php } ?>
                                </tbody>
                               <!-- for  Delete button  -->
                                <?php  
                                if(isset($_GET['sid'])){
include "config.php";
$sid = $_GET['sid'];
$sql= "DELETE FROM serviceprovider WHERE sid=$sid";
$result=mysqli_query($db,$sql) or die("die in uses.php delete function");
                                }
                                 
                                if(isset($_GET['editid'])){
include "config.php";
$editid = $_GET['editid'];
// $sql= "DELETE FROM serviceprovider WHERE sid=$editid";
// $result=mysqli_query($db,$sql) or die("die in uses.php edit function");
                                }
?>


                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/datatables/datatables.min.js"></script>
    <script src="assets/js/initiate-datatables.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>