
<?php

try {
    
    $connexion = new PDO("mysql:host=localhost;dbname=lookingshop","root","") ;
    $connexion->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur".$e->getMessage();
}