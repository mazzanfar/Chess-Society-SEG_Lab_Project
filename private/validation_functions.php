<?php

function is_valid_date($date) {
    return (bool) strtotime($date);
}

function validate_event($event) {
    $errors = [];
    if ($event['name'] === '') {
        $errors[] = "Event name can not be blank.";
    }

    if ($event['description'] === '') {
        $errors[] = "Event description can not be blank.";
    }

    if ($event['location'] === '') {
        $errors[] = "Event location can not be blank.";
    }

    if (!is_valid_date($event['time'])) {
        $errors[] = "Time is not a valid date/time combination";
    }

    if (!is_valid_date($event['available_from'])) {
        $errors[] = "Time is not a valid date/time combination";
    }

    if (!is_valid_date($event['expires'])) {
        $errors[] = "Time is not a valid date/time combination";
    }

    if (empty($errors)) {
        return true;
    } else {
        return $errors;
    }
}

function validate_tournament($tournament) {
    $errors = [];
    if ($tournament['name'] === '') {
        $errors[] = "Tournament name can not be blank.";
    }

    if ($tournament['info'] === '') {
        $errors[] = "Tournament description can not be blank.";
    }

    if (!is_valid_date($tournament['deadline'])) {
        $errors[] = "Deadline is not a valid date/time combination";
    }

    if (empty($errors)) {
        return true;
    } else {
        return $errors;
    }
}

function validate_elo($elo) {
    $errors = [];
    if (!is_numeric($elo)) {
        $errors[] = "Elo rating must be a number.";
    }

    if ($elo < 0) {
        $errors[] = "Elo rating must be non-negative.";
    }

    if (empty($errors)) {
        return true;
    } else {
        return $errors;
    }
}

function validate_profile($profile) {
    $errors = [];
    if ($profile['full_name'] === '') {
        $errors[] = "Name can not be blank.";
    }

    if (!is_valid_date($profile['dob'])) {
        $errors[] = "Date of birth is not a valid date/time combination";
    }

    if ($profile['gender'] === '') {
        $errors[] = "Gender must be selected.";
    }

    if ($profile['address'] === '') {
        $errors[] = "Address can not be blank.";
    }

    if ($profile['phone'] === '') {
        $errors[] = "Phone can not be blank.";
    }


    if (empty($errors)) {
        return true;
    } else {
        return $errors;
    }
}

function get_validation_errors($validation_result) {
    $errors = "";
    if ($validation_result !== true) {
        $errors .= "<div class='validation-errors'>";
        foreach ($validation_result as $error) {
            $errors .= "<p class='validation-error'>" . $error . "</p>";
        }
        $errors .= "</div>";
    }
    return $errors;
}

?>