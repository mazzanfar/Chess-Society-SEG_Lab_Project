
<?php
require_once "../../private/initialise.php";
if (is_post_request()) {
    $NEWS['NEWS_ID'] = $_POST['NEWS_ID'];
    $NEWS['INFO'] = $_POST['INFO'];
    $NEWS['THERELEASE'] = $_POST['THERELEASE'];
    $NEWS['EXPIRY'] = $_POST['EXPIRY'];
    update_news($NEWS);
    redirect_to("news/index.php");
} else {
    $NEWS_ID = $_GET['NEWS_ID'] ?? 1;
    $result_set = get_news_by_id($NEWS_ID);
    $NEWS = mysqli_fetch_assoc($result_set);
    mysqli_free_result($result_set);
    mysqli_close($link);
}
?>

<html>
<head>
    <title>Chess society news   </title>
</head>
<body>
    <h1><?php echo "Editing \"" . $NEWS['INFO'] ."\"" ?></h1>
    <a href="index.php">Back</a>
    <form action="edit.php" method="post">
        <label>
            info:
            <input type="text" name="INFO" value="<?php echo $NEWS['INFO'] ?>">
        </label>
        <br/>
        <label>
            release time:
            <input type="datetime-local" name="THERELEASE" value="<?php echo mysql_date_to_html_date($NEWS['THERELEASE']) ?>">
        </label>
        <br/>
        <label>
            Expiry time:
            <input type="datetime-local" name="EXPIRY" value="<?php echo mysql_date_to_html_date($NEWS['EXPIRY']) ?>">
        </label>
        <input name="NEWS_ID" value="<?php echo $NEWS_ID ?>" hidden>
        <br/>
        <input type="submit">

    </form>


</body>
</html>