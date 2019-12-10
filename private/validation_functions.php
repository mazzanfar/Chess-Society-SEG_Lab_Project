<?php
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

    if (!(bool) strtotime($event['time'])) {
        $errors[] = "Time is not a valid date/time combination";
    }

    if (!(bool) strtotime($event['available_from'])) {
        $errors[] = "Time is not a valid date/time combination";
    }

    if (!(bool) strtotime($event['expires'])) {
        $errors[] = "Time is not a valid date/time combination";
    }

    if (empty($errors)) {
        return true;
    } else {
        return $errors;
    }
}

?>