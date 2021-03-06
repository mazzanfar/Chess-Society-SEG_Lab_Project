<?php
require_once "../../private/initialise.php";
?>

<html>
<head>
    <title>Chess society news</title>
    <?php require_once("../../private/shared/chess_head.php") ?>
</head>
<body>
<?php include("../../private/shared/chess_header.php");
if(is_officer()){
    echo "<a href='new.php'>Create new news</a>"; // only show this for officers
}
?>

<div class="content">
    <?php
    $date = date("Y-m-d H:i:s");
    $result_set = get_news(["date" => $date]);
    if (mysqli_num_rows($result_set)) {
        while ($NEWS = mysqli_fetch_assoc($result_set)) {
            echo "<div class='content-item'>
                <p>" . $NEWS["INFO"] . "</p>";
                if (is_officer()) {
                    echo "<span class='content-information'>Expires: " . $NEWS["EXPIRY"] . "</span><br/>";
                    echo "<span class='content-information'>Available from: " . $NEWS["THERELEASE"] . "</span><br/>";
                }
                if(is_officer()){
                    echo "<a class='admin-button' href='./edit.php?id=" . $NEWS['NEWS_ID'] . "'>Edit</a>
                            <a class='admin-button' href='./delete.php?id=" . $NEWS['NEWS_ID']. "'>Delete</a>";
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
<?php include("../../private/shared/chess_footer.php"); ?>

<?php
    mysqli_free_result($result_set);
?>
