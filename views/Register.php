<?php require_once('parts/header.php'); ?>

<div class="container py-4" style="min-height: 100vh;">
        

    <?php if(!isset($_SESSION['userId'])): ?>   
        <?php if(!isset($_GET['confirmed'])): ?>  
        <h2>Information Personnel</h2>
        <?php if(isset($_GET['message'])): ?>
            <div class="alert alert-warning" role="alert">
                <?php echo $_GET['message'] ?>
            </div>
        <?php endif ?>
        <form class="border py-5 px-3" action="createUser.php" method="POST">
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label>Nom</label>
                    <input type="text" class="form-control" name="nom"  placeholder="Nom"
                        value="<?= (isset($_GET['nom']))? $_GET['nom'] : ''; ?>"
                    >
                </div>
                <div class="form-group col-md-5">
                    <label>Prenom</label>
                    <input type="text" class="form-control" name="prenom"  placeholder="Prenom"
                        value="<?= (isset($_GET['prenom']))? $_GET['prenom'] : ''; ?>"
                    >
                </div>
                <div class="form-group col-md-2">
                    <label>Genre</label>
                    <select name="genre" class="form-control">

                        <option value="">Sexe...</option>

                        <?php
                        if (isset($_GET['genre'])):?>
                            <option value="0" <?php echo ($_GET['genre'] == '0')? 'selected' : '';  ?>>Homme</option>
                            <option value="1" <?php echo ($_GET['genre'] == '1')? 'selected' : '';  ?>>Femme</option>
                        <?php else: ?>
                            <option value="0" >Homme</option>
                            <option value="1">Femme</option>
                        <?php endif;?>

                        
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>Date de naissance</label>
                <input type="date" name="dateNaissance" class="form-control"
                    value="<?= (isset($_GET['dateNaissance']))? $_GET['dateNaissance'] : ''; ?>"
                >
            </div>

            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="inputCity">Adresse</label>
                    <input type="text" class="form-control" name="address"
                        value="<?= (isset($_GET['address']))? $_GET['address'] : ''; ?>"  
                    >
                </div>
                <div class="form-group col-md-4">
                    <label>Ville</label>
                    <select class="form-control" name="ville"
                        value="<?= (isset($_GET['ville']))? $_GET['ville'] : ''; ?>"
                    >   
                        <option value="">Choose...</option>
                        <?php
                            $cities = [
                                'Fez',
                                'Casablanca',
                                'Rabat',
                                'Meknes',
                                'Oujda',
                                'Kenitra',
                                'El Jadida',
                            ];
                            foreach($cities as $city) : 
                                if (isset($_GET['ville'])):?>
                                    <option value="<?php echo $city; ?>" <?php echo ($_GET['ville'] == $city)? 'selected' : '';  ?>><?php echo $city; ?></option>
                                <?php else: ?>
                                    <option value="<?php echo $city; ?>"><?php echo $city; ?></option>
                                <?php endif;?>
                            <?php endforeach; ?> 
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>Telephone</label>
                <input type="tel" name="tel" class="form-control" placeholder="06 .. .. .. .. "
                    value="<?= (isset($_GET['tel']))? $_GET['tel'] : ''; ?>"
                >
            </div>
    
            <button type="submit" class="btn btn-primary" name="submit">Envoyer</button>
        </form>
        <?php else: ?>

        <h2>Information du compte</h2>

        <?php if(isset($_GET['message'])): ?>
        <div class="alert alert-warning" role="alert">
            <?php echo $_GET['message'] ?>
        </div>
        <?php endif ?>
        <form class="border py-5 px-3" action="createCompte.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4" style="min-height: 300px;max-height: 300px; overflow:hidden"><img class="img-fluid img-circle" id="imgDisplay" src="public/img/default_user.jpg"></div>
                <div class="col-4"></div>
            </div>
                
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control"
                value="<?= (isset($_GET['email']))? $_GET['email'] : ''; ?>"
                >
            </div>

            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" 
                value="<?= (isset($_GET['username']))? $_GET['username'] : ''; ?>"
                >
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">Mot de passe</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputCity">Repetez le mot de passe</label>
                    <input type="password" class="form-control" name="repassword">
                </div>
            </div>

            <div class="form-group">
                <label>Photo de profil</label>
                <input type="file" class="form-control-file" name="file" id="file" >
            </div>
                
            <button type="submit" class="btn btn-primary" name="submit">Envoyer</button>
        </form>
        <?php endif; ?>

    <?php else: 
        Controller::redirect('profile'); ?>
    <?php endif; ?>
</div>

<?php require_once('parts/footer.php'); ?>