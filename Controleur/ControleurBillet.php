<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Billet.php';
require_once 'Modele/Commentaire.php';
require_once 'Modele/Signalement.php';
require_once 'Framework/Session.php';



/**
 * Contrôleur des actions liées aux billets
 *
 * @author Baptiste Pesquet
 */
class ControleurBillet extends Controleur
{

    private $billet;
    private $commentaire;
    private $signalement;

    /**
     * Constructeur
     */
    public function __construct()
    {
        $this->billet = new Billet();
        $this->commentaire = new Commentaire();
        $this->signalement = new Signalement();

    }

    // Affiche les détails sur un billet
    public function index()
    {
        $idBillet = $this->requete->getParametre("id");
        $billet = $this->billet->getBillet($idBillet);
        $commentaires = $this->commentaire->getCommentaires($idBillet);
        $this->genererVue(array('billet' => $billet, 'commentaires' => $commentaires));
    }

    // Ajoute un commentaire sur un billet
    public function commenter()
    {
        $idBillet = $this->requete->getParametre("id");
        $auteur = $this->requete->getParametre("auteur");
        $contenu = $this->requete->getParametre("contenu");

        /* if($contenu trop grand)
 //flash error
             else*/
        $this->commentaire->ajouterCommentaire($auteur, $contenu, $idBillet);
        $this->setFlash('success', 'Le commentaire vient d\'être mis en ligne');

        // Exécution de l'action par défaut pour réafficher la liste des billets
        $this->executerAction("index");
    }

    public function signalerCommentaire()
    {

        $idCom = $this->requete->getParametre('id');
        $commentaire = $this->commentaire->getCommentaire($idCom);
        $idBillet = $commentaire['billetId'];
        $this->signalement->signaler($idCom, $idBillet);

//      $_SESSION['message'] = "Le commentaire vient d'être signalé";

        $this->setFlash('danger', 'Le commentaire vient d\'être signalé');

        $this->rediriger('billet', 'index', $commentaire['billetId']);
    }
}

