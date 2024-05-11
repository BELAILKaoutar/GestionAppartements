<?php
include_once "config.php";

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $localisation = mysqli_real_escape_string($conn, $_POST['localisation']);
    $prix = mysqli_real_escape_string($conn, $_POST['prix']);
    $taille = mysqli_real_escape_string($conn, $_POST['taille']);
    $nbreChambre = mysqli_real_escape_string($conn, $_POST['nbreChambre']);

    // Check if a new image is uploaded
    if ($_FILES['image']['name']) {
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_path = "assets/img/property-1/" . $image;

        // Move the uploaded file to the destination directory
        if (move_uploaded_file($image_tmp, $image_path)) {
            // Update database with new image path
            $query = "UPDATE appartement SET localisation = '$localisation', prix = '$prix', taille = '$taille', image = '$image',nbreChambre = '$nbreChambre' WHERE idApp = $id";
            $result = mysqli_query($conn, $query);
        } else {
            echo "<script>alert('Failed to upload image.')</script>";
        }
    } else {
        // If no new image is uploaded, update other details without modifying the image field
        $query = "UPDATE appartement SET localisation = '$localisation', prix = '$prix', taille = '$taille',nbreChambre = '$nbreChambre' WHERE idApp = $id";
        $result = mysqli_query($conn, $query);
    }

    if ($result) {
        echo "<script>alert('Apartment updated successfully.')</script>";
        header("Location: AppartementAdmin.php");
        exit();
    } else {
        echo "<script>alert('Failed to update apartment.')</script>";
    }
}
