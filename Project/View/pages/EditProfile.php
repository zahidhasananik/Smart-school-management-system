<!DOCTYPE html>
<html>
  <script type="text/javascript" src= "../../js/RegistrationValidation.js"></script>
<body>
  <?php
  session_start();
  include('../layout/Header.php');
  include('../../Controller/EditProfileController.php');
  if (empty($_SESSION["Email"])) {
    header("Location: ./Login.php"); // Redirecting To Login Page
  }

  ?>
  <?php
  $User = "";
  $radio1 = $radio2 = $radio3 = "";
  $Name = $Email = $User = $Phone = $Address = $Date = "";
  $connection = new DatabaseConnection();
  $conobj = $connection->OpenCon();
  $userQuery = $connection->getUserData($conobj, "users", $_SESSION["UserId"]);

  if ($userQuery->num_rows > 0) {

    // output data of each row
    while ($row = $userQuery->fetch_assoc()) {
      $Name = $row["Name"];
      $Email = $row["Email"];

      $User = $row["Username"];
      $Phone = $row["Phone"];
      $Address = $row["Address"];
      $Date = $row["DOB"];

      if ($row["Gender"] == "Female") {
        $radio1 = "checked";
      } else if ($row["Gender"] == "Male") {
        $radio2 = "checked";
      } else {
        $radio3 = "checked";
      }
    }
  } else {
  }
  ?>
  <fieldset>

<legend>Edit Profile Information</legend>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
  <table>
    
  <tr>
      <td>Name: </td>
      <td><input type='text' id="name" name='name' onfocus="change(this)" onkeyup="change(this)" onblur="revert(this)" value="<?php echo $Name; ?>"> 
      <span style="color: #FF0000" id="nameErr"> <?php echo $ValidName; ?></span></td>
    </tr>
    <tr>
      <td>Email: </td>
      <td><input type='text' name='email' value="<?php echo $Email; ?>" onkeyup="change(this)" onblur="revert(this)"> 
      <span style="color: #FF0000" id="emailErr"> <?php echo $ValidEmail; ?></span></td>
    </tr>

    <tr>
      <td>Username: </td>
      <td><input type='text' name='Username' value="<?php echo $User; ?>" disabled></td>
    </tr>

    <tr>
      <td>Phone:</td>
      <td><input type='text' id="phone" name='phone' onkeyup="change(this)" onblur="revert(this)" value="<?php echo $Phone; ?>"> 
      <span style="color: #FF0000" id="phoneErr"> <?php echo $ValidPhone; ?></span></td>
    </tr>

    <tr>
      <td>Address: </td>
      <td><textarea rows="4" cols="50" id="address" name="address" onkeyup="change(this)" onblur="revert(this)"> <?php echo $Address; ?> </textarea> 
      <span style="color: #FF0000" id="addressErr"> <?php echo $ValidAddress; ?></span></td>
    </tr>

    <tr>
      <td>Date of Birth: </td>
      <td><input type="date" id="Date" name="Date" value="<?php echo $Date; ?>" onkeyup="change(this)" onblur="revert(this)">
      <span style="color: #FF0000" id="birthdayErr"> <?php echo $validateradio; ?></span>
    </td>
    </tr>

    <tr>
      <td> Gender:</td>
      <td>
        <input type="radio" id="male" name="gender" value="Male" <?php echo $radio2; ?>> <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="Female <?php echo $radio1; ?>"> <label for="female">Female</label>
        <input type="radio" id="other" name="gender" value="Other" <?php echo $radio3; ?>> <label for="other">Other</label> <br>
        <span style="color: #FF0000" id="genderErr"><?php echo $validateradio; ?></span>
      </td>
    </tr>
    <tr>
      <td><input name='update' type='submit' value='Update'></td>
    </tr>
  </table><br><br><br>

</form>

</div>
</fieldset>
  <br>
  <?php
  include('../layout/Footer.php');
  ?>
</body>

</html>