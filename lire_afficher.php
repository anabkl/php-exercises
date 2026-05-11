<?php
require_once 'CONNEXION.PHP';

function getTachesPagines(PDO $pdo, int $page, int $parPage = 10): array {
    $offset = ($page - 1) * $parPage;
    $stmt = $pdo->prepare('SELECT * FROM tach WHERE STATUT = 1 ORDER BY tach_id DESC 
         LIMIT :limit OFFSET :offset');

    $stmt->bindValue(':limit', $parPage, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll();
}

function compterTaches(PDO $pdo): int {
    return (int) $pdo
        ->query('SELECT COUNT(*) FROM tach WHERE STATUT = 1')
        ->fetchColumn();
}

// Utilisation
$page = (int)($_GET['page'] ?? 1);
$parPage = 10;

$taches = getTachesPagines($pdo, $page, $parPage);
$total = compterTaches($pdo);
$nbPages = ceil($total / $parPage);

// Affichage HTML
echo '<table border="1">';
echo '<tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Description</th>
        <th>Statut</th>
      </tr>';

foreach ($taches as $t) {
    echo '<tr>';
    echo '<td>' . $t['tach_id'] . '</td>';
    echo '<td>' . htmlspecialchars($t['nom']) . '</td>';
    echo '<td>' . htmlspecialchars($t['description']) . '</td>';
    echo '<td>' . ($t['STATUT'] ? 'Terminée' : 'Non terminée') . '</td>';
    echo '</tr>';
}

echo '</table>';

// Navigation entre les pages
for ($i = 1; $i <= $nbPages; $i++) {
    echo '<a href="?page=' . $i . '">' . $i . '</a> ';
}
?>
