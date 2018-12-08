<?php $this->titre = "Billet Simple pour l'Alaska"; ?>

<!--Parallax Accueil-->

<section class="cid-ragO0rhJFI mbr-fullscreen mbr-parallax-background" id="header2-7">
    <div class="container align-center">
        <div class="row justify-content-md-center">
            <div class="mbr-white col-md-10">
                <h1 class="mbr-section-title mbr-bold pb-3 mbr-fonts-style display-1">
                    Billet simple pour l'Alaska</h1>
                <h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-2">Jean
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
<section class="mbr-section content7 cid-ragOec71Mi" id="content7-8">
    <div class="container">
        <div class="media-container-row">
            <div class="col-12 col-md-8">
                <div class="media-container-row">
                    <div class="media-content">
                        <div class="mbr-section-text">
                            <article class="boundaries">
                                <header>
                                    <h1 class="titreBillet"><?= $this->nettoyer($billet['titre']) ?></h1>
                                    <time><?= $this->nettoyer($billet['date']) ?></time>
                                </header>
                                <p><?= $billet['contenu'] ?></p>
                                <a href="<?= "billet/index/" . $this->nettoyer($billet['id']) ?>"><p>Commentaires</p>
                                </a>
                            </article>
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


