<html>
<body>
<form action="" method="post">
    <label> ID </label>
    <input type="text" name="id" required> </br>
    <label> Submit </label>
    <input type="submit" name="valider">
</form>

<?php
require_once 'connexion.php';

function supprimerDefinitivement(PDO $pdo, int $id): bool {
    $stmt = $pdo->prepare('DELETE FROM etudiants WHERE id = :id');
    $stmt->execute([':id' => $id]);

    return $stmt->rowCount() > 0;
}

if (isset($_POST["valider"])) {
    $id = (int) $_POST["id"];

    if (supprimerDefinitivement($pdo, $id)) {
        echo "Etudiant supprimé avec succès.";
    } else {
        echo "Etudiant introuvable.";
    }
}
?>
