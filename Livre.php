<?php
class livre
{
    public function getLivres()
    {

        global $oPDO;
        $oPDOStatement = $oPDO->query("Select id,titre,auteur,annee from livre order by id ASC");
        $livres = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);
        return $livres;
    }
    public function getLivreById($id)
    {
        global $oPDO;
        $oPDOStatement = $oPDO->prepare("Select id,titre,auteur,annee from livre where id = :id");
        $oPDOStatement->bindParam(':id', $id, PDO::PARAM_INT);
        $oPDOStatement->execute();
        $livre = $oPDOStatement->fetch(PDO::FETCH_ASSOC);
        return $livre;
    }
    public function ajouterLivre($livre)
    {
        global $oPDO;
        //preparation de la requette
        $oPDOStatement = $oPDO->prepare("INSERT INTO livre SET titre=:titre, auteur=:auteur,annee=:annee");
        $oPDOStatement->bindParam(':titre', $livre['titre'], PDO::PARAM_STR);
        $oPDOStatement->bindParam(':auteur', $livre['auteur'], PDO::PARAM_STR);
        $oPDOStatement->bindParam(':annee', $livre['annee'], PDO::PARAM_INT);
        //executer la requette preparee
        $oPDOStatement->execute();
        //tester le nombre de ligne affectee
        if ($oPDOStatement->rowCount() <= 0) {
            return false;
        }
        return $oPDO->lastInsertId();
    }
    public function updatelivre($id, $data)
    {
        $livres = $this->getLivreById($id);
        if ($livres) {
            global $oPDO;
            $oPDOStatement = $oPDO->prepare("UPDATE livre SET titre=:titre, auteur=:auteur,annee=:annee WHERE id=:id");
            $oPDOStatement->bindParam(':titre', $data['titre'], PDO::PARAM_STR);
            $oPDOStatement->bindParam(':auteur', $data['auteur'], PDO::PARAM_STR);
            $oPDOStatement->bindParam(':annee', $data['annee'], PDO::PARAM_INT);
            $oPDOStatement->bindParam(':id', $data['id'], PDO::PARAM_INT);
            //executer la requette preparee
            $oPDOStatement->execute();
            //tester le nombre de ligne affectee
            $livres = $oPDOStatement->fetch(PDO::FETCH_ASSOC);
            return $livres;
        }
    }

    public function deleteLivreById($id,$data)
    {
        $livres = $this->getLivreById($id);
        if ($livres) {
            global $oPDO;
            $oPDOStatement = $oPDO->prepare("DELETE FROM livre WHERE id=:id");
            $oPDOStatement->bindParam(':id', $data['id'], PDO::PARAM_INT);
            //executer la requette preparee
            $result = $oPDOStatement->execute();
            //tester le nombre de ligne affectee

            return "livre " . $livres[$id] . " supprimer";
        } else {
            return "Livre introuvable";
        }
    }
}
