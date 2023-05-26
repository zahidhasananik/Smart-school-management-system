<?php
include "../model/DatabaseConnection.php";
$Pid=$name=$Pdesc=$Pcat=$Pprice=$Pimg=$phone=""; 
$UserType="";
$hasError=false;
$error=""; 

$name=$_POST["name"];
// $phone=$_POST["phone"];
$UserType=$_POST["userType"];

if($name)
{
$connection = new DatabaseConnection();
$conobj=$connection->OpenCon();

$userQuery=$connection->SearchUser($conobj,"users",$UserType,$name,$phone);
if ($userQuery->num_rows > 0) {

    while($row = $userQuery->fetch_assoc()) {

      echo "<tr><td>".$row["id"]."</td>";
      echo "<td>".$row['Name']."</td>";
      echo "<td>".$row['Email']."</td>";
      echo "<td>".$row['Username']."</td>";
      echo "<td>".$row['Phone']."</td>";
      echo "<td>".$row['Address']."</td>";
      echo "<td>".$row['DOB']."</td>";
      echo "<td>".$row['Gender']."</td>";
      echo "<td><a class='button' href='./ProfileView.php?id=".$row['id']."'>View</a></td>";
      echo "<td><a class='button1' href='../../Controller/DeleteUser.php?id=".$row['id']."'>Delete</a></td></tr>";
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
