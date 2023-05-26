<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="../../css/Seller/css/Mainpage.css">
    <link rel="stylesheet" type="text/css" href="../../css/design.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <title>ABC Smart School</title>
</head>

<body>
    <div class="header sticky">
        <center>
            <h1>ABC Smart School</h1>
        </center>

        <div class="topnav">
            <?php
            if (isset($_SESSION["Username"]) && isset($_SESSION["User_Type"]) && $_SESSION["User_Type"] == 'admin') { ?>
            
                <a href="../pages/Dashboard.php">Home</a>
                <a href="../pages/RegistrationApproval.php">Registration Approval</a>&nbsp;
                <a href="../pages/Students.php">Students</a>&nbsp;
                <a href="../pages/Teachers.php">Teachers</a>&nbsp;
                <a href="../pages/Accountants.php">Accountants</a>&nbsp;
                <a href="../pages/PostNotices.php">Post Notices</a>&nbsp;
                <a href="../pages/Notices.php">All Notices</a>&nbsp;
                <a style="float: right; padding-right:10px" href="../../Controller/logout.php">Logout</a>&nbsp;
                <a style="float: right; padding-right:10px" href="Dashboard.php"><?php echo $_SESSION['Name'] ?></a>&nbsp;

                <?php } elseif(isset($_SESSION["Username"]) && isset($_SESSION["User_Type"]) && $_SESSION["User_Type"] == 'student') { ?>
                    
                    <a href="../pages/Dashboard.php">Home</a>
                    <a href="../pages/PostQueries.php">Post Query</a>&nbsp;
                    <a href="../pages/ClassMaterials.php">Class Materials</a>&nbsp;
                    <a href="../pages/NoticeBoard.php">Notice Board</a>&nbsp;
                    <a href="../pages/NoticeSearch.php">Search Notices</a>&nbsp;
                    <a href="../pages/Queries.php">My Queries</a>&nbsp;
                    <a style="float: right; padding-right:10px" href="../../Controller/logout.php">Logout</a>&nbsp;
                    <a style="float: right; padding-right:10px" href="Dashboard.php"><?php echo $_SESSION['Name'] ?></a>&nbsp;
                
                <?php }
                 else { ?>
                <a href="../../../index.php">Home</a>
                <a style="float: right; padding-right:10px" href="../pages/StudentRegistration.php">Student Signup</a>&nbsp;
                <a style="float: right; padding-right:10px" href="../pages/AdminRegistration.php">Admin Signup</a>&nbsp;
                <a style="float: right; padding-right:10px" href="../pages/Login.php">Login</a>
            <?php }
            ?>
        </div>
    </div>
</body>

</html>