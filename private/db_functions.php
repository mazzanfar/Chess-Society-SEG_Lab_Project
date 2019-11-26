<?php
function get_events($options = []) {
    global $link;
    $query = "SELECT * FROM event";
    if (isset($options['date'])) {
        $date = $options['date'];
        $query = $query . " WHERE available_from < '" . $date .
        "' AND expires > '" . $date . "'";
    }
    return mysqli_query($link, $query);
}

function get_event_by_id($id) {
    global $link;
    $query = "SELECT * FROM event WHERE id=" . $id;
    return mysqli_query($link, $query);
}

function update_event($event) {
    global $link;
    $query = "UPDATE event SET " .
    " name = '" . $event['name'] . "'," .
    " location = '" . $event['location'] . "'," .
    " description = '" . $event['description'] . "'," .
    " time = '" . $event['time'] . "'," .
    " available_from = '" . $event['available_from'] . "'," .
    " expires = '" . $event['expires'] . "'" .
    " WHERE id='" . $event['id'] . "'";
    return mysqli_query($link, $query);
}

function delete_event($id) {
    global $link;
    $query = "DELETE FROM event " .
        " WHERE id = '" . $id . "'" .
        " LIMIT 1";
    return mysqli_query($link, $query);
}

function delete_user($id) {
    global $link;
    $sql = "DELETE FROM MEMBER";
    $sql .= "WHERE id='" . db_escape($link, $id) . '";
    $sql .= "LIMIT 1";
    
    return mysqli_query($link, $sql);
}

function create_event($event) {
    global $link;
    $query = "INSERT event(name, description, location, time, available_from expires) VALUE (" .
        "'" . $event['name'] . "', " .
        "'" . $event['description'] . "', " .
        "'" . $event['location'] . "', " .
        "'" . $event['time'] . "', " .
        "'" . $event['available_from'] . "', " .
        "'" . $event['expires'] .
        "')";
    return mysqli_query($link, $query);
}





function get_news($options = []) {
    global $link;
    $query = "SELECT * FROM NEWS";
    if (isset($options['date'])) {
        $date = $options['date'];
        $query = $query . " WHERE THERELEASE < '" . $date .
        "' AND EXPIRY > '" . $date . "'";
    }
    return mysqli_query($link, $query);
}
function get_news_by_id($NEWS_ID) {
    global $link;
    $query = "SELECT * FROM NEWS WHERE NEWS_ID=" . $NEWS_ID;
    return mysqli_query($link, $query);
}
function update_news($NEWS) {
    global $link;
    $query = "UPDATE NEWS SET " .
    " INFO = '" . $NEWS['INFO'] . "'," .
    " THERELEASE = '" . $NEWS['THERELEASE'] . "'," .
    " EXPIRY = '" . $NEWS['EXPIRY'] . "'" .
    " WHERE NEWS_ID='" . $NEWS['NEWS_ID'] . "'";
    return mysqli_query($link, $query);
}
function delete_news($NEWS_ID) {
    global $link;
    $query = "DELETE FROM NEWS " .
        " WHERE NEWS_ID = '" . $NEWS_ID . "'" .
        " LIMIT 1";
    return mysqli_query($link, $query);
}


function create_event($NEWS) {
    global $link;
    $query = "INSERT event(INFO, THERELEASE, EXPIRY) VALUE (" .
        "'" . $event['INFO'] . "', " .
        "'" . $event['THERELEASE'] . "', " .
        "'" . $event['EXPIRY'] .
        "')";
    return mysqli_query($link, $query);
}
?>