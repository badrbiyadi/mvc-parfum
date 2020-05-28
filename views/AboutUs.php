<h2>About Us</h2>

<?php 
foreach (AboutUs::$vars  as $key => $row) :  ?>
    <p>[<?php echo $key; ?>] : 
        <?php foreach ($row as $index => $value): ?>
             (<?php echo $index ?>)   => <?php echo $value; ?>
        <?php endforeach; ?>
    </p>
<?php endforeach; 
echo (isset($_GET['message']))?  $_GET['message'] :'';

?>

<form action="create.php" method="POST">
    <input type="text" name="prenom">
    <input type="text" name="nom">
    <button name='submit'>Ok</button>
</form>