<?php require_once('parts/header2.php'); ?>

    <div class="container py-4" style="min-height: 100vh;">
        <?php if(isset($_GET['message'])): ?>
            <div class="alert alert-warning" role="alert">
                <?php echo $_GET['message'] ?>
            </div>
        <?php endif ?>

        <h2>Creer une marque</h2>
        <form class="border p-3" action="createBrand.php?<?= (isset($_GET['redirect'])) ? 'redirect' : ''; ?>" method="POST" enctype="multipart/form-data">
            <div class="form-row">
                <div class="col-7">
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Nom de marque</label>
                        <input type="text" class="form-control" name="title">
                    </div>
                        
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Image de marque</label>
                        <input type="file" class="form-control-file" id="file" name="file">
                    </div>
                </div>
                <div class="col-5">
                    <div class="mt-4" style="min-width:100%; min-height:100px; background-color:#ccc;" >
						<img class="img-fluid" src="" id="imgDisplay" alt="">
					</div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Creer Marque</button>
        </form>

    </div>

    
<?php require_once('parts/footer.php'); ?>