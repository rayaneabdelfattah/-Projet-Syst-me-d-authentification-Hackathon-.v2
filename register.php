<?php 
session_start();

// renvoyer a dashboard si deja connecté
if (isset($_SESSION["LoggedIn"]) && $_SESSION["LoggedIn"] === true) {
    header("Location: dashboard.php");
    exit;
}

require_once 'db.php'; // connexion db

$username = $password = "";  //initialiser les variables
$error = "";

// si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    // Filtrage + trim

    $username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
    $password = trim($_POST['password']); //On vas pas afficher le mdp, pas la peine de filtrer ici, va etre hashe 
    $confirm_password = trim($_POST['confirm_password']); // Confirmer le mot de passe

    // si les champs sont vides
    if (empty($username) || empty($password)) {
        $error = "Veuillez remplir tous les champs.";
    }
    // le format du username (seuls lettres, chiffres, _ ; longueur: 3-20)
    elseif (!preg_match('/^[a-zA-Z0-9_]{3,20}$/', $username)) {
        $error = "Nom d'utilisateur invalide. Utilisez seulement lettres, chiffres et _ (3-20 caractères).";
    }
    // verification du la force du mot de passe
    elseif (!preg_match('/^(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z0-9])(?=.*\s?).{8,}$/', $password)) {
        $error = "Mot de passe doit contenir au moins 8 caractères, une majuscule, un chiffre, un caractère spécial.";
    }
    elseif ($password !== $confirm_password) {
        $error = "Les mots de passe ne correspondent pas.";
    }
    else {

        // Cette partie : si tous vas bien
        // hasher le password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        // preparer la requete pour inserer les donnees
        $query = "INSERT INTO users (username, password) VALUES (:username, :password)";
        
        // try-catch la partie d'execution de requete
        try {
            //requete pour verifier si le username est deja pris
            $check_query = "SELECT id FROM users WHERE username = :username";
            $check_stmt = $conn->prepare($check_query);
            $check_stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $check_stmt->execute();

            if ($check_stmt->rowCount() > 0) { //si c'est trouvee
                $error = "Ce nom d'utilisateur est déjà pris.";
            }
            else{
                // les requetes prepares avec bindparam protegent contre les injections SQL (params traite comme data, pas comme code)
                $stmt = $conn->prepare($query);
                    
                $stmt->bindParam(':username', $username, PDO::PARAM_STR); //(PDO::PARAM_STR)Optionnel :pour explicitement declarer qu'on veut un string
                $stmt->bindParam(':password', $hashed_password, PDO::PARAM_STR);
                
                $stmt->execute();
                
                if ($stmt->execute()) {
                    // si l'utilisateur est cree avec succes (return true)
                    header("Location: login.php");
                    exit();
                } else {
                    $error = "Une erreur s'est produite.";
                }
            }
                
            } catch (PDOException $e) {
                $error = "Erreur : " . $e->getMessage();
            }
        }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> Register</title>
    <link rel="stylesheet" href="styles.css">

</head>

<body>
    <!-- partial:index.partial.html -->
    <!doctype html>

    <html lang="en">

    <head>

        <meta charset="UTF-8">

        <title>Register</title>

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

                    <h2>Sign Up</h2>

                    <form class="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

                        <div class="inputBox">

                            <input type="text" name="username" required> <i>Username</i>

                        </div>

                        <div class="inputBox">

                            <input type="password" name="password" required> <i>Password</i>

                        </div>

                        <div class="inputBox">

                            <input type="password" name="confirm_password" required> <i>Password</i>

                        </div>

                        <div class="links"><a href="login.php">Login Instead</a>

                        </div>

                        <div class="message">
                            <p style="color:red;"><?php echo $error; ?></p>
                        </div>

                        <div class="inputBox">

                            <input type="submit" value="Sign Up">

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