<?php
require_once "../../private/initialise.php";

require_officer();
$validation_result = true;
if (is_post_request()) {
    $NEWS['INFO'] = $_POST['INFO'];
    $NEWS['THERELEASE'] = $_POST['THERELEASE'];
    $NEWS['EXPIRY'] = $_POST['EXPIRY'];
    $validation_result = validate_news($NEWS);
    if ($validation_result === true) {
        create_news($NEWS);
        redirect_to("news/index.php");
    }
}
?>

<html>
<head>
    <title>Chess society news</title>
    <?php require_once("../../private/shared/chess_head.php") ?>
</head>
<body>
<?php include("../../private/shared/chess_header.php") ?>
<h1>New news</h1>
<a href="index.php">Cancel</a>
<?php echo get_validation_errors($validation_result); ?>
<form action="new.php" method="post">
    <label>
        Information
        <input type="text" name="INFO" placeholder="Information">
    </label>
    <br/>
    <label>
        Release date
        <input type="datetime-local" name="THERELEASE">
    </label>
    <br/>
    <label>
        Expires
        <input type="datetime-local" name="EXPIRY">
    </label>
    <br/>
    <input type="submit">

</form>
</body>
</html>
<?php include("../../private/shared/chess_footer.php"); ?>

