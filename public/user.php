<?php
require_once "../private/initialise.php";

$id = $_GET['id'] ?? 1;
$result_set = get_member_by_id($id);
$member = mysqli_fetch_assoc($result_set);
mysqli_free_result($result_set);
mysqli_close($link);

?>

<html>
<head>
    <title>Chess society events</title>
</head>
<body>
    <h1><?php echo "Member id '" . $member['MEMBER_ID'] ."' profile" ?></h1>
    <a href="index.php">Back to home page</a>
    <p>Name: <?php echo $member['FIRST_NAME'] . " " . $member['LAST_NAME'] ?></p>
    <p>Username: <?php echo $member['USERNAME']?></p>
    <p>Address: <?php echo $member['MEMBER_ADDRESS']?></p>
    <p>Phone number: <?php echo $member['PHONE_NUMBER']?></p>
    <p>Gender: <?php echo $member['GENDER']?></p>
    <p>Date of birth: <?php echo $member['DOB']?></p>
</body>
</html>