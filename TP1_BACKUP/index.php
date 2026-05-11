<?php
require_once 'connexion.php';

function getEtudiants($pdo): array {
    $stmt = $pdo->prepare('SELECT * FROM etudiants' );
    $stmt->execute();

    return $stmt->fetchAll();
}

function compterEtudiants(PDO $pdo): int {
    return (int) $pdo->query('SELECT COUNT(*) FROM etudiants')->fetchColumn();
}

$etudiants = getEtudiants($pdo);


echo '<table border="1">';
echo '<tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Email</th>
        <th>Filiere</th>
        <th>Action</th>
      </tr>';

foreach ($etudiants as $t) {
    echo '<tr>';
    echo '<td>' . $t['id'] . '</td>';
    echo '<td>' . htmlspecialchars($t['nom']) . '</td>';
    echo '<td>' . htmlspecialchars($t['prenom']) . '</td>';
    echo '<td>' . htmlspecialchars($t['email']) . '</td>';
    echo '<td>' . htmlspecialchars($t['filiere']) . '</td>';
    echo '<td>
            <a href="modifier.php?id=' . $t['id'] . '">Modifier</a>
            |
            <a href="supprimer.php?id=' . $t['id'] . '">Supprimer</a>
          </td>';
    echo '</tr>';
}

echo '</table>';
?>

