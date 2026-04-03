<html>
<title>sirie 1 </title>
<budy>
<form action = "" method = "post">
  <label> Nom </label>
  <input type = "text" name = "nom" required > </br>
  <label> Prenom </label>
  <input type = "text" name = "Prenom" required > </br>
  <label> Age </label>
  <input type = "number" name = "age" required > </br>
  <label> Note 1 </label>
  <input type = "number" name = "n1" required  min = "0" max = "20"> </br>
  <label> Note 2 </label>
  <input type = "number" name = "n2" required min = "0" max = "20" > </br>
  <label> Note 3 </label>
  <input type = "number" name = "n3" required  min = "0" max = "20" > </br>
  <label> Etablissement </label>
  <input type = "text" name = "Etablessment" required > </br>
   <label> Submit </label>
  <input type = "Submit" name = "valider"  > 
</form>
  
<?php
	define("Etablessment","FPK");
	if(isset($_POST["valider"]))
	{
	    $nom = $_POST["nom"] ;
	    $prenom = $_POST["Prenom"] ;
	    $age = $_POST["age"] ;
	    $note1 = $_POST["n1"] ;
	    $note2 = $_POST["n2"] ;
	    $note3 = $_POST["n3"] ;
	
	$somme = $note3 + $note2 + $note1 ;
	$moyenne = $somme / 3 ;
	
	echo "Nom : $nom <br>";
	echo "Prenom : $prenom <br>";
	echo "Age : $age <br>";
	echo "Etablessment : ". Etablessment ." <br>";
	echo "note 1 : $note1 <br>";
	echo "note 2 : $note2 <br>";
	echo "note 3 : $note3 <br>";
	echo "Somme  : $somme <br>";
	echo "Moyenne : $moyenne <br>";
	
	//ex5
	
	if($moyenne >= 16) { $mention = "Excellent"  ;}
	elseif($moyenne >= 14) { $mention = "Bien" ; }
	elseif($moyenne >= 12) { $mention = "Assez bien" ;}
	elseif($moyenne >= 10) { $mention = "Passable" ; }
	else {$mention = "Echec" ; }
	
	if ($age >= 18) echo "Majeur" ;
	  else echo "Mineur" ;
	if ($moyenne >= 10 ) echo "Admis";
	  else echo "Non Admet";
	// Exercice 2
	  switch ($mention) {
		case "Excellent" : echo "Mention : Excellent" ; break ;
		case "Bien" : echo "Mention : Bien" ; break ;
		case "Assez bien" : echo "Mention : Assez bien" ; break ;
		case "Passable" : echo "Mention : Passable" ; break ;
		default : echo "Mention : Echec" ; break ;
		}
	echo "<br>";
	$i = 0;
	$j = 0;
	$table = [ $note1 , $note2 , $note3 ] ;
	    for($i = 0 ; $i < 3 ; $i++)
	    {
	        echo $table[$i] . "<br>" ;
	    }
	while($j<= $age)
	{
	    echo $j . "<br>" ;
	    $j++ ;

	}

	$tab = [ "PHP" , "HTML" , "CSS" , "JS" ] ;
	foreach($tab as $T)
	    echo $T . "<br>" ;

	// Exercice 3
	for($i = 1 ; $i <= 10 ; $i++)
	    echo "5 x $i = " . 5*$i . "<br>" ;


	echo "<pre>";
	echo "     *         <br>";
	echo "    ***        <br>";
	echo "   *****       <br>";
	echo "  *******      <br>";
	echo " *********     <br>";
	echo "<pre>";

	$t = 5;
	for ($l = 0; $l < $t; $l++) {  
    	for ($c = 0; $c < $t; $c++) { 
        	echo "*";
    }
    echo "<br>"; 
	}
	
	$n1 = 10 ;
	for ($i = 1; $i <= $n1; $i++) {
		if ($i % 2 == 0) {
			echo $i . " "; 
		}
	}
	echo "<br>";

	$somme1 = 0 ;
	$n3 = 10 ;
	for ($i = 1; $i <= $n3; $i++) {
		$somme1 = $somme1 + $i ;
	}
	echo "somme : " . $somme1 ;
	echo "<br>";

	$n2 = 10 ;
	if ($n2 % 2 == 0) 
		echo "pair";
	else 
		echo "impair";
	echo "<br>";
	
	// Exercice 4 :

	/*
	algo ex4
	Debut
	var f0=0,f1=1 ,i ,n,Fsuivant
	pour i de 1 a n faire
		Fsuivant = f0 + f1
		ecrire "F",i,=,Fsuivant
		f0 = f1
		f1 = Fsuivant
	Fin
	*/
	
	function Fibonacci($n4) {
	$f0 = 0;
    $f1 = 1;
		for($i = 2 ; $i <= $n4; $i++) {
			$Fsuivant = $f0 + $f1;
			echo "F" . $i . " = " . $Fsuivant . "<br>"; // pour remove F : echo $Fsuivant . "<br>";
			$f0 = $f1;
			$f1 = $Fsuivant;
		}
	}
	
		Fibonacci(100);



}




?>

</body>
</html>