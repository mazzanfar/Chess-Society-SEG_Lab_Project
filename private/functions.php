<?php
function is_post_request() {
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

function redirect_to($path) {
    header("Location: " . "/public/" . $path);
}
?>