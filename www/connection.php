<?php
session_start();

if(isset($_SESSION['connect'])){
	header('location: admin/admin.php');
	exit();
}

require_once __DIR__ . "/model/database.php";

//vérifie si email et password sont en base de données
if(!empty($_POST['email']) && !empty($_POST['password'])){
	// déclaration des variables
	$email = $_POST['email'];
	$password = $_POST['password'];
	$error		= 1;
	$fisrtname = $_POST['firsname'];
	
	// encryptage du password
	//$password ='aq1'.sha1($password."1254")."25";

	//vérifie si les éléments sont correcte
	$req = $bdd->prepare('SELECT * FROM user WHERE email = ?');
	$req->execute(array($email));

	while($user = $req->fetch()){

		if($password == $user['password']){
			$error = 0;
			$_SESSION['connect'] = 1;
			$_SESSION['pseudo']	 = $user['email'];

			if(isset($_POST['connect'])) {
				setcookie('log', $user['secret'], time() + 365*24*3600, '/', null, false, true);
			}

			header('location: connection.php?success=1');
			exit();
		}
	}

	if($error == 1){
		header('location: connection.php?error=1');
		exit();
	}
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Connexion</title>
    <link rel="stylesheet" href="css/styles.min.css">

</head>

<body class="body-connexion">

    <form class="form-signin" id="form" method="post" action="connection.php">
        <div class="text-center mb-4">
            <h1 class="h3 mb-3 font-weight-normal">Administration</h1>
			<?php
			if(isset($_GET['error'])){
				echo'<p id="error" style="color:red;">Email ou mot de passe incorrect.</p>';
			}
			else if(isset($_GET['success'])){
				header('location: admin/admin.php');
			exit();
			}
		?>
        </div>

        <div class="form-label-group">
            <input type="email" id="inputEmail" name="email"class="form-control" placeholder="Email address" required autofocus>
            <label for="inputEmail">Adresse mail</label>
        </div>

        <div class="form-label-group">
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
            <label for="inputPassword">Mot de passe</label>
        </div>
        
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" name="connect" value="remember-me"> Se souvenir de moi 
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Connexion</button>
        
        <p class="mt-5 mb-3 text-muted text-center">&copy; Laurent Quéré 2020</p>
    </form>
    <script src="js/jquery-slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>

</html>