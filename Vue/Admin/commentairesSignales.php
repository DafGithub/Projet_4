<div class="container">
    <div class="row justify-content-center">
        <div class="title col-12 col-lg-8">
            <h1 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">
                <a title="Retour page Admin" href="admin">Administration</a>
            </h1>
            <h2 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">
                Liste des commentaires signalés :
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
            <?php foreach ($commentairesSignales as $commentaireSignale): ?>
                <p><?= $this->nettoyer($commentaireSignale['dateSig']) ?></p>
                <p><?= $this->nettoyer($commentaireSignale['auteurCom']) ?></p>
                <p><?= $this->nettoyer($commentaireSignale['contenuCom']) ?></p>

                <p>
                    <small> Article commenté : <span
                                class="font-italic"><?= $this->nettoyer($commentaireSignale['titreBil']) ?></span>
                    </small>
                </p>
                <div class="btn-group-sm">
                    <a href="<?= "billet/index/" . $this->nettoyer($commentaireSignale['idBillet']) ?>"
                       class="btn btn-outline-primary btn-sm">Afficher le
                        billet</a>
                    <a href="<?= "admin/supprimerSignalement/" . $this->nettoyer($commentaireSignale['idCom']) ?>"
                       class="btn btn-outline-danger btn-sm">
                        Supprimer le signalement</a>
                    <a href="<?= "admin/supprimerCommentaire/" . $this->nettoyer($commentaireSignale['idCom']) ?>"
                       class="btn btn-outline-danger btn-sm">
                        Supprimer le commentaire </a>
                </div>
                <hr>
            <?php endforeach; ?>

        </div>
    </div>