<?php require_once('parts/header2.php'); ?>
<?php 
	if(!isset($_SESSION['userStatus']) || $_SESSION['userStatus'] < 1):
        Controller::redirect('index?access_denied');
    else:

        if(!isset($_GET['id']) || $_GET['id'] == null): 
            Controller::redirect('admin?edit_marque_error_id');
        else : 
        $marque = Marque::selectMarque('idMarque', $_GET['id']);   
        if(empty($marque)): ?>
            <div class="alert alert-danger" role="alert">
                Please check if the marque exists
            </div>
        <?php else: ?>

        <div class="container py-4" style="min-height: 100vh;">
            <?php if(isset($_GET['message'])): ?>
                <div class="alert alert-warning" role="alert">
                    <?php echo $_GET['message'] ?>
                </div>
            <?php endif ?>

            <h2>Modifier une marque</h2>
            <form class="border p-3" action="editBrand.php?id=<?= $_GET['id'] ?>" method="POST" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="col-7">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Nom de marque</label>
                            <input type="text" class="form-control" name="title" value="<?= $marque['titleMarque'];  ?>">
                        </div>
                            
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Image de marque</label>
                            <input type="file" class="form-control-file" id="file" name="file">
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="mt-4" style="min-width:100%; min-height:100px; background-color:#ccc;" >
                            <img class="img-fluid" src="<?= 
                                (!empty($marque['imgMarque'])) ? 'public/upload/marques/'.$marque['imgMarque']   : '';
                            ?>" id="imgDisplay" alt="">
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-info" name="submit">Modifier Marque</button>
            </form>

        </div>
<?php  
            
            endif;
        endif;
    endif; 
    
    
    ?>
    
<?php require_once('parts/footer.php'); ?>