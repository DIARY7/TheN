<?php
    include("../../../inc/function_admin.php");
    
    //intialisation du test d'erreur
    $error=false;
    for($i=0;$i<4;$i++){
        $erreur[$i]=0;
    }
    $valeur[0]=$_POST['nom'];
    $valeur[1]=$_POST['rendement'];
    $valeur[2]=$_POST['occupation'];
    $valeur[3]=$_POST['vente'];

    //analyse des donnees
    if($_POST['nom']==""){
        $error=true;
        $erreur[0]=1;
    }
    if($_POST['rendement']==""){
        $error=true;
        $erreur[1]=1;
    }
    if($_POST['occupation']==""){
        $error=true;
        $erreur[2]=1;
    }
    if($_POST['vente']==""){
        $error=true;
        $erreur[3]=1;
    }

    $regeneration="";
    $count=0;
    for($i=0;$i<12;$i++){
        if(isset($_POST['mois'.$i])){
            if($count==0){
                $regeneration=$_POST['mois'.$i];
                $count++;
            }
            else{
                $regeneration=$regeneration.",".$_POST['mois'.$i];
            }
        }
    }
    if($count==0){
        $error=true;
    }

    //renvoi vers le formulaire si il y a erreur sinon insertion
    if($error){
        $string=implode(",",$erreur);
        $value=implode(",",$valeur);
        echo "erreur";
        //header('location: ../insertion_the.php?error='.$string.'&value='.$value);
    }
    else{
        $regen=explode(",",$regeneration);
        insertThe($_POST['nom'],$_POST['occupation'],$_POST['rendement'],$_POST['vente']);
        insertRegeneration($regen);
        echo "Insertion reussi";
        //header('location: ../insertion_the.php');
    }
?>