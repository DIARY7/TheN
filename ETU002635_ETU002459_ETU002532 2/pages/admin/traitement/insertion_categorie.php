<?php
    include("../../../inc/function_admin.php");
    //intialisation du test d'erreur
    $error=false;
    for($i=0;$i<1;$i++){
        $erreur[$i]=0;
    }
    $valeur[0]=$_GET['nom'];

    //analyse des donnees
    for($i=0;$i<count($valeur);$i++){
        if($valeur[$i]==""){
            $error=true;
            $erreur[$i]=1;
        }
    }

    //renvoi vers le formulaire si il y a erreur sinon insertion
    if($error){
        $string=implode(",",$erreur);
        $value=implode(",",$valeur);
        header('location: ../categorie.php?error='.$string.'&value='.$value);
    }
    else{
        insertCategorie($_GET['nom']);
        header('location: ../categorie.php');
    }
?>