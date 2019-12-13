<?php
require_once "../../private/initialise.php";
if (is_post_request()) {
    $delete = $_POST['delete'];
    if ($delete === "yes") {
        $NEWS_ID = $_POST['NEWS_ID'];
        delete_news($NEWS_ID);
    }
    redirect_to("news/index.php");
} else {
    $NEWS_ID = $_GET['id'] ?? 1;
    $result_set = get_news_by_id($NEWS_ID);
    $NEWS = mysqli_fetch_assoc($result_set);
    mysqli_free_result($result_set);
}
?>

<html>
<head>
    <title>Chess society news</title>
    <?php require_once("../../private/shared/chess_head.php") ?>
</head>
<body>
<h1><?php echo "Delete news \"" . $NEWS['INFO'] ."\"?" ?></h1>
<a href="index.php">Back</a>
<form action="delete.php" method="post">
    <label>
        <input type="radio" name="delete" value="no">
        No
    </label>
    <label>
        <input type="radio" name="delete" value="yes">
        Yes
    </label>
    <input name="NEWS_ID" value="<?php echo $NEWS_ID ?>" hidden>
    <br/>
    <input type="submit">

</form>


</body>
</html>