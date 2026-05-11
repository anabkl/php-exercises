<html>
<title>sirie 1 </title>
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
    }
	$sql = '
		INSERT INTO etudiants (nom, prenom, email, filiere)
		VALUES (:nom, :prenom, :email, :filiere)';
	$stmt = $pdo->prepare($sql);
	$stmt->execute([
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':email' => $email,
	':filiere' => $filiere ?? null  ,
    ]);


?>



