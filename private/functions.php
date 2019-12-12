<?php
function redirect_to($path) 
{
    header("Location: " . "/public/" . $path);
}


function mysql_date_to_html_date($date) 
{
    $html_date_format = 'Y-m-d\TH:i'; //escape the literal T so it is not expanded to a timezone code
    $php_timestamp = strtotime($date);
    return date($html_date_format, $php_timestamp);
}


function url_for($script_path) 
{
  // add the leading '/' if not present
  if($script_path[0] != '/') 
  {
    $script_path = "/" . $script_path;
  }
    
  return WWW_ROOT . $script_path;
}

function h($string="") 
{
    return htmlspecialchars($string);
}

function is_post_request() 
{
  return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function is_get_request() 
{
  return $_SERVER['REQUEST_METHOD'] == 'GET';
}

function db_escape($connection, $string) 
{
    return mysqli_real_escape_string($connection, $string);
}


// only use this in the head of the html document BEFORE defining a custom stylesheet
function require_bootstrap() {
    echo "<link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css\" integrity=\"sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh\" crossorigin=\"anonymous\">";
    echo "<script src=\"https://code.jquery.com/jquery-3.3.1.slim.min.js\" integrity=\"sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo\" crossorigin=\"anonymous\"></script>";
    echo "<script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js\" integrity=\"sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1\" crossorigin=\"anonymous\"></script>";
    echo "<script src=\"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js\" integrity=\"sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM\" crossorigin=\"anonymous\"></script>";
}

function is_officer() {
    return isset($_SESSION["is_officer"]) && $_SESSION["is_officer"] === 1;
}

function is_logged_in() {
    return isset($_SESSION["loggedin"]) && $_SESSION["loggedin"];
}

function require_login() {
    if (!is_logged_in()) {
        redirect_to("index.php");
    }
}

function require_officer() {
    if (!is_officer()) {
        redirect_to("index.php");
    }
}
?>
