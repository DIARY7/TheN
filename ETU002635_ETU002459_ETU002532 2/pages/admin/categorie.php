<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parcelle</title>
    <?php include("../link.html"); ?>
</head>
<body>
    <?php include("nav.php"); ?>
    <div class="container">
        <div class="row" style="margin-top: 5%;">
            <div class="col-md-3">
                
            </div>
            <div class="col-md-6" style="box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);border-radius: 5%;padding: 3%;">
                <h4>Insertion de categorie</h4>
                <form action="traitement/insertion_categorie.php" method="get">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="nom" id="floatingInput" placeholder="Categorie">
                        <label for="floatingInput">Categorie</label>
                    </div>
                    <button style="margin-top: 5%;" type="submit" class="btn btn-outline-primary">Inserer</button>
                </form>
            </div>
        </div>
    </div>
    <?php include("../footer.php") ?>
</body>
</html>