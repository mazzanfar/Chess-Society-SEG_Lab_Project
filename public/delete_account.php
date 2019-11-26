<?php
    require_once "../private/initialise.php";
    if(is_post_request()) {
        $delete = $_POST['delete'];
        if ($delete === "yes") {
            $id = $_POST['id'];
            delete_user($id);
        }
        redirect_to(url_for("index.php"));
    } else {
        echo "Error when deleting account";
    }
?>

<html>
   <head><title>Remove Account</title></head>
   <body>
    <a href="">Cancel</a>
    <h3>Delete Account?</h3>
    <form method="post">
        <label><input type="radio" name="delete" value="Yes">Yes</label><br>
        <label><input type="radio" name="delete" value="No">No</label><br>
        <input name="id" value="<?php echo $id ?>" hidden>
        <input type="submit" value="Submit">
    </form>
   </body>
</html>