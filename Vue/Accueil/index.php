<?php $this->titre = "Billet Simple pour l'Alaska"; ?>

<!--Parallax Accueil-->

<section class="imageBackG mbr-fullscreen mbr-parallax-background" id="header2-7">
    <div class="container align-center">
        <div class="row justify-content-md-center">
            <div class="mbr-white col-md-10">
                <h1 class="mbr-section-title mbr-bold pb-3 mbr-fonts-style display-1">
                    Billet simple pour l'Alaska</h1>
                <h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-2">Un livre de Jean
                    Forteroche</h3>
            </div>
        </div>
    </div>
    <div class="mbr-arrow hidden-sm-down" aria-hidden="true">
        <a href="#next">
            <i class="mbri-down mbr-iconfont"></i>
        </a>
    </div>
</section>

<?php foreach ($billets as $billet): ?>
    <section class=" content_design_1 display-7">
    <div class="container">
        <article class="text">
            <header>
                <h1 class="titreBillet"><?= $this->nettoyer($billet['titre']) ?></h1>
                <time>Créé <?= $this->nettoyer($billet['date']) ?></time>
            </header>
            <br>
            <p><?= $this->tronquer($billet['contenu']) ?></p>
            <a class="btn btn-primary btn-sm" href="<?= "billet/index/" . $this->nettoyer($billet['id']) ?>">Lire la
                suite
            </a>
        </article>

    </div>
</section>
<?php endforeach; ?>


