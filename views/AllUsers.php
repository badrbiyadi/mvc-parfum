<?php require_once('parts/header.php'); ?>
    <div class="container py-4" style="min-height: 100vh;">
        <?php print_r(Controller::$vars); 
        print_r(User::getAutoIncrement()); 
        foreach (Controller::$vars as $key => $values) {
            echo "<p>[$key] ->"; 
                    foreach ($values as $id => $value) {
                        echo "{$id} =>  $value /";
                    }
            echo "</p>";
        } ?>
    </div>
<?php require_once('parts/footer.php'); ?>