<?php

require_once("../database/connexion.php") ;
if(isset($_POST["valider"])){
    if(isset($_POST['nom']) AND isset($_POST['image']) AND isset($_POST['description']) AND isset($_POST['prix'])){

        $nom = htmlspecialchars(strip_tags($_POST['nom'])) ;
        $image = htmlspecialchars(strip_tags($_POST['image'])) ;
        $description = htmlspecialchars(strip_tags($_POST['description'])) ;
        $prix = htmlspecialchars(strip_tags($_POST['prix'])) ; 
        $sql = "INSERT INTO produits(nom,`image`,`description`,prix) VALUES(:nom,:image,:description,:prix)" ;
        
        $requete = $connexion->prepare($sql) ;
        $requete->bindValue(':nom',$nom,PDO::PARAM_STR);
        $requete->bindValue(':image',$image, PDO::PARAM_STR) ;
        $requete->bindValue('description',$description,PDO::PARAM_STR) ;
        $requete->bindValue(':prix',$prix, PDO::PARAM_INT);

        $requete->execute() ;
        header("Location:../index.php") ;

    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enregistrement produits</title>

    <link rel="stylesheet" href="../CSS/style.css">


</head>
<body>

    <div>
        <form method="post">
            <label for="nom">Nom de l'article</label>
            <input type="text" name="nom" id="nom" required>   <br>
            <label for="image">Image</label>
            <input type="text" name="image" id="image" required> <br>
            <label for="description">Description </label>
            <textarea name="description" required></textarea> <br>
            <label for="prix">Prix</label>
            <input type="number" name="prix" id="prix" required>
            <button type="submit" name="valider">Ajouter un produit </button> 
        </form>
        
    </div>

    

    
</body>
</html>