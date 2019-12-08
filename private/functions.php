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
?>
