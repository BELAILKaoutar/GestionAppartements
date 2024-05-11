<?php 
include 'config.php';
session_start();
error_reporting(0);

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM personne WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: index.php");
    } else {
        echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Log in</title>
</head>

<body>

    <div class="container" id="container">

        <div class="form-container sign-in">
            <form method="post">
                <h1>Sign In</h1>
                <span>or use your email password</span>
                <input type="email" name="email"  placeholder="Email" value="<?php echo $email; ?>" required  ><br>
                <input type="password" name="password"  placeholder="Password" value="<?php echo $_POST['password']; ?>" required ><br>
               <!-- <a href="#">Forget Your Password?</a>-->
                <button type="submit" name='submit'>Log in</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-right">
                    <h1>Hello!</h1>
                    <p>Register with your personal details to use all of site features</p>
                   <a href="inscription.php"><button  type="submit" name='submit' >Sign Up</button></a> 
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>
