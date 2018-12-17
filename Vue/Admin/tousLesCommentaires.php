<div class="container">
    <div class="row justify-content-center">
        <div class="title col-12 col-lg-8">
            <h1 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">
                <a title="Retour page Admin" href="admin">Administration</a>
            </h1>
            <h2 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">
                Liste des commentaires :
            </h2>
            <div class="row justify-content-center">
                <div class="mbr-form">
                        <span class="input-group-btn">
                             <a class="btn btn-primary btn-form display-4" id="lienDeco" href="connexion/deconnecter"
                                role="button">Se déconnecter</a>
                        </span>
                </div>
            </div>
            <br>
            <?php foreach ($commentaires as $commentaire): ?>
                <p><?= $this->nettoyer($commentaire['dateCom']) ?></p>
                <p><?= $this->nettoyer($commentaire['auteurCom']) ?></p>
                <p><?= $this->nettoyer($commentaire['contenuCom']) ?></p>
                <p>
                    <small> Commentaire de : <span
                                class="font-italic"><?= $this->nettoyer($commentaire['titreBil']) ?></span></small>
                </p>
                <div class="btn-group-sm mbr-form">
                    <span class="input-group-btn"><a
                                href="<?= "billet/index/" . $this->nettoyer($commentaire['idBillet']) ?>"
                                class="btn btn-primary btn-sm">Afficher l'
                        article</a></span>
                    <span class="input-group-btn"><a
                                href="<?= "admin/supprimerCommentaire/" . $this->nettoyer($commentaire['idCom']) ?>"
                                class="btn btn-secondary btn-sm">
                        Supprimer le commentaire </a></span>
                </div>
                <hr>

            <?php endforeach; ?>

        </div>
    </div>