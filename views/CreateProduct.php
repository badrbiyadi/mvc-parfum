<?php require_once('parts/header.php'); ?>
<?php 
	if(!isset($_SESSION['userStatus']) || $_SESSION['userStatus'] < 1):
		 Controller::redirect('index?acces_denied');
	else:
?>
<div class="container py-4" style="min-height: 100vh;">
	<h2>Create a Product</h2>
	<?php if(isset($_GET['message'])): ?>
		<div class="alert alert-warning" role="alert">
			<?php echo $_GET['message'] ?>
		</div>
	<?php endif ?>
	<form class="border p-3" action="createProduit.php" method="POST" enctype="multipart/form-data">
		<div class="form-row ">
			<div class="col-md-6 ">
				<div class="form-group">
					<label>Titre de produit</label>
					<input type="text" class="form-control" name="title" placeholder="Titre" 
					value="<?php echo (isset($_GET['title'])) ? $_GET['title']:''; ?>"
					>
				</div>
				<div class="form-group">
					<label>Description du produit</label>
					<textarea class="form-control" name="desc" rows="3"><?= (isset($_GET['desc'])) ? $_GET['desc']:''; ?></textarea>
				</div>
				<label>Image du produit</label>

				<div class="form-group px-3">
					<div style="min-width:100%; min-height:100px; background-color:#ccc;" >
						<img class="img-fluid" src="" id="imgDisplay" alt="">
					</div>
				</div>
				<div class="form-group">
					<input type="file" class="form-control-file" id="file" name="file">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="inputPassword4">Produit pour </label>
					<?php if(isset($_GET['genre'])): ?>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="genre" value="0" id="genre1" <?php echo ($_GET['genre'] === '0') ? 'checked': ''; ?>>
							<label class="form-check-label" for="genre1">
								Homme
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="genre" value="1" id="genre2" <?= ($_GET['genre'] === '1') ? 'checked': ''; ?>>
							<label class="form-check-label" for="genre2">
								Femme
							</label>
						</div>

					<?php else: ?>
					
					<div class="form-check">
						<input class="form-check-input" type="radio" name="genre" value="0" id="genre1">
						<label class="form-check-label" for="genre1">
							Homme
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="genre" value="1" id="genre2">
						<label class="form-check-label" for="genre2">
							Femme
						</label>
					</div>
					<?php endif; ?>
				</div>

				<label>Marque du produit</label>
				<div class="form-row ">
					<div class="col-10">	
						<select class="form-control" name="marque">
							<option value="">Choose...</option>
							<?php
							$marques = Marque::allMarques();
							if (isset($_GET['marque'])):
								foreach ($marques as $key => $marque) :
								?>
									<option value="<?= $marque['idMarque']; ?>" <?= ($_GET['marque'] == $marque['idMarque'] )? 'selected' : ''; ?>><?= $marque['titleMarque']; ?></option>
							<?php endforeach;
							else:
								foreach ($marques as $key => $marque) :
								?>

									<option value="<?= $marque['idMarque']; ?>"><?= $marque['titleMarque']; ?></option>
							<?php endforeach; 
							endif;
							?>
							
						</select>
					</div>
					<div class="col-2">
						<a href="createMarque?redirect=create" class="btn btn-success">Create</a>
					</div>
				</div>
					
				<div class="form-group">
					<label>Prix de produit</label>
					<input type="number" class="form-control" placeholder="Prix" name="prix"
					value="<?php echo (isset($_GET['prix'])) ? $_GET['prix']:''; ?>"
					>
				</div>
						
			</div>
			
		</div>
		
		<button type="submit" class="btn btn-primary" name="submit">Creer</button>
	</form>
</div>
<?php
	
	endif;
?>

<?php require_once('parts/footer.php'); ?>