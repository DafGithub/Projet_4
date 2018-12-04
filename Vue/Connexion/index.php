<?php $this->titre = "Connexion" ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="title col-12 col-lg-8">
            <h1 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">
                Vous devez être connecté pour accéder à cette zone.
            </h1>
        </div>
    </div>
</div>



<?php if (isset($msgErreur)): ?>
    <p><?= $msgErreur ?></p>
<?php endif; ?>

<section class="cid-ragOec71Mi">
    <div class="container">
        <div class="media-container-row">
            <div class="col-12 col-md-6">
                <div class="media-content">
                    <div class="mbr-section-text">
                        <form class="mbr-form" method="post" action="connexion/connecter">
                            <input class="form-control" name="login" type="text" placeholder="Entrez votre login"
                                   required autofocus><br>
                            <input class="form-control" name="mdp" type="password"
                                   placeholder="Entrez votre mot de passe" required><br>
                            <div class="row justify-content-center">
                                <span class="input-group-btn"><button href="" type="submit"
                                                                      class="btn btn-primary btn-form display-4">Connexion</button></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>