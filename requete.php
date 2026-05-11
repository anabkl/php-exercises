<?php
require_once 'connexion.php';
$pdo = getConnexion();
$stmt = $pdo->prepare('SELECT tach_id, nom, description, STATUT FROM tach where STATUT = 1');
$stmt->execute();
$tach = $stmt->fetchAll();

foreach($tach as $t) {
	echo htmlspecialchars($t['nom']) . ' : ' . htmlspecialchars($t['description']) . ' - Statut: ' . $t['STATUT'] . '<br>';
}

$stmt = $pdo->prepare(
	'SELECT * FROM tach WHERE STATUT = :st' 
);
$stmt->execute([':st' => 1]);
$resultats = $stmt->fetchAll();

$stmt = $pdo->prepare('SELECT * FROM tach WHERE STATUT > ?');
$stmt->execute([5]);

$stmt = $pdo->prepare('SELECT * FROM tach WHERE tach_id = :id');
$stmt->execute([':id' => 4]);
$tach = $stmt->fetch();
if ($tach) {
	echo $tach['nom'];
} else {
	echo 'tach introuvable';
}

//compter
$stmt = $pdo->prepare('SELECT COUNT(*) FROM tach WHERE STATUT = 1 ');
$stmt->execute();
$total = $stmt->fetchColumn();
echo 'Total : ' . $total;

?>
