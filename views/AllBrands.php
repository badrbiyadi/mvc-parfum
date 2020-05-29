<?php require_once('parts/header2.php'); ?>
<?php 
	if(!isset($_SESSION['userStatus']) || $_SESSION['userStatus'] < 1):
    
		 Controller::redirect('index?acces_denied');
    else:
        $brands= Marque::allMarques();
        
?>

      
    <div class="p-3" style="min-height: 100vh;">
        <h3>Marques</h3>
        <a class="btn btn-success my-3" href="createMarque">Create New One</a>
        <?php if(empty($brands)): ?>
        <h3 class="py-4">No Brand Found</h3>
        <?php else: ?>
        <table class="table ">
            <thead class="thead-light">
            <tr>
                <th scope="col">idMarque</th>
                <th scope="col">titleMarque</th>
                <th scope="col">imgMarque</th>
                <th scope="col">Actions</th>
                
            </tr>
            </thead>
            <tbody>
                <?php foreach ($brands as $key => $brand) :?>
                <tr>
                    <th scope="row"><?= $brand['idMarque']; ?></th>
                    <td><?= $brand['titleMarque']; ?></td>
                    <td>
                    <img style="max-width:50px;" class="img-fluid" src="<?= (!empty($brand['imgMarque'])) ?  'public/upload/marques/'.$brand['imgMarque'] : ''; ?>">
                        <?= (empty($brand['imgMarque'])) ? 'NULL' : '';  ?>
                    </td>
                    <td>
                    <div class="d-flex ">
                        <div>
                            <a class="btn btn-info mr-3" href="editMarque?id=<?= $brand['idMarque'] ?>">Edit</a></div>
                        <div>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal<?= $brand['idMarque'] ?>">Delete</button>
                        </div>
                        <div class="modal fade" id="modal<?= $brand['idMarque'] ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Suppression</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Vous etres sur que vous voulez supprimer la marque <strong><?= $brand['titleMarque']; ?></strong>, car cela va supprimer tous les produit de cette marque?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <a class="btn btn-danger" href="deleteBrand.php?id=<?= $brand['idMarque']  ?>">Yes</a>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>
    

<?php endif; ?>
<?php require_once('parts/footer.php'); ?>