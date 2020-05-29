<?php session_start(); ?>
<!DOCTYPE>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<title></title>
	<link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="public/css/fontawesome.min.css">
	<link rel="stylesheet" type="text/css" href="public/css/style.css">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
	<script src="public/js/jquery.min.js" ></script>
	<script  src="public/js/popper.min.js"></script>	
	<script src="public/js/bootstrap.min.js" ></script>
	<script src="public/js/fontawesome.min.js"></script>

</head>



<body>
	
	<header>
		<!-- Top Header -->
			<div class="container top-header d-none d-md-block d-lg-block">
				<div class="row">
					<div class=" col-3 py-4 ">
						<a href="index"><strong>Logo</strong>
						<i class="fas fa-flask"></i></a>
					</div>
					<div class=" col-3 py-4">
						<span>Tel : <a href="#">06 66 66 66 66</a></span>
					</div>
					
					<div class="col-3 d-flex align-items-center">
						
						<div class="border p-3 mx-2">
							<i class="fas fa-user"></i>
						</div>
						<div class="">
						<?php if(isset($_SESSION['userId'])) ?>
							<h5><?php echo (isset($_SESSION['userId'])) ? '<a href="profile">Edit Profil</a>' : 'Mon compte';  ?></h5>
							<?php if(isset($_SESSION['userId'])) : ?> 
								<a href="logout">Deconnecter</a>
							<?php else:  ?>
								<a href="login">Connecter</a>
							<?php endif  ?>
						</div>
					</div>
					<div class="col-3 d-flex align-items-center">
						<?php 
						if(!isset($_SESSION['userStatus']) ):?>
							
						<?php
						elseif($_SESSION['userStatus'] > 0): ?>
							<a href="admin" class="btn btn-info">Admin Panel</a>
						<?php
						else:?><?php	
							$paniers = Panier::panierUser($_SESSION['userId']);  
							if(!empty($paniers)): 
								$prix = 0;
								$count = 0;
								foreach($paniers as $pan){
									$prix += $pan['prixProd']*$pan['qte'];
									$count++;
								}

						?>
								<div class="border py-3 px-2 mx-2">
									<i class="fas fa-shopping-cart"></i>
									<span class="px-1 notif bg-danger text-white rounded-circle">
										<?= $count ?>
									</span>
								</div>
							<!-- Panier -->		
							<div class="panier">
								<h5>Panier</h5>
							
								<a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $prix ?>.00 Dh <i class="fas fa-caret-down"></i></a>
								<!-- Dropdown -->
								<div class="dropdown-menu dropdown-menu-right">
									<ul class="list-group">
										<?php
											
												foreach ($paniers as $key => $panier): 
												
											?>
													<li class="list-group-item d-flex justify-content-between align-items-center">										
														<div class="d-flex">
															<div class="border mr-2"  style="width: 50px; max-height : 40px;">
																<img class="img-fluid" src="<?= (empty($panier['imgProd']))? 'public/img/default_product.jpg' : 'public/upload/products/'.$panier['imgProd']; ?>" alt="">
															</div>
															<div><strong><?= $panier['titleProd'] ?></strong> <br>
															<?= $panier['qte'] ?> x <?= $panier['prixProd'] ?>.00DH
															</div>
														</div>
														<div>
															<a href="" class="btn btn-danger">X</a>
														</div>
													</li>
											<?php 	
												endforeach; ?>
									</ul>
									<!-- Checkout -->
									<div class=" text-center py-2">
										<a href="" class="btn btn-success">Checkout</a>
									</div>
									<!-- /Checkout -->
								</div>	
								<!-- /Dropdown -->
							</div>
							<!-- /Panier -->
							<?php else: ?>
								
								<div class="border py-3 px-2 mx-2">
									<i class="fas fa-shopping-cart"></i>
								</div>

								<div>
									<h5>Panier</h5>
									<a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">0.00 Dh <i class="fas fa-caret-down"></i></a>
									<!-- Dropdown Empty -->
									<div class="dropdown-menu dropdown-menu-right p-3">
										<p>Panier Vide</p>
									</div>
									<!-- /Dropdown Empty -->
								</div>
							<?php 
								//endif of empty pannier	
								endif; 
						//endif of $session and $isAdmin	
						endif;
						?>
								

					</div>
				</div>
			</div>	
		<!-- /Top Header  -->
		<!-- Navigation -->
		

		<nav class="navbar navbar-expand-lg nav-pink py-3">
			<div class="container">
			 	<button class="navbar-toggler bg-info" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    	<span class="navbar-toggler-icon"></span>
			  	</button>

		  	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		    	<ul class="navbar-nav mr-auto">
		     		<li class="nav-item active">
			        	<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
			      	</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Pour Hommes</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Pour Femmes</a>
					</li>
					
			      	<li class="nav-item dropdown">
			        	<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			          		Marques
			        	</a>
				        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			          		<a class="dropdown-item" href="#">Zara</a>
			          		<a class="dropdown-item" href="#">Gucci</a>
				        </div>
			      	</li>
			      	<li class="nav-item">
						<a class="nav-link" href="about-us">A propos</a>
					</li>
			      	<li class="nav-item">
						<a class="nav-link" href="#">Contact</a>
					</li>
			    </ul>
			    <form class="form-inline my-2 my-lg-0 d-none d-md-block d-lg-block">
			      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
			      <button class="btn btn-info my-2 my-sm-0" type="submit">Search</button>
			    </form>
		  	</div>
	  	</div>
	</nav>	  
			
		<!-- /Navigation -->
	</header>

