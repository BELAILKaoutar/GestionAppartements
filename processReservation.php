<?php
session_start();
include 'config.php';

// Vérifier si l'utilisateur est connecté
if (isset($_SESSION['idPers']) && $_SESSION['role'] === 'L') {
    // Récupérer l'ID du locataire depuis la session
    $idPers = $_SESSION['idPers'];

    // Vérifier si les données du formulaire sont envoyées
    if (isset($_POST['idApp'], $_POST['date_debut'], $_POST['date_fin'])) {
        // Récupérer les données du formulaire
        $idApp = mysqli_real_escape_string($conn, $_POST['idApp']);
        $date_debut = mysqli_real_escape_string($conn, $_POST['date_debut']);
        $date_fin = mysqli_real_escape_string($conn, $_POST['date_fin']);

        // Insérer les données de la réservation dans la table reservation
        $sql = "INSERT INTO reservation (idApp, idPers, date_debut, date_fin)
                VALUES ('$idApp', '$idPers', '$date_debut', '$date_fin')";

        if (mysqli_query($conn, $sql)) {
            // Réservation réussie, rediriger l'utilisateur vers une page de confirmation
            header("Location: ConfirmationReservation.php");
            exit();
        } else {
            // Erreur lors de l'insertion des données, afficher un message d'erreur
            echo "Erreur lors de la réservation : " . mysqli_error($conn);
        }
    } else {
        // Rediriger l'utilisateur vers une page d'erreur si les données du formulaire sont manquantes
        header("Location: reservation.php");
        exit();
    }
} else {
    // Rediriger l'utilisateur vers une page de connexion s'il n'est pas connecté en tant que locataire
    header("Location: login.php");
    exit();
}

// Fermer la connexion à la base de données
mysqli_close($conn);

