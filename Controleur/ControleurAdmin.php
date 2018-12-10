<?php

require_once 'ControleurSecurise.php';
require_once 'Modele/Billet.php';
require_once 'Modele/Commentaire.php';
require_once 'Modele/Signalement.php';

/**
 * Contrôleur des actions d'administration
 *
 * @author Baptiste Pesquet
 */
class ControleurAdmin extends ControleurSecurise
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

        $this->is_admin = true;
    }

    public function index()
    {
        $billets = $this->billet->getBillets();
        $nbBillets = $this->billet->getNombreBillets();
        $commentaires = $this->commentaire->getCommentaires('idBillet');
        $nbCommentaires = $this->commentaire->getNombreCommentaires();
        $nbSignalements = $this->signalement->getNombreSignalements();
        $login = $this->requete->getSession()->getAttribut("login");
        $this->genererVue(array('nbBillets' => $nbBillets, 'nbCommentaires' => $nbCommentaires,
            'login' => $login, 'billets' => $billets, 'commentaires' => $commentaires, 'nbSignalements' => $nbSignalements));

    }

    public function supprimerBillet()
    {
        $id = $this->requete->getParametre('id');
        $this->billet->supprimerBillet($id);
        $this->rediriger('admin');
    }

    public function supprimerCommentaire()
    {
        $id = $this->requete->getParametre('id');
        $this->commentaire->supprimerCommentaire($id);
        $this->rediriger('admin');
    }

    public function ajouterBillet()
    {
        $titre = $this->requete->getParametre('titre');
        $contenu = $this->requete->getParametre("contenu");
        $this->billet->ajouterBillet($titre, $contenu);
        $this->rediriger('admin');
    }


    public function modifierBillet()
    {
        $idBillet = $this->requete->getParametre("id");
        $billet = $this->billet->getBillet($idBillet);
        $commentaires = $this->commentaire->getCommentaires($idBillet);

        if ($this->requete->existeParametre('titre') &&
            $this->requete->existeParametre('contenu')) {
            $titre = $this->requete->getParametre('titre');
            $contenu = $this->requete->getParametre("contenu");
            $this->billet->modifierBillet($idBillet, $titre, $contenu);
            $this->rediriger('admin');
        }

        $this->genererVue(array('billet' => $billet, 'commentaires' => $commentaires));
    }


//    Affiche les commenttaires signalés
    public function commentairesSignales()
    {

        $commentairesSignales = $this->signalement->getCommentairesSignales();
        $this->genererVue(array('commentairesSignales' => $commentairesSignales));

    }

    public function supprimerSignalement()
    {
        $id = $this->requete->getParametre('id');
        $this->signalement->supprimerSignalement($id);
        $this->rediriger('admin', 'commentairesSignales');

    }

}