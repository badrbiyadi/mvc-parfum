

<?php require_once('parts/header.php'); ?>
<div class="container py-4" style="min-height: 100vh;">

    <h2>Login</h2>

    <?php if(isset($_GET['message'])): ?>
        <div class="alert alert-warning" role="alert">
            <?php echo $_GET['message'] ?>
        </div>
    <?php endif ?>

    <form class="border p-3" action="loginUser.php" method="POST">
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" value="<?= (isset($_GET['email'])) ? $_GET['email'] : ''; ?>">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password">
            <small class="form-text text-muted">Don't show it to anyone</small>
        </div>

        <button type="submit" class="btn btn-primary" name="connect">Connect</button>
    </form>
    <a href="register">Register?</a>
</div>

<?php require_once('parts/footer.php'); ?>