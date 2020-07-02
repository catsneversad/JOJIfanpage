<?php 
    require "header.php";
?>

    <main>
        <?php 
            require "includes/main_content.php";
        ?>
        <?php 
            if (isset($_SESSION['userUid'])) {
                require "includes/main_2_content.php";
            }
        ?>
    </main>
<?php 
    require "footer.php";
?>