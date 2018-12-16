<?php

require_once 'Framework/Modele.php';


class Commentaire extends Modele
{

// Renvoie la liste des commentaires associés à un billet
    public function getCommentaires($idBillet)
    {
        $sql = 'SELECT COM_ID as id, DATE_FORMAT(COM_DATE, \'le %d/%m/%Y à %k:%H:%s\') as date,'
            . ' COM_AUTEUR as auteur, COM_CONTENU AS contenu FROM T_COMMENTAIRE'
            . ' WHERE BIL_ID=?'
            . 'ORDER BY COM_ID DESC';
        $commentaires = $this->executerRequete($sql, array($idBillet));
        return $commentaires;
    }

    // Renvoie la liste de tous les commentaires
    public function getTousLesCommentaires()
    {
        $sql = 'SELECT C.COM_CONTENU AS contenuCom, C.COM_AUTEUR AS auteurCom, C.COM_ID AS idCom, C.COM_DATE AS dateCom,
        B.BIL_TITRE AS titreBil, B.BIL_ID AS idBillet, C.BIL_ID FROM T_COMMENTAIRE AS C, T_BILLET AS B WHERE B.BIL_ID=C.BIL_ID ORDER BY C.COM_DATE DESC';
        $commentaires = $this->executerRequete($sql);
        return $commentaires;
    }


    public function ajouterCommentaire($auteur, $contenu, $idBillet)
    {
        $sql = 'insert into T_COMMENTAIRE(COM_DATE, COM_AUTEUR, COM_CONTENU, BIL_ID)'
            . ' values(?, ?, ?, ?)';
        $date = date('Y-m-d H:i:s');
        $this->executerRequete($sql, array($date, $auteur, $contenu, $idBillet));
    }

    public function supprimerCommentaire($idCom)
    {
        $sql = 'DELETE FROM T_COMMENTAIRE WHERE COM_ID = :id;
                DELETE FROM T_SIGNAL WHERE COM_ID = :id';
        $resultat = $this->executerRequete($sql, ['id' => $idCom]);
        if ($resultat->rowCount() == 1)
            return true;
        else
            throw new Exception("Aucun commentaire ne correspond à l'identifiant '$idCom'");
    }


    /**
     * Renvoie le nombre total de commentaires
     *
     * @return int Le nombre de commentaires
     */
    public function getNombreCommentaires()
    {
        $sql = 'select count(*) as nbCommentaires from T_COMMENTAIRE';
        $resultat = $this->executerRequete($sql);
        $ligne = $resultat->fetch();  // Le résultat comporte toujours 1 ligne
        return $ligne['nbCommentaires'];
    }


    /**
     * @param $idCom
     */
    public function getCommentaire($idCom)
    {
        $sql = 'SELECT COM_ID as id, DATE_FORMAT(COM_DATE, \'le %d/%m/%Y à %k:%H:%s\') as date, BIL_ID AS billetId,'
            . ' COM_AUTEUR as auteur, COM_CONTENU AS contenu FROM T_COMMENTAIRE'
            . ' WHERE COM_ID= :id';

        $resultat = $this->executerRequete($sql, array('id' => $idCom));
        if ($resultat->rowCount() == 1)
            return $resultat->fetch();
        else
            throw new Exception("Aucun commentaire ne correspond à l'identifiant '$idCom'");
    }


}