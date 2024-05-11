

<?php
include_once "config.php";

if (isset($_POST['submit'])) {
    $search_localisation = mysqli_real_escape_string($conn, $_POST['search_localisation']);

    // Query to search for apartments by localization
    $query = "SELECT * FROM appartement WHERE localisation LIKE '%$search_localisation%'";

    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            // Display search results
            while ($row = mysqli_fetch_assoc($result)) {
                // Display apartment details
                echo "Localisation: " . $row['localisation'] . "<br>";
                echo "Prix: " . $row['prix'] . "<br>";
                echo "Taille: " . $row['taille'] . "<br>";
                // Add more details as needed
                echo "<hr>";
            }
        } else {
            echo "No apartments found for the provided localization.";
        }
    } else {
        echo "Error executing the search query: " . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Home</title>
        <meta name="description" content="GARO is a real-estate template">
        <meta name="author" content="Kimarotec">
        <meta name="keyword" content="html5, css, bootstrap, property, real-estate theme , bootstrap template">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800' rel='stylesheet' type='text/css'>

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">

        <link rel="stylesheet" href="assets/css/normalize.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/fontello.css">
        <link href="assets/fonts/icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet">
        <link href="assets/fonts/icon-7-stroke/css/helper.css" rel="stylesheet">
        <link href="assets/css/animate.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="assets/css/bootstrap-select.min.css"> 
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/icheck.min_all.css">
        <link rel="stylesheet" href="assets/css/price-range.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.css">  
        <link rel="stylesheet" href="assets/css/owl.theme.css">
        <link rel="stylesheet" href="assets/css/owl.transitions.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
    </head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        img {
            max-width: 100px;
            height: auto;
        }
    </style>
    <body>

        <div id="preloader">
            <div id="status">&nbsp;</div>
        </div>
        <!-- Body content -->

        <div class="header-connect">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-8  col-xs-12">
                        <div class="header-half header-call">
                            <p>
                                <span><i class="pe-7s-call"></i> +212 24 57 78 90 22</span>
                                <span><i class="pe-7s-mail"></i> BostaBela@gmail.com</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-2 col-md-offset-5  col-sm-3 col-sm-offset-1  col-xs-12">
                        <div class="header-half header-social">
                            <ul class="list-inline">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-vine"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
        <!--End top header -->
        <style>
            .navbar-brand {
                width: 250px; /* Largeur du logo */
                height: auto; /* La hauteur sera ajustée en fonction de la largeur pour conserver les proportions */
                /*background-image: url('assets/img/logo.jpg'); /* Chemin vers votre image de logo */
            }
        </style>
        <nav class="navbar navbar-default ">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    
                    <a class="navbar-brand" href="indexAdmin.php"><img src="assets/img/logo.jpg" alt=""></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse yamm" id="navigation">
                    <div class="button navbar-right">
                    <button class="navbar-btn nav-button wow bounceInRight login" onclick=" window.open('inscription.php')" data-wow-delay="0.45s">Login</button>
                    </div>
                    <ul class="main-nav nav navbar-nav navbar-right">

                    <li class="wow fadeInDown " data-wow-delay="0.2s"><a href="indexAdmin.php" >Home</a></li>
                        <li class="wow fadeInDown active" data-wow-delay="0.2s"><a href="AppartmentAdmin.php" class="dropdown-toggle" >Appartment</a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.2s"><a class="" href="reservationList.php">Reservation</a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.3s"><a class="" href="locataires.php">Locataires</a></li>
                        <li class="wow fadeInDown" data-wow-delay="0.3s"><a class="" href="contactList.php">Contact</a></li>

                            
                                       
                                        </div>
                                    </div>
                                    <!-- /.yamm-content -->
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <!-- End of nav bar -->

        <div class="container">
        <button class="navbar-btn nav-button wow bounceInRight login" onclick=" window.open('ajouterAppartement.php')" data-wow-delay="0.45s">ADD</button>
  <table>
    <tr id="items">
      <th>Image</th>
      <th>Localisation</th>
      <th>Prix</th>
      <th>Taille</th>
      <th>Nombre Chambre</th>
      <th>Modify</th>
      <th>Delete</th>
    </tr>
    <?php 
       //inclure la page de connexion
       include_once "config.php"; 
       //requete pour   afficher la liste des employés
       $req=mysqli_query($conn,"SELECT * FROM appartement");
       if(mysqli_num_rows($req)==0){
          //s'il n'existe pas d'employé dans la base de données,alors on affiche ce message:
          echo"there are no apartments yet add!";
       }else{
        //si non, affichons la liste de tous les employés 
         while($row=mysqli_fetch_assoc($req)){
          ?>
          <tr>
         <?php $imagePath = "assets/img/property-1/" . $row['image']; ?>

            <td><img src="<?= $imagePath ?>" alt="Apartment Image" style="max-width: 100px;"></td>              <td><?=$row['localisation']?></td>
              <td><?=$row['prix']?></td>
              <td><?=$row['taille']?></td>
              <td><?=$row['nbreChambre']?></td>
              <!--Nous allons mettre l'id de chaque employé dans ce lien-->
              <td><a href="modifyApp.php?id=<?=$row['idApp']?>"><img src="pen.png" style="width: 30px; height: 30px; background-position: -16px 0px;"></a></td>
              <td><a href="deleteApp.php?id=<?=$row['idApp']?>"><img src="trash.png" style="width: 30px; height: 30px; background-position: -16px 0px;"></a></td>

          <?php
         }
       }
   ?>
  </table>
  </div>




        <script src="assets/js/modernizr-2.6.2.min.js"></script>

        <script src="assets/js/jquery-1.10.2.min.js"></script> 
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/bootstrap-select.min.js"></script>
        <script src="assets/js/bootstrap-hover-dropdown.js"></script>

        <script src="assets/js/easypiechart.min.js"></script>
        <script src="assets/js/jquery.easypiechart.min.js"></script>

        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/wow.js"></script>

        <script src="assets/js/icheck.min.js"></script>
        <script src="assets/js/price-range.js"></script>

        <script src="assets/js/main.js"></script>

    </body>
</html>