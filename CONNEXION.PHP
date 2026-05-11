<?php

define('DB_HOST','localhost');
define('DB_NAME','gestion_tach');
define('DB_USER','root');
define('DB_PASS','Anas@123456');
define('DB_CHARSET','utf8mb4');

function getConnexion(): PDO {
	$dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' .DB_CHARSET;
	$options = [
		PDO::ATTR_ERRMODE             => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE  => PDO::FETCH_ASSOC,
		PDO::ATTR_EMULATE_PREPARES    => false,
		PDO::ATTR_PERSISTENT          => false,
	];
	try {
		$pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
		return $pdo;
	} catch (PDOException $e) {
	error_log('Connexion BDD echoue : ' . $e->getMessage());
	}
}

$pdo = getConnexion();
?>
