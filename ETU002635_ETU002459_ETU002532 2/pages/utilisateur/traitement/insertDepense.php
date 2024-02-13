<?php
    include("../../../inc/function_utilisateur.php");
    $date = $_POST["date"];
    $id_categorie = $_POST["id_categorie"];
    $montant = $_POST["montant"];
    insert_dépenses($id_categorie,$date,$montant);
    echo "success";
?>