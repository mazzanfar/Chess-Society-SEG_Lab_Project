<?php
function getAllEvents() {
    global $link;
    $query = "SELECT * FROM event";
    return mysqli_query($link, $query);
}

?>