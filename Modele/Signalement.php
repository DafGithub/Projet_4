<?php
require_once 'Framework/Modele.php';

class Signalement extends Modele
{
    /**
     * @return mixed
     */
    public function getNombreSignalements()
    {
        $sql = 'SELECT count(*) AS nbSignalements FROM T_SIGNAL';
        $resultat = $this->executerRequete($sql);
        $ligne = $resultat->fetch();  // Le résultat comporte toujours 1 ligne
        return $ligne['nbSignalements'];
    }

    /**
     * @param $idCom
     * @param $idBillet
     */
    public function signaler($idCom, $idBillet)
    {
        $sql = 'INSERT INTO T_SIGNAL(SIG_DATE, COM_ID, BIL_ID)'
            . ' VALUES(:date, :id, :bil_id)';
        $date = date('Y-m-d H:i:s');
        $this->executerRequete($sql, array('date' => $date, 'id' => $idCom, 'bil_id' => $idBillet));
    }


    /** Renvoie la liste des commmentaires signalés
     * @return PDOStatement
     */
    public function getCommentairesSignales()
    {
        $sql = 'SELECT C.COM_CONTENU AS contenuCom, C.COM_AUTEUR AS auteurCom, C.COM_ID AS idCom, S.SIG_DATE AS dateSig, 
        S.COM_ID as idComSig, S.BIL_ID AS idBillet FROM T_COMMENTAIRE AS C, T_SIGNAL AS S WHERE C.COM_ID=S.COM_ID ORDER BY S.SIG_DATE DESC';
        $commentairesSignales = $this->executerRequete($sql);
        return $commentairesSignales;
    }

    /**
     * @param $id
     * @return bool
     * @throws Exception
     */
    public function supprimerSignalement($id)
    {
        $sql = 'DELETE FROM T_SIGNAL WHERE COM_ID = :id';
        $resultat = $this->executerRequete($sql, ['id' => $id]);
        if ($resultat->rowCount() > 0)
            return true;
        else
            throw new Exception("Aucun commentaire ne correspond à l'identifiant '$id'");
    }


}