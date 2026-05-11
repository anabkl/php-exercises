<?php
require_once 'CONNEXION.PHP';

function creeTache(PDO $pdo, array $data): int {
	$sql = '
		INSERT INTO tach (nom, description, STATUT, tach_id)
		VALUES (:nom, :description, :STATUT, :tach_id)
		';
	$stmt = $pdo->prepare($sql);
	$stmt->execute([
        ':nom' => $data['nom'],
        ':description' => $data['description'] ?? null,
        ':STATUT' => $data['STATUT'],
    ]);
	return (int) $pdo->lastInsertId();
}

$nouveauId = creeTache($pdo, [
    'nom' => 'Inserer des donnees',
    'description' => 'Inserer des donnees avec PHP et MySQL',
    'STATUT' => 0
]);
echo 'Tache cree avec l\'ID : ' . $nouveauId;

?>
