

    <?php
        require_once('parts/header.php');
    ?>

	<section class="carousel">
		<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
		  <ol class="carousel-indicators">
		    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
		    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
		    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
		  </ol>
		  <div class="carousel-inner">
		    <div class="carousel-item active">
		      <img src="public/img/slider_4.jpg" class="d-block w-100" alt="...">
		      <div class="carousel-caption d-none d-md-block">
		        <h5>First slide label</h5>
		        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
		      </div>
		    </div>
		    <div class="carousel-item">
		      <img src="public/img/slider_5.jpg" class="d-block w-100" alt="...">
		      <div class="carousel-caption d-none d-md-block">
		        <h5>Second slide label</h5>
		        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
		      </div>
		    </div>
		    <div class="carousel-item">
		      <img src="public/img/slider_6.jpg" class="d-block w-100" alt="...">
		      <div class="carousel-caption d-none d-md-block">
		        <h5>Third slide label</h5>
		        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
		      </div>
		    </div>
		  </div>
		  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
		</div>
	</section>

	<section class="nouveaute py-4" style="min-height: 500px;">
		<div class="container" >
			<h2 class="text-center py-4">Nouveaute</h2>
				<?php $prodsIndex = Produit::selectProductLimit('4');
					if(empty($prodsIndex)):
				?>
				<div>
						<p>We will add some products soon</p>
				</div>

				<?php else: ?>
			<!-- Row -->	
			<div class="row">
				

					<?php	
						foreach ($prodsIndex as $key => $prod) :
								
				?>
				<div class="col-md-3 col-sm-6 col-xs-12 my-2">
					<div class="card shadow-pink px-3" style=" position: relative;">
						<div class="tag-new">
							<h3><span class="badge badge-danger bg-pink ">New</span></h3>
						</div>

						<div class="card-body">
							<div style="min-height:200px; max-height:200px;">
								<img class="card-img-top" src="public/img/product_1.jpg" alt="Card image cap">
							</div>
							<div style="height:100px;">
								<h5 class="card-title"><strong><?= $prod['titleProd'] ?></strong></h5>
							</div>
							
							<p class="card-text"><?= $prod['prixProd'] ?>.00 DH</p>
							<?php if(!isset($_SESSION['userId'])): ?>
								<a href="login" class="btn btn-info bg-pink px-3">Ajouter Au Panier</a>
							<?php elseif($_SESSION['userStatus']>0): ?>
							<?php else: ?>
							
					    	<form action="addToPanier.php?user_id=<?= $_SESSION['userId'] ?>&prod_id=<?= $prod['idProd'] ?>&redirect=index" method="POST">
								<div class="form-row align-items-center">
									<div class="col-4 ">
										<input type="number" name="qte" class="form-control" value="1" required>
									</div>
									<div class="col-8 ">
										<button type="submit" class="btn btn-info bg-pink px-3" name="submit">Ajouter</button>
									</div>
								</div>
							</form>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<?php endforeach;  ?>
			</div>
			<!-- /Row -->	
			<?php endif; ?>
		</div>
	</section>

	<section class="sub-footer py-5">
		<div class="container">
			<div class="row">
				<div class="col-4">
					<h2>LOGO</h2>
				</div>
				<div class="col-4">
					<h3>Footer 1</h3>
					<hr>
					<ul class="list-group list-group-flush">
  						<li class="list-group-item"><a href="#">Link</a></li>  
  						<li class="list-group-item"><a href="#">Link</a></li>  
  						<li class="list-group-item"><a href="#">Link</a></li> 
					</ul>
				</div>
				<div class="col-4">
					<h3>Footer 2</h3>
					<hr>
					<ul class="list-group list-group-flush">
  						<li class="list-group-item"><a href="#">Link</a></li>  
  						<li class="list-group-item"><a href="#">Link</a></li>  
  						<li class="list-group-item"><a href="#">Link</a></li> 
					</ul>
				</div>
			</div>
		</div>
	</section>
    <?php
        require_once('parts/footer.php');
    ?>