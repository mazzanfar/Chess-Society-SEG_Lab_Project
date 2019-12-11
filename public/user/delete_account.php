<?php
    require_once "../../private/initialise.php";
    if(is_post_request()) {
        $delete = $_POST['delete'];
        if ($delete === "yes") {
            $id = $_SESSION['id'];
            delete_user($id);
            redirect_to("log_in/logout.php");
        } else {
            redirect_to("user/profile.php");
        }
    }
?>

<html>
   <head>
       <title>Remove Account</title>
       <?php require_once("../../private/shared/chess_head.php") ?>
       <link rel="stylesheet" href="../stylesheets/content.css" type="text/css">
   </head>
   <body>
   <?php include("../../private/shared/chess_header.php"); ?>
    <h3>Delete Account?</h3>
    <form class="content-form" method="post">
        <label class="content-form-radio"><input class="content-form-radio" type="radio" name="delete" value="yes">Yes</label>
        <label class="content-form-radio"><input class="content-form-radio" type="radio" name="delete" value="no">No</label><br>
        <input class="content-submit" type="submit" value="Submit">
    </form>
   </body>
</html>