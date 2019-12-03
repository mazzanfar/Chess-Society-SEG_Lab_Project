<?php
require_once "../../private/initialise.php";

// Initialize the session
session_start();
?>

<html>
<head>
    <link rel="stylesheet" href="../stylesheets/news.css" type="text/css">
    <title>Chess society news</title>
</head>
<body>
<h1>Chess society news</h1>
<a href="../index.php">Back to home page</a>
<br/>
<?php
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true && $_SESSION["is_officer"] === 1){
    echo "<a href='new.php'>Create new news</a>"; // only show this for officers
}
?>

<div id="news">
    <?php
    $date = date("Y-m-d H:i:s");
    // TODO: only use date option when not logged in as admine
    $result_set = get_news(["date" => $date]);
    if (mysqli_num_rows($result_set)) {
        while ($NEWS = mysqli_fetch_assoc($result_set)) {
            echo "<div class='NEWS'>
                <p>" . $NEWS["INFO"] . "</p>";
                if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true && $_SESSION["is_officer"] === 1){
                    echo "<a href='./edit.php?id=" . $NEWS["NEWS_ID"] . "'>Edit</a>
                            <a href='./delete.php?id=" . $NEWS["NEWS_ID"]. "'>Delete</a>";
                }

                
                 
              echo "</div>";
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
