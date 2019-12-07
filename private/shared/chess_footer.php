<footer>
    <link rel="stylesheet" href="../../public/stylesheets/footer.css" type="text/css">
    <?php echo "<p>&copy; " . date('Y') . "</p>"; ?>
</footer>

</body>
</html>

<?php
  db_disconnect($db);
?>
