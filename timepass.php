<!-- <html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     11],
          ['Eat',      2],
          ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7]
        ]);

        var options = {
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>

<?php 
include "config.php"
?> -->

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
  </head>
  <body>
    <div id="piechart" style="width: 500px; height: 500px;"></div>
  </body>
</html>



                                                <!-- $db = mysqli_connect("localhost","root","","miniproject") or die("connectiion Failed");
                                                $sqlgraph = "SELECT sservice, COUNT(sservice) as scount FROM serviceprovider group by sservice";
                                                $resultgraph =mysqli_query($db,$sqlgraph) or die("error in chart");
                                                
                                                foreach($resultgraph as $data){
                                                    $services[]=$data['sservice'];
                                                    $scount[]=$data['scount'];
                                                } -->
                                              