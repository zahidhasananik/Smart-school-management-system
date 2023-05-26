<?php
session_start();
if (empty($_SESSION["Email"])) {
    header("Location: ./Login.php"); // Redirecting To Login Page
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>All Students</title>
    <script src="../../js//StudentSearch.js"> </script>
</head>

<body>
    <?php
    include('../layout/Header.php');
    ?>
    <fieldset>
        <legend>All Students</legend>
        <legend style="width:fit-content"> Search </legend>
        <input type="hidden" id="userType" name="userType" value="student">
        <input type=search name="name" placeholder="Enter Your Student Name Or Phone To Search" id="name" onkeydown="showuser()" onkeyup="showuser()" onchange="showuser()" ><br>
        <p id="mytext"></p>
        <?php
        include "../../model/DatabaseConnection.php";
        $connection = new DatabaseConnection();
        $conobj = $connection->OpenCon();

        $users = $connection->ShowSpecificUsers($conobj, "users", "student");
        $connection->CloseCon($conobj);

        if ($users->num_rows > 0) { ?>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>DOB</th>
                        <th>Gender</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody id="student_table_body">
                    <?php
                    // output data of each row
                    while ($row = $users->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['Name'] ?></td>
                            <td><?php echo $row['Email'] ?></td>
                            <td><?php echo $row['Username'] ?></td>
                            <td><?php echo $row['Phone'] ?></td>
                            <td><?php echo $row['Address'] ?></td>
                            <td><?php echo $row['DOB'] ?></td>
                            <td><?php echo $row['Gender'] ?></td>
                            <td><a class='button' href='./ProfileView.php?id=<?php echo $row['id'] ?>'>View</a></td>
                            <td><a class='button1' href='../../Controller/DeleteUser.php?id=<?php echo $row['id'] ?>'>Delete</a></td>
                        </tr>
                    <?php
                    } ?>
                </tbody>

                <tbody id="student_search_body">
                </tbody>
                <!-- <div id="student_search_body">

                    </div> -->

            </table>
        <?php
        }

        ?>
    </fieldset>
    <br>
    <?php
    include('../layout/Footer.php');
    ?>
</body>

</html>