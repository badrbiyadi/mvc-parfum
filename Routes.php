<?php  
    //pages 
    Route::set('index.php', function() {
        Controller::CreateView('Index');
    });
    
    Route::set('profile', function() {
        Controller::CreateView('Profile');
    });

    Route::set('admin', function() {
        Controller::CreateView('Admin');
    });

    Route::set('about-us', function() {
        Controller::CreateView('AboutUs');
    });

    Route::set('contact-us', function() {
        Controller::CreateView('ContactUs');
    });
    // User 
    Route::set('register', function() {
        Controller::CreateView('Register');
    });

    Route::set('users', function() {
        $users = User::allUsers();
        Controller::CreateView('Users',$users);
    });

    Route::set('createUser.php', function() {
        $user = new UserController();
        $user->CreateUser();
    });

    Route::set('editUser.php', function() {
        $user = new UserController();
        $user->EditUser();
    });

    Route::set('createCompte.php', function() {

        $compte = new CompteController();
        $compte->CreateCompte();
        
    });
    // Login & Session
    Route::set('loginUser.php', function() {
        $session = new LoginController();
        $session->connect();
        
    });

    Route::set('login', function() {
        Controller::CreateView('Login');
    });

    Route::set('logout', function() {
        Session::logout();
        Controller::redirect('index?deconnecte');
    });

    // Product
    Route::set('createProduct', function() {
        Controller::CreateView('CreateProduct');
    });
    Route::set('editProduct', function() {
        Controller::CreateView('EditProduct');
    });

    Route::set('createProduit.php', function() {
        $product = new ProductController();
        $product->createProduct();
    });
    Route::set('modifierProduit.php', function() {
        $product = new ProductController();
        $product->editProduct();
    });

    // Marque

    Route::set('createMarque', function() {
        Controller::CreateView('CreateMarque');
    });

    Route::set('createBrand.php', function() {
        $marque = new MarqueController();
        $marque->createMarque();
    });
    
    // Admin

    Route::set('allProducts', function() {
        Controller::CreateView('AllProducts');
    });

    

    

    

    