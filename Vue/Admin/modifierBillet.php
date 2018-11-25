<?php $this->titre = "Mon Blog - " . $this->nettoyer($billet['titre']); ?>

<a href="admin/index"><h2>Administration</h2></a>

<article>
    <header>
        <h1 class="titreBillet"><?= $this->nettoyer($billet['titre']) ?></h1>
        <time><?= $this->nettoyer($billet['date']) ?></time>
    </header>
    <p><?= $this->nettoyer($billet['contenu']) ?></p>
</article>
<hr/>
<header>
    <h1 id="titreReponses">Réponses à <?= $this->nettoyer($billet['titre']) ?></h1>
</header>
<?php foreach ($commentaires as $commentaire): ?>
    <p class="date"><?= $this->nettoyer($commentaire['date']) ?> </p>
    <p><?= $this->nettoyer($commentaire['auteur']) ?> dit :</p>
    <p><?= $this->nettoyer($commentaire['contenu']) ?></p>
<?php endforeach; ?>
<hr/>
<a href="admin/supprimerBillet/<?= $billet['id'] ?>">Supprimer</a>

<form method="post" action="">
    <input id="titre" name="titre" type="text" value="<?= $this->nettoyer($billet['titre']) ?>"
           required/><br/>
    <textarea id="contenu" name="contenu" rows="4"
              required><?= $this->nettoyer($billet['contenu']) ?></textarea><br/>
    <input type="hidden" name="id" value="<?= $billet['id'] ?>"/>
    <input type="submit" value="Mettre à jour"/>
</form>