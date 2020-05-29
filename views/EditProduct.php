<?php require_once('parts/header2.php'); ?>
<div class="container py-4" style="min-height: 100vh;">
<?php if(isset($_GET['id']) && $_GET['id'] != null): 
        $prod = Produit::selectProduct('idProd',$_GET['id']);
     
        if(empty($prod)): ?>
            <div class="alert alert-danger" role="alert">Please check if the product exists </div>
        <?php  
        else: ?>
        

	<h2>Edit a Product</h2>
	<?php if(isset($_GET['message'])): ?>
		<div class="alert alert-warning" role="alert">
			<?php echo $_GET['message'] ?>
		</div>
	<?php endif ?>
	<form class="border p-3" action="modifierProduit.php?id=<?= $prod['idProd']; ?>" method="POST" enctype="multipart/form-data">
		<div class="form-row ">
			<div class="col-md-6 ">
				<div class="form-group">
					<label>Titre de produit</label>
					<input type="text" class="form-control" name="title" placeholder="Titre" 
					value="<?= $prod['titleProd']; ?>"
					>
				</div>
				<div class="form-group">
					<label>Description du produit</label>
					<textarea class="form-control" name="desc" ><?= $prod['descProd']; ?></textarea>
				</div>
				<label>Image du produit</label>

				<div class="form-group px-3">
					<div style="min-width:100%; min-height:100px; background-color:#ccc;" >
						<img class="img-fluid" src="<?= (!empty($prod['imgProd'])) ? "public/upload/products/".$prod['imgProd'] : '' ;  ?>" id="imgDisplay" alt="">
					</div>
				</div>
				<div class="form-group">
					<input type="file" class="form-control-file" id="file" name="file">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="inputPassword4">Produit pour </label>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="genre" value="0" id="genre1" <?php echo ($prod['genreProd'] == '0') ? 'checked': ''; ?>>
							<label class="form-check-label" for="genre1">
								Homme
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="genre" value="1" id="genre2" <?= ($prod['genreProd'] == '1') ? 'checked': ''; ?>>
							<label class="form-check-label" for="genre2">
								Femme
							</label>
						</div>
				</div>

				<label>Marque du produit</label>
				<div class="form-row ">
					<div class="col-10">	
						<select class="form-control" name="marque">
							<option value="">Choose...</option>
							<?php
							$marques = Marque::allMarques();
								foreach ($marques as $key => $marque) :
								?>
									<option value="<?= $marque['idMarque']; ?>" <?= ($prod['marqueId'] == $marque['idMarque'] )? 'selected' : ''; ?>><?= $marque['titleMarque']; ?></option>
							<?php endforeach; ?>
							
							
						</select>
					</div>
					<div class="col-2">
						<a href="createMarque" class="btn btn-success">Create</a>
					</div>
				</div>	
				<div class="form-group">
					<label>Prix de produit</label>
					<input type="number" class="form-control" placeholder="Prix" name="prix"
					value="<?= $prod['prixProd']; ?>"
					>
				</div>					
			</div>
		</div>
		
		<button type="submit" class="btn btn-info" name="submit">Edit</button>
	</form>
    <?php endif; ?>
<?php else: 
    Controller::redirect('admin');
endif;  ?>
</div>
<?php require_once('parts/footer.php'); ?>