<?php
require_once "../../private/initialise.php";

require_officer();
$validation_result = true;
if (is_post_request()) {
    $id = $_POST['id'];
    $elo = $_POST['elo'];

    $validation_result = validate_elo($elo);
    if ($validation_result === true) {
        update_elo($id, $elo);
        redirect_to("admin/index.php");
    }
} else {
    $id = $_GET['id'] ?? 1;
}

$elo = get_elo($id);
?>

<html>
<head>
    <title>Chess society admin</title>
    <?php require_once("../../private/shared/chess_head.php") ?>
</head>
<body>
<?php include("../../private/shared/chess_header.php") ?>

<div class="content-inner">
    <h1>Editing player id '<?php echo $id ?>' elo</h1>
    <a href="index.php">Back</a>
    <?php echo get_validation_errors($validation_result); ?>
    <form class="content-form" method="post">
        <label class="content-form-input">
            Elo
            <input class="content-form-input" type="text" name="elo" value="<?php echo $elo ?>">
        </label>
        <br/>
        <input name="id" value="<?php echo $id ?>" hidden>
        <br/>
        <input type="submit">

    </form>
</div>


</body>
</html>
<?php include("../../private/shared/chess_footer.php"); ?>
