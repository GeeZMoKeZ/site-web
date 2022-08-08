<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="js/app.js"></script>
    <title>Mon site</title>
</head>

<body>
    <div class="loader" id="loader">
        <p>Chargement...</p>
    </div>
    <header>
        <a href="/"><img src="img/logo.png" alt="Logo"></a>
        <a href="/">Mon site</a>
        <ul>
            <li><a href="#accueil">Accueil</a></li>
            <li><a href="#a-propos">À propos</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
    </header>
    <div class="page-main">
        <div class="bienvenue" id="accueil">
            <img src="img/bienvenue.jpg" alt="">
            <div class="texte">
                <h1>Bienvenue chez nous !</h1>
                <p>Ghetto ipsum we gonna chung sit crackalackin, funky fresh adipiscing shiznit. Nullizzle sapien
                    velizzle, dang crackalackin, suscipit quis, shit vizzle, i saw beyonces tizzles and my pizzle went
                    crizzle. Pellentesque owned hizzle. Sizzle erizzle. Away at rizzle dapibus turpis fo shizzle crazy.
                    Maurizzle pellentesque nibh et ghetto. check out this tortizzle. Pellentesque go to hizzle away
                    mammasay mammasa mamma oo sa. In hizzle uhuh ... yih! platea dictumst.</p>
            </div>
        </div>
        <div class="separator"></div>
        <div class="a-propos" id="a-propos">
            <h2 class="title-category">A propos</h2>
            <div class="picture-propos">
                <div class="infos-picture-propos">
                    <div class="picture-propos-text">
                        <h3>Notre team</h3>
                        <p>Lorizzle mammasay mammasa mamma oo sa dolor sit amizzle, consectetuer adipiscing elit.
                            Nullizzle sapien shiz, volutpat, suscipit i'm in the shizzle, for sure vel, gangsta.
                            Pellentesque hizzle tortizzle. Sizzle things. Gizzle izzle dolizzle i'm in the shizzle
                            gangster tempus fo shizzle. Maurizzle pellentesque nibh izzle turpizzle. in tortor. </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="separator"></div>
        <div class="contact" id="contact">
            <h2 class="title-category">Contact</h2>
            <div class="form-contact-container">
                <form action="contact.php" method="post" class="form-contact">
                    <div class="form-top">
                        <div class="form-left">
                            <div><label for="nom">Nom</label>
                                <input type="text" name="nom" placeholder="Thibaut Dupont">
                            </div>
                            <div>
                                <label for="email">E-mail</label>
                                <input type="email" name="email" placeholder="thibaut.dupont@gmail.com">
                            </div>
                        </div>
                        <div class="form-right">
                            <label for="message">Message</label>
                            <textarea name="message" cols="30" rows="5" placeholder="Je vous contacte pour..."></textarea>
                        </div>
                    </div>
                    <div class="form-bottom">
                        <input type="submit" name="envoyer" value="Envoyer">
                    </div>
                </form>
            </div>
        </div>
        <div class="separator"></div>
        <div class="commentaires" id="commentaires">
            <h2 class="title-category">Commentaires</h2>
            <!-- <div class="commentaire">
                <img src="img/user.png" class="commentaire-pp">
                <div class="commentaire-text">
                    <h3 class="commentaire-nom">Jean Dupont</h3>
                    <p class="commentaire-message">Lorizzle bizzle i'm in the shizzle sit amizzle, its fo rizzle that's
                        the shizzle elizzle. Nullizzle dope velizzle, fo volutpizzle, pimpin' quizzle, fo shizzle
                        vizzle, bizzle. Pellentesque nizzle tortizzle. Sizzle erizzle. Crunk yippiyo dolor dapibus you
                        son of a bizzle tempizzle get down get down. Mauris break it down nibh izzle turpizzle. Shiz in
                        sizzle. Pellentesque mah nizzle rhoncus nisi.</p>
                </div>
            </div>
            <div class="commentaire">
                <img src="img/user.png" class="commentaire-pp">
                <div class="commentaire-text">
                    <h3 class="commentaire-nom">Jean Dupont</h3>
                    <p class="commentaire-message">Lorizzle bizzle i'm in the shizzle sit amizzle, its fo rizzle that's
                        the shizzle elizzle. Nullizzle dope velizzle, fo volutpizzle, pimpin' quizzle, fo shizzle
                        vizzle, bizzle. Pellentesque nizzle tortizzle. Sizzle erizzle. Crunk yippiyo dolor dapibus you
                        son of a bizzle tempizzle get down get down. Mauris break it down nibh izzle turpizzle. Shiz in
                        sizzle. Pellentesque mah nizzle rhoncus nisi.</p>
                </div>
            </div> -->
            <?php

            $user = "root";
            $pwd = "";
            $db = "mysql:host=localhost;dbname=tuto_commentaires";

            try {
                $cx = new PDO($db, $user, $pwd) or die();
                $cx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Erreur est surevenue lors de la connexion : " . $e->getMessage() . "</br>";
                die();
            }

            try {
                $sql = "select * from commentaires";
                $sth = $cx->prepare($sql);
                $sth->execute();
                $result = $sth->fetchAll();
                // print_r($result);
                foreach ($result as $k => $v) {
                    echo "<div class=\"commentaire\">
                    <img src=\"img/user.png\" class=\"commentaire-pp\">
                    <div class=\"commentaire-text\">
                        <h3 class=\"commentaire-nom\">".$v["nom"]."</h3>
                        <p class=\"commentaire-message\">
                        ".$v["commentaire"]."</p>
                    </div>
                </div>";
                }
            } catch (PDOException $e) {
                echo 'Erreur : ' . $e->getMessage() . '<br/>';
                die();
            }

            ?>
        </div>
    </div>
    <footer>
        <h2>Mon site © 2022</h2>
    </footer>
</body>

</html>
