<?php

function ajouter($nom, $image,$description,$prix){
    if(require("connexion.php")){
        $donne = "INSERT INTO produits(nom,`image`,`description`,prix) VALUES('$nom','$image','$description','$prix')" ;
        $requete = $connexion->prepare($donne) ;
        $requete->execute(array($nom,$image,$description,$prix)) ;
        $requete->closeCursor();

    }
}

function afficher(){
    if(require("connexion.php"))
        $donne = "SELECT * FROM produits ORDER BY id DESC" ;
        $requete = $connexion->prepare($donne) ;
        $data = $requete->fetchAll(PDO::FETCH_OBJ);
        return $data ;
        $requete->closeCursor();

}