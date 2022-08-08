<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="nom">Nom</label>
    <input type="text" name="nom" required>
    <label for="message">Commentaire</label>
    <textarea name="commentaire" cols="30" rows="10" required></textarea>
    <input type="submit" value="envoyer">
</form>

<?php

if (isset($_POST["nom"]) && !empty($_POST["nom"]) && isset($_POST["commentaire"]) && !empty($_POST["commentaire"])) {
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
        $nom = htmlspecialchars($_POST["nom"]);
        $com = htmlspecialchars($_POST["commentaire"]);
        $sql = "INSERT INTO commentaires (id, nom, commentaire) VALUES (NULL, :nom, :commentaire)";
        $sth = $cx->prepare($sql);
		$sth->execute(array(":nom"=>$nom, ":commentaire"=>$com));
    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage() . '<br/>';
        die();
    }
}

?>