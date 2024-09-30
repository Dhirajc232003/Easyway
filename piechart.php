<?php 
$db = mysqli_connect("localhost","root","","miniproject") or die("connectiion Failed");
                                                $sqlgraph = "SELECT sservice, COUNT(sservice) as scount FROM serviceprovider group by sservice";
                                                $resultgraph =mysqli_query($db,$sqlgraph) or die("error in chart");
                                                
                                                foreach($resultgraph as $data){
                                                    $services[]=$data['sservice'];
                                                    $count[]=$data['scount'];
                                                }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js.map"></script>
<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    
    data: {
      labels: <?php echo json_encode($services) ?>,
      datasets: [{
        label: '# of Votes',
        data: <?php echo json_encode($count,JSON_NUMERIC_CHECK) ?>,
      
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>

  <div>
    <canvas id="myChart"> </canvas>
  </div>
</body>
</html>

