<?php

if (isset($_POST["mail"]) && !empty($_POST["mail"])) {
    $user = "root";
    $pwd = "";
    $db = "mysql:host=localhost;dbname=newsletter";

    try {
        $cx = new PDO($db, $user, $pwd) or die();
        $cx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Erreur est surevenue lors de la connexion : " . $e->getMessage() . "</br>";
        die();
    }

    try {
        $mail = htmlspecialchars($_POST["mail"]);
        $sql = "INSERT INTO newsletter (mail) VALUES (:mail)";
        $sth = $cx->prepare($sql);
		$sth->execute(array(":mail"=>$mail));
    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage() . '<br/>';
        die();
    }
}
return header("Location: shorts.html");

?>