<?php

function db_disconnect($connection) {
    if (isset($connection)) {
        mysqli_close($connection);
    }
}

function get_events($options = [])
{
    global $link;
    $query = "SELECT * FROM event";
    if (isset($options['date']) && !is_officer()) // admins can see expired events
    {
        $date = $options['date'];
        $query = $query . " WHERE available_from < '" . $date .
        "' AND expires > '" . $date . "'";
    }
    return mysqli_query($link, $query);
}

function get_event_by_id($id)
{
    global $link;
    $query = "SELECT * FROM event WHERE id=" . $id;
    return mysqli_query($link, $query);
}

function update_event($event)
{
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

function delete_event($id)
{
    global $link;
    $query = "DELETE FROM event " .
        " WHERE id = '" . $id . "'" .
        " LIMIT 1";
    return mysqli_query($link, $query);
}

function delete_user($id)
{
    global $link;
    $sql = "DELETE FROM users";
    $sql .= " WHERE id='" . $id . "' ";
    $sql .= "LIMIT 1";

    return mysqli_query($link, $sql);
}

function get_users()
{
    global $link;
    $sql = "SELECT * FROM users";

    return mysqli_query($link, $sql);
}

function get_tournaments()
{
    global $link;
    $sql = "SELECT * FROM TOURNAMENT";

    return mysqli_query($link, $sql);
}

function get_tournament_by_id($id)
{
    global $link;
    $sql = "SELECT * FROM TOURNAMENT" .
        " WHERE TOURNAMENT_ID = '" . $id . "'";

    return mysqli_query($link, $sql);
}

function get_tournament_coorganizers($id)
{
    global $link;
    $sql = "SELECT * FROM TOURNAMENT_CO_ORGANIZER" .
        " WHERE TOURNAMENT_ID = '" . $id . "'";

    return mysqli_query($link, $sql);
}

function delete_co_organizer($tournament_id, $co_organizer_id)
{
    global $link;
    $query = "DELETE FROM TOURNAMENT_CO_ORGANIZER " .
        " WHERE TOURNAMENT_ID = '" . $tournament_id . "'" .
        " AND CO_ORGANIZER_ID = '" . $co_organizer_id . "'" .
        " LIMIT 1";

    return mysqli_query($link, $query);
}

function get_officers()
{
    global $link;
    $sql = "SELECT * FROM users WHERE is_officer = true";

    return mysqli_query($link, $sql);
}

function add_tournament_co_organizer($tournament_id, $co_organizer_id)
{
    global $link;
    $sql = "INSERT INTO TOURNAMENT_CO_ORGANIZER(TOURNAMENT_ID, CO_ORGANIZER_ID)" .
        " VALUES (" . $tournament_id . ", " . $co_organizer_id . ")";

    return mysqli_query($link, $sql);
}

function get_member_by_id($id)
{
    global $link;
    $sql = "SELECT * FROM MEMBER" .
        " WHERE MEMBER_ID = '" . $id . "'";

    return mysqli_query($link, $sql);
}


function create_event($event)
{
    global $link;
    $query = "INSERT event(name, description, location, time, available_from, expires) VALUE (" .
        "'" . $event['name'] . "', " .
        "'" . $event['description'] . "', " .
        "'" . $event['location'] . "', " .
        "'" . $event['time'] . "', " .
        "'" . $event['available_from'] . "', " .
        "'" . $event['expires'] .
        "')";
    return mysqli_query($link, $query);
}

function create_tournament($tournament)
{
    global $link;
    $sql = "INSERT INTO TOURNAMENT(NAME, INFO, SIGNUP_DEADLINE, ORGANIZER_ID) ";
    $sql .= "VALUES (";
    $sql .= "'" . $tournament['name'] . "',";
    $sql .= "'" . $tournament['info'] . "',";
    $sql .= "'" . $tournament['deadline'] . "',";
    $sql .= "'" . $tournament['organizer'] . "'";
    $sql .= ")";

    return mysqli_query($link, $sql);
}

function edit_tournament($tournament)
{
    global $link;
    $sql = "UPDATE TOURNAMENT SET ";
    $sql .= "NAME='" . $tournament['name'] . "', ";
    $sql .= "INFO='" . mysqli_real_escape_string($link, $tournament['info']) . "', ";
    $sql .= "SIGNUP_DEADLINE='" . $tournament['deadline'] . "', ";
    $sql .= "ORGANIZER_ID='" . $tournament['organizer'] . "' ";
    $sql .= "WHERE TOURNAMENT_ID='" . $tournament['tournament_id'] . "' ";
    $sql .= "LIMIT 1";

    return mysqli_query($link, $sql);
}

function delete_tournament($tournament_id)
{
    global $link;
    $sql = "DELETE FROM TOURNAMENT ";
    $sql .= "WHERE TOURNAMENT_ID='" . $tournament_id . "' ";
    $sql .= "LIMIT 1";

    return mysqli_query($link, $sql);

}

function create_news($NEWS)
{
    global $link;
    $query = "INSERT INTO NEWS(INFO, THERELEASE, EXPIRY) VALUE (" .
        "'" . $NEWS['INFO'] . "', " .
        "'" . $NEWS['THERELEASE'] . "', " .
        "'" . $NEWS['EXPIRY'] .
        "')";
    return mysqli_query($link, $query);
}


function get_news($options = [])
{
    global $link;
    $query = "SELECT * FROM NEWS";

    if (isset($options['date']))
    {
        $date = $options['date'];
        $query = $query . " WHERE THERELEASE < '" . $date .
        "' AND EXPIRY > '" . $date . "'";
    }

    return mysqli_query($link, $query);
}

function get_news_by_id($NEWS_ID)
{
    global $link;
    $query = "SELECT * FROM NEWS WHERE NEWS_ID=" . $NEWS_ID;
    return mysqli_query($link, $query);
}

function update_news($NEWS)
{
    global $link;
    $query = "UPDATE NEWS SET " .
    " INFO = '" . $NEWS['INFO'] . "'," .
    " THERELEASE = '" . $NEWS['THERELEASE'] . "'," .
    " EXPIRY = '" . $NEWS['EXPIRY'] . "'" .
    " WHERE NEWS_ID='" . $NEWS['NEWS_ID'] . "'";
    return mysqli_query($link, $query);
}

function delete_news($NEWS_ID)
{
    global $link;
    $query = "DELETE FROM NEWS " .
        " WHERE NEWS_ID = '" . $NEWS_ID . "'" .
        " LIMIT 1";
    return mysqli_query($link, $query);
}

function get_tournament_participants($id)
{
    global $link;
    $query = "SELECT PARTICIPANT_ID FROM TOURNAMENT_PARTICIPANT WHERE TOURNAMENT_ID='" . $id . "'";
    $result_set = mysqli_query($link, $query);
    $participants = [];

    while($row = mysqli_fetch_assoc($result_set))
    {
        $participants[] = $row['PARTICIPANT_ID'];
    }

    return $participants;
}

function get_tournaments_participated_in($id)
{
    global $link;
    $query = "SELECT TOURNAMENT_ID FROM TOURNAMENT_PARTICIPANT WHERE PARTICIPANT_ID='" . $id . "'";
    $result_set = mysqli_query($link, $query);
    $tournaments = [];

    while($row = mysqli_fetch_assoc($result_set))
    {
        $tournaments[] = $row['TOURNAMENT_ID'];
    }

    return $tournaments;
}

function insert_tournament_participant($tournament_id, $participant_id)
{
    global $link;
    $query = "INSERT INTO TOURNAMENT_PARTICIPANT(TOURNAMENT_ID, PARTICIPANT_ID) VALUE ('" .
            $tournament_id . "', '" . $participant_id . "')";
    return mysqli_query($link, $query);
}

function get_elo($id) {
    global $link;
    $query = "SELECT elo FROM users WHERE id='" . $id . "'";
    $result_set = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($result_set);
    return $row['elo'];
}

function update_elo($id, $elo) {
    global $link;
    $query = "UPDATE users SET elo = '" . $elo . "' WHERE id='" . $id . "'";
    $result_set = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($result_set);
    return $row['elo'];
}

function update_profile($profile) {
    global $link;
    $query = "UPDATE users SET full_name = '" . $profile["full_name"] .
        "', gender = '" . $profile["gender"] . "', dob = '" . $profile["dob"] .
        "', address = '" . $profile["address"] . "', phone ='" . $profile["phone"] .
        "' WHERE id = '" . $profile["id"] . "'";
    return mysqli_query($link, $query);
}

function get_user($id) {
    global $link;
    $query = "SELECT * FROM users WHERE id ='" . $id . "'";
    return mysqli_query($link, $query);
}

?>
