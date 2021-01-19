<?php

//load.php

$connect = new PDO('mysql:host=localhost;dbname=profLabdb', 'root', '');

$data = array();

$query = "SELECT * FROM Course ORDER BY id";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();
$colors =array('blue','brown','red','green','orange','purple','gray');

foreach($result as $row)
{
 $data[] = array(
  'grouId'   => $row["id"],
  'title'   => $row["title"],
  'daysOfWeek'=>[$row['daySeance']],
  'startTime'   => $row["seanceStart"],
  'endTime'   => $row["seanceEnd"],
  'color'=>'white',
  'borderColor'=> $colors[intval($row['daySeance'])],
  'textColor'=> $colors[intval($row['daySeance'])]
 );
}
echo json_encode($data);
?>