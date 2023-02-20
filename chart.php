<?php 

include("conn.php");

$sql = "SELECT * FROM bbc_friends";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    $date = array();
    $table_data = '';
    while($row = $result->fetch_assoc()) {
        if(!empty($row['create_at'])){
            if(!in_array($row['create_at'],$date)){
                $date[] = $row['create_at'];
            }
        }
        $table_data .= "<tr>";
        $table_data .= "<th scope='row'>".$row['id']."</th>";
        $table_data .= "<td >".$row['s_name']."</td>";
        $table_data .= "<td >".$row['name']."</td>";
        $table_data .= "<td >".$row['age']."</td>";
        $table_data .= "<td >".$row['education']."</td>";
        $table_data .= "<td >".$row['married']."</td>";
        $table_data .= "<td >".$row['skill']."</td>";
        $table_data .= "<td >".$row['mobile_no']."</td>";
        $table_data .= "<td >".$row['create_at']."</td>";
        $table_data .= "</tr>";
    }
    $chart_data = '[
    
    {"period": "2023-02-01", "count": 0},
    {"period": "2023-03-01", "count": 0},
    ';
    $i=count($date);
    foreach ($date as $key => $data){
        $key = $key + 1;
        $sql = "SELECT count(*) FROM bbc_friends WHERE `create_at` = '".$data."'";
        $result = $con->query($sql);
       $count = $result->fetch_assoc();
      
        $chart_data .= '{' . '"period": "'. $data .'","' . 'count":' .  $count['count(*)'] .'}';
        if($i > $key){
            $chart_data .=  ',<br/>';
        }
       
    }
    $chart_data .= ']';
  } else {
    echo "0 results";
  }

  $con->close();

?>
<!doctype html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
  <script src="morris.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.js"></script>
  <script src="lib/example.js"></script>
  <link rel="stylesheet" href="lib/example.css">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.css">
  <link rel="stylesheet" href="morris.css">
</head>
<body>
<h1>BBC Group Members List</h1>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Shop Name</th>
      <th scope="col">Name</th>
      <th scope="col">Age</th>
      <th scope="col">Education</th>
      <th scope="col">Married</th>
      <th scope="col">Skill</th>
      <th scope="col">Mobile No.</th>
      <th scope="col">Join Date</th>
    </tr>
  </thead>
  <tbody>
    <?php echo $table_data;  ?>
  </tbody>
</table>
<div id="graph"></div>
<pre id="code" class="prettyprint linenums" style="display:none">
/* data stolen from http://howmanyleft.co.uk/vehicle/jaguar_'e'_type */
var day_data = <?php print_r($chart_data) ?>;
    <!-- var day_data = [
    {"period": "2023-02-14", "count": 1},
    {"period": "2023-02-15", "count": 4},
    {"period": "2023-02-16", "count": 3},
    {"period": "2023-02-17","count":1},
    {"period": "2023-02-18","count":2},
    {"period": "2023-02-19","count":2}
    ]; -->
    <!-- Morris.Line -->
    <!-- Morris.Bar -->
    <!-- Morris.Area -->
Morris.Area({
  element: 'graph',
  behaveLikeLine: true,
  data: day_data,
  xkey: 'period',
  ykeys: ['count'],
  labels: ['Count']
});
</pre>
</body>
