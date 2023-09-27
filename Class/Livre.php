<?php
class livre{
    public function getLivres()
    {
    
        global $oPDO;
        
        $oPDOStatement = $oPDO->query('SELECT id,titre,auteur,annee FROM livre ORDER BY id ASC');
        $livres = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);
        return $livres;

    }
    public function getLivreById()
    {
        global $oPDO;
        $oPDOStatement = $oPDO->prepare('SELECT id,titre,auteur,annee FROM livre WHERE id = :id');
        $oPDOStatement->bindParam(':id',$id,PDO::PARAM_INT);
        $oPDOStatement->execute();
        $livre = $oPDOStatement->fetch(PDO::FETCH_ASSOC);
        return $livre;
    }

    
    public function ajouterLivre($livre)
    {
        global $oPDO;
        //preparation de la requete
        $oPDOStatement = $sPDO->prepare('INSERT INTO livre2 SET titre=:titre,auteur=:auteur,annee=:annee');
        $oPDOStatement->bindParam(':titre',$livre['titre'],PDO::PARAM_STR);
        $oPDOStatement->bindParam(':auteur',$livre['auteur'],PDO::PARAM_STR);
        $oPDOStatement->bindParam(':annee',$livre['annee'],PDO::PARAM_INT);
        //execution de la requet preparer
        $oPDOStatement->execute();
        //test le nombre de line affectees
        if($oPDOStatement->rowCount()<=0)
        {
            return false;
        } 
        return $sPDO->lsatInsertId();
    }
    public function updateLivrebyId($id,$data){
        $livre = $this->getLivreById()
        if($livre){
            global $oPDO;
        }
         $oPDOStatement = $sPDO->prepare('UPDATE livre SET titre=:titre,auteur=:auteur,annee=:annee WHERE id = :id');
         $oPDOStatement->bindParam(':titre',$data['titre'],PDO::PARAM_STR);
         $oPDOStatement->bindParam(':auteur',$data['auteur'],PDO::PARAM_STR);
         $oPDOStatement->bindParam(':annee',$data['annee'],PDO::PARAM_INT);
         $oPDOStatement->bindParam(':id',$id,PDO::PARAM_INT);
         
         $oPDOStatement->execute();
         $livre = 
       
    }

    
}
?>