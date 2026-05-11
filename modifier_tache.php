<?php
require_once 'CONNEXION.PHP';

function modifierTache(PDO $pdo, int $id, array $data): bool {
    $sql = '
        UPDATE tach
        SET nom = :nom,
            description = :description,
            STATUT = :STATUT
        WHERE tach_id = :id
    ';

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':nom' => $data['nom'],
        ':description' => $data['description'],
        ':STATUT' => (int)$data['STATUT'],
        ':id' => $id,
    ]);

    return $stmt->rowCount() > 0;
}


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id"])) {
    $id = (int)$_POST['id'];

    $succes = modifierTache($pdo, $id, [
        'nom' => trim($_POST['nom']),
        'description' => trim($_POST['description']),
        'STATUT' => isset($_POST['STATUT']) ? 1 : 0,
    ]);

    echo $succes ? 'Tache modifiee avec succes' : 'Aucune modification';
}
?>
