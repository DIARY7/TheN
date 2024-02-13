<?php
    include("../../../inc/function_admin.php");
    
    //intialisation du test d'erreur
    $error=false;
    $valeur=array();
    for($i=0;$i<3;$i++){
        $erreur[$i]=0;
    }
    $valeur[0]=$_POST['nom'];
    $valeur[1]=$_POST['genre'];
    $valeur[2]=$_POST['ddn'];

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
        echo "erreur";
        //header('location: ../cueilleur.php?error='.$string.'&value='.$value);
    }
    else{
        insertCueilleurs($_POST['nom'],$_POST['genre'],$_POST['ddn']);
        echo "insertion reussi";
        //header('location: ../insertion_cueilleur.php');
    }
?>