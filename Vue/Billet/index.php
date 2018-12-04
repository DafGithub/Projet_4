<?php $this->titre = "B.S.P.L.A - " . $this->nettoyer($billet['titre']); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="title col-12 col-lg-8">
            <h1 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">
                <a href=""><?= $this->nettoyer($billet['titre']) ?></a>
            </h1>
            <h2 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-7">
                <time> Date de création : <?= $this->nettoyer($billet['date']) ?></time>
            </h2>
        </div>
    </div>
</div>
<section class="cid-ragOec71Mi">
    <div class="container">
        <div class="media-container-row">
            <div class="col-12 col-md-8">
                <div class="media-container-row">
                    <div class="media-content">
                        <div class="mbr-section-text">
                            <p class="mbr-text align-right mb-0 mbr-fonts-style display-7">
                                <article>
                            <p><?= $this->nettoyer($billet['contenu']) ?></p>
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

<section class="cid-ragOec71Mi">
    <div class="container">
        <div class="media-container-row">
            <div class="col-12 col-md-8">
                <div class="media-container-row">
                    <div class="media-content">
                        <div class="mbr-section-text">
                            <p class="mbr-text align-right mb-0 mbr-fonts-style display-7">
                            <hr/>
                            <header>
                                <h4 id="titreReponses">Réponses à <?= $this->nettoyer($billet['titre']) ?></h4>
                            </header>
                            <?php foreach ($commentaires as $commentaire): ?>
                                <p class="date"><?= $this->nettoyer($commentaire['date']) ?> </p>
                                <p><strong><?= $this->nettoyer($commentaire['auteur']) ?> : </strong></p>
                                <p class="blockquote-footer"><?= $this->nettoyer($commentaire['contenu']) ?></p>
                                <a class="btn-form" href="billet/signalerCommentaire/<?= $commentaire['id'] ?>"
                                   role="button">Signaler</a>
                                <hr/>
                            <?php endforeach; ?>
                            <hr/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="cid-ragOec71Mi">
    <div class="container">
        <div class="media-container-row">
            <div class="col-12 col-md-8">
                <div class="media-container-row">
                    <div class="media-content">
                        <div class="mbr-section-text">
                            <p class="mbr-text align-right mb-0 mbr-fonts-style display-7">
                            <form class="mbr-form" method="post" action="billet/commenter">
                                <label class="form-control-label mbr-fonts-style display-7" for="auteur">Pseudo
                                    :</label>
                                <input id="auteur" name="auteur" type="text" placeholder="" required
                                       class="form-control"/><br/>

                                <label class="form-control-label mbr-fonts-style display-7" for="txtCommentaire">Commentaire
                                    :</label>
                                <textarea id="txtCommentaire" name="contenu" rows="4"
                                          placeholder="" required class="form-control"></textarea><br/>
                                <input type="hidden" name="id" value="<?= $billet['id'] ?>"/>

                                <div class="row justify-content-center">
                                    <span class="input-group-btn">
                                        <button href="" type="submit" class="btn btn-primary btn-form display-4">Commenter</button>
                                    </span>
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
