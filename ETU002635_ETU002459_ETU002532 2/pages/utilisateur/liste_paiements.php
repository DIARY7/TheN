<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("../link.html"); ?>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            height: 100vh;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin: auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            opacity: 0;
            animation: fadeIn 1.5s ease-in-out forwards;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #00885a;
            color: #fff;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }   
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
    <title>Page de Paiements</title>
    <script  type="text/javascript" src="traitement/controle.js" >
    </script> 
</head>
<body>
    <?php include("nav.php"); ?>
    <div class="form-container">
        <h2>Date Paiements</h2>
        <form id="form">
            <div class="form-group">
                <label for="date">Date min :</label>
                <input type="date" id="datemin" name="datemin" required>
                <label for="date">Date max :</label>
                <input type="date" id="datemax" name="datemax" required>
            </div>
            <div class="form-group">
                <button type="submit" onclick="getResultatPaiement(); return false;">Valider</button>
            </div>
        </form>
    </div>  
    <table id="table">
      
    </table>
    <?php include("../footer.php"); ?>
</body>
</html>
