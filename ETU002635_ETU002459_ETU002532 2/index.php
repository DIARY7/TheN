<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/bootstrap.min.js"></script>
    <title>Accueil</title>
</head>
<body>
   <!--  <?php include("nav.php"); ?> -->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="image/admin.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h1 style="color: black;">Utilisateur</h1>
              <p>Connectez vous en tant que Utilisateur~.</p>
              <div class="slider-btn">
                <form action="pages/utilisateur/login_utilisateur.php">
                    <button type="submit" class="btn btn-1">Connecter</button>    
                </form>
                </div>
            </div>
            </div>


        </div>
          <div class="carousel-item">
            <img src="image/utilisateur.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <p style="color: black;">Connectez vous en tant qu'administrateur.</p>
              <h1 style="color: black;">Administrateur</h1>
              <div class="slider-btn">
                <form action="pages/admin/loginAdmin.php">
                    <button type="submit" class="btn btn-1">Connecter</button>
                </form>
            </div>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
</body>

</html>