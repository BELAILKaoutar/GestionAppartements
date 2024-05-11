<?php
include_once "config.php";

// Check if the 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Fetch apartment details from the database based on the provided ID
    $query = "SELECT * FROM appartement WHERE idApp = $id";
    $result = mysqli_query($conn, $query);
    
    // Check if the query was successful and if apartment with the provided ID exists
    if ($result && mysqli_num_rows($result) > 0) {
        $apartment = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify Apartment</title>
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
    <h1>Modify Apartment</h1>
    <form action="updateApp.php" method="post" enctype="multipart/form-data">
    <!-- Hidden input field to store the apartment ID -->
    <input type="hidden" name="id" value="<?= $apartment['idApp'] ?>">
    
    <label for="image">Image:</label>
    <input type="file" id="image" name="image"><br>

    <label for="localisation">Localisation:</label>
    <input type="text" id="localisation" name="localisation" value="<?= $apartment['localisation'] ?>"><br>
    
    <label for="prix">Prix:</label>
    <input type="text" id="prix" name="prix" value="<?= $apartment['prix'] ?>"><br>
    
    <label for="taille">Taille:</label>
    <input type="text" id="taille" name="taille" value="<?= $apartment['taille'] ?>"><br>

        
    <label for="taille">Nombre Chambre:</label>
    <input type="number" id="nbreChambre" name="nbreChambre" value="<?= $apartment['nbreChambre'] ?>"><br>
    <!-- Use a regular submit button -->
    <input type="submit" name="submit" value="Modify">
</form>

</body>
</html>
<?php
    } else {
        // Apartment with the provided ID does not exist
        echo "Apartment not found!";
    }
} else {
    // No 'id' parameter provided in the URL
    echo "Apartment ID not provided!";
}
?>
