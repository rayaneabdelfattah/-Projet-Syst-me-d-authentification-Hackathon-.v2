<?php

ini_set('session.gc_maxlifetime', 3600); // duree de session en secondes.
session_set_cookie_params([
    'lifetime' => 3600,
    'path' => '/', // Valable sur tout le site
    'domain' => '', // Domaine actuel
    'secure' => isset($_SERVER['HTTPS']), // true si on utilise HTTPS
    'httponly' => true, //Stopper JS d'acceder au session cookie
    'samesite' => 'Strict' // protège contre les attaques CSRF
]);
session_start();
// renvoyer au dashboard si deja connecté
if (isset($_SESSION["LoggedIn"]) && $_SESSION["LoggedIn"] === true) {
    header("Location: dashboard.php");
    exit;
}

require_once 'db.php'; // connexion a la base de données

$username = $password = "";  //initialiser les variables
$error = "";

// si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        $error = "Veuillez remplir tous les champs.";
    } else {

        // rechercher l'utilisateur dans la base 
        $query = "SELECT * FROM users WHERE username = :username LIMIT 1";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // si la connexion est réussie
            session_regenerate_id(true); // regenerer une nouvelle session
            $_SESSION["LoggedIn"] = true;
            $_SESSION["User"] = $user['username'];
            header("Location: dashboard.php");
            exit;
        } else { //sinon
            $error = "Identifiants invalides.";
        }
    }
}
?>

<!--                     HTML Part                          -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">

</head>

<body>
    <!-- partial:index.partial.html -->
    <!doctype html>

    <html lang="en">

    <head>

        <meta charset="UTF-8">

        <title>Login</title>

        <link rel="stylesheet" href="styles.css">

    </head>

    <body>
        <!-- partial:index.partial.html -->

        <section> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
            <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
            <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
            <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
            <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
            <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
            <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
            <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
            <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
            <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
            <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
            <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
            <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
            <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
            <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
            <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
            <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
            <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
            <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
            <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
            <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
            <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
            <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
            <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
            <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
            <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
            <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
            <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
            <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
            <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
            <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
            <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
            <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
            <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
            <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
            <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
            <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
            <span></span>

            <div class="signin">

                <div class="content">

                    <h2>Sign In</h2>

                    <form class="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

                        <div class="inputBox">

                            <input type="text" name="username" required> <i>Username</i>

                        </div>

                        <div class="inputBox">

                            <input type="password" name="password" required> <i>Password</i>

                        </div>

                        <div class="links"> <a href="register.php">Signup</a>
                            
                        </div>

                        <div class="message">
                        <p style="color:red;"><?php echo $error; ?></p>
                        </div>

                        <div class="inputBox">

                            <input type="submit" value="Login">

                        </div>
                    </form>

                </div>

            </div>

            </div>

        </section> <!-- partial -->

    </body>

    </html>
    <!-- partial -->

</body>

</html>