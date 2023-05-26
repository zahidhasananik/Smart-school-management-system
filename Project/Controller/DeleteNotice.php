<?php if(!empty($_GET['id'])){ ?>
<?php 

include '../model/DatabaseConnection.php';
$connection=new DatabaseConnection();
$conobj=$connection->OpenCon();
$delete=$connection->deleteUser($conobj, "notices", $_GET['id']);
if ($delete) {
    header('Location: ../View/pages/Dashboard.php?msg=Notice Deleted Successfully');
}
else{
	header('Location: ../View/pages/Dashboard.php>');
}
 ?>
<?php }
else{
	echo "You are not allowed to visit this page";
} ?>