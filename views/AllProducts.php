<?php require_once('parts/header2.php'); ?>
<?php 
	if(!isset($_SESSION['userStatus']) || $_SESSION['userStatus'] < 1):
    
		 Controller::redirect('index?acces_denied');
    else:
        $prods= Database::query("SELECT * from produit,marque WHERE marqueId = idMarque ");
?>

      
    <div class="p-4" style="min-height: 100vh;">
      <a class="btn btn-success" href="createProduct">Create New One</a>
      <?php if(empty($prods)): ?>
        <h3 class="py-4">No Product Found</h3>
      <?php else: ?>
      
      
      <table class="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">Idprod</th>
            <th scope="col">titleProd</th>
            <th scope="col">prixProd</th>
            <th scope="col">imgProd</th>
            <th scope="col">titleMarque</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach ($prods as $key => $prod) :?>
              <tr>
                <th scope="row"><?= $prod['idProd']; ?></th>
                <td><?= $prod['titleProd']; ?></td>
                <td><?= $prod['prixProd']; ?></td>
                <td>
                  
                  <img style="max-width:50px;" class="img-fluid" src="<?= (!empty($prod['imgProd'])) ?  'public/upload/products/'.$prod['imgProd'] : ''; ?>">
                        <?= (empty($prod['imgProd'])) ? 'NULL' : '';  ?>
                </td>
                <td><?= $prod['titleMarque']; ?></td>
                <td>
                  <div class="d-flex ">
                    <div><a class="btn btn-info mr-3" href="editProduct?id=<?= $prod['idProd'];?>">Edit</a></div>
                    <div>
                      
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal<?= $prod['idProd']; ?>">Delete</button>
                    </div>

                    <div class="modal fade" id="modal<?= $prod['idProd']; ?>">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title">Suppression</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body">
                                  <p>Vous etres sur que vous voulez supprimer le produit <strong><?= $prod['titleProd']; ?></strong> ?</p>
                              </div>
                              <div class="modal-footer">
                              <a class="btn btn-danger" href="deleteProduct.php?id=<?= $prod['idProd']; ?>">Yes</a>
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