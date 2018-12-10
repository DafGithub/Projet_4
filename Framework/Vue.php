<?php

require_once 'Configuration.php';

/**
 * Classe modélisant une vue.
 *
 * @author Baptiste Pesquet
 */
class Vue
{
    /** Nom du fichier associé à la vue */
    private $fichier;

    /** Titre de la vue (défini dans le fichier vue) */
    private $titre;

    /**
     * @var bool
     */
    private $is_admin;

    private $flash = null;


    /**
     * Constructeur
     *
     * @param string $action Action à laquelle la vue est associée
     * @param string $controleur Nom du contrôleur auquel la vue est associée
     */
    public function __construct($action, $controleur = "", $is_admin = false)
    {
        // Détermination du nom du fichier vue à partir de l'action et du constructeur
        // La convention de nommage des fichiers vues est : Vue/<$controleur>/<$action>.php
        $fichier = "Vue/";
        if ($controleur != "") {
            $fichier = $fichier . $controleur . "/";
        }
        $this->fichier = $fichier . $action . ".php";
        $this->is_admin = $is_admin;
    }

    public function setFlash($flash)
    {
        $this->flash = $flash;
    }

    /**
     * Génère et affiche la vue
     *
     * @param array $donnees Données nécessaires à la génération de la vue
     */
    public function generer($donnees)
    {
        // Génération de la partie spécifique de la vue
        $contenu = $this->genererFichier($this->fichier, $donnees);
        // On définit une variable locale accessible par la vue pour la racine Web
        // Il s'agit du chemin vers le site sur le serveur Web
        // Nécessaire pour les URI de type controleur/action/id
        $racineWeb = Configuration::get("racineWeb", "/");
        // Génération du gabarit commun utilisant la partie spécifique
        $template = ($this->is_admin) ? 'Vue/gabaritBack.php' : 'Vue/gabarit.php';
        /*if($this->is_admin === true){
            $template = 'Vue/gabaritBack.php' ;
        }  else{
            $template = 'Vue/gabarit.php' ;
        }*/
        $vue = $this->genererFichier($template,
            array('titre' => $this->titre, 'contenu' => $contenu, 'racineWeb' => $racineWeb, 'messageFlash' => $this->flash));
        // Renvoi de la vue générée au navigateur
        echo $vue;
    }

    /**
     * Génère un fichier vue et renvoie le résultat produit
     *
     * @param string $fichier Chemin du fichier vue à générer
     * @param array $donnees Données nécessaires à la génération de la vue
     * @return string Résultat de la génération de la vue
     * @throws Exception Si le fichier vue est introuvable
     */
    private function genererFichier($fichier, $donnees)
    {
        if (file_exists($fichier)) {
            // Rend les éléments du tableau $donnees accessibles dans la vue
            extract($donnees);
            // Démarrage de la temporisation de sortie
            ob_start();
            // Inclut le fichier vue
            // Son résultat est placé dans le tampon de sortie
            require $fichier;
            // Arrêt de la temporisation et renvoi du tampon de sortie
            return ob_get_clean();
        } else {
            throw new Exception("Fichier '$fichier' introuvable");
        }
    }

    /**
     * Nettoie une valeur insérée dans une page HTML
     * Doit être utilisée à chaque insertion de données dynamique dans une vue
     * Permet d'éviter les problèmes d'exécution de code indésirable (XSS) dans les vues générées
     *
     * @param string $valeur Valeur à nettoyer
     * @return string Valeur nettoyée
     */
    public function nettoyer($valeur)
    {
        // Convertit les caractères spéciaux en entités HTML
        return htmlspecialchars($valeur, ENT_QUOTES, 'UTF-8', false);
    }

    public function tronquer($valeur)
    {
        // Le nombre le lettres avant les ...
        $len = 500;
        if (strlen($valeur) >= $len) {
            $valeur = substr($valeur, 0, $len) . "...";
        }
        // On écrit la chaine modifiée
        return $valeur;
    }
}
