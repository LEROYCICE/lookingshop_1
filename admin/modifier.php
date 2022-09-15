<?php

require_once("../database/connexion.php") ;

if($_GET['id'] AND !(empty($_GET['id']))) {

    $id = strip_tags($_GET['id']) ;

    $sql = "SELECT * FROM produits where id = :id";

    $requete = $connexion->prepare($sql) ;

    $requete->bindValue(':id',$id, PDO::PARAM_INT) ;
    $requete->execute() ;
    $produit = $requete->fetch(PDO::FETCH_ASSOC);

    if($produit){

        $nom = strip_tags($_POST['nom']) ;
        $image = strip_tags($_POST['image']) ;
        $description = strip_tags($_POST['description']) ;
        $prix = strip_tags($_POST['prix']) ;

        $sql = "UPDATE produits SET nom =:nom , image=:image , description=:description , prix=:prix WHERE id = :id" ;
        $requete = $connexion->prepare($sql) ;
        
        $requete->bindValue(':id',$id,PDO::PARAM_INT) ;
        $requete->bindValue(':nom',$nom,PDO::PARAM_STR);
        $requete->bindValue(':image',$image,PDO::PARAM_STR);
        $requete->bindValue(':description',$description,PDO::PARAM_STR);
        $requete->bindValue(':prix', $prix, PDO::PARAM_INT);

        $requete->execute();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification produits</title>

    <link rel="stylesheet" href="../CSS/style.css">


</head>
<body>

    <div>
        <form method="post">
            <label for="nom">Nom de l'article</label>
            <input type="text" name="nom" id="nom" value="<?= $produit['nom'] ?>" required>   <br>
            <label for="image">Image</label>
            <input type="text" name="image" id="image" value="<?= $produit['image'] ?>" required> <br>
            <label for="description">Description </label>
            <textarea name="description" required><?= $produit['description'] ?></textarea> <br>
            <label for="prix">Prix</label>
            <input type="number" name="prix" id="prix" required value="<?= $produit['prix'] ;?>">
            <button type="submit" name="valider" >Modifier un produit </button> 
        </form>
        
    </div>

    

    
</body>
</html>