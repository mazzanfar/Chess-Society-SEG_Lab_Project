<?php
require_once("../../private/initialise.php");
require_login();
$id = $_SESSION['id'];
if (is_post_request()) {
    $profile["full_name"] = $_POST['fullname'];
    $profile["dob"] = $_POST['dob'];
    $profile["gender"] = $_POST['gender'];
    $profile["address"] = $_POST['address'];
    $profile["phone"] = $_POST['phone'];

    update_profile($profile);
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
<a href="../">Back to profile</a>
<form method="post" class="content-form">

    <label>Name:</label><br>
    <input type="text" name="fullname" value="<?php echo $user_data['full_name'] ?>"/><br>
    <label>Date of birth:</label><br>
    <input type="date" name="dob" value="<?php echo $user_data['dob'] ?>"/><br>

    <label>Gender:</label><br>
    <label class="content-form-radio">
        <input type="radio" name="gender" value="M" <?php echo $user_data['gender'] === "M" ? "checked" : "" ?>>
        M
    </label>
    <label class="content-form-radio">
        <input type="radio" name="gender" value="F" <?php echo $user_data['gender'] === "F" ? "checked" : "" ?>>
        F
    </label>
    <label class="content-form-radio">
        <input type="radio" name="gender" value="O" <?php echo $user_data['gender'] === "O" ? "checked" : "" ?>>
        Other
    </label><br/>

    <label>Phone:</label><br>
    <input type="text" name="phone" value="<?php echo $user_data['phone'] ?>"/><br><br>
    <label>Address:</label><br>
    <input type="text" name="address" value="<?php echo $user_data['address'] ?>"/><br><br>
    <input type="submit" value="Update Profile"/>
</form>
</body>
</html>
