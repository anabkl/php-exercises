<?php
require_once 'CONNEXION.PHP';

function supprimerTache(PDO $pdo, int $id): bool {
    // Soft delete:
    $stmt = $pdo->prepare('UPDATE tach SET STATUT = 0 WHERE tach_id = :id');
    $stmt->execute([':id' => $id]);

    return $stmt->rowCount() > 0;
}

function supprimerDefinitivement(PDO $pdo, int $id): bool {
    // Hard delete: 
    $stmt = $pdo->prepare('DELETE FROM tach WHERE tach_id = :id');
    $stmt->execute([':id' => $id]);

    return $stmt->rowCount() > 0;
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["supprimer_id"])) {
    $id = (int)$_POST["supprimer_id"];

    if (supprimerTache($pdo, $id)) {
        echo "Tâche désactivée.";
    } else {
        echo "Tâche introuvable.";
    }
}
?>
