<?php $this->titre = "B.S.P.L.A - " . $this->nettoyer($billet['titre']); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="title col-12 col-lg-8">
            <h1 class="mbr-section-title align-center pb-4 mbr-fonts-style display-">
                <a href=""><?= $this->nettoyer($billet['titre']) ?></a>
            </h1>
            <h2 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-7">
                <time> Date de création : <?= $this->nettoyer($billet['date']) ?></time>
            </h2>
        </div>
    </div>
</div>
<section class="content_design_1">
    <div class="container">
        <article class="text">
            <p><?= $billet['contenu'] ?></p>
        </article>
    </div>
</section>


<div class="row justify-content-center">
    <button class=" btn btn-primary btn-sm scrollDown">Commenter l'article</button>
</div>


<section class="content_design_1">
    <div class="container">
        <div class="media-container-row">
            <div class="col-12 col-md-10">
                <header>
                    <h4>Commentaires :</h4>
                </header>
                <hr/>
                <?php foreach ($commentaires as $commentaire): ?>
                    <p class="date"><?= $this->nettoyer($commentaire['date']) ?> </p>
                    <p><strong><?= $this->nettoyer($commentaire['auteur']) ?> : </strong></p>
                    <p class="blockquote-footer"><?= $this->nettoyer($commentaire['contenu']) ?></p>
                    <a class="btn-form" href="billet/signalerCommentaire/<?= $commentaire['id'] ?>"
                       role="button">Signaler</a>
                    <hr/>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
</section>
<section class="content_design_1 down">
    <div class="container">
        <div class="media-container-row">
            <div class="col-12 col-md-10">
                <form class="form" method="post" action="billet/commenter">
                    <label class="form-control-label mbr-fonts-style display-7" for="auteur">Pseudo :</label>
                    <input id="auteur" name="auteur" type="text" placeholder="" required
                           class="form-control"/><br/>
                    <label class="form-control-label mbr-fonts-style display-7" for="txtCommentaire">Commentaire
                        :</label>
                    <textarea id="txtCommentaire" name="contenu" rows="4"
                              placeholder="" required class="form-control"></textarea><br/>
                    <input type="hidden" name="id" value="<?= $billet['id'] ?>"/>

                    <div class="row justify-content-center">
                            <span class="input-group-btn">
                                <button href="" type="submit" class="btn btn-primary">Commenter</button>
                            </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
