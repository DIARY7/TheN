<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("../link.html"); ?>
    <title>Admin Page</title>
    <style>
        body {
            background-color: #f8f9fa; /* Couleur de fond légère */
        }

        .admin-container {
            max-width: 600px;
            width: 100%;
            background-color: #ffffff; /* Fond blanc */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: auto;
            margin-top: 50px;
        }

        .admin-container img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-right: 20px;
            object-fit: cover;
        }

        .admin-content {
            text-align: left;
        }
    </style>
</head>
<body>
    <?php include("nav.php"); ?>
    
    <div class="container">
        <div class="admin-container">
            <img src="image/accueil1.jpg" alt="Admin Photo">
            <div class="admin-content">
                <h2 class="mb-4">Bienvenue, Admin!</h2>
                <p>Ceci est votre tableau de bord administrateur. N'hésitez pas à gérer et contrôler le système.</p>
            </div>
        </div>
    </div>
</body>
</html>
