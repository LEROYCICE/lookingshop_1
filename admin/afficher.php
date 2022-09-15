<?php 

    require_once('../database/connexion.php');

    $sql = "SELECT * FROM produits" ;
    $requete = $connexion->prepare($sql) ;
    $requete->execute() ;
    $Produits = $requete->fetchAll(PDO::FETCH_ASSOC) ;
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage des produits</title>
    <link rel="stylesheet" href="../CSS/style.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body>


    <table style="margin: 10px 20px;">
        <thead >
            <th>ID</th>
            <th>Nom</th>
            <th>Image</th>
            <th>Description</th>
            <th>Prix</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php foreach($Produits as $produit): ?>
            <tr style="line-height: 40px; ">
                <td> <?= $produit['id'] ?></td>
                <td> <?= $produit['nom'] ?></td>
                <td> <?= $produit['image'] ?></td>
                <td> <?= $produit['description'] ?></td>
                <td> <?= $produit['prix'] ?></td>
                <td>
                    <a href="modifier.php?id=<?= $produit['id'] ?>"><i class="bi bi-pencil-fill"></i></a>
                    <a href="supprimer.php?id=<?= $produit['id'] ?>"><i class="bi bi-file-x-fill"></i></a>
        
                </td>
            </tr>
            
            <?php endforeach ?>
            
        </tbody>

    </table>


    
</body>
</html>