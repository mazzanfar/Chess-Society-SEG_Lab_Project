<?php
require_once "../../private/initialise.php";
?>

<html>
<head>
    <link rel="stylesheet" href="../stylesheets/news.css" type="text/css">
    <title>Chess society news</title>
</head>
<body>
<h1>Chess society news</h1>
<a href="../">Back to home page</a>
<br/>
<a href="new.php">Create new news</a> <!-- only show this for admins -->

<div id="news">
    <?php
    $date = date("Y-m-d H:i:s");
    // TODO: only use date option when not logged in as admine
    $result_set = get_news(["date" => $date]);
    if (mysqli_num_rows($result_set)) {
        while ($NEWS = mysqli_fetch_assoc($result_set)) {
            echo "<div class='NEWS'>
                <p>" . $NEWS["INFO"] . "</p>
                <!--only show these if logged in as an administrator-->
                <a href='./edit.php?id=" . $NEWS["NEWS_ID"] . "'>Edit</a>
                <a href='./delete.php?id=" . $NEWS["NEWS_ID"] . "'>Delete</a>
              </div>";
        }
    } else {
        echo "<p>The chess society currently has no news </p>";
    }
    ?>
</div>


</body>
</html>

<?php
    mysqli_free_result($result_set);
    mysqli_close($link);
?>
