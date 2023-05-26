<?php
include "../model/DatabaseConnection.php";
$hasError=false;
$error=""; 

$name=$_POST["name"];

if($name)
{
$connection = new DatabaseConnection();
$conobj=$connection->OpenCon();

$userQuery=$connection->SearchNotices($conobj,"notices",$name);
if ($userQuery->num_rows > 0) {

    while($row = $userQuery->fetch_assoc()) {

      echo "<tr><td>".$row["id"]."</td>";
      echo "<td>".$row['Notice']."</td>";
      echo "<td>".$row['Details']."</td>";
      echo "<td>".$row['Date']."</td></tr>";
  } 

}
else {
  echo "Not Found !!!<br>";
}
}
else{
  echo null;
}
?>
