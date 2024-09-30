<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "miniproject");
$output = '';
if(isset($_POST["search_text"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["search_text"]);
 $query = "
  SELECT * FROM serviceprovider 
  WHERE  LIKE '%".$search."%'
  OR sservice LIKE '%".$search."%' 
  OR City LIKE '%".$search."%' 
  OR PostalCode LIKE '%".$search."%' 
  OR state LIKE '%".$search."%'
 ";
}
else
{
 $query = "
  SELECT * FROM serviceprovider ORDER BY sid
 ";
}
$result = mysqli_query($connect, $query);
// if(mysqli_num_rows($result) > 0)
// {
//  $output .= '
//   <div class="table-responsive">
//    <table class="table table bordered">
//     <tr>
//      <th>Customer Name</th>
//      <th>Address</th>
//      <th>City</th>
//      <th>Postal Code</th>
//      <th>Country</th>
//     </tr>
//  ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
  <form method="post"  action="">
  <div class="card m-3 border-0 shadow " style="max-width: 490px;">
    <div class="row g-0 p-3 aling-item-center m-0">
      <div class="col-md-5">
        <img src="../Images/dhiraj.jpg" class="img-fluid rounded" alt="...">
      </div>
      <div class="col-md-7 ">


        <div class="card-body d-flex flex-column m-0">
          <h5 class="card-title"> <i class="fa-solid fa-user mx-2"></i>  </h5>
          <p class="card-title "> <i class="fa-solid fa-chalkboard-user mx-2"></i><strong> Service : </strong> </p>
          <p class="card-title "> <i class="fa-solid fa-sack-dollar mx-2"></i>ur</p>
          <p class="card-title "> <i class="fa-solid fa-star mx-2"></i> <strong> Rating: </strong>  4 ?></p>
          <p class="card-title "> <i class="fa-solid fa-business-time mx-2"></i> <strong> Exprience </strong></p>
         
          <input type="submit" class="btn btn-success w-50 " name="appoint" value="Appoint" id="">
         


          <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
        </div>
      </div>
    </div>
  </div>
 

</form>
  ';
 }
 echo $output;
// }
// else
// {
//  echo 'Data Not Found';
// }

?>