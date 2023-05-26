<?php
session_start();
if (empty($_SESSION["Email"])) {
    header("Location: ./Login.php"); // Redirecting To Login Page
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>All Notices</title>
</head>

<body>
    <?php
    include('../layout/Header.php');
    ?>
    <fieldset>
        <legend>All Notices</legend>

        <?php
        include "../../model/DatabaseConnection.php";
        $connection = new DatabaseConnection();
        $conobj = $connection->OpenCon();

        $users = $connection->ShowAll($conobj, "notices");

        if ($users->num_rows > 0) { ?>
            <table>
                <tr>
                    <th>#</th>
                    <th>Notice</th>
                    <th>Details</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
                <?php
                // output data of each row
                while ($row = $users->fetch_assoc()) { ?>
                    <tr class="notice" id="<?php echo $row['id'] ?>" color="<?php if($row['Color']){ echo '';} else {echo 'brown';} ?>" style="background-color: <?php echo $row['Color'] ?>; color:<?php if($row['Color']){ echo 'white';} else {echo '';} ?>;">
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['Notice'] ?></td>
                        <td><?php echo $row['Details'] ?></td>
                        <td><?php echo $row['Date'] ?></td>
                        <!-- <td><a class='button' href='./ProfileView.php?id=<?php echo $row['id'] ?>'>View</a></td> -->
                        <td><a class='button1' onclick="return confirm('Are you sure you want delete this notice?');" href='../../Controller/DeleteNotice.php?id=<?php echo $row['id'] ?>'>Delete</a></td>
                    </tr>
                <?php
                } ?>

            </table>
        <?php
        }

        ?>
    </fieldset>
    <br>
    <?php
    include('../layout/Footer.php');
    ?>
    <script>
        $(document).ready(function() {
            $(".notice").click(function() {
                var notice_id = $(this).attr("id");
                var color = $(this).attr("color");
                // alert($(this).attr("id"));
                $.ajax({
                    url: '../../Controller/ChangeNoticeColor.php',
                    type: 'post',
                    data: {
                        notice_id: notice_id,
                        color: color
                    },
                    success: function(response) {
                        // $(this).attr('style','background-color: brown');
                        // $(this).attr('style','background-color: brown');
                        // alert(response);
                        console.log(response); 
                        // console.log(response.product); 
                        location.reload();
                        //Session("success_message").val(response);        	
                    },
                    error: function(xhr) {
                        // alert("error");
                        console.log(xhr);
                    }
                });
            });
        });
    </script>
</body>

</html>