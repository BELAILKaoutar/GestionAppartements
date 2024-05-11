<?php
include 'config.php';

if (isset($_POST['submit'])) {
    // Retrieve and sanitize form inputs
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $cin = mysqli_real_escape_string($conn, $_POST['cin']);
    $tél = mysqli_real_escape_string($conn, $_POST['tél']);
    $sexe = mysqli_real_escape_string($conn, $_POST['sexe']);
    $date_naissance = mysqli_real_escape_string($conn, $_POST['date_naissance']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5($_POST['password']); // MD5 hashing (not recommended, but for demonstration)
    $role = mysqli_real_escape_string($conn, $_POST['role']);

    // Check if email already exists
    $sql = "SELECT * FROM personne WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
        // Email doesn't exist, proceed with registration
        $sql = "INSERT INTO personne (username, cin, tél, sexe, date_naissance, email, password, role)
                VALUES ('$username', '$cin', '$tél', '$sexe', '$date_naissance', '$email', '$password', '$role')";
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Wow! User Registration Completed.')</script>";
        } else {
            echo "<script>alert('Woops! Something Went Wrong.')</script>";
        }
    } else {
        echo "<script>alert('Woops! Email Already Exists.')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="inscription.css">
    <title></title>
</head>

<body>
    <section>
        <div class="container">
            <div class="contactInfo">
                <div>
                    <h2>Contact Info</h2>
                    <ul class="info">
                        <li>
                            <span><img src="assets/img/location.png"></span>
                            <span>Maroc</span>
                        </li>
                        <li>
                            <span><img src="assets/img/mail.png"></span>
                            <span>BostaBela@gmail.com</span>
                        </li>
                        <li>
                            <span><img src="assets/img/call.png"></span>
                            <span>06.07.70.58.54</span>
                        </li>
                    </ul>
                </div>
                <ul class="sci">
                    <li><a href="#"><img src="assets/img/1.png"></a></li>
                    <li><a href="#"><img src="assets/img/2.png"></a></li>
                    <li><a href="#"><img src="assets/img/3.png"></a></li>
                    <li><a href="#"><img src="assets/img/4.png"></a></li>
                    <li><a href="#"><img src="assets/img/5.png"></a></li>
                </ul>
            </div>
            <form method="post">
                <div class="contactForm">
                    <h2>Sign Up</h2>
                    <h4 style="color=#FDC600;">Enter your personal details to use all of site features.</h4>

                    <div class="formBox">
                        <div class="inputBox w50">
                            <label>Username</label>
                            <input type="text" name="username" placeholder="Username" value="<?php echo isset($username) ? $username : ''; ?>" required>
                        </div>
                        <div class="inputBox w50">
                            <label>CIN</label>
                            <input type="text" name="cin" placeholder="CIN" value="<?php echo isset($cin) ? $cin : ''; ?>" required>
                        </div>
                        <div class="inputBox w50">
                            <label>Tél</label>
                            <input type="text" name="tél" placeholder="Tél" value="<?php echo isset($tél) ? $tél : ''; ?>" required>
                        </div>
                        <div class="inputBox w50">
                            <label>Sexe</label>
                            <input list="sexe" name="sexe" required value="<?php echo isset($sexe) ? $sexe : ''; ?>">
                            <datalist id="sexe">
                                <option value="Homme">
                                <option value="Femme">
                            </datalist>
                        </div>
                        <div class="inputBox w50">
                            <label>Date de Naissance</label>
                            <input type="date" name="date_naissance" value="<?php echo isset($date_naissance) ? $date_naissance : ''; ?>" required>
                        </div>
                        <div class="inputBox w50">
                            <label>Email</label>
                            <input type="email" name="email" placeholder="Email" value="<?php echo isset($email) ? $email : ''; ?>" required>
                        </div>
                        <div class="inputBox w50">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="Password" required>
                        </div>
                        <input type="hidden" name="role" value="L">
                        <div class="inputBox w100">
                            <button type="submit" name='submit'>Sign Up</button>
                            <button type="submit" name='submit'><a href="loginLoc.php">log in</a></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <script src="script.js"></script>
</body>

</html>
