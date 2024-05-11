<?php
include_once "config.php";

if (isset($_POST['submit'])) {
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
            // Insert new apartment details into the database
            $query = "INSERT INTO appartement (localisation, prix, taille, image, nbreChambre) VALUES ('$localisation', '$prix', '$taille', '$image', '$nbreChambre')";
            $result = mysqli_query($conn, $query);
        } else {
            echo "<script>alert('Failed to upload image.')</script>";
        }
    } else {
        // If no image is uploaded, insert other details without the image field
        $query = "INSERT INTO appartement (localisation, prix, taille, nbreChambre) VALUES ('$localisation', '$prix', '$taille', '$nbreChambre')";
        $result = mysqli_query($conn, $query);
    }

    if ($result) {
        echo "<script>alert('Apartment added successfully.')</script>";
        header("Location: AppartementAdmin.php");
        exit();
    } else {
        echo "<script>alert('Failed to add apartment.')</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un appartement</title>
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #c2c2c2; /* Background color */
}

h2 {
    color: #FDC600; /* Heading color */
}

form {
    background-color: white;
    padding: 20px;
    border-radius: 5px;
    width: 50%;
    margin: 0 auto;
}

label {
    display: block;
    margin-bottom: 5px;
    color: #333; /* Label color */
}

input[type="text"],
input[type="number"],
input[type="file"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc; /* Input border color */
    border-radius: 4px;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #FDC600; /* Button background color */
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #FFB900; /* Button hover color */
}

input[type="file"] {
    padding-top: 5px;
}

/* Adjust styles for smaller screens */
@media (max-width: 600px) {
    form {
        width: 80%;
    }
}

</style>
<body>
    <h2>Ajouter un nouvel appartement</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="localisation">Localisation :</label><br>
        <input type="text" id="localisation" name="localisation" required><br>

        <label for="prix">Prix :</label><br>
        <input type="number" id="prix" name="prix" required><br>

        <label for="taille">Taille :</label><br>
        <input type="number" id="taille" name="taille" required><br>

        <label for="nbreChambre">Nombre de chambres :</label><br>
        <input type="number" id="nbreChambre" name="nbreChambre" required><br>

        <label for="image">Image :</label><br>
        <input type="file" id="image" name="image" accept="image/*" required><br><br>

        <input type="submit" name="submit" value="Ajouter">
    </form>
</body>

</html>
