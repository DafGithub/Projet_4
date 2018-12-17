<?php $this->titre = "Mon Blog - " . $this->nettoyer($billet['titre']); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="title col-12 col-lg-8">
            <h1 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">
                <a href="admin"><?= $this->nettoyer($billet['titre']) ?></a>
            </h1>
            <h2 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">
                <time> Dernière mise à jour : <?= $this->nettoyer($billet['date']) ?></time>
            </h2>
        </div>
    </div>
</div>
<section class="content_design_1">
    <div class="container">
        <form class="mbr-form" method="post" action="">
            <label class="form-control-label mbr-fonts-style display-7" for="titre">Titre
                :</label>
            <input id="auteur" name="titre" type="text" placeholder="" required
                   class="form-control" value="<?= $this->nettoyer($billet['titre']) ?>"/><br/>

            <label class="form-control-label mbr-fonts-style display-7" for="txtCommentaire">Texte
                :</label>
            <textarea id="contenu" name="contenu" rows="10" placeholder="" required
                      class="form-control"><?= $this->nettoyer($billet['contenu']) ?></textarea><br/>

            <div class="mbr-form align-center">
                <span class="input-group-btn">
                    <button href="" type="submit" class="btn btn-primary btn-form display-4">Mettre à jour</button>
                    <input type="hidden" name="id" value="<?= $billet['id'] ?>"/></span>
                <span class="input-group-btn"><a class="btn btn-secondary btn-form display-4"
                                                 href="admin/supprimerBillet/<?= $billet['id'] ?>" role="button">Supprimer</a></span>

            </div>
        </form>
    </div>
</section>

<!--<section class="content_design_1 display-7">-->
<!--    <div class="container">-->
<!--        <article class="text">-->
<!--            <p>--><? //= $billet['contenu'] ?><!--</p>-->
<!--        </article>-->
<!--    </div>-->
<!--</section>-->

<section class="content_design_1">
    <div class="container">
        <hr/>
        <header>
            <h4 id="titreReponses">Commentaires :</h4>
        </header>
        <?php foreach ($commentaires as $commentaire): ?>
            <p class="date"><?= $this->nettoyer($commentaire['date']) ?> </p>
            <p><strong><?= $this->nettoyer($commentaire['auteur']) ?> : </strong></p>
            <p class="blockquote-footer"><?= $this->nettoyer($commentaire['contenu']) ?></p>
            <div class="btn-group-sm mbr-form">
        <span class="input-group-btn"><a class="btn btn-secondary btn-sm"
                                         href="admin/supprimerCommentaire/<?= $commentaire['id'] ?>"
                                         role="button">Supprimer</a></span>
            </div>
            <hr/>
        <?php endforeach; ?>
    </div>
</section>