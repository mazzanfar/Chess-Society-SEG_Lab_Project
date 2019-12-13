<?php
require_once("../../private/initialise.php");
require_login();
if (isset($_GET['id'])) { // only admins can view other people's profiles
    require_officer();
}
$id = $_GET['id'] ?? $_SESSION['id'];
$result_set = get_user($id);
$profile_data = mysqli_fetch_assoc($result_set);

?>
<!DOCTYPE html>
<html>    
<head>        
	<meta charset="UTF-8">
    <?php require_once("../../private/shared/chess_head.php") ?>
    <title><?php echo $profile_data['username'] ?>'s Profile</title>
</head>
<body>
    <?php include("../../private/shared/chess_header.php"); ?>
    <h3>Personal Information</h3>
    <?php if (!isset($_GET['id']) || (int) $_GET['id'] === (int) $_SESSION['id']) { // can only edit own profile
        echo '<a href="edit-profile.php">Edit Profile</a><br/>';
    }
    ?>
    <a href="tournament_history.php?id=<?php echo $id ?>">Tournament history</a>
        <table>
            <tr>
                <td>Name:</td><td><?php echo $profile_data['full_name'] ?? "No name set" ?></td>
            </tr>
            <tr>
                <td>Elo:</td><td><?php echo $profile_data['elo'] ?></td>
            </tr>
            <tr>
                <td>Date of birth:</td><td><?php echo $profile_data['dob']   ?? "No date of birth set" ?></td>
            </tr>
            <tr>
                <td>Gender:</td><td><?php echo $profile_data['gender'] ?? "No gender set" ?></td>
            </tr>
            <tr>
                <td>Phone:</td><td><?php echo $profile_data['phone'] ?? "No phone set" ?></td>
            </tr>
            <tr>
                <td>Address:</td><td><?php echo $profile_data['address'] ?? "No address set" ?></td>
            </tr>
        </table>
    <?php if (!isset($_GET['id']) || (int) $_GET['id'] === (int) $_SESSION['id']) { // can only delete own profile
        echo '<a href="delete_account.php">Delete my account</a>';
    }
    ?>
    </body>
</html>
