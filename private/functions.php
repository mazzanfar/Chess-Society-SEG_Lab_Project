<?php
function is_post_request() {
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

function redirect_to($path) {
    header("Location: " . "/public/" . $path);
}


function mysql_date_to_html_date($date) {
    $html_date_format = 'Y-m-d\TH:i'; //escape the literal T so it is not expanded to a timezone code
    $php_timestamp = strtotime($date);
    return date($html_date_format, $php_timestamp);
}

?>