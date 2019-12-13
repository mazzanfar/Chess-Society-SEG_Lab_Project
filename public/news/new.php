<?php
require_once "../../private/initialise.php";
if (is_post_request()) {
    $NEWS['INFO'] = $_POST['INFO'];
    $NEWS['THERELEASE'] = $_POST['THERELEASE'];
    $NEWS['EXPIRY'] = $_POST['EXPIRE'];
    create_news($NEWS);
    redirect_to("news/index.php");
}
?>

<html>
<head>
    <title>Chess society news</title>
    <?php require_once("../../private/shared/chess_head.php") ?>
</head>
<body>
<h1>New news</h1>
<a href="index.php">Back</a>
<form action="new.php" method="post">
    <label>
        INFO:
        <input type="text" name="INFO" placeholder="News Information">
    </label>
    <br/>
    <label>
        Release date:
        <input type="datetime-local" name="THERELEASE">
    </label>
    <br/>
    <label>
        Expires:
        <input type="datetime-local" name="EXPIRY">
    </label>
    <br/>
    <input type="submit">

</form>


</body>
</html>

