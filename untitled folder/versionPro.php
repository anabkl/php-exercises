<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Projet PHP - Série 1</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f9; padding: 20px; line-height: 1.6; }
        .container { max-width: 800px; margin: auto; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        form { background: #e2e2e2; padding: 15px; border-radius: 5px; margin-bottom: 20px; }
        label { display: block; margin-top: 10px; font-weight: bold; }
        input[type="text"], input[type="number"] { width: 95%; padding: 8px; margin-top: 5px; }
        input[type="submit"] { background: #28a745; color: white; border: none; padding: 10px 20px; margin-top: 20px; cursor: pointer; border-radius: 5px; }
        .result-box { border-left: 5px solid #007bff; background: #f0f7ff; padding: 15px; margin-top: 20px; }
        h2 { color: #333; border-bottom: 2px solid #333; padding-bottom: 5px; }
        pre { background: #333; color: #fff; padding: 10px; border-radius: 5px; }
    </style>
</head>
<body>

<div class="container">
    <h2>📝 Formulaire Étudiant</h2>
    <form action="" method="post">
        <label>Nom</label>
        <input type="text" name="nom" required>
        
        <label>Prénom</label>
        <input type="text" name="Prenom" required>
        
        <label>Âge</label>
        <input type="number" name="age" required>
        
        <label>Note 1 / Note 2 / Note 3</label>
        <input type="number" name="n1" required min="0" max="20" placeholder="Note 1">
        <input type="number" name="n2" required min="0" max="20" placeholder="Note 2">
        <input type="number" name="n3" required min="0" max="20" placeholder="Note 3">
        
        <label>Établissement</label>
        <input type="text" name="Etablessment" required>
        
        <input type="submit" name="valider" value="Calculer les Résultats">
    </form>

    <?php
    if(isset($_POST["valider"])) {
        echo "<div class='result-box'>";
        echo "<h2>📊 Résultats de l'Étudiant</h2>";
        
        define("ETABLISSEMENT_DEF", "FPK");
        $nom = htmlspecialchars($_POST["nom"]);
        $prenom = htmlspecialchars($_POST["Prenom"]);
        $age = (int)$_POST["age"];
        $n1 = (float)$_POST["n1"];
        $n2 = (float)$_POST["n2"];
        $n3 = (float)$_POST["n3"];

        $moyenne = ($n1 + $n2 + $n3) / 3;

        echo "<b>Nom & Prénom :</b> $nom $prenom <br>";
        echo "<b>Âge :</b> $age ans (" . ($age >= 18 ? "Majeur" : "Mineur") . ")<br>";
        echo "<b>Établissement :</b> " . ETABLISSEMENT_DEF . "<br>";
        echo "<b>Moyenne :</b> " . number_format($moyenne, 2) . " / 20 <br>";

        // Mention
        if($moyenne >= 16) $mention = "Excellent";
        elseif($moyenne >= 14) $mention = "Bien";
        elseif($moyenne >= 12) $mention = "Assez bien";
        elseif($moyenne >= 10) $mention = "Passable";
        else $mention = "Echec";

        echo "<b>Résultat :</b> " . ($moyenne >= 10 ? "<span style='color:green'>Admis</span>" : "<span style='color:red'>Non Admis</span>") . "<br>";
        echo "<b>Mention :</b> $mention <br>";

        echo "<h3>🔢 Boucles & Tableaux</h3>";
        $table = [$n1, $n2, $n3];
        echo "Notes saisies : " . implode(" | ", $table) . "<br>";

        echo "Compteur d'âge : ";
        for($j=0; $j<=$age; $j++) echo "$j ";
        
        echo "<br>Langages : " . implode(", ", ["PHP", "HTML", "CSS", "JS"]);

        echo "<h3>📐 Formes Géométriques</h3>";
        echo "<pre>";
        echo "     * \n";
        echo "    *** \n";
        echo "   ***** \n";
        echo "  ******* \n";
        echo " ********* \n";
        echo "</pre>";

        echo "Carré d'étoiles :<br>";
        for ($l=0; $l<5; $l++) {
            for ($c=0; $c<5; $c++) echo "* ";
            echo "<br>";
        }

        echo "<h3>🌀 Suite de Fibonacci (Top 10)</h3>";
        function Fibonacci($n) {
            $f0 = 0; $f1 = 1;
            echo "0, 1";
            for($i = 2; $i < $n; $i++) {
                $nxt = $f0 + $f1;
                echo ", $nxt";
                $f0 = $f1; $f1 = $nxt;
            }
        }
        Fibonacci(10);

        echo "</div>";
    }
    ?>
</div>

</body>
</html>