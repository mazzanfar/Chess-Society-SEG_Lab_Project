<?php
require_once "../../private/initialise.php";

require_officer();


$validation_result = true;
if (is_post_request()) {
    $NEWS['NEWS_ID'] = $_POST['NEWS_ID'];
    $NEWS['INFO'] = $_POST['INFO'];
    $NEWS['THERELEASE'] = $_POST['THERELEASE'];
    $NEWS['EXPIRY'] = $_POST['EXPIRY'];

    $validation_result = validate_news($NEWS);
    if ($validation_result === true) {
        update_news($NEWS);
        redirect_to("news/index.php");
    }
    $result_set = get_news_by_id($_POST['NEWS_ID']);
    $db_NEWS = mysqli_fetch_assoc($result_set);
    $title = $db_NEWS['INFO'];

} else {
    $NEWS_ID = $_GET['id'] ?? 1;
    $result_set = get_news_by_id($NEWS_ID);
    $NEWS = mysqli_fetch_assoc($result_set);
    $title = $NEWS['INFO'];
    mysqli_free_result($result_set);
}
?>

<html>
<head>
    <title>Chess society news</title>
    <?php require_once("../../private/shared/chess_head.php") ?>
</head>
<body>
    <?php include("../../private/shared/chess_header.php") ?>
    <h1><?php echo "Editing \"" . $title ."\"" ?></h1>
    <a href="index.php">Back</a>
    <?php echo get_validation_errors($validation_result); ?>
    <form action="edit.php" method="post">
        <label>
            Information
            <input type="text" name="INFO" value="<?php echo $NEWS['INFO'] ?>">
        </label>
        <br/>
        <label>
            release time
            <input type="datetime-local" name="THERELEASE" value="<?php echo mysql_date_to_html_date($NEWS['THERELEASE']) ?>">
        </label>
        <br/>
        <label>
            Expiry time
            <input type="datetime-local" name="EXPIRY" value="<?php echo mysql_date_to_html_date($NEWS['EXPIRY']) ?>">
        </label>
        <input name="NEWS_ID" value="<?php echo $NEWS['NEWS_ID'] ?>" hidden>
        <br/>
        <input type="submit">

    </form>
</body>
</html>
<?php include("../../private/shared/chess_footer.php"); ?>