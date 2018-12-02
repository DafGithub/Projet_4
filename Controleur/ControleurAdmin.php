<?php

require_once 'ControleurSecurise.php';
require_once 'Modele/Billet.php';
require_once 'Modele/Commentaire.php';

/**
 * Contrôleur des actions d'administration
 *
 * @author Baptiste Pesquet
 */
class ControleurAdmin extends ControleurSecurise
{
    private $billet;
    private $commentaire;

    /**
     * Constructeur
     */
    public function __construct()
    {
        $this->billet = new Billet();
        $this->commentaire = new Commentaire();
        $this->is_admin = true;
    }

    public function index()
    {
        $billets = $this->billet->getBillets();
        $nbBillets = $this->billet->getNombreBillets();
        $commentaires = $this->commentaire->getCommentaires('idBillet');
        $nbCommentaires = $this->commentaire->getNombreCommentaires();
        $login = $this->requete->getSession()->getAttribut("login");
        $this->genererVue(array('nbBillets' => $nbBillets, 'nbCommentaires' => $nbCommentaires,
            'login' => $login, 'billets' => $billets, 'commentaires' => $commentaires));

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

}