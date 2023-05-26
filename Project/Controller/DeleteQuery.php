<?php if(!empty($_GET['id'])){ ?>
<?php 

include '../model/DatabaseConnection.php';
$connection=new DatabaseConnection();
$conobj=$connection->OpenCon();
$delete=$connection->deleteUser($conobj, "queries", $_GET['id']);
$connection->CloseCon($conobj);
if ($delete) {
    header('Location: ../View/pages/Dashboard.php?msg=Query Deleted Successfully');
}
else{
	echo 'there is a error';
}
 ?>
<?php }
else{
	echo "You are not allowed to visit this page";
} ?>