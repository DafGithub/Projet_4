<?php $this->titre = "Administration" ?>

<h2>Administration</h2>

Bienvenue, <?= $this->nettoyer($login) ?> !
Ce blog comporte <?= $this->nettoyer($nbBillets) ?> billet(s) et <?= $this->nettoyer($nbCommentaires) ?> commentaire(s).
<br>
<a id="lienDeco" href="connexion/deconnecter">Se déconnecter</a>
<br>

<h2>Billets</h2>

<?php foreach ($billets as $billet):
    ?>
    <article>
        <header>
            <h1 class="titreBillet"><?= $this->nettoyer($billet['titre']) ?> </h1>
            <time><?= $this->nettoyer($billet['date']) ?></time>
        </header>
        <p><?= $this->nettoyer($billet['contenu']) ?></p>
        <a href="<?= "admin/modifierBillet/" . $this->nettoyer($billet['id']) ?>">Modifier</a>
    </article>
    <hr/>
<?php endforeach; ?>


<?php foreach ($commentaires as $commentaire): ?>
    <p class="date"><?= $this->nettoyer($commentaire['date']) ?> </p>
    <p><?= $this->nettoyer($commentaire['auteur']) ?> dit :</p>
    <p><?= $this->nettoyer($commentaire['contenu']) ?></p>
<?php endforeach; ?>

<h2>Créer un billet</h2>

<form method="post" action="admin/ajouterbillet">

    <input id="titre" name="titre" type="text" placeholder="Titre du Billet"
           required/><br/>
    <textarea id="txtCommentaire" name="contenu" rows="20"
              placeholder="Votre texte" required></textarea><br/>
    <input type="hidden" name="id" value="<?= $billet['id'] ?>"/>
    <input type="submit" value="Créer"/>
</form>