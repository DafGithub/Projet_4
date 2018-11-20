<?php $this->titre = "Mon Blog"; ?>

<?php foreach ($billets as $billet):
    ?>
    <article>
        <header>
                <h1 class="titreBillet"><?= $this->nettoyer($billet['titre']) ?></h1>
            <time><?= $this->nettoyer($billet['date']) ?></time>
        </header>
        <p><?= $this->nettoyer($billet['contenu']) ?></p>
        <a href="<?= "billet/index/" . $this->nettoyer($billet['id']) ?>"><p>Commentaires</p></a>
    </article>
    <hr/>
<?php endforeach; ?>