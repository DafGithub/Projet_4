<?php $this->titre = "Administration" ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="title col-12 col-lg-8">
            <h1 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">
                <a title="Retour à l'accueil" href=""> Administration </a>
            </h1>
            <h2 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">
                Bienvenue, <?= $this->nettoyer($login) ?> !<br>
                Ce <a href="">blog </a> comporte <?= $this->nettoyer($nbBillets) ?> billet(s)
                et <?= $this->nettoyer($nbCommentaires) ?> commentaire(s)
                <br>dont <a href="<?= "admin/commentairesSignales" ?>"><?= $this->nettoyer($nbSignalements) ?></a>
                signalé(s).
            </h2>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="mbr-form">
            <span class="input-group-btn">
                <a class="btn btn-primary btn-form display-4" id="lienDeco" href="connexion/deconnecter" role="button">Se déconnecter</a>
            </span>
        </div>
    </div>
</div>

<?php foreach ($billets as $billet): ?>
    <section class="cid-ragOec71Mi">
        <div class="container">
            <div class="media-container-row">
                <div class="col-12 col-md-8">
                    <div class="media-container-row">
                        <div class="media-content">
                            <div class="mbr-section-text">
                                <p class="mbr-text align-right mb-0 mbr-fonts-style display-7">
                                    <article class="boundaries">
                                        <header>
                                            <h1 class="titreBillet"><?= $this->nettoyer($billet['titre']) ?></h1>
                                            <time> Date de création : <?= $this->nettoyer($billet['date']) ?></time>
                                        </header>
                                <p><?= $billet['contenu'] ?></p>
                                <a href="<?= "admin/modifierBillet/" . $this->nettoyer($billet['id']) ?>">Modifier</a>
                                </article>
                                </p>
                            </div>
                        </div>
                        <div class="mbr-figure" style="width: 60%;">
                            <img src="assets/images/01.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endforeach; ?>


<section class="cid-ragOec71Mi">
    <div class="container">
        <div class="media-container-row">
            <div class="col-12 col-md-8">
                <div class="media-container-row">
                    <div class="media-content">
                        <div class="mbr-section-text">
                            <h2 class="mbr-section-title align-center mbr-light pb-5 mbr-fonts-style display-2">
                                Créer un billet
                            </h2>
                            <p class="mbr-text align-right mb-0 mbr-fonts-style display-7">
                            <form class="mbr-form" method="post" action="admin/ajouterbillet">
                                <label class="form-control-label mbr-fonts-style display-7" for="titre">
                                    Titre du billet :
                                </label>
                                <input id="titre" name="titre" type="text" placeholder="" required
                                       class="form-control"/><br/>

                                <label class="form-control-label mbr-fonts-style display-7" for="texte">
                                    Texte :
                                </label>
                                <textarea id="texte" name="contenu" rows="4"
                                          placeholder="" class="form-control"></textarea><br/>

                                <div class="row justify-content-center">
                                    <span class="input-group-btn"> <button type="submit"
                                                                           class="btn btn-primary btn-form display-4">Créer</button> </span>
                                </div>
                            </form>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

