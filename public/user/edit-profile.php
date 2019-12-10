<?php
require_once("../../private/initialise.php");
require_login();
$id = $_SESSION['id'];
if (is_post_request()) {
    $fullname = $_POST['fullname'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];

    $query = "UPDATE users SET full_name = '$fullname',
                      gender = '$gender', dob = '$dob', address = '$address'
                      WHERE id = '$id'";
    $update_profile = mysqli_query($link, $query);
    redirect_to("user/profile.php");
}

$get_user = mysqli_query($link, "SELECT * FROM users WHERE id = '" . $id . "'");
$user_data = $get_user->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <?php require_once("../../private/shared/chess_head.php") ?>
    <title><?php echo $user_data['username'] ?>'s Profile Settings</title>
</head>
<body>
<?php include("../../private/shared/chess_header.php"); ?>
<h3>Update Profile Information</h3>
<form method="post">

    <label>Name:</label><br>
    <input type="text" name="fullname" value="<?php echo $user_data['full_name'] ?>"/><br>
    <label>Age:</label><br>
    <input type="date" name="dob" value="<?php echo $user_data['dob'] ?>"/><br>

    <label>Gender:</label><br>
    <label class="event-form-radio">
        <input type="radio" name="gender" value="M" <?php echo $user_data['gender'] === "M" ? "checked" : "" ?>>
        M
    </label>
    <label class="event-form-radio">
        <input type="radio" name="gender" value="F" <?php echo $user_data['gender'] === "F" ? "checked" : "" ?>>
        F
    </label>
    <label class="event-form-radio">
        <input type="radio" name="gender" value="O" <?php echo $user_data['gender'] === "O" ? "checked" : "" ?>>
        Other
    </label><br/>

    <label>Address:</label><br>
    <input type="text" name="address" value="<?php echo $user_data['address'] ?>"/><br><br>
    <input type="submit" value="Update Profile"/>
</form>
</body>
</html>
