

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
    <title>Dashboard | Bootstrap Simple Admin Template</title>
    <link href="assets/vendor/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/solid.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/master.css" rel="stylesheet">
    <link href="assets/vendor/flagiconcss/css/flag-icon.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d594306424.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <!-- barchar -->
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Service Provider', 'City'],

          <?php
           $db = mysqli_connect("localhost","root","","miniproject") or die("connectiion Failed");
           $sql = "SELECT sservice, COUNT(sservice) as scount FROM serviceprovider group by sservice";
           $result =mysqli_query($db,$sql) or die("error in chart");
           if(mysqli_num_rows($result)>0){
           while($row=mysqli_fetch_assoc($result)){
            ?>

           ['<?php echo $row['sservice'] ?>' ,<?php echo $row['scount'] ?>],
            
           

<?php
           }
          }
          ?>
        ]);

        var options = {
          title: 'Register Services',
          animation:{
        duration: 1000,
        easing: 'out',
      },
      vAxis: {minValue:0, maxValue:1000},
    is3D:true,
   
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

    <!-- barchar -->

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          <?php
           $db = mysqli_connect("localhost","root","","miniproject") or die("connectiion Failed");
           $sqlUserGraph = "SELECT service_status,COUNT(service_status) as scount FROM orders group by service_status";
           $resultUserGraph =mysqli_query($db,$sqlUserGraph) or die("error in chart");
           if(mysqli_num_rows($result)>0){
           while($row=mysqli_fetch_assoc($resultUserGraph)){
            ?>

           ['<?php echo $row['service_status'] ?>' ,<?php echo $row['scount'] ?>],
            
           

<?php
           }
          }
          ?>
        ]);

        var options = {
          title: 'Complete Services',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>

</head>

<body>
    <div class="wrapper">
       <?php 
       include "sessonforAdmin.php";
       include "sideNav.php";
       ?>
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
                                <a href="#" id="nav2" class="nav-item nav-link dropdown-toggle text-success" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-user"></i> <span> <strong> <?php echo $AName ?> </strong></span> <i style="font-size: 26;" class="fas fa-caret-down"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end nav-link-menu">
                                    <ul class="nav-list">
                                        <li><a href="" class="dropdown-item"><i class="fas fa-address-card"></i> Profile</a></li>
                                        <li><a href="" class="dropdown-item"><i class="fas fa-envelope"></i> Messages</a></li>
                                        <li><a href="" class="dropdown-item"><i class="fas fa-cog"></i> Settings</a></li>
                                        <div class="dropdown-divider"></div>
                                        <li><a href="Admin_Logout.php" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
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
                    <div class="row">
                        <div class="col-md-12 page-header">
                            <div class="page-pretitle">Overview</div>
                            <h2 class="page-title">Dashboard</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="icon-big text-center">
                                                <i class="teal fas fa-shopping-cart"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="detail">
                                            <?php
                                             include "config.php";

                                             $sql_serviceprovider= "select  count(sid) from serviceprovider";
                                             $result_serviceprovider = mysqli_query($db,$sql_serviceprovider) or die("connection feild in dashboards admin");
                                             $row_serviceprovider = mysqli_fetch_assoc($result_serviceprovider)
                                             ?>
                                                <p class="">ServiceProvider</p>
                                                <span class="number"><?php echo $row_serviceprovider['count(sid)'] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer">
                                        <hr />
                                        <div class="stats">
                                            <i class="fas fa-calendar"></i> For this month
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="icon-big text-center">
                                                <i class="olive fas fa-money-bill-alt"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                        <?php

                                             $sql_admin_revenue= "select  sum(charge) from orders";
                                             $sql_admin_revenue = mysqli_query($db,$sql_admin_revenue) or die("connection feild in dashboards admin revenue");
                                             $sql_admin_revenue = mysqli_fetch_assoc($sql_admin_revenue)
                                             ?>
                                            <div class="detail">
                                                <p class="">Revenue</p>
                                                <span class="number"><i class="fas fa-rupee-sign mx-2"></i><?php echo $sql_admin_revenue['sum(charge)'] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer">
                                        <hr />
                                        <div class="stats">
                                            <i class="fas fa-calendar"></i> For this Month
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="icon-big text-center">
                                                <i class="violet fas fa-eye"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="detail">
                                             <?php
                                             include "config.php";

                                             $sql_user= "select  count(Uid) from user";
                                             $result_user = mysqli_query($db,$sql_user) or die("connection feild in dashboards admin");
                                             $row_user = mysqli_fetch_assoc($result_user)
                                             ?>
                                                <p class="">Customers</p>
                                                <span class="number"> <?php echo $row_user['count(Uid)'] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer">
                                        <hr />
                                        <div class="stats">
                                            <i class="fas fa-stopwatch"></i> For this Month
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="icon-big text-center">
                                                <i class="orange fas fa-envelope"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="detail">
                                                <p class="">Support Request</p>
                                                <span class="number">5</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer">
                                        <hr />
                                        <div class="stats">
                                            <i class="fas fa-envelope-open-text"></i> For this week
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="content">
                                            <div class="head">
                                                <h5 class="mb-0">Total Register Services</h5>
                                                <p class="text-muted">Current year website visitor data</p>
                                            </div>
                                            <!-- <div class="canvas-wrapper">
                                                
                                                <canvas class="chart" id="trafficflow"></canvas>
                                            </div>
                                             -->
                                             <div class="canvas-wrapper">
                                                <div id="piechart" style="width: 500px; height: 500px;"></div>
                                            </div>
                                             

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="content">
                                            <div class="head">
                                                <h5 class="mb-0">Sales Overview</h5>
                                                <p class="text-muted">Current year sales data</p>
                                            </div>
                                            <div class="canvas-wrapper">
                                                <!-- <canvas class="chart" id="sales" style="width: 500px; height: 400px;" ></canvas> -->
                                                <div id="donutchart" style="width: 500px; height: 500px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="content">
                                    <div class="head">
                                        <h5 class="mb-0">Top Visitors by city</h5>
                                        <p class="text-muted">Current year website visitor data</p>
                                    </div>
                                    <div class="canvas-wrapper">
                                        <table class="table table-striped">
                                            <thead class="success">
                                                <tr>
                                                    <th>city</th>
                                                    <th class="text-end">Unique Visitors</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><i class="fa-solid fa-flag"></i> Wardha</td>
                                                    <td class="text-end">27,340</td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="content">
                                    <div class="head">
                                        <h5 class="mb-0">Most Used Services</h5>
                                        <p class="text-muted">Current year website visitor data</p>
                                    </div>
                                    <div class="canvas-wrapper">
                                        <table class="table table-striped">
                                            <thead class="success">
                                                <tr>
                                                    <th>Service Name</th>
                                                    <th class="text-end">Used Count</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>AC Repair <a href="#"><i class="fas fa-link blue"></i></a></td>
                                                    <td class="text-end">8,340</td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="dfd text-center">
                                            <i class="blue large-icon mb-2 fas fa-thumbs-up"></i>
                                            <h4 class="mb-0">+21,900</h4>
                                            <p class="text-muted"> Overall Service Rating</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="dfd text-center">
                                            <i class="orange large-icon mb-2 fas fa-reply-all"></i>
                                            <h4 class="mb-0">+22,566</h4>
                                            <p class="text-muted">Visitors</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="dfd text-center">
                                            <i class="grey large-icon mb-2 fas fa-envelope"></i>
                                            <h4 class="mb-0">+15,566</h4>
                                            <p class="text-muted">Subscribers</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="dfd text-center">
                                            <!-- <i class="olive large-icon mb-2 fas fa-dollar-sign"></i> -->
                                            <i class="fa-solid fa-rupee-sign  large-icon mb-2"></i>
                                            <h4 class="mb-0">+98,601</h4>
                                            <p class="text-muted">Total Servecies</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chartsjs/Chart.min.js"></script>
    <script src="assets/js/dashboard-charts.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>
