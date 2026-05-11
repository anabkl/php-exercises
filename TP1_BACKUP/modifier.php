<html>
<budy>
<form action = "" method = "post">
  <label> Nom </label>
  <input type = "text" name = "nom" required > </br>
  <label> Prenom </label>
  <input type = "text" name = "Prenom" required > </br>
  <label> email </label>
  <input type = "text" name = "email" required > </br>
  <label> filiere </label>
  <input type = "text" name = "filiere" required > </br>
    <label> ID </label>
    <input type = "text" name = "id" required > </br>
   <label> Submit </label>
  <input type = "Submit" name = "valider"  > 
</form>


    <?php
    require_once 'connexion.php';

    if(isset($_POST["valider"])) {
        $nom = $_POST["nom"];
        $prenom = $_POST["Prenom"];
        $email = $_POST["email"];
        $filiere = $_POST["filiere"];
        $id = $_POST["id"];

     $sql = '
        UPDATE etudiants
        SET nom = :nom,
            prenom = :prenom,
            email = :email,
	    filiere = :filiere
        WHERE id = :id
    ';

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':email' => $email,
        ':filiere' => $filiere,
        ':id' => $id,
    ]);

    return $stmt->rowCount() > 0;
}


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id"])) {
    $id = (int)$_POST['id'];

    $succes = modifierTache($pdo, $id, [
        'nom' => trim($_POST['nom']),
        'prenom' => trim($_POST['prenom']),
        'email' => trim($_POST['email']),
	'filiere' => trim($_POST['filiere']),
    ]);

    echo $succes ? 'Tache modifiee avec succes' : 'Aucune modification';
}
?>

