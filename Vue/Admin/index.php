<?php $this->titre = "Administration" ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="title col-12 col-lg-8">
            <h1 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">
                Administration
            </h1>
            <h2 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">
                Bienvenue, <?= $this->nettoyer($login) ?> !<br>
                Ce <a title="Retour à l'accueil" href="">blog </a> comporte <?= $this->nettoyer($nbBillets) ?> billet(s)

                et <a href="<?= "admin/tousLesCommentaires" ?>"><?= $this->nettoyer($nbCommentaires) ?></a>
                commentaire(s)

                <br>dont <a href="<?= "admin/commentairesSignales" ?>"><?= $this->nettoyer($nbSignalements) ?></a>
                signalé(s).
            </h2>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="mbr-form align-center">
            <span class="input-group-btn">
                <a class="btn btn-primary btn-sm scrollDown" role="button">Ecrire un article</a>
            </span>
            <span class="input-group-btn">
                <a class="btn btn-primary btn-sm" href="connexion/deconnecter" role="button">Se déconnecter</a>
            </span>

            <br>
            <br>
        </div>
    </div>
</div>

<?php foreach ($billets as $billet): ?>
    <section class="content_design_1 display-7">
        <div class="container">
            <article class="text">
                <header>
                    <h1 class="titreBillet"><?= $this->nettoyer($billet['titre']) ?></h1>
                    <time> Date de création : <?= $this->nettoyer($billet['date']) ?></time>
                </header>
                <p><?= $this->tronquer($billet['contenu']) ?></p>
                <a class="btn btn-primary btn-sm"
                   href="<?= "admin/modifierBillet/" . $this->nettoyer($billet['id']) ?>">Modifier</a>
            </article>
        </div>
    </section>
<?php endforeach; ?>


<section class="content_design_1 down">
    <div class="container">
        <h2 class="mbr-section-title align-center mbr-light pb-5 mbr-fonts-style display-2">
            Ecrire un article
        </h2>
        <form class="mbr-form" method="post" action="admin/ajouterbillet">
            <label class="form-control-label mbr-fonts-style display-7" for="titre">
                Titre de l'article :
            </label>
            <input id="titre" name="titre" type="text" placeholder="" required
                   class="form-control"/><br/>

            <label class="form-control-label mbr-fonts-style display-7" for="texte">Article :</label>
            <textarea id="texte" name="contenu" rows="10"
                      placeholder="" class="form-control"></textarea><br/>

            <div class="row justify-content-center">
                <span class="input-group-btn"> <button type="submit"
                                                       class="btn btn-primary btn-form display-4">Créer</button> </span>
            </div>
        </form>
    </div>
</section>

