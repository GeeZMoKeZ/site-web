<?php 
    // echo "test";
    // echo "<h1>test</h1>";
    // echo "<head><link rel='stylesheet' href='css/style.css'></head>
    // <header>
    //     <a href=\"/\"><img src=\"img/logo.png\" alt=\"Logo\"></a>
    //     <a href=\"/\">Mon site</a>
    //     <ul>
    //         <li><a href=\#accueil\">Accueil</a></li>
    //         <li><a href=\"#a-propos\">À propos</a></li>
    //         <li><a href=\"#contact\">Contact</a></li>
    //     </ul>
    // </header>
    // "

    $email_admin = "elio.martel@outlook.fr";
    $objet = "Contact via le site web";


    if(isset($_POST["envoyer"]) && !empty($_POST["envoyer"])){
        if(isset($_POST["nom"]) && !empty($_POST["nom"]) && isset($_POST["email"]) && !empty($_POST["email"]) && isset($_POST["message"]) && !empty($_POST["message"])){
            //on envoie le mail

            $message = $_POST["message"];
            $headers  = 'From: '. $_POST["email"] . "\r\n" .
            'MIME-Version: 1.0' . "\r\n" .
            'Content-type: text/html; charset=utf-8';

            if(mail($email_admin,$objet,$contenu_message,$headers))
			{
				return header("location:index.php?success");
			}
        }
    }
    header("location:index.php?error");

?>