<?php require_once('parts/header.php'); ?>
    <div class="container py-4" style="min-height: 100vh;">
        <?php if(isset($_SESSION['userId'])): ?>
            <h2>Edit Profile</h2>
            <?php
                $user = User::selectUser('idUser',$_SESSION['userId']);
            ?>

            <?php if(isset($_GET['message'])): ?>
                <div class="alert alert-warning" role="alert">
                    <?php echo $_GET['message'] ?>
                </div>
            <?php endif ?>
            <form class="border py-5 px-3" action="editUser.php?id=<?= $_SESSION['userId'] ?>" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label>Nom</label>
                        <input type="text" class="form-control" name="nom"  placeholder="Nom"
                            value="<?= $user['nomUser']; ?>"
                        >
                    </div>
                    <div class="form-group col-md-5">
                        <label>Prenom</label>
                        <input type="text" class="form-control" name="prenom"  placeholder="Prenom"
                            value="<?= $user['prenomUser']; ?>" >
                    </div>
                    <div class="form-group col-md-2">
                        <label>Genre</label>
                        <select name="genre" class="form-control">
                            <option>Sexe...</option>
                                <option value="0" <?php echo ($user['genreUser'] == '0')? 'selected' : '';  ?>>Homme</option>
                                <option value="1" <?php echo ($user['genreUser']  == '1')? 'selected' : '';  ?>>Femme</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label>Date de naissance</label>
                    <input type="date" name="dateNaissance" class="form-control"
                        value="<?= $user['dateNaissance']; ?>"
                    >
                </div>

                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="inputCity">Adresse</label>
                        <input type="text" class="form-control" name="address"
                            value="<?= $user['adressUser']; ?>"  
                        >
                    </div>
                    <div class="form-group col-md-4">
                        <label>Ville</label>
                        <select class="form-control" name="ville"
                            value="<?= (isset($_GET['ville']))? $_GET['ville'] : ''; ?>"
                        >   
                            <option>Choose...</option>
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
                                foreach($cities as $city) : ?>
                                        <option value="<?php echo $city; ?>" <?php echo ($user['villeUser'] == $city)? 'selected' : '';  ?>><?php echo $city; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label>Telephone</label>
                    <input type="tel" name="tel" class="form-control" placeholder="06 .. .. .. .. "
                        value="<?= $user['telUser']; ?>"
                    >
                </div>
        
                <button type="submit" class="btn btn-warning" name="submit">Edit</button>
            </form>

        <?php else: 
            Controller::redirect('login');    
        endif; ?>
    </div>
<?php require_once('parts/footer.php'); ?>