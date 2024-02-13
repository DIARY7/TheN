<!DOCTYPE html>
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
            <div class="col-md-6" style="box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);border-radius: 5%;padding: 3%;">
                <table class="table table-hover" id="donnees">

                </table>
            </div>
            <div class="col-md-1">

            </div>
            <div class="col-md-5" style="box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);border-radius: 5%;padding: 3%;">
                <h4>Insertion de cueilleur</h4>
                <form id="formulaire" action="traitement/insertion_cueilleur.php" method="get">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="nom" id="floatingInput" placeholder="Nom">
                        <label for="floatingInput">Nom</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" name="ddn" id="floatingInput" placeholder="Date de naissance">
                        <label for="floatingInput">Date de naissance</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="genre" id="exampleRadios1" value="masculin" checked>
                        <label class="form-check-label" for="exampleRadios1">
                            Masculin
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="genre" id="exampleRadios2" value="feminin">
                        <label class="form-check-label" for="exampleRadios2">
                            Feminin
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="genre" id="exampleRadios2" value="N/A">
                        <label class="form-check-label" for="exampleRadios2">
                            N/A
                        </label>
                    </div>
                    <button style="margin-top: 5%;" type="submit" class="btn btn-outline-primary">Inserer</button>
                </form>
            </div>
        </div>
    </div>
    <?php include("../footer.php"); ?>
</body>
<script src="script.js"></script>
<script>
    getDonneesBase("traitement/get_cueilleur.php",showCueilleur);
    window.addEventListener('load',sendForm("traitement/insertion_cueilleur.php","formulaire",getDonneesBase,"traitement/get_cueilleur.php",showCueilleur));
</script>
</html>