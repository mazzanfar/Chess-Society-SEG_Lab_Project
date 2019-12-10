<?php
require_once("../private/initialise.php");
require_login();
$get_user = mysqli_query($link, "SELECT * FROM users WHERE username ='" . $_SESSION['username'] . "'");
if ($get_user->num_rows == 1) {
    $profile_data = $get_user->fetch_assoc();
}

?>
<!DOCTYPE html>
<html>    
<head>        
	<meta charset="UTF-8">
    <?php require_once("../private/shared/chess_head.php") ?>
    <title><?php echo $profile_data['username'] ?>'s Profile</title>
</head>
<body>
    <?php include("../private/shared/chess_header.php"); ?>
    <h3>Personal Information</h3>
    <a href="edit-profile.php?user=<?php echo $profile_data['username'] ?>">Edit Profile</a>
        <table>
                    <tr>                
                    	<td>Name:</td><td><?php echo $profile_data['full_name'] ?? "No name set" ?></td>
                    </tr>
                    <tr>                
                    	<td>Age:</td><td><?php echo $profile_data['dob']   ?? "No date of birth set" ?></td>
                    </tr> 
                    <tr>
                        <td>Gender:</td><td><?php echo $profile_data['gender'] ?? "No gender set" ?></td>
                    </tr>
                    <tr>
                        <td>Address:</td><td><?php echo $profile_data['address'] ?? "No address set" ?></td>
                    </tr>        
        </table> 
    </body>
</html>
