<?php
include_once "config.php";
$id = $_GET['id'];
$req = mysqli_query($conn, "DELETE FROM appartement WHERE idApp = $id");
header("Location:AppartementAdmin.php");