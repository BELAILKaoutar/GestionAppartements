<?php
session_start();
include 'config.php';

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['idPers']) || $_SESSION['role'] !== 'L') {
    // Rediriger l'utilisateur vers la page de connexion s'il n'est pas connecté ou s'il n'a pas le rôle de locataire
    header("Location: login.php");
    exit();
}

// Vérifier si l'ID de l'appartement est présent dans l'URL
if (isset($_GET['idApp'])) {
    // Récupérer l'ID de l'appartement depuis l'URL
    $idApp = $_GET['idApp'];

    // Requête pour récupérer les détails de l'appartement à partir de son ID
    $query = "SELECT * FROM appartement WHERE idApp = $idApp";
    $result = mysqli_query($conn, $query);

    // Vérifier si l'appartement existe
    if (mysqli_num_rows($result) > 0) {
        $appartement = mysqli_fetch_assoc($result);

        // Traitement du formulaire de réservation
        if (isset($_POST['submit'])) {
            $date_debut = mysqli_real_escape_string($conn, $_POST['date_debut']);
            $date_fin = mysqli_real_escape_string($conn, $_POST['date_fin']);

            // Insérer les données de la réservation dans la table reservation
            $sql = "INSERT INTO reservation (idApp, idPers, date_debut, date_fin) VALUES ('$idApp', '{$_SESSION['idPers']}', '$date_debut', '$date_fin')";
            if (mysqli_query($conn, $sql)) {
                // Afficher un message de confirmation
                echo "<p>Votre réservation a été effectuée avec succès !</p>";
            } else {
                // Afficher un message d'erreur en cas d'échec de l'insertion
                echo "<p>Erreur lors de la réservation : " . mysqli_error($conn) . "</p>";
            }
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réserver cet appartement</title>
</head>
<body>
    <h2>Réserver cet appartement</h2>
    <div>
        <img src="assets/img/property-1/<?= $appartement['image'] ?>" alt="Appartement Image">
        <h3><?= $appartement['localisation'] ?></h3>
        <p><b>Taille :</b> <?= $appartement['taille'] ?></p>
        <p><b>Prix :</b> $<?= $appartement['prix'] ?></p>
    </div>
    <hr>
    <h3>Formulaire de réservation</h3>
    <form action="" method="post">
        <!-- Champ caché pour stocker l'ID de l'appartement -->
        <input type="hidden" name="idApp" value="<?= $idApp ?>">

        <label for="date_debut">Date de début :</label>
        <input type="date" id="date_debut" name="date_debut" required><br>
        <label for="date_fin">Date de fin :</label>
        <input type="date" id="date_fin" name="date_fin" required><br>
        <input type="submit" name="submit" value="Réserver">
    </form>
</body>
</html>

<?php
    } else {
        echo "<p>L'appartement demandé n'existe pas.</p>";
    }

    // Libérer le résultat de la requête
    mysqli_free_result($result);
}

// Fermer la connexion à la base de données
mysqli_close($conn);
?>
