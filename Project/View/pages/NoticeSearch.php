<?php
session_start();
if (empty($_SESSION["Email"])) {
    header("Location: ./Login.php"); // Redirecting To Login Page
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Search Notice</title>
    <script src="../../js//NoticeSearch.js"> </script>
</head>

<body>
    <?php
    include('../layout/Header.php');
    ?>
    <fieldset>
        <legend style="width:fit-content"> Search Notice </legend>
        <input type=search name="name" placeholder="Search Notices" id="name" onkeyup="showNotices()" ><br>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Notice</th>
                        <th>Details</th>
                        <th>Date</th>
                    </tr>
                </thead>

                <tbody id="notices_body">
                    
                </tbody>

            </table>
    </fieldset>
    <br>
    <?php
    include('../layout/Footer.php');
    ?>
</body>

</html>