

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

	<section class="nouveaute py-4">
		<div class="container">
			<h2 class="text-center py-4">Nouveaute</h2>
			<div class="row">
				<div class="col-md-3 col-sm-6 col-xs-12 my-2">
					<div class="card shadow-pink" style=" position: relative;">
						<div class="tag-new">
							<h3><span class="badge badge-danger bg-pink ">New</span></h3>
						</div>
					  <img class="card-img-top" src="public/img/product_1.jpg" alt="Card image cap">
					  <div class="card-body">
					    <h5 class="card-title"><strong>Card title</strong></h5>
					    <p class="card-text">300.00 DH</p>
					    <div class="text-center">
					    	<a href="#" class="btn btn-info bg-pink px-3">Ajouter au panier</a>
					    </div>
					  </div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12 my-2">
					<div class="card shadow-pink" style=" position: relative;">
						<div class="tag-new">
							<h3><span class="badge badge-danger bg-pink ">New</span></h3>
						</div>
					  <img class="card-img-top" src="public/img/product_1.jpg" alt="Card image cap">
					  <div class="card-body">
					    <h5 class="card-title"><strong>Card title</strong></h5>
					    <p class="card-text">300.00 DH</p>
					    <div class="text-center">
					    	<a href="#" class="btn btn-info bg-pink px-3">Ajouter au panier</a>
					    </div>
					  </div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12 my-2">
					<div class="card shadow-pink" style=" position: relative;">
						<div class="tag-new">
							<h3><span class="badge badge-danger bg-pink ">New</span></h3>
						</div>
					  <img class="card-img-top" src="public/img/product_1.jpg" alt="Card image cap">
					  <div class="card-body">
					    <h5 class="card-title"><strong>Card title</strong></h5>
					    <p class="card-text">300.00 DH</p>
					    <div class="text-center">
					    	<a href="#" class="btn btn-info bg-pink px-3">Ajouter au panier</a>
					    </div>
					  </div>
					</div>
				</div>
			</div>
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