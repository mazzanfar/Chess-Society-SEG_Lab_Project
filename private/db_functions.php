<?php
function get_all_events() {
    global $link;
    $query = "SELECT * FROM event";
    return mysqli_query($link, $query);
}

function get_event_by_id($id) {
    global $link;
    $query = "SELECT * FROM event WHERE id=" . $id; // todo prevent sql injection
    return mysqli_query($link, $query);
}

function update_event($event) {
    global $link;
    $query = "UPDATE event SET " .
    " name = '" . $event['name'] . "'" .
    " WHERE id='" . $event['id'] . "'";
    echo $query;
    return mysqli_query($link, $query);

}
?>