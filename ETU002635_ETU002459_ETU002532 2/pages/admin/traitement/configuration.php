<?php
    include("../../../inc/function_admin.php");
    
    //intialisation du test d'erreur
    $error=false;
    for($i=0;$i<4;$i++){
        $erreur[$i]=0;
    }
    $valeur[0]=$_GET['salaire'];
    $valeur[1]=$_GET['poid'];
    $valeur[2]=$_GET['bonus'];
    $valeur[3]=$_GET['mallus'];

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
        header('location: ../configuration.php?error='.$string.'&value='.$value);
    }
    else{
        updateSalaire($_GET['salaire']);
        updatePoidMin($_GET['poid']);
        updateBonus($_GET['bonus']);
        updateMallus($_GET['mallus']);
        header('location: ../accueil_admin.php');
    }
?>