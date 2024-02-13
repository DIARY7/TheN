<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("../link.html") ?>
    <title>Saisie des Cueillettes</title>
    <style>
        body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
}

.form-container {
    max-width: 500px;
    margin: 50px auto;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 8px;
}

input, select {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    background-color: #00885a;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #006644;
}

    </style>
    <script  type="text/javascript" src="traitement/controle.js" >
    </script>
</head>
<body>
    <?php
        include("nav.php");
        include("../../inc/function_utilisateur.php");
        $catgoterie = getSelect("select * from the_categorie");
    ?>
    <div class="form-container">
        <h2>Depenses</h2>
        <form id="form">
            <div class="form-group">
                <label for="date">Date :</label>
                <input type="date" id="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="catgoterie$catgoterie">Categorie depenses :</label>
                <select id="id_categorie" name="id_categorie" required>
                    <option value=""> </option>
                    <?php 
                        for($i =0;$i < count($catgoterie);$i++){ ?>
                            <option value="<?php echo $catgoterie[$i]['id_categorie'] ;?>"><?php echo $catgoterie[$i]['nom'] ;?></option>
                    <?php   } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="montant">Montant :</label>
                <input type="number" id="montant" name="montant" step="0.01" required>
            </div>
            <div class="form-group">
                <button type="submit" onclick="AddDepense(); return false;">Enregistrer</button>
            </div>
        </form>
    </div>
    <?php
        include("../footer.php");
    ?>
</body>
</html>
