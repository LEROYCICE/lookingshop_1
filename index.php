<?php 

require_once("database/connexion.php");

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
    <title>Document</title>
    <link rel="stylesheet" href="CSS/style.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body>
    <header>
        <div class="container">
            <h2>Looking shop</h2>
            <p> <a href="admin/index.php" style="color: white; text-decoration:none"> se connecter </a></p>
            <i class="bi bi-cart"></i>
            <i class="bi bi-x-lg"></i>
            <i class="bi bi-file-x-fill"></i>
            <i class="bi bi-file-x"></i>
            <i class="bi bi-plus-circle"></i>
            <i class="bi bi-dash-circle"></i>
            <i class="bi bi-pencil-fill"></i>
            <i class="bi bi-list"></i>
            <i class="bi bi-chevron-up"></i>
            <i class="bi bi-envelope"></i>
            <i class="bi bi-telephone"></i>
            <i class="bi bi-whatsapp"></i>
            <i class="bi bi-geo-alt"></i>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <h2>LOOKING SHOP</h2>
            <P> Looking shop est une boutique sise à Lomé-Agbalépédo , spécialisé dans la ventes des 
                vetements . Elle dispose à son sein des pagnes ;  des t-shirts sans ou avec dessin ; des chaussures pour
                les hommes et les femmes ,  des bijoux comme coliers et autres .
            </P>

            <h1> Nos articles </h1>
            
        </div>
    </div>
    <div class="container-1">
        <div class="row-1">
            <div class="column-1">

                <?php foreach($Produits as $produit): ?>
                <div class="column-11">
                    <h3><?=$produit['nom'] ?></h3>
                    <img src="<?= $produit['image'] ?>" >
                    <p><?= $produit['description'] ?></p>
                    <div class="div-prix">
                        <button>Acheter</button>
                        <button><?= $produit['prix'] ?>&nbsp; FCFA</button>
                    </div>
                </div>
                <?php endforeach ;?>

            </div>
        </div>
    </div>

    
</body>
</html>