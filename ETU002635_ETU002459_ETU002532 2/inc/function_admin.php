<?php
    include("connexion.php");
    function getSelect($sql){
		$valiny=array();
		$all=mysqli_query(dbconnect(),$sql);
		while($bdd=mysqli_fetch_assoc($all))
		{
			$valiny[]=$bdd;
		}
		mysqli_free_result($all);
		return $valiny;
	}
    function loginAdmin($login,$pasword){
        $user=getSelect("select * from the_admin where login='".$login."' and password='".$pasword."'");
        return $user;
    }
    function insertThe($nom,$occupation,$rendement,$vente){
        $sql="insert into the_the(nom,occupation,rendement,prix_vente) values('".$nom."',".$occupation.",".$rendement.",".$vente.")";
        mysqli_query(dbconnect(),$sql);
    }
    function insertParcelle($numero,$surface,$the){
        $sql="insert into the_parcelle(numero,surface,id_the) values(".$numero.",".$surface.",".$the.")";
        mysqli_query(dbconnect(),$sql);
    }
    function insertCueilleurs($nom,$genre,$ddn){
        $sql="insert into the_cueilleurs(nom,genre,date_naissance) values('".$nom."','".$genre."','".$ddn."')";
        mysqli_query(dbconnect(),$sql);
    }
    function insertDepense($idcategorie,$dateDepense,$montant){
        //construction de la requete
        $sql="insert into the_depense(id_categorie,date_depense,montant) values(".$idcategorie.",'".$dateDepense."',".$montant.")";
        
        //envoi de ce requete
        mysqli_query(dbconnect(),$sql);
    }

    function getThe(){
        return getSelect("select * from the_the");
    }

    function updateSalaire($salaire){
        //Prendre la fichier config.xml
        $config=simplexml_load_file("../../../inc/config.xml");
        
        //changement de sa valeur
        $config->salaire=$salaire;
        
        //Sauvegardement
        $config->asXML("../../../inc/config.xml");
    }
    function updateBonus($bonus){
        //Prendre la fichier config.xml
        $config=simplexml_load_file("../../../inc/config.xml");
        
        //changement de sa valeur
        $config->bonus=$bonus;
        
        //Sauvegardement
        $config->asXML("../../../inc/config.xml");
    }
    function updateMallus($mallus){
        //Prendre la fichier config.xml
        $config=simplexml_load_file("../../../inc/config.xml");
        
        //changement de sa valeur
        $config->mallus=$mallus;
        
        //Sauvegardement
        $config->asXML("../../../inc/config.xml");
    }

    function updatePoidMin($poids){
        //Prendre la fichier config.xml
        $config=simplexml_load_file("../../../inc/config.xml");
        
        //changement de sa valeur
        $config->poid_min=$poids;
        
        //Sauvegardement
        $config->asXML("../../../inc/config.xml");
    }

    function updateParcelle($numero,$surface,$the,$id_parcelle){
        $sql="update the_parcelle set numero=".$numero.", surface=".$surface.", id_the=".$the." where id_parcelle=".$id_parcelle;
        mysqli_query(dbconnect(),$sql);
    }
    function getParcelle(){
        return getSelect("select * from the_parcelle natural join the_the");
    }
    function deleteCueilleur($id){
        $sql="delete from the_cueilleurs where id_cueilleur=".$id;
        mysqli_query(dbconnect(),$sql);
    }
    function getCueilleur(){
        return getSelect("select * from the_cueilleurs");
    }
    function getCategorie(){
        return getSelect("select * from the_categorie");
    }
    function insertCategorie($nom){
        $sql="insert into the_categorie(nom) values('".$nom."')";
        mysqli_query(dbconnect(),$sql);
    }
    function getLastId(){
        return getSelect("select max(id_the) as max from the_the");
    }
    function insertRegeneration($regeneration){
        $id=getLastId()[0]['max'];
        for($i=0;$i<count($regeneration);$i++){
            $sql="insert into the_regeneration (id_mois,id_the) values (".$id.",".$regeneration[$i].")";
            mysqli_query(dbconnect(),$sql);
        }
    }
?>